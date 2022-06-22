


<main class="content w3-animate-opacity">
    <?php   
    include(TEMPLATE_PATH . "/messages.php");
    ?>


    
    
    <div class="caixa-lista-paciente">  
        <div class="caixa-lista-paciente-titulo">
            <h3>Lista de pacientes em emergência</h3>
        </div>
        <div class="caixa-lista-paciente-conteudo">
            <div class="mb-4 mr-3 posicao-form " >
                <div class="form__group field">
                <input type="text" id='myInput' class="form__field w3-input" 
                    placeholder="buscar nome"required onkeyup="myFunction()" />
                    <label for="myInput" class="form__label">buscar nome</label>

                    
                </div>

            </div>
            
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                <?php  
                if(sizeof($listasPacPan))
                {
                  echo"  <th>ID Paciente</th>";
                  echo"  <th>Nome</th>";
                  echo"   <th>Contato</th>";
                  echo"   <th>Prontuário</th>";
                  echo"   <th>Situação</th>";
                  echo"   <th>Ações rápidas</th>";
                }else{
                    echo "<hr/>";
                    echo "<h3><i class='icofont-exclamation-circle h2'></i> Não há pacientes em emergência</h3>";}
                ?>
                </thead>
                <tbody>
                    <?php

                        foreach($listasPacPan as $paciente): ?>
                        <tr>
                            
                        <td><?= $paciente->concentrador ?></td>
                        <td><?= $paciente->name ?></td>
                        <td><?= $paciente->telContato?></td>
                        <td><?= $paciente->prontuario ?></td>
                        <td><?= $paciente->descricao ?></td></td>
                        <td>
                            <a  href="?update=<?= $paciente->id ?>&concentrador=<?= $paciente->concentrador ?>" 
                                class="btn btn-warning  mr-2">Reconhecer emergência
                                <i class="icofont-edit"></i>
                            </a>                       
                        </td>
                        </tr>
                    
                        <?php endforeach ?>
                

                </tbody>	
            </table>
        </div>
    </div>


    
</main>
<script>
  

</script>

<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>