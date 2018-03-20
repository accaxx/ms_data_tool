<?php
namespace Controllers;

class TestController extends BaseController
{
    /**
     * GETメソッド時実行アクション
     */
    public function indexGet()
    {
        $this->view('test');
    }

    /**
     * POSTメソッド時実行アクション
     */
    public function indexPost()
    {
        $this->view('post_test');
    }
}