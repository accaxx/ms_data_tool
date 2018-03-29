<?php
return [
    //GETメソッド/URIに対してコントローラ/メソッドを定義
    'GET' => [
        '/' => 'IndexController@index',
    ],

    //POSTメソッド/URIに対してコントローラ/メソッドを定義
    'POST' => [
        '/table' => 'TableController@index',
        // 変数無しURIver. *todo /tablest/:table_name/create
        '/table/get_create' => 'TableController@getCreate',
        '/table/create' => 'TableController@create',
    ],
];
