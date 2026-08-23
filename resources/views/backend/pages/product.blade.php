@extends('layouts.dashboard-sidenav')
@section('title','Product Page')
@section('content')
    @include('backend.components.product.product-list')
    @include('backend.components.product.product-create')
    @include('backend.components.product.product-update')
    @include('backend.components.product.product-delete')
@endsection

