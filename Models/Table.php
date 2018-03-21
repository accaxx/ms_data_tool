<?php
namespace Models;

/**
 * Databaseに関連するデータを取得するモデル
 * @package Model
 *
 */
class Table extends BaseModel
{
    private $table_name;

    /**
     * Table constructor.
     */
    public function __construct($inputs_table)
    {
        parent::__construct();
        $this->table_name = $inputs_table;
    }

    public function getAllData()
    {
        $all_data = $this->db->query("SELECT * FROM $this->table_name")->fetchall(\PDO::FETCH_ASSOC|\PDO::FETCH_UNIQUE);
        $this->db = null;
        return $all_data;
    }
}