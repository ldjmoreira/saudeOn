(function () {
  
  let footer_visibility = document.getElementById("footer-vis");
  class_toggle_by_id(footer_visibility ,"","w3-hide");
})()

function class_toggle_by_id(params,string_name,string_replace) {
  if (params.className.indexOf(string_replace) == 1) {
    params.className = params.className.replace(string_replace,string_name);
    
  } else { 
    params.className = params.className.replace(string_replace,string_name);
  }
}

function doPreview()
{
  form=document.getElementById('idOfForm');
  form.submit();
}
function doPreview2()
{

  console.log('algo')
  console.log($("#ddia").val())
  console.log($("#duracao").val())
  if($("#ddia").val() == 2 && $("#duracao").val() == ''){
    if($("#duracao").val() == 0){
      alert("0 não é uma quantidade de dias válido")
    }
    alert("Vc selecionou a opção Dias. por favor, coloque a quantidade de dias")
  }else {
    
    form=document.getElementById('idOfForm');
    form.submit();
    
  }

}
function goBack() {
  window.history.back();
}
