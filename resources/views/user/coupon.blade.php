<!DOCTYPE html>
<html>
<head>
    <title>Coupon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stile.css') }}" >
</head>
<body style="text-align: center">
<section class="contenuto" style = "background-image: {{$offerta->Immagine}}">
    <h1>{{ $azienda->Ragione_Sociale }}</h1><br><br>
    <p>{{ $offerta->Descrizione }}</p>
    <p>Codice Promozionale dell'Offerta:<p><br>
    <h2>{{$codice}}</h2><br>
    <p>Offerta valida fino al fino al {{ $offerta->Scadenza }} in tutti gli stabilimenti {{ $azienda->Ragione_Sociale }}</p>
</section>
</body>
</html>