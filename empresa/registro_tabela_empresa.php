<?php
foreach ($empresas as $empresa) {
echo "<tr>";
    echo "<td>" . $empresa['nome_fantasia'] . "</td>";
    echo "<td>" . $empresa['email'] . "</td>";
    // echo "<td>" . md5($usuario['senha']) . "</td>";
    echo "<td>" . $empresa['cnpj'] . "</td>";
    echo "<td>" . $empresa['inscricao_estadual'] . "</td>";


}