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
    
    

<main class="container mx-auto p-16 rounded-xl mt-16">
    
    {{ $slot }}
</main>

<div class="fixed bottom-0 w-full h-auto pointer-events-none -z-10 ">
    <img src="{{ asset('images/fire.png') }}" 
         class="absolute bottom-0 opacity-10">
</div>





<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>