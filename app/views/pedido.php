<?php 
    include('_layouts/header.php');
?>
<div id="home">
    <div class="content-inner">
        <div class="uk-child-width-1-3@m uk-child-width-1-3@s uk-text-center" uk-grid>
            <?php 
                if(isset($data['pedidos']) && count($data['pedidos']) > 0):
                    foreach($data['pedidos'] as $key => $value):
            ?>
            <div class="pedidoCard">
                <div class="uk-card uk-card-default uk-card-body">
                    <h2>Pedido #<?= $value['id'] ?> - <?= $value['nome'] ?></h2>
                    <div class="quantidade">
                        <?php 
                            if($value['itens']):
                                $itens = json_decode($value['itens'], true);
                                foreach($itens as $key => $pedido):
                        ?>
                            <h3><?= $pedido['nome'] ?> - x<?= $pedido['quantidade'] ?> - R$<?= $pedido['preco'] ?></h3>
                        <?php 
                            endforeach;
                            endif;
                        ?>
                        <h3>Consumo: <?= $value['modalidade'] ?></h3>
                    </div>
                    <button onclick="finalizarPedido(<?= $value['id'] ?>)" class="finalizado uk-button uk-button-primary">Finalizar</button>
                </div>
            </div>
            <?php 
                endforeach;
                endif;
            ?>
        </div>
    </div>      
</div>

<script>
    function recarregarPagina() {
        location.reload();
    }

    // Definir o tempo de intervalo para recarregar a página (em milissegundos)
    var intervalo = 15000; // 15 segundos

    // Chamar a função de recarregar a página a cada intervalo de tempo
    setInterval(recarregarPagina, intervalo);
    
    function finalizarPedido(id){
        UIkit.modal.confirm('Você quer finalizar esse pedido?').then(function() {
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            var urlencoded = new URLSearchParams();
            urlencoded.append("id", id);

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: urlencoded,
            };

            fetch("/pedido/finalizar", requestOptions)
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
                    message: `Pedido finalizado com sucesso!`,
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
</script>