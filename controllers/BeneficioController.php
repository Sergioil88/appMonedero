<?php

class BeneficioController extends Controller{

    public function index(){
        $this->loadView('beneficio/list');
    }
}