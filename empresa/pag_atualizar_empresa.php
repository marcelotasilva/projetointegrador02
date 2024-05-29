<?php
// Iniciar a sessão no início do script
session_start();
?>

<?php require '../cabecalho_empresa.php'; ?>
<br><br>
<h1>Informações da Empresa</h1>
<div class="table-container">
    <table id="customers">
        <?php require 'titulo_tabela_empresa.php'; ?>
        <?php
        // Conecta no banco de dados
        require "../conecta_bd.php";

        // Verifica se o usuário está logado e carrega seus dados
        if (array_key_exists('id_empresa', $_SESSION) && $_SESSION['id_empresa'] && !isset($empresas)) {
            $res = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
            $empresa = $res->fetch();
        }

        // Consulta os dados do usuário
        $consulta = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
        $empresas = $consulta->fetchAll();
        require 'registro_tabela_empresa.php';
        ?>
    </table>
</div>
<h1>Formulário para atualizar o cadastro</h1>
<div class="form-box">
    <form action="proc_atualizar_empresa.php" method="post" class="form">
        <span class="title">Atualizar</span>
        <span class="subtitle">Cadastro</span>
        <div class="form-container">

            <label for="id_nome_fantasia">Nome fantasia:</label>
            <!-- Input para o nome com o valor preenchido com o nome do usuário -->
            <input type="text" name="nome_fantasia" id="id_nome_fantasia" value="<?php echo $empresa['nome_fantasia']; ?>">


            <label for="id_email">E-mail:</label>
            <!-- Input para o email com o valor preenchido com o email do usuário -->
            <input type="email" name="email" id="id_email" value="<?php echo $empresa['email']; ?>" required>



            <label for="id_cnpj">CNPJ:</label>
            <!-- Input para o email com o valor preenchido com o email do usuário -->
            <input type="text" name="cnpj" id="id_cnpj" value="<?php echo $empresa['cnpj']; ?>">


            <label for="id_inscricao_estadual">Inscricao Estadual:</label>
            <!-- Input para o email com o valor preenchido com o email do usuário -->
            <input type="text" name="inscricao_estadual" id="id_inscricao_estadual" value="<?php echo $empresa['inscricao_estadual']; ?>">


        </div>
        <button type="submit" class="beautiful-button" class="button">Atualizar</button>
    </form>
</div>
<br><br><br><br>
<style>
    .form-box {
        max-width: 300px;
        margin: 0 auto;
        /* Adicione esta linha para centralizar o formulário */
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
<?php require 'rodape.php'; ?>