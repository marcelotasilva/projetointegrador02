<?php
session_start();
require "../cabecalho_empresa.php";
require '../alert_personalizado.php';
// Conecta no banco de dados
require "../conecta_bd.php";

if (isset($_SESSION['id_usuario'])) {
    // Se a sessão do usuário estiver definida, ele está logado
    $res = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
    $usuario = $res->fetch();

?>
    <script>
        Swal.fire({
            title: "Confirmar saída",
            text: "<?php echo $usuario['nome']; ?>, tem certeza que deseja sair do sistema?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, sair!"
        }).then((result) => {
            if (result.isConfirmed) {
                <?php session_destroy(); ?>
                window.location.href = "../index.php"
            }
        });
    </script>
<?php
} elseif (isset($_SESSION['id_empresa'])) {
    // Se a sessão do usuário estiver definida, ele está logado
    $res = $db->query("SELECT * FROM empresas WHERE id_empresa = '{$_SESSION['id_empresa']}'");
    $empresa = $res->fetch();

?>
    <script>
        Swal.fire({
            title: "Confirmar saída",
            text: "<?php echo $empresa['nome_fantasia']; ?>, tem certeza que deseja sair do sistema?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, sair!"
        }).then((result) => {
            if (result.isConfirmed) {
                <?php session_destroy(); ?>
                window.location.href = "../index.php"
            }
        });
    </script>
<?php
} else {
    // Caso contrário, mostra um alert e envia para a página de "index.php"   
?>
    <script>
        Swal.fire({
            position: "center",
            icon: "warning",
            title: "Você não está logado no sistema!",
            showConfirmButton: true,
            confirmButtonColor: "#2572E8",
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../index.php"
            }
        });
    </script>
<?php

    // header("Location: index.php");
    exit();
}

if (isset($_GET['sair'])) {
    // Se a variável 'sair' estiver definida na URL, deslogue o usuário
    session_destroy();
    header("Location: index.php");
    exit();
}
require "../fim.php"; ?>