
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>500 &mdash; Dyresto</title>
  <link rel="icon" href="{{ asset('img/logo.png') }}">

  <link rel="stylesheet" href="{{ asset('template/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('font-awesome/all.css') }}">

  <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('template/css/components.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>500</h1>
            <div class="page-description">
                Whoopps, something went wrong.
            </div>
            <div class="page-search">
              <form>
                <div class="form-group floating-addon floating-addon-not-append">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">                          
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-lg">
                        Search
                      </button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="mt-3">
                <a href="index.html">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Dyresto 2020
        </div>
      </div>
    </section>
  </div>

  <script src="{{ asset('template/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('template/modules/popper.js') }}"></script>
  <script src="{{ asset('template/modules/tooltip.js') }}"></script>
  <script src="{{ asset('template/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('template/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('template/modules/moment.min.js') }}"></script>
  <script src="{{ asset('template/js/stisla.js') }}"></script>
  
  <script src="{{ asset('template/js/scripts.js') }}"></script>
  <script src="{{ asset('template/js/custom.js') }}"></script>
</body>
</html>