<h1>Editar Usuário</h1>
<?php
    $sql = "SELECT * FROM usuarioS WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar" >
    <input type="hidden" name="id" value="<?php print $row->id;?>" >
    <label>Nome</label>
    <input type="text" name="nome" value <?php print $row->nome;?>>
    <br>
    <label>E-mail</label>
    <input type="email" name="email" <?php print $row->email;?>>
    <br>
    <label>Senha</label>
    <input type="password" name="senha" required>
    <br>
    <label>Data de Nascimento</label>
    <input type="date" name="data_nasc" <?php print $row->data_nasc;?>>
    <br>
    <button type="submit">Enviar</button>
</form>
<style>
    input{
        margin-bottom: 8px;
    }
</style>