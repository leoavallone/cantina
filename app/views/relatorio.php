<?php 
    include('_layouts/header.php');
    $nivel = ["Super Admin","Estoque","Venda"];
    $status = ["Ativo", "Finalizado"];
?>

<div id="home">
    <div class="content-inner">
        <h2>Relatorio de Vendas</h2>

        <div class="uk-margin">
            <?php if(isset($data['relatorios']) && count($data['relatorios']) > 0): ?>
                <span>Selecione o cardápio que deseja puxar venda</span>
                <select id="cardapios" name="cardapios" class="uk-select" aria-label="Select">
                <option value="">Selecione...</option>
                    <?php foreach($data['relatorios'] as $key => $value):?>
                        <option value="<?= $value['id'] ?>"><?= $value['descricao'] ?></option>
                    <?php endforeach; ?>  
                </select>
            <?php else: ?>
                <h5>No momento não há vendas para registro</h5>
            <?php endif; ?>
        </div>
        <div id="hasNoItens">
            <h5>Não há vendas deste cardápio</h5>
        </div>
        <div id="totalItens"></div>
        <div id="relacaoItens"></div>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Pedido</th>
                    <th>total</th>
                    <th>Pagamento</th>
                    <th>Quem fez</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="relatorio-table"></tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    // Seletor de cardápios
    const hasNoItens = document.getElementById('hasNoItens');
    const totalItens = document.getElementById('totalItens');
    const relacaoItens = document.getElementById('relacaoItens');
    hasNoItens.style.display = "none";
    totalItens.style.display = "none";
    const cardapios = document.getElementById('cardapios');
    const status = ["Ativo", "Finalizado"];
    let tbody = document.getElementById("relatorio-table");
    let total = 0;
    var quantidadesPorNome = {};
    // Adiciona evento de mudança ao seletor
    cardapios.addEventListener('change', (event) => {
        // Obtém o valor da opção selecionada
        const selectedCardapioId = event.target.value;
        console.log('Cardápio selecionado ID:', selectedCardapioId);
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
        var urlencoded = new URLSearchParams();
        urlencoded.append("cardapioId", selectedCardapioId);        

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };

        fetch("/relatorio/getRelatorio", requestOptions)
        .then(response => response.json())
        .then(json => {
            if(json.error){
                UIkit.notification({
                    message: `Erro: ${json.error}`,
                    status: "danger",
                    pos: "top-left",
                    timeout: 2000
                })
                return
            }
            if(json.length === 0){
                total = 0;
                hasNoItens.style.display = "block";
                tbody.innerHTML = "";
                totalItens.innerHTML = "";
                return
            }  
            if(json.length === 0){
                total = 0;
                hasNoItens.style.display = "block";
                tbody.innerHTML = "";
                relacaoItens.innerHTML = "";
                return
            }
            total = 0;
            hasNoItens.style.display = "none";
            tbody.innerHTML = "";
            json.forEach(function(item) {
                getTotalIndivualInsume(item.itens);
                total = total + parseInt(item.total);
                var tr = document.createElement("tr");
                tr.innerHTML = "<td>"+item.id+"</td></td>" +
                            "<td>"+formatItemPedido(item.itens)+"</td>" +
                            "<td>R$"+item.total+"</td>" +
                            "<td>"+item.pagamento+"</td>" +
                            "<td>"+item.nome+"</td>" +
                            "<td>"+status[parseInt(item.status)-1]+"</td>";
                tbody.appendChild(tr);
            });

            totalItens.innerHTML = "<h5>Total vendido nesse cardápio: R$"+total+"</h5>";
            totalItens.style.display = "block";
            relacaoItens.innerHTML = "<h5>Quantidade por itens: "+total+"</h5>";
            relacaoItens.style.display = "block";
        })
        .catch(error => {
            console.log('error', error)
        });

        atualizaQuantidades(quantidadesPorNome);
    });

    function formatItemPedido(itens){
        let formatado = "";
        if(itens){
            let produtos = JSON.parse(itens);
            produtos.forEach(function(item) {
                formatado += "x "+item.quantidade+" - "+item.nome+"<br/>";
            })
        }
        return formatado;
    }
   
    function getTotalIndivualInsume(item){
        var itens = JSON.parse(item);
        for (const obj of itens) {
            const { nome, quantidade } = obj;
            if (!quantidadesPorNome[nome]) {
                Object.defineProperty(quantidadesPorNome, nome, {
                    value: quantidade,
                    writable: true,
                });
            } else {
                quantidadesPorNome[nome] += quantidade;
            }
        }
    }

    function atualizaQuantidades(relacao){
        console.log(relacao);
        // editar o html da variavel relacaoItens que esta a div (pesquise por innerHTML)
    }
</script>