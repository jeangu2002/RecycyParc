<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\ViewModels;

/**
 * Description of NotificationViewModel
 *
 * @author jean-gustave
 */
class NotificationViewModel {
    private $date;
    private $message;
    function getDate() {
        return $this->date;
    }

    function getMessage() {
        return $this->message;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setMessage($message) {
        $this->message = $message;
    }


}
