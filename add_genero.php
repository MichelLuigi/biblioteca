<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Adicionar genero</title>

<form method="post" action="add_genero.php">
    Genero: <input type="text" name="Genero" required><br>
    Data_Criacao: <input type="text" name="Data_Criacao" required><br>
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
        $Genero = $_POST['Genero'];
        $Data_Criacao = $_POST['Data_Criacao'];
        $cliente_id = $_POST['cliente_id'];

        if (empty($Genero) || empty($Data_Criacao) || empty($cliente_id)) {
            echo "Por favor, preencha todos os campos.";
        } else {
            $Genero = $conexao->real_escape_string($Genero);
            $Data_Criacao = $conexao->real_escape_string($Data_Criacao);
            $cliente_id = $conexao->real_escape_string($cliente_id);

            $sql = "INSERT INTO genero_literario (Genero, Data_Criacao, cliente_id)
                    VALUES ('$Genero', '$Data_Criacao','$cliente_id')";
            
            if ($conexao->query($sql) === TRUE){
                header("Location: listar.php");
            } else {
                echo "Erro: " . $conexao->error;
            }
        }
    }

    $conexao->close();
?>
