<?php
require 'cabecalho_ln.php';

if (
    !empty($_POST['nome']) && !empty($_POST['email'])
    && !empty($_POST['senha']) && !empty($_POST['senha'])
) {
    if ($_POST['senha'] == $_POST['senha']) {
        // Conecta no banco de dados
        require "../conecta_bd.php";

        // Verifica se o email já está em uso
        $email = $_POST['email'];
        $stmt = $db->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<h1>Este email já está em uso. Por favor, escolha outro!</h1>";
        } else {
            // Prepare a consulta SQL com marcadores de posição
            $nome = $_POST['nome'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            require 'timezone.php';
            $data_cadastro = date("Y-m-d h:i:sa");
            $stmt = $db->prepare("INSERT INTO usuarios (id_usuario, nome, email, senha, data_cadastro) 
            VALUES (null, :nome, :email, :senha, :data_cadastro)");

            // Associe os valores aos marcadores de posição
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':data_cadastro', $data_cadastro);

            // Execute a consulta
            if ($stmt->execute()) {
                echo "<h1>Cadastro registrado com sucesso!</h1>";
            } else {
                echo "<h1>Erro, não foi possível realizar o cadastro no banco de dados</h1>";
            }
        }
    } else {
        echo "<h1>As senhas não conferem</h1>";
    }
} else {
    echo "<h1>Por favor, preencha todos os campos!</h1>";
}

require '../fim.php';
?>