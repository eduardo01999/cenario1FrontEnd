<?php 
$id = $_GET["idUsuario"];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Info Users</title>
<style>
    body {
        background-color: #0844a4;
    }
</style>

<body>
    <?php
    
    $url_user = "https://jsonplaceholder.typicode.com/users/" . $id;
    $ch_user = curl_init($url_user);
    curl_setopt($ch_user, CURLOPT_RETURNTRANSFER, true);
    $user = json_decode(curl_exec($ch_user));

    ?>
    
    <div class="container">
        <main class="row align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-2">
                </div>
                <div class="col-12 col-sm-8">
                <br/><br/><br/>
                <ul class="list-group">
                    <li class="list-group-item">Nome: <b><?php echo $user->name ?></b></li>
                    <li class="list-group-item">Nome de usuário: <b><?php echo $user->username ?></b></li>
                    <li class="list-group-item">Email: <b><?php echo $user->email ?></b></li>
                    <li class="list-group-item">Cidade: <b><?php echo $user->address->city ?></b></li>
                    <li class="list-group-item">Telefone: <b><?php echo $user->phone ?></b></li>
                    <li class="list-group-item">WebSite: <b><?php echo $user->website ?></b></li>
                    <li class="list-group-item">Empresa: <b><?php echo $user->company->name ?></b></li>
                    <li class="list-group-item">Frase: <b><?php echo $user->company->catchPhrase ?></b></li>
                </ul>
                </div>
                <div class="col-12 col-sm-2">
                </div>
                <div class="col-12 col-sm-2">
                </div>
                <div class="col-12 col-sm-8">
                <br/>
                <a class="btn btn-primary" href="home.php" role="button" style="background-color: white; color:#0844a4"><b>Voltar</b></a>
                </div>
                <div class="col-12 col-sm-2">
                </div>
            </div> 
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>