<h2>Create Order</h2>

<form method="POST" action="/order/store">
    @csrf

    <select name="customer_id">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}">
                {{ $customer->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <input type="number" name="total" placeholder="Order Total">

    <br><br>

    <button type="submit">Save Order</button>
</form>