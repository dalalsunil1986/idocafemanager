<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    @include('partials.header')
</head>

<body style="background-color: #ffffff;">

<div id="wrapper">

    <!-- Navigation -->
    @include('partials.navbar')

    <div id="page-wrapper">

        <div class="container-fluid">

            @yield('content')

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@include('partials.script')
@yield('script')
</body>

</html>
