
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="view-padrao2">
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Agenda profissional detalhada</h2>
            </div>

            <div class="caixa-padrao-conteudo">
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

                <div class="botao-footer2  mr-4">
                    <button type="button" class="btn btn-primary ml-2" onclick="goBack();">voltar</button>
                </div>
            </div>
                            
                        




                
        </div>




    
    

</main>


<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

    
