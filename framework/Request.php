<?php
namespace framework;

class Request
{
    public $method;
    public $uri;
    public $post_array = [];

    /**
     * Request 全体で使うパラメータ設定
     */
    public function __construct()
    {
        $this->method = $this->getHttpMethod();
        $this->uri = $this->getUri();
        $this->post_array = $this->getPostArray();
    }

    /**
     * HTTPリクエストのメソッドが正しいか判定してメソッドを返す
     * @return string method
     */
    public function getHttpMethod()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if (!in_array($method, ['GET', 'PUT', 'POST','DELETE'])) {
            return false;
        }
        return $method;
    }

    /**
     * HTTPリクエストのURIが文字列か判定して返す
     * @return string uri
     * todo URIのminバリデーション
     */
    public function getUri()
    {
        $uri = $_SERVER['REQUEST_URI'];

        //string max && string ? URIに必要なバリデーション
        if (!is_string($uri)) {
            return false;
        }
        return $uri;
    }

    public function getPostArray()
    {
        $inputs = $_POST;
        $post_array = [];

        // リクエスト一覧を受け取って保存する
        foreach ($inputs as $key => $input) {
            if (!empty($input)) {
                $post_array += [$key => $input];
            }
        }
        return $post_array;
    }
}
