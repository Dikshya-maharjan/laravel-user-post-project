<h2>Posts Grouped By User ID</h2>

@foreach($result as $userId => $posts)

    <h3>User ID: {{ $userId }}</h3>

    @foreach($posts as $post)
        <p>{{ $post['title'] }}</p>
    @endforeach

    <hr>

@endforeach