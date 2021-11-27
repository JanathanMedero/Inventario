@extends('layouts.admin')

@section('content')
	<x-card>
		<div class="row">
			<div class="col-md-12">
				<h2>Exportar productos</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 mt-4">
				<form method="POST" enctype="multipart/form-data" action="{{ route('excel.import') }}">
					@csrf
					<input type="file" name="file">
					<button class="btn btn-success">Exportar</button>
				</form>
				<h2>Bienvenido al sistema de inventario de Pyscom</h2>
			</div>
		</div>

	</x-card>
@endsection