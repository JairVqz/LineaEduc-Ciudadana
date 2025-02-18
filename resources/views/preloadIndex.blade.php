<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/config.js"></script>
    <script src="/js/preloadIndex.js"></script>
    <link rel="stylesheet" href="/css/preloadIndex.css">
    <link rel="icon" href="{{ asset(path: 'images/LEC.png') }}">

</head>

<body>

    <script>
        window.Laravel = <?php echo json_encode([
            'loginValidation' => route('auth.authentication'),
        ]); ?>
    </script>

    <div class="container text-center">
        <div class="row d-flex align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <img src="/images/LEC.png" class="img-fluid" alt="Línea Educación Ciudadana">
            </div>
            <div class="col-md-6 align-self-center d-flex justify-content-center align-items-center"
                style="height: 100vh; flex-direction: column;">
                <div id="1">
                    <h2>Autenticando, por favor espere.</h2>
                </div>
                <div id="loader" style="margin-top: 10px;"></div>
                <div id="myDiv" class="animate-bottom" style="display:none; margin-top: 10px;">
                    <h2 id="estatusAutenticacion"></h2>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
