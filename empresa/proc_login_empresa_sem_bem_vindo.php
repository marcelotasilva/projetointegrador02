<?php
session_start();
require "../conecta_bd.php";
require '../alert_personalizado.php';

// Função para verificar se o usuário está logado
function seEmpresaLogada()
{
    return isset($_SESSION['id_empresa']) && $_SESSION['id_empresa'];
}

// Função para obter os dados do usuário com base no ID da sessão
function obterDadosUsuario($db)
{
    if (seEmpresaLogada()) {
        $stmt = $db->prepare("SELECT * FROM empresas WHERE id_empresa = :id_empresa");
        $stmt->bindParam(':id_empresa', $_SESSION['id_empresa']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}

// Verifica se o usuário não está autenticado e não está na página de login
if (!seEmpresaLogada() && basename($_SERVER['PHP_SELF']) !== 'pag_login_empresa.php') {
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
                window.location.href = "pag_login_empresa.php"
            }
        });
    </script>
<?php
    // header("Location: pag_login_empresa.php");
    exit();
}

$usuario = obterDadosUsuario($db);
?>