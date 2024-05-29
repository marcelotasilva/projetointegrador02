<?php
require 'proc_login_sem_bem_vindo.php';
require 'cabecalho_pvg.php';
require '../alert_personalizado.php';
if (isset($_GET['id_curriculo'])) {
    $id_curriculo = $_GET['id_curriculo'];

    // Verifica se o cadastro já existe
    $sql = "SELECT * FROM curriculos
WHERE id_curriculo = :id_curriculo
AND usuarios_id_usuario = :id_usuario";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_curriculo', $id_curriculo);
    $stmt->bindParam(':id_usuario', $_SESSION['id_usuario']);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // O cadastro já existe
    }
?><br><br><br><br><br>
    <div class="form-box" class="page">
        <form action="proc_envia_curriculo_atualizado.php" method="post" class="form" enctype="multipart/form-data" class="formLogin">
            <span class="title">Enviar curriculo</span>
            <span class="subtitle">Atualizado</span>
            <div class="form-container">

                <label for="curriculo">Arquivo PDF do Currículo:</label>
                <input type="file" name="curriculo" accept=".pdf" required>

                <input type="text" name="id_curriculo" id="vaga_id" value="<?= $id_curriculo ?>" hidden readonly>

            </div>
            <button type="submit" class="beautiful-button" class="button">Enviar</button>
        </form>
    </div>
    </div>

<?php
} else {
    echo "ID da vaga não especificado.";
}
echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
require 'rodape.php';
?>
<style>
    .tab_cadastro {
        margin: 0 auto;
        text-align: right;
        color: white;
    }

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