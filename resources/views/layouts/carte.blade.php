
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
     
    </style>
    <title>Document</title>
</head>
<body>
    <table class="contenaire-fluid bg-danger">
        <thead>
            <th>
                <img style="margin-left:120px; width: 60px; height:50px;" src="assets/images/197429.png" alt="" >
            </th>
            <th style="margin-left:-120px">
                <pre>
                    REPUBLIQUE DU MALI
                    <small>CARTE NATIONALE D'IDENTITE</small> 
                </pre>
            </th>
        </thead>
        <tr>
            <td>
                <img style="margin-left:10px;  width: 130px; height:100px;" src="assets/images/{{ $cart->photo  }}" alt="Non trouve" >
            </td>
            <td>
                <pre>
                <span>NOM {{ $cart->nom }}</span>
                <span>Prenom {{ $cart->nom }}</span>
                <span>SEXE</span> <span style="margin-left: 50px;">NATIONALITE</span>  <span style="margin-left: 50px;">DATE DE NAISS</span>
                <span>LIEU DE NAISSANCE {{ $cart->nom }}</span> <span style="margin-left: 90px;">DATE DE NAISS</span>
                <span>N° DOCUMENT</span> <span style=" margin-left:140px;">DATE EXPIR</span>
                </pre>
            </td>
        </tr>
    </table>
   
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>

 {{-- <div class="container-fluid bg-danger">
        <div class="row ">
           <div>
            <h4 style="font-family:Arial, sans-serif; text-align:center; font-size:large;">
                <span  ><img style="margin-right:80px; margin-top:5px; height:30px; width:100px" class="photo" src="assets/images/mali1.png" alt="" ></span>

                <span style="margin-right:140px; font-size:x-large; font-family:Verdana, Geneva, Tahoma, sans-serif;">REPUBLIQUE DU MALI</span>  <br>

                <small style="font-size:13px; font-size:small;">CARTE NATIONALE D'IDENTITE</small>
            </h4>
           </div>


             
                 

            <pre class="">
                <span  ><img style="height:120px; width:100px" class="photo" src="assets/images/mali1.png" alt="" ></span> <span>NOM</span> <span>Prenom</span>
                    
                    
                    <span>SEXE</span>  <span>NATIONALITE</span> <span >DATE DE NAISS</span>
                    <span>LIEU DE NAISSANCE</span>
                    <span>N° DOCUMENT</span> <span style=" margin-left:140px;">DATE EXPIR</span>
            </pre> 
        </div>
    </div> --}}


