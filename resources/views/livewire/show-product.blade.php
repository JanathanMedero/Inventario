<div>
    <x-card>
        <h1 class="mb-0">Datos del producto</h1>
    </x-card>

    <x-alerts></x-alerts>

    <x-card>
        <form action="{{ route('product.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="department">Departamento</label>
                        <input type="text" class="form-control" id="department" placeholder="Ingrese el departamento" name="department" value="{{ $product->department }}" required>
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
                        <label for="dealers">Precio a distribuidor</label>
                        <input type="number" class="form-control" id="dealers" placeholder="Ingrese el precio a distribuidores" name="dealers" wire:model="dealers">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Descripción del producto</label>
                        <textarea class="form-control" id="description" rows="4" style="resize: none;" name="description" wire:model="description"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 form-group">
                    <label for="image-file">Seleccione una imágen para el producto (Opcional)</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image-file" lang="es" name="image">
                        <label class="custom-file-label" for="image-file">Select File</label>
                    </div>
                </div>

                @if ($product->image != null)
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-5"><p><strong>Vista previa de la imágen</strong></p></div>
                        <div class="col-md-6 text-center">
                            <button type="button" class="btn btn-danger btn-sm" wire:click="removeImage">Eliminar imágen</button>
                        </div>
                        <div class="col-md-12 mb-4 d-flex justify-content-center">
                            <img src="{{ asset('imagenes/'.$product->image)}}" style="max-width: 200px; max-height: 200px;">
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12"><p><strong>No se ha cargado una imágen para este producto</strong></p></div>
                        <div class="col-md-12">
                            <img src="{{ asset('storage/images-products/no-image.png') }}" style="max-width: 200px; max-height: 200px;">
                        </div>
                    </div>
                </div>
                @endif

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="existence_matriz">Existencias en Matríz</label>
                        <input type="number" min="0" class="form-control" id="existence_matriz" placeholder="Ingrese el número de existencias en matríz" name="existence_matriz" wire:model="existence_matriz" wire:change="changeMatriz($event.target.value)" pattern="^[0-9]+">
                        @error('existence_matriz') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="existence_virrey">Existencias en Virrey</label>
                        <input type="number" min="0" class="form-control" id="existence_virrey" placeholder="Ingrese el número de existencias en virrey" name="existence_virrey" wire:model="existence_virrey" wire:change="changeVirrey($event.target.value)">
                        @error('existence_virrey') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pyscom_price">Inversion de Pyscom (Precio * 1.16 + 10)</label>
                        <input type="number" step="any" class="form-control" id="pyscom_price" name="pyscom_price" wire:model="pyscom_price" wire:change="changePyscomPrice($event.target.value)">
                        @error('pyscom_price') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Modelo</label>
                        <input type="text" class="form-control" id="model" placeholder="Ingrese el modelo" name="model" wire:model="model">
                        @error('model') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sat_key">Clave SAT - Opcional</label>
                        <input type="text" class="form-control" id="sat_key" placeholder="Ingrese la clave SAT" name="sat_key" wire:model="sat_key">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sat_description">Descripción SAT - Opcional</label>
                        <input type="text" class="form-control" id="sat_description" placeholder="Ingrese la descripción del SAT" name="sat_description" wire:model="sat_description">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="existence_general">Existencias en general</label>
                        <input type="number" class="form-control" id="existence_general" name="existence_general" readonly wire:model="existence_general">
                        @error('existence_general') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="price_2x1">Precio al 2x1</label>
                        <input type="number" class="form-control" id="price_2x1" name="price_2x1" value="" readonly wire:model="price_2x1">
                        @error('price_2x1') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gain_2x1">Ganancia al 2x1</label>
                        <input type="number" class="form-control" id="gain_2x1" name="gain_2x1" value="" readonly wire:model="gain_2x1">
                        @error('gain_2x1') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="normal_gain">Ganancia normal</label>
                        <input type="number" class="form-control" id="normal_gain" name="normal_gain" value="" readonly wire:model="normal_gain">
                        @error('normal_gain') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-info text-white btn-block">
                        <span class="btn-inner--icon"><i class="fas fa-sync-alt"></i></span>
                        <span class="btn-inner--text">Actualizar Producto</span>
                    </button>
                </div>
            </div>
        </form>
    </x-card>
</div>
