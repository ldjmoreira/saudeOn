
<script src="assets/js/MenuListaPaciente.js"> </script>
<main class="content w3-animate-opacity">
    <?php   
    include(TEMPLATE_PATH . "/messages.php");
    foreach($lista_dividida as $pacientes): 

    ?>
    
    
    <div class="caixa-lista-paciente">  
        <div class="caixa-lista-paciente-titulo">
            <h4>Concentrador n:<?=  $pacientes[0]['numero'] ?> </h4>
        </div>
        <div class="caixa-lista-paciente-conteudo">
        <div class="mb-4  posicao-form " >
                <div class="posicao-form-esquerda ">
    

                
                </div>
                <div class="posicao-form-direita mb-1">

                    
                </div>
            
            </div>

        
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                    <th>ID Paciente2</th>
                    <th>Nome</th>
                    <th>Sensor</th>
                    <th>Ações rapidas</th>
                </thead>
                <tbody>
                <tr>
                        <?php  foreach($pacientes as $pac): ?>
                        <tr>
                            <td><?= $pac['concentrador']  ? $pac['concentrador'] : "Sem identificação"; ?></td>
                            <td><?= $pac['name']  ? $pac['name'] : "Sem identificação"; ?></td>
                            <td><?= $pac['sensor']  ? $pac['sensor'] : "Sem identificação"; ?></td>
                            <td>
                                <a href="novoPaciente.php?view=<?= $paciente->id ?>" 
                                    class="btn btn-warning rounded-circle   mr-2">
                                    <i class="icofont-ui-search"></i>
                                </a>
                                <a href="novoPaciente.php?update=<?= $paciente->id ?>" 
                                    class="btn btn-warning rounded-circle   mr-2">
                                    <i class="icofont-edit"></i>
                                </a>  
                            </td>
                        </tr>
                        <?php endforeach ?>



                </tr>





                        
                    

                </tbody>	
            </table>
        </div>
    </div>
    <?php endforeach ?>
    <div id="id01" class="w3-modal  w3-animate-opacity">
    <div class="w3-modal-content rounded w3-card-4" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

        <div id="Paris" class="w3-container mt-4">
        <hr>
            <h1>Deseja remover o paciente cadastrado do registro?</h1>

        </div>


      <div class="w3-container rounded w3-border-top w3-padding-16 w3-light-grey">
       
    
        <a class="btn btn-danger btn-lg " onclick="document.getElementById('id01').style.display='none'">
            Não
        </a>     
        <a  id="img01" class="btn btn-success btn-lg ">
            Sim
        </a>  
    </div>


    </div>
  </div>


    
</main>
<script>
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
</script>
<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>