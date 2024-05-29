function alerta_cadastro(icone, titulo){
    Swal.fire({
        position: "center",
        icon: icone,
        title: titulo,
        showConfirmButton: true,
        confirmButtonColor: "#2572E8",
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            window.history.back();
        }
    });
}





function alerta_sucesso(icone, titulo){
    Swal.fire({
        position: "center",
        icon: icone,
        title: titulo,
        showConfirmButton: true,
        confirmButtonColor: "#2572E8",
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "index.php";
        }
    });
}