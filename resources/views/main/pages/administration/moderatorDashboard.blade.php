@extends('main.layouts.moderator')

@section('content')
    <div class="admin-page-content">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('main.components.moderatorOrders')
            </div>
        </div>
    </div>
@endsection
