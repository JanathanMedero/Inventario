@extends('layouts.admin')

@section('content')
	@livewire('show-product', ['product' => $product])
@endsection