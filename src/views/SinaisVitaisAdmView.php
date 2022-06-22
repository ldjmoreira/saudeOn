
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="view-padrao2">
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Sinais Vitais</h2>
            </div>

            <div class="caixa-padrao-conteudo">
            
            <div class="form-row">

            <div class="form-group col-md-12">
                <label for="descricao">descricao</label>
                    <input type="text" id="descricao" name="descricao"
                    class="form-control <?= $errors['descricao'] ? 'is-invalid' : '' ?>"
                    value="<?= htmlspecialchars_decode($listaSinais[0]->descricao)  ?>">
                    <div class="invalid-feedback">
                    <?= $errors['descricao'] ?>
                    </div>
                </div>
            </div>

            <div class="form-row">

            <div class="form-group col-md-12">
            <label for="faixadereferencia">Faixa de referência</label>
                <input type="text" id="faixadereferencia" name="faixadereferencia"
                class="form-control <?= $errors['faixadereferencia'] ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars_decode($listaSinais[0]->faixadereferencia)  ?>">
                <div class="invalid-feedback">
                <?= $errors['faixadereferencia'] ?>
                </div>
            </div>

            </div>      
            
            <div class="form-row">

            <div class="form-group col-md-4">
            <label for="unidade">Unidade</label>
                <input type="text" id="unidade" name="unidade"
                class="form-control <?= $errors['unidade'] ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars_decode($listaSinais[0]->unidade)  ?>">
                <div class="invalid-feedback">
                <?= $errors['unidade'] ?>
                </div>
            </div>

            <div class="form-group col-md-4">
            <label for="codsensor">codsensor</label>
                <input type="text" id="codsensor" name="codsensor"
                class="form-control <?= $errors['codsensor'] ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars_decode($listaSinais[0]->codsensor)  ?>">
                <div class="invalid-feedback">
                <?= $errors['codsensor'] ?>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="data">Data de registro</label>
                <input type="date" id="data" name="data"
                    class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>"
                    value="<?= $listaSinais[0]->data ?>">
                <div class="invalid-feedback">
                    <?= $errors['data'] ?>
                </div>
            </div>

            </div>            

            </div>

                <div class="botao-footer2 mb-3  mr-4">
                    <button type="button" class="btn btn-primary ml-2" onclick="goBack();">voltar</button>
                </div>
            </div>
                            
                        




                
        </div>




    
    

</main>


<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

    
