<?php
namespace Controllers;

class BaseController
{
    /**
     * viewを名前からファイルを特定して読み込む処理
     * @param $view_name
     * todo $root定数化
     */
    protected function view($view_name)
    {
        $view =  __DIR__ . '/../resources/view/' . $view_name . '.html';
        readfile($view);
    }
}