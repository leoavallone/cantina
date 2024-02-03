<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Space Burger - Itens do Cardapio</title>
        <link rel="stylesheet" href="css/globals.css">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <link rel="icon" href="img/favicon.ico">
    </head>
    <body>
        <?php 
            include('_layouts/header.php');
        ?>
      
        <div id="home">
            <h1 class="title">Controle de items do cardápio</h1>
            <a href="#add-estoque" uk-toggle class="addButton uk-button uk-button-primary">Adicionar item</a>
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Table Data</td>
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
                        <td>Table Data</td>
                        <td>
                            <span uk-icon="pencil"></span>
                            <span uk-icon="trash"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="add-estoque" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <h3>Adicionar item no cardapio</h3>
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
                            <input class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Quantidade:">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: info"></span>
                            <input class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Preço:">
                        </div>
                    </div>
                </div>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                    <button class="uk-button uk-button-primary" type="button">Salvar</button>
                </p>
            </div>
        </div>
    </body>
</html>