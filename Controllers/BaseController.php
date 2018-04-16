<?php
namespace Controllers;

class BaseController
{
    /**
     * viewを名前からファイルを特定して読み込む処理
     * @param $view_name
     * @param array $val // view呼び出し時にControllerから渡す引数
     */
    public function view($view_name, $val = [])
    {
        $view = ROOT_DIR . '/resources/view/' . $view_name .'.php';
        if (is_readable($view)) {
            require_once($view);
        }
        return false;
    }

    /**
     * viewをコントローラ/メソッド名から特定して読み込む処理
     * @param array $val // view呼び出し時にControllerから渡す引数
     */
    public function render($val = [])
    {
        $called_array = debug_backtrace();
        $last_called_array = $called_array[1]; // 呼び出し元の情報を抽出

        $class_controller = strtolower($last_called_array['class']); // 呼び出し元クラス
        $class = str_replace(['controllers\\', 'controller'], ['', ''], $class_controller); // ディレクトリ名Controllersを削除
        $function = $last_called_array['function']; // 呼び出し元関数名

        $view = ROOT_DIR . '/resources/view/' . $class . '/' . $function . '.php';
        if (is_readable($view)) {
            require_once($view);
        }
        return false;
    }
}
