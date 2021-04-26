<?php
require_once 'config.php';
require_once 'dao/InfoDaoMysql.php';

$infoDao = new InfoDaoMysql($pdo);
$infoFeed = $infoDao->getInfo();


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Send me a pix</title>
</head>

<body>
    <header>
        <div class="title">Me envie um pix!</div>
    </header>
    <form method="POST" action="sendAction.php" class="form-group">
        <input type="text" name="key" placeholder="Sua chave pix">

        <input type="text" name="body" placeholder="Qual o motivo?">

        <input type="text" name="name" placeholder="Seu nome"> <br>

        <input type="submit" class="btn btn-info" value="Quero um pix" />
    </form>
    <br><br>
    <hr>

    <div class="classe1">
        <h1>Envie um pix para essas pessoas</h1>
    </div>

    <div class="row">
        <?php foreach ($infoFeed as $feed) : ?>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $feed['chave']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $feed['name']? : 'Anonimo'; ?></h6>
                        <p class="card-text"><?= $feed['body']; ?></p>
                    </div>
                </div>
                <div class="card-footer">
                    <?=date('d/m/Y H:i', strtotime($feed['created_at']));?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>