<! DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal-default-theme.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name='csrf-token' content='<?=Security::generate_token();?>'>
    <style type="text/css">
    table thead .sorting::after, 
    table thead .sorting_asc::after { 
        content: "▲"; 
    } 
    table thead .sorting_desc::after { 
        content: "▼";
    } 
    </style>
</head>

<body>
    <!-- <h1>お問い合わせ</h1> -->
    <div i="wrapper">
    <?php echo $content; ?>
    </div>
</body>
</html>