@extends('layouts.public')

@section('title', 'FAQ')

@section('content')
<section id="faq">
<h1>FAQ</h1><br>
    @isset($faqs)
        @foreach ($faqs as $faq)
            <div id="question">
                <div class="domanda" id="quest{{$faq->id}}">
                    <h2>{{$faq->Domanda}}</h2>
                    <i class="fa fa-angle-down" onclick="toggleDiv({{$faq->id}})" id="down{{$faq->id}}" aria-hidden="true"></i>
                </div>
                <div class="risposta" id="answ{{$faq->id}}">
                    <p>{{$faq->Risposta}}</p><br><br>
                </div>
            </div>
        @endforeach
    @endisset
</section>
<script>
    function toggleDiv(faqID) {
        var div = document.getElementById("answ" + faqID);
        var down = document.getElementById("down" + faqID);
        if (div.style.display == "none") {
            div.style.display = "block";
            down.className = "fa fa-angle-up";
        } else {
            div.style.display = "none";
            down.className = "fa fa-angle-down";
        }
    }
</script>
@endsection