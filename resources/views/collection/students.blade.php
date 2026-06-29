<h2>First Student name using first()</h2>
@foreach($students as $std)
<!-- first() will brinhg only one output so it should be written $students[name] -->
 <p>{{$students['name']}}</p>

 @endforeach
<a href="/users/filter">Back</a>