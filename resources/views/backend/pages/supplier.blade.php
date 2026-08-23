@extends('layouts.dashboard-sidenav')
@section('title','Supplier Page')
@section('content')
    @include('backend.components.supplier.supplier-list')
    @include('backend.components.supplier.supplier-create')
    @include('backend.components.supplier.supplier-update')
    @include('backend.components.supplier.supplier-delete')
@endsection
