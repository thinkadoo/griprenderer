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
            return $boreholes;
        } catch(PDOException $e) {
            return $e->getMessage();
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
            return $borehole;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getHAreas() {

        $sql = "SELECT * FROM h_area";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->query($sql);
            $h_areas = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->dbo->closeConnection();
            $db = null;
            return $h_areas;
        } catch(PDOException $e) {
            return $e->getMessage();
        }

    }

    public function getDistricts() {

        $sql = "SELECT * FROM district";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->query($sql);
            $districts = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->dbo->closeConnection();
            $db = null;
            return $districts;
        } catch(PDOException $e) {
            return $e->getMessage();
        }

    }

    public function getCatchments() {

        $sql = "SELECT * FROM quaternary";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->query($sql);
            $catchments = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->dbo->closeConnection();
            $db = null;
            return $catchments;
        } catch(PDOException $e) {
            return $e->getMessage();
        }

    }

    public function getMunicipalityFromDistrict($id) {

        $sql = "SELECT * FROM municipality WHERE districtID=:id";
        try {
            $db = $this->dbo->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $municipalities = $stmt->fetchAll();
            $this->dbo->closeConnection();
            $db = null;
            return $municipalities;
        } catch(PDOException $e) {
            return $e->getMessage();
        }

    }

    public function getMunicipalityFromHArea($id) {



    }

    /*
case "municipality":{
if($from == "district")
{
$data["municipality"] = q("SELECT id, name FROM municipality WHERE districtID IN ".$id." ORDER BY name ASC");
}
if($from == "h_area")
{
    $tmpHID = commaBuilder(q("SELECT id, '' FROM h_area WHERE id IN ".$id." ORDER BY id ASC"));
    $tmpBID = commaBuilder(q("SELECT DISTINCT(municipality), '' FROM boreholes WHERE h_area IN ".$tmpHID." ORDER BY municipality ASC"));

    $data["municipality"] = q("SELECT id, name FROM municipality WHERE id IN ".$tmpBID." ORDER BY name ASC");
}
break;
}
    */


}
