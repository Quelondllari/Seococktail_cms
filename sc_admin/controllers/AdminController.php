<?php

class AdminController
{
    public $temp_plug;
    public function __construct(){
        return true;
    }

    public function actionIndex(){
        echo $this->temp_plug->render('@admin/index.html', array('name' => 'Алексей'));
        return true;
    }
}