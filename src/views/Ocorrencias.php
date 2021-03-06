<script src="assets/js/MenuOcorrencias.js"> </script>
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


            </div>
            <form class="mb-4" action="#" method="post" id="ocSelect" onchange="slcOcorrencia()">
                <div class="input-group">
                    <select name="period" class="form-control mr-2" placeholder="Selecione o periodo ...">
                    <option value="1">Selecione a página</option>
                        <?php

                            foreach($periods as $key =>$month) {
                                $selected = $key == $position ? 'selected' : '';
                                echo "<option value='{$key}'{$selected}>{$month}</option>";
                            }
 
                        ?>
                    </select>   
                    
                    <select name="sinal" class="form-control mr-1" placeholder="Selecione o usuário ...">
                        <option value="2">Selecione o sinal vital</option>
                        <?php
                            foreach($infSinaisVitais as $sinais) {
                                $selected = $sinais->tipo === $pesquisas[0]->sinalVital ? 'selected' : '';
                                echo "<option value='{$sinais->tipo}' {$selected} >{$sinais->descricao}</option>";
                            }
                        ?>
                    </select>

                    <button class="btn btn-primary ml-2">
                            <i class="icofont-search"></i>
                    </button>
                
    

                
                </div>
            </form>

            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                <?php
                    if($_SESSION['sinal'] == 2) {
                      
                        if (!empty($pesquisas)){
                            echo"   <th>Descricao</th>";
                            echo"   <th>Data</th>";
                            echo"   <th>Hora</th>";
                            echo"   <th>Sistólica</th>"; 
                            echo"   <th> Diastólica </th>";  


                        }else{
                            echo "<hr/>";
                            echo "<h4> <i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                    } elseif($_SESSION['sinal'] == 3){
                       
                        if (!empty($pesquisas)){
                            echo"   <th>Descricao</th>";
                            echo"   <th>Data</th>";
                            echo"   <th>Hora</th>";
                            echo"   <th>BPM</th>"; 
 
                        }else{
                            echo "<hr/>";
                            echo "<h4> <i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                      
                        } elseif($_SESSION['sinal'] == 4){
                       
                            if (!empty($pesquisas)){
                                echo"   <th>Descricao</th>";
                                echo"   <th>Data</th>";
                                echo"   <th>Hora</th>";
                                echo"   <th>°C</th>"; 
     
                            }else{
                                echo "<hr/>";
                                echo "<h4><i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                          
                            } elseif($_SESSION['sinal'] == 5){
                       
                                if (!empty($pesquisas)){
                                    echo"   <th>Descricao</th>";
                                    echo"   <th>Data</th>";
                                    echo"   <th>Hora</th>";
                                    echo"   <th>%</th>"; 
         
                                }else{
                                    echo "<hr/>";
                                    echo "<h4><i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                              
                                } elseif($_SESSION['sinal'] == 6){
                       
                                    if (!empty($pesquisas)){
                                        echo"   <th>Descricao</th>";
                                        echo"   <th>Data</th>";
                                        echo"   <th>Hora</th>";
                                        echo"   <th>IRPM</th>"; 
             
                                    }else{
                                        echo "<hr/>";
                                        echo "<h4><i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                                  
                                }
               ?>
                </thead>
                <tbody>
                    <?php     
                    if($_SESSION['sinal'] == 2) {                 
                        foreach($pesquisas as $pesquisa): ?>
                        <tr>
                        <td><?= $pesquisa->descricao?></td>
                        <td><?= $pesquisa->data?></td>
                        <td><?= $pesquisa->hora ?></td>
                        <td><?= $pesquisa->valor1 ?></td>
                        <td><?= $pesquisa->valor2  ?></td>

                        </tr>
                        <?php endforeach ;
                    } elseif($_SESSION['sinal'] == 3){
                        foreach($pesquisas as $pesquisa): ?>
                            <tr>
                            <td><?= $pesquisa->descricao?></td>
                            <td><?= $pesquisa->data?></td>
                            <td><?= $pesquisa->hora ?></td>
                            <td><?= $pesquisa->valor1 ?></td>

    
                            </tr>
                            <?php endforeach ;                      
                    } elseif($_SESSION['sinal'] == 4){
                        foreach($pesquisas as $pesquisa): ?>
                            <tr>
                            <td><?= $pesquisa->descricao?></td>
                            <td><?= $pesquisa->data?></td>
                            <td><?= $pesquisa->hora ?></td>
                            <td><?= $pesquisa->valor1 ?></td>

    
                            </tr>
                            <?php endforeach ;                      
                    } elseif($_SESSION['sinal'] == 5){
                        foreach($pesquisas as $pesquisa): ?>
                            <tr>
                            <td><?= $pesquisa->descricao?></td>
                            <td><?= $pesquisa->data?></td>
                            <td><?= $pesquisa->hora ?></td>
                            <td><?= $pesquisa->valor1 ?></td>

    
                            </tr>
                            <?php endforeach ;                      
                    } elseif($_SESSION['sinal'] == 6){
                        foreach($pesquisas as $pesquisa): ?>
                            <tr>
                            <td><?= $pesquisa->descricao?></td>
                            <td><?= $pesquisa->data?></td>
                            <td><?= $pesquisa->hora ?></td>
                            <td><?= $pesquisa->valor1 ?></td>

    
                            </tr>
                            <?php endforeach ;                      
                    }
                    ?>

                </tbody>	
            </table>
        </div>
    </div>


    
</main>

<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/slc_ocorrencia.js"></script>
<script src="assets/js/cuidador.js"></script>
</body>
</html>