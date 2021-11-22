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
function goBack() {
  window.history.back();
}