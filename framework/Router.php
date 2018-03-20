<?php
namespace framework;

class Router
{
    /**
     * Requestから必要なコントローラとメソッドを呼び出して実行
     * @return response // メソッド実行
     */
    public function execActionByRequest()
    {
        $http_method =  $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // HTTPメソッドにより対応したルーティングを取得
        $route_array = $this->getRouteArrayByHttpMethod($http_method);

        if (!array_key_exists($uri, $route_array)) {
            return false;
        }
        $route = $route_array[$uri];
        $controller_and_method = $this->getControllerAndMethodByRoute($route);
        $obj = new $controller_and_method['controller']; // 変数からインスタンス化
        return call_user_func(array($obj, $controller_and_method['method'])); //変数で関数を実行するため
    }

    /**
     * Route(Controller@method)から指定のコントローラ・メソッドを取得
     * @param array controllerとactionの連想配列
     */
    private function getControllerAndMethodByRoute($route)
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
    private function getRouteArrayByHttpMethod($http_method)
    {
        // routeディレクトリからroute配列を読み込み
        include( __DIR__.'/../route/web.php');

        if ($http_method === 'GET') {
            return $route_get_array;
        } elseif($http_method === 'POST') {
            return $route_post_array;
        }
    }

}