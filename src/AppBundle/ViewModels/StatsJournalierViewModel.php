<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\ViewModels;

/**
 * Description of StatsJournalierViewModel
 *
 * @author jean-gustave
 */
class StatsJournalierViewModel implements \JsonSerializable{
    private $jour;
    private $quantite;
    private $mesure;
    function __construct($jour, $quantite, $mesure) {
        $this->jour = $jour;
        $this->quantite = $quantite;
        $this->mesure = $mesure;
     
    }
    
    function getJour() {
        return $this->jour;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function setJour($jour) {
        $this->jour = $jour;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }
    function getMesure() {
        return $this->mesure;
    }

    function setMesure($mesure) {
        $this->mesure = $mesure;
    }

    
    public function jsonSerialize() {
        return array(
            'jour'=>$this->jour,
            'quantite' => $this->quantite,
            'mesure'=>$this->mesure
        );
    }

}
