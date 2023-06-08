<nav>
    <ul>
        <li class="navbar active"><a href = "{{ route('home') }}">HOME</a></li>
        <li class="navbar"><a href = "{{ route('aziende') }}">AZIENDE</a></li>
        <li class="navbar"><a href = "{{ route('catalogo') }}">CATALOGO</a></li>
        <li class="navbar"><a href = "{{ route('faq') }}">FAQ</a></li>
        <li class="navbar"><a href = "{{ route('contattaci') }}">CONTATTACI</a></li>
        @guest
        <li class="navbar"><a href = "{{ route('login') }}">ACCEDI</a></li>
        @endguest
        @can('isUser')
        <li class="navbar"><a href = "{{ route('user') }}">AREA UTENTE</a></li>
        @endcan
        @can('isStaff')
        <li class="navbar"><a href = "{{ route('staff') }}">AREA STAFF</a></li>
        @endcan
        @can('isAdmin')
        <li class="navbar"><a href = "{{ route('admin') }}">AREA ADMIN</a></li>
        @endcan
        @auth
        <li><a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @endauth
    </ul>
</nav>


<script>
window.addEventListener('scroll', function() {
  var navb = document.querySelector('.navb');
  var header = document.querySelector('.top');
  var navbHeight = header.offsetHeight;
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop >= navbHeight) {
    navb.classList.add('navb-fixed');
  } else {
    navb.classList.remove('navb-fixed');
  }
});
    // Ottieni la rotta corrente
    var currentRoute = "{{ Request::url() }}";
    // Rimuovi l'attributo "active" da tutti gli elementi della navbar
    var navbarItems = document.querySelectorAll('.navbar');
    navbarItems.forEach(function(item) {
        item.classList.remove('active');
    });
    // Verifica la rotta corrente e imposta l'elemento "active" corrispondente
    navbarItems.forEach(function(item) {
        var href = item.querySelector('a').getAttribute('href');
        if (currentRoute === href) {
            item.classList.add('active');
    }
    });
</script>






