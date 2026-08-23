@extends('layouts.dashboard-sidenav')
@section('title','Expence Type Page')
@section('content')
    @include('backend.components.expense.expense-type.expense-type-list')
    @include('backend.components.expense.expense-type.expense-type-create')
    @include('backend.components.expense.expense-type.expense-type-update')
    @include('backend.components.expense.expense-type.expense-type-delete')
@endsection
