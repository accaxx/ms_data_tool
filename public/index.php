<!DOCTYPE HTML>
<html>
<head>
    <title>Example</title>
</head>
<body>

<h1><?php
    use framework\Router;
    require_once  __DIR__.'/../framework/ClassLoader.php';
    $loader = new ClassLoader();
    $loader->register();

    $router = new Router();
    $router->execActionByRequest();
?>
</h1>
</body>
</html>
