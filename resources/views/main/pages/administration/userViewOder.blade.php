@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        <div>{{ $order->created_at }}</div>
        <div>{{ $order->device_id }}</div>
        <div>{{ $order->status_id }}</div>
        <div>{{ $order->comment_for_user }}</div>
    </div>
@endsection
