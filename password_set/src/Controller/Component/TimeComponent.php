<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;


class TimeComponent extends Component
{
   
    
    protected $_defaultConfig = [];

    public function mydata(){
       
            $data = 'dddddddddd';
            return $data;
        
        // $date = new DateTime($cre_time, new DateTimeZone('UTC'));
        // $date->setTimezone(new DateTimeZone("Asia/Kolkata"));
        // $cre_time= $date->format('d-m-Y H:i:a');  
        // return $cre_time;
    }

}