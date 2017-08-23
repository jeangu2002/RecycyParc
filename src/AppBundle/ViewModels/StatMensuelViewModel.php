<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\ViewModels;

/**
 * Description of StatMensuelViewModel
 *
 * @author jean-gustave
 */
class StatMensuelViewModel implements \JsonSerializable {
    private $mois;
    private $quantite;
    private $mesure;
    
    function __construct($mois, $quantite, $mesure) {
        $this->mois = $mois;
        $this->quantite = $quantite;
        $this->mesure = $mesure;
    }

    
    public function jsonSerialize() {
        return array(
            'mois'=>$this->mois,
            'quantite' => $this->quantite,
            'mesure'=>$this->mesure
            
        );
    }

}
