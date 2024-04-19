<?php 
    include('_layouts/header.php');
?>

<div id="home">
    <div class="content-inner">
        <div class="menu">
            <div class="uk-child-width-1-2@m uk-animation-slide-bottom" id="passo-1" uk-grid>
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
            <div class="uk-child-width-1-2@m uk-animation-slide-bottom" id="passo-2" uk-grid>
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
            <div class="uk-child-width-1-2@m uk-animation-slide-bottom" id="passo-3" uk-grid>
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
            <div class="uk-child-width-1-2@m" id="passo-4" uk-grid>
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
        </div>
    </div>
</div>

<script type="text/javascript">
    // document.getElementById("passo-2").style.display = "none";
    // document.getElementById("passo-3").style.display = "none";
    // document.getElementById("passo-4").style.display = "none";

    document.getElementById("comeraqui").addEventListener("click",(e) => {
        console.log("oi")
        document.getElementById("passo-2").style.display = "block";
        document.getElementById("passo-1").style.display = "none";
    });
</script>
