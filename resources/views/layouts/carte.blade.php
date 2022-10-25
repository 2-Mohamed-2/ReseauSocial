<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *{
            
    </style>
</head>
<body>
    <table class="table table-lg">
        <thead>
            <tr>
                <th>n_delivrance</th>
                <th>village_de</th>
                <th>franction_de</th>
                <th>nationalite</th>
                <th>nom</th>
                <th>prenom</th>
                <th>fils_de</th>
                <th>et_de</th>
                <th>photo</th>
                <th>profession</th>
                <th>domicile</th>
                <th>taille</th>
                <th>teint</th>
                <th>cheveux</th>
                <th>signes</th>
                <th>carte_n</th>
            </tr>
        </thead>
<tbody>
    @foreach ($carts as $cart )

    <tr>
        <td> {{ $cart->n_delivrance }} </td>
        <td> {{ $cart->village_de }} </td>
    </tr>
        
    @endforeach
</tbody>
    </table>
</body>
</html>



