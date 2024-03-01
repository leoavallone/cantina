<?php 
    include('_layouts/header.php');
?>

<div id="home">
    <div class="content-inner">
        <h2>Controle de cardápio</h2>
        <a href="#add-cardapio" uk-toggle class="addButton uk-button uk-button-primary">Adicionar cardápio</a>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>
                        <a href="cardapioitens.html"><span uk-icon="pencil"></span></a>
                        <span uk-icon="trash"></span>
                    </td>
                </tr>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>
                        <a href="cardapioitens.html"><span uk-icon="pencil"></span></a>
                        <span uk-icon="trash"></span>
                    </td>
                </tr>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>
                        <a href="cardapioitens.html"><span uk-icon="pencil"></span></a>
                        <span uk-icon="trash"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="add-cardapio" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Adicionar item no cardapio</h3>
        <div>
            <form id="cardapio-form">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="descricao" name="descricao" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Titulo:">
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
            <button id="remove-cardaio" class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button id="cardapio-button" class="uk-button uk-button-primary" type="button">Salvar</button>
        </p>
    </div>
</div>

<script type="text/javascript">
    const cardapioForm = document.getElementById("cardapio-form");
    const cardapioButton = document.getElementById("cardapio-button");
    const deletBtn = document.getElementById("remove-cardaio");

    deletBtn.addEventListener("click",(e) => {
        e.preventDefault();
        UIkit.modal("#remove-cardapio-modal").show();
    })

    cardapioButton.addEventListener("click",(e) => {
        e.preventDefault();

        const descricao = cardapioForm.descricao.value;
        const data = cardapioForm.data.value;
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

        fetch("http://localhost:90/cardapio/criar", requestOptions)
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
</script>
