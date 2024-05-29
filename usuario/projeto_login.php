
<?php
session_start();
require '../conecta_bd.php';

if (array_key_exists('email', $_POST) && array_key_exists('senha', $_POST)) {
    $senhaDigitada = $_POST['senha'];
    $res = $db->query("SELECT * FROM usuarios WHERE email = '{$_POST['email']}'");
    $linha = $res->fetch();

    if ($linha && password_verify($senhaDigitada, $linha['senha'])) {
        $_SESSION['id_usuario'] = $linha['id_usuario'];
        $usuario = $linha;
        // Usuário autenticado, redirecione para a página "pesq_vaga.php"
        header("Location: pesq_vaga.php");
        exit;
    } else {
        // Senha ou email incorretos, exibir mensagem de aviso
        require 'cabecalho_ln.php';
        echo '<h1 style="color: red;">Email ou senha incorretos. Tente novamente.</h1>';
    }
} else {
    // Dados de login ausentes, redirecione para a página "login.php"
    header("Location: login.php");
    exit;
}
?>
