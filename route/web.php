<?php
return [
    //GETメソッド/URIに対してコントローラ/メソッドを定義
    'GET' => [
        '/' => 'IndexController@index',
    ],

    //POSTメソッド/URIに対してコントローラ/メソッドを定義
    'POST' => [
        '/table' => 'TableController@index',
        '/table/get_create' => 'TableController@getCreate',
        '/table/create' => 'TableController@create',
        '/table/delete' => 'TableController@delete',
        '/table/get_update' => 'TableController@getUpdate',
        '/table/update' => 'TableController@update',
    ],
];
