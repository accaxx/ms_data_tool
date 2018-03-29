<?php
namespace Controllers;

use Models\Table as TableModel;

class TableController extends BaseController
{
    private $table_model;
    private $table_name;

    public function __construct()
    {
        // *todo URIから変数を取得する
        $this->table_name = $_POST['table_name'];
        $this->table_model = new TableModel($this->table_name);
    }

    /**
     * 指定テーブルの全行を取得してビューへ渡し、ビューを表示する
     * @return response
     */
    public function index()
    {
        return $this->view('table/index', ['all_data' => $this->table_model->getAllData(), 'table_name' => $this->table_name]);
    }

    /**
     * 指定テーブルのデータ追加ページを表示
     * @return response
     */
    public function getCreate()
    {
        return $this->view('table/create', ['all_data' => $this->table_model->getAllColumns(), 'table_name' => $this->table_name]);
    }
}