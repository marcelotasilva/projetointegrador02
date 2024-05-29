<?php
require "../conecta_bd.php";

if (isset($_GET['id_curriculo'])) {
    $id_curriculo = $_GET['id_curriculo'];

    // Consulta o banco de dados para obter o currículo
    $query = "SELECT arquivo_pdf FROM curriculos WHERE id_curriculo = :id_curriculo";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_curriculo', $id_curriculo, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $arquivo_pdf = $result['arquivo_pdf'];

        // Define o cabeçalho para indicar que é um arquivo PDF
        header('Content-Type: application/pdf');

        // Define o cabeçalho para indicar o nome do arquivo desejado ao fazer o download
        header('Content-Disposition: attachment; filename="curriculos-arquivo.pdf"');

        // Envia o conteúdo do arquivo para o navegador
        echo $arquivo_pdf;
    } else {
        // Currículo não encontrado
        echo "Currículo não encontrado.";
    }
} else {
    // ID do currículo não especificado
    echo "ID do currículo não especificado.";
}
?>