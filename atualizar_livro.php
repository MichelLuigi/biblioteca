<title>Atualizar livros</title>

<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $livro_id = $_POST['livro_id'];
    $Titulo = $_POST['Titulo'];
    $Autor_id = $_POST['Autor'];
    $Data_lancamento = $_POST['Data_lancamento'];
    $Genero_id = $_POST['genero_literario'];
    $Editora_id = $_POST['editoras'];

    if (empty($Titulo) || empty($Data_lancamento)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $Titulo = $conexao->real_escape_string($Titulo);
        $Data_lancamento = $conexao->real_escape_string($Data_lancamento);
        $Data_lancamento = date("Y-m-d", strtotime(str_replace('/', '-', $Data_lancamento)));
        $sql = "UPDATE Livros SET Titulo=?, Autor_id=?, Data_lancamento=?, Genero_id=?, Editora_id=?, cliente_id=? WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sissiii", $Titulo, $Autor_id, $Data_lancamento, $Genero_id, $Editora_id, $cliente_id, $livro_id);

        if ($stmt->execute() === TRUE){
            header("Location: listar.php");
            exit();
        } else {
            echo "Erro: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conexao->close();
?>
