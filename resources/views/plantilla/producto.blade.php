@extends('plantilla.layout')

@section('content')

<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Best Coffee Sellers</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
        
        @foreach($productos as $produc)
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url(/public/storage/img/producto/{{$produc->imagen}});"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">{{$produc->nombre}}</a></h3>
    						<p>{{$produc->descripcion}}</p>
                            <p>${{$produc->precio}}</p>
    					</div>
    				</div>
        	</div>
            @endforeach	

             
        </div>
    	</div>
        </section>


@endsection
