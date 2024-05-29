<?php
// Início da sessão
session_start();

// Inclusão do arquivo de conexão com o banco de dados
require "../conecta_bd.php";

// Verifica se as chaves 'email' e 'senha' existem no array $_POST
if (array_key_exists('email', $_POST) && array_key_exists('senha', $_POST)) {
    // Consulta o banco de dados para encontrar o usuário com o email fornecido
    $res = $db->query("SELECT * FROM usuarios WHERE email = '{$_POST['email']}'");
    
    // Obtém a primeira linha do resultado da consulta
    $linha = $res->fetch();
    
    // Verifica se o usuário foi encontrado e a senha está correta
    if ($linha && $linha['senha'] === $_POST['senha']) {
        // Define a variável de sessão 'id_usuario'
        $_SESSION['id_usuario'] = $linha['id_usuario'];
        
        // Atribui os dados do usuário à variável $usuario
        $usuario = $linha;
    }
}

// Se o 'id_usuario' está definido na sessão e não há dados na variável $usuario, busca o usuário pelo 'id_usuario'
if (array_key_exists('id_usuario', $_SESSION) && $_SESSION['id_usuario'] && !isset($usuario)) {
    $res = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
    $usuario = $res->fetch();
}

// Se a variável $usuario está definida, exibe informações do usuário
if (isset($usuario)) { ?>
    <?php require '../cabecalho_lx.php'; ?>
    <h1>O cadastro:</h1>
    <h1><?php echo "Nome: " . $usuario['nome']; ?></h1>
    <h1><?php echo "E-mail: " . $usuario['email']; ?></h1>
    <?php

    // Prepara e executa a exclusão de registros relacionados na tabela 'curriculos'
    $stmt = $db->prepare("DELETE FROM curriculos WHERE usuarios_id_usuario = :id_usuario");
    $stmt->bindParam(':id_usuario', $usuario['id_usuario']);
    $stmt->execute();

    // Prepara e executa a exclusão do usuário na tabela 'usuarios'
    $stmt = $db->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
    $stmt->bindParam(':id_usuario', $usuario['id_usuario']);
    $linhas_afetadas = $stmt->execute();
    // Verifica se a exclusão foi bem-sucedida e realiza as ações correspondentes
    if ($linhas_afetadas > 0) {
        echo '<h2>Foi removido com sucesso!</h2><br>';
        session_destroy();
    } else {
        echo '<h2>Nenhuma linha foi afetada!</h2>';
    } ?>
    <?php require '../fim.php'; ?>
<?php
} else {
    // Se não há usuário válido, redireciona para a página de login
    ?>
    <script>
        window.location.href = "login.php";
    </script>
    <?php
} // Fim do if
?>
