@extends('layouts.dashboard-sidenav')
@section('title','Customer Page')
@section('content')
    @include('backend.components.customer.customer-due.customer-due-list')
    @include('backend.components.customer.customer-due.customer-due-collection')
@endsection
