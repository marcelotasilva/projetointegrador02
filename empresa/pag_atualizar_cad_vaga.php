<?php
require 'proc_login_empresa_sem_bem_vindo.php';
require '../cabecalho_empresa.php';
require '../alert_personalizado.php';

if (isset($_GET['id_vaga']) && isset($_SESSION['id_empresa'])) {
    $id_vaga = $_GET['id_vaga'];
    $id_empresa = $_SESSION['id_empresa'];

    // Consulta o banco de dados para obter os currículos associados à vaga
    $query = "SELECT * FROM `vagas` WHERE id_vaga = :id_vaga AND empresas_id_empresa = :id_empresa";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT);
    $stmt->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
    $stmt->execute();
    $empresa = $stmt->fetchAll();
    foreach ($empresa as $vaga) {
?><br><br>
        <div class="form-box">
            <form action="proc_atualizar_cad_vaga.php" method="post" class="form">
                <span class="title">Atualizar</span>
                <span class="subtitle">Vaga</span>
                <div class="form-container">

                    <label for="tipo_vaga">Tipo de Vaga:</label>
                    <input type="text" name="tipo_vaga" id="tipo_vaga" value="<?php echo $vaga['tipo_vaga']; ?>" required>



                    <label for="descricao">Descrição:</label>
                    <input type="text" name="descricao" id="descricao" value="<?php echo $vaga['descricao']; ?>" required>



                    <label for="salario">Salário:</label>
                    <input type="text" name="salario" id="salario" value="<?php echo $vaga['salario']; ?>" required>



                    <label for="carga_horaria">Carga Horária:</label>
                    <input type="text" name="carga_horaria" id="carga_horaria" value="<?php echo $vaga['carga_horaria']; ?>" required>



                    <label for="local_trabalho">Local de Trabalho:</label>
                    <input type="text" name="local_trabalho" id="local_trabalho" value="<?php echo $vaga['local_trabalho']; ?>" required>



                    <label for="regime">Regime de Contratação:</label>
                    <input type="text" name="regime" id="regime" value="<?php echo $vaga['regime']; ?>" required>



                    <label for="requisitos">Requisitos:</label>
                    <input type="text" name="requisitos" id="requisitos" value="<?php echo $vaga['requisitos']; ?>" required>

                
                    
                    <input type="text" name="id_vaga" id="id_vaga" value="<?php echo $vaga['id_vaga']; ?>" hidden>

                </div>
                <button type="submit" class="beautiful-button" class="button">Atualizar Vaga</button>
            </form>
        </div>
<?php
    } //FIM foreach

} //FIM IF
?><br><br><br>
<?php require 'rodape.php'; ?>
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

    textarea {
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