<?php
// include required files
include_once "./Classes/Conexao.php";
include_once './Classes/DAO/UsuarioDAO.php';

if ($_GET) {
    $codigo     = $_GET['codigo'];
    $UsuarioDAO = new UsuarioDAO();
    $consulta   = $UsuarioDAO->consultarCodigo($codigo);

    if ($consulta) {
        for ($i = 0; $i < mysqli_num_rows($consulta); $i++) {
            $linha        = mysqli_fetch_array($consulta);
            $respostas [] = array(
                                  'id'        => $linha['id'],
                                  'nome'      => $linha['nome'],
                                  'sobrenome' => $linha['sobrenome'],
                                  'idade'     => $linha['idade'],
                                  'sexo'      => $linha['sexo']
            );
        }
    }
    echo json_encode($respostas);
} 
else {
    echo 'Nenhum parâmetro foi passado na URL';
}