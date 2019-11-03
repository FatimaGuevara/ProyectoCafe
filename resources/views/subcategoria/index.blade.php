@extends('principal')
@section('contenido')
     <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/">PROYECTOS CAFE</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">

                       <h2>Listado de subcategorias</h2><br/>
                      
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                            <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Subcategoria
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            {!! Form::open(array('url'=>'subcategoria','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                <div class="input-group">
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{ Form::close()}}
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Categoria</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($subcategorias as $subcate)
                                <tr>
                                    
                                    <td>{{$subcate->categoria_id}}</td>
                                    <td>{{$subcate->nombre}}</td>
                                    <td>{{$subcate->descripcion}}</td>
                                    
                                    <td>
                                         <img src="{{asset('storage/img/subcategoria/'.$subcate->imagen)}}" id="imagen1" alt="{{$subcate->nombre}}" class="img-responsive" width="100px" height="100px">
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-md" data-id_subcategoria="{{$subcate->id}}" data-categoria_id="{{$subcate->categoria_id}}" data-nombre="{{$subcate->nombre}}" data-descripcion="{{$subcate->descripcion}}" data-toggle="modal" data-target="#abrirmodalEditar">
                                          <i class="fa fa-edit fa-2x"></i> Editar
                                        </button> &nbsp;
                                        <button type="button" class="btn btn-danger btn-sm" data-id_subcategoria="{{$subcate->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-times fa-2x" ></i>Eliminar
                                        </button> &nbsp;
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        
                        {{$subcategorias->render()}}

                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar-->
            <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar subcategoria</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('subcategoria.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                {{csrf_field()}}
                                @include('subcategoria.form')

                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->

            <!--Inicio del modal actualizar-->
            <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Actualizar subcategoria</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('subcategoria.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                {{method_field('patch')}}
                                {{csrf_field()}}

                                <input type="hidden" id="id_subcategoria" name="id_subcategoria" value="">

                                @include('subcategoria.form')

                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
           
            <!-- Inicio del modal Eliminar -->
            <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Eliminar subcategoria</h4>
                        </div>

                    <div class="modal-body">
                        <form action="{{route('subcategoria.destroy','test')}}" method="POST">
                         {{method_field('delete')}}
                         {{csrf_field()}} 

                            <input type="hidden" id="id_subcategoria" name="id_subcategoria" value="">

                                <p>Estas seguro de Eliminar esta subcategoria?</p>
        

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
                            </div>

                         </form>
                    </div>
                    <!-- /.modal-content -->
                   </div>
                <!-- /.modal-dialog -->
             </div>
            <!-- Fin del modal Eliminar -->


        </main>

@endsection