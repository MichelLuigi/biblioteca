<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Adicionar editoras</title>

<form method="post" action="add_editoras.php">
    Nome: <input type="text" name="Nome" required><br>
    Endereco: <input type="text" name="Endereco" required><br>
    <label for="clientes">Usuario:</label>
    <select name="cliente_id" id="clientes" required>
        <?php
            include '../conexao.php';
            $sql_clientes = "SELECT id, Nome FROM Clientes";
            $result_clientes = $conexao->query($sql_clientes);

            if ($result_clientes->num_rows > 0) {
                while ($row = $result_clientes->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["Nome"] . "</option>";
                }
            }
        ?>
    </select><br>

    <input type="submit" value="Adicionar">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $Nome = $_POST['Nome'];
        $Endereco = $_POST['Endereco'];
        $cliente_id = $_POST['cliente_id'];

        if (empty($Nome) || empty($Endereco) || empty($cliente_id)) {
            echo "Por favor, preencha todos os campos.";
        } else {
            $Nome = $conexao->real_escape_string($Nome);
            $Endereco = $conexao->real_escape_string($Endereco);
            $cliente_id = $conexao->real_escape_string($cliente_id);

            $sql = "INSERT INTO editoras (Nome, Endereco, cliente_id) 
                    VALUES ('$Nome', '$Endereco','$cliente_id')";
            
            if ($conexao->query($sql) === TRUE){
                header("Location: listar.php");
            } else {
                echo "Erro: " . $conexao->error;
            }
        }
    }

    $conexao->close();
?>