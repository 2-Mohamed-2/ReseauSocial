
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
    <div class="container-fluid bg-danger">
        <div class="row ">
           <div>
            <h4 style="font-family:Arial, sans-serif; text-align:center; font-size:large;">
                <span  ><img style="margin-right:80px; margin-top:5px; height:30px; width:100px" class="photo" src="assets/images/mali1.png" alt="" ></span>

                <span style="margin-right:140px; font-size:x-large; font-family:Verdana, Geneva, Tahoma, sans-serif;">REPUBLIQUE DU MALI</span>  <br>

                <small style="font-size:13px; font-size:small;">CARTE NATIONALE D'IDENTITE</small>
            </h4>
           </div>

             <div class="">
                 <span  ><img style="margin-right:80px; margin-top:5px; height:30px; width:100px" class="photo" src="{{ asset('storage/'.$cart->photo) }}" alt="" ></span> 

                <div style=" margin-left:245px;">
                    <span>NOM</span><br>
                    <div style="margin-bottom: 12px; font-size:15px;"></div>
                </div>
    
                <div style=" margin-left:245px;">
                    <span>Prenom</span>
                </div>
    
                <div style=" margin-left:245px;">
                    <span>SEXE</span>  <span style=" margin-left:50px;">NATIONALITE</span> <span style=" margin-left:50px;">DATE DE NAISS</span>
                </div>
    
                <div style=" margin-left:245px;">
                    <span>LIEU DE NAISSANCE</span>
                </div>
    
                <div style=" margin-left:245px;">
                    <span>N° DOCUMENT</span> <span style=" margin-left:140px;">DATE EXPIR</span>
                </div>
            </div> 

        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>


