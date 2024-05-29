<?php
foreach ($usuarios as $usuario) {
echo "<tr>";
    echo "<td>" . $usuario['nome'] . "</td>";
    echo "<td>" . $usuario['email'] . "</td>";
    // echo "<td>" . md5($usuario['senha']) . "</td>";
    echo "<td>" . $usuario['cpf'] . "</td>";
    // Formatando a data de nascimento
    $data_nascimento = strtotime($usuario['data_nascimento']);
    echo "<td>" . date("d/m/Y", $data_nascimento) . "</td>";    
    echo "</tr>";
}