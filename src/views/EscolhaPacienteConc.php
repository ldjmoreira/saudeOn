<script src="assets/js/MenuEscolhaPaciente.js"> </script>


<main class="content w3-animate-opacity" >
<?php
include(TEMPLATE_PATH . "/messages.php");
?>

<form action="#" method="post" id="idOfForm">


        <input type="hidden" name="id" value="<?= $idConcentrador ?>">
        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>"> 

    <div class="caixa-lista-paciente">  
        <div class="caixa-lista-paciente-titulo">
            <?php renderTitle($title) ?>
            
        </div>
        <div class="caixa-lista-paciente-conteudo">
            <div class="mb-4 mr-3 posicao-form " >
                <div class="form__group field">

                    <input type="text" id="numero" name="numero" placeholder="Número do sensor"
                                class="form-control mt-3 <?= $errors['numero'] ? 'is-invalid' : '' ?>"
                                value="<?= $infnumero[0]->numero ?>">
                </div>

            </div>
        
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
                            <td> <input type="text" class="form-control2" name="paciente" value="<?= $paciente->id ?>"></td>

                            <td>

                            <input type="radio" class="form-control2" name="paciente" value="<?= $paciente->id ?>">
                            </td>
                            </tr>
                            <?php endforeach ;
                        }



                    ?>

                </tbody>	
            </table>
        </div>
    </div>

    </form>
        <div class="footer w3-hide" id="footer-vis">
        <div class="content-footer">
            <h4>salvar modificações? </h4>
        </div>
        <div class="botao-footer">
        <button type="button" class="btn btn-danger ml-2" onclick="goBack();">voltar</button>
            <button type="button" class="btn btn-success ml-2" onclick="doPreview();">salvar</button>
          
        </div>
    </div>
</main>

<script src="assets/js/footer.js"></script>
<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>