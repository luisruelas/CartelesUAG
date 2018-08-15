@extends("wrapper")
@push("css")
	<style type="text/css">
		.so{
			border-radius: 10px;
			padding: 3%;
			overflow: hidden;
		}
		img{
			width: 50%;
			height: 50%;
			margin: 1% 2% 2% 0%;
			float:left;
		}
		p, img{
			margin-top: 1%;
		}
		#btaddcartel{
			float:right;
		}
		.bold{
			font-weight: bold; 
			display:inline;
		}
		.titulo{
			font-weight: bold;
			padding-left: 10px;
		}
	</style>
@endpush
@push("js")
<script>
	displayedarrays=[];
	function showComentarios(cartelid){ 
		let isdisplayed=false;
		for(let i=0; i<displayedarrays.length; ++i){
			if(displayedarrays[i]==cartelid){
				isdisplayed=true;
			}
		}
		if (isdisplayed){
			$("#divcomentarios_"+cartelid).html("");
			index=displayedarrays.indexOf(cartelid);
			displayedarrays.splice(index,1);
		}else{
			$("#divcomentarios_"+cartelid).load("{{route('loadComentarios')}}"+"?id="+cartelid);
				displayedarrays.push(cartelid);
				$("#divcomentarios_"+cartelid).style.overflow="hidden";
		}
	}


	function showtext(id,bol,text){
		if(bol){
			$("#resumen_"+id).html(text);
			showless=jQuery("<a>",{
			onClick:"showtext("+id+",false,'"+text+"')"
			});
			showless.html(" (ver menos)");
			$("#resumen_"+id).append(showless);
		}else{
			$("#resumen_"+id).html(text.substring(0,150)+"...");
			showmore=jQuery("<a>",{
			onClick:"showtext("+id+",true,'"+text+"')"
			});
			showmore.html("(ver mas)");
			console.log(showmore);
			$("#resumen_"+id).append(showmore);
		}
	}
</script>
@endpush
@section("content")
<div class="container">
	<div class="row">
	<a href={{route('carteles.create')}}><button id="btaddcartel" type="button" class="btn btn-primary"> Añadir Cartel</button></a>
	</div>
	<div class="row" >
		@foreach($carteles as $cartel)
  			<div class="col-md-6 so">
  				<div class="row" style=""><h4 class="titulo">...</h4></div>
	  			<a href="{{route("carteles.download",$cartel->id)}}"><img src="{{asset('imgs/thumbnail.png')}}"/></a>
	  				
					@if($cartel->getPersonasString("autores")!=null)
						<p>
							<span class="bold">
								{{($cartel->getPersonasString("autores")[1]>0?"Autores":"Autor")}}
							</span>
								{{$cartel->getPersonasString("autores")[0]}}
						</p>
					@endif
				
				
					@if($cartel->getPersonasString("colaboradores")!=null)
						<p>
							<span class="bold">
								{{($cartel->getPersonasString("colaboradores")[1]>0?"Colaboradores:":"Colaborador:")}}
							</span>
								{{$cartel->getPersonasString("colaboradores")[0]}}
						</p>
					@endif
						@if($cartel->getPersonasString("supervisores")!=null)
						<p>
							<span class="bold">
								{{($cartel->getPersonasString("colaboradores")[1]>0?"Supervisores:":"Supervisor:")}}
							</span>
								{{$cartel->getPersonasString("supervisores")[0]}}
						</p>
					@endif
						<p style="display:inline;">
							<span class="bold">
								Resumen:
							</span>
						</p>
						<p id="resumen_{{$cartel->id}}">
							@if(strlen($cartel->resumen)<50)
								{{$cartel->resumen}}
							@else
								{{substr($cartel->resumen,0,50)."..."}}<a onClick="showtext({{$cartel->id}},true,'{{$cartel->resumen}}')">(ver más)</a>
							@endif
						</p>
					<div class="row">
						<div class="col-md-12">
							<button onClick="showComentarios({{$cartel->id}})" class="btn">Comentarios {{"(".sizeof($cartel->comentarios->toArray()).")"}}</button>
							<div class="row" id="divcomentarios_{{$cartel->id}}" class="row">
							</div>
						</div>
					</div>	
  			</div>
  		@endforeach
</div>
@endsection