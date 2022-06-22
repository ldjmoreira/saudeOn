<script src="assets/js/MenuListaProfissional.js"> </script>
<main class="content w3-animate-opacity" >
<?php
include(TEMPLATE_PATH . "/messages.php");
?>

    
    
    <div class="caixa-lista-paciente">  
        <div class="caixa-lista-paciente-titulo">
            <?php renderTitle($title) ?>
            
        </div>

        <div class="caixa-lista-paciente-conteudo">
        <div class="mb-4  posicao-form " >
                <div class="posicao-form-esquerda ">
    
                <a class="registro posicao-form-esquerda" ´
                href="AgendaProf.php"> 
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

        
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                <?php
                    if (!empty($listaProfissionais)){
                        echo"   <th>Paciente</th>";
                        echo"   <th>Motivo da visita</th>";
                        echo"   <th>Data</th>";
                        echo"   <th>Ação</th>";  


                    }else{
                        echo "<hr/>";
                        echo "<h2> <i class='icofont-exclamation-circle h2'></i> Não há informação cadastrada na lista</h2>";}  
                ?>
                </thead>
                <tbody>
                    <?php     
                 
                        foreach($listaProfissionais as $Profissional): ?>
                        <tr>
                        <td><?= $Profissional->name?></td>
                        <td><?= $Profissional->motivoVisita?></td>
                        <td><?= $Profissional->dataInicial ?></td>
                        <td>
                        <a href="AgendaProf.php?view=<?= $Profissional->id?>" 
                                class="btn btn-warning rounded-circle mr-2 ">
                                <i class="icofont-list"></i>
                        </a>
                        <a href="AgendaProf.php?update=<?= $Profissional->id?>" 
                                class="btn btn-warning rounded-circle ">
                                <i class="icofont-edit"></i>
                        </a>
                        </td>
                        </tr>
                        <?php endforeach ;

                    ?>

                </tbody>	
            </table>
        </div>
    </div>


    
</main>

<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/cuidador.js"></script>
</body>
</html>