<nav>
    <ul>
        <li class="navbar"><a href = "{{ route('managecompany') }}">GESTIONE AZIENDE</a></li>
        <li class="navbar"><a href = "{{ route('deleteuser') }}">GESTIONE UTENTI</a></li>
        <li class="navbar"><a href = "{{ route('managestaff') }}">GESTIONE STAFF</a></li>
        <li class="navbar"><a href = "{{ route('managefaq') }}">GESTIONE FAQ</a></li>
        <li class="navbar"><a href = "{{ route('stats') }}">VISUALIZZA STATISTICHE</a></li>
    </ul>
</nav>


<script>
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
</script