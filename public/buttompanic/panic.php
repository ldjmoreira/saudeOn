<?php
//Constantes gerais
//inside
define('IP_PAGINA_IN', '192.168.1.7:81');//[0]
define('IP_SERVIDOR_IN', '192.168.1.7:8401');//[1]

//outside
define('IP_PAGINA_OUT', 'saudeon.com:81');//[0]
define('IP_SERVIDOR_OUT', 'saudeon.com:8401');//[1]
function checkIP(){ 
    $strIP=[];
  $pieces = explode(".", $_SERVER['REMOTE_ADDR']);
  if($pieces[0] =="10" || $pieces[0] =="127"){
      $strIP[0] = IP_PAGINA_IN;
      $strIP[1] = IP_SERVIDOR_IN;
      return  $strIP;
  }elseif($pieces[0] =="172" && $pieces[1] =="16"){
      $strIP[0] = IP_PAGINA_IN;
      $strIP[1] = IP_SERVIDOR_IN;
      return  $strIP;
  }elseif($pieces[0] =="192" && $pieces[1] =="168"){
      $strIP[0] = IP_PAGINA_IN;
      $strIP[1] = IP_SERVIDOR_IN;
      return  $strIP;            
  }else{
      $strIP[0] = "IP_PAGINA_OUT";
      $strIP[1] = "IP_SERVIDOR_OUT";
      return  $strIP;   
  }

}

$ipUser = checkIP();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/icofont.min.css">
        <link rel="stylesheet" href="css/template.css">
        <link rel="stylesheet" href="css/comum.css">
        <title>botao reconhecer</title>
        <style>

        </style>
    </head>
    <body>
        <nav class="menu mt-3" id="corMenu">
            <ul class="nav-list">
                <li class="nav-item _nav-item-ciencia"> 
                    <a >
                        <i class="icofont-alarm"></i>
                        <div class="lateral-nome">
                            &nbspReconhecer Emergência2
                        </div>          
                    </a>
                </li>
            </ul>
        </nav>

<audio id="myAudio">
  <source src="Beep_Sensor.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
      
    </body>
                <script>
                var toggle = 1;
                var item = [];
                  item[0] = "0";
                var strpath = window.location.href;
                var poss = strpath.indexOf("?");    /* Acha a ? interrogação, vai pegar o que tem depois */
                var bip = document.getElementById("myAudio");

                function displayResult2() {}  
                  
/*

               function displayResult2() {
                  var xhttp = new XMLHttpRequest();
                  var strreq = "http://127.0.0.1:8401/reconhecer?";
                  strreq = strreq + item[0];
                  xhttp.open("POST", strreq, true);
                  xhttp.send();
                }
*/

        setInterval(function() {
     
        var xhttp = new XMLHttpRequest();// objeto
        var strreq = "http://<?= $ipUser[1] ?>/testeocorrenciapanico?"; //1.20:84 // fora giize
         var inpobj;
         if (poss == -1) { inpobj = "0"; } else {inpobj = strpath.substring(poss+1);}  /* Adiciona número do profissional */
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
    
</html>

