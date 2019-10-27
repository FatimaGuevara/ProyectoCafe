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

                       <h2>Listado de productos</h2><br/>
                      
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                            <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Producto
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            {!! Form::open(array('url'=>'producto','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
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
                                    <th>Precio</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($productos as $prod)
                                <tr>
                                    
                                    <td>{{$prod->subcategoria_id}}</td>
                                    <td>{{$prod->nombre}}</td>
                                    <td>{{$prod->precio}}</td>
                                    <td>{{$prod->descripcion}}</td>
                                    
                                    <td>
                                         <img src="{{asset('storage/img/producto/'.$prod->imagen)}}" id="imagen1" alt="{{$prod->nombre}}" class="img-responsive" width="100px" height="100px">
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-md" data-id_producto="{{$prod->id}}" data-subcategoria_id="{{$prod->subcategoria_id}}" data-nombre="{{$prod->nombre}}" data-precio="{{$prod->precio}}" data-descripcion="{{$prod->descripcion}}" data-toggle="modal" data-target="#abrirmodalEditar">
                                          <i class="fa fa-edit fa-2x"></i> Editar
                                        </button> &nbsp;
                                        <button type="button" class="btn btn-danger btn-sm" data-id_producto="{{$prod->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-times fa-2x" ></i>Eliminar
                                        </button> &nbsp;
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        
                        {{$productos->render()}}

                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar-->
            <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('producto.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                {{csrf_field()}}
                                @include('producto.form')

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
                            <h4 class="modal-title">Actualizar Producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="{{route('producto.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                {{method_field('patch')}}
                                {{csrf_field()}}

                                <input type="hidden" id="id_producto" name="id_producto" value="">

                                @include('producto.form')

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
                            <h4 class="modal-title">Eliminar Producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </button> &nbsp;<button type="button" class="btn btn-danger btn-sm" data-id_producto="{{$prod->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                <i class="glyphicon glyphicon-trash" ></i>
                            </button> &nbsp;
                        </div>

                    <div class="modal-body">
                        <form action="{{route('producto.destroy','test')}}" method="POST">
                         {{method_field('delete')}}
                         {{csrf_field()}} 

                            <input type="hidden" id="id_producto" name="id_producto" value="">

                                <p>Estas seguro de Eliminar este producto?</p>
        

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