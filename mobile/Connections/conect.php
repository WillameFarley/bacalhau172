<?php

/**
 * Classe de conexao com o banco de dados
 */
class Conexao{

    // Nome do usuario do servidor de banco de dados
    private $user = 'u572817196_mysql';
    // Senha do banco de dados
    private $password = 'OpjZx1belTP2';
    // Nome do banco de dados para se conectar
    private $database = 'u572817196_mysql';
    // Host do hervidor de banco de dados
    private $host = 'mysql.hostinger.com.br';
    // Obejto de conexao PDO
    public $conn;

    /**
     * Cria a conexao quando a classe e instanciada, caso ocorra erro e retornado o erro
     */
    public function __construct(){
        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database.'', $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
            return $this->conn;
        }catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}
