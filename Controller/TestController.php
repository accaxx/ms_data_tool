<?php
namespace Controller;

class TestController
{
    public function __construct()
    {
        echo "TestController construct";
    }

    public function indexGet()
    {
        echo "index Get method";
    }

    public function indexPost()
    {
        echo "index Post method";
    }
}