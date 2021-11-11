<div>
	<x-card>
		<h1 class="mb-0">Ingrese los datos del producto</h1>
	</x-card>
	<x-card>
		<form action="{{ route('inventory.store') }}" method="POST">
			@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="department">Departamento</label>
						<input type="text" class="form-control" id="department" placeholder="Ingrese el departamento" name="department">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="public_price">Precio público</label>
						<input type="number" min="0" wire:model="public_price" wire:change="changePricePublic($event.target.value)" class="form-control" id="public_price" placeholder="Ingrese el precio al público" name="public_price">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="dealers">Distribuidores</label>
						<input type="number" class="form-control" id="dealers" placeholder="Ingrese el precio a distribuidores" name="dealers">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="description">Descripción del producto</label>
						<textarea class="form-control" id="description" rows="4" style="resize: none;" name="description"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="existence_matriz">Existencias en Matríz</label>
						<input type="number" min="0" class="form-control" id="existence_matriz" placeholder="Ingrese el número de existencias en matríz" name="existence_matriz" wire:model="existence_matriz" wire:change="changeMatriz($event.target.value)"  pattern="^[0-9]+">
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="existence_virrey">Existencias en Virrey</label>
						<input type="number" min="0" class="form-control" id="existence_virrey" placeholder="Ingrese el número de existencias en virrey" name="existence_virrey" wire:model="existence_virrey" wire:change="changeVirrey($event.target.value)">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="pyscom_price">Inversion de Pyscom (Precio * 1.16 + 10)</label>
						<input type="number" class="form-control" id="pyscom_price" name="pyscom_price" value="{{ $pyscom_price }}" wire:model="pyscom_price" wire:change="changePyscomPrice($event.target.value)">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="model">Modelo</label>
						<input type="text" class="form-control" id="model" placeholder="Ingrese el modelo" name="model">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="sat_key">Clave SAT - Opcional</label>
						<input type="text" class="form-control" id="sat_key" placeholder="Ingrese la clave SAT" name="sat_key">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="sat_description">Descripción SAT - Opcional</label>
						<input type="text" class="form-control" id="sat_description" placeholder="Ingrese la descripción del SAT" name="sat_description">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<hr>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="general_existence">Existencias en general</label>
						<input type="number" class="form-control" id="general_existence" name="general_existence" value="{{ $existence_general }}" disabled>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="price_2x1">Precio al 2x1</label>
						<input type="number" class="form-control" id="price_2x1" name="price_2x1" value="{{ $price_2x1 }}" disabled>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="gain_2x1">Ganancia al 2x1</label>
						<input type="number" class="form-control" id="gain_2x1" name="gain_2x1" value="{{ $gain_2x1 }}" disabled>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="normal_gain">Ganancia normal</label>
						<input type="number" class="form-control" id="normal_gain" name="normal_gain" value="{{ $normal_gain }}" disabled>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<button type="submit" class="btn btn-success text-white btn-block">
						<span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
						<span class="btn-inner--text">Agregar Producto</span>
					</button>
				</div>
			</div>
		</form>
	</x-card>
</div>
