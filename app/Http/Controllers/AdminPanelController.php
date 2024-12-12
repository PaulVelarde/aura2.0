<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    //
        // Método para cargar la vista del panel de administración
        public function index()
        {
           // dd("hola ya accedi");
            return view('admin.admin'); // Asegúrate de que admin.blade.php esté en la carpeta correcta
        }
    
}
