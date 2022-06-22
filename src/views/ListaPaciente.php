
<script src="assets/js/MenuListaPaciente.js"> </script>
<main class="content w3-animate-opacity">
    <?php   
    include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="caixa-lista-paciente">  
        <div class="caixa-lista-paciente-titulo">
            <h3>Cadastro de pacientes</h3>
        </div>
        <div class="caixa-lista-paciente-conteudo">
        <div class="mb-4  posicao-form " >
                <div class="posicao-form-esquerda ">
    
                <a class="registro posicao-form-esquerda" ´
                href="novoPaciente.php"> 
                <i class="icofont-plus-circle h4 mt-1   mr-2 "></i> 
                <h4>Adicionar novo registro </h4>
                </a>
                
                </div>
                <div class="posicao-form-direita mb-1">
                <i class="icofont-search-1 h4 mr-1 mt-3   text-secondary"></i>
                    <div class="form__group field">
                        <input type="text" id='myInput' class="form__field w3-input" 
                        placeholder="buscar nome"required onkeyup="myFunction()" />
                        <label for="myInput" class="form__label">Buscar nome</label>
                    </div>
                    
                </div>
            
            </div>

        
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                    <th>ID Paciente</th>
                    <th>Nome</th>
                    <th>Data de admissão</th>
                    <th>Prontuário</th>
                    <th>Ações rapidas</th>
                </thead>
                <tbody>
                    <?php


                    foreach($listasPaciente as $paciente): ?>
                        <tr>
                        <td><?= $paciente->concentrador  ? $paciente->concentrador : "Sem identificação"; ?></td>
                        <td><?= $paciente->name ?></td>
                        <td><?= $paciente->dataAdmissao?></td>
                        <td><?= $paciente->prontuario ?></td>
                        
                        <td>
                            <a href="novoPaciente.php?view=<?= $paciente->id ?>" 
                                class="btn btn-warning rounded-circle mr-2">
                                <i class="icofont-ui-search"></i>
                            </a>
                            <a href="novoPaciente.php?update=<?= $paciente->id ?>" 
                                class="btn btn-warning rounded-circle mr-2">
                                <i class="icofont-edit"></i>
                            </a>
                            <a id="myDelete" href="?delete=<?= $paciente->id ?>&concentrador=<?= $paciente->concentrador ?>" onclick="myDeletes(event,this,<?= $paciente->id ?>)"
                                class="btn btn-danger rounded-circle  mr-2">
                                <i class="icofont-error"></i>
                            </a>
                        
                        </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>	
            </table>
        </div>
    </div>

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