@extends('layout.dashboard-sidenav')
@section('title','Low Stock Products')
@section('content')
    @include('components.back-end.Product.low-stock-product-list')
    @include('components.back-end.Product.product-create')
    @include('components.back-end.Product.product-update')
    @include('components.back-end.Product.product-delete')
@endsection
