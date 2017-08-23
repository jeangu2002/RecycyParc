<?php
namespace AppBundle\Service;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rest
 *
 * @author jean-gustave
 */
class Rest {
    public function GetCommunes()
    {
        $headers = array('Accept' => 'application/json');
        $query = array('q' => 'Frank sinatra', 'type' => 'track');
        
        $response = Unirest\Request::get('http://geoservices.wallonie.be/geolocalisation/rest/getListeCommunes/',$headers);
        // or use a plain text request
        // $response = Unirest\Request::get('https://api.spotify.com/v1/search?q=Frank%20sinatra&type=track');

        // Display the result
        return $response;
    }
}
