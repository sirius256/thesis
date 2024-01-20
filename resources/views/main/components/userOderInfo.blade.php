<div>
    <div>Дата створення: {{ $order->created_at }}</div>
    <div>Назва моделі: {{ $device->getModelName() }}</div>
    <div>Статис замовлення: {{ $order->getStatus() }}</div>
    @if (!empty($order->comment_for_user))
        <div>{{ $order->comment_for_user }}</div>
    @endif

    <div>
        <ul>
            @foreach ($orderLogs as $orderLog)
                <li>
                    <span>{{ $orderLog->created_at }}:</span>
                    <span>{{ $orderLog->auto_comment }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
