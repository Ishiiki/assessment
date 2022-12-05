<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title : '...' }}</title>
</head>



<body>
    <div>
        @if (Session::has('success'))
            {{ Session::get('success') }}
        @endif
    </div>

    <form action="/register" method="post">
        @csrf

        <div>
            <input type="text" name="name" id="" placeholder="Name">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div>
            <input type="email" name="email" id="" placeholder="Email">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="Password">
            @error('password')
                {{ $message }}
            @enderror
        </div>
       <div>
        <input type="password" name="password_confirmation" id="" placeholder="Password Confirmation">
       </div>
        
       <div>
            @isset($roles)
            <select name="role">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                @endforeach
            </select>
            @endisset


            @error('role')
                {{ $message }}
            @enderror
       </div>

        <input type="submit" value="Register">

    </form>

</body>



</html>