<?php
    include_once 'includes/login.php';
    
    $objfunc = new cliente();

    if(isset($_POST['btLogar'])){
        $objfunc->logar($_POST);
    }else{
        echo "error";
    }

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Ordem pessoal Login</title>
</head>
<body>
    <div class="container">
        <div class="card">
            
                <h1 class="titulo">Login</h1>
            
            <div class="conjunto-login">
                <form method="POST">
                    <div class="input-group-login">
                        <span class="input-group-icon">@</span>
                        <input type="text" name="username" placeholder="Username" class="campo" required/> </br>
                    </div>

                    <div class="input-group-login">
                        <span class="input-group-icon">@</span>
                        <input type="password" name="password" placeholder="Password" class="campo" required/> </br>
                    </div>
                  
                 
                    <div class="checkbox-login">
                        <input type="checkbox" name="remember" value="yes">
                            <p class="textP">Lembre das minhas credênciais</p>
                            <a href="#">Esqueci minha senha</a>
                    </div>

                    <button type="submit" id="btLogar" name="btLogar" value="btLogar" >Logar</button>
                </form>


                    <h4>Ou faça login com</h4>
                        <a href="#"><img src="#"></a>
                        <a href="#"><img src="#"></a>
                        <a href="#"><img src="#"></a>
                        <a href="#"><img src="#"></a>
                    <p>Você ainda não tem uma conta?
                        <a href="#">Cadastrar</a></p>
            </div>
    </div>
</body>
</html>
