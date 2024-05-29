<style>
    h1{
        color: white;
    }
</style>
<?php
require '../usuario/cabecalho_ln.php';

if (
    !empty($_POST['nome_fantasia']) && !empty($_POST['email'])
    && !empty($_POST['senha']) && !empty($_POST['senha'])
) {
    if ($_POST['senha'] == $_POST['senha']) {
        // Conecta no banco de dados
        require "../conecta_bd.php";

        // Verifica se o email já está em uso
        $email = $_POST['email'];
        $stmt = $db->prepare("SELECT id_empresa FROM empresas WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<h1>Este email já está em uso. Por favor, escolha outro!</h1>";
        } else {
            // Prepare a consulta SQL com marcadores de posição
            $nome = $_POST['nome_fantasia'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $cnpj = $_POST['cnpj'];
            $inscricao_estadual = $_POST['inscricao_estadual'];
            require 'timezone.php';
            $data_cadastro = date("Y-m-d h:i:sa");
            $stmt = $db->prepare("INSERT INTO empresas (id_empresa , nome_fantasia, email, senha, cnpj, inscricao_estadual, data_cadastro) 
            VALUES (null, :nome_fantasia, :email, :senha, :cnpj, :inscricao_estadual, :data_cadastro)");

            // Associe os valores aos marcadores de posição
            $stmt->bindParam(':nome_fantasia', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':inscricao_estadual', $inscricao_estadual);
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
    echo "Por favor, preencha todos os campos!";
}

require '../fim.php';
