@extends('layouts.admin')

@section('content')
	@livewire('show-employees', ['employees' => $employees])
@endsection