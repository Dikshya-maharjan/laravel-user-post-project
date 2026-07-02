<h1>User List</h1>

@foreach($users as $user)
    <p>{{ $user['name'] }}</p>
    <p>{{$user['active']}}</p>
@endforeach
<a href="map">Click here for map method</a><br>
<a href="first">Click here for first method</a><br>
<a href="group">Click here for groupBy method</a><br>

