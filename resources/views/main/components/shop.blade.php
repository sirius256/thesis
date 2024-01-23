<div class="device-items">
    @foreach ($shopDeviceModels as $shopItem)
        <div class="card device-item shadow">
            <img class="card-img-top" src="{{ asset($shopItem['modelImageUrl']) }}" alt="device image">
            <div class="card-body">
                <div class="shop-device-body">
                    <div>
                        <h5 class="card-title">
                            <span>Назва моделі: {{ $shopItem['modelName'] }}</span>
                        </h5>
                        <p class="small">Доступна кількість: {{ $shopItem['deviceCount'] }}</p>
                        <p class="card-text">
                            <span>{{ $shopItem['modelDescription'] }}</span>
                        </p>
                    </div>

                    <div>
                        <div>
                            @if ($shopItem['deviceCount'] > 0)
                                @if ($isPublicShop)
                                    <a href="{{route('register', ['model_id' => $shopItem['modelId'] ])}}" class="btn btn-dark w-100">Замовити пристрій</a>
                                @else
                                    <a href="{{route('administration.user.order.summary', ['modelId' => $shopItem['modelId'] ])}}" class="btn btn-dark w-100">Замовити пристрій</a>
                                @endif
                            @else
                                <button type="button" class="btn btn-secondary disabled w-100" disabled="disabled">Замовити пристрій</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
