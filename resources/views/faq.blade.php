@extends('layouts.public')

@section('title', 'FAQ')

@section('content')
<section id="faq">
<h1>FAQ</h1><br>
    @isset($faqs)
        @foreach ($faqs as $faq)
            <div id="question">
                <div class="domanda" id="quest">
                    <h2>{{$faq->Domanda}}</h2><i class="fa fa-angle-down" onclick="toggleDiv()" id="down" aria-hidden="true"></i>
                </div>
                <div class="risposta" id="answ">
                    <p>{{$faq->Risposta}}</p><br><br>
                </div>
            </div>
        @endforeach
    @endisset
</section>
<script>
        function toggleDiv() {
            var div = document.getElementById("answ");
            var quest = document.getElementById("quest");
            var down = document.getElementById("down");
            if (div.style.display === "none") {
                div.style.display = "block";
                quest.style.border-bottom = "none"
            } else {
                div.style.display = "none";
            }
        }
    </script>
@endsection