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
                        <div class="d-flex gap-2">
                            <div>
                                <a href="{{ route('administration.moderator.order.view', ['orderId' => $order->id]) }}" class="btn btn-primary">
                                    переглянути деталі
                                </a>
                            </div>

                            <form method="POST" action="{{ route('administration.moderator.order.complete', ['orderId' => $order->id]) }}">
                                @csrf
                                <button class="btn btn-primary" type="submit" onclick="event.preventDefault();this.closest('form').submit();">
                                    Активувати пристрій і завершити замовлення
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
