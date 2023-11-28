<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Atualizar editora</title>

<?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $Nome = $_POST['Nome'];
    $Endereco = $_POST['Endereco'];

    $sql = "UPDATE editoras SET Nome='$Nome', Endereco='$Endereco' WHERE id=$id";
   if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
    } else {
    $id = $_GET['id'];
    $sql = "SELECT id, Nome, Endereco FROM editoras WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0){
        $tarefa = $result->fetch_assoc();
    } else {
        echo "Tarefa não encontrada!";
        exit;
    }
    }

    $conexao->close();
?>
    <form method="post" action="editar_editoras.php">
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
        Nome: <input type="text" name="Nome" value="<?php echo $tarefa['Nome']; ?>"><br>
        Endereco: <input type="text" name="Endereco" value="<?php echo $tarefa['Endereco']; ?>"><br>
        <input type="submit" value="Salvar">
    </form>