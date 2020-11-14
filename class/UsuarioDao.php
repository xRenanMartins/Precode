<?php

require_once "Conexao.php";

class UsuarioDao
{
    public $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function cadastrar($values)
    {
        $sql = "INSERT INTO usuario (nome, email, telefone, acesso, estado, cidade) VALUES ({$values})";

        return mysqli_query($this->conexao->getCon(), $sql);
    }

    public function alterar($sql)
    {
        return mysqli_query($this->conexao->getCon(), $sql);
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuario";
        $executa = mysqli_query($this->conexao->getCon(), $sql);


        if (mysqli_num_rows($executa) > 0) {
            while ($row = mysqli_fetch_assoc($executa)) {
                $return[] = $row;
            }
            return $return;
        } else {
            return false;
        }
    }

    public function procuraId($id)
    {
        $sql = "SELECT * FROM usuario WHERE id='$id'";
        $executa = mysqli_query($this->conexao->getCon(), $sql);


        if (mysqli_num_rows($executa) > 0) {
            while ($row = mysqli_fetch_assoc($executa)) {
                $return = $row;
            }

            return $return;
        } else {
            return false;
        }
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM usuario WHERE id = '$id'";

        return mysqli_query($this->conexao->getCon(), $sql);
    }


}