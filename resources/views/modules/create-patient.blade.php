@extends('layout')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1>Crear Paciente</h1>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-body">
				<form method="POST" action="">
					@csrf
					<div class="form-group">
						<h2>Nombre y Apellido:</h2>
						<input type="text" name="name" class="form-control input-lg">
					</div>

					<div class="form-group">
						<h2>Documento:</h2>
						<input type="text" name="document" class="form-control input-lg">
					</div>

					<div class="form-group">
						<h2>Email:</h2>
						<input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required>
						@error('email')
							<div class="alert alert-danger">
								email ya existe
							</div>
						@enderror
					</div>

					<div class="form-group">
						<h2>Sexo:</h2>
						<select class="form-control input-lg" name="sex" required>
							<option value="">Seleccionar</option>
							<option value="Femenino">Femenino</option>
							<option value="Masculino">Masculino</option>
						</select>
					</div>

					<div class="form-group">
						<h2>Contraseña:</h2>
						<input type="password" class="form-control input-lg" name="password" required>
					</div>
					<br>
					<button type="submit" class="btn btn-primary btn-sm">Agregar</button>
				</form>
			</div>
		</div>
	</section>
</div>
@endsection