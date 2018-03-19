<!DOCTYPE HTML>
<html>
<head>
    <title>Example</title>
</head>
<body>

<h1><?php
    use test\Test;
    use framework\Router;

    echo "マスタデータ管理ツール";
    $root = "/Users/asahi.aihara/ms_data_tool";
    require_once $root . '/framework/ClassLoader.php';
    $loader = new ClassLoader($root);
    $loader->register();
    new Test();

    $router = new Router();
    $router->setRoute();
?>
</h1>
</body>
</html>
