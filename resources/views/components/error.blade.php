@if ($errors->any())
<div class="container">
    <div class="row">
        <div class="col-md-12 alert alert-danger my-4" role="alert">
            <span class="alert-icon"><i class="fas fa-times"></i></span>
            <span class="alert-text"><strong>Revise los campos obligatorios</strong></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif