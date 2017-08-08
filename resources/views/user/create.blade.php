<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Blog App</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>
    <section class="container">
        <div class="row">
            <h1>Create User</h1>
        </div>
        <form id="frmUser" method="post" action="{{route('users.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="pwd">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" >
            </div>

            <div class="form-group">
                <label for="pwd">Last Name:</label>
                <input type="text" id="last_name" name="last_name"  class="form-control" >
            </div>

            <div class="form-group">
                <label for="pwd">Username:</label>
                <input type="text" id="username" name="username"  class="form-control" >
            </div>

            <div class="form-group">
                <label for="pwd">Email:</label>
                <input type="text" id="email" name="email"  class="form-control" >
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" id="password" name="password"  class="form-control" >
            </div>

            <div class="form-group">
                <input type="submit" id="btnSave" name="btnSave"  value="Save User">
            </div>
        </form>
    </section>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>