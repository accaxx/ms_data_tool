<?php
    use framework\Router;
    use framework\Request;

    // 初期ファイル読み込み
    require_once '/Users/asahi.aihara/ms_data_tool/config/config.php';
    require_once ROOT_DIR . '/framework/ClassLoader.php';

    // オートローダ登録
    $loader = new ClassLoader();
    $loader->register();

    // 初期読込
    $request = new Request();
    $router = new Router($request);
    $router->execActionByRequest();
