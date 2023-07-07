<?php

class RegistroController extends Controller{

    public function index(){
        $this->loadview('registro');
    }

    public function add(){
        if(empty($_POST['registro']))
            throw new Exception("Rellena el formulario.");

        $registro=new User();
        $registro->displayname= $_POST['displayname'];
        $registro->password= md5($_POST['password']);
        $registro->phone= $_POST['phone'];
        $registro->email= $_POST['email'];
        $registro->save();
        Session::Flash('success',"Felicidades $registro->displayname te has registrado.");
        redirect('/login');
    }
}