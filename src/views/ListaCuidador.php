<script src="assets/js/MenuListaCuidador.js"> </script>

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
                <div class="posicao-form-esquerda ">
    
                <a class="registro posicao-form-esquerda" 
                href="Cuidador.php"> 
                <i class="icofont-plus-circle h4 mt-1   mr-2 "></i> 
                <h4>Adicionar novo registro </h4>
                </a>
                
                </div>
                <div class="posicao-form-direita mb-1">
                <i class="icofont-search-1 h4 mr-1 mt-3   text-secondary"></i>
                    <div class="form__group field">
                        <input type="text" id='myInput' class="form__field w3-input" 
                        placeholder="buscar nome"required onkeyup="myFunction()" />
                        
                    </div>
                    
                </div>
            
            </div>

            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                <?php
                    if (!empty($listasCuidador)){
                        echo"   <th>Nome</th>";
                        echo"   <th>E-mail</th>";
                        echo"   <th>Telefone de contato</th>";
                        echo"   <th>Disponibilidade</th>"; 
                        echo"   <th>Ação</th>";  


                    }else{
                        echo "<hr/>";
                        echo "<h3><i class='icofont-exclamation-circle h2'></i> Não há cuidadores cadastrado para esse paciente</h3>";}  
                ?>
                </thead>
                <tbody>
                    <?php     
                 
                        foreach($listasCuidador as $cuidador): ?>
                        <tr>
                        <td><?= $cuidador->name ?></td>
                        <td><?= $cuidador->email?></td>
                        <td><?= $cuidador->telContato ?></td>
                        <td><?= $cuidador->disponibilidade ?></td>
                        <td>
                        <a href="Cuidador.php?view=<?= $cuidador->id?>" 
                                class="btn btn-warning rounded-circle mr-2 ">
                                <i class="icofont-list"></i>
                        </a>
                        <a href="Cuidador.php?update=<?= $cuidador->id?>" 
                                class="btn btn-warning rounded-circle ">
                                <i class="icofont-edit"></i>
                        </a>
                        <a id="myDelete" href="?delete=<?= $cuidador->id?>" onclick="myDeletes(event,this,<?= $cuidador->id?>)"
                            class="btn btn-danger ml-2 rounded-circle ">
                            <i class="icofont-close"></i>
                        </a>
                        </td>
                        </tr>
                        <?php endforeach ;

                    ?>

                </tbody>	
            </table>
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
            <h1>Deseja remover o cuidador cadastrado ?</h1>

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
<script src="assets/js/apagar.js"></script>
<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/cuidador.js"></script>
</body>
</html>