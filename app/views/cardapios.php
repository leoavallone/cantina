<?php 
    include('_layouts/header.php');
    $status = ["Inativo", "Ativo"];

    function formatarData($dataDoBanco){
        $dataFormatada = date("d/m/Y H:i:s", strtotime($dataDoBanco));
        return $dataFormatada;
    }
?>

<div id="home">
    <div class="content-inner">
        <h2>Controle de cardápio</h2>
        <a href="#add-cardapio" uk-toggle class="addButton uk-button uk-button-primary">Adicionar cardápio</a>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descricao</th>
                    <th>Data de Exibição</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($data['cardapio']) && count($data['cardapio']) > 0):
                        foreach($data['cardapio'] as $key => $value):
                ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['descricao'] ?></td>
                        <td><?= formatarData($value['data']) ?></td>
                        <td><?= $status[$value['status']] ?></td>
                        <td>
                            <a href="#" alt="Editar Cardápio" title="Editar Cardápio" onclick="editarCardapio(<?= $value['id'] ?>,'<?= $value['descricao'] ?>','<?= $value['data'] ?>',<?= $value['status'] ?>)" class="editBtn"><span uk-icon="pencil"></span></a>
                            <a href="#" alt="Adicionar Itens ao Cardápio" title="Adicionar Itens ao Cardápio" onclick="adicionarItensCardapio(<?= $value['id'] ?>)" class="editBtn"><span uk-icon="plus"></span></a>
                            <a href="#" alt="Ver Itens do Cardápio" title="Ver Itens do Cardápio"alt="Editar Cardápio" title="Editar Cardápio" onclick="verItensCardapio(<?= $value['id'] ?>,'<?= $value['descricao'] ?>')" class="editBtn"><span uk-icon="eye"></span></a>
                            <a href="#" alt="Deletar Cardápio" title="Deletar Cardápio" onclick="deleteCardapio(<?= $value['id'] ?>)" class="trashButton">
                                <span uk-icon="trash"></span>
                            </a>
                        </td>
                    </tr>
                <?php 
                        endforeach;
                    endif;
                ?>
            </tbody>
        </table>
    </div>
</div>

<div id="add-cardapio" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Adicionar um cardapio</h3>
        <div>
            <form id="cardapio-form">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="descricao" name="descricao" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Descricao:">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                        <input class="uk-input" id="data" name="data" type="text" aria-label="Not clickable icon" placeholder="Data:">
                    </div>
                </div>

                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <span>Ativo?</span>
                    <label><input id="sim" name="status" class="uk-radio" type="radio" value="1" checked>Sim</label>
                    <label><input id="nao" name="status" class="uk-radio" type="radio" value="0">Não</label>
                </div>
            </form>
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button id="cardapio-button" class="uk-button uk-button-primary" type="button">Salvar</button>
        </p>
    </div>
</div>

<div id="add-itens-cardapio" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Adicionar item no cardapio</h3>
        <div>
            <form id="cardapio-item-form">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="nomeItem" name="nomeItem" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Nome:">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: cart"></span>
                        <input class="uk-input" id="precoItem" name="precoItem" type="text" aria-label="Not clickable icon" placeholder="Preço:">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: tag"></span>
                        <input class="uk-input" id="quantidadeItem" name="quantidadeItem" type="text" aria-label="Not clickable icon" placeholder="Quantidade:">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <textarea class="uk-textarea" id="descricaoItem" name="descricaoItem" placeholder="Descricao:"></textarea>
                    </div>
                </div>

                <div class="uk-margin">
                    <span>Selecione a categoria</span>
                    <select id="categoriaItem" name="categoriaItem" class="uk-select" aria-label="Select">
                        <option value="1">Comida</option>
                        <option value="2">Bebida</option>
                        <option value="3">Sobremesa</option>
                    </select>
                </div>
            </form>
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button id="cardapio-item-button" class="uk-button uk-button-primary" type="button">Salvar</button>
        </p>
    </div>
</div>

