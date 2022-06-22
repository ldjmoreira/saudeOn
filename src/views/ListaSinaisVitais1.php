<script src="assets/js/MenuListaSinaisVitais1.js"> </script>
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
    

                
                </div>
                <div class="posicao-form-direita mb-1">

                    
                </div>
            
            </div>

        
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                <?php
                    if (!empty($listaSinaisVitais)){
                        echo"   <th>Sinal vital</th>";
                        echo"   <th>Intervalo</th>";

                        echo"   <th>Ciente</th>"; 
                        echo"   <th>Ação</th>";  


                    }else{
                        echo"<hr/>";
                        echo "<h3> <i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para esse paciente</h3>";
                    }  
                ?>
                </thead>
                <tbody>
                    <?php     
                 
                        foreach($listaSinaisVitais as $SinaisVital): ?>
                        <tr>
                        <td><?= $SinaisVital->descricao ?></td>
                        <td>
                            <?php 
                            if($SinaisVital->intervalo < 60) { echo round($SinaisVital->intervalo)." Minutos";}elseif ($SinaisVital->intervalo == 60) {
                            echo round($SinaisVital->intervalo/60,2 )." Hora";
                            }elseif($SinaisVital->intervalo > 60 && $SinaisVital->intervalo < 1440){echo round($SinaisVital->intervalo/60,0) ." Horas ". ($SinaisVital->intervalo%60 == 0 ? '':'e ' . $SinaisVital->intervalo%60 . "minutos" ) ;
                            } else{
                                echo round($SinaisVital->intervalo/(60*24),0) . " dias";
                            } 

                                ?>
                        </td>


                        <td><?= $SinaisVital->ciente ? "sim" : "Não"; ?></td>
                        <td>

                        <a href="ProgSinaisVitais.php?update=<?= $SinaisVital->id?>" 
                                class="btn btn-warning rounded-circle ">
                                <i class="icofont-edit"></i>
                        </a>
                        <?php   if($SinaisVital->registro_ativo): ?>
                            <a href="ListaSinaisVitais1.php?muted=<?= $SinaisVital->registro_ativo?>&id=<?= $SinaisVital->id?>"
                            class="btn btn-warning rounded-circle  mr-2">
                            <i class="icofont-ui-check"></i>
                            </a>
                        <?php else:?>
                            <a href="ListaSinaisVitais1.php?muted=<?= $SinaisVital->registro_ativo?>&id=<?= $SinaisVital->id?>" 
                            class="btn btn-secondary rounded-circle  mr-2">
                                <i class="icofont-error"></i>
                            </a>
                        <?php endif;?>
                        </td>
                        </tr>
                        <?php endforeach ;

                    ?>

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
            <h1>Deseja remover a programação do sinal vital cadastrado?</h1>

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
</body>
</html>