<script src="assets/js/MenuListaHistorico.js"> </script>
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

                    if (!empty($listaEmergencia)){
                        echo"   <th>Descrição</th>";
                        echo"   <th>Data da emergência</th>";
                        echo"   <th>Horário</th>";
                        echo"   <th>Data da ciência</th>";
                        echo"   <th>Horário</th>";                       
                        echo"   <th>Profissional </th>";  
                        echo"   <th>Ação</th>"; 

                    }else{
                        echo "<hr/>";
                        echo "<h3><i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para esse paciente</h3>";}  
                ?>
                </thead>
                <tbody>
                    <?php     
                 
                        foreach($listaEmergencia as $emergencia): ?>
                        <tr>
                        <td><?= $emergencia->descricao  ?></td>
                        <td><?= (new DateTime($emergencia->datainclusao))->format('d/m/Y')?></td>
                        <td><?= (new DateTime($emergencia->datainclusao))->format('H:i:s')?></td>
                        <td><?= (new DateTime($emergencia->dataCiencia))->format('d/m/Y') ?></td>
                        <td><?= (new DateTime($emergencia->dataCiencia))->format('H:i:s') ?></td>
                        <td><?= $emergencia->name ?></td>
                        <td>
                        <a href="Historico.php?view=<?= $emergencia->id?>" 
                                class="btn btn-warning rounded-circle mr-2 ">
                                <i class="icofont-list"></i>
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