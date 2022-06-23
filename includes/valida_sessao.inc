<?php
    session_start();
    if(isset($_SESSION["usuario"]))
        $usuario = $_SESSION["usuario"];
        if(isset($_SESSION["senha"]))
            $senha = $_SESSION["senha"];
            if(!(empty($usuario) OR empty($senha)))
            {
                include "conecta_mysqli.inc";
                $resultado = mysqli_query($conexao,"SELECT u_senha FROM usuarios WHERE u_usuario='$usuario'");
                if(mysqli_num_rows($resultado)==1)
                {
                    $linha = mysqli_fetch_array($resultado);
                    if($senha != $linha["u_senha"])
                {
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                echo "Você não efetuou o LOGIN!";
                exit;
            }
        } else {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            echo "Você não efetuou o LOGIN!";
            exit;
        }
    } else {
        echo "Você não efetuou o LOGIN!";
        exit;
    }
    mysqli_close($conexao);
?>