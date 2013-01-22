<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2013/01/22
 * Time: 10:44 AM
 */

include_once 'Database.php';

class GripModel
{

    var $dbo;

    function __construct(){
        $this->dbo = new Database();
    }

    function __destruct(){
        $this->dbo->closeConnection();
    }

    public function getBoreholes() {

        $sql = "SELECT * FROM boreholes";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->query($sql);
            $boreholes = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->dbo->closeConnection();
            $db = null;
            return json_encode($boreholes);
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    public function getBorehole($id) {
        $sql = "SELECT * FROM boreholes WHERE pid=:id";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $borehole = $stmt->fetchObject();
            $this->dbo->closeConnection();
            $db = null;
            return json_encode($borehole);
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

}
