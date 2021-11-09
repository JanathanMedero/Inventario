<div>

    {{-- <x-alert></x-alert>

    <x-card>
        <div class="row">
            <div class="col-md-8">
                <h4 class="display-4">Orden de Venta: {{ $order->id }} - {{ $order->Client->name }}</h4>
            </div>
            <div class="col-md-4 d-flex justify-content-end">
                <a type="button" class="btn btn-info text-white" href="{{ route('orderSale.edit', $order->folio) }}">
                    <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                    <span class="btn-inner--text">Editar Orden</span>
                </a>
            </div>
        </div>
    </x-card> --}}

    <x-table>

        <div class="d-flex">
            <div class="col-md-4">
                <h3 class="display-4 mb-4">Inventario</h3>
            </div>
            <div class="col-md-8 d-flex justify-content-end">
                <div>
                    <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#create-product">
                        <span class="btn-inner--icon"><i class="fas fa-box"></i></span>
                        <span class="btn-inner--text">Agregar Producto</span>
                    </button>
                </div>
            </div>
        </div>

        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">SKU</th>
                    <th scope="col" class="sort" data-sort="budget text-center">Departamento</th>
                    <th scope="col" class="sort" data-sort="status">Precio público</th>
                    <th scope="col" class="sort" data-sort="status">Distribuidores</th>
                    <th scope="col" class="sort" data-sort="completion">Existencia (Matríz)</th>
                    <th scope="col" class="sort" data-sort="completion">Existencia (Virrey)</th>
                    <th scope="col" class="sort" data-sort="completion">Existencia General</th>
                    <th scope="col" class="sort" data-sort="completion">Acciones</th>
                </tr>
            </thead>
            <tbody class="list">
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm"></span>
                            </div>
                        </div>
                    </th>
                    <td class="budget"></td>
                    <td class="budget">

                    </td>
                    <td class="budget">

                    </td>
                    <td class="d-flex">
                    </td>
                </tr>
            </tbody>
        </table>
    </x-table>
</div>
@section('extra-js')

{{-- <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

@if(session()->has('delete'))
<script>
    Swal.fire(
      'Eliminado',
      'El producto fue eliminado exitosamente',
      'success'
      )
  </script>
  @endif

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
</script> --}}

@endsection
