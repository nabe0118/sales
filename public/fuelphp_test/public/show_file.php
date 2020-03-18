<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ファイル転送プログラム</title>
</head>
<body>
<?php
$file = __FILE__;

$content = file_get_contents($file);

echo nl2br(htmlspecialchars($content,ENT_QUOTES,'UTF-8'),false);
?>

</body>
</html>