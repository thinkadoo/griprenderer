<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2013/01/22
 * Time: 10:43 AM
 */

class Database
{
    var $dbn;

    function __construct(){

    }

    function __destruct(){
        $this->dbn = null;
    }

    public function getConnection() {
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="root";
        $dbname="grip";
        $this->dbn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $this->dbn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->dbn;
    }

    public function closeConnection(){
        $this->dbn = null;
    }

}
