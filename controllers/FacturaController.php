<?php

class FacturaController extends Controller{

    public function index(){
        $this->list();
    }
    //mostramos la lista de facturas
    public function list(int $page=1){

        $usuario=Session::get('user');
        //datos para la paginación
        $limit=RESULTS_PER_PAGE;
        $facturasUsuario=Factura::getFiltered('idUsuario',$usuario->id);
        $total= count($facturasUsuario);

        //crea un objeto paginación
        $paginator= new Paginator('factura/list', $page, $limit,$total);

        //cargo los tipos de gastos
        $gastos=Gasto::all();

        $facturas=Factura::orderBy('fecha','ASC',$limit,$paginator->getOffset());
        $this->loadView('/factura/list',[
            'facturas' => $facturas,
            'gastos' =>$gastos,
            'paginator'=> $paginator
        ]);
    }

}