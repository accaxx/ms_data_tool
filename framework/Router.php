<?php
namespace framework;

class Router
{
    /**
     * 特定のURIに対してコントローラ/メソッドを定義
     */
    public $route_array = [
        '/test' => 'TestController@index',
    ];

    /**
     * Requestから必要なコントローラとメソッドを呼び出す
     * @return response Controller
     */
    public function setRoute()
    {
        // RequestのURIから指定メソッドがあるか条件分岐
        if (array_key_exists($this->getRequestUri(), $this->route_array)){
            $route = $this->route_array[$this->getRequestUri()];
            return $this->getControllerAndMethodByRoute($route);
        }
        return false;
    }

    /**
     * Route(*Controller@method)から指定のコントローラ・メソッドを呼び出す
     * @param $route // URIから指定したメソッド
     */
    private function getControllerAndMethodByRoute($route)
    {
        // $routeを @ の前後で分ける
        list($controller_name, $method) = explode("@", $route);
        $controller = "\Controller\\" . $controller_name;

        $obj = new $controller; // 変数からインスタンス化
        return call_user_func(array($obj, $method)); //変数で関数を実行するため
    }

    /**
     * RequestのURLを取得
     * @return string // URIパラメータ
     */
    private function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }
}