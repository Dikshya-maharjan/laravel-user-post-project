<h2>Adult Users</h2>

@foreach($result as $user)
    <p>
        Name: {{ $user['name'] }}
        | Age: {{ $user['age'] }}
    </p>
@endforeach