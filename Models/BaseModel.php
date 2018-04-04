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
     * @param array $val
     */
    public function create($val = [])
    {
        // POSTで送っているtable_nameは不必要
        unset($val['table_name']);

        $columns = implode(",", array_keys($val));
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

    /**
     * 指定テーブルからIDから指定したデータ1行を更新
     * @param array $val
     */
    public function update($val = [])
    {
        // POSTで送っているtable_nameは不必要
        unset($val['table_name']);

        $id = $val['id']; // query内は文字列
        $update_columns_array = [];

        foreach($val as $key => $value) {
            array_push($update_columns_array, $key ."=" . "'$value'");
        }
        $update_columns_query = implode(",", $update_columns_array);

        $this->db->query("UPDATE $this->table_name SET $update_columns_query where id = '$id';");
    }
}