<div id="see-cardapio-itens" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3 id="carapio-title" class="uk-modal-title"></h3>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Preco</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="cardapio-itens-table">
                
            </tbody>
        </table>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
        </p>
    </div>
</div>

<div id="remove-cardapio-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Deseja remover este item?</h3>
            <div>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Não</button>
                    <button id="cardapio-button" class="uk-button uk-button-primary" type="button">Sim</button>
                </p>
            </div>
    </div>
</div>

<script type="text/javascript">
    //Formularios
    const cardapioForm = document.getElementById("cardapio-form");
    const cardapioItemForm = document.getElementById("cardapio-item-form");

    //Botoes
    const cardapioButton = document.getElementById("cardapio-button");
    const cardapioItemButton = document.getElementById("cardapio-item-button");

    //Inputs do cardapio
    const dataInput = document.querySelector('input[name="data"]');
    const statusInput = document.querySelector('input[name="status"]');
    const descricaoInput = document.querySelector('textarea[name="descricao"]');

    //Inputs dos itens cardapio
    const nomeItemInput = document.querySelector('input[name="nomeItem"]');
    const precoItemInput = document.querySelector('input[name="precoItem"]');
    const quantidadeItemInput = document.querySelector('input[name="quantidadeItem"]');
    const descricaoItemInput = document.querySelector('textarea[name="descricaoItem"]');
    const categoriaItemInput = document.querySelector('select[name="categoriaItem"]');

    //Id do item selecionado
    let idInput = 0;

    function formaDataToTimesTamp(dataString){
        // Dividindo a string da data em dia, mês e ano
        var partesData = dataString.split('/');
        var dia = partesData[0];
        var mes = partesData[1];
        var ano = partesData[2];

        // Criando uma string de data no formato 'YYYY-MM-DD'
        var dataFormatada = ano + "-" + mes + "-" + dia;

        // Obtendo a data atual em formato de hora 'HH:MM:SS'
        var dataAtual = new Date();
        var hora = dataAtual.getHours().toString().padStart(2, '0');
        var minuto = dataAtual.getMinutes().toString().padStart(2, '0');
        var segundo = dataAtual.getSeconds().toString().padStart(2, '0');
        var horaMinutoSegundo = hora + ":" + minuto + ":" + segundo;

        // Combinando data e hora em um único timestamp
        var timestamp = dataFormatada + " " + horaMinutoSegundo;
        return timestamp;
    }

    function editarCardapio(id,descricao,data,status){
        idInput = id;
        dataInput.value = data;
        descricaoInput.value = descricao;
        statusInput.value = status;
        UIkit.modal("#add-cardapio").show();
    }

    function adicionarItensCardapio(id){
        idInput = id;
        UIkit.modal("#add-itens-cardapio").show();
    }

    function deleteCardapio(id){
        UIkit.modal.confirm('Você quer remover esse registro?').then(function() {
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            var urlencoded = new URLSearchParams();
            urlencoded.append("id", id);

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: urlencoded,
            };

            fetch("/estoque/deletar", requestOptions)
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
                UIkit.notification({
                    message: `Item removido do estoque`,
                    status: "success",
                    pos: "top-left",
                    timeout: 2000
                })
                setTimeout(() => {
                    window.location.reload();
                }, "2000");
            })
            .catch(error => {
                console.log('error', error)
            });
        }, function () {
            console.log('Rejected.')
        });
    }

    cardapioButton.addEventListener("click",(e) => {
        e.preventDefault();
        const descricao = cardapioForm.descricao.value;
        const data = formaDataToTimesTamp(cardapioForm.data.value);
        const status = cardapioForm.status.value;

        if(data ==="" || descricao ==="" || status ===""){
            UIkit.notification({
                message: "Todos os campos são obrigatórios",
                status: "danger",
                pos: "top-left",
                timeout: 2000
            })
            return;
        } 
        // else if(!verifyDateFormat(data)){
        //     UIkit.notification({
        //         message: "Data inválida",
        //         status: "danger",
        //         pos: "top-left",
        //         timeout: 2000
        //     })
        //     return;
        // }

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

        var urlencoded = new URLSearchParams();
        urlencoded.append("data", data);
        urlencoded.append("descricao", descricao);
        urlencoded.append("status", status);

        console.log("data", data);
        console.log("descricao", descricao);
        console.log("status", status);

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };

        fetch("/cardapio/criar", requestOptions)
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
            UIkit.notification({
                message: `Cardápio criado!`,
                status: "success",
                pos: "top-left",
                timeout: 2000
            })
            UIkit.modal("#add-cardapio").hide();
            setTimeout(() => {
                window.location.reload();
            }, "2000");
        })
        .catch(error => {
            console.log('error', error)
        });
    })

    cardapioItemButton.addEventListener("click",(e) => {
        e.preventDefault();
        console.log('Dados do form: ', cardapioItemForm);
        const nomeItem = cardapioItemForm.nomeItem.value;
        const precoItem = cardapioItemForm.precoItem.value.replace(",",".");
        const quantidadeItem = cardapioItemForm.quantidadeItem.value;
        const descricaoItem = cardapioItemForm.descricaoItem.value;
        const categoriaItem = cardapioItemForm.categoriaItem.value;

        if(nomeItem ==="" || precoItem==="" || quantidadeItem==="" || descricaoItem ===""){
            UIkit.notification({
                message: "Todos os campos são obrigatórios",
                status: "danger",
                pos: "top-left",
                timeout: 2000
            })
            return;
        } 

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

        var urlencoded = new URLSearchParams();
        urlencoded.append("cardapioId", idInput);
        urlencoded.append("nome", nomeItem);
        urlencoded.append("preco", precoItem);
        urlencoded.append("quantidade", quantidadeItem);
        urlencoded.append("descricao", descricaoItem);
        urlencoded.append("categoria", categoriaItem);

        console.log("cardapioId", idInput);
        console.log("nome", nomeItem);
        console.log("preco", precoItem);
        console.log("quantidade", quantidadeItem);
        console.log("descricao", descricaoItem);
        console.log("categoria", categoriaItem);
        

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };

        fetch("/cardapio/criarItem", requestOptions)
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
            UIkit.notification({
                message: `Item adicionado ao cardápio!`,
                status: "success",
                pos: "top-left",
                timeout: 2000
            })
            UIkit.modal("#add-itens-cardapio").hide();
            setTimeout(() => {
                window.location.reload();
            }, "2000");
        })
        .catch(error => {
            console.log('error', error)
        });
    })

    function verItensCardapio(id, nome){
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

        var urlencoded = new URLSearchParams();
        urlencoded.append("cardapioId", id);        

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };

        fetch("/cardapio/verItem", requestOptions)
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

            var tbody = document.getElementById("cardapio-itens-table");
            tbody.innerHTML = "";
            json.forEach(function(item) {
                var tr = document.createElement("tr");
                tr.innerHTML = "<td>" + item.nome + "</td>" +
                            "<td>" + item.descricao + "</td>" +
                            "<td>" + item.preco + "</td>" +
                            "<td>" + item.quantidade + "</td>" +
                            "<td><a href='#' alt='Deletar Item do Cardápio' title='Deletar Item do Cardápio' onclick='deleteItemCardapio("+item.id+")' class='trashButton'><span uk-icon='trash'></span></a></td>";
                tbody.appendChild(tr);
            });

            
        })
        .catch(error => {
            console.log('error', error)
        });

        document.getElementById("carapio-title").innerHTML = nome;
        UIkit.modal("#see-cardapio-itens").show();
    }

    document.getElementById('precoItem').addEventListener('input', function(event) {
        var valorAtual = event.target.value;
        var valorFormatado = formatarValorMonetario(valorAtual);
        event.target.value = valorFormatado;
    });

    function formatarValorMonetario(valor) {
        valor = valor.replace(/\D/g, '');
        valor = (valor / 100).toFixed(2).replace(".", ",");
        valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return valor;
    }
</script>
