@extends('layouts.dashboard-sidenav')
@section('title','Low Stock Products')
@section('content')
    @include('backend.components.product.low-stock-product-list')
    @include('backend.components.product.product-create')
    @include('backend.components.product.product-update')
    @include('backend.components.product.product-delete')
@endsection
