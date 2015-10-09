<?php
require_once (__DIR__."/../src/bootstrap.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TheStore TZ</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-md-3 info-bar">Всего товаров: <span id="base_count" class="badge"><?php echo number_format($products->count(), 0, '', ' ') ?></span></div>
                <div class="col-md-3 info-bar center">Самый дешевый: <span id="base_min" class="badge"><?php echo number_format($products->getCheapestProduct()->get('price'), 0, '', ' '); ?>$</span></div>
                <div class="col-md-3 info-bar center">Самый дорогой: <span id="base_max" class="badge"><?php echo number_format($products->getMostExpensiveProduct()->get('price'), 0, '', ' '); ?>$</span></div>
                <div class="col-md-3 info-bar right"><button class="btn btn-default" id="regenerate_link">Перегенерить базу</button></div>
            </div>
        </div>
    </nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" id="result_container">
            <div class="row">
                <div class="col-md-6">Товаров в корзине: <span class="badge" id="result_count"></span></div>
                <div class="col-md-6">На сумму: <span class="badge" id="result_sum"></span></div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 result_download"><a id="result_download_link" href="#null">Скачать список</a></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" placeholder="Сколько собираетесь потратить?" id="amount" class="form-control" aria-label="Сколько собираетесь потратить?">
                <span class="input-group-addon">.00</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5 form-footer">
            <button type="button" class="btn btn-default" id="submit_button">Расчитать корзину</button>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>