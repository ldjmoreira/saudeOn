
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Cuidados </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $CuidadosAdm[0]->id ?>">
                        <input type="hidden" name="created_at" value="<?= $CuidadosAdm[0]->created_at ?>">  
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
 
          
                       
                        <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="name">Nome do cuidado</label>
                            <input type="text" id="name" name="name"
                                class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                                value="<?= $CuidadosAdm[0]->name ?>">
                            <div class="invalid-feedback">
                                <?= $errors['name'] ?>
                            </div>
                        </div>




                        </div>


                        <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="descricao">Descrição do cuidado</label>
                            <input type="text" id="descricao" name="descricao"
                                class="form-control <?= $errors['descricao'] ? 'is-invalid' : '' ?>"
                                value="<?= $CuidadosAdm[0]->descricao ?>">
                            <div class="invalid-feedback">
                                <?= $errors['descricao'] ?>
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
            <button type="button" class="btn btn-success ml-2" onclick="doPreview();">salvar</button>
            <button type="button" class="btn btn-danger ml-2" onclick="goBack();">voltar</button>
        </div>
    </div>

</main>
    

<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

    
