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
            <div class="device-items">
                @foreach ($devices as $device)
                    <div class="card device-item shadow">
                        <img class="card-img-top" src="{{ asset($device->getModelImageUrl()) }}" alt="device image">
                        <div class="card-body">
                            <h5 class="card-title">Id:{{ $device->id }}</h5>
                            <p class="card-text">
                                <span>modelName: {{ $device->getModelName() }}</span>
                                <span>name:{{ $device->name }}</span>
                            </p>

                            <div class="device-item-actions">
                                <a href="{{ route('register', ['deviceId' => $device->id ])}}" class="btn btn-dark">Зробити фото</a>
                                <a href="{{ route('register', ['deviceId' => $device->id ])}}" class="btn btn-dark">Галерея</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
