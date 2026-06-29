<h1>Users Sorted by Age</h1>

@foreach($users as $user)
    <p>Name: {{ $user['name'] }} | Age: {{ $user['age'] }}</p>
@endforeach