<?php 
    include('_layouts/header.php');
?>

<div id="home">
    <div class="content-inner fullbackground">
        <div class="menu">
            <div class="uk-child-width-1-2@m uk-child-width-1-2@s uk-animation-slide-bottom" id="passo-1" uk-grid>
                <div>
                    <div id="comeraqui">
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img class="cover" src="public/img/comeraqui.jfif" alt="">
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">Comer aqui</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="viagem">
                        <div class="uk-card uk-card-default" >
                            <div class="uk-card-media-top">
                                <img class="cover" src="public/img/viagem.jfif" alt="">
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">Viagem</h3>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            <div class="uk-child-width-1-3@m uk-child-width-1-3@s uk-animation-slide-bottom hideBox" id="passo-2" uk-grid>
                <div>
                    <div id="comida" onclick="selecionaItem('1')">
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img class="cover" src="public/img/comeraqui.jfif" alt="">
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">Comida</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="bebida" onclick="selecionaItem('2')">
                        <div class="uk-card uk-card-default" >
                            <div class="uk-card-media-top">
                                <img class="cover" src="public/img/comeraqui.jfif" alt="">
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">Bebida</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="sobremesa" onclick="selecionaItem('3')">
                        <div class="uk-card uk-card-default" >
                            <div class="uk-card-media-top">
                                <img class="cover" src="public/img/comeraqui.jfif" alt="">
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">Sobremesa</h3>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
            <div class="uk-child-width-1-2@m uk-child-width-1-2@s uk-animation-slide-bottom hideBox" id="passo-3" uk-grid>
            </div>
            <div class="uk-animation-slide-bottom hideBox" id="passo-4" uk-grid>
                <div class="uk-width-1-3@m uk-width-1-3@s">
                    <div class="uk-card uk-card-default uk-card-body">
                        <img class="cover" src="public/img/comeraqui.jfif" alt="">
                    </div>
                </div>
                <div class="uk-width-2-3@m uk-width-2-3@s">
                    <div class="uk-card uk-card-default uk-card-body">
                            <h3 id="titulo">Comida</h3>
                            <p id="descricao">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>
                                Quantidade:
                                <select name="quantidade" id="quantidade"></select>
                            </p>
                            <p>
                                <button id="carrinho-add" class="uk-button uk-button-primary" type="button" onclick="addCarrinho()">Adicionar ao Carrinho</button>
                            </p>
                    </div>
                </div>
            </div>
            <div class="uk-child-width-1-2@m uk-child-width-1-2@s uk-animation-slide-bottom hideBox" id="passo-5" uk-grid>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img class="cover" src="public/img/money.jfif" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Dinheiro/Pix</h3>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img class="cover" src="public/img/card.jfif" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Débito/Crédito</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-text-center margin-break hideBox" id="backButton">
                <button id="cardapio-button" class="uk-button uk-button-primary" type="button" onclick="back()">Voltar</button>
            </div>
        </div>
        <div class="cart">
            <h4>Seu Pedido:</h4>
            <div id="itensPedido"></div>
            <h3>Total: R$<span id="total">0</span></h3>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default" onclick="limparCarrinho()" type="button">Limpar Carrinho</button>
                <button class="uk-button uk-button-primary" onclick="finalizarCompra()" type="button">Finalizar Compra</button>
            </p>
        </div>
    </div>
</div>

