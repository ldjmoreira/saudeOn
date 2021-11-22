
/*(function () {
    const menuToggle = document.querySelector('.menu-toggle')
    menuToggle.onclick = function (e) {
        const body = document.querySelector('body')
        body.classList.toggle('hide-sidebar')
        
    }
    const paciente = document.querySelector('.menu-paciente')
    paciente.onclick = function (e) {
        
    }
})// não esta em uso
*/
/*
function activateClock(){
    const activeClock = document.querySelector('[active-clock]')

    if(!activeClock) return

    function addOneSecond(hours, minutes, seconds) {
        const d = new Date()
        d.setHours(parseInt(hours))
        d.setMinutes(parseInt(minutes))
        d.setSeconds(parseInt(seconds) + 1)
    
        const h = `${d.getHours()}`.padStart(2, 0)
        const m = `${d.getMinutes()}`.padStart(2, 0)
        const s = `${d.getSeconds()}`.padStart(2, 0)
    
        return `${h}:${m}:${s}`
    }

    setInterval(function(){
        //'07:27:19' =>['07','27','19']
        const parts = activeClock.innerHTML.split(':')
       // activeClock.innerHTML = addOneSecond(parts[0],parts[1],parts[2])
        activeClock.innerHTML = addOneSecond(...parts) // tambem funciona!
    },1000)
 
} // não em uso

activateClock() // não em uso
*/
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
    // changes clases
    function class_change(params,string_replace,string_normal) {
      for(let elem of params) {
        if (elem.className.indexOf(string_replace) == -1) {
          //elem.className = elem.className.replace(string_name,string_replace);
          
        } else { 
          elem.className = elem.className.replace(string_replace,string_normal);
        }
      }
    }
    // toggle classes
    function class_toggle_cls(params,string_replace) {
      if (params.className.indexOf(string_replace) == -1) {
       // params.className = params.className.replace(string_name,string_replace);
        
      } else { 
        params.className = params.className.replace(string_replace,"icofont-simple-down");
      }
    }
    function class_toggle_close(params,string_replace) {
      for(let elem of params) {
        if (elem.className.indexOf(string_replace) == -1) {
          //elem.className = elem.className.replace(string_name,string_replace);
          
        } else { 
          elem.className = elem.className.replace(string_replace,"w3-hide");
        }
      }
    }
    function class_add_toggle_cls(params,string_name) {
      for(let elem of params) {
        if (elem.className.indexOf(string_name) == -1) {
          //elem.classList.add(string_name);
          // e.previousElementSibling.className += " w3-green";
          } else { 
            elem.className = elem.className.replace(string_name, "");
          //  e.previousElementSibling.className = 
          //  e.previousElementSibling.className.replace(" w3-green", "");
        }
      }
    }
  function menu_close(var_1,var_2,var_3,var_4){
  const var_11=["_nav-item-monitoramento","_nav-item-paciente",
  "_nav-item-agenda","_nav-item-atencaoDom","_nav-item-administrativo",]
  const var_22=["ico-monitoramento","ico-paciente","ico-agenda","ico-atencaoDom","ico-adm"]
  const var_33=["nav-monitoramento-filho","_nav-paciente-filho","nav-agenda-filho","nav-atencao-filho","_nav-administrativo-filho"]
  const var_44=["nav-monitoramento-filho","_nav-paciente-filho","nav-agenda-filho","nav-atencao-filho","_nav-administrativo-filho"]
    
    for(i in var_22) {
        if(var_22[i] != var_2 ){
        btnUpPaciente = document.getElementById(var_22[i]);//seta
        class_toggle_cls(btnUpPaciente,"icofont-simple-up");
      }
    }

    for(i in var_44) {
      if(var_44[i] != var_4 ){
      proprerty_ = document.getElementsByClassName(var_44[i]);//desaparecer filhos
      class_toggle_close(proprerty_,"w3-show");
      }}
      for(i in var_11) {
        if(var_11[i] != var_1 ){
        btnPacienteCor1 = document.getElementsByClassName(var_11[i]);//cor pai
        class_add_toggle_cls(btnPacienteCor1,"verde-92D050");
        }}
        for(i in var_33) {
          if(var_33[i] != var_3 ){ 
          btnPacienteCor1 = document.getElementsByClassName(var_33[i]);//cor filho
          class_add_toggle_cls(btnPacienteCor1,"verde-568132");
          }}
  }

  function drop_monitoramento(var_1,var_2,var_3,var_4) {

    menu_close(var_1,var_2,var_3,var_4);

    btnUpPaciente = document.getElementById("ico-monitoramento"); // seta
   class_toggle_by_id(btnUpPaciente,"icofont-simple-down","icofont-simple-up");

    proprerty_ = document.getElementsByClassName("nav-monitoramento-filho");
   class_toggle(proprerty_,"w3-hide","w3-show");



   btnPacienteCor1 = document.getElementsByClassName("_nav-item-monitoramento");
   class_add_toggle(btnPacienteCor1,"verde-92D050");
   
    btnPacienteCor1 = document.getElementsByClassName("nav-monitoramento-filho");
   class_add_toggle(btnPacienteCor1,"verde-568132");
            
}
function drop_paciente(var_1,var_2,var_3,var_4) {

  menu_close(var_1,var_2,var_3,var_4);

    var btnUpPaciente = document.getElementById("ico-paciente");//seta
    class_toggle_by_id(btnUpPaciente,"icofont-simple-down","icofont-simple-up");

    var proprerty_ = document.getElementsByClassName("_nav-paciente-filho");//_demoAcc
    class_toggle(proprerty_,"w3-hide","w3-show");//show e hide dos filhos

    var btnPacienteCor1 = document.getElementsByClassName("_nav-item-paciente");
    class_add_toggle(btnPacienteCor1,"verde-92D050");//verde forte do pai
    
    var btnPacienteCor1 = document.getElementsByClassName("_nav-paciente-filho");
    class_add_toggle(btnPacienteCor1,"verde-568132");//verde fraco dos filhos
             
}



