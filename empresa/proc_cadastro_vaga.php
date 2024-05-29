<?php
// Inicie a sessão (se ainda não estiver iniciada)
session_start();
include("../conecta_bd.php");
require('../alert_personalizado.php');
require('../cabecalho_empresa.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $tipo_vaga = $_POST["tipo_vaga"];
    $descricao = $_POST["descricao"];
    $salario = $_POST["salario"];
    $carga_horaria = $_POST["carga_horaria"];
    $local_trabalho = $_POST["local_trabalho"];
    $regime = $_POST["regime"];
    $requisitos = $_POST["requisitos"];

    try {
        // Preparar a query de inserção
        include("../conecta_bd.php");
        $query = "INSERT INTO vagas (tipo_vaga, descricao, salario, carga_horaria, local_trabalho, regime, requisitos, empresas_id_empresa, data_publicacao) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        // Preparar a declaração
        $stmt = $db->prepare($query);

        // Executar a declaração
        $stmt->execute([$tipo_vaga, $descricao, $salario, $carga_horaria, $local_trabalho, $regime, $requisitos, $_SESSION['id_empresa']]);
?>
        <script>
            alerta_cadastro("success", "Vaga cadastrada com sucesso!");
        </script>
<?php
    } catch (PDOException $erro) {
        echo "Erro ao inserir a vaga: " . $erro->getMessage();
    }
}

// Buscar dados da empresa e armazenar na variável de sessão
if (array_key_exists('id_empresa', $_SESSION) && $_SESSION['id_empresa'] && !isset($_SESSION['empresa'])) {
    $res = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
    $_SESSION['empresa'] = $res->fetch();
}
?>
