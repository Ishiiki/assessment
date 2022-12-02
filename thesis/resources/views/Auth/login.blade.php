<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>


<body>
    
<main>
    <form action="/login" method="post">
        @csrf

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

        <input type="submit" value="Login">

    </form>
</main>




</body>




</html>