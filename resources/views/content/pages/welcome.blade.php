@auth
<form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit" class="dropdown-item notify-item">
    <i class="mdi mdi-logout mr-1"></i>
    <span>Logout</span>
  </button>
</form>
@endauth
<!-- item-->