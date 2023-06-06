<nav class="sticky-top bg-old ">
    <div class="container-fluid container-lg p-0 border-bottom border-2 border-black">
        <table class="table text-nowrap text-center m-0 fw-black" style="min-width: auto; width: auto; margin: auto!important;">
            <tbody>
                <tr class="align-middle">
                    <td class="p-0">
                        <a id="home" href="{{ route('home') }}" class="p-3 lh-1 d-block spa text-black text-decoration-none">
                            HOME
                        </a>
                    </td>
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    <td class="p-0">
                        <a id="aziende" href="{{ route('aziende') }}" class="p-3 lh-1 d-block spa type text-black text-decoration-none">
                            AZIENDE
                        </a>
                    </td>
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    <td class="p-0">
                        <a id="catalogo" href="{{ route('catalogo') }}" class="p-3 lh-1 d-block spa type text-black text-decoration-none ">
                            CATALOGO
                        </a>
                    </td>
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    <td class="p-0">
                        <a id="faq" href="{{ route('faq') }}" class="p-3 lh-1 d-block spa type text-black text-decoration-none ">
                            FAQ
                        </a>
                    </td>
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    <td class="p-0">
                        <a id="contatti" href="{{ route('contattaci') }}" class="p-3 lh-1 d-block spa type text-black text-decoration-none ">
                            CONTATTACI
                    </td>
                    @guest
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    <td class="p-0">
                        <a id="accedi" href="{{ route('login') }}" class="p-3 lh-1 d-block spa type text-black text-decoration-none ">
                            ACCEDI
                        </a>
                    </td>
                    @endguest
                    @can('isUser')
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    <td class="p-0">
                        <a id="utente" href="{{ route('user') }}" class="p-3 lh-1 d-block spa type text-black text-decoration-none ">
                            AREA UTENTE
                        </a>
                    </td>
                    @endcan
                    @can('isStaff')
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    <td class="p-0">
                        <a id="staff" href="{{ route('staff') }}" class="p-3 lh-1 d-block spa type text-black text-decoration-none ">
                            AREA STAFF
                        </a>
                    </td>
                    @endcan
                    @can('isAdmin')
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    <td class="p-0">
                        <a id="admin" href="{{ route('admin') }}" class="p-3 lh-1 d-block spa type text-black text-decoration-none ">
                            AREA ADMIN
                        </a>
                    </td>
                    @endcan
                    @auth
                    <td class="px-0">
                        <div class="vr"></div>
                    </td>
                    </td>
                        <td class="p-0">
                        <a href="" class="p-3 lh-1 d-block spa text-black text-decoration-none" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </td> 
                    @endauth                                                          
                </tr>
            </tbody>
        </table>         
    </div>
</nav>


<script>
    // Ottieni la rotta corrente
    var currentRoute = "{{ Request::url() }}";

    // Rimuovi l'attributo "active" da tutti gli elementi della navbar
    var navbarItems = document.querySelectorAll('.container-lg table a');
    navbarItems.forEach(function(item) {
        item.classList.remove('active');
    });

    // Verifica la rotta corrente e imposta l'elemento "active" corrispondente
    navbarItems.forEach(function(item) {
        var href = item.getAttribute('href');
        if (currentRoute === href) {
            item.classList.add('active');
        }
    });
</script>






