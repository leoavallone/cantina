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

<div id="add-user" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3>Adicionar novo usuario</h3>
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
                    <input class="uk-input" type="text" aria-label="Not clickable icon" placeholder="Senha de Acesso:">
                </div>
            </div>

            <div class="uk-margin">
                <span>Selecione o nível de acesso</span>
                <select class="uk-select" aria-label="Select">
                    <option>Super Admin</option>
                    <option>Estoque</option>
                    <option>Venda</option>
                </select>
            </div>
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button class="uk-button uk-button-primary" type="button">Salvar</button>
        </p>
    </div>
</div>