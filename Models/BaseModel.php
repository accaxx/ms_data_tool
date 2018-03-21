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
            $this->db = new \PDO('mysql:host=localhost;dbname=data_tool;charset=utf8;unix_socket=/tmp/mysql.sock',
                'dbuser', 'Dbuser100!', array(\PDO::ATTR_EMULATE_PREPARES => false));
        } catch (\PDOException $e) {
            print "error: " . $e->getMessage() . "<br />";
            die();
        }
    }
}