<h1>Novo Usuário</h1>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar" >
    <label>Nome</label>
    <input type="text" name="nome">
    <br>
    <label>E-mail</label>
    <input type="email" name="email">
    <br>
    <label>Senha</label>
    <input type="password" name="senha">
    <br>
    <label>Data de Nascimento</label>
    <input type="date" name="data_nasc">
    <br>
    <button type="submit">Enviar</button>
</form>
<style>
    input{
        margin-bottom: 8px;
    }
</style>