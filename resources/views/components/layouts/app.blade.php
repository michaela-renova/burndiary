<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    

</head>
<body>



<x-navbar />
    
    

<main class="container mx-auto bg-white p-16 rounded-xl mt-16">
    
    {{ $slot }}
</main>

<div class="fixed bottom-0 w-full h-128 pointer-events-none -z-10 ">
    <img src="{{ asset('images/fire.png') }}" 
         class="absolute left-1/2 -translate-x-1/2 -bottom-110 lg:-bottom-120 w-full h-[200%] object-contain opacity-10">
</div>


<footer class="text-center py-4 fixed bottom-0 w-full z-10">
    <p>© 2025</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>