<?php require 'proc_login_sem_bem_vindo.php'; ?>
<?php require 'cabecalho_pvg.php'; ?>

<style>
    .tab_cadastro {
        margin: 0 auto;
        text-align: right;
        color: white;
    }
</style>
<br><br>
<h1>Informações do Usuário</h1>
<div class="table-container">
    <table id="customers">
        <?php require 'titulo_tabela.php'; ?>
        <?php
        // Conecta no banco de dados
        require "../conecta_bd.php";

        // Verifica se o usuário está logado e carrega seus dados
        if (array_key_exists('id_usuario', $_SESSION) && $_SESSION['id_usuario'] && !isset($usuario)) {
            $res = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
            $usuario = $res->fetch();
        }

        // Consulta os dados do usuário
        $consulta = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
        $usuarios = $consulta->fetchAll();
        require 'registro_tabela.php';
        ?>
    </table>
</div><br>
<div class="form-box">
    <form action="proc_atualizar.php" method="post" class="form">
        <span class="title">Atualizar</span>
        <span class="subtitle">Cadastro</span>
        <div class="form-container">

            <label for="id_nome">Nome:</label>
            <!-- Input para o nome com o valor preenchido com o nome do usuário -->
            <input type="text" name="nome" id="id_nome" value="<?php echo $usuario['nome']; ?>">


            <label for="id_email">E-mail:</label>
            <!-- Input para o email com o valor preenchido com o email do usuário -->
            <input type="email" name="email" id="id_email" value="<?php echo $usuario['email']; ?>" required>


            <label for="id_cpf">CPF:</label>
            <!-- Input para o email com o valor preenchido com o email do usuário -->
            <input type="text" name="cpf" id="id_cpf" value="<?php echo $usuario['cpf']; ?>">


            <label for="id_data_nascimento">Data nascimento:</label>
            <!-- Input para o email com o valor preenchido com o email do usuário -->
            <input type="date" name="data_nascimento" id="id_data_nascimento" value="<?php echo $usuario['data_nascimento']; ?>">

        </div>
        <button type="submit" class="beautiful-button" class="button">Atualizar</button>
    </form>
</div><br><br><br><br>
<style>
    .form-box {
        max-width: 300px;
        margin: 0 auto; /* Adicione esta linha para centralizar o formulário */
        background: #f1f7fe;
        overflow: hidden;
        border-radius: 16px;
        color: #010101;
    }

    .form {
        position: relative;
        display: flex;
        flex-direction: column;
        padding: 32px 24px 24px;
        gap: 16px;
        text-align: center;
    }

    /*Form text*/
    .title {
        font-weight: bold;
        font-size: 1.6rem;
    }

    .subtitle {
        font-size: 1.2rem;
        font-weight: bold;
    }

    /*Inputs box*/
    .form-container {
        overflow: hidden;
        border-radius: 8px;
        background-color: #fff;
        margin: 1rem 0 .5rem;
        width: 100%;
    }

    .input {
        background: none;
        border: 0;
        outline: 0;
        height: 40px;
        width: 100%;
        border-bottom: 1px solid #eee;
        font-size: .9rem;
        padding: 8px 15px;
    }

    .form-section {
        padding: 16px;
        font-size: .85rem;
        background-color: #e0ecfb;
        box-shadow: rgb(0 0 0 / 8%) 0 -1px;
    }

    .form-section a {
        font-weight: bold;
        color: #0066ff;
        transition: color .3s ease;
    }

    .form-section a:hover {
        color: #005ce6;
        text-decoration: underline;
    }

    /*Button*/
    .form button {
        background-color: #0066ff;
        color: #fff;
        border: 0;
        border-radius: 24px;
        padding: 10px 16px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color .3s ease;
    }

    .form button:hover {
        background-color: #005ce6;
    }

    input {
        padding: 10px;
        /* Adicione o espaçamento desejado */
        border: 1px solid #ccc;
        /* Adicione uma borda para destacar o input */
        border-radius: 5px;
        /* Adicione bordas arredondadas, se desejar */
        background-color: #fff;
        /* Define o fundo branco */
        width: 100%;
        /* Faça o input ocupar toda a largura do contêiner pai */
        box-sizing: border-box;
        /* Inclua padding e borda no tamanho total do input */
    }

    /* Estilo para o label */
    label {
        display: block;
        /* Certifica-se de que o label ocupa uma linha inteira */
        margin-bottom: 5px;
        /* Adicione espaçamento abaixo do label, se desejar */
    }

    /* Estilo para agrupar o input e o label */

    /* Estilo para o formulário */
</style>
<br>
<?php require 'rodape.php'; ?>