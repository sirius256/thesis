<div class="device-items">
    @foreach ($shopDeviceModels as $shopItem)
        <div class="card device-item shadow">
            <img class="card-img-top" src="{{ asset($shopItem['modelImageUrl']) }}" alt="device image">
            <div class="card-body">
                <h5 class="card-title">Назва моделі: {{ $shopItem['modelName'] }}</h5>
                <h5 class="card-title">Доступна кількість: {{ $shopItem['deviceCount'] }}</h5>
                <p class="card-text">
                    <span>{{ $shopItem['modelDescription'] }}</span>
                </p>
                @if ($shopItem['deviceCount'] > 0)
                    @if ($isPublicShop)
                        <a href="{{route('register', ['model_id' => $shopItem['modelId'] ])}}" class="btn btn-dark">Замовити пристрій</a>
                    @else
                        <a href="{{route('administration.user.order.summary', ['modelId' => $shopItem['modelId'] ])}}" class="btn btn-dark">Замовити пристрій</a>
                    @endif
                @else
                    <button type="button" class="btn btn-secondary disabled" disabled="disabled">Замовити пристрій</button>
                @endif
            </div>
        </div>
    @endforeach
</div>
