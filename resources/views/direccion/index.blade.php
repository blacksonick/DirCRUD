@extends('inc.app')
@section('title' ,'| Listado de direcciones')
@section('contenido')
        @include('inc.sidebar')
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header bg-color-2 text-white">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Listado de <b>Direcciones</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('direccion.create')}}" class="btn btn-warning float-right" 
                        data-toggle="tooltip" data-placement="bottom" title="Añadir dirección"><i class="fa fa-plus"></i> <span>Añadir dirección</span></a>        
                        </div>
                    </div>
                </div>
            </div>
            @if( session('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if( session('error') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif  
            <table class="table table-hover table-responsive-md">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Ciudad</th>                    
                        <th>Municipio</th>
                        <th>Estado</th>   
                        <th>Parroquia</th>
                        <th>Nro casa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($direccion as $dir)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $dir->ciudad }}</td>
                        <td>{{ $dir->municipio }}</td>                        
                        <td>{{ $dir->estado }}</td>
                        <td>{{ $dir->parroquia }}</td>
                        <td>{{ $dir->nro_casa }}</td>
                        <td>
                            <div class="dropdown dropleft" data-toggle="tooltip" data-placement="bottom" title="Acciones">
                                <a class="dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-dark fa fa-ellipsis-v fa-md"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLeft">
                                    <a class="btn  btn-info btn-block" href="{{ route('direccion.edit', $dir->id) }}">Editar</a>
                                    <button class="btn  btn-danger btn-block" data-toggle="modal" data-target="#eliminarDir{{ $dir->id }}">Eliminar</button>
                                </div>
                            </div>
                            <!-- MODAL ELIMINAR-->
                            <div class="modal fade" id="eliminarDir{{ $dir->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" >Eliminar <b>dirección</b>!</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fa fa-window-close text-color-8"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Esta seguro en eliminar esta dirección?.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('direccion.destroy', $dir->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection