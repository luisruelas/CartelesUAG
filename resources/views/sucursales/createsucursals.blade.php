@extends("wrapper")
@push("js")
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
@endpush
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="form-group">
				{{Form::open(["url"=>route('sucursals.store')])}}
					<div class="row">
						{{Form::label("nombre","Nombre")}}	
						{{Form::text("nombre",null,["class"=>"form-control","required"=>"required"])}}
					</div>
				{{Form::submit("Añadir",["class"=>"btn btn-primary"])}}
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>