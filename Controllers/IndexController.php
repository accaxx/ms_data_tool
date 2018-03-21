<?php
namespace Controllers;

use Models\Database as DatabaseModel;

class IndexController extends BaseController
{
    private $database_model;

    public function __construct()
    {
        $this->database_model = new DatabaseModel();
    }

    /**
     * indexページ取得
     * @return mixed
     */
    public function index()
    {
        return $this->view('index', $this->database_model->getAllTablesName());
    }
}