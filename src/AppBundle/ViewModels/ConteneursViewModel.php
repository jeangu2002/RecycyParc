<?php
namespace AppBundle\Entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\ViewModels;

/**
 * Description of ConteneursViewModel
 *
 * @author jean-gustave
 */
class ConteneursViewModel {
    private $dechet;
    private $volumeDepose;
    private $VolumeAutorise;
    private $reste;
    function getDechet() {
        return $this->dechet;
    }

    function getVolumeDepose() {
        return $this->volumeDepose;
    }

    function getVolumeAutorise() {
        return $this->VolumeAutorise;
    }

    function getReste() {
        return $this->reste;
    }

    function setDechet($dechet) {
        $this->dechet = $dechet;
    }

    function setVolumeDepose($volumeDepose) {
        $this->volumeDepose = $volumeDepose;
    }

    function setVolumeAutorise($VolumeAutorise) {
        $this->VolumeAutorise = $VolumeAutorise;
    }

    function setReste($reste) {
        $this->reste = $reste;
    }


}