function drop_agenda(var_1,var_2,var_3,var_4) {

  menu_close(var_1,var_2,var_3,var_4);

  var btnUpPaciente = document.getElementById("ico-agenda");
  class_toggle_by_id(btnUpPaciente,"icofont-simple-down","icofont-simple-up");

  var proprerty_ = document.getElementsByClassName("_filho nav-agenda-filho");//aparecerFilhos
  class_toggle(proprerty_,"w3-hide","w3-show");

  var btnPacienteCor1 = document.getElementsByClassName("_nav-item-agenda");//cor
  class_add_toggle(btnPacienteCor1,"verde-92D050");
  
  var btnPacienteCor1 = document.getElementsByClassName("nav-agenda-filho");
  class_add_toggle(btnPacienteCor1,"verde-568132");

}
function drop_atencaoDom(var_1,var_2,var_3,var_4) {

  menu_close(var_1,var_2,var_3,var_4);

  var btnUpPaciente = document.getElementById("ico-atencaoDom");//seta
  class_toggle_by_id(btnUpPaciente,"icofont-simple-down","icofont-simple-up");

  var proprerty_ = document.getElementsByClassName("nav-atencao-filho");//aparecerFilhos
  class_toggle(proprerty_,"w3-hide","w3-show");

  var btnPacienteCor1 = document.getElementsByClassName("_nav-item-atencaoDom");//cor
  class_add_toggle(btnPacienteCor1,"verde-92D050");
  
  var btnPacienteCor1 = document.getElementsByClassName("nav-atencao-filho");//cor
  class_add_toggle(btnPacienteCor1,"verde-568132");

}
function drop_adm(var_1,var_2,var_3,var_4) {

  menu_close(var_1,var_2,var_3,var_4);

  var btnUpPaciente = document.getElementById("ico-adm");
  class_toggle_by_id(btnUpPaciente,"icofont-simple-down","icofont-simple-up");

  var proprerty_ = document.getElementsByClassName("_nav-administrativo-filho");
  class_toggle(proprerty_,"w3-hide","w3-show");

  var btnPacienteCor1 = document.getElementsByClassName("_nav-item-administrativo");
  class_add_toggle(btnPacienteCor1,"verde-92D050");

  
  var btnPacienteCor1 = document.getElementsByClassName("_nav-administrativo-filho");
  class_add_toggle(btnPacienteCor1,"verde-568132");
   
}

function selectx() {
 alert("ola!")
  var  btnUpPaciente = document.getElementById("ico-monitoramento"); // seta
    class_toggle_by_id(btnUpPaciente,"w3-show","w3-hide");
  }



function openInNewTab(url) {
  var url2= "http://192.168.1.7:81/ListaPaciente.php";
  var win = window.open(url2, '_blank');
  win.focus();
}

