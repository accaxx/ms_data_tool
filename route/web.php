<?php
return [
    //GETメソッド/URIに対してコントローラ/メソッドを定義
    'get' => [
        '/' => 'IndexController@index',
        '/test' => 'TestController@indexGet',
    ],

    //POSTメソッド/URIに対してコントローラ/メソッドを定義
    'post' => [
        '/test' => 'TestController@indexPost',
    ],
];
