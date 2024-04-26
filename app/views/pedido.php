<?php 
    include('_layouts/header.php');
?>
<div id="home">
    <div class="content-inner">
        <div class="uk-grid-medium uk-child-width-expand@s uk-text-center" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h2>Pedido #0001 - Léo</h2>
                    <div class="quantidade">
                        <h3>Hamburguer - x3</h3> 
                    </div>
                    <div class="quantidade">
                        <h3>Pastel - x3</h3>
                    </div>
                    <div class="quantidade">
                        <h3>Batata - x3</h3>
                    </div>
                    <button onclick="finalizarPedido()" class="finalizado uk-button uk-button-primary">Finalizar</button>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h2>Pedido #0001 - Léo</h2>
                    <div class="quantidade">
                        <h3>Hamburguer - x3</h3> 
                    </div>
                    <div class="quantidade">
                        <h3>Pastel - x3</h3>
                    </div>
                    <div class="quantidade">
                        <h3>Batata - x3</h3>
                    </div>
                    <button onclick="finalizarPedido()" class="finalizado uk-button uk-button-primary">Finalizar</button>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h2>Pedido #0001 - Léo</h2>
                    <div class="quantidade">
                        <h3>Hamburguer - x3</h3> 
                    </div>
                    <div class="quantidade">
                        <h3>Pastel - x3</h3>
                    </div>
                    <div class="quantidade">
                        <h3>Batata - x3</h3>
                    </div>
                    <button onclick="finalizarPedido()" class="finalizado uk-button uk-button-primary">Finalizar</button>
                </div>
            </div>
        </div>
        <div class="uk-grid-medium uk-child-width-expand@s uk-text-center" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h2>Pedido #0001 - Léo</h2>
                    <div class="quantidade">
                        <h3>Hamburguer - x3</h3> 
                    </div>
                    <div class="quantidade">
                        <h3>Pastel - x3</h3>
                    </div>
                    <div class="quantidade">
                        <h3>Batata - x3</h3>
                    </div>
                    <button onclick="finalizarPedido()" class="finalizado uk-button uk-button-primary">Finalizar</button>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h2>Pedido #0001 - Léo</h2>
                    <div class="quantidade">
                        <h3>Hamburguer - x3</h3> 
                    </div>
                    <div class="quantidade">
                        <h3>Pastel - x3</h3>
                    </div>
                    <div class="quantidade">
                        <h3>Batata - x3</h3>
                    </div>
                    <button onclick="finalizarPedido()" class="finalizado uk-button uk-button-primary">Finalizar</button>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h2>Pedido #0001 - Léo</h2>
                    <div class="quantidade">
                        <h3>Hamburguer - x3</h3> 
                    </div>
                    <div class="quantidade">
                        <h3>Pastel - x3</h3>
                    </div>
                    <div class="quantidade">
                        <h3>Batata - x3</h3>
                    </div>
                    <button onclick="finalizarPedido()" class="finalizado uk-button uk-button-primary">Finalizar</button>
                </div>
            </div>
        </div> 
    </div>      
</div>

<div id="modal-confirm" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Confirme a entrega</h2>
        <p>Deseja finalizar o pedido?</p>
        <p class="uk-text-right">
            <button class="finalizado uk-button uk-button-default uk-modal-close" type="button">Não</button>
            <button class="finalizado uk-button uk-button-primary" type="button">Sim</button>
        </p>
    </div>
</div>

<script>
    function finalizarPedido(){
        console.log('Oi')
        UIkit.modal("#modal-confirm").show();
    }
</script>