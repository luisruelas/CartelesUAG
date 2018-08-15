@push("js")
	<script type="text/javascript">
		var numberof{{$titles}}=0;
		$().ready(function(){
			$("#btadd{{$title}}").click(function(){
				numberof{{$titles}}++;
				inputnombre=jQuery("<input>", {
					name:"nombre_{{strtolower($title)}}_"+numberof{{$titles}},
					type:"text",
					class:"form-control",
					placeholder:"{{$title}}",
					required:"required"
				});
				inputmatricula=jQuery("<input>", {
					name:"matricula_{{strtolower($title)}}_"+numberof{{$titles}},
					type:"text",
					class:"form-control",
					placeholder:"Matricula",
					required:"required"
				});
				btremove=jQuery("<button>",
						{
							id:"btremove{{$title}}_"+numberof{{$titles}},
							class:"btn btn-danger"
						}
					);
				btremove.html("-");

				btremove.click(function(e){
					number=e.target.id.split("_")[1];
					$("#div{{$title}}_"+number).remove();
				});

				divrow=jQuery("<div>",
					{
						id:"div{{$title}}_"+numberof{{$titles}},
						class:"row"
					}
				);
				divcolnombre=jQuery("<div>",
					{
						id:"div{{$title}}_"+numberof{{$titles}},
						class:"col-md-7"
					}
				);
				divcolnombre.append(inputnombre);
				divcolmatricula=jQuery("<div>",
					{
						class:"col-md-3"
					}
				);
				divcolmatricula.append(inputmatricula);
				divcolclose=jQuery("<div>",
					{
						class:"col-md-2"
					}
				);
				divcolclose.append(btremove);

				divrow.append(divcolnombre);
				divrow.append(divcolmatricula);
				divrow.append(divcolclose);
				
				$("#divadded{{$titles}}").append(divrow);
			});
		});
</script>
@endpush
<div class="row">
	<div>
		{{Form::label($titles."_1",$titles)}}	
		<button type="button" class="btn btn-primary" id="btadd{{$title}}">+</button>
	</div>
	<div class="row">
		<div class="col-md-7">
			@if(strtolower($title)!="colaborador")
				{{Form::text("nombre_".strtolower($title)."_0",null,["class"=>"form-control","required"=>"required", "placeholder"=>$title])}}
			@else
				{{Form::text("nombre_".strtolower($title)."_0",null,["class"=>"form-control", "placeholder"=>$title])}}
			@endif

		</div>
		<div class="col-md-3">
			@if(strtolower($title)!="colaborador")
				{{Form::text("matricula_".strtolower($title)."_0",null,["class"=>"form-control","required"=>"required", "placeholder"=>"Matricula"])}}
			@else
				{{Form::text("matricula_".strtolower($title)."_0",null,["class"=>"form-control","placeholder"=>"Matricula"])}}
			@endif
		</div>
	</div>
	<div id="divadded{{$titles}}">
		
	</div>
</div>