@extends('layouts.dashboard-sidenav')
@section('title','Category Page')
@section('content')
    @include('backend.components.category.category-list')
    @include('backend.components.category.category-create')
    @include('backend.components.category.category-update')
    @include('backend.components.category.category-delete')
@endsection
