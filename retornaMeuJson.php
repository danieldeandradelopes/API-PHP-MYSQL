<?php

include "./Classes/Conexao.php";
include './Classes/DAO/UsuarioDAO.php';


$UsuarioDAO = new UsuarioDAO();

$consulta = $UsuarioDAO->consultarTodosUsuarios();

if ($consulta == true) {
    for ($i = 0; $i < mysqli_num_rows($consulta); $i++) {
        $linha = mysqli_fetch_array($consulta);

        $respostas [] = array(
            'id' => $linha['id'],
            'nome' => $linha['nome'],
            'sobrenome' => $linha['sobrenome'],
            'idade' => $linha['idade'],
            'sexo' => $linha['sexo']
        );
    }
}

echo json_encode($respostas);
?>