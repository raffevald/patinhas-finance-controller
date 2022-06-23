<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Patinhas - finance controller">
  <meta name="author" content="Raff Evald">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Patinhas - finance controller | login </title>
</head>

<?php
    // session_start();
    // include "UI_include.php";
    include INC_DIR . 'header.inc';
    $msg = "";
?>

<body>
    <div class="container">
        <br/>
        <br/>
        <br/>
        <br/>
        <?php
            // include INC_DIR . 'menu.inc';
        ?>
        <div class="form">
            <div>
                <?php
                if(isset($_GET['erro'])) :
                    echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                        <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.
                            438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.
                            905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
                        </symbol>
                    <div class='alert alert-danger d-flex align-items-center' role='alert'>
                        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use
                        xlink:href='#exclamation-triangle-fill' /></svg>
                    <div>
                        Senha ou usuário incorreto!
                    </div>
                    </div>";
                    endif;
                ?>
            </div>
            
            <div class="heading">
                <i class="material-icons">account_box</i>
                <h4 class="modal-title">Faça o login na sua conta</h4>
            </div>
            <form action="loginp.php" method="post" class="form-horizontal">
                <div class="form-group top"><i class="material-icons">face</i>
                    <label class="control-label">Usuário</label>
                    <div>
                        <input type="text" class="form-control" name="usuario">
                    </div>
                </div>
                <div class="form-group"><i class="material-icons">vpn_key</i>
                    <label class="control-label">Senha</label>
                    <div>
                        <input type="password" class="form-control" name="senha">
                    </div>
                </div>
                <div class="formerror"><?php echo $msg; ?></div>
                <div class="form-group">
                    <div class="button_logon">
                        <!-- <center> -->
                            <button type="submit" name="submit" class="btn btn-primary btn-lg">Entrar
                            </button>
                        <!-- </center>
                           
                        <center> -->
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp
                            &nbsp

                            <button type="submit" name="submit" class="btn btn-primary btn-lg"> Registre-se
                            </button>
                        <!-- </center> -->
                    </div>
                </div>
            </form>

            <!-- <div class="bottom-text">Não possui uma conta? <a href="registre.php">Inscreva-se</a></div> -->
            <?php
                // include INC_DIR . 'foot.inc';
            ?>
        </div>
    </body>
</html>