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

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  position: absolute;
  text-align: center;
  font-size: 38.4pt;
  line-height: 115%;
  font-family: "Courier";
}

.nome-up {
  position: absolute;
  top: 0.2%;
  left: 2%;
  font-size: 13.6pt;
  color: #00FF00;
}


.bottom-left {
  position: absolute;
  top: 13%;
  left: 40%;
  color: #00FF50;
}

.top-left {
  position: absolute;
  top: 31.4%;
  left: 40%;
  color: #C800B4;
}

.top-right {
  position: absolute;
  top: 49.9%;
  left: 40%;
  color: #00B4C8;
}

.bottom-right {
  position: absolute;
  top: 67%;
  left: 40%;
  color: #B4C800;
}

.centered {
  position: absolute;
  top: 85%;
  left: 40%;
  color: white;
}
.myCanvaspos {
  position: absolute;
  top: 43%;
  left: 66%;
}
</style>
</head>
<body>
<!-- <p id="debug" style="color:red;font-size:130%;" >QQQQ</p> -->
<b>
<div class="container">
  <img src="imagens/telaprincipal2.png" width="590" height="520" >
  <div class="nome-up"  id = "nomech">-- Medido em: 00/00/00 00:00:00</div>
  <div class="bottom-left"  id = "fcch" >--</div>
  <div class="top-left"  id = "panich">--/--</div>
  <div class="top-right" id = "spo2ch">--</div>
  <div class="bottom-right" id = "respch">--</div>
  <div class="centered" id = "tempch">--</div>
  <div class="myCanvaspos" ><canvas id="myCanvas" width="185" height="95" ></div>
</div>
</b>

</body>


<script>
var toggle = 1;
var item = [];
var strpath = window.location.href;
var poss = strpath.indexOf("?");    /* Acha a ? interrogação, vai pegar o que tem depois */
var concent = strpath.substring(poss+1);
var k = 0.1;

var concentrador = concent; /* "###";           vai ser modificado despois por uma busca */


setInterval(function() {
  /*var toggle = 1;*/      
  
  /* document.getElementById("fname").value = concentrador; */

  var xhttp = new XMLHttpRequest();

  var inpObj = concentrador;
  var strreq = "http://<?= $ipUser[1] ?>/sinaisvitais?";
  strreq = strreq + inpObj;
  xhttp.open("GET", strreq, true);
  xhttp.onload = function() {	
    if (xhttp.readyState == xhttp.DONE && xhttp.status == 200) {      
      var i,po;      
      var varstr = xhttp.responseText;      
      for (i = 0; i < 195; i++ ) {        
        pos = varstr.indexOf("-");        
        if (pos == -1) {           
          item[i] = varstr;
          break;        
        }        
        item[i] = varstr.substring(0,pos);       /* A posição final não está incluida na string */
        if (item[i] == "0" && i < 11) item[i] = "--";
        varstr = varstr.substring(pos+1);
        if (varstr.length==0) break;      
      } 	   
    /*  document.getElementById("datach").innerHTML = item[1];	   */
      document.getElementById("nomech").innerHTML = item[0] + " Atualizado: " + item[1] + " " + item[2];	   
      document.getElementById("fcch").innerHTML   = item[3];	   
      document.getElementById("panich").innerHTML = item[4] + "/" + item[5];	   
      document.getElementById("spo2ch").innerHTML = item[6];	   
      document.getElementById("respch").innerHTML = item[7];	  
      document.getElementById("tempch").innerHTML = item[8];

      var c = document.getElementById("myCanvas");
      var ctx = c.getContext("2d");
      ctx.beginPath();                        /* width="185" height="95" */
      ctx.strokeStyle = "#00B4C8";
      ctx.clearRect(0, 0, 185, 95);
     /* ctx.moveTo(0,95);   */
     /* ctx.lineTo(185, 0); */
      var i;
      for (i=0; i<185; i++) {
        ctx.moveTo(i, 95);
        ctx.lineTo(i, 95 - item[i+11]);
	  }
      ctx.stroke();
	}
  }; 
/*   
  if (toggle == 0 && item[9] == "1" ) {  
    document.getElementById("panicoch").innerHTML = "[PÂNICO]"; toggle = 1;  
  } else {     
    document.getElementById("panicoch").innerHTML = ""; 
    toggle = 0;      
  }
*/
/*  document.getElementById("debug").innerHTML = strpath + " " + concent; */
  xhttp.send();
}, 2000);
</script>
</html> 
