@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        <div class="mb-2">
            <div>Нікнейм: {{ $user->name }}</div>
            <div>Емейл: {{ $user->email }}</div>
            <div>Дата реєстрації: {{ $user->created_at }}</div>
        </div>

        <div>
            <a href="{{ route('profile.edit') }} "class="btn btn-primary">
                {{ __('administration.menu-item.profile-edit') }}
            </a>
        </div>
    </div>
 @endsection
