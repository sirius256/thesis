@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        @if (count($devices) === 0)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div>Немає жодних пристроїв</div>
                </div>
            </div>
        @else
            <div class="administration-flex-block">
                @foreach ($devices as $device)
                    <div class="administration-flex-block-item">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($device->getModelImageUrl()) }}" alt="device image">
                            <div class="card-body">
                                <h5 class="card-title">Id:{{ $device->id }}</h5>
                                <p class="card-text">
                                    <span>modelName: {{ $device->getModelName() }}</span>
                                    <span>name:{{ $device->name }}</span>
                                </p>
                                <a href="#" class="btn btn-primary">Галерея</a>
                                <a href="#" class="btn btn-primary">Зробити фото</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
