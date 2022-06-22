
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
                <div class="caixa-padrao-titulo">
                    <h3>Cadastro do concentrador</h3>
                </div>

            <div class="caixa-padrao-conteudo">
                
                <input type="hidden" name="id" value="<?= $infConcentrador[0]->id?>">
                <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>"> 


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="numero">Número do concentrador</label>
                            <input type="number" id="numero" name="numero" placeholder="Informe o nome"
                                class="form-control <?= $errors['numero'] ? 'is-invalid' : '' ?>"
                                value="<?= $infConcentrador[0]->numero ?>">
                            <div class="invalid-feedback">
                                <?= $errors['numero'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modelo">Modelo</label>
                            <input type="text" id="modelo" name="modelo" placeholder="Informe o numero do prontuário"
                                class="form-control <?= $errors['modelo'] ? 'is-invalid' : '' ?>"
                                value="<?= $infConcentrador[0]->modelo ?>">
                            <div class="invalid-feedback">
                                <?= $errors['modelo'] ?>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ativo">ativo</label>
                            <select name="ativo" id="ativo" class="form-control" >
                            <option value="">selecione o status</option>
                                <?php
                                
                                    $escolhas=['1','0'];
                                    $escolhaM=[];
                                    foreach($escolhas as $escolha) {
                                        $selected = $escolha === $infConcentrador[0]->ativo ? 'selected' : '';
                                        if($escolha) {$escolhaM="Ativo";}else{$escolhaM="Inativo";}
                                        echo "<option value='{$escolha}' {$selected} >{$escolhaM}</option>";
                                    }
                            ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['ativo'] ?>
                            </div>
                        </div>



                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="start_date">Data de Admissão</label>
                            <input type="date" id="start_date" name="start_date"
                                class="form-control <?= $errors['start_date'] ? 'is-invalid' : '' ?>"
                                value="<?= $infConcentrador[0]->start_date ?>">
                            <div class="invalid-feedback">
                                <?= $errors['start_date'] ?>
                            </div>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="datafinal">Data Final</label>
                            <input type="date" id="datafinal" name="datafinal"
                                class="form-control <?= $errors['datafinal'] ? 'is-invalid' : '' ?>"
                                value="<?= $infConcentrador[0]->datafinal ?>">
                            <div class="invalid-feedback">
                                <?= $errors['datafinal'] ?>
                            </div>
                        </div>

                    </div>
                            
                </div>
                
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


    <div id="id01" class="w3-modal  w3-animate-opacity">
        <div class="w3-modal-content rounded w3-card-4" style="max-width:600px">

        <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        </div>

        <div id="Paris" class="w3-container mt-4">
        <hr>
            <h1>Deseja remover o paciente cadastrado do registro?</h1>

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
<script >
function myDeletes(event,elmnt,clr) {
    event.preventDefault()
    document.getElementById("id01").style.display = "block";
    document.getElementById("img01").href = elmnt.href;
}
</script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

    
