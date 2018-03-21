<?php
namespace Controllers;

class BaseController
{

    /**
     * viewを名前からファイルを特定して読み込む処理
     * @param $view_name
     * @param $val // view呼び出し時にControllerから渡す引数
     */
    public function view($view_name, $val = [])
    {
        $root = '/Users/asahi.aihara/ms_data_tool/';
        $view = $root . 'resources/view/' . $view_name .'.php';
        if (is_readable($view)) {
            require_once($view);
        }
        return false;
    }
}