@extends('layouts.dashboard-sidenav')
@section('title','Invoice Page')
@section('content')
    @include('backend.components.view-invoice.invoice-list')
    @include('backend.components.view-invoice.invoice-update')
    @include('backend.components.view-invoice.invoice-full-edit')
@endsection



