@extends('layouts.dashboard-sidenav')
@section('title','Expence Type Page')
@section('content')
    @include('backend.components.expense.expense-list.expense-list')
    @include('backend.components.expense.expense-list.expense-create')
    @include('backend.components.expense.expense-list.expense-update')
    @include('backend.components.expense.expense-list.expense-delete')
@endsection
