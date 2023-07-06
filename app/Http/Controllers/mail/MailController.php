<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\PaqueteRecibido;

class MailController extends Controller
{
    public function index() {
        return view('paqueteria.nuevo-paquete');
    }

    public function store() {
        Mail::to('jona.pelo1998@gmail.com')
            ->send(new PaqueteRecibido());

        return back()->with('success', '¡Usuario notificado exitosamente!');


    }
}
