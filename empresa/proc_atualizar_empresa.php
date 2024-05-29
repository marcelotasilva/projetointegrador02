<?php
// Iniciar a sessão no início do script
session_start();
?>
<?php require '../cabecalho_empresa.php';
require('../alert_personalizado.php'); ?>


<?php
if (
    !empty($_POST['nome_fantasia']) && !empty($_POST['email'])
) {
    // // Validar o formato do email
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // Conecta no banco de dados
        require "../conecta_bd.php";
        if (array_key_exists('id_empresa', $_SESSION) && $_SESSION['id_empresa'] && !isset($empresa)) {
            $res = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
            $empresa = $res->fetch();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['id_empresa'];
            $nome_fantasia = $_POST['nome_fantasia'];
            $email = $_POST['email'];
            $cnpj = $_POST['cnpj'];
            $inscricao_estadual = $_POST['inscricao_estadual'];
            $stmt = $db->prepare("UPDATE empresas 
            SET email = :email, nome_fantasia = :nome_fantasia, cnpj = :cnpj, inscricao_estadual = :inscricao_estadual 
            WHERE id_empresa = :id_empresa");

            $stmt->bindParam(':id_empresa', $id);
            $stmt->bindParam(':nome_fantasia', $nome_fantasia);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':inscricao_estadual', $inscricao_estadual);
            $linhas_afetadas = $stmt->execute();
            if ($linhas_afetadas > 0) {
?>
                <script>
                    alerta_cadastro("success", "Cadastro atualizado com sucesso!");
                </script>
                <h1>Informação do Usuário</h1>
                <div class="table-container">
                    <table id="customers">
                        <?php require 'titulo_tabela_empresa.php'; ?>
                <?php
                $consulta = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
                $empresas = $consulta->fetchAll();
                require 'registro_tabela_empresa.php';
            } else {
                echo 'Nenhuma linha foi afetada!';
            }
        } // fim if verifica utilização fora do POST  
        else {
            echo 'Método inválido. Utilize o método POST para atualizar os dados.';
        }
    } else {
                ?>
                <script>
                    alerta_cadastro("warning", "O email fornecido não é válido!");
                </script>
            <?php
        }
    } // fim if verifica os campos preenchidos 
    else {
            ?>
            <script>
                alerta_cadastro("warning", "Por favor, preencha todos os campos!");
            </script>
            <?php
            ?>
            <br><br><button class="button" id="redirectButton">Voltar</button>
        <?php
    }
        ?>
        <script>
            document.getElementById("redirectButton").addEventListener("click", function() {
                window.history.back();
            });
        </script>

        <?php require '../fim.php'; ?>