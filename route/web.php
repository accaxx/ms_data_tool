<?php
//GETメソッド/URIに対してコントローラ/メソッドを定義
$route_get_array = [
    '/test' => 'TestController@indexGet',
];

//POSTメソッド/URIに対してコントローラ/メソッドを定義
$route_post_array = [
    '/test' => 'TestController@indexPost',
];
