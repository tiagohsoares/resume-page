@php /** @var App\DataObjects\Resume $resume */ @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? ''}}</title>
    @vite(['resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-gray-800 bg-gray-50">
    <main class="mx-auto px-4 py-10 max-w-4xl">
        <header class="mb-12">
            {{ $header }}
        </header>
        {{ $slot }}
   </main> 
   <footer class="text-center py-6 text-gray-500 text-sm">
        <p>Last Update: {{date('F Y')}}</p>
   </footer>
</body>
</html>