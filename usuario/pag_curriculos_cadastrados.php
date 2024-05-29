<?php
include 'proc_login_sem_bem_vindo.php'; 
require 'cabecalho_pvg.php';
require '../alert_personalizado.php';

if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    // Consulta o banco de dados para obter os currículos associados à vaga
    $query = "SELECT curriculos.id_curriculo, curriculos.usuarios_id_usuario, usuarios.nome, usuarios.email
              FROM curriculos
              JOIN usuarios ON curriculos.usuarios_id_usuario = usuarios.id_usuario
              WHERE curriculos.usuarios_id_usuario = :id_usuario";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $curriculos = $stmt->fetchAll();

    if ($stmt->rowCount() > 0) {
        echo "<h1>Currículos Cadastrados para a Vaga</h1>";
        echo "<div class='table-container'>";
        echo "<table id='customers'>";
        echo "<tr><th>ID do Currículo</th><th>ID do Usuário</th><th>Nome do Usuário</th><th>Email do Usuário</th><th>Ação</th></tr>";

        foreach ($curriculos as $curriculo) {
            echo "<tr>";
            echo "<td>" . $curriculo['id_curriculo'] . "</td>";
            echo "<td>" . $curriculo['usuarios_id_usuario'] . "</td>";
            echo "<td>" . $curriculo['nome'] . "</td>";
            echo "<td>" . $curriculo['email'] . "</td>";
            echo "<td><a href='proc_apagar_curriculo.php?id_curriculo=" . $curriculo['id_curriculo'] . "'>Apagar Currículo</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        ?>        
        <script>
            alerta_cadastro("warning", "Não há currículos cadastrados!");
        </script>
        <?php          
    }
} else {
    echo "ID da vaga não especificado.";
}

require '../fim.php';
?>
<style>
    a{
        color:mediumturquoise;
    }
</style>
