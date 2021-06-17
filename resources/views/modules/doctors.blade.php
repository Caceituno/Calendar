@extends('layout')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1>Gestor de Doctores</h1>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-header">
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDoctor">Crear</button>
			</div>

			<div class="bod-body">
				<table class="table table-bordered table-hover table-striped dt-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Consultorio</th>
							<th>Email</th>
							<th>Documento</th>
							<th>Telefono</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($doctors as $doctor)
							@if($doctor->rol == "doctor")
								<tr>
									<td>{{ $doctor->id }}</td>
									<td>{{ $doctor->name }}</td>
									<td>{{ $doctor->CON->consultorio }}</td>
									<td>{{ $doctor->email }}</td>
									@if($doctor->document != "")
										<td>{{ $doctor->document }}</td>
									@else
										<td>Aún no Registrado.</td>
									@endif
									@if($doctor->phone != "")
										<td>{{ $doctor->phone }}</td>
									@else
										<td>No Disponible.</td>
									@endif
									<td>
										<button class="btn btn-danger EliminarDoctor" Did="{{ $doctor->id }}"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>

<div id="CrearDoctor" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="">
				@csrf
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>Nombre y Apellido:</h2>
							<input type="text" class="form-control input-lg" name="name" required>
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
							<h2>Silla:</h2>
							<select class="form-control input-lg" name="id_clinic" required>
								<option value="">Seleccionar</option>
								@foreach($consultants as $consultant)
								<option value="{{ $consultant->id }}">{{ $consultant->consultorio }}</option>
								@endforeach
							</select>
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
							<h2>Contraseña:</h2>
							<input type="password" class="form-control input-lg" name="password" required>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="button" class="btn btn-danger">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection