@extends('layout')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1>Gestor de Sillas</h1>
	</section>

	<section class="content">
		<div class="box">
			<br>
			<form method="POST" action="">
				@csrf
				<div class="col-md-6 col-xs-12">
					<input type="text" class="form-control" name="consultorio" placeholder="Ingrese Nueva Silla" required>
				</div>
				<button class="btn btn-primary" type="submit">Guardar</button>
			</form>
			<br>
			<div class="box-body">

				@foreach($consultants as $consultant)
				<div class="row">
					<form method="POST" action="{{ url('Consultorio/'.$consultant->id) }}">
						@csrf
						@method('put')
						<div class="col-md-4">
							<input type="text" class="form-control" name="consultorioE" value="{{ $consultant->consultorio }}">
						</div>
						<div class="col-md-1">
							<button class="btn btn-success" type="submit">Guardar</button>
						</div>
					</form>
					<div class="col-md-1">
						<form method="POST" action="{{ url('borrar-Consultorio/'.$consultant->id) }}">
							@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger">Borrar</button>
						</form>
					</div>
				</div>
				<br>
				@endforeach

			</div>
		</div>
	</section>
</div>
@endsection