<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Adicionar autor</title>

<form method="post" action="add_autor.php">
    Nome: <input type="text" name="Nome" required><br>
    Pais_De_Origem: <input type="text" name="Pais_De_Origem" required><br>
    Data_De_Nascimento: <input type="text" name="Data_De_Nascimento" required><br>
    Data_De_Falecimento: <input type="text" name="Data_De_Falecimento"><br>
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Nome = $_POST['Nome'];
        $Pais_De_Origem = $_POST['Pais_De_Origem'];
        $Data_De_Nascimento = $_POST['Data_De_Nascimento'];
        $Data_De_Falecimento = $_POST['Data_De_Falecimento'];
        $cliente_id = $_POST['cliente_id'];

        if (empty($Nome) || empty($Pais_De_Origem) || empty($Data_De_Nascimento) || empty($cliente_id)) {
            echo "Por favor, preencha todos os campos obrigatórios.";
        } else {
            $Nome = $conexao->real_escape_string($Nome);
            $Pais_De_Origem = $conexao->real_escape_string($Pais_De_Origem);
            $Data_De_Nascimento = $conexao->real_escape_string($Data_De_Nascimento);
            $cliente_id = $conexao->real_escape_string($cliente_id);

            $Data_De_Falecimento = empty($Data_De_Falecimento) ? 'NULL' : "'" . $conexao->real_escape_string($Data_De_Falecimento) . "'";

            $sql = "INSERT INTO Autor (Nome, Pais_De_Origem, Data_De_Nascimento, Data_De_Falecimento, cliente_id) 
                    VALUES ('$Nome', '$Pais_De_Origem', '$Data_De_Nascimento', $Data_De_Falecimento, '$cliente_id')";
            
            if ($conexao->query($sql) === TRUE) {
                header("Location: listar.php");
            } else {
                echo "Erro: " . $conexao->error;
            }
        }
    }

    $conexao->close();
?>
