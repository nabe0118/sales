<! DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <?php echo Asset::js('jquery-3.4.1.min.js'); ?>
    <meta name='csrf-token' content='<?=Security::generate_token();?>'>");
</head>

<body>
    <!-- <h1>お問い合わせ</h1> -->
    <div i="wrapper">
    <?php echo $content; ?>
    <hr>
    <p class="footer">
    Powered by <?php echo Html::anchor('http://fuelphp.com','FuelPHP'); ?>
    </p>
    </div>
</body>
</html>