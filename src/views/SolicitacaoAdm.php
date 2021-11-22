
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>perfil de solicitacao </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $listaSolicitacao[0]->id ?>">
                          
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
 
          
                       
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="data">Data de registro</label>
                                <input type="date" id="data" name="data"
                                    class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>"
                                    value="<?= $listaSolicitacao[0]->data ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['data'] ?>
                                </div>
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="descricao">descricao</label>
                                <input type="text" id="descricao" name="descricao"
                                    class="form-control <?= $errors['descricao'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaSolicitacao[0]->descricao)  ?>">
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

    
