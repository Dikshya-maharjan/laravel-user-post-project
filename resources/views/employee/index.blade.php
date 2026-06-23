<h2>Employees with ID Cards</h2>

@foreach($employees as $employee)
    <p>
        Name: {{ $employee->name }} <br>
        Email: {{ $employee->email }} <br>
        Card Number: {{ $employee->idCard->card_number ?? 'No Card Assigned' }}
    </p>
    <hr>
@endforeach