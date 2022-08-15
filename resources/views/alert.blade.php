{{-- Message --}}
@if (Session::has('success'))
<div id="box" class="w-full bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 relative" role="alert">
  <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert">
    <i class="fa fa-times"></i>
  </button>
  <strong>Error !</strong> {{ session('error') }}
</div>
@endif

<script>
  // Script For Close alert
  setTimeout(() => {
    const box = document.getElementById('box');
    // 👇️ removes element from DOM
    box.style.display = 'none';
  }, 3000)

</script>
