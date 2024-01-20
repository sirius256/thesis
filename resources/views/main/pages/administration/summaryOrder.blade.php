@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Підтвердити замовлення') }}
                </h2>

                <div>
                    <div>Ваше замовлення:</div>
                    <div>назва моделі:{{ $deviceModel->name }}</div>
                    <div>опис:{{ $deviceModel->description }}</div>
                </div>
            </header>

            <form method="post" action="{{ route('administration.user.order.summary.submit', ['modelId' => $deviceModel->id]) }}" class="mt-6 space-y-6">
                @csrf

                <div class="flex items-center gap-4">
                    <button class="btn btn-primary" type="submit">Підтвердити замовлення</button>
                    <a class="btn btn-secondary" href="{{ route('administration.user.device.shop') }}">Відмінити</a>
                </div>
            </form>
        </section>
    </div>
@endsection
