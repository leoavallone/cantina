<?php 
    include('_layouts/header.php');
?>
<div id="home">
    <div class="content-inner">
        <h2>Controle de estoque</h2>
        <a href="#add-estoque" uk-toggle class="addButton uk-button uk-button-primary">Adicionar Item</a>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Item</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>
                        <span uk-icon="pencil"></span>
                        <span uk-icon="trash"></span>
                    </td>
                </tr>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>
                        <span uk-icon="pencil"></span>
                        <span uk-icon="trash"></span>
                    </td>
                </tr>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>
                        <span uk-icon="pencil"></span>
                        <span uk-icon="trash"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="add-estoque" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Adicionar item no estoque</h3>
        <div>
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: info"></span>
                    <input class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Nome:">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: info"></span>
                    <input class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Descrição:">
                </div>
            </div>
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button class="uk-button uk-button-primary" type="button">Salvar</button>
        </p>
    </div>
</div>