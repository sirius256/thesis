@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        Привіт, {{ $user->name }}!
    </div>
@endsection
