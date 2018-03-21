<!DOCTYPE HTML>
<html>
<head>
    <title>Example</title>
</head>
<body>

<h1><?php
    use framework\Router;
    require_once '/Users/asahi.aihara/ms_data_tool/config/config.php';
    require_once ROOT_DIR . '/framework/ClassLoader.php';
    $loader = new ClassLoader();
    $loader->register();

    $router = new Router();
    $router->execActionByRequest();
?>
</h1>
</body>
</html>
