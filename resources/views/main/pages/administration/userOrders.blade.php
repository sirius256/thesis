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
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Номер амовлення</th>
                        <th scope="col">Модель приладу</th>
                        <th scope="col">Статус замовлення</th>
                        <th scope="col">Дата створення</th>
                        <th scope="col">Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="@if ($order->status_id == $completeStatusId) table-success @endif">
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->getModelName() }}</td>
                                <td>{{ $order->getStatus() }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('administration.user.order.view', ['orderId' => $order->id]) }}" class="btn btn-primary">
                                        переглянути деталі
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
