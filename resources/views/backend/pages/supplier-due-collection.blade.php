@extends('layouts.dashboard-sidenav')
@section('title','Supplier Page')
@section('content')
    @include('backend.components.supplier.supplier-due-collection.supplier-due-collection-list')
    @include('backend.components.supplier.supplier-due-collection.supplier-due')

@endsection
