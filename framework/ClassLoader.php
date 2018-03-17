<?php

class ClassLoader
{

    private $root_dir;

    public function __construct($root)
    {
        $this->root_dir = $root;
    }

    /*
     * オートローダーへ登録
     */
    public function register()
    {
        spl_autoload_register(array('ClassLoader', 'loadClass'));
    }

    /*
     * 名前空間とクラス名からファイルを特定して読み込む
     */
    public function loadClass($class)
    {
        $classNamespace = ltrim($class, '\\');
        $classFileName = $this->root_dir . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $classNamespace) . '.php';
        if(is_readable($classFileName)){
            require_once($classFileName);
            return true;
        } else {
            return false;
        }
    }
}

