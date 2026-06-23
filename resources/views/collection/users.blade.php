<h1>User List</h1>

@foreach($users as $user)
    <p>{{ $user['name'] }}</p>
    <p>{{$user['active']}}</p>
@endforeach
<a href="users/map">Click here for map method</a>

