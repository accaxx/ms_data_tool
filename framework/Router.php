<?php
namespace framework;

class Router
{
    private $request;
    private $all_route_array;

    public function __construct($request)
    {
        // Route設定
        $this->all_route_array = require_once(ROOT_DIR.'/route/web.php');
        $this->request = $request;
    }

    /**
     * Requestから必要なコントローラとメソッドを呼び出して実行
     * @return response // メソッド実行
     */
    public function execActionByRequest()
    {
        $action = $this->getActionInfoByRoute($this->getRouteByUri());
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
     * URIから対応したcontroller@methodのroutingを取得
     * @return string routing
     */
    private function getRouteByUri()
    {
        if (!isset($this->all_route_array[$this->request->method][$this->request->uri])) {
            return false;
        }
        return $this->all_route_array[$this->request->method][$this->request->uri];
    }
}
