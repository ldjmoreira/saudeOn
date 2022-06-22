<script src="assets/js/MenuMonitoramentos.js"> </script>
<style>

</style>
<main class="content w3-animate-opacity">

    <?php
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="mon-pac">
    <div class="mon-titulo">
        <h5>Monitor sinais vitais</h5>
    </div>
    <div class="caixa-padrao-conteudo2">
      <div class="monitoramento-novo">
      <div class="container-novo">
        <div class="box-container-novo-small">
          <div class="nome-up" id = "nomech">
          -- Medido em: 00/00/00 00:00:00
          </div>
        </div>
        <div class="box-container-novo">
          <div class="name-fc">
            FC
          </div>
          <div class="figure-fc">
            <img src="assets/img/fc2.png" width="83" height="74" >
          </div>
          <div class="string-fc"  id = "fcch">
              --
          </div>
          <div class="space-fc">
              BPM
          </div>
        </div>
        <div class="box-container-novo">
          <div class="name-pani">
            PANI
          </div>
          <div class="figure-pani">
            <img src="assets/img/pani2.png" width="83" height="78" >
          </div>
          <div class="string-pani"  id = "panich">
              --/--
          </div>
          <div class="space-pani">
              mmHg
          </div>
          <div class="space-pa-pani" id = "panich_bottom" onclick="callPaBottom2()" >
              PA
          </div>
        </div>
        <div class="box-container-novo">
          <div class="name-spo2">
            spo2
          </div>
          <div class="figure-spo2">
            <img src="assets/img/spo22.png" width="83" height="78" >
          </div>
          <div class="string-spo2"  id = "spo2ch">
              --
          </div>
          <div class="space-spo2">
              %
          </div>
          <div class="space-string2-spo2">
            --
          </div>
          <div class="spaces-spo2">
              ppm
          </div>
        </div>
        <div class="box-container-novo">
            <div class="name-resp">
              resp
            </div>
            <div class="figure-resp">
              <img src="assets/img/resp2.png" width="77" height="78" >
            </div>
            <div class="string-resp"  id = "respch">
                --
            </div>
            <div class="space-resp">
                RPM
            </div>
        </div>
        <div class="box-container-novo">
          <div class="name-temp">
            temp
          </div>
          <div class="figure-temp">
            <img src="assets/img/temp2.png" width="77" height="79" >
          </div>
          <div class="string-temp"  id = "tempch">
              --
          </div>
          <div class="space-temp">
              °C
          </div>
        </div>
      </div>
      </div>
    </div>
    </div>
   

    
   
</main>


<script src="assets/js/app.js"></script>
<script>
var toggle2 = 1;
var item2 = [];
//var strpath2 = window.location.href;
//var poss2 = strpath.indexOf("?");    /* Acha a ? interrogação, vai pegar o que tem depois */
var concent2 =<?= $data ?> ;
var k = 0.1;
var cont_timer = 0;
var concentrador = concent2; /* "###";           vai ser modificado despois por uma busca */


setInterval(function() {
  /*var toggle = 1;*/      
  
  /* document.getElementById("fname").value = concentrador; */

  var xhttp = new XMLHttpRequest();

  var inpObj = concentrador;
  var strreq = "http://<?= $ipUser1  ?>/sinaisvitais?";
  strreq = strreq + inpObj;
  xhttp.open("GET", strreq, true);
  cont_timer++;
  if (cont_timer >= 10) {
	  document.getElementById("nomech").innerHTML = "Servidor desconectado";
  }
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
    	  cont_timer = 0
	    if (item[3] == "--" && item[4] == "--" && item[5] == "--" && item[6] == "--" && item[7] == "--" && item[8] == " 0.0" ) {
	      document.getElementById("nomech").innerHTML = "Sensores desconectados";
	    } else {
        document.getElementById("nomech").innerHTML = item[0] + " Atualizado: " + item[1] + " " + item[2];	
      }   
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

function callPaBottom2(){
 
  var xhttp2 = new XMLHttpRequest();

  var inpObj2 = concentrador;

  var url = "http://<?= $ipUser[1] ?>/medirpa?";

      url = url + inpObj2;

      xhttp2.open("GET", url, true);

  xhttp2.onload = function() {	
    if (xhttp2.readyState == xhttp.DONE && xhttp.status == 200) {   
     // alert('funcionou');
    }else{
     // alert('nao funcionou funcionou');
     // document.getElementById("panich_bottom").innerHTML = "--";
    }
  }
  xhttp2.send();


}
</script>
</body>
</html>

