<?php
namespace framework;

class Router
{
    private $http_method;
    private $uri;
    private $get_route_array;
    private $post_route_array;

    public function __construct()
    {
        // Route設定
        $route_array = require_once(ROOT_DIR.'/route/web.php');
        $this->get_route_array = $route_array['get'];
        $this->post_route_array = $route_array['post'];

        // Request設定
        $this->http_method =  $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * Requestから必要なコントローラとメソッドを呼び出して実行
     * @return response // メソッド実行
     */
    public function execActionByRequest()
    {
        // HTTPメソッドにより対応したルーティングを取得
        $route_array = $this->getRouteArrayByHttpMethod();

        if (!array_key_exists($this->uri, $route_array)) {
            return false;
        }
        $route = $route_array[$this->uri];
        $action = $this->getActionInfoByRoute($route);
        $obj = new $action['controller']; // 変数からインスタンス化
        return call_user_func(array($obj, $action['method'])); //変数で関数を実行するため
    }

    /**
     * Route(*Controller@method)から指定のアクション(コントローラ・メソッド)を取得
     * @param array controllerとmethodの連想配列
     */
    private function getActionInfoByRoute($route)
    {
        // $routeを @ の前後で分ける
        list($controller_name, $method) = explode('@', $route);
        $controller = '\Controllers\\' . $controller_name;
        return compact('controller', 'method');
    }

    /**
     * HTTPメソッドからRouteを分岐
     * @return array // GETかPOST用のRoute配列
     */
    private function getRouteArrayByHttpMethod()
    {
        if ($this->http_method === 'GET') {
            return $this->get_route_array;
        } elseif ($this->http_method === 'POST') {
            return $this->post_route_array;
        }
    }

}