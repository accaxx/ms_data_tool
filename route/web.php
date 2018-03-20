<?php
return [
    //GETメソッド/URIに対してコントローラ/メソッドを定義
    'get' => [
        '/test' => 'TestController@indexGet',
    ],

    //POSTメソッド/URIに対してコントローラ/メソッドを定義
    'post' => [
        '/test' => 'TestController@indexPost',
    ],
];
