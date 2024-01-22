@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        <div>Нікнейм: {{ $user->name }}</div>

        <a href="{{ route('profile.edit') }} "class="btn btn-primary">
            {{ __('administration.menu-item.profile-edit') }}
        </a>
    </div>
 @endsection
