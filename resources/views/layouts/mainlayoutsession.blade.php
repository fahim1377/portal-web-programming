<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layouts.partials.head')

 </head>

 <body id="bodyBootstrapOverrides">


@include('layouts.partials.nav')

<!-- @include('layouts.partials.header') -->

@yield('contents')

@include('layouts.partials.footer')

@include('layouts.partials.footer-scripts')

 </body>

</html>
