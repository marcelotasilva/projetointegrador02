<?php
session_start();
if (isset($_SESSION['id_empresas'])) {
    echo "ID Empresa: " . $_SESSION['id_empresa'] . "<br>";
} else {
    echo "Sessão da Empresa não existe!<br>";
}
 
if (isset($_SESSION['id_usuario'])) {
    echo "ID Usuário: " . $_SESSION['id_usuario'] . "<br>";
    echo "Nome Usuário: " . $_SESSION['nome'] . "<br>";    
} else {
    echo "Sessão da Usuário não existe!<br>";
}