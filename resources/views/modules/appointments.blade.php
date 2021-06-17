@extends('layout')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h2>Horarios</h2>

		@if($shedules == null)
			<form method="POST" action="{{ url('Horario') }}">
				@csrf

				<div class="row">
					<div class="col-md-2">
						Desde <input type="time" class="form-control" name="horaInicio">
					</div>
					<div class="col-md-2">
						Hasta <input type="time" class="form-control" name="horaFin">
					</div>
					<br>
					<div class="col-md-1">
						<button type="submit" class="btn btn-success">Guardar</button>
					</div>
				</div>
			</form>
		@else
			@foreach($shedules as $shedule)
			<form method="POST" action="{{ url('editar-horario/'.$shedule->id) }}">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-2">
						Desde <input type="time" class="form-control" name="horaInicioE" value="{{ $shedule->horaInicio }}">
					</div>
					<div class="col-md-2">
						Hasta <input type="time" class="form-control" name="horaFinE" value="{{ $shedule->horaFin }}">
					</div>
					<br>
					<div class="col-md-1">
						<button type="submit" class="btn btn-success">Editar</button>
					</div>
				</div>
			</form>
			@endforeach
		@endif
	</section>

	<section class="content">
		<div class="box">
			<div class="box-body">
				<div id="calendario">

				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="CitaModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="">
				@csrf
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h2>Seleccionar Paciente</h2>
							<input type="hidden" name="id_doctor" value="{{ auth()->user()->id }}">
							<select name="id_patient" required="" id="select2" style="width:100%">
								<option value="">Paciente...</option>
								@foreach($patients as $patient)
									@if($patient->rol == "paciente")
										<option value="{{ $patient->id }}">{{ $patient->name }} - {{ $patient->document }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<h2>Fecha</h2>
							<input type="text" class="form-control input-lg" id="Fecha" readonly>
						</div>
						<div class="form-group">
							<h2>Hora</h2>
							<input type="text" class="form-control input-lg" id="Hora" readonly>

							<input type="hidden" name="FyHinicio" class="form-control input-lg" id="FyHinicio" readonly>
							<input type="hidden" name="FyHfinal" class="form-control input-lg" id="FyHfinal" readonly>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Pedir Cita</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="EventoModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ url('borrar-cita') }}">
				@csrf
				@method('delete')
				<div class="modal-body">
					<div class="form-group">
						<h2>Paciente:</h2>
						<h4 id="patient"></h4>

						<input type="hidden" name="idCita" id="idCita">
						<?php
							$exp = explode("/", $_SERVER["REQUEST_URI"]);

							echo '<input type="hidden" name="idDoctor" value="'.$exp[4].'">';
						?>

					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-warning">Cancelar Cita</button>
					<button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection