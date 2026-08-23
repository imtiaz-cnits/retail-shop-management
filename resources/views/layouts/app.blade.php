<!DOCTYPE html>
<html lang="en">
  <head>
  <script>
    (function() {
      try {
        const savedMode = localStorage.getItem('lightMode') || 'light';
        document.documentElement.setAttribute('light-mode', savedMode);
        document.documentElement.setAttribute('data-layout-mode', savedMode);
        if (savedMode === 'dark') {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      } catch(e) { console.error(e); }
    })();
  </script>
    <meta charset="utf-8" />
    <title>Sign In | Pos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Preload Custom Fonts to Prevent FOUT (Flash of Unstyled Text) -->
    <link rel="preload" href="/fonts/bricolage_grotesque_normal_400.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/bricolage_grotesque_normal_700.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/tiro_bangla_normal_400.ttf" as="font" type="font/ttf" crossorigin>


    <!-- App favicon -->
    <link
      rel="shortcut icon"
      href="{{asset('back-end/assets/icons/nexus-pos-logo.svg')}}"
      type="image/x-icon"
    />



    <!-- Bootstrap Css -->
    <link
      href="{{asset('back-end/assets/css/bootstrap.min.css')}}"
      id="bootstrap-style"
      rel="stylesheet"
      type="text/css"
    />

    <!-- CSS Link-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('back-end/assets/css/toastify.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('back-end/assets/js/toastify-js.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/config.js') }}"></script>

  </head>

  <body>

    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div>
        @yield('content')
    </div>


    <script src="{{asset('back-end/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('back-end/assets/js/app.js')}}"></script>
  </body>
</html>
