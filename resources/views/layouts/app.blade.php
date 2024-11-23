
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DAAV Management System</title>
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- AdminLTE style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
    <!-- Skin style -->
    <link rel="stylesheet" href="{{ asset('css/skin-green.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap DateTime Picker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.datetimepicker.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="icon" href="{{ asset('images/daav-logo-32x32.png') }}" type="image/x-icon">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <x-layouts.header />
    <x-layouts.sidebar />

    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{ $title ?? '' }}</h1>
        </section>
        <section class="content">

            {{ $content ?? '' }}
        </section>
    </div>

    <x-layouts.footer />

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Moment.js -->
    <script src="{{ asset('js/moment.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <!-- Bootstrap DateTime Picker -->
    <script src="{{ asset('js/bootstrap.datetime.js') }}"></script>
    <!-- Password toggle (if applicable) -->
    <script src="{{ asset('js/bootstrap.password.js') }}"></script>
    <!-- Custom scripts -->
    <!-- <script src="{{ asset('js/scripts.js') }}"></script> -->
    <!-- AdminLTE -->
    <script src="{{ asset('js/app.min.js') }}"></script>
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{ $scripts ?? '' }}
</body>

</html>