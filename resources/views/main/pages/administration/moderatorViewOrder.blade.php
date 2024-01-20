@extends('main.layouts.moderator')

@section('content')
    <div class="admin-page-content">
        <div>
            <a class="btn btn-secondary" href="{{ route('administration.moderator.dashboard') }}">повернутись до списку</a>
        </div>

        <h2>Користувач бачить свій ордер ось так:</h2>

        @include('main.components.userOderInfo')
    </div>
@endsection
