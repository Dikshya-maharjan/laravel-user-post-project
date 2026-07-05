<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Laravel 12 Test</title>

    <!-- This directive links your active Vite server -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 text-primary fw-bold mb-4">Laravel 12 + Bootstrap 5</h1>
                <p class="lead mb-4">If this box is styled, centered, and has a blue heading, your installation is successful.</p>
                
                <!-- Test Bootstrap JS Interactivity -->
                <button type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Hooray!">
                    Hover over me to test JS
                </button>
            </div>
        </div>
    </div>

</body>
</html>
