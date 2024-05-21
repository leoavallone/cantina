<?php 
    include('_layouts/header.php');
?>
<div id="home">
    <div class="uk-child-width-1-3@m content" uk-grid>
        <?php if($_SESSION && ($_SESSION['role'] === 1 || $_SESSION['role'] === 3)): ?>
        <div>
            <a href="/menu">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <span uk-icon="file-edit"></span>
                    <h3 class="uk-card-title">Fazer Pedido</h3>
                    <p>Visualizar e testar o cardápio do dia</p>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php if($_SESSION && ($_SESSION['role'] === 1 || $_SESSION['role'] === 2)): ?>
        <div>
            <a href="/pedido">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <span uk-icon="file-text"></span>
                    <h3 class="uk-card-title">Ver Pedidos</h3>
                    <p>Visualizar os pedidos feitos e dar baixa</p>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php if($_SESSION && ($_SESSION['role'] === 1 || $_SESSION['role'] === 2)): ?>
        <div>
            <a href="/estoque">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <span uk-icon="bag"></span>
                    <h3 class="uk-card-title">Estoque</h3>
                    <p>Gerencie o estoque da cantina aqui</p>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php if($_SESSION && ($_SESSION['role'] === 1 || $_SESSION['role'] === 2)): ?>
        <div>
            <a href="/cardapio">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <span uk-icon="cart"></span>
                    <h3 class="uk-card-title">Cardápio</h3>
                    <p>Gerencie aqui o cardápio do dia da cantina</p>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php if($_SESSION && $_SESSION['role'] === 1): ?>
        <div>
            <a href="/relatorio">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <span uk-icon="calendar"></span>
                    <h3 class="uk-card-title">Relatório de vendas</h3>
                    <p>Veja aqui as vendas da cantina</p>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php if($_SESSION && $_SESSION['role'] === 1): ?>
        <div>
            <a href="/usuario">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <span uk-icon="user"></span>
                    <h3 class="uk-card-title">Usuarios</h3>
                    <p>Gerencie os usuarios do aplicativo</p>
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
