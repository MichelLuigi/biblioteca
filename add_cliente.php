<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Adicionar usuario</title>

<form method="post" action="add_cliente.php">
    Nome: <input type="text" name="Nome" required><br>
    Email: <input type="text" name="Email" required><br>
    Telefone: <input type="text" name="Telefone" required><br>
    Senha: <input type="text" name="Senha" required><br>
    <input type="submit" value="Adicionar">
</form>

<?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $Nome = $_POST['Nome'];
        $Email = $_POST['Email'];
        $Telefone = $_POST['Telefone'];
        $Senha = $_POST['Senha'];

        if (empty($Nome) || empty($Email) || empty($Telefone) || empty($Senha)) {
            echo "Por favor, preencha todos os campos.";
        } else {
            $Nome = $conexao->real_escape_string($Nome);
            $Email = $conexao->real_escape_string($Email);
            $Telefone = $conexao->real_escape_string($Telefone);
            $Senha = $conexao->real_escape_string($Senha);

            $sql = "INSERT INTO Clientes (Nome, Email, Telefone, Senha) VALUES ('$Nome', '$Email', '$Telefone', '$Senha')";
            
            if ($conexao->query($sql) === TRUE){
                header("Location: listar.php");
            } else {
                echo "Erro: " . $conexao->error;
            }
        }
    }

    $conexao->close();
?>
