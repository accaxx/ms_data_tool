<!DOCTYPE HTML>
<html>
<head>
    <title>Example</title>
</head>
<body>

<h1><?php
    use framework\Router;
    use Models\Tests;
    $root = '/Users/asahi.aihara/ms_data_tool';
    require_once $root . '/framework/ClassLoader.php';
    $loader = new ClassLoader($root);
    $loader->register();

    $database = new Tests();
    $database->getAll();

    $router = new Router();
    $router->execActionByRequest();
?>
</h1>
</body>
</html>
