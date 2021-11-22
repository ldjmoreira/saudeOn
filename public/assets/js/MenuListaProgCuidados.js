(function () {


  var btnUpPaciente = document.getElementById("ico-agenda");
  class_toggle_by_id(btnUpPaciente,"icofont-simple-down","icofont-simple-up");

  var proprerty_ = document.getElementsByClassName("_filho nav-agenda-filho");//aparecerFilhos
  class_toggle(proprerty_,"w3-hide","w3-show");

  btnPacienteCor1 = document.getElementsByClassName("_nav-item-agenda");//cor
  class_add_toggle(btnPacienteCor1,"verde-92D050");
  
  var btnPacienteCor1 = document.getElementsByClassName("nav-agenda-filho");
  class_add_toggle(btnPacienteCor1,"verde-568132");
     
    var proprerty_ = document.getElementsByClassName("_demoAgn3");//aparecerFilhos
    class_change(proprerty_,"lateral-lista-pacienteSel","lateral-lista-paciente");
    
})()

function class_toggle_by_id(params,string_name,string_replace) {
    if (params.className.indexOf(string_replace) == -1) {
      params.className = params.className.replace(string_name,string_replace);
      
    } else { 
      params.className = params.className.replace(string_replace,string_name);
    }
  }

  function class_add_toggle(params,string_name) {
    for(let elem of params) {
      if (elem.className.indexOf(string_name) == -1) {
        elem.classList.add(string_name);
        // e.previousElementSibling.className += " w3-green";
        } else { 
          elem.className = elem.className.replace(string_name, "");
        //  e.previousElementSibling.className = 
        //  e.previousElementSibling.className.replace(" w3-green", "");
      }
    }
  }
    function class_toggle(params,string_name,string_replace) {
      for(let elem of params) {
        if (elem.className.indexOf(string_replace) == -1) {
          elem.className = elem.className.replace(string_name,string_replace);
          
        } else { 
          elem.className = elem.className.replace(string_replace,string_name);
        }
    }
  }

  function class_change(params,string_replace,string_normal) {
    for(let elem of params) {
      if (elem.className.indexOf(string_replace) == -1) {
        //elem.className = elem.className.replace(string_name,string_replace);
        elem.className = elem.className.replace(string_normal,string_replace);
      } else { 
        
      }
    }
  }



  