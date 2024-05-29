<?php
// Configuração da conexão com o banco de dados

// Informações de conexão com o banco de dados
$host = 'localhost';     // Endereço do servidor MySQL
$dbname = 'meu_banco';   // Nome do banco de dados que você deseja acessar
$username = 'root';      // Nome de usuário do banco de dados
$password = '';          // Senha do banco de dados (vazia no exemplo)

try {
    // Cria uma nova instância da classe PDO para estabelecer a conexão com o banco de dados
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Define o modo de tratamento de erros para PDO (lança exceções em caso de erro)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    // Em caso de erro na conexão, esta seção captura a exceção e exibe uma mensagem de erro
    die("Erro na conexão com o banco de dados: " . $erro->getMessage());
}
