@extends('layouts.public')

@section('title', 'Contattaci')

@section('content')
<section id="contact">
    <h1>CONTATTACI</h1><br>
    <div id="uni">
        <div id="maps">
            <iframe src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=
                Via+brecce+bianche+12+Ancona%2C%20Italy+(Titolo)&amp;ie=UTF8&amp;t=&amp;z=10&amp;
                iwloc=B&amp;output=embed"width="100%" height="100%" frameborder="0" scrolling="no" 
                marginheight="0" marginwidth="0"><a href="">measure distance on map</a>
            </iframe>
        </div>
        <i class="fa fa-map-marker"></i><p>Via Brecce Bianche, 12, Ancona, AN</p><br>
    </div>
    <div id="autori">
        <div class="autori">
            <p>Fabbri Matteo</p>
            <i class="fa fa-envelope"></i><a href="mailto:s1098015@studenti.univpm.it">s1098015@studenti.univpm.it</a>
        </div>
        <div class="autori">
            <p>Settimi Diego</p>
            <i class="fa fa-envelope"></i><a href="mailto:s1098119@studenti.univpm.it">s1098119@studenti.univpm.it</a>
        </div>
        <div class="autori">
            <p>Sisi Mattia</p>
            <i class="fa fa-envelope"></i><a href="mailto:s1093418@studenti.univpm.it">s1093418@studenti.univpm.it</a>
        </div>
        <div class="autori">
            <p>Seresi Matteo</p>
            <i class="fa fa-envelope"></i><a href="mailto:s1100028@studenti.univpm.it">s1100028@studenti.univpm.it</a>
        </div>
    </div>
    
</section>
@endsection