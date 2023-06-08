@extends('layouts.adminlayout')

@section('title', 'Modifica FAQ')

@section('content')
<button title="Crea una nuova FAQ" class="add" onclick="window.location.href = '{{ route('addFaq') }}'"><i class="fa fa-plus"></i></button>
<section  class="catalogo">
    @isset($faqs)
        @foreach ($faqs as $faq)
            <div id="azienda">
                <h2>{{$faq->Domanda}} </h2>
                <p>{{$faq->Risposta}}</p><br><br>
                    <a title="Modifica FAQ" class="offmod" href = "{{ route('editFaq', ['faq_id' => $faq->id])}}"><i class="fa fa-pencil"></i></a>
                    <a href="{{ route('eliminaFaq', ['faq_id' => $faq->id]) }}" title="Elimina FAQ" class="offmod" onclick="event.preventDefault(); if (confirm('Sei sicuro di voler eliminare questa FAQ?')) { document.getElementById('delete-form-{{ $faq->id }}').submit(); }"><i class="fa fa-trash"></i></a>
                <form id="delete-form-{{ $faq->id }}" action="{{ route('eliminaFaq', ['faq_id' => $faq->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        @endforeach
    @endisset
</section>
@endsection