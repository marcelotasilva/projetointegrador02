<style>
    a {
        color: mediumturquoise;
    }
    p {
        color: red;
    }
</style>
<?php
foreach ($vagas as $vaga) {
    echo "<tr>";
    echo "<td>" . $vaga['tipo_vaga'] . "</td>";
    echo "<td>" . $vaga['descricao'] . "</td>";
    echo "<td>" . $vaga['data_publicacao'] . "</td>";
    echo "<td>" . $vaga['salario'] . "</td>";
    echo "<td>" . $vaga['carga_horaria'] . "</td>";
    echo "<td>" . $vaga['local_trabalho'] . "</td>";
    echo "<td>" . $vaga['regime'] . "</td>";
    echo "<td>" . $vaga['requisitos'] . "</td>";
    if (!isset($vaga['id_curriculo'])) {
        echo "<td><a href='pag_cadastrar_curriculo.php?id_vaga={$vaga['id_vaga']}'>Candidatar-se</a></td>";
    } else {
        echo "<td><a href='proc_atualizar_curriculo.php?id_curriculo={$vaga['id_curriculo']}'>Reenviar Currículo</a></td>";
    }
    // Adiciona um link para baixar o currículo se houver um id_curriculo
    if (isset($vaga['id_curriculo'])) {
        echo "<td><a href='download_curriculo.php?id_curriculo=" . $vaga['id_curriculo'] . "'>Baixar Currículo cadastrado</a></td>";
    } else {
        echo "<td>Currículo não cadastrado!</td>";
    }
    if (isset($vaga['id_curriculo'])) {
        echo "<td><a href='proc_apagar_curriculo.php?id_curriculo=" . $vaga['id_curriculo'] . "'>Apagar Currículo</a></td>";
    } else {
        echo "<td>Currículo não cadastrado!</td>";
    }    


    echo "</tr>";
}

