@extends('layouts.dashboard-sidenav')
@section('title','Customer Page')
@section('content')
    @include('backend.components.customer.customer-list')
    @include('backend.components.customer.customer-create')
    @include('backend.components.customer.customer-update')
    @include('backend.components.customer.customer-delete')
@endsection
