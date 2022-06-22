
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
                                <label for="nomefantasia">Nome</label>
                                <input type="text" id="nomefantasia" name="nomefantasia"
                                    class="form-control <?= $errors['nomefantasia'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaInstituicao[0]->nomefantasia)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['nomefantasia'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tipo">Tipo</label>
                                <select name="tipo" id="tipo" class="form-control" >
                                <option value="">Tipo</option>
                                    <?php
                                        $escolhas=['SUS','Privado'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $listaInstituicao[0]->tipo ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['tipo'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="CNES">Nome</label>
                                <input type="number" id="CNES" name="CNES"
                                    class="form-control <?= $errors['CNES'] ? 'is-invalid' : '' ?>"
                                    value="<?= $listaInstituicao[0]->CNES  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['CNES'] ?>
                                </div>
                            </div>

 
            </div>
            <div class="form-row">

            <div class="form-group col-md-3">
                                <label for="cidade">cidade</label>
                                <input type="text" id="cidade" name="cidade"
                                    class="form-control <?= $errors['cidade'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaInstituicao[0]->cidade)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['cidade'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="endereco">Endereço</label>
                                <input type="text" id="endereco" name="endereco"
                                    class="form-control <?= $errors['endereco'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaInstituicao[0]->endereco)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['endereco'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="endereco">Endereço</label>
                                <input type="text" id="endereco" name="endereco"
                                    class="form-control <?= $errors['endereco'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaInstituicao[0]->endereco)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['endereco'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="CEP">CEP</label>
                                <input type="text" id="CEP" name="CEP"
                                    class="form-control <?= $errors['CEP'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaInstituicao[0]->CEP)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['CEP'] ?>
                                </div>
                            </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-12">
                    <label for="especialidades">especialidades</label>
                    <input type="text" id="especialidades" name="especialidades"
                    class="form-control <?= $errors['especialidades'] ? 'is-invalid' : '' ?>"
                    value="<?= htmlspecialchars_decode($listaInstituicao[0]->especialidades)  ?>">
                    <div class="invalid-feedback">
                    <?= $errors['especialidades'] ?>
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

    
