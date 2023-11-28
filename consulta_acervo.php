<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css"/>
    <title>Consulta Acervo</title>
</head>
<body>
<body>
    <h1>Biblioteca</h1>
    <div>
        <a href="navegacao.php">Inicio</a>
    </div>
</body>
    <h1>Consulta acervo</h1><br>

    <form action="consulta_acervo.php" method="GET">
        <label for="search">Pesquisar Livro:</label>
        <input type="text" id="search" name="search" placeholder="Digite o título do livro">
        <button type="submit">Pesquisar</button>
    </form>

    <?php
        include '../conexao.php';

        $searchCondition = "";
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $conexao->real_escape_string($_GET['search']);
            $searchCondition = "WHERE Livros.Titulo LIKE '%$search%'";
        }

        $sql = "SELECT 
                Livros.id,
                Livros.Titulo,
                Autor.Nome AS NomeAutor,
                genero_literario.Genero AS NomeGenero,
                editoras.Nome AS NomeEditora,
                Livros.Data_lancamento
            FROM Livros
            INNER JOIN Autor ON Livros.Autor_id = Autor.id
            INNER JOIN genero_literario ON Livros.Genero_id = genero_literario.id
            INNER JOIN editoras ON Livros.Editora_id = editoras.id
            $searchCondition";

        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Gênero</th>
                    <th>Editora</th>
                    <th>Data de Lançamento</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["Titulo"] . "</td>
                        <td>" . $row["NomeAutor"] . "</td>
                        <td>" . $row["NomeGenero"] . "</td>
                        <td>" . $row["NomeEditora"] . "</td>
                        <td>" . $row["Data_lancamento"] . "</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum resultado encontrado.";
        }

        $conexao->close();
    ?>
</body>
</html>
