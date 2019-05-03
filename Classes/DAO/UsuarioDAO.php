<?php

class UsuarioDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function consultarTodosUsuarios() {
        $sql = "SELECT * FROM usuarios";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigo($codigo) {
        $sql = "SELECT * FROM usuarios WHERE id = '$codigo'";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarSexoIdade($sexo, $idade) {
        $sql = "SELECT * FROM usuarios WHERE sexo = '$sexo' AND idade >= '$idade'";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarEndereco($codigo) {
        $sql = "SELECT e.idUsuario, e.logradouro, e.cidade, e.estado, e.pais, u.id, u.nome, u.idade, u.sobrenome, u.sexo FROM endereco AS e INNER JOIN usuarios AS u ON (e.idUsuario = u.id) WHERE u.id = '$codigo'";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
?>

