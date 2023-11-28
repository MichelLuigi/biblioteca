<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Atualizar autor</title>

<?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $Nome = $_POST['Nome'];
    $Pais_De_Origem = $_POST['Pais_De_Origem'];
    $Data_De_Nascimento = $_POST['Data_De_Nascimento'];
    $Data_De_Falecimento = $_POST['Data_De_Falecimento'];


    $sql = "UPDATE Autor SET Nome='$Nome', Pais_De_Origem='$Pais_De_Origem', Data_De_Nascimento='$Data_De_Nascimento', Data_De_Falecimento='$Data_De_Falecimento' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
    } else {
    $id = $_GET['id'];
    $sql = "SELECT id, Nome, Pais_De_Origem, Data_De_Nascimento, Data_De_Falecimento FROM Autor WHERE id=$id";
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
    <form method="post" action="editar_autor.php">
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
        Nome: <input type="text" name="Nome" value="<?php echo $tarefa['Nome']; ?>"><br>
        Pais_De_Origem: <input type="text" name="Pais_De_Origem" value="<?php echo $tarefa['Pais_De_Origem']; ?>"><br>
        Data_De_Nascimento: <input type="text" name="Data_De_Nascimento" value="<?php echo $tarefa['Data_De_Nascimento']; ?>"><br>
        Data_De_Falecimento: <input type="text" name="Data_De_Falecimento" value="<?php echo $tarefa['Data_De_Falecimento']; ?>"><br>
        <input type="submit" value="Salvar">
    </form>
