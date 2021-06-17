@extends('layout')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1>Editar el Paciente: {{ $patient->name }}</h1>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-header">
				<a href="{{ url('Pacientes') }}">
					<button class="btn btn-primary">Volver a Pacientes</button>
				</a>
			</div>

			<div class="box-body">
				<form method="POST" action="{{ url('actualizar-paciente/'.$patient->id) }}">
					@csrf
					@method('PUT')
					<h2>Nombre y Apellido</h2>
					<input type="text" class="form-control input-lg" name="name" value="{{ $patient->name }}">

					<h2>Email</h2>
					<input type="text" class="form-control input-lg" name="email" value="{{ $patient->email }}">

					<h2>Documento</h2>
					<input type="text" class="form-control input-lg" name="document" value="{{ $patient->document }}">

					<h2>Nueva Contraseña</h2>
					<input type="text" class="form-control input-lg" name="passwordN" value="">

					<input type="hidden" class="form-control input-lg" name="password" value="{{ $patient->password }}">

					<h2>Télefono</h2>
					<input type="text" class="form-control input-lg" name="phone" value="{{ $patient->phone }}">
					<br><br>
					<button class="btn btn-success">Actualizar</button>
				</form>
			</div>
		</div>
	</section>
</div>
@endsection