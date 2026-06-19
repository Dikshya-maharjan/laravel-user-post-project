<h2>Create Customer</h2>

<form method="POST" action="/customer/store">
    @csrf

    <input type="text" name="name" placeholder="Name"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>

    <button type="submit">Save Customer</button>
</form>