<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
// use App\Producto;
use App\Tipo;
use App\Detalle_Venta;
use DB;

// use Codedge\Fpdf\Fpdf\Fpdf;

class ApiVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Venta::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

                                //$request es una variable que se puede cambiar
    public function store(Request $request)
    {
        // return 'HOLA';
        $venta = new Venta;
        $venta->codigo = $request->get('codigo');
        $venta->nombre = $request->get('nombre');
        $venta->cantidad = $request->get('cantidad');
        $venta->precio = $request->get('precio');
        $venta->total = $request->get('total');
        $venta->folio = $request->get('folio');
        $venta->fecha_salida = $request->get('fecha_salida');

        
        $detalles = $request->get('detalles');
        

        //ARRAY PARA CONSTRUIR LOS DATOS DEL DETALLE
        $records=[];
        

        for ($i=0; $i < count($detalles); $i++) { 
            $records[]=[
                'folio'=>$request->get('folio'),
                'nombre'=>$detalles[$i]['nombre'],
                'cantidad'=>$detalles[$i]['cantidad'],
                'precio'=>$detalles[$i]['precio'],
                'total'=>$detalles[$i]['total'],
                'fecha_salida'=>$detalles[$i]['fecha_salida'],
            ];

            //Ingresar los valores a usar a través de varibles, para hacer la consulta más simple

            $cant = $detalles[$i]['cantidad'];
            $codigo = $detalles[$i]['id_tipo'];

            //ACTUALIZAMOS LA CANTIDAD DEL PRODUCTO QUE SE ESTA VENDIENDO

            DB::update("UPDATE tipos 
                SET cantidad = cantidad - $cant
                WHERE id_tipo = '$codigo'");
        }

        //Debe existir la venta para que luego vaya el detalle
        $venta->save();
        Detalle_Venta::insert($records);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Venta::find($id);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function imprimir(){
        // Obtener listado de productos
    //     $productos = Producto::all();
        



    //     // Instanciando un objeto con las dimensiones

    //     $pdf = new Fpdf ('P','mm','A4');

    //     // Agregamos una página
    //     $pdf->Addpage();

    //     // Definimos un tipo de letra, Estilo, Tamaño
    //     $pdf->SetFont('Arial','B',12);

    //     // Definimos parámetros de celda
    //             //Cell(Ancho px,alto,Borde,Salto de línea,Alineación,X) --- utf8_decode --- sirve para respetar acentos('Texto o mensaje'),)
    //     $pdf->Cell(190,8,utf8_decode('LISTADO DE PRODUCTOS'),0,1,'C');
    //     // Salto de línea
    //     $pdf->Ln(10);

    //     $pdf->SetFont('Arial','B',10);

    //     // Definir los campos
    //     $pdf->Cell(50,8,utf8_decode('CÓDIGO'),1,0,'C');
    //     $pdf->Cell(100,8,utf8_decode('NOMBRE'),1,0,'C');
    //     $pdf->Cell(40,8,utf8_decode('PRECIO'),1,1,'C');
    //                                     // Salto de línea

    //     // Campos a llenar (Valores)  y Ciclo Foreach
    //     $pdf->SetFont('Arial','',12);
    //         foreach ($productos as $producto) {
    //         # code...
    //         $pdf->Cell(50,8,utf8_decode($producto->sku),1,0,'L');
    //         $pdf->Cell(100,8,utf8_decode($producto->nombre),1,0,'L');
    //         $pdf->Cell(40,8,utf8_decode('$ '.$producto->precio),1,1,'C');
    //                                 //Para poner valores String antes de la variable y concatenar se usan las comillas simples más el punto (.).
    //     }

    //     // for ($i = 0; $i < 10 ; $i ++) { 
    //         # code...
    //         // $pdf->Cell(50,8,utf8_decode(''),1,0,'C');
    //         // $pdf->Cell(100,8,utf8_decode(''),1,0,'C');
    //         // $pdf->Cell(40,8,utf8_decode(''),1,1,'C');
    //     // }

    //     //'Enviar a impresión'
    //     //Por defecto el nombre del archivo es doc.pdf 
    //     $pdf->Output();
    //     exit;
    // }

    // public function imprimiractividad(){
    //     // Instanciando un objeto con las dimensiones
    //     $pdf = new Fpdf ('P','mm','A4');

    //     // Agregamos una página
    //     $pdf->Addpage();

    //     // Definimos un tipo de letra, Estilo, Tamaño
    //     $pdf->SetFont('Arial','B',23);
    //     $pdf->SetTextColor(0,0,255);
    //     $pdf->Cell(5,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(20,8,utf8_decode(''),0,'C');
    //     $pdf->Image('../public/Imagen1.png',22,10,24);
    //     $pdf->Cell(100,8,utf8_decode('PINTURAS COTIJA'),0,0,'C');
    //     $pdf->Cell(20,8,utf8_decode(''),'',0,'C');
    //     $pdf->SetTextColor(0,0,0);
    //     $pdf->SetFont('Arial','B',12);
    //     $pdf->Cell(45,8,utf8_decode('NOTA DE VENTA'),1,1,'C');
    //     $pdf->SetFont('Arial','B',13);
    //     $pdf->Cell(5,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(20,8,utf8_decode(''),0,'C');
    //     $pdf->Cell(100,8,utf8_decode('DISTRIBUIDOR AUTORIZADO'),0,0,'C');
    //     $pdf->Cell(20,8,utf8_decode(''),'',0,'C');
    //     $pdf->SetFont('Arial','B',14);
    //     $pdf->SetTextColor(255,0,0);
    //     $pdf->Cell(45,8,utf8_decode('N° 7751'),1,1,'C');
    //     $pdf->SetTextColor(0,0,0);
    //     $pdf->SetFont('Arial','B',10);
    //     $pdf->Cell(5,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(20,8,utf8_decode(''),0,'C');
    //     $pdf->Cell(100,8,utf8_decode('TONAL | NIVA | CASTHER | LAIT'),0,0,'C');
    //     $pdf->Cell(20,8,utf8_decode(''),'',0,'C');
    //     $pdf->SetFont('Arial','',10);
    //     $pdf->Cell(15,8,utf8_decode('DÍA'),'L,R',0,'C');
    //     $pdf->Cell(15,8,utf8_decode('MES'),'L,R',0,'C');
    //     $pdf->Cell(15,8,utf8_decode('AÑO'),'L,R',1,'C');
    //     $pdf->SetFont('Arial','B',14);
    //     $pdf->Cell(5,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(20,8,utf8_decode(''),0,'C');
    //     $pdf->Cell(100,8,utf8_decode('Francisco Javier Barragán Oseguera'),0,0,'C');
    //     $pdf->Cell(20,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(15,8,utf8_decode(''),'L,R,B',0,'C');
    //     $pdf->Cell(15,8,utf8_decode(''),'L,R,B',0,'C');
    //     $pdf->Cell(15,8,utf8_decode(''),'L,R,B',1,'C');
    //     $pdf->SetFont('Arial','',12);
    //     $pdf->Cell(150,8,utf8_decode('R.F.C. BAOF660119-GKA CURP BAOF660119HMNRSR05'),0,1,'C');
    //     $pdf->Cell(148,8,utf8_decode('ALLENDE No. 20 COL.CENTRO, COTIJA MICHOACÁN, C.P. 59940'),0,1,'C');
        

    //     $pdf->SetFont('Arial','B',12);

    //     $pdf->Cell(25,8,utf8_decode('NOMBRE:'),'L,T',0,'L');
    //     $pdf->Cell(160,8,utf8_decode(''),'B,T',0,'C');
    //     $pdf->Cell(5,8,utf8_decode(''),'R,T',1,'C');

    //     $pdf->Cell(30,8,utf8_decode('DIRECCIÓN:'),'L',0,'L');
    //     $pdf->Cell(155,8,utf8_decode(''),'B',0,'C');
    //     $pdf->Cell(5,8,utf8_decode(''),'R',1,'C');

    //     $pdf->Cell(25,8,utf8_decode('CIUDAD:'),'L,B',0,'L');
    //     $pdf->Cell(105,8,utf8_decode(''),'B',0,'C');
    //     $pdf->Cell(25,8,utf8_decode('RFC:'),'B',0,'C');
    //     $pdf->Cell(35,8,utf8_decode(''),'R,B',1,'C');
    //     $pdf->Ln(4);
    //     $pdf->SetFillColor(130,130,130);
    //     $pdf->SetTextColor(255,255,255);
    //     $pdf->Cell(20,8,utf8_decode('CANT.'),1,0,'C',True);
    //     $pdf->Cell(110,8,utf8_decode('CONCEPTO'),1,0,'C',True);
    //     $pdf->Cell(30,8,utf8_decode('P. UNITARIO'),1,0,'C',True);
    //     $pdf->Cell(30,8,utf8_decode('IMPORTE'),1,1,'C',True);
    //     $pdf->SetTextColor(0,0,0);
    //     for ($i = 0; $i < 10 ; $i ++) { 
    //         # code...
    //     $pdf->Cell(20,8,utf8_decode(''),1,0,'C');
    //     $pdf->Cell(110,8,utf8_decode(''),1,0,'C');
    //     $pdf->Cell(30,8,utf8_decode(''),1,0,'C');
    //     $pdf->Cell(30,8,utf8_decode(''),1,1,'C');
    //     }

    //     $pdf->SetFont('Arial','B',11);
    //     $pdf->Cell(190,8,utf8_decode('CANTIDAD CON LETRA'),1,1,'L');

    //     $pdf->SetFont('Arial','B',24);
    //     $pdf->Cell(130,8,utf8_decode('¡Gracias por su Preferencia!'),0,0,'C');
    //     $pdf->SetFont('Arial','B',15);
    //     $pdf->SetFillColor(130,130,130);
    //     $pdf->SetTextColor(255,255,255);
    //     $pdf->Cell(30,8,utf8_decode('Total $'),1,0,'C',True);
    //     $pdf->Cell(30,8,utf8_decode(''),1,1,'L');
    //     $pdf->Ln(4);
    //     $pdf->SetTextColor(0,0,0);
    //     $pdf->SetFont('Arial','',12);
    //     $pdf->SetFillColor(130,130,130);
    //     $pdf->Cell(95,8,utf8_decode(''),'T,L,R',0,'C',True);
    //     $pdf->Cell(10,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(85,8,utf8_decode('LA REPRODUCCIÓN NO AUTORIZADA DE'),0,1,'C');
    //     $pdf->Cell(95,8,utf8_decode(''),'L,R',0,'C',True);
    //     $pdf->Cell(10,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(85,8,utf8_decode('ESTE DOCUMENTO CONSTITUYE UN'),0,1,'C');
    //     $pdf->Cell(95,8,utf8_decode(''),'L,R',0,'C',True);
    //     $pdf->Cell(10,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(85,8,utf8_decode('DELITO EN LOS TÉRMINOS DE LAS'),0,1,'C');
    //     $pdf->Cell(95,8,utf8_decode(''),'L,R',0,'C',True);
    //     $pdf->Cell(10,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(85,8,utf8_decode('DISPOSICIONES FISCALES'),0,1,'C');
    //     $pdf->Cell(95,8,utf8_decode(''),'L,R,B',0,'C',True);
    //     $pdf->Cell(10,8,utf8_decode(''),'',0,'C');
    //     $pdf->Cell(85,8,utf8_decode('EXPEDIDA EN COTIJA DE LA PAZ, MICH.'),0,0,'C');  
    //     $pdf->Output();
    //     exit;
    }
}
