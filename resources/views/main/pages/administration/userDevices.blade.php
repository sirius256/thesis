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
                            <h5 class="card-title">Модель дівайса: {{ $device->getModelName() }}</h5>

                            <div class="device-item-actions">
                                <div>
                                    <a href="{{ route('administration.user.device.make.photo', ['deviceId' => $device->id ])}}" class="btn btn-dark">Зробити фото</a>
                                </div>
                                <div>
                                    <a href="{{ route('administration.user.device.gallery.photos', ['galleryId' => $device->getGalleryId() ])}}" class="btn btn-dark">Галерея [{{ $device->getPhotoCount()}}]</a>
                                </div>
                          </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
