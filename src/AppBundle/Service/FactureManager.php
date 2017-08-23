<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

/**
 * Description of FactureManager
 *
 * @author jean-gustave
 */
class FactureManager {
    public function calulate($facture) {
        $contenus = $facture->getContenuDechets();
        $montant;
        
        foreach($contenus as $contenu )
        {
           
        }
    }
}
