@extends('plantilla.layout')
@section('content')

<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Menu</span>
			  </br>
            <h2 class="mb-4">Disfruta nuestras diferentes especialidades.</h2>
          </div>
        </div>
        <div class="row">
        @foreach($productos as $produc)
        	<div class="col-md-3">
        		<div class="">
    					<a href="#" class="img" style="background-image: url(/public/storage/img/producto/{{$produc->imagen}});"></a>
    					<div class="text text-center pt-4">
						<img src="{{asset('storage/img/producto/'.$produc->imagen)}}" id="imagen1" alt="{{$produc->nombre}}" class="img-responsive" width="250px" height="250px">
    						<h3><a href="#">{{$produc->nombre}}</a></h3>
    						<h4> <p>{{$produc->descripcion}}</p></h4>
                            <h5> <p>${{$produc->precio}}</p></h5>
    					</div>
    				</div>
        	</div>
            @endforeach	

             
        </div>
    	</div>
        </section>
		


@endsection