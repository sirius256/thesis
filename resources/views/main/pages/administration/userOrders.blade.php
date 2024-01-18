@extends('main.layouts.admin')

@section('content')
    <div class="admin-page-content">
        @if (count($orders) === 0)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div>Немає жодних замовлень</div>
                </div>
            </div>
        @else
            <div class="administration-flex-block">
                @foreach ($orders as $order)
                    <div class="administration-flex-block-item">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="#" alt="device image">
                            <div class="card-body">
                                <h5 class="card-title">Замовлення номер {{ $order->id }}</h5>
                                <p class="card-text">
                                    <span>{{ $order->created_at }}</span>
                                    <br>
                                    <span>{{ $order->device_id }}</span>
                                    <br>
                                    <span>{{ $order->status_id }}</span>
                                </p>
                                <a href="{{ route('administration.user.order.view', ['orderId' => $order->id]) }}" class="btn btn-primary">переглянути деталі</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
