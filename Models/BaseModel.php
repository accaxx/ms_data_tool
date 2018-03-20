<?php
namespace Models;

class BaseModel
{
    protected $db;
    protected $class;

    /**
     * BaseModel constructor.
     */
    protected function __construct()
    {
        $this->connectDatabase();
        // 呼び出しクラスからテーブル名を定義
        $this->class = strtolower(ltrim(get_called_class(), 'Models\\'));
    }

    /**
     * DBへ接続
     */
    protected function connectDatabase()
    {
        try {
            $this->db = new \PDO('mysql:host=localhost;dbname=data_tool;charset=utf8;unix_socket=/tmp/mysql.sock',
                'dbuser', 'Dbuser100!', array(\PDO::ATTR_EMULATE_PREPARES => false));
        } catch (\PDOException $e) {
            print "error: " . $e->getMessage() . "<br />";
            die();
        }
    }

    /**
     * クラスと名前が同じテーブルから全てのカラムを表示
     */
    public function getAll()
    {
        foreach($this->db->query("SELECT * from $this->class") as $row) {
            print_r($row);
        }
        $this->db = null;
    }
}