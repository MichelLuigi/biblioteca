<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $conexao->begin_transaction();

    try {

        $sql_cliente = "DELETE FROM Clientes WHERE id=$id";
        if (!$conexao->query($sql_cliente)) {
            throw new Exception("Erro ao deletar cliente: " . $conexao->error);
        }

        $sql_autor = "DELETE FROM Autor WHERE id=$id";
        if (!$conexao->query($sql_autor)) {
            throw new Exception("Erro ao deletar autor: " . $conexao->error);
        }

        $sql_genero_literario = "DELETE FROM genero_literario WHERE id=$id";
        if (!$conexao->query($sql_genero_literario)) {
            throw new Exception("Erro ao deletar genero_literario: " . $conexao->error);
        }

        $sql_editoras = "DELETE FROM editoras WHERE id=$id";
        if (!$conexao->query($sql_editoras)) {
            throw new Exception("Erro ao deletar editoras: " . $conexao->error);
        }

        $conexao->commit();
        header("Location: listar.php");
    } catch (Exception $e) {
        $conexao->rollback();
        echo "Erro: " . $e->getMessage();
    }
}

$conexao->close();
?>
