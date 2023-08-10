<?php

    session_start();

    if(empty($_POST) or (empty($_POST["username"] or 
                        (empty($_POST["password"]))))){
        print "<script>location.href = '../index.php':<script>";
    }
    
    include_once "conexao.php";
    include_once "funcoes.php";


    class cliente {
        //ATRIBUTOS
        private $con;
        private $objFunc;
        private $id;
        private $email;
        private $username;
        private $password;
        private $dataCadastro;
        private $nascimento;
        private $endereco;
        private $telefone;

        //CONSTRUTOR
        public function __construct(){
            $this->con = new conexao();
            $this->objFunc = new funcoes();
        }

        //METODO MAGICO
        public function _set($atributo, $valor) {
            $this->$atributo = $valor;
        }
        public function _get($atrbiuto){
            return $this->$atrbiuto;
        }

    public function logar($dado){
            $this->username = $dado['username'];
            $this->password = $dado['password'];

            if(isset($_POST['btLogar'])){
                
                    $cst = $this->con->conectar()->prepare("SELECT * FROM login
                     WHERE nome = :username AND senha = :password;");
                     $cst->bindParam(":username", $this->username, PDO::PARAM_STR);
                     $cst->bindParam(":password", $this->password, PDO::PARAM_STR);
                     $cst->execute();
                     if($cst->rowCount() != 0) {

                        session_start();
                        $result = $cst->fetch();
                        $_SESSION['logado'] = "sim";
                        $_SESSION['clt'] = $result['login'];

                        header('Location: ola.php');
                         
                    }else{
                        echo "Nome ou senha errada";
                    }
            }
        }
    }

?>