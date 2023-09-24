  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('category') }}">ABC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pro.view') }}">All Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('producta.add') }}">Add Product</a>
          </li>
        </ul>
      </div>
    </div>
    @if (Auth::user())

    {{--  <form action="{{ route('logout') }}" x-data>
      @csrf

      <x-dropdown-link href="{{ route('logout') }}"
               @click.prevent="$root.submit();">
          {{ __('Log Out') }}
      </x-dropdown-link>  --}}
  </form>  
    @else
    <span><a href="{{ route("login") }}">Login</a></span> || <span><a href="{{ route("register") }}">Register</a></span>  
    @endif
  </nav>