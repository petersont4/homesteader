<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homesteader</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
	<div class="group md:flex min-h-screen">
	<input type="checkbox" id="sidebar-toggle" class="hidden">
	<label for="sidebar-toggle" class="md:hidden fixed top-4 left-4 z-50 bg-homesteader-dark text-homesteader-accent p-2 rounded cursor-pointer">
		☰	
	</label>
	<nav class="fixed md:sticky md:top-0 md:h-screen inset-y-0 left-0 w-64 bg-homesteader-dark text-homesteader-muted p-4 flex flex-col gap-6 transform -translate-x-full transition-transform duration-200 group-has-[#sidebar-toggle:checked]:translate-x-0 md:translate-x-0 z-40 pt-20 md:pt-4">
		<a href="/" class="font-bold text-xl pl-10 md:pl-0">Homesteader</a>
		<div class="flex flex-col gap-1">
			<span class="inline-flex item-center gap-1 text-lg font-medium font-bold tracking-wide text-homesteader-muted px-2"><x-tabler-canary class="" />Chickens</span>
			<a href="{{ route('chickens.index') }}" class="ml-10 hover:underline flex items-center gap-2 text-sm">View Chickens</a>
			<a href="{{ route('eggs.index') }}" class="ml-10 hover:underline flex items-center gap-2 text-sm">Recent Eggs</a>
			<a href="{{ route('eggs.create') }}" class="ml-10 over:underline flex items-center gap-2 text-sm">Record Egg</a>
		</div>
		<div class="flex flex-col gap-1">
			<span class="inline-flex item-center gap-1 text-lg font-medium font-bold tracking-wide text-homesteader-muted px-2"><x-tabler-plant />Gardens</span>
			<a href="{{ route('gardens.index') }}" class="ml-10 hover:underline flex items-center gap-2 text-sm">View Gardens</a>
			<a href="{{ route('gardens.create') }}" class="ml-10 hover:underline flex items-center gap-2 text-sm">Create Garden</a>
		</div>
		<div class="mt-auto">
        	<!--<a href="#" class="inline-flex item-center gap-1"><x-tabler-settings />Settings</a>-->
    	</div>
	</nav>
	<div class="flex-1 p-6 pt-20 md:pt-6">
		@yield('content')
	</div>
</div>
</body>
</html>
