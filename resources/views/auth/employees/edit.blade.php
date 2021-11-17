@extends('layouts.admin')

@section('content')

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h2>Datos del empleado: <strong>{{ $employe->name }}</strong></h2>
		</div>
	</div>
</x-card>

<x-alerts></x-alerts>

<x-card>
	<form action="{{ route('employe.update', $employe->slug) }}" method="POST">
		@method('PUT')
		@csrf
		<div class="row">
			<div class="form-group col-md-4">
				<label for="name">Nombre</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre" value="{{ $employe->name }}">
			</div>
			<div class="form-group col-md-4">
				<label for="email">Correo electrónico</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="Ingrese el correo electrónico" value="{{ $employe->email }}">
			</div>
			<div class="form-group col-md-4">
				<label for="password">Contraseña (Opcional)</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="Ingrese la nueva contraseña">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<div class="form-group">
					<label for="roles">Seleccione el rol del empleado</label>
					<select class="form-control" id="roles" name="role_id">
						@foreach($roles as $role)
						<option value="{{ $role->id }}" {{ ( $role->id == $employe->role_id) ? 'selected' : '' }} id="role-{{ $role->id }}">{{ $role->role }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<button type="submit" class="btn btn-success btn-block">Actualizar empleado</button>
			</div>
		</div>
	</form>
</x-card>

@endsection