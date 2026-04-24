<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jinlong PMS</title>
</head>
<body>
    <nav class=" w-full bg-white shadow-sm border-b border-gray-200 px-6 py-3 absolute ">

  <div class="flex items-center justify-between w-full">

    <!-- LEFT SIDE: Logo + Title -->
    <div class="flex items-center gap-3">

    

    </div>

    <!-- RIGHT SIDE -->
    <div class="flex items-center gap-4">

      <!-- Search -->
      <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-3 py-2">
        <i class="fa-solid fa-magnifying-glass text-gray-500"></i>

        <input
          type="text"
          placeholder="Search..."
          class="bg-transparent outline-none px-2 text-sm w-48"
        />
      </div>

      <!-- Notifications -->
      <button class="relative bg-gray-100 p-2 rounded-lg hover:bg-gray-200 transition">
        <i class="fa-regular fa-bell text-gray-700"></i>

        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
          3
        </span>
      </button>

      <!-- User Dropdown -->
      <div class="relative group">

        <!-- Button -->
        <button class="flex items-center gap-3 bg-gray-100 hover:bg-gray-200 px-3 py-2 rounded-lg">

          <!-- Avatar -->
          <div class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm">
            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
          </div>

          <!-- Name -->
          <div class="hidden md:block text-left">
            <div class="text-sm font-semibold text-gray-800">
              {{ auth()->user()->name ?? 'User' }}
            </div>
            <div class="text-xs text-gray-500">
              {{ auth()->user()->email ?? '' }}
            </div>
          </div>

          <i class="fa-solid fa-chevron-down text-gray-500 text-xs"></i>

        </button>

        <!-- Dropdown -->
        <div class="absolute right-0 mt-2 w-52 bg-white shadow-lg rounded-lg border opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto">

          <div class="px-4 py-3 border-b">
            <div class="font-semibold text-gray-800">
              {{ auth()->user()->name ?? 'User' }}
            </div>
            <div class="text-xs text-gray-500">
              {{ auth()->user()->email ?? '' }}
            </div>
          </div>

          <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-100">
            <i class="fa-regular fa-user"></i> Profile
          </a>

          <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-100">
            <i class="fa-solid fa-gear"></i> Settings
          </a>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
              <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
          </form>

        </div>

      </div>

    </div>

  </div>

</nav>
</body>
</html>