<div>
    <x-table>

        <div class="d-flex">
            <div class="col-md-2">
                <h3 class="display-4 mb-4">Inventario</h3>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" wire:model="search" placeholder="Buscar producto">
            </div>

            <div class="col-md-5" class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-md-5 d-flex justify-content-center">
                        <a href="{{ route('inventory.create') }}">
                            <button type="button" class="btn btn-success text-white">
                                <span class="btn-inner--icon"><i class="fas fa-box"></i></span>
                                <span class="btn-inner--text">Agregar Producto</span>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-7 d-flex justify-content-center">
                        <a href="{{ route('report.excel') }}">
                            <button type="button" class="btn btn-info text-white">
                                <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                <span class="btn-inner--text">Generar reporte de excel</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            
        </div>

        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">SKU</th>
                    <th scope="col" class="sort" data-sort="budget text-center">Descripción</th>
                    <th scope="col" class="sort" data-sort="status">Precio público</th>
                    <th scope="col" class="sort" data-sort="status">Precio a distribuidores</th>
                    <th scope="col" class="sort" data-sort="completion">Existencia (Matríz)</th>
                    <th scope="col" class="sort" data-sort="completion">Existencia (Virrey)</th>
                    <th scope="col" class="sort" data-sort="completion">Existencia General</th>
                    <th scope="col" class="sort" data-sort="completion">Acciones</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($products as $product)
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $product->id }}</span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">{{ Str::limit($product->description, 25) }}</td>
                    <td class="budget">$ {{ $product->public_price }}</td>
                    <td class="budget">{{ $product->dealers }}</td>
                    <td class="budget">{{ $product->existence_matriz }}</td>
                    <td class="budget">{{ $product->existence_virrey }}</td>
                    <td class="budget">{{ Str::limit($product->existence_general, 5) }}</td>
                    <td class="budget d-flex">
                        <div class="mr-4">
                            <a href="{{ route('product.edit', $product->slug) }}">
                                <button type="button" class="btn btn-info">Editar producto</button>
                            </a>
                        </div>
                        <form class="form-delete" action="{{ route('product.destroy', $product->slug) }}" method="POST">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger text-white">
                                <span class="btn-inner--text">Eliminar producto</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('custom-pagination') }}
    </x-table>
</div>
@section('extra-js')

<script src="{{ asset('assets/sweetalert2.all.min.js') }}"></script>

<script>
    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
          title: '¿Estas seguro de eliminar el producto?',
          text: "Esta acción no se puede revertir",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Borrar',
          cancelButtonText: 'Cancelar'
      }).then((result) => {
          if (result.value) {
            this.submit();
        }
    })
  });
</script>

@endsection
