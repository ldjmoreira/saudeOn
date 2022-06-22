<script src="assets/js/MenuListaProgMedicamentos.js"> </script>
<main class="content w3-animate-opacity" >
<?php
include(TEMPLATE_PATH . "/messages.php");
?>

    
    
    <div class="caixa-lista-paciente">  
        <div class="caixa-lista-paciente-titulo">
            <?php renderTitle($title) ?>
            
        </div>
        <div class="caixa-lista-paciente-paciente">
            <a class="linkSem" href="?change=1">
                <h4> <i class="icofont-ui-user mr-3"></i><?= $pacInfo->name?> <i class="icofont-exchange"></i></h4>
            </a>
        </div>
        <div class="caixa-lista-paciente-conteudo">
        <div class="mb-4  posicao-form " >

    

                

                <div class="posicao-form-direita-2 mb-1">
                <i class="icofont-search-1 h4 mr-1 mt-3   text-secondary"></i>
                    <div class="form__group-2 field">
                        <input type="text" id='myInput' class="form__field w3-input" 
                        placeholder="buscar nome"required onkeyup="myFunction()" />
                        
                    </div>
                    
                </div>
            
            </div>

        
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                <?php

                    if (!empty($listadeMedicamentos)){
                        echo"   <th>Medicação</th>";
                        echo"   <th>Dosagem</th>";
                        echo"   <th>Intervalo</th>";
                        echo"   <th>Via</th>";  
                        echo"   <th>Data</th>"; 
                        echo"   <th>Hora</th>"; 


                    }else{
                        echo "<hr/>";
                        echo "<h3> <i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para esse paciente</h3>";}  
                ?>
                </thead>
                <tbody>
                    <?php     
                 
                        foreach($listadeMedicamentos as $medicamento): ?>
                        <tr>
                        <td><?= $medicamento->name ?></td>
                        <td><?= $medicamento->dose?></td>
                        <td><?php if($medicamento->intervalo < 60) { echo round($medicamento->intervalo/60,2 )." Horas";}elseif ($medicamento->intervalo == 60) {
                            echo round($medicamento->intervalo/60,2 )." Hora";
                        } else{echo round($medicamento->intervalo/60,0) ." Horas ". ($medicamento->intervalo%60 == 0 ? '':'e ' . $medicamento->intervalo%60 . "minutos" ) ;} ?></td>
                        <td><?= $medicamento->via?></td>

                        <td><?= $medicamento->data?></td>
                        <td><?= $medicamento->hora?></td>

                        </tr>
                        <?php endforeach ;

                    ?>

                </tbody>	
            </table>

            <div class="botao-footer2  mr-4 mb-4">
                    <button type="button" class="btn btn-primary ml-2" onclick="goBack();">voltar</button>
                </div>

        </div>
    </div>

    <div id="id01" class="w3-modal  w3-animate-opacity">
    <div class="w3-modal-content rounded w3-card-4" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

        <div id="Paris" class="w3-container mt-4">
        <hr>
            <h1>Deseja remover o registro selecionado?</h1>

        </div>


      <div class="w3-container rounded w3-border-top w3-padding-16 w3-light-grey">
       
        <a  id="img01" class="btn btn-success btn-lg ">
            Sim
        </a>    
        <a class="btn btn-danger btn-lg " onclick="document.getElementById('id01').style.display='none'">
            Não
        </a>       
    </div>


    </div>
  </div>
    
</main>
<script>

function myDeletes(event,elmnt,clr) {
    event.preventDefault()
    document.getElementById("id01").style.display = "block";
    document.getElementById("img01").href = elmnt.href;
}
</script>
<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/cuidador.js"></script>
<script src="assets/js/footer.js"></script>
</body>
</html>