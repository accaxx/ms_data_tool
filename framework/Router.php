<?php
namespace framework;

class Router
{
    /**
     * GETメソッド/URIに対してコントローラ/メソッドを定義
     */
    public $route_get_array = [
        '/test' => 'TestController@indexGet',
    ];

    /**
     * POSTメソッド/URIに対してコントローラ/メソッドを定義
     */
    public $route_post_array = [
        '/test' => 'TestController@indexPost',
    ];

    /**
     * Requestから必要なコントローラとメソッドを呼び出して実行
     * @return response Controller Action
     */
    public function execActionByRequest()
    {
        $method =  $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // HTTPメソッドにより対応したルーティングを取得
        $route_array = $this->getRouteArrayByHttpMethod($method);

        if (!array_key_exists($uri, $route_array)) {
            return false;
        }
        $route = $route_array[$uri];
        $controller_array = $this->getControllerAndMethodByRoute($route);
        $obj = new $controller_array['controller']; // 変数からインスタンス化
        return call_user_func(array($obj, $controller_array['action'])); //変数で関数を実行するため
    }

    /**
     * Route(*Controller@method)から指定のコントローラ・メソッドを取得
     * @param $route // URIから指定したメソッド
     */
    private function getControllerAndMethodByRoute($route)
    {
        // $routeを @ の前後で分ける
        list($controller_name, $action) = explode("@", $route);
        $controller = "\Controller\\" . $controller_name;
        return compact('controller', 'action');
    }

    /**
     * METHODからRouteを分岐
     * @return string // HTTPメソッド
     */
    private function getRouteArrayByHttpMethod($method)
    {
        if ($method === "GET") {
            return $this->route_get_array;
        } elseif($method === "POST") {
            return $this->route_post_array;
        }
    }

}