<?php
namespace Models;

/**
 * Databaseに関連するデータを取得するモデル
 * @package Model
 *
 */
class Database extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * データベースにある全てのテーブル名を取得する
     * @return array $all_tables_name
     */
    public function getAllTablesName()
    {
        $data = $this->db->query("SHOW TABLES")->fetchall(\PDO::FETCH_ASSOC);
        $all_tables_name = [];

        foreach ($data as $key => $value) {
            array_push($all_tables_name, $value['Tables_in_' . DB_NAME]);
        }

        $this->db = null;
        return $all_tables_name;
    }
}