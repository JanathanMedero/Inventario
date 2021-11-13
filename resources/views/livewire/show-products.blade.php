<div>
    <x-table>
        <div class="d-flex">
            <div class="col-md-4 d-flex align-items-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="display-4 mb-0">Tabla de Clientes</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8 my-4">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" wire:model="search" placeholder="Buscar Cliente">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-12">
                                <a type="button" class="btn btn-success btn-block text-white" href="{{ route('clients.create') }}">
                                    <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
                                    <span class="btn-inner--text">Nuevo cliente</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">Nombre</th>
                    <th scope="col" class="sort" data-sort="budget">Teléfono</th>
                    <th scope="col" class="sort" data-sort="completion">Acciones</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">

                @foreach($clients as $client)
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $client->name }}</span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">
                        {{ $client->phone }}
                    </td>
                    <td class="d-flex">
                        <a type="button" class="btn btn-success text-white" href="{{ route('services.index', $client->slug) }}">
                            <span class="btn-inner--icon"><i class="fas fa-wrench"></i></span>
                            <span class="btn-inner--text">Nuevo Servicio</span>
                        </a>
                        <a type="button" class="btn btn-warning text-white" href="{{ route('ServiceClient.show', $client->slug) }}">
                            <span class="btn-inner--icon"><i class="fas fa-concierge-bell"></i></span>
                            <span class="btn-inner--text">Servicios</span>
                        </a>
                        <a type="button" class="btn btn-info text-white" href="{{ route('clients.edit', $client->slug) }}">
                            <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                            <span class="btn-inner--text">Editar</span>
                        </a>
                        @if(Auth::user()->role_id === 1)
                        <form class="form-delete" action="{{ route('clients.destroy', $client->slug) }}" method="POST">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger text-white">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                <span class="btn-inner--text">Eliminar</span>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $clients->links('custom-pagination') }}
    </x-table>
</div>
