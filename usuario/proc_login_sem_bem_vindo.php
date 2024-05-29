<?php
session_start();
require "../conecta_bd.php";

// Função para verificar se o usuário está logado
function isUsuarioLogado()
{
    return isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'];
}

// Função para obter os dados do usuário com base no ID da sessão
function obterDadosUsuario($db)
{
    if (isUsuarioLogado()) {
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $_SESSION['id_usuario']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}

// Verifica se o usuário não está autenticado e não está na página de login
if (!isUsuarioLogado() && basename($_SERVER['PHP_SELF']) !== 'pag_login.php') {
?>
    <script>
        Swal.fire({
            position: "center",
            icon: "warning",
            title: "Você não está autenticado!",
            text: "Primeiro faça login no sistema!",             
            showConfirmButton: true,
            confirmButtonColor: "#2572E8",
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "pag_login.php"
            }
        });
    </script>
<?php
    // header("Location: pag_login.php");
    exit();
}

$usuario = obterDadosUsuario($db);
?>