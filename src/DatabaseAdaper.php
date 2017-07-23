<?php
/**
 * Created by PhpStorm.
 * User: Nathi
 * Date: 09/07/2017
 * Time: 11:29
 */

namespace App;


class DatabaseAdaper
{
    protected $connection;

    function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }


}