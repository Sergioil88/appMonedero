<?php

/* Clase: Request
 * 
 * Permitirá acceder a los datos saneados de la petición 
 * fácilmente desde los controladores.
 * 
 * Autor: Robert Sallent
 * Última mofidicación: 13/04/2023
 * 
 */

class Request{
    
    // PROPIEDADES
    public ?Authenticable $user;
    public ?string $url;
    public ?string $csrfToken;
    
    // crea un objeto de tipo Request
    public static function create(){
        $request = new self();
        
        $request->user = Login::user();          // mete el usuario identificado en la Request
        $request->url = $_SERVER['REQUEST_URI']; // mete la URL en la request
        $request->csrfToken = apache_request_headers()['csrf_token'] ?? null; // token CSRF que llega en los headers
        
        return $request;
    }
    
    // método que comprueba si llega un parámetro
    public function has(
        string $name, 
        string $method = 'POST'  // POST, GET o COOKIE
            
    ):bool{
        switch(strtoupper($method)){
            case 'POST' : return isset($_POST[$name]);
            case 'GET' : return isset($_GET[$name]);
            case 'COOKIE' : return isset($_COOKIE[$name]);
        }
        
        return false; 
    }
    
    // método que recupera los datos saneados para POST
    public function post(
        string $name        // nombre del campo a recuperar
        
    ): ?string{
        
        $data = $_POST[$name] ?? NULL; 
        return  $data ? (DB_CLASS)::escape($data) : NULL;
    }
    
    
    // método que recupera los datos saneados para GET
    public function get(
        string $name        // nombre del parámetro a recuperar
        
    ): ?string{
            
        $data = $_GET[$name] ?? NULL;
        return  $data ? (DB_CLASS)::escape($data) : NULL;
    }
    
    
    // método que recupera los datos saneados por COOKIE
    public function cookie(
        string $name        // nombre de la cookie a recuperar
 
    ): ?string{
        
        $data = $_COOKIE[$name] ?? NULL;
        return  $data ? (DB_CLASS)::escape($data) : NULL;
    }    
    

    // retorna los datos en el cuerpo de la petición
    // no los sanea puesto que si son en JSON tendríamos problemas
    public function body():string{
        return file_get_contents('php://input');
    }
    
}


