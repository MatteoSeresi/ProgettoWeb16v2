@extends('layouts.adminlayout')

@section('title', 'Modifica FAQ')

@section('content')
<section id="azienda">
    <button title="Crea una nuova faq" class="btn-sm loader border-0 bg-black text-white p-3 text-center 
    fw-bold text-uppercase d-block w-60 mb-3 lh-1 rounded" onclick="window.location.href = '{{ route('addFaq') }}'">
    <i class="fas fa-user-plus"></i></button>
    @isset($faqs)
        @foreach ($faqs as $faq)
        <section id="azienda">
            <div id="question">
                <h2>Domanda {{$faq->id}}: {{$faq->Domanda}} </h2>
                <p>{{$faq->Risposta}}</p><br><br>
                <div class="d-flex justify-content-center align-items-center ">
                    <button title="Modifica faq" class="btn-sm loader border-0 bg-black text-white p-3 text-center 
                    fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="window.location.href = 
                    '{{ route('editFaq', ['faq_id' => $faq->id])}}'"><i class="fas fa-pencil-alt"></i></button>
                    <a href="{{ route('eliminaFaq', ['faq_id' => $faq->id]) }}" title="Elimina Faq" 
                    class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase 
                    d-block w-10 m-3 lh-1 rounded" onclick="event.preventDefault(); 
                    if (confirm('Sei sicuro di voler eliminare questa FAQ?')) 
                    { document.getElementById('delete-form-{{ $faq->id }}').submit(); }"><i class="fa fa-trash"></i></a>
                <form id="delete-form-{{ $faq->id }}" action="{{ route('eliminaFaq', ['faq_id' => $faq->id]) }}" method="POST" 
                style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                </div>
            </div>
        </section>
        @endforeach
    @endisset
</section>
@endsection