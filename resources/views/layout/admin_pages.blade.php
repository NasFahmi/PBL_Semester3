<!DOCTYPE html>
<html :class="{ 'theme-dark': light }" x-data="data()" lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>@yield('title')</title>
   <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
   @include('partials.link')
</head>

<body>
   <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
      @include('partials.sidenav')
      <div class="flex flex-col flex-1 w-full">
         @include('partials.header')
         <main class="h-full overflow-y-auto">
            @yield('content')
         </main>
      </div>
   </div>
</body>

</html>