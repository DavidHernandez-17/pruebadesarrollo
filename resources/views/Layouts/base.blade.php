<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>Productos</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-success p-2 text-dark bg-opacity-25">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse nav justify-content-center" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="/products"><i class="fa-solid fa-tags"></i> Productos y compras</a>
                        <a class="nav-link active" href="/stores"><i class="fa-solid fa-shop"></i> Tiendas</a>
                        <a class="nav-link active" href="/" ><i class="fa-solid fa-truck-arrow-right"></i> Compras</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div>
        @yield('content')
    </div>

</body>

</html>