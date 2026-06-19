<h2>Orders List</h2>

@foreach($orders as $order)
    Customer Name: {{ $order->customer->name }} <br>
    Order Total: {{ $order->total }} <br>
    <hr>
@endforeach