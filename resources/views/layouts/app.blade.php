<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homesteader</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
	<input type="checkbox" id="sidebar-toggle" class="peer hidden">

	<label for="sidebar-toggle" class="md:hidden fixed top-4 left-4 z-50 bg-green-700 text-white p-2 rounded cursor-pointer">
		☰	
	</label>
	<div class="md:flex min-h-screen">
	<nav class="fixed md:relative inset-y-0 left-0 w-64 bg-green-700 text-white p-4 flex flex-col gap-4 transform -translate-x-full transition-transform duration-200 peer-checked:translate-x-0 md:translate-x-0 z-40 pt-20 md:pt-4">
		<span class="font-bold text-lg pl-10 md:pl-0">Homesteader</span>
		<a href="{{ route('chickens.index') }}" class="hover:underline">All Chickens</a>
		<a href="{{ route('chickens.create') }}" class="hover:underline">Add Chicken</a>
		<a href="{{ route('eggs.index') }}" class="hover:underline">All Eggs</a>
		<a href="{{ route('eggs.create') }}" class="hover:underline">Add Egg</a>
	</nav>
	<div class="flex-1 p-6 pt-20 md:pt-6">
		@yield('content')
	</div>
</div>
</body>
</html>
