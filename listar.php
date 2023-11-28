<title>Geral</title>
<head>
    <link rel="stylesheet" href="../css/header.css"/>
</head>

<body>
    <h1>Biblioteca</h1>
    <div>
        <a href="navegacao.php">Inicio</a>
    </div>
</body>
<?php
    include '../conexao.php';

    $sql = "SELECT id, Nome, Email, Telefone, Senha, criado_em, atualizado_em FROM Clientes";
    $result = $conexao->query($sql);
    ?>

    <h1>Usuario</h1>
    <a href="add_cliente.php">Adicionar usuario</a>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Senha</th>
                <th>criado em</th>
                <th>atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["Nome"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Telefone"] . "</td>";
                    echo "<td>" . $row["Senha"] . "</td>";
                    echo "<td>" . $row["criado_em"] . "</td>";
                    echo "<td>" . $row["atualizado_em"] . "</td>";
                    echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Sem tarefas</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $conexao->close();
?>

<?php
    include '../conexao.php';

    $sql = "SELECT id, Nome, Pais_De_Origem, Data_De_Nascimento, Data_De_Falecimento, cliente_id, criado_em, atualizado_em FROM Autor";
    $result = $conexao->query($sql);
    ?>

    <h1>Autor</h1>
    <a href="add_autor.php">Adicionar autor</a>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Pais_De_Origem</th>
                <th>Data_De_Nascimento</th>
                <th>Data_De_Falecimento</th>
                <th>criado por</th>
                <th>criado em</th>
                <th>atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["Nome"] . "</td>";
                    echo "<td>" . $row["Pais_De_Origem"] . "</td>";
                    echo "<td>" . $row["Data_De_Nascimento"] . "</td>";
                    echo "<td>" . $row["Data_De_Falecimento"] . "</td>";
                    echo "<td>" . $row["cliente_id"] . "</td>";
                    echo "<td>" . $row["criado_em"] . "</td>";
                    echo "<td>" . $row["atualizado_em"] . "</td>";
                    echo "<td><a href='editar_autor.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Sem tarefas</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $conexao->close();
?>

<?php
    include '../conexao.php';

    $sql = "SELECT id, Genero, Data_Criacao, cliente_id, criado_em, atualizado_em FROM genero_literario";
    $result = $conexao->query($sql);
    ?>

    <h1>Genero Literario</h1>
    <a href="add_genero.php">Adicionar Genero Literario</a>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Genero</th>
                <th>Data_Criacao</th>
                <th>criado por</th>
                <th>criado em</th>
                <th>atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["Genero"] . "</td>";
                    echo "<td>" . $row["Data_Criacao"] . "</td>";
                    echo "<td>" . $row["cliente_id"] . "</td>";
                    echo "<td>" . $row["criado_em"] . "</td>";
                    echo "<td>" . $row["atualizado_em"] . "</td>";
                    echo "<td><a href='editar_genero_literario.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Sem tarefas</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $conexao->close();
?>

<?php
    include '../conexao.php';

    $sql = "SELECT id, Nome, Endereco, cliente_id, criado_em, atualizado_em FROM Editoras";
    $result = $conexao->query($sql);
    ?>

    <h1>Editoras</h1>
    <a href="add_editoras.php">Adicionar Editora</a>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Endereco</th>
                <th>criado por</th>
                <th>criado em</th>
                <th>atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["Nome"] . "</td>";
                    echo "<td>" . $row["Endereco"] . "</td>";
                    echo "<td>" . $row["cliente_id"] . "</td>";
                    echo "<td>" . $row["criado_em"] . "</td>";
                    echo "<td>" . $row["atualizado_em"] . "</td>";
                    echo "<td><a href='editar_editoras.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Sem tarefas</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $conexao->close();
?>

<?php
    include '../conexao.php';

    $sql = "SELECT id, Titulo, Autor_id, Data_lancamento, Genero_id, Editora_id, cliente_id, criado_em, atualizado_em FROM Livros";
    $result = $conexao->query($sql);
    ?>

    <h1>Livros</h1>
    <a href="add_livros.php">Adicionar livros</a>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Titulo</th>
                <th>Autor id</th>
                <th>Data lancamento</th>
                <th>Genero id</th>
                <th>Editora id</th>
                <th>criado por</th>
                <th>criado em</th>
                <th>atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["Titulo"] . "</td>";
                    echo "<td>" . $row["Autor_id"] . "</td>";
                    echo "<td>" . $row["Data_lancamento"] . "</td>";
                    echo "<td>" . $row["Genero_id"] . "</td>";
                    echo "<td>" . $row["Editora_id"] . "</td>";
                    echo "<td>" . $row["cliente_id"] . "</td>";
                    echo "<td>" . $row["criado_em"] . "</td>";
                    echo "<td>" . $row["atualizado_em"] . "</td>";
                    echo "<td><a href='editar_livros.php?id=" . $row["id"] . "'>Editar</a>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Sem tarefas</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $conexao->close();
?>


    <h1>Consulta livros</h1><br>
<?php
    include '../conexao.php';

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
        INNER JOIN editoras ON Livros.Editora_id = editoras.id";

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
