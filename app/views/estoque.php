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
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($data['estoque']) && count($data['estoque']) > 0):
                        foreach($data['estoque'] as $key => $value):
                ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['nome'] ?></td>
                        <td><?= $value['descricao'] ?></td>
                        <td><?= $value['quantidade'] ?></td>
                        <td>
                            <span uk-icon="pencil"></span>
                            <a href="#" id="remove-estoque" uk-toggle class="trashButton">
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

<div id="add-estoque" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Adicionar item no estoque</h3>
        <div>
            <form id="estoque-form">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="nome" name="nome" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Nome:">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="descricao" name="descricao" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Descrição:">
                    </div>
                </div>
                <div class="uk-margin">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: info"></span>
                            <input id="quantidade" name="quantidade" class="uk-input" type="number" aria-label="Not clickable icon" placeholder="Quantidade:">
                        </div>
                    </div>
                </div>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                    <button id="estoque-button" class="uk-button uk-button-primary" type="button">Salvar</button>
                </p>
            </form>
        </div>
    </div>
</div>

<div id="remove-estoque-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Deseja remover este item?</h3>
            <div>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Não</button>
                    <button id="estoque-button" class="uk-button uk-button-primary" type="button">Sim</button>
                </p>
            </div>
    </div>
</div>


<script type="text/javascript">
    const estoqueForm = document.getElementById("estoque-form");
    const estoqueButton = document.getElementById("estoque-button");
    const deletBtn = document.getElementById("remove-estoque");

    deletBtn.addEventListener("click",(e) => {
        e.preventDefault();
        UIkit.modal("#remove-estoque-modal").show();
    })

    estoqueButton.addEventListener("click",(e) => {
        e.preventDefault();

        const nome = estoqueForm.nome.value;
        const descricao = estoqueForm.descricao.value;
        const quantidade = estoqueForm.quantidade.value;

        if(nome ==="" || descricao ==="" || quantidade ===""){
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
        urlencoded.append("nome", nome);
        urlencoded.append("descricao", descricao);
        urlencoded.append("quantidade", quantidade);

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };

        fetch("http://localhost:90/estoque/criar", requestOptions)
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
                message: `Item adicionado ao estoque`,
                status: "success",
                pos: "top-left",
                timeout: 2000
            })
            UIkit.modal("#add-estoque").hide();
            setTimeout(() => {
                window.location.reload();
            }, "2000");
        })
        .catch(error => {
            console.log('error', error)
        });
    })
</script>