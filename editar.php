<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Atualizar usuario</title>

<?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $Nome = $_POST['Nome'];
    $Email = $_POST['Email'];
    $Telefone = $_POST['Telefone'];
    $Senha = $_POST['Senha'];

    $sql = "UPDATE Clientes SET Nome='$Nome', Email='$Email', Telefone='$Telefone', Senha='$Senha' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
    } else {
    $id = $_GET['id'];
    $sql = "SELECT id, Nome, Email, Telefone, Senha FROM Clientes WHERE id=$id";
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
    <form method="post" action="editar.php">
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
        Nome: <input type="text" name="Nome" value="<?php echo $tarefa['Nome']; ?>"><br>
        Email: <input type="text" name="Email" value="<?php echo $tarefa['Email']; ?>"><br>
        Telefone: <input type="text" name="Telefone" value="<?php echo $tarefa['Telefone']; ?>"><br>
        Senha: <input type="text" name="Senha" value="<?php echo $tarefa['Senha']; ?>"><br>
        <input type="submit" value="Salvar">
    </form>