
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Programação  de Medicamentos </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $infMedicamentos[0]->id ?>">
                        <input type="hidden" name="paciente" value="<?=    $pacInfo->id_pac      ?>">   
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
                        <input type="hidden" name="ciente" value="<?=    0      ?>">   
                        <input type="hidden" name="ativo" value="<?=    1     ?>"> 
                        <input type="hidden" name="lido" value="<?=    0     ?>"> 
                        <input type="hidden" name="button" value=""> 

                        <input type="hidden" id="progMedicamentos_aprazada" name="aprazada" value="<?=    $infMedicamentos[0]->aprazada   ?>"> 
          
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="medicamento_id">Medicamento</label>
                                <select name="medicamento_id" id="medicamento_id" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($medicamentos as $medicamento) {
                                            $selected = $medicamento->id === $infMedicamentos[0]->medicamento_id ? 'selected' : '';
                                            echo "<option value='{$medicamento->id}' {$selected} >{$medicamento->medicacaoEapresentacao  }</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['profissional'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="dose">Dose</label>
                                <input type="number" id="dose" name="dose"
                                    class="form-control <?= $errors['dose'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infMedicamentos[0]->dose ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['dose'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="via">Via</label>
                                <select name="via" id="via" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     
                                        $escolhas=['Oral','Sublingual','Retal','Parenteral','Intradérmica',
                                        'Subcutânea','Intramuscular','Endovenosa','Respiratória'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $infMedicamentos[0]->via ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['via'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="intervalo">Intervalo</label>
                                <select name="intervalo" id="intervalo" class="form-control <?= $errors['intervalo'] ? 'is-invalid' : '' ?>" >
                                <option value="">Selecione o intervalo</option>
                                    <?php
                                    
                                        $escolhas=[0 => "Única vez",5 =>"5 minutos",6 =>"6 minutos",10 =>"10 minutos",12 =>"12 minutos",
                                        15 =>"15 minutos",20 =>"20 minutos",30 =>"30 minutos",60 =>"1 hora",120=>"2 horas",
                                        180 =>"3 horas",240 =>"4 horas",360 =>"6 horas",480 =>"8 horas",720 =>"12 horas",
                                        1440 =>"Diaramente",2880 =>"A cada 2 dias"];
                                        $escolhaM=[];
                                        foreach($escolhas as $key => $value) {
                                            $selected = $key == $infMedicamentos[0]->intervalo  ? 'selected' : '';

                                            echo "<option value='{$key}' {$selected} >{$value}</option>";
                                        }
                                ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['intervalo'] ?>
                                </div>
                            </div>



                        </div>

                        <div class="form-row">


                        <div class="form-group col-md-8">
                                <label for="observacao">Observação</label>
                                <input type="text" id="observacao" name="observacao"
                                    class="form-control <?= $errors['observacao'] ? 'is-invalid' : '' ?>"
                                    value="<?=  html_entity_decode($infMedicamentos[0]->observacao)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['observacao'] ?>
                                </div>
                            </div>

                                <div class="form-group col-md-4 pt-4 pb-2">
                                    <div class=" w3-display-middle " style="width:100%">
                                        <button type="button" id="button_progMedicamentos"class="button-lor" onclick="pas_visibl(); clicked_button()">Aprazar</button>
                                    </div>
                                </div>

                        </div>

                        <div class="form-row _demoMon2 w3-hide ">



                            <div class="form-group col-md-4">
                                <label for="data">Data</label>
                                <input type="date" id="data" name="data"
                                    class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infMedicamentos[0]->data ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['data'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="hora">hora</label>
                                <input type="time" id="hora" name="hora"
                                    class="form-control <?= $errors['hora'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infMedicamentos[0]->hora ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['hora'] ?>
                                </div>
                            </div>


                        </div>
                            
                        


                        <div class="botao-footer2 mb-2 mr-4">
                        <button type="button" class="btn btn-primary ml-2" onclick="goBack();">voltar</button>
                    </div>


                
            </div>
            
        </div>
         
    </form>
    



</main>
    

<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/button_visible.js"></script>
<script>
    // A $( document ).ready() block.
$( document ).ready(function() {
  
  if($( "#progMedicamentos_aprazada" ).val() == 1){
        $("._demoMon2").removeClass("w3-hide");
        $("._demoMon2").addClass("w3-show2");
        $('#data').prop('readonly', true);
        $('#hora').prop('readonly', true);
    }

  $( "input[type=hidden][name=button]" ).val(0); 

  if($( "#data" ).hasClass( "is-invalid" ) == true) {
        $("._demoMon2").removeClass("w3-hide");
        $("._demoMon2").addClass("w3-show2");
  }

  if($( "#hora" ).hasClass( "is-invalid" ) == true) {
        $("._demoMon2").removeClass("w3-hide");
        $("._demoMon2").addClass("w3-show2");
  }

});
  $("#button_progMedicamentos").click(function(){
      if($( "input[type=hidden][name=button]" ).val() == 1){
        $( "input[type=hidden][name=button]" ).val(0); 
      }else {
        $( "input[type=hidden][name=button]" ).val(1); 
      }
    
  });  
</script>
</body>
</html>

    
