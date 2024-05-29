<?php
include 'proc_login_sem_bem_vindo.php'; 
include 'cabecalho_pvg.php';
include "../conecta_bd.php"; 
require '../alert_personalizado.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $curriculo_nome = $_FILES['curriculo']['name'];
    $curriculo_tmp = $_FILES['curriculo']['tmp_name'];
    $id_curriculo = $_POST['id_curriculo'];

    try {
        // Verifique se o ID da vaga é válido
        $query_verifica_vaga = "SELECT * FROM curriculos WHERE id_curriculo = :id_curriculo";
        $stmt_verifica_vaga = $db->prepare($query_verifica_vaga);
        $stmt_verifica_vaga->bindParam(':id_curriculo', $id_curriculo, PDO::PARAM_INT);
        $stmt_verifica_vaga->execute();

        if ($stmt_verifica_vaga->rowCount() == 0) {
            die("ID da vaga inválido.");
        }

        // Prepare a query de inserção
        $query = "UPDATE `curriculos` SET `arquivo_pdf`= :arquivo_pdf WHERE id_curriculo = :id_curriculo";

        // Ler o conteúdo do arquivo
        $curriculo_conteudo = file_get_contents($curriculo_tmp);

        // Prepare a declaração
        $stmt = $db->prepare($query);

        // Execute a declaração
        $stmt->bindParam(':arquivo_pdf', $curriculo_conteudo, PDO::PARAM_LOB);
        $stmt->bindParam(':id_curriculo', $id_curriculo, PDO::PARAM_INT);
        $stmt->execute();
        ?>     
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Currículo atualizado com sucesso!",
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
    } catch (PDOException $erro) {
        echo "Erro ao cadastrar o currículo: " . $erro->getMessage();
    }
}
?>
