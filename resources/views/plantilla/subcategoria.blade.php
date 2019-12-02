@extends('plantilla.layout')
@section('content')
<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center ">
          <div class="col-md-10 heading-section ftco-animate text-center">
          	<span class="subheading">Proyecto Cafe</span>
			</br>
            <h2 class="mb-4">Nuestro Menu</h2>
          </div>
        </div>
        <div class="row">
        @foreach($subcategorias as $sub)
        	<div class="col-md-3">
        		<div class="">
    					<a href="" class="img" style="background-image: url(public/storage/img/subcategoria/{{$sub->imagen}});"></a>
    					<div class="text text-center pt-4">
						<img src="{{asset('storage/img/subcategoria/'.$sub->imagen)}}" id="imagen1" alt="{{$sub->nombre}}" class="img-responsive" width="280px" height="280px">
    						<h3><a href="{{ route ('pro',$sub->id)}}">{{$sub->nombre}}</a></h3>
    						<p>{{$sub->descripcion}}</p>
    					</div>
    				</div>
        	</div>
            @endforeach	

             
        </div>
    	</div>
        </section>


@endsection
