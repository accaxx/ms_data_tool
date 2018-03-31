<?php
namespace Models;

class BaseModel
{
    protected $db;

    /**
     * BaseModel constructor.
     */
    protected function __construct()
    {
        // DBへ接続
        $this->connectDatabase();
    }

    /**
     * DBへ接続
     */
    protected function connectDatabase()
    {
        try {
            $this->db = new \PDO(
                'mysql:host='. DB_HOST .
                ';dbname='. DB_NAME .
                ';charset=' . DB_CHARSET .
                ';unix_socket=' . DB_UNIX_SOCKET,
                DB_USER, DB_PASSWORD,
                array(\PDO::ATTR_EMULATE_PREPARES => false)
            );
        } catch (\PDOException $e) {
            print "error: " . $e->getMessage() . "<br />";
            die();
        }
    }

    /**
     * 指定テーブルにデータ1行を追加
     */
    public function create($val = [])
    {
        // POSTで送っているtable_nameは不必要
        unset($val['table_name']);

        $columns = implode(",", array_keys($val));
        // シングルクオートで囲まなければvalueがエラーはくため
        $values = "'" . implode("','", array_values($val)) . "'";
        $this->db->query("INSERT INTO $this->table_name ($columns) VALUES ($values);");
    }

    /**
     * 指定テーブルからIDから指定したデータ1行を削除
     * @param $id
     */
    public function delete($id)
    {
        $this->db->query("DELETE FROM $this->table_name where id = '$id';");
    }
}