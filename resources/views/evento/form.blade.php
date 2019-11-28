@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/">PROYECTOS CAFE</a></li>

    <div class="container">
      <div style="height:50px"></div>
      <h1>Agregar Evento</h1>
      <a class="btn btn-default"  href="{{ asset('/evento/index') }}">Ver Calendario</a>
      <hr>

      @if (count($errors) > 0)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif
       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
       </div>
       @endif


      <div class="col-md-6">
        <form action="{{ asset('/evento/create/') }}" method="post">
          @csrf
          <div class="fomr-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre">
          </div>
          <div class="fomr-group">
            <label>Descripcion del Evento</label>
            <input type="text" class="form-control" name="descripcion">
          </div>
          <div class="fomr-group">
            <label>Fecha</label>
            <input type="date" class="form-control" name="fecha">
          </div>
          <div class="fomr-group">
            <label>Hora inicio</label>
            <input type="time" class="form-control" name="hora_inicio"  min="8:00" maz="21:00" step="1" >
          <small>servicios desde las 8:00 am a 9:00pm</small>
          </div>
          <div class="fomr-group">
            <label>Hora fin</label>
            <input type="time" class="form-control" name="hora_fin" min="8:00" maz="21:00" step="1">
            <small>servicios desde las 8:00 am a 9:00pm</small>
          </div>
          <br>
          <input type="submit" class="btn btn-info" value="Guardar">
        </form>
      </div>


      <!-- inicio de semana -->


    </div> <!-- /container -->
</main>

@endsection