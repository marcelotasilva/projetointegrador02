<?php require 'proc_login_sem_bem_vindo.php'; ?>
<?php require 'cabecalho_pvg.php' ?>
<br><br><br>
<h1>Vagas disponíveis para Cadastro:</h1><br>

<div>
    <label for="pesquisa">Pesquisar Vagas:</label>
    <input type="text" id="pesquisa" name="pesquisa" onkeyup="buscarVagas()">
</div><br>

<div class="table-container">
    <table id="customers">
        <?php require 'titulo_tabela_vagas.php'; ?>
        <?php
        // Conecta no banco de dados
        require "../conecta_bd.php";
        $consulta = $db->query("SELECT vagas.*, curriculos.id_curriculo
        FROM vagas
        LEFT JOIN curriculos ON vagas.id_vaga = curriculos.vagas_id_vaga;");
        $vagas = $consulta->fetchAll();
        require 'registros_tabela_vagas.php';
        ?>
    </table>
</div>

<?php require '../fim.php'; ?>

<script>
function buscarVagas() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("pesquisa");
    filter = input.value.toUpperCase();
    table = document.getElementById("customers");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; // Considerando que o nome da vaga está na primeira coluna
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    // Adiciona um evento de clique aos botões de candidatura
    var buttons = document.querySelectorAll('.candidatar-btn');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Lógica para o processo de candidatura
            alert("Você se candidatou à vaga!");
        });
    });
}
</script>


<style>
    label {
        color: white;
        font-size: 27px;
    }
</style><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require 'rodape.php' ?>