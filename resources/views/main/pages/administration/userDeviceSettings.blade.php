@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        <form method="POST" action="{{ route('administration.user.device.settings.submit', ['deviceId' => $device->id]) }}">
            @csrf

            <label for="photoExtension">Формат фото</label>
            <select name="photo_extension" id="photoExtension">
                @foreach ($availablePhotoExtensions as $photoExtension)
                    <option value="{{ $photoExtension }}" @if($photoExtension === $device->getSettingDevicePhotoExtension()) selected @endif>
                        {{ $photoExtension }}
                    </option>
                @endforeach
            </select>

            <div class="d-flex gap-2 mt-10">
                <button class="btn btn-primary" type="submit">
                    Зберегти налаштування
                </button>
                <div>
                    <a href="{{ route('administration.user.device.list')}}" class="btn btn-dark">Повернутись назад</a>
                </div>
            </div>
        </form>
    </div>
@endsection
