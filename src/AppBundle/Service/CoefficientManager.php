<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

/**
 * Description of Coefficient
 *
 * @author jean-gustave
 */
class CoefficientManager {
   public function calculate($enfants, $adultes)
   {
       if($enfants <= 3 && $adultes <= 2 )
           return 0;
       else if ($enfants <= 3 && $adultes <= 4 )
       {
           return 5;
       } else if ($enfants <= 3 && $adultes > 4 )
       {
           return 10;   
       }else if ($enfants > 3 && $adultes <= 2 )
       {
           return 5;
       }else if ($enfants > 3 && $adultes <= 4 )
       {
           return 10;
       }else if ($enfants > 3 && $adultes > 4 )
       {
           return 15;
       }
   }
}
