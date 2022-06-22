function mySelect() {
 
  var x = document.getElementById("tipo").value;

  if(x == '2') {
    
        document.getElementById("unidade").value = "mm Hg";
    }else if (x == '3') {
        document.getElementById("unidade").value = "BPM";
    }else if (x == '4') {
        document.getElementById("unidade").value = "°C";
    }else if (x == '5') {
      document.getElementById("unidade").value = " ver";
    }else if (x == '6') {
      document.getElementById("unidade").value = "IRMP";
    }else if (x == '7') {
      document.getElementById("unidade").value = "mm Hg";
  }

  
}