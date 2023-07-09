<?php

class GastoController extends Controller{

    public function index(){
        $this->list();
    }
    public function list(int $page=1){

        //datos para la paginación
        $limit=RESULTS_PER_PAGE;
        $total= Gasto::total();

        //crea un objeto paginación
        $paginator= new Paginator('/gasto/list', $page, $limit,$total);

        $gastos=Gasto::orderBy('categoria','ASC',$limit,$paginator->getOffset());
        $this->loadView('/gasto/list',[
            'gastos' => $gastos,
            'paginator'=> $paginator
        ]);
    }
    //metodo para llamar la vista creación de gasto
    public function create(){
        $this->loadView('/gasto/create');
    }
    public function edit(int $id){
        if (empty($gasto=Gasto::getById($id)))
                throw new Exception("El gasto con $id no existe.");

        $this->loadView('/gasto/edit',[
            "gasto"=>$gasto
        ]);
    }
    //crear nueva categoría
    public function save(){
        if(empty($_POST['añadir']))
            throw new Exception("No se ha enviado el formulario vacio.");
        
        $gasto=new Gasto;
        if(Gasto::getFiltered("categoria",$_POST['categoria'])){
            Session::flash("error",'Categoría '.$_POST['categoria'].' ya existe.');
            redirect("/gasto/list");
        }else{
            $gasto->categoria=ucfirst($_POST['categoria']);
            $gasto->save();
            Session::Flash("success",'Categoría '.$_POST['categoria'].' añadida.');
            redirect('/gasto/list');
        }
    }
    //actualización de Gasto
    public function update(int $id){
        if(empty($_POST['modificar']))
            throw new Exception("No se ha enviado el formulario.");
        
        $gasto=Gasto::getById($id);
        $oldgasto=$gasto->categoria;
        if(Gasto::getFiltered("categoria",$_POST['categoria'])){
            Session::flash("error",'Categoría '.$_POST['categoria'].' ya existe.');
            redirect("/gasto/edit/$gasto->id");
        }else{
            $gasto->categoria=ucfirst($_POST['categoria']);
            $gasto->update();
            Session::Flash("success",'La categoría '.$oldgasto.' se ha modificado a '.ucfirst($_POST['categoria']).'.');
            redirect('/gasto/list');
        }
    }
    //eliminar categoria
    public function delete(int $id){

        $gasto=Gasto::getById($id);
        $this->loadView('/gasto/delete',[
            'gasto'=> $gasto
        ]);
    }
    public function destroy(int $id){
        if(empty($_POST['destroy']))
            throw new Exception("No se ha enviado el formulario.");
        
        $gasto=Gasto::getById($id);
        if (Factura::getFiltered("idgasto",$id)){
            Session::Flash('error','No se puede borrar, hay facturas con la categoría '.$gasto->categoria.'.');
        }else{
            Gasto::delete($id);
            Session::Flash("success",'La Categoría '.$gasto->categoria.'borrada!');
        }
        redirect('/gasto/list');
    }
}