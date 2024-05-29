<?php
require 'proc_login_empresa_sem_bem_vindo.php';
include '../cabecalho_empresa.php';
require '../alert_personalizado.php';
echo "<br><br><br>";
if (isset($_GET['id_vaga'])) {
    $id_vaga = $_GET['id_vaga'];

    // Consulta o banco de dados para obter os currículos associados à vaga
    $query = "SELECT curriculos.id_curriculo, curriculos.usuarios_id_usuario, usuarios.nome, usuarios.email
              FROM curriculos
              JOIN usuarios ON curriculos.usuarios_id_usuario = usuarios.id_usuario
              WHERE curriculos.vagas_id_vaga = :id_vaga";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT);
    $stmt->execute();
    $curriculos = $stmt->fetchAll();

    if ($stmt->rowCount() > 0) {
        echo "<h1>Currículos Cadastrados para a Vaga</h1>";
        echo "<div class='table-container'>";
        echo "<table id='customers'>";
        echo "<tr><th>Nome do Usuário</th><th>Email do Usuário</th><th>Ação</th></tr>";

        foreach ($curriculos as $curriculo) {
            echo "<tr>";
            echo "<td>" . $curriculo['nome'] . "</td>";
            echo "<td>" . $curriculo['email'] . "</td>";
            echo "<td><a href='download_curriculo.php?id_curriculo=" . $curriculo['id_curriculo'] . "'>Baixar Currículo</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        ?>        
        <script>
            alerta_cadastro("warning", "Não há currículos cadastrados para esta vaga!");
        </script>
        <?php          
    }
} else {
    echo "ID da vaga não especificado.";
}
echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
require 'rodape.php';
?>
<style>
    a{
        color: mediumturquoise;
    }
</style>
