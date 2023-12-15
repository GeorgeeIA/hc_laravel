
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>register Health Calls</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/heroes/">

    

    

    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../img/hc.png" sizes="180x180">
    <link rel="icon" href="../img/hc.png" sizes="32x32" type="image/png">
    <link rel="icon" href="../img/hc.png" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="../img/hc.png">
    <meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/heroes.css" rel="stylesheet">
  </head>
  <body style="background-image: url(../img/hs.jpg); background-size: cover;">
    
<main>

  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-md-10 mx-auto col-lg-5">
        <form action="{{ route('login.store') }}" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
        @csrf
          <h3 class="py-2 text-center">Daftar</h3>
          <div class="form-floating mb-3">
            <input type="text" placeholder="Email" class="form-control @error('username') is-invalid @enderror"
            id="username" name="username" value="{{ old('username') }}">
            @error('username')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="username">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"
            id="password" name="password" value="{{ old('password') }}">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
          <hr class="my-4">
          <small class="text-muted">Sudah Punya Akun ? <a href="{{ route('login.index') }}" class="btn-link">Masuk</a></small>
        </form>
      </div>
    </div>
  </div>
</main>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
