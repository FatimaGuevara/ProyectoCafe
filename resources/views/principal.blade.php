<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel y Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <title>Proyecto</title>
    <!-- Icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--PONER LOGO-->
        <!--<a class="navbar-brand" href="#"></a>-->
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Proyecto Cafe</a>
            </li>

        </ul>
        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">usuario </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="" method="POST" style="display: none;">

                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">

        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Proyecto Cafe</a>
                    </li>
                    <li class="nav-title">
                        Menú
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{url('categorias')}}" onclick="event.preventDefault(); document.getElementById('categorias-form').submit();"><i class="fa fa-list"></i> Categoria</a>

                        <form id="categorias-form" action="{{url('categorias')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('subcategoria')}}" onclick="event.preventDefault(); document.getElementById('subcategoria-form').submit();"><i class="fa fa-list"></i> SubCategoria</a>

                        <form id="subcategoria-form" action="{{url('subcategoria')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('producto')}}" onclick="event.preventDefault(); document.getElementById('producto-form').submit();"><i class="fa fa-list"></i> Productos</a>

                        <form id="producto-form" action="{{url('producto')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('evento/index')}}" onclick="event.preventDefault(); document.getElementById('evento-form').submit();"><i class="fa fa-users"></i>Eventos</a>

                        <form id="evento-form" action="{{url('evento/index')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('usuario')}}" onclick="event.preventDefault(); document.getElementById('usuario-form').submit();"><i class="fa fa-users"></i> Usuarios</a>

                        <form id="usuario-form" action="{{url('usuario')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin" onclick="event.preventDefault(); document.getElementById('/admin').submit();"><i class="fa fa-users"></i> Principal</a>

                        <form id="/admin" action="/admin" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>

                    <!--li class="nav-item">
                        <a class="nav-link" href="{{url('login')}}" onclick="event.preventDefault(); document.getElementById('login-form').submit();"><i class="fa fa-users"></i> Login</a>

                        <form id="usuario-form" action="{{url('login')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li-->

                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

        <!-- Contenido Principal -->
        @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>

 

    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/template.js')}}"></script>

    <script>
        /*EDITAR SUBCATEGORIA EN VENTANA MODAL*/
        $('#abrirmodalEditarsub').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget)
            var categoria_id_modal_editar = button.data('categoria_id')
            var nombre_modal_editar = button.data('nombre')
            var descripcion_modal_editar = button.data('descripcion')
            var id_subcategoria = button.data('id_subcategoria')
            var modal = $(this)

            modal.find('.modal-body #id').val(categoria_id_modal_editar);
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
            modal.find('.modal-body #id_subcategoria').val(id_subcategoria);
        })


        /******************************************************/
        /*INICIO ventana modal para cambiar estado de Subcategoria*/

        $('#cambiarEstado').on('show.bs.modal', function(event) {


            var button = $(event.relatedTarget)
            var id_subcategoria = button.data('id_subcategoria')
            var modal = $(this)

            modal.find('.modal-body #id_subcategoria').val(id_subcategoria);
        })

        /*FIN ventana modal para cambiar estado de la subcategoria*/

        /*EDITAR PRODUCTO EN VENTANA MODAL*/
        $('#abrirmodalEditarpro').on('show.bs.modal', function(event) {

            //console.log('modal abierto');
            /*el button.data es lo que está en el button de editar*/
            var button = $(event.relatedTarget)
            /*este id_categoria_modal_editar selecciona la subcategoria*/
            var subcategoria_id_modal_editar = button.data('subcategoria_id')
            var nombre_modal_editar = button.data('nombre')
            var precio_modal_editar = button.data('precio')
            var descripcion_modal_editar = button.data('descripcion')
            //var imagen_modal_editar = button.data('imagen1')
            var id_producto = button.data('id_producto')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            /*los # son los id que se encuentran en el formulario*/
            modal.find('.modal-body #id').val(subcategoria_id_modal_editar);
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #precio').val(precio_modal_editar);
            modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
            // modal.find('.modal-body #subirImagen').html("<img src="img/producto/imagen_modal_editar">");
            modal.find('.modal-body #id_producto').val(id_producto);
        })

        /*INICIO ventana modal para cambiar el estado del producto*/

        $('#cambiarEstado').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget)
            var id_producto = button.data('id_producto')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)

            modal.find('.modal-body #id_producto').val(id_producto);
        })

        /*FIN ventana modal para cambiar estado del producto*/

        /*EDITAR USUARIO EN VENTANA MODAL*/
        $('#abrirmodalEditarusu').on('show.bs.modal', function(event) {

            //console.log('modal abierto');
            /*el button.data es lo que está en el button de editar*/
            var button = $(event.relatedTarget)
            var nombre_modal_editar = button.data('nombre')
            var email_modal_editar = button.data('email')
            /*este rol_id_modal_editar selecciona el rol*/
            var rol_id_modal_editar = button.data('rol_id')
            var id_usuario = button.data('id_usuario')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            /*los # son los id que se encuentran en el formulario*/
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #email').val(email_modal_editar);
            modal.find('.modal-body #id').val(rol_id_modal_editar);
            // modal.find('.modal-body #subirImagen').html("<img src="img/producto/imagen_modal_editar">");
            modal.find('.modal-body #id_usuario').val(id_usuario);
        })

        /*INICIO ventana modal para cambiar el estado del usuario*/

        $('#cambiarEstado').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget)
            var id_usuario = button.data('id_usuario')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)

            modal.find('.modal-body #id_usuario').val(id_usuario);
        })

        /*FIN ventana modal para cambiar estado del usuario*/

        /*EDITAR CATEGORIA EN VENTANA MODAL*/
        $('#abrirmodalEditarcat').on('show.bs.modal', function(event) {

            //console.log('modal abierto');
            /*el button.data es lo que está en el button de editar*/
            var button = $(event.relatedTarget)
            var nombre_modal_editar = button.data('nombre')
            var id_categorias = button.data('id_categorias')
            var modal = $(this)
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #id_categorias').val(id_categorias);
        })

        /*INICIO ventana modal para cambiar el estado de la categoria*/

        $('#cambiarEstado').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget)
            var id_categorias = button.data('id_categorias')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)

            modal.find('.modal-body #id_categorias').val(id_categorias);
        })

        /*FIN ventana modal para cambiar estado de la categoria*/
    </script>

</body>

</html>