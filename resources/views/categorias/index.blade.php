@extends('principal')
@section('contenido')


    <div class="container">
        <div class="row">
        @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Categorias</div>
                    <div class="card-body">
                        <a href="{{ url('/categorias/create') }}" class="btn btn-success btn-sm" title="Add New categoria">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo
                        </a>

                        <form method="GET" action="{{ url('/categorias') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categorias as $item)
                                    <tr>
                                        <td>{{ $item->id }} </td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>
                                            <a href="{{ url('/categorias/' . $item->id) }}" title="View categoria"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/categorias/' . $item->id . '/edit') }}" title="Edit categoria"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/categorias' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete categoria" onclick="return confirm(&quot;Confirmar&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $categorias->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
