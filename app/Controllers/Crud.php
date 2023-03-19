<?php

namespace App\Controllers;

use App\Models\HistoriaMedicaModel;

class Crud extends BaseController
{
    public function index()
    {
        $HistoriaMedica = new HistoriaMedicaModel;
        $datos = $HistoriaMedica->listarHistorias();

        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];

        return view('historias_medicas', $data);
    }

    public function crear(){
        $datos = [
            "nombre" => $_POST['nombre'],
            "fecha_nacimiento" => $_POST['FechaNacimiento'],
            "sexo" => $_POST['sexo'],
            "estatura" => $_POST['estatura'],
            "peso" => $_POST['peso']
        ];
        
        $HistoriaMedica = new HistoriaMedicaModel;
        $respuesta = $HistoriaMedica->insertar($datos);

        if($respuesta >0){
            return redirect()->to(base_url().'/')->with('mensaje','1');
        }else{
            return redirect()->to(base_url().'/')->with('mensaje','0');
        }
    }

    public function actualizar(){
        $datos = [
            "id" => $_POST['id'],
            "nombre" => $_POST['nombre'],
            "fecha_nacimiento" => $_POST['FechaNacimiento'],
            "sexo" => $_POST['sexo'],
            "estatura" => $_POST['estatura'],
            "peso" => $_POST['peso']
        ];
        $id = $_POST['id'];
        $HistoriaMedica = new HistoriaMedicaModel;
        $respuesta = $HistoriaMedica->actualizar($datos, $id);

        if($respuesta){
            return redirect()->to(base_url().'/')->with('mensaje','2');
        }else{
            return redirect()->to(base_url().'/')->with('mensaje','3');
        }
    }

    public function obtenerHistoria($id){
        $data = ["id" => $id];
        $HistoriaMedica = new HistoriaMedicaModel;
        $respuesta = $HistoriaMedica->obtenerHistoria($data);
        $datos = ["datos" => $respuesta];
        return view('historias_medicas_actualizar', $datos);
    }

    public function obtenerHistoria2($id){
        $data = ["id" => $id];
        $HistoriaMedica = new HistoriaMedicaModel;
        $respuesta = $HistoriaMedica->obtenerHistoria($data);
        $datos = ["datos" => $respuesta];
        return json_encode($datos);
    }
    public function eliminar($id){
        
        $HistoriaMedica = new HistoriaMedicaModel;

        $datos = [
            "id" => $id
        ];

        $respuesta = $HistoriaMedica->eliminar($datos);
        print_r($respuesta);
        if($respuesta){
            return redirect()->to(base_url().'/')->with('mensaje','4');
        }else{
            return redirect()->to(base_url().'/')->with('mensaje','5');
        }
    }
    
}
