<?php
namespace Controller;

class TestController
{
    /**
     * TestController constructor.
     */
    public function __construct()
    {
        echo "TestController construct";
    }

    /**
     * GETメソッド時実行アクション
     */
    public function indexGet()
    {
        echo "index Get method";
    }

    /**
     * POSTメソッド時実行アクション
     */
    public function indexPost()
    {
        echo "index Post method";
    }
}