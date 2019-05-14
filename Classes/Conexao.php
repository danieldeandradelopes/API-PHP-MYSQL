<?php
/**
 * Conexao Class: define database connection 
 */
class Conexao {
    /**
     * Database configuration
     */
    private $usuario = "root";
    private $senha   = "";
    private $caminho = "localhost";
    private $banco   = "webapi";
    private $con;
    
    /**
     * Constructor
     */
    public function __construct() {
        // Create connection
        $this->con = mysqli_connect($this->caminho, $this->usuario, $this->senha) or die("Conexão com o banco de dados Falhou!" . mysqli_error($this->con));
        mysqli_select_db($this->con, $this->banco) or die("Conexão com o banco de dados Falhou!" . mysqli_error($this->con));
    }
    
    /**
     * getCon Returns connection
     * 
     * @return $this
     */
    public function getCon() {
        return $this->con;
    }

}



