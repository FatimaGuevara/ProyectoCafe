@extends('principal')

@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">PROYECTOS CAFE</a></li>
    </ol>
    <div class="container-fluid" >
        <br><br><br>
        @if(Auth::check())
            @if (Auth::user()->rol_id == 1)
        <h1 align=center>Bienvenido</h1>
        <h2 align=center>al area de</h2>
        <h2 align=center>Administracion</h2>
        @elseif (Auth::user()->rol_id == 2)
        <h2 align=center>Esta seccion es para el administrador por favor cierre sesion</h2>
        @endif
        @endif

    </div>
</main>
@endsection