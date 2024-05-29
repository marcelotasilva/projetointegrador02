<?php
include 'proc_login_sem_bem_vindo.php';
require 'cabecalho_pvg.php';
require '../alert_personalizado.php';
require "../conecta_bd.php";

if (isset($_GET['id_curriculo'])) {
    $id_curriculo = $_GET['id_curriculo'];

    // Consulta o banco de dados para obter o currículo
    $query = "DELETE FROM `curriculos` WHERE id_curriculo = :id_curriculo";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_curriculo', $id_curriculo, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
?>
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Currículo apagado com sucesso!",
                showConfirmButton: true,
                confirmButtonColor: "#2572E8",
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "pesq_vaga.php"
                }
            });
        </script>
    <?php
    } else {
        // Currículo não encontrado
    ?>
        <script>
            alerta_cadastro("warning", "Currículo não encontrado!");
        </script>
    <?php
    }
} else {
    // ID do currículo não especificado
    ?>
    <script>
        alerta_cadastro("warning", "ID do currículo não especificado!");
    </script>
<?php
}
?>