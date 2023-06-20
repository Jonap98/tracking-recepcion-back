@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-contnet-center">
            <div class="col-md-12">
                <H5>BOMS</H5>
                <hr>
                @if(session('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="d-flex justify-content-end">

                    <button class="btn btn-primary">Registrar paquete</button>

                </div>

                <hr>

                <div class="container">

                        <div class="row g-2">

                            <div class="card col-md-12 p-2">
                                <table id="boms" class="table table-striped m-2">
                                    <thead class="head">
                                        <tr>
                                            <th scope="col">Número de guía</th>
                                            <th scope="col">Paquetería</th>
                                            <th scope="col">Quién captura</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Área</th>
                                            <th scope="col">Extensión</th>
                                            <th scope="col">Empleado recibe</th>
                                            <th scope="col">Fecha entregado</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paquetes as $paquete)
                                            <tr>
                                                <td>{{ $paquete->numero_de_guia }}</td>
                                                <td>{{ $paquete->paqueteria }}</td>
                                                <td>{{ $paquete->quien_captura }}</td>
                                                <td>{{ $paquete->usuario }}</td>
                                                <td>{{ $paquete->correo }}</td>
                                                <td>{{ $paquete->area }}</td>
                                                <td>{{ $paquete->extension }}</td>
                                                <td>{{ $paquete->empleado_recibe }}</td>
                                                <td>{{ $paquete->fecha_entregado }}</td>
                                                <td>{{ $paquete->status }}</td>
                                                <td><button class="btn btn-primary">Editar</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    {{-- @include('boms.modal') --}}
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#boms').DataTable({
                    columnDefs: [
                        { orderable: false }
                    ]
                });
            });
        </script>

    @endsection
@endsection
