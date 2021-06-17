@extends('layout')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1>Gestor de Pacientes</h1>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-header">
				<a href="Crear-Paciente">
					<button class="btn btn-primary btn-sm">Crear</button>
				</a>
			</div>

			<div class="box-body">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre y Apellido</th>
							<th>Email</th>
							<th>Documento</th>
							<th>Telefono</th>
							<th>Editar / Borrar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($patients as $patient)
							<tr>
								<td>{{ $patient->id }}</td>
								<td>{{ $patient->name }}</td>
								<td>{{ $patient->email }}</td>
								<td>{{ $patient->document }}</td>
								@if($patient->phone != "")
									<td>{{ $patient->phone }}</td>
								@else
									<td>No Disponible.</td>
								@endif
								<td>
									<a href="editar-Paciente/{{ $patient->id }}">
										<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
									</a>
									<button class="btn btn-danger EliminarPaciente" Pid="{{ $patient->id }}" Paciente="{{ $patient->name }}">
										<i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
@endsection