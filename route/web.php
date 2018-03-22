<?php
return [
    //GETメソッド/URIに対してコントローラ/メソッドを定義
    'GET' => [
        '/' => 'IndexController@index',
    ],

    //POSTメソッド/URIに対してコントローラ/メソッドを定義
    'POST' => [
        '/table' => 'TableController@index'
    ],
];
