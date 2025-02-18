<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impôts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 16px;
            text-align: center;
            border: 1px solid grey;
        }
        th {
            background-color: grey;
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Impôts</h1>
    <table>
        <thead>
            <tr>
                <th>Régime</th>
                <th>Régime Micro-foncier</th>
                <th>Régime réel</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Possibilité de choisir ce régime</td>
                <td>
                    @if ($sum_bills < 15000)
                        Oui car revenu inférieur à 15000€ annuel
                    @else
                        Non car revenu supérieur à 15000€ annuel
                    @endif
                </td>
                <td>
                    @if ($sum_bills < 15000)
                        Non car revenu inférieur à 15000€ annuel
                    @else
                        Oui et obligatoire car revenu supérieur à 15000€ annuel
                    @endif
                </td>
            </tr>
            <tr>
                <td>Case à cocher</td>
                <td>Case 4 BE déclaration n°2042</td>
                <td>Case 4 BA déclaration n°2044</td>
            </tr>
            <tr>
                <td>Montant à renseigner</td>
                <td>{{ $sum_bills }}</td>
                <td>{{ $sum_bills }}</td>
            </tr>
            <tr>
                <td>Montant imposable</td>
                <td>{{ $sum_bills * 0.7 }}</td>
                <td>{{ $sum_bills }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
