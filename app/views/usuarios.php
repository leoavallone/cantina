<?php 
    include('_layouts/header.php');
    $nivel = ["Super Admin","Estoque","Venda"];
    $status = ["Inativo", "Ativo"];
?>

<div id="home">
    <div class="content-inner">
        <h2>Controle de usuarios</h2>
        <a href="#add-user" uk-toggle class="addButton uk-button uk-button-primary">Adicionar Usuario</a>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Nivel</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($data['user']) && count($data['user']) > 0):
                        foreach($data['user'] as $key => $value):
                ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $nivel[$value['role']-1] ?></td>
                        <td><?= $status[$value['status']] ?></td>
                        <td>
                            <a href="#" onclick="editarUser(<?= $value['id'] ?>,'<?= $value['login'] ?>','<?= $value['email'] ?>','<?= $value['password'] ?>',<?= $value['role'] ?>)" class="editBtn"><span uk-icon="pencil"></span></a>
                            <a href="#" onclick="deleteUser(<?= $value['id'] ?>)" class="trashButton">
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

<div id="add-user" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Adicionar novo usuario</h3>
        <div>
            <form id="user-form">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="login" name="login" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Login:">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="email" name="email" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="E-mail:">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input id="senha" name="senha" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Senha de Acesso:">
                    </div>
                </div>

                <div class="uk-margin">
                    <span>Selecione o nível de acesso</span>
                    <select id="nivel" name="nivel" class="uk-select" aria-label="Select">
                        <option value="1">Super Admin</option>
                        <option value="2">Estoque</option>
                        <option value="3">Venda</option>
                    </select>
                </div>
            </form>
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button id="user-button" class="uk-button uk-button-primary" type="button">Salvar</button>
        </p>
    </div>
</div>

<script type="text/javascript">
    const userForm = document.getElementById("user-form");
    const userButton = document.getElementById("user-button");
    const loginInput = document.querySelector('input[name="login"]');
    const emailInput = document.querySelector('input[name="email"]');
    const senhaInput = document.querySelector('input[name="senha"]');
    const nivelInput = document.querySelector('select[name="nivel"]');
    let idInput = 0;

    function editarUser(id,login,email,senha,role){
        idInput = id;
        loginInput.value = login;
        emailInput.value = email;
        senhaInput.value = senha;
        nivelInput.value = role;
        UIkit.modal("#add-user").show();
    }

    function deleteUser(id){
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

            fetch("http://localhost:90/estoque/deletar", requestOptions)
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
   
    userButton.addEventListener("click",(e) => {
        e.preventDefault();

        const nome = userForm.nome.value;
        const descricao = userForm.descricao.value;
        const quantidade = userForm.quantidade.value;
        var url = "http://localhost:90/estoque/criar";
        var successMessage = "Item adicionado ao estoque";
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

        if(idInput > 0){
            urlencoded.append("id", idInput);
            url = "http://localhost:90/estoque/editar"
            successMessage = "Item editado com sucesso!"
        }

        urlencoded.append("nome", nome);
        urlencoded.append("descricao", descricao);
        urlencoded.append("quantidade", quantidade);

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };

        fetch(url, requestOptions)
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
                message: successMessage,
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