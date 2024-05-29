<?php
require('proc_login_empresa_sem_bem_vindo.php');
require('../cabecalho_empresa.php');
require('../alert_personalizado.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $tipo_vaga = $_POST["tipo_vaga"];
    $descricao = $_POST["descricao"];
    $salario = $_POST["salario"];
    $carga_horaria = $_POST["carga_horaria"];
    $local_trabalho = $_POST["local_trabalho"];
    $regime = $_POST["regime"];
    $requisitos = $_POST["requisitos"];
    $id_vaga = $_POST["id_vaga"];    

    try {
        // Preparar a query de atualizar vaga
        include("../conecta_bd.php");
        $query = "UPDATE vagas 
          SET tipo_vaga = ?, descricao = ?, salario = ?, carga_horaria = ?, local_trabalho = ?, regime = ?, requisitos = ?
          WHERE empresas_id_empresa = ? AND id_vaga = ? ";

        // Preparar a declaração
        $stmt = $db->prepare($query);

        // Executar a declaração
        $stmt->execute([$tipo_vaga, $descricao, $salario, $carga_horaria, $local_trabalho, $regime, $requisitos, $_SESSION['id_empresa'], $id_vaga]);

?>
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Vaga atualizada com sucesso!",
                showConfirmButton: true,
                confirmButtonColor: "#2572E8",
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "pag_mostrar_vagas.php"
                }
            });

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