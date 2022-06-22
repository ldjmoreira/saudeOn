<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/w3Style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <link rel="stylesheet" href="assets/css/novopaciente.css">
    <link rel="stylesheet" href="assets/css/novopacientediag.css">
    <link rel="stylesheet" href="assets/css/listapaciente.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/monitoramento.css">
    <link rel="stylesheet" href="assets/css/evolucao.css">

    <link rel="stylesheet" href="assets/vendor/fullcalendar/main.min.css">
    <link rel="stylesheet" href="assets/css/calendar.css">

    <script src="assets/js/jquery.js"></script>

    <title>SaudeON</title>
</head>
<body>

    <header class="header">
        <div class="caixa-header">
            <div class="logo"></div>           
            <div class="area2">


                <div class="nodropdown">
                    <div class="perfil-button">
                        <a class="linkSem" href="?sound=1"> 
                        <div class="user-button">
                            
                        <i class= "<?= $_SESSION['icone'] ?>"></i>
                        </div>
                        </a>
                    </div>  
                </div>
                <?php if(isset($pacInfo)) {?>
                
                <div class="caixa-lista-area2-area2">
                        <div class="perfil-button">
                            <div class="user-button">
                                <i class="icofont-ui-user"></i>
                            </div>
                        </div>
                        <a class="linkSem mt-2" href="?change=1">
                        <h5>   <?= $pacInfo->name ?  $pacInfo->name  :  ' Não há paciente selecionado'?><h5> 
                        </a>
                </div>
                <?php } ?>
                <div class="area2-area2">




                    <div class="nodropdown">
                        <div class="perfil-button">
                            <div class="user-button">
                            <i class="icofont-user"></i>
                            </div>
                            <?= $user->name?>
                            <a class="no-style" href="logout.php">
                            <i class="icofont-logout ml-3 mr-2"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </header>
    <audio id="myAudio">
        <source src="assets/audio/Beep_Sensor.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <script>
        var toggle = 1;
        var item = [];
            item[0] = "0";
        var strpath = window.location.href;
        var poss = <?= $useInf ?>;    /* Acha a ? interrogação, vai pegar o que tem depois */
        var bip = document.getElementById("myAudio");

                   


        setInterval(function() {
     
        var xhttp = new XMLHttpRequest();
        var strreq = "http://<?= $ipUser1 ?>/testeocorrenciapanico?"; //1.20:84 // fora giize
         var inpobj;
         if (poss == -1) { inpobj = "0"; } else {inpobj = poss;}  /* Adiciona número do profissional */
        strreq = strreq + inpobj;

        xhttp.open("GET", strreq, true);
        xhttp.onload = function() {	
            if (xhttp.readyState == xhttp.DONE && xhttp.status == 200) {      
            var i,po;      
            var varstr = xhttp.responseText;
            item[0] = varstr;
      for (i = 0; i < 195; i++ ) {        
        pos = varstr.indexOf("-");        
        if (pos == -1) {           
          item[i] = varstr;
          break;        
        }        
        item[i] = varstr.substring(0,pos);       /* A posição final não está incluida na string */
        varstr = varstr.substring(pos+1);
        if (varstr.length==0) break;      
      } 	   
    
            }
        };    
        if (toggle == 0 && item[0] != "0" ) {  
            document.getElementById("corMenu").style.backgroundColor = "#FF5D5D";
            toggle = 1;  
            bip.play(); 
         } else {     
            document.getElementById("corMenu").style.backgroundColor = "#628C3F"; 
          toggle = 0;      
        }

        xhttp.send();
        }, 3000);


    </script>