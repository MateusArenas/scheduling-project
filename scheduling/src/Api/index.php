<?php
    session_start();
    $status = empty($_SESSION['unauthorized']) ? false : $_SESSION['unauthorized'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Login</title>
</head>

<body>
    
    <div class="container">
    <style>
        
    </style>
     <h2>LOGIN</h2>
         <div class="form-container">
             <form id="login" action="pages/index_validar.php" method="POST">
                <label><b>Usuário</b></label>
                <input type="text" placeholder="Usuário" name="txtUsuario" required=""><br>

                <label><b>Senha</b></label>
                <input type="password" placeholder="Senha" name="txtSenha" required=""><br>
                <?php if ($status == true): ?>
                    <label id="label-error" class="label-box alert-color" ><svg aria-hidden="true" style="margin-right:5px" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg><b>email ou senha invalidos.</b></label>
                <?php endif; ?>
                <button type="submit">Enviar</button>
              </form>
          </div>
        
    </div>
    <footer>
        <p>Todos os direitos reservados - 2020&copy;</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
<script>
    $(document).ready(function() {//page elements ready!

            var username = $('input[name=txtUsuario]');
            var password = $('input[name=txtSenha]');

            password.click(() => {
                $('#label-error').attr('style','opacity: 0;');
            });

            username.click(() => {
                $('#label-error').attr('style','opacity: 0;');
            });

    });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>