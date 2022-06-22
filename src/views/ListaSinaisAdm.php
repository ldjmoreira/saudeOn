

<script src="assets/js/MenuListaSinaisAdm.js"> </script>
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
                    if (!empty($listaSinaisAdm)){
                        echo"   <th>Tipo</th>";
                        echo"   <th>Máximo</th>";
                        echo"   <th>Mínimo</th>";
                        echo"   <th>Unidade</th>"; 
                        echo"   <th>Data cadastro</th>"; 
                        echo"   <th>Ação</th>"; 

                    }else{
                        echo "<hr/>";
                        echo "<h3> <i class='icofont-exclamation-circle h2'></i> Não há registro  cadastrado para esse paciente </h3>";
                    }  
                ?>
                </thead>
                <tbody>
                    <?php     
                 
                        foreach($listaSinaisAdm as $sinaisAdm): ?>
                        <tr>
                        <td><?= $sinaisAdm->tipo ?></td>
                        <td><?= $sinaisAdm->maximo ?></td>
                        <td><?= $sinaisAdm->minimo ?></td>
                        <td><?= $sinaisAdm->unidade ?></td>
                        <td><?= $sinaisAdm->data ?></td>
                        <td>
                        <a href="SinaisVitaisAdm.php?update=<?= $sinaisAdm->id?>" 
                                class="btn btn-warning rounded-circle ">
                                <i class="icofont-edit"></i>
                        </a>
                        <?php   if($sinaisAdm->alarme_ativo): ?>
                            <a href="ListaSinaisAdm.php?muted=<?= $sinaisAdm->alarme_ativo?>&id=<?= $sinaisAdm->id?>"
                                    class="btn btn-warning rounded-circle ">
                                    <i class="icofont-volume-down"></i>
                            </a>
                        <?php else:?>
                            <a href="ListaSinaisAdm.php?muted=<?= $sinaisAdm->alarme_ativo?>&id=<?= $sinaisAdm->id?>" 
                                class="btn btn-secondary rounded-circle ">
                                <i class="icofont-volume-mute"></i>
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


    
</main>

<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/cuidador.js"></script>
</body>
</html>