<h2>Create ID Card</h2>

<form method="POST" action="/idcard/store">
    @csrf

    <select name="employee_id">
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}">
                {{ $employee->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <input type="text" name="card_number" placeholder="Card Number">

    <br><br>

    <button type="submit">Save ID Card</button>
</form>