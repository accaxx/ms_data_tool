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
        $this->request = new Request();
        $this->table_name = $this->request->post_array['table_name'];
        $this->table_model = new TableModel($this->table_name);
    }

    /**
     * 指定テーブルの全行を取得してビューへ渡し、ビューを表示する
     * @return action
     */
    public function index()
    {
        return $this->viewAllTableData();
    }

    /**
     * 指定テーブルのデータ追加ページを表示
     * @return response
     */
    public function getCreate()
    {
        return $this->render(['all_data' => $this->table_model->getAllColumns(), 'table_name' => $this->table_name]);
    }

    /**
     * 指定テーブルの新規データを保存後データ一覧を表示
     * @return response
     */
    public function create()
    {
        $this->table_model->create($this->request->post_array);
        return $this->viewAllTableData();
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
        return $this->viewAllTableData();
    }

    /**
     * 指定テーブルのデータ編集ページを表示
     * @return response
     */
    public function getUpdate()
    {
        return $this->render(['data' => $this->table_model->getColumnById($this->request->post_array['id']), 'table_name' => $this->table_name]);
    }

    /**
     * 指定テーブルのデータを更新後データ一覧を表示
     * @return response
     */
    public function update()
    {
        $this->table_model->update($this->request->post_array);
        return $this->viewAllTableData();
    }

    /**
     * tableのindexページ、テーブル内データ一覧を表示
     * @return response
     */
    private function viewAllTableData()
    {
        return $this->view('table/index', ['all_data' => $this->table_model->getAllData(), 'table_name' => $this->table_name]);
    }
}
