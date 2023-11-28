<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Atualizar genero</title>

<?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $Genero = $_POST['Genero'];
    $Data_Criacao = $_POST['Data_Criacao'];

    $sql = "UPDATE genero_literario SET Genero='$Genero', Data_Criacao='$Data_Criacao' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
    } else {
    $id = $_GET['id'];
    $sql = "SELECT id, Genero, Data_Criacao FROM genero_literario WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $tarefa = $result->fetch_assoc();
    } else {
        echo "Tarefa não encontrada!";
        exit;
    }
    }

    $conexao->close();
?>
    <form method="post" action="editar_genero_literario.php">
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
        Genero: <input type="text" name="Genero" value="<?php echo $tarefa['Genero']; ?>"><br>
        Data_Criacao: <input type="text" name="Data_Criacao" value="<?php echo $tarefa['Data_Criacao']; ?>"><br>
        <input type="submit" value="Salvar">
    </form>
