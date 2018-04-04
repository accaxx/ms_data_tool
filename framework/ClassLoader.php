<?php

class ClassLoader
{
    public function __construct()
    {
    }

    /**
     * オートローダーへ登録
     */
    public function register()
    {
        spl_autoload_register(array('ClassLoader', 'loadClass'));
    }

    /**
     * 名前空間とクラス名からファイルを特定して読み込む
     * @return response File
     */
    public function loadClass($class)
    {
        $classNamespace = ltrim($class, '\\');
        $classFileName = ROOT_DIR . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $classNamespace) . '.php';
        if(is_readable($classFileName)){
            require_once($classFileName);
            return true;
        } else {
            return false;
        }
    }
}
