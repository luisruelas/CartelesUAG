@extends("wrapper")
@push("css")
<style type="text/css">
	.t{
		background-color: black;
	}
</style>
@endpush
@push("js")
	@stack("js")
@endpush
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="form-group">
				{{Form::open(["url"=>route('carteles.store'),"files"=>true])}}
					<div class="row">
						{{Form::label("titulo","Título")}}	
						{{Form::text("titulo",null,["class"=>"form-control","required"=>"required"])}}
					</div>
					<div class="row">
						{{Form::label("sucursal_id","Campus")}}
						{{Form::select("sucursal_id",$sucursales,1,["class"=>"form-control"])}}
					</div>

					<div class="row">
						{{Form::label("file","Archivo")}}
						{{Form::file("file",["required"=>"required"])}}
					</div>
					@include("carteles.partials.partial_row_addable",["title"=>"Autor", "titles"=>"Autores"])

					@include("carteles.partials.partial_row_addable",["title"=>"Colaborador", "titles"=>"Colaboradores"])

					@include("carteles.partials.partial_row_addable",["title"=>"Supervisor", "titles"=>"Supervisores"])

					<div class="row">
						{{Form::label("resumen","Resumen")}}	
						{{Form::textarea("resumen",null,["class"=>"form-control", "rows"=>"5", "required"=>"required"])}}
					</div>
					<div class="row"></div>
					<div class="row">
						{{Form::submit("Añadir",["class"=>"btn btn-primary"])}}
						{{Form::close()}}
					</div>
			</div>
		</div>
	</div>
</div>