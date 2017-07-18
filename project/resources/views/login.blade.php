<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Your Cafe</title>
    @include('partials.header')
</head>
<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="brand">Login - Your Cafe</h2>
                </div>
                <div class="panel-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        </div>
                        <button type="submit" class="btn btn-black">Login</button>

                        {{ csrf_field() }}
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>