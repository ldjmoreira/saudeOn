//document.getElementById("myDelete").addEventListener("click", function(event){
//  event.preventDefault()
  //document.getElementById("img01").href = element.href;
 // document.getElementById("id01").style.display = "block";
//});
function myDeletes(event,elmnt,clr) {
    event.preventDefault()
    document.getElementById("id01").style.display = "block";
    document.getElementById("img01").href = elmnt.href;
}