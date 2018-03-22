<?php
namespace Controllers;

use Models\Table as TableModel;

class TableController extends BaseController
{
    private $table_model;

    public function __construct()
    {
        $inputs_table = $_POST['table_name'];
        $this->table_model = new TableModel($inputs_table);
    }

    public function index()
    {
        return $this->view('table/index', $this->table_model->getAllData());
    }
}