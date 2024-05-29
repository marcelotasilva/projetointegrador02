<style>
    a{
        color: mediumturquoise;
    }
    p{
        color: red;
    }
</style>
<?php
foreach ($empresas as $vaga) {
echo "<tr>";
    echo "<td>" . $vaga['tipo_vaga'] . "</td>";
    echo "<td>" . $vaga['descricao'] . "</td>";
    echo "<td>" . $vaga['data_publicacao'] . "</td>";
    echo "<td>" . $vaga['salario'] . "</td>";    
    echo "<td>" . $vaga['carga_horaria'] . "</td>";    
    echo "<td>" . $vaga['local_trabalho'] . "</td>";    
    echo "<td>" . $vaga['regime'] . "</td>";    
    echo "<td>" . $vaga['requisitos'] . "</td>";
    // Consulta o banco de dados para obter os currículos associados à vaga
    $query = "SELECT curriculos.id_curriculo, curriculos.usuarios_id_usuario, usuarios.nome, usuarios.email
              FROM curriculos
              JOIN usuarios ON curriculos.usuarios_id_usuario = usuarios.id_usuario
              WHERE curriculos.vagas_id_vaga = :id_vaga";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_vaga', $vaga['id_vaga'], PDO::PARAM_INT);
    $stmt->execute();
    $curriculos = $stmt->fetchAll();
    if ($stmt->rowCount() > 0) {
        echo "<td><a href='pag_visualizar_curriculos.php?id_vaga={$vaga['id_vaga']}'>Visualizar Currículos</a></td>";
    } else {
        echo "<td>Nenhum currículo cadastrado</td>";
    }
    echo "<td><a href='pag_atualizar_cad_vaga.php?id_vaga={$vaga['id_vaga']}'>Modificar Atualizar</a></td>";        
      

    echo "</tr>";
}
