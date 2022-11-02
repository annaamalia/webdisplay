<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Display</title>
    @include('master.stylesheet')  
  </head>

<body>
    @include('master.header')

      <main class="container-fluid">
      @yield('main-content')
      </main>

    {{-- @yield('master.theme-1.footer')   --}}
    @include('master.script')
</body>
</html>