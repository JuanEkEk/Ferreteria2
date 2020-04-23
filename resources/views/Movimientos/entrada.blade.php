@extends('layouts.master')
@section('titulo', 'Entradas')
@section('contenido')
@endsection
@push('scripts')
@endpush
<input type="hidden" name="route" value="{{url('/')}}">