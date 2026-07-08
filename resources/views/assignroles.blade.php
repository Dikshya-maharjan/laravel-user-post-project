@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Assign Role</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/assignroles" method="POST">

        @csrf

        <div class="mb-3">

            <label>User</label>

            <select name="user_id" class="form-control">

                @foreach($users as $user)

                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Role</label>

            <select name="role" class="form-control">

                @foreach($roles as $role)

                    <option value="{{ $role->name }}">
                        {{ $role->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <button class="btn btn-primary">
            Assign Role
        </button>

    </form>

</div>

@endsection