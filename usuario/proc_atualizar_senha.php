<?php
require 'proc_login_sem_bem_vindo.php';
require 'cabecalho_pvg.php';
require './alert_personalizado.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se a nova senha e a confirmação de senha foram fornecidas
    if (!empty($_POST['nova_senha']) && !empty($_POST['re_nova_senha'])) {
        // Verifica se as senhas coincidem
        if ($_POST['nova_senha'] == $_POST['re_nova_senha']) {
            // Conecta no banco de dados
            require "../conecta_bd.php";

            // Hash da nova senha
            $nova_senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
            
            // ID do usuário
            $id_usuario = $_SESSION['id_usuario'];

            // Atualiza a senha do usuário no banco de dados
            $stmt = $db->prepare("UPDATE usuarios SET senha = :nova_senha WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':nova_senha', $nova_senha);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();            
            if ($stmt->rowCount() > 0) {
                ?>        
                <script>
                    alerta_cadastro("success", "Senha atualizada com sucesso!");
                </script>
                <?php 
            } else {
                ?>        
                <script>
                    alerta_cadastro("error", "Erro ao atualizar a senha.");
                </script>
                <?php  
            }
        } else {
            ?>        
            <script>
                alerta_cadastro("warning", "As senhas não coincidem!");
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
