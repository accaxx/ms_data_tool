<?php
namespace Controllers;

class BaseController
{
    /**
     * viewを名前からファイルを特定して読み込む処理
     * @param $view_name
     * todo $root定数化
     */
    public function view($view_name)
    {
        $root = '/Users/asahi.aihara/ms_data_tool/';
        $view = $root . 'resources/view/' . $view_name .'.html';
        readfile($view);
    }
}