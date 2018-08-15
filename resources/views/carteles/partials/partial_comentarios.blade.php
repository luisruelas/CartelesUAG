 
@foreach($comentarios as $comentario)
<div class="col-md-12" style="padding-left: 25px">
	<div class="row">
		<p style="font-weight: bold">Autor: {{$comentario->nombre}} </p>
	</div>
	<div class="row">
		<h5>{{$comentario->comentario}}</h5>
	</div>
</div>
@endforeach
