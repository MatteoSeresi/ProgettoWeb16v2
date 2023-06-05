@extends('layouts.adminlayout')

@section('title', 'Modifica FAQ')

@section('content')
<section id="azienda">
    <div id="question" class = "question">
    {{ Form::open(array('route' => ['editFaq', 'faq_id' => $faq->id], 'class' => 'contact-form')) }}
        {{ Form::label('Domanda', 'Domanda', ['class' => 'label-input lab_in']) }}
        {{ Form::textarea('Domanda', $faq->Domanda ?? old('Domanda'), ['class' => 'input te_in','id' => 'Domanda', 'required' => true, 'maxlength' => 500, value($faq->Domanda)]) }}<br><br>
        {{ Form::label('Risposta', 'Risposta', ['class' => 'label-input lab_in']) }}
        {{ Form::textarea('Risposta', $faq->Risposta ?? old('Risposta'), ['class' => 'input te_in','id' => 'Risposta', 'required' => true, 'maxlength' => 2500, value($faq->Risposta)]) }}<br><br>
        <div class="d-flex justify-content-center align-items-center ">
            <button title="Conferma" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" type = "submit"><i class="fa fa-check"></i></button>
            <button title="Scarta modifiche" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" type = "reset"><i class="fa fa-trash"></i></button>
        </div>
    {{ Form::close() }}
    </div>
</section>
@endsection