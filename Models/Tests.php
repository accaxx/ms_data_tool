<?php
namespace Models;

class Tests extends BaseModel
{
    /**
     * Tests constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getTests()
    {
        foreach($this->db->query('SELECT * from tests') as $row) {
            print_r($row);
        }
        $this->db = null;
    }
}