<?php
namespace Models;

/**
 * Databaseに関連するデータを取得するモデル
 * @package Model
 *
 */
class Table extends BaseModel
{
    public $table_name;

    /**
     * Table constructor.
     */
    public function __construct($table_name)
    {
        parent::__construct();
        $this->table_name = $table_name;
    }

    /**
     * 指定テーブルの全ての情報を表示
     * @return array $all_data
     */
    public function getAllData()
    {
        $all_data = $this->db->query("SELECT * FROM $this->table_name")->fetchall(\PDO::FETCH_ASSOC);
        $this->db = null;
        return $all_data;
    }

    /**
     * 指定テーブルの全てのカラムを取得
     * @return array $all_column_name
     */
    public function getAllColumns()
    {
        $all_data = $this->db->query("SHOW COLUMNS FROM $this->table_name;")->fetchall(\PDO::FETCH_ASSOC);
        $this->db = null;
        return $all_data;
    }

    /**
     * @param $id
     * @return array $data
     */
    public function getColumnById($id)
    {
        $data = $this->db->query("SELECT * FROM $this->table_name WHERE id = $id")->fetchall(\PDO::FETCH_ASSOC);
        $this->db = null;
        if (isset($data[0])) {
            $data_first = $data[0];
            return $data_first;
        }
        return false;
    }
}