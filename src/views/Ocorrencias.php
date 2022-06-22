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
            <input type="hidden" id="desenho" name="desenho" value="<?= $desenho ?>">   

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
                    <button class="btn btn-primary ml-2" onclick="slcGrafico(event)">
                            <i class="" id="button_ocorrencias_grafico"></i>
                    </button>

                
    

                
                </div>
            </form>

            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                
                <?php
                
                    if($_SESSION['sinal'] == 2 && $desenho == 0) {
                      
                        if (!empty($pesquisas)){
                            echo"   <th>Descricao</th>";
                            echo"   <th>Data</th>";
                            echo"   <th>Hora</th>";
                            echo"   <th>Sistólica</th>"; 
                            echo"   <th> Diastólica </th>";  


                        }else{
                            echo "<hr/>";
                            echo "<h4> <i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                    } elseif($_SESSION['sinal'] == 3 && $desenho == 0){
                       
                        if (!empty($pesquisas )){
                            echo"   <th>Descricao</th>";
                            echo"   <th>Data</th>";
                            echo"   <th>Hora</th>";
                            echo"   <th>BPM</th>"; 
 
                        }else{
                            echo "<hr/>";
                            echo "<h4> <i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                      
                    } elseif($_SESSION['sinal'] == 4 && $desenho == 0){
                       
                            if (!empty($pesquisas)){
                                echo"   <th>Descricao</th>";
                                echo"   <th>Data</th>";
                                echo"   <th>Hora</th>";
                                echo"   <th>°C</th>"; 
     
                            }else{
                                echo "<hr/>";
                                echo "<h4><i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                          
                    } elseif($_SESSION['sinal'] == 5 && $desenho == 0){
                       
                                if (!empty($pesquisas)){
                                    echo"   <th>Descricao</th>";
                                    echo"   <th>Data</th>";
                                    echo"   <th>Hora</th>";
                                    echo"   <th>%</th>"; 
         
                                }else{
                                    echo "<hr/>";
                                    echo "<h4><i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para o sinal vital escolhido</h4>";}  
                              
                    } elseif($_SESSION['sinal'] == 6 && $desenho == 0){
                       
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
                    if($_SESSION['sinal'] == 2 && $desenho == 0) {                 
                        foreach($pesquisas as $pesquisa): ?>
                        <tr>
                        <td><?= $pesquisa->descricao?></td>
                        <td><?= $pesquisa->data?></td>
                        <td><?= $pesquisa->hora ?></td>
                        <td><?= $pesquisa->valor1 ?></td>
                        <td><?= $pesquisa->valor2  ?></td>

                        </tr>
                        <?php endforeach ;
                    } elseif($_SESSION['sinal'] == 3 && $desenho == 0){
                        foreach($pesquisas as $pesquisa): ?>
                            <tr>
                            <td><?= $pesquisa->descricao?></td>
                            <td><?= $pesquisa->data?></td>
                            <td><?= $pesquisa->hora ?></td>
                            <td><?= $pesquisa->valor1 ?></td>

    
                            </tr>
                            <?php endforeach ;                      
                    } elseif($_SESSION['sinal'] == 4 && $desenho == 0){
                        foreach($pesquisas as $pesquisa): ?>
                            <tr>
                            <td><?= $pesquisa->descricao?></td>
                            <td><?= $pesquisa->data?></td>
                            <td><?= $pesquisa->hora ?></td>
                            <td><?= $pesquisa->valor1 ?></td>

    
                            </tr>
                            <?php endforeach ;                      
                    } elseif($_SESSION['sinal'] == 5 && $desenho == 0){
                        foreach($pesquisas as $pesquisa): ?>
                            <tr>
                            <td><?= $pesquisa->descricao?></td>
                            <td><?= $pesquisa->data?></td>
                            <td><?= $pesquisa->hora ?></td>
                            <td><?= $pesquisa->valor1 ?></td>

    
                            </tr>
                            <?php endforeach ;                      
                    } elseif($_SESSION['sinal'] == 6 && $desenho == 0){
                        foreach($pesquisas as $pesquisa): ?>
                            <tr>
                            <td><?= $pesquisa->descricao?></td>
                            <td><?= $pesquisa->data?></td>
                            <td><?= $pesquisa->hora ?></td>
                            <td><?= $pesquisa->valor1 ?></td>

    
                            </tr>
                            <?php endforeach ;                      
                    }elseif($desenho == 1){
                       echo" <div>";
                       echo" <canvas id='myChart'></canvas>";
                       echo" </div>";
                    }
                    ?>

                </tbody>	
            </table>
        </div>
    </div>

    <div
    class="service-container"
    data-service="<?= htmlspecialchars($pesquisa->valor1 ) ?>"
    >

    </div>
    
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$( document ).ready(function() { 
    if($( "#desenho" ).val() == 0){
        $("#button_ocorrencias_grafico").addClass("icofont-chart-line");
        $("#button_ocorrencias_grafico").removeClass("icofont-sub-listing");
        
    }else {
        $("#button_ocorrencias_grafico").addClass("icofont-sub-listing");
        $("#button_ocorrencias_grafico").removeClass("icofont-chart-line");
    }
});

    if(<?= $_SESSION['sinal'] ?> == 2){
        graphics_two();
    }else{
        graphics_one();
    }
    
        function graphics_one() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: [<?php foreach($pesquisas as $pesquisa): ?>
                    '<?= $pesquisa->hora ?>',
                <?php endforeach; ?>
                ],
                datasets: [{
                    label: '<?= $pesquisa->descricao ?>',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?php foreach($pesquisas as $pesquisa): ?>
                        '<?= $pesquisa->valor1 ?>',
                    <?php endforeach; ?>
                    ],
                }]
            },

            // Configuration options go here
            options: {}
            });
        }

        function graphics_two() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: [<?php foreach($pesquisas as $pesquisa): ?>
                        '<?= $pesquisa->hora ?>',
                    <?php endforeach; ?>
                    ],
                    datasets: [
                        {
                        label: '<?= $pesquisa->descricao ?>',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [<?php foreach($pesquisas as $pesquisa): ?>
                            '<?= $pesquisa->valor1 ?>',
                        <?php endforeach; ?>
                        ]
                        },
                        {
                        label: '<?= $pesquisa->descricao ?>',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [<?php foreach($pesquisas as $pesquisa): ?>
                            '<?= $pesquisa->valor2 ?>',
                        <?php endforeach; ?>
                        ],
                        }
                
                    ]
                },

                // Configuration options go here
                options: {}
            });
        }
    /*
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };


  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
*/
</script>

<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/slc_ocorrencia.js"></script>
<script src="assets/js/cuidador.js"></script>
</body>
</html>