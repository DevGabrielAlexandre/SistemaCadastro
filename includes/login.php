<?php

    session_start();

    if(empty($_POST) or (empty($_POST["username"] or 
                        (empty($_POST["password"]))))){
        print "<script>location.href = 'index.php':<script>";
    }
    
    include_once "conexao.php";
    include_once "funcoes.php";
    include_once "login.php";


    class cliente {
        //ATRIBUTOS
        private $con;
        private $objFunc;
        private $id;
        private $email;
        private $nome;
        private $senha;
        private $dataCadastro;
        private $nascimento;
        private $endereco;

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
            $this->nome = $dado['username'];
            $this->senha = sha1 ($dado['password']);
            try{
                    $cst = $this->con->conectar()->prepare("SELECT 'nome', 'senha' FROM 'login'
                     WHERE 'nome' = ':username' AND 'senha' = ':password;'");
                     $cst->bindParam(":username", $this->nome, PDO::PARAM_STR);
                     $cst->bindParam(":password", $this->senha, PDO::PARAM_STR);
                     $cst->execute();
                     if($cst->rowCount() == 0) {
                        header('location: /ola.html');

                     }else{
                        session_start();
                        $result = $cst->fetch();
                        $_SESSION['logado'] = "sim";
                        $_SESSION['clt'] = $result['login'];
                        header('location: /ola.html');

                    }
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }
    }

?>