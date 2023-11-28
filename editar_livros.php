<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>
<title>Editar Livro</title>
<?php
    include '../conexao.php';
    $sql_autor = "SELECT id, Nome FROM Autor";
    $result_autor = $conexao->query($sql_autor);
    $sql_genero = "SELECT id, Genero FROM genero_literario";
    $result_genero = $conexao->query($sql_genero);
    $sql_editora = "SELECT id, Nome FROM editoras";
    $result_editora = $conexao->query($sql_editora);

    $livro_id = $_GET['id'];
    $sql_livro = "SELECT * FROM Livros WHERE id = ?";
    $stmt_livro = $conexao->prepare($sql_livro);
    $stmt_livro->bind_param("i", $livro_id);
    $stmt_livro->execute();
    $result_livro = $stmt_livro->get_result();
    $livro = $result_livro->fetch_assoc();
?>

<form method="post" action="atualizar_livro.php">
    <input type="hidden" name="livro_id" value="<?php echo $livro['id']; ?>">
    
    <label for="Titulo">Título:</label>
    <input type="text" name="Titulo" id="Titulo" value="<?php echo $livro['Titulo']; ?>" required><br>
    
    <label for="Autor">Autor:</label>
    <select name="Autor" id="Autor" required>
        <?php
            if ($result_autor->num_rows > 0) {
                while ($row = $result_autor->fetch_assoc()) {
                    $selected = ($row["id"] == $livro["Autor_id"]) ? "selected" : "";
                    echo "<option value='" . $row["id"] . "' $selected>" . $row["Nome"] . "</option>";
                }
            }
        ?>
    </select><br>

    <label for="Data_lancamento">Data de lançamento:</label>
    <input type="text" name="Data_lancamento" id="Data_lancamento" value="<?php echo date('d/m/Y', strtotime($livro['Data_lancamento'])); ?>" required><br>
    
    <label for="genero_literario">Gênero literário:</label>
    <select name="genero_literario" id="genero_literario" required>
        <?php
            if ($result_genero->num_rows > 0) {
                while ($row = $result_genero->fetch_assoc()) {
                    $selected = ($row["id"] == $livro["Genero_id"]) ? "selected" : "";
                    echo "<option value='" . $row["id"] . "' $selected>" . $row["Genero"] . "</option>";
                }
            }
        ?>
    </select><br>

    <label for="editoras">Editora:</label>
    <select name="editoras" id="editoras" required>
        <?php
            if ($result_editora->num_rows > 0) {
                while ($row = $result_editora->fetch_assoc()) {
                    $selected = ($row["id"] == $livro["Editora_id"]) ? "selected" : "";
                    echo "<option value='" . $row["id"] . "' $selected>" . $row["Nome"] . "</option>";
                }
            }
        ?>
    </select><br>

    <label for="Clientes">Criado por:</label>
<select name="Clientes" id="Clientes" required>
    <?php
        $clientes = [];
        $sql_clientes = "SELECT id, Nome FROM clientes";
        $result_clientes = $conexao->query($sql_clientes);
        if ($result_clientes->num_rows > 0) {
            while ($row = $result_clientes->fetch_assoc()) {
                $clientes[] = $row; 
                $selected = ($row["id"] == $livro["cliente_id"]) ? "selected" : "";
                echo "<option value='" . $row["id"] . "' $selected>" . $row["Nome"] . "</option>";
            }
        }
    ?>
</select><br>

    <input type="submit" value="Atualizar">
</form>
