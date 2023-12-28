<?php

namespace Models;

use DateTime;
use PDO;

class ArticleManager
{
    private PDO $db;
    public function __construct()
    {
        $this->db = new \PDO(
            "mysql:dbname=blog;host=127.0.0.1",
            'root',
            '',
            [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
            ]
        );
    }
}
