
    function pas_visibl2() {

        let valueSelected  =$("#ddia").val()
        console.log(valueSelected)
        if(valueSelected == 2 ){
            proprerty2 = document.getElementsByClassName("_demoMon56");
            class_toggle_right(proprerty2,"w3-hide","w3-show");
        }else if (valueSelected == 1){
            proprerty2 = document.getElementsByClassName("_demoMon56");
            class_toggle_right(proprerty2,"w3-show","w3-hide");
        }

    }
function pas_visibl() {

proprerty_ = document.getElementsByClassName("_demoMon2");
class_toggle(proprerty_,"w3-hide","w3-show2");


 }

