<?php
namespace Controllers;

use Models\Table as TableModel;
use framework\Request;

class TableController extends BaseController
{
    private $table_model;
    private $request;
    private $table_name;

    public function __construct()
    {
        // *todo URIから変数を取得する
        $this->request = new Request();
        $this->table_name = $this->request->post_array['table_name'];
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

    /**
     * 指定テーブルの新規データを保存後データ一覧を表示
     * @return response
     */
    public function create()
    {
        $this->table_model->create($this->request->post_array);
        return $this->view('table/index', ['all_data' => $this->table_model->getAllData(), 'table_name' => $this->table_name]);
    }

    /**
     * 指定テーブルの既存データを削除後データ一覧を表示
     * @return response
     */
    public function delete()
    {
        if (isset($this->request->post_array['id'])) {
            $this->table_model->delete($this->request->post_array['id']);
        }
        return $this->view('table/index', ['all_data' => $this->table_model->getAllData(), 'table_name' => $this->table_name]);
    }
}