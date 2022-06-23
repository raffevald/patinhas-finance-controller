<html>
    <?php
        include "UI_include.php";
        include FUNC_DIR . 'functions.php';
        include INC_DIR . 'header.inc';
    ?>
    <body>
        <div class="container">
            <?php
                include INC_DIR . 'menu.inc';
                $msg = "Crie uma conta";
                $msgerro = ""; 
            ?>
            <div class="form">
                <div class="heading">
                    <i class="material-icons">create</i>
                    <h4 class="modal-title"><?php echo $msg; ?></h4>
                </div>
                <form action="" method="post" class="form-horizontal">
                    <fieldset>
                        <legend class="formlabel">Dados pessoais</legend>
                        <div class="form-group"><i class="material-icons"></i>
                        <label class="control-label">Nome</label>
                            <div>
                            <input type="text" class="form-control" name="nome" required>
                            </div>
                        </div>
                        <div class="form-group"><i class="material-icons"></i>
                        <label class="control-label">Sobrenome</label>
                            <div>
                                <input type="text" class="form-control" name="sobrenome" required>
                            </div>
                        </div>
                        <div class="form-group"><i class="material-icons"></i>
                            <label class="control-label">email</label>
                            <div>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="formlabel">Novo usuário e senha </legend>
                        <div class="form-group top"><i class="material-icons">face</i>
                        <label class="control-label">Usuário</label>
                            <div>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="form-group"><i class="material-icons"> vpn_key </i>
                            <label class="control-label">Senha</label>
                            <div>
                                <input type="password" class="form-control" name="senha" required>
                            </div>
                        </div>
                        <div class="form-group"><i class="material-icons">check</i>
                            <label class="control-label">Confirme a senha</label>
                            <div>
                                <input type="password" class="form-control" name="confirm_password" required>
                            </div>
                        </div>
                    </fieldset>
                    <div class="formerror"> <?php echo $msgerro; ?> </div>
                        <div class="form-group">
                            <div>
                                <center><button type="submit" name="submit" class="btn btn-primary btn-lg">Registrarse</button></center>
                            </div>
                        </div>    
                    </div>
                </form>
                <div class="bottom-text">Já possui uma conta? <a href="login.php">Faça o login aqui</a></div>
            </div>
            <?php include INC_DIR . 'foot.inc'; ?>
        </div>
    </body>
</html>

<?php
    // Capturar os valores postados a partir dos campos texto
    if ($_POST) {
        $nome = trim($_POST['nome']);
        $sobrenome = trim($_POST['sobrenome']);
        $novousuario = trim($_POST['username']);
        $minhasenha = $_POST['senha'];
        $catusuario = 'u';
        $imagem = 'padrao.png';
        $email = trim($_POST['email']);
        $perfil_preenchido = 'n';

        // obter data de hoje para salvar como data do registro
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('y-m-d H:i:s');

        //Construir SQL Query para testar se usuario já existe
        include 'conecta_mysqli.inc';
        $resultado = mysqli_query($conexao, "SELECT * FROM usuarios where u_usuario='$novousuario'");
        $linhas = mysqli_num_rows($resultado);
        mysqli_close($conexao);

        // se resultado de $myusername and $mypassword for encontrado, a contagem de table row count deve ser 1
        if ($linhas == 1) {
            // mensagem de existencia de usuario
            echo "<script language=javascript> alert( 'Usuário já existe. Escolha outro nome de usuário.' );</script>";
            echo "
                <div class='container'>
                    <div class='alert alert-warning'>
                        <strong>Atenção!</strong> Usuário já existe. Escolha outro nome de usuário.
                    </div>
                </div>";
        } else {
        // cadastra o usuario se não existir... INSERT INTO...
        // encriptar senha
        $encrypted_minhasenha = md5($minhasenha);

        //Construir SQL Query usando os valores recebidos do formulario
        $query = "INSERT INTO usuarios
        (u_usuario, u_senha, u_nome, u_sobrenome, u_email, u_datareg, u_cat, u_avatar) VALUES
        ('$novousuario', '$encrypted_minhasenha', '$nome', '$sobrenome', '$email', '$hoje', 'u', 'avatar.jpg')";
        
        // Imprimir a query em tela para verificação
        // echo ($query . '<br>');
        include 'conecta_mysqli.inc';
        $resultado = mysqli_query($conexao, $query);
        $linhasafetadas = mysqli_affected_rows($conexao);
        mysqli_close($conexao);

        /* checar conexão */
        if (mysqli_connect_errno()) {
            printf("Conexão falhou: %s\n", mysqli_connect_error());
            exit();
        }

        // echo 'Conexão bem sucedida ao mySQL. <BR>';
        /* Tentar inserir novo usuário na base de dados */
            if ($linhasafetadas == 1) {
                echo "<script language=javascript>confirm( 'Novo usuário registrado com sucesso. Selecione agora Login para
                entrar no sistema.' );</script>";
                echo "<div class='container'><div class='alert alert-success'> <strong>Registro realizado.</strong> Agora faça o
                login no sistema. </div></div>";
                $msg = "USUÁRIO CRIADO COM SUCESSO.";

                // direciona para a página inicial dos usuários cadastrados
                // header("Location: login.php?new=1");
                exit();
            } else {
                echo "<script language=javascript>confirm( 'Erro ao registrar o usuário na base de dados.' );</script>";
            }
        }
    }
?>