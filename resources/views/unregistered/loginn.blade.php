<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="col-md-6 offset-md-3 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center" style="color: #7367F0;">MONTAX</h3>
                    <div class="text-center">simple but significant service for your money and tax</div>
                </div>
                {{-- <div class="card-header">
                    <h4 class="text-center">Sign Up</h4>
                </div> --}}
                <form action="{{ route('postLogin') }}" method="post">
                    @csrf
                    <div class="container">
                        <br>
                        <h4 class="text-center">Sign Up</h4>
                        <hr>
                        <div class="card-body">
                            @if(session('errors'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Something it's wrong:
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for=""><strong>Email</strong></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Password</strong></label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-footer"> --}}
                        <div class="container">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </div>
                        <br><br>
                        {{--
                    </div> --}}
                </form>

                <div class="card-footer">
                    <div class="container">
                        <button class="btn btn-success" onclick="fill_1()">Fill User 1</button>
                        <button class="btn btn-success" onclick="fill_2()">Fill User 2</button>
                        <button class="btn btn-success" onclick="fill_3()">Fill User 3</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function fill_1()
    {
        $('#email').val('unicorn@gmail.com');
        $('#password').val('unicorn123');
    }
    function fill_2()
    {
        $('#email').val('gita_wirjawan@gmail.com');
        $('#password').val('gita123');
    }
    function fill_3()
    {
        $('#email').val('tashya@gmail.com');
        $('#password').val('tashya123');
    }
</script>

</html>
