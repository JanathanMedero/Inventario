@extends('layouts.admin')

@section('content')
	<x-alerts></x-alerts>
	@livewire('show-inventory-table')
@endsection