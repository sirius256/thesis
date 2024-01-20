@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        @include('main.components.userOderInfo')

        <div>
            <a class="btn btn-secondary" href="{{ route('administration.user.order.list') }}">повернутись до списку</a>
        </div>
    </div>
@endsection
