<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Teste Front End</title>
    <style>
    body {
        background-color: #0844a4;
    }
    </style>

<body>
    <?php
    
    $url_user = "https://jsonplaceholder.typicode.com/users";
    $ch_user = curl_init($url_user);
    curl_setopt($ch_user, CURLOPT_RETURNTRANSFER, true);
    $user = json_decode(curl_exec($ch_user));

    $url_posts = "https://jsonplaceholder.typicode.com/posts";
    $ch_posts = curl_init($url_posts);
    curl_setopt($ch_posts, CURLOPT_RETURNTRANSFER, true);
    $posts = json_decode(curl_exec($ch_posts));

    $url_coments = "https://jsonplaceholder.typicode.com/posts";
    $ch_coments = curl_init($url_coments);
    curl_setopt($ch_coments, CURLOPT_RETURNTRANSFER, true);
    $coments = json_decode(curl_exec($ch_coments));
    ?>
    
    <div class="container">
        <main class="row align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-2">
                </div>
                <div class="col-12 col-sm-8">
                    <?php

                        try {

                        foreach($posts as $value) { 
                                ?>
                                <br>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">
                                        <header class="row">
                                            <div class="col-12 col-sm-7">
                                                <h5 class="card-title"> 
                                                <?php 
                                                foreach($user as $users) {
                                                    if($value->userId == $users->id) {
                                                        echo "<a href='user.php?idUsuario=". $value->userId ."'>". $users->username . "</a>";
                                                    }
                                                }
                                                ?></h5>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                            </div>
                                            <div class="col-12 col-sm-1">
                                            </div>
                                        </div>
                                        </header>
                                        
                                        <!-- titulo -->
                                        <h6 class="card-text"><?php echo $value->title ?></h6>
                                        <body>
                                            <?php echo $value->body ?>
                                        </body>
                                        <div class="card-footer text-muted">
                                            <?php 
                                            $url_coments = "https://jsonplaceholder.typicode.com/posts/". $value->id ."/comments";
                                            $ch_coments = curl_init($url_coments);
                                            curl_setopt($ch_coments, CURLOPT_RETURNTRANSFER, true);
                                            $coments = json_decode(curl_exec($ch_coments));
                                                foreach($coments as $coment) {
                                                    echo "<b>".$coment->name ."</b><br/>";
                                                    echo "<b>".$coment->email ."</b><br/>";
                                                    echo $coment->body ;
                                                    echo "<hr>";
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                    <?php
                        } 
                        } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                    ?>
                </div>
            </div> 
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>