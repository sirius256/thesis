@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        summaryOrder.blade.php
        <div>{{ $deviceModel->id }}</div>
        <div>{{ $deviceModel->name }}</div>
        <div>{{ $deviceModel->description }}</div>
    </div>
@endsection
