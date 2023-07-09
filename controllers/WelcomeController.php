<?php

/* Clase: Welcome
 *
 * Controlador por defecto, según la configuración de config.php
 *
 * Autor: Robert Sallent
 * Última revisión: 07/03/2023
 *
 */

    class WelcomeController extends Controller{
        
        // método responsable de mostrar la portada
        public function index(){
            if(!Login::user()==null){
                $factura= new FacturaController();
                $factura->list();
            } else{
                $this->loadView('welcome');
            }
        }
    }