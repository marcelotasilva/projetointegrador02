<?php
require('proc_login_sem_bem_vindo.php');
require('cabecalho_pvg.php');
require('../alert_personalizado.php');
// Iniciar a sessão no início do script
?>

<?php
if (
    !empty($_POST['nome']) && !empty($_POST['email'])
) {
    // // Validar o formato do email
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // Conecta no banco de dados
        require "../conecta_bd.php";
        if (array_key_exists('id_usuario', $_SESSION) && $_SESSION['id_usuario'] && !isset($usuario)) {
            $res = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
            $usuario = $res->fetch();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['id_usuario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $data_nascimento = $_POST['data_nascimento'];
            $stmt = $db->prepare("UPDATE usuarios 
            SET email = :email, nome = :nome, cpf = :cpf, data_nascimento = :data_nascimento 
            WHERE id_usuario = :id_usuario");

            $stmt->bindParam(':id_usuario', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $linhas_afetadas = $stmt->execute();
            if ($linhas_afetadas > 0) {
?>
                <script>
                    alerta_cadastro("success", "Cadastro atualizado com sucesso!");
                </script>
                <h1>Informação do Usuário</h1>
                <div class="table-container">
                    <table id="customers">
                        <?php require 'titulo_tabela.php'; ?>
                <?php
                $consulta = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
                $usuarios = $consulta->fetchAll();
                require 'registro_tabela.php';
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