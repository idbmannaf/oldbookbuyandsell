<?php
namespace App\classes;
use App\classes\Database;
class Dbhelper extends Database {
    function __construct()
    {
        parent::__construct();
    }
    function toArray($tablename)
    {
        $res = $this->db->query("select * from `" . $tablename . "` where 1");
        if ($res->num_rows > 0) {
            $rows = [];
            while ($r = $res->fetch_assoc()) {
                $rows[] = $r;
            }
            return $rows;
        } else {
            return null;
        }
    }
}