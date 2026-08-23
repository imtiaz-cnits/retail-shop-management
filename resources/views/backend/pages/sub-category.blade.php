@extends('layouts.dashboard-sidenav')
@section('title','Sub Category Page')
@section('content')
    @include('backend.components.sub-category.sub-category-list')
    @include('backend.components.sub-category.sub-category-create')
    @include('backend.components.sub-category.sub-category-update')
    @include('backend.components.sub-category.sub-category-delete')
@endsection
