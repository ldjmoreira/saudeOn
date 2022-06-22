<script src="assets/js/MenuListaConcentrador.js"> </script>
<main class="content w3-animate-opacity">
    <?php   
    include(TEMPLATE_PATH . "/messages.php");
    ?>
    <form action="#" method="post" id="idOfForm">

    <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>"> 

    <div class="caixa-lista-paciente">  
        <div class="caixa-lista-paciente-titulo">
            <h3>Lista de Concentradores</h3>
        </div>
        
        <div class="caixa-lista-paciente-conteudo">
            <div class="mb-4  posicao-form " >
                <div class="posicao-form-esquerda ">
    

                
                </div>
                <div class="posicao-form-direita mb-1">
                <i class="icofont-search-1 h4 mr-1 mt-3   text-secondary"></i>
                    <div class="form__group field">
                        <input type="text" id='myInput' class="form__field w3-input" 
                        placeholder="buscar nome"required onkeyup="myFunction()" />
                        
                    </div>
                    
                </div>
            
            </div>
        
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>

                    <th>Concentrador</th>
                    <th>Data de admissão</th>
                    <th>Ativo</th>
                    <th>Ações rápidas</th>
                </thead>
                <tbody>
                    <?php


                    foreach($listasConcentrador as $concentrador): ?>
                        <tr>

                        <td><?= $concentrador->numero ?></td>
                        <td><?= $concentrador->dataAdmissao?></td>
                        <td><?= $concentrador->ativo ? "Sim":"Não"?></td>
                        
                        <td>
                            <a href="EscolhidoConcentrador.php?update=<?= $concentrador->id ?>" 
                                class="btn btn-warning rounded-circle mr-2 ">
                                <i class="icofont-rounded-right"></i>
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
            <h1>Deseja remover o registro  cadastrado?</h1>

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


<script src="assets/js/apagar.js"></script>
<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>