<!DOCTYPE HTML>
<html>
<head>
    <title>Example</title>
</head>
<body>

<h1><?php
    echo "マスタデータ管理ツール";
    require('../framework/ClassLoader.php');
    $loader = new ClassLoader();
    new Test();

?>
</h1>
</body>
</html>
