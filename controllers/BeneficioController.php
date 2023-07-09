<?php

class BeneficioController extends Controller{

    public function index(){
        $this->list();
    }
    //mostramos la lista de facturas
    public function list(int $page=1){

        $usuario=Session::get('user');
        //datos para la paginación
        $limit=RESULTS_PER_PAGE;
        $beneficios=Beneficio::getFiltered('idUsuario',$usuario->id);
        $total= count($beneficios);

        //crea un objeto paginación
        $paginator= new Paginator('beneficio/list', $page, $limit,$total);

        //cargo los tipos de gastos
        $gastos=Gasto::all();

        $facturas=Factura::orderBy('fecha','ASC',$limit,$paginator->getOffset());
        $this->loadView('/beneficio/list',[
            'beneficios' => $beneficios,
            'paginator'=> $paginator
        ]);
    }
}