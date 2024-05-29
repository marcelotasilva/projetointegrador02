<?php
require 'proc_login_sem_bem_vindo.php';
require 'cabecalho_pvg.php';
require './alert_personalizado.php';

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se a nova senha, confirmação de senha e telefone foram fornecidos
    if (!empty($_POST['telefone'])) {
            // Conecta no banco de dados
            require "../conecta_bd.php";

            // recupera o telefona via o POST
            $telefone = $_POST['telefone'];
            
            // ID do usuário
            $id_usuario = $_SESSION['id_usuario'];

            // Recupera o ID do telefone (ou cadastra um novo telefone)
            $stmtTelefone = $db->prepare("SELECT id_telefone FROM telefones WHERE telefone = :telefone");
            $stmtTelefone->bindParam(':telefone', $telefone);
            $stmtTelefone->execute();
            $rowTelefone = $stmtTelefone->fetch(PDO::FETCH_ASSOC);

            if (!$rowTelefone) {
                // Se o telefone não existir, cadastra o novo telefone
                $stmtNovoTelefone = $db->prepare("INSERT INTO telefones (telefone) VALUES (:telefone)");
                $stmtNovoTelefone->bindParam(':telefone', $telefone);
                $stmtNovoTelefone->execute();
                
                // Recupera o ID do novo telefone cadastrado
                $id_telefone = $db->lastInsertId();
            } else {
                // Se o telefone já existir, utiliza o ID existente
                $id_telefone = $rowTelefone['id_telefone'];
            }

            // Relaciona o telefone com o usuário
            $stmtRelacionamento = $db->prepare("INSERT INTO usuarios_tem_telefones (usuarios_id_usuario, telefones_id_telefone) VALUES (:id_usuario, :id_telefone)");
            $stmtRelacionamento->bindParam(':id_usuario', $id_usuario);
            $stmtRelacionamento->bindParam(':id_telefone', $id_telefone);
            $stmtRelacionamento->execute();

            if ($stmtRelacionamento->rowCount() > 0) {
                ?>        
                <script>
                    alerta_cadastro("success", "Senha e telefone atualizados com sucesso!");
                </script>
                <?php 
            } else {
                ?>        
                <script>
                    alerta_cadastro("error", "Erro ao atualizar a senha ou cadastrar telefone.");
                </script>
                <?php  
            }
    } else {
        ?>        
        <script>
            alerta_cadastro("warning", "Por favor, preencha todos os campos!");
        </script>
        <?php 
    }
} else {
    echo 'Método inválido. Utilize o método POST para atualizar a senha.';
}
?>
