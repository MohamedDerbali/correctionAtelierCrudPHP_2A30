<?php
require_once "../models/config.php";

class ClientC {
    public function listClients (){
        $sql = "SELECT * FROM client";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result=$query->fetchALL();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function deleteClient($idClient){
        $sql = "DELETE FROM client where idClient = ?";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(1, $idClient);
            $query->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function addClient($client){
        $sql = "INSERT INTO client (lastName, firstName, address, dob) VALUES (:lastName, :firstName, :address, :dob)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue('lastName', $client->getLastNameC());
            $query->bindValue('firstName', $client->getFirstNameC());
            $query->bindValue('address', $client->getAddressC());
            $query->bindValue('dob', $client->getDobC()->format('Y-m-d'));
            // var_dump($query->debugDumpParams());
            $query->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function updateClient(){
        
    }
}
