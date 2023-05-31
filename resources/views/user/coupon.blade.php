<!DOCTYPE html>
<html>
<head>
    <title>Visualizza Numero</title>
</head>
<body>
    <h1>Numero Generato:</h1>
    <p>{{ $codice }}</p>
    <p>Relativo all'offerta con id {{ $offerta->ID_Offerta }}</p>
    <p>Dell'azienda {{ $azienda->Ragione_Sociale }}</p>
</body>
</html>