<div id="add-pedido" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Informe um nome para o pedido</h3>
        <div>
            <form id="estoque-form">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="nome" name="nome" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Nome:">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    let comidas = [];
    let modalidade = "";
    let passoAtual = 1;
    let itemSelecionado = [];
    let carrinho = [];

    document.getElementById("comeraqui").addEventListener("click",(e) => {
        modalidade = "Local";
        passoAtual = 2;
        document.getElementById("passo-2").classList.remove("hideBox");
        document.getElementById("passo-1").classList.add("hideBox");
        document.getElementById("backButton").classList.remove("hideBox");
    });

    document.getElementById("viagem").addEventListener("click",(e) => {
        modalidade = "Viagem";
        document.getElementById("passo-2").classList.remove("hideBox");
        document.getElementById("passo-1").classList.add("hideBox");
        document.getElementById("backButton").classList.remove("hideBox");
    });

    function selecionaItem(id){
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

        var urlencoded = new URLSearchParams();
        urlencoded.append("categoria", id);        

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };

        fetch("/menu/searchByCat", requestOptions)
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
            console.log('Json retornado: ', json);
            comidas = json;
            var itensCardapio = document.getElementById("passo-3");
            itensCardapio.innerHTML = "";
            json.forEach(function(item) {
                var divCardCardapio = document.createElement("div");
                divCardCardapio.innerHTML = "<div onclick='detalheComida("+item.id+")'>"+
                    "<div>"+
                        "<div class='uk-card uk-card-default'>"+
                            "<div class='uk-card-media-top'>"+
                                "<img class='cover' src='public/img/comeraqui.jfif' alt=''>"+
                            "</div>"+
                            "<div class='uk-card-body'>"+
                                "<h3 class='uk-card-title uk-text-center'>"+item.nome+"</h3>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>";
                itensCardapio.appendChild(divCardCardapio);
            });

            
        })
        .catch(error => {
            console.log('error', error)
        });
        passoAtual = 3;
        document.getElementById("passo-3").classList.remove("hideBox");
        document.getElementById("passo-2").classList.add("hideBox");
    }

    function detalheComida(id){
        console.log('ID: ', id)
        var item = comidas.filter(obj => {
            return obj.id == id
        });
        select = document.getElementById('quantidade');
        select.innerHTML = "";
        if(item){
            itemSelecionado = item;
            console.log(item);
            for (var i = 0; i<=item[0].quantidade; i++){
                var opt = document.createElement('option');
                opt.value = i;
                opt.innerHTML = i;
                select.appendChild(opt);
            }

            passoAtual = 4;
            document.getElementById("titulo").innerText = item[0].nome;
            document.getElementById("descricao").innerText = item[0].descricao;
            document.getElementById("passo-4").classList.remove("hideBox");
            document.getElementById("passo-3").classList.add("hideBox");
        }
    }

    function backToItems(){
        document.getElementById("titulo").innerText = "Comida";
        document.getElementById("descricao").innerText = "Descricao";
        document.getElementById("passo-3").classList.remove("hideBox");
        document.getElementById("passo-4").classList.add("hideBox");
    }

    function back(){
        let stringAtual = `passo-${passoAtual}`;
        let stringAnterior = `passo-${passoAtual - 1}`;
       
        if(passoAtual === 5){
            document.getElementById("passo-2").classList.remove("hideBox");
            document.getElementById("passo-5").classList.add("hideBox");
        }else{
            passoAtual = passoAtual - 1;
            document.getElementById(stringAnterior).classList.remove("hideBox");
            document.getElementById(stringAtual).classList.add("hideBox");
        }
        if(passoAtual === 1){
            document.getElementById("backButton").classList.add("hideBox");
        }
    }

    function addCarrinho(){
        let qtd = document.querySelector('#quantidade');
        let itensPedido = document.querySelector("itensPedido");
        if(itemSelecionado[0] && qtd.selectedIndex > 0){
            let itemProCarrinho = {};
            itemProCarrinho.nome = itemSelecionado[0].nome;
            itemProCarrinho.quantidade = qtd.selectedIndex;
            itemProCarrinho.preco = parseFloat(itemSelecionado[0].preco) * qtd.selectedIndex;
            carrinho.push(itemProCarrinho);
            atualizaCarrinho(carrinho);
            document.getElementById("passo-3").classList.remove("hideBox");
            document.getElementById("passo-4").classList.add("hideBox");
        }
    }

    function atualizaCarrinho(carrinho){
        console.log('Carrinho: ', carrinho);
        if(carrinho && carrinho.length > 0){
            carrinhoDiv = document.getElementById('itensPedido');
            let divCardCardapio = document.createElement("div");
            for (var i = 0; i<=carrinho.length; i++){
                if(carrinho[i] && carrinho[i].nome){
                    divCardCardapio.innerHTML = "<p>"+carrinho[i].nome+" - x"+carrinho[i].quantidade+"</p>";
                    carrinhoDiv.appendChild(divCardCardapio);
                }
            }
            atualizaPreco(carrinho)
        }
    }

    function atualizaPreco(carrinho){
        let totalPedido = 0;
        totalSpan = document.getElementById('total');
        for (var i = 0; i<=carrinho.length; i++){
            if(carrinho[i] && carrinho[i].nome){
                totalPedido = totalPedido + carrinho[i].preco;
            }
        }
        totalSpan.innerHTML = totalPedido;
    }

    function limparCarrinho(){
        totalSpan = document.getElementById('total');
        totalPedido = 0;
        totalSpan.innerHTML = totalPedido;
        carrinhoDiv = document.getElementById('itensPedido');
        carrinhoDiv.innerHTML = "";
    }

    function finalizarCompra(){
        let stringAtual = `passo-${passoAtual}`;
        document.getElementById("passo-5").classList.remove("hideBox");
        document.getElementById(stringAtual).classList.add("hideBox");
        passoAtual = 5;
    }
</script>
