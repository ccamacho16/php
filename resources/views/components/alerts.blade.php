@if (Session::has('success'))
  <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-100">
    <span class="text-xl inline-block mr-5 align-middle">
      <i class="fas fa-bell"></i>
    </span>
    <span class="inline-block align-middle mr-8 text-green-700 ">
      <b class="capitalize"> Success ! </b> {{ session('success') }}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none text-green-700" onclick="closeAlert(event)">
      <span>×</span>
  
    </button>
  </div>
@endif

@if (Session::has('warnig'))

  <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-100">
    <span class="text-xl inline-block mr-5 align-middle">
      <i class="fas fa-bell"></i>
    </span>
    <span class="inline-block align-middle mr-8 text-red-700 ">
      <b class="capitalize"> Warning ! </b> {{ session('warnig') }}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none text-red-700" onclick="closeAlert(event)">
      <span>×</span>

    </button>
  </div>

@endif

