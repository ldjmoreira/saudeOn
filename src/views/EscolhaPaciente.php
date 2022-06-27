<script src="assets/js/MenuEscolhaPaciente.js"> </script>


<main class="content w3-animate-opacity" >
<?php
include(TEMPLATE_PATH . "/messages.php");
?>

    
    
    <div class="caixa-lista-paciente">  
        <div class="caixa-lista-paciente-titulo">
            <?php renderTitle($title) ?>
            
        </div>
        <div class="caixa-lista-paciente-conteudo">
            <div class="mb-4 mr-3 posicao-form " >
                <div class="form__group field">
                <input type="text" id='myInput' class="form__field w3-input" 
                    placeholder="buscar nome"required onkeyup="myFunction()" />
                    <label for="myInput" class="form__label">buscar nome</label>

                    
                </div>

            </div>
            <div class="table-responsive">   
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                <?php
                    if (isset($listasPaciente)) {//modify echo
                    echo"   <th>ID Paciente</th>";
                    echo"   <th>Nome</th>";

                    echo"   <th>Data de admissão</th>";
                    echo"   <th>Prontuário</th>";
                    echo"   <th>Selecionar</th>";
                    } 
      
                ?>
                </thead>
                <tbody>
                    <?php                        
                        if (isset($listasPaciente)) {
                            foreach($listasPaciente as $paciente): ?>
                            
                            <tr>
                            <td><?= $paciente->concentrador ? $paciente->concentrador :"Sem Identificação" ?></td>
                            <td><?= $paciente->name ?></td>
                            <td><?= $paciente->dataAdmissao?></td>
                            <td><?= $paciente->prontuario ?></td>

                            <td>
                            <a href="EscolhaPaciente.php?id=<?= $paciente->id?>" 
                                class="btn btn-warning rounded-circle mr-2">
                                <i class="icofont-rounded-right"></i>
                            </a>
                            
                            </td>
                            </tr>
                            <?php endforeach ;
                        }



                    ?>

                </tbody>	
            </table>
            </div>
        </div>
    </div>


    
</main>

<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>