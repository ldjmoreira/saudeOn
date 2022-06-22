
function slcOcorrencia()
{
  form=document.getElementById('ocSelect');
  form.submit();
}


function slcGrafico(event)
{
  event.preventDefault()
  if($( "#desenho" ).val() == 0) {
    $( "#desenho" ).val(1);

    
  }else {
    $( "#desenho" ).val(0);

    
  }
  form=document.getElementById('ocSelect');
  form.submit();
  
}

