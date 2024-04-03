<?php
/** @var array $__page_title */
/** @var array $__session_error */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?=$__page_title?></title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-5">
    <a class="navbar-brand" href="/">
        PHP CRUD
    </a>
</nav>
<?php if($__session_error !== false):?>

    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <?=$__session_error?>
        </div>
    </div>
<?php endif; ?>

