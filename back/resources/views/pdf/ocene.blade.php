@php
    use App\Models\Predmet;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocene</title>
</head>
<body>
    <h1>Ocene ucenika</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Predmet</th>
                <th>Ocena</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ocene as $ocena)
                <tr>
                    
                <td>
                     @php
                        $predmet = Predmet::find($ocena->predmetId);
                            if ($predmet) {
                                echo $predmet->naziv;
                            } else {
                                echo "Nepoznat predmet";
                            }
                    @endphp
                </td>

                    <td>{{ $ocena->vrednost }}</td>
                    <td>{{ $ocena->opis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
