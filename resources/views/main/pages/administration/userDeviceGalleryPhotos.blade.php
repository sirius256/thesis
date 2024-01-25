@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        <div>
            <a href="{{ route('administration.user.device.list')}}" class="btn btn-dark">Повернутись назад</a>
        </div>

        @if (count($deviceGalleryImages) === 0)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div>Немає жодних фото</div>
                </div>
            </div>
        @else
            <div>Кількість фото: {{ count($deviceGalleryImages) }}</div>
            <div class="photo-items">
                @foreach ($deviceGalleryImages as $image)
                    <div class="card device-item shadow">
                        <div>
                            <img class="card-img-top card-custom-image" src="{{ $image->getAssetUrl() }}" alt="device image">
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <span>Розмір файлу: {{ $image->getImageSize() }}b</span>
                                <br>
                                <span>Розширення файлу:{{ $image->getImageExtension() }}</span>
                                <br>
                                <span>Дата створення:{{ $image->created_at }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
