<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

Class TestController extends AppController{

        public function index(){
           $connection = ConnectionManager::get('db2'); 
        }

    public function bablu(){

        $test = 'Hello User';
        $this->set(compact('test'));
        // $this->autoRender=false;
        // echo "welcome";
        $array=array('name'=>'bablu','email'=>'bablu@gmail.com');
        $this->set(compact("array"));
}

       



}


?>