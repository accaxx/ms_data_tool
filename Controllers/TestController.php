<?php
namespace Controllers;

use Models\Tests;

class TestController extends BaseController
{
    public $tests_model;

    /**
     * TestController constructor.
     * @param TestsModel $tests_model
     */
    public function __construct()
    {
        $this->tests_model = new Tests;
    }

    /**
     * GETメソッド時実行アクション
     */
    public function indexGet()
    {
        $this->tests_model->getAll();
        return $this->view('test');
    }

    /**
     * POSTメソッド時実行アクション
     */
    public function indexPost()
    {
        $this->view('post_test');
    }
}