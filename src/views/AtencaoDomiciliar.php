
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Solicitação de atenção domiciliar</h2>
                
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $atencaoDomiciliar[0]->id ?>">
                        <input type="hidden" name="paciente" value="<?=    $pacInfo->id_pac      ?>">   
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
 
          
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="paciente">Paciente</label>
                                <select name="paciente" id="paciente" class="form-control <?= $errors['paciente'] ? 'is-invalid' : '' ?>" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($pacientes as $paciente) {
                                            $selected = $paciente->id === $atencaoDomiciliar[0]->paciente ? 'selected' : '';
                                            echo "<option value='{$paciente->id}' {$selected} >{$paciente->name}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['paciente'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="profissional">Profissional</label>
                                <select name="profissional" id="profissional" class="form-control <?= $errors['profissional'] ? 'is-invalid' : '' ?>" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($profissionais as $profissional) {
                                            $selected = $profissional->profissional_id === $atencaoDomiciliar[0]->profissional ? 'selected' : '';
                                            echo "<option value='{$profissional->profissional_id}' {$selected} >{$profissional->nome_Prof}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['profissional'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="modalidadeAD">Modalidade de atenção domiciliar</label>
                                <select name="modalidadeAD" id="modalidadeAD" class="form-control <?= $errors['modalidadeAD'] ? 'is-invalid' : '' ?>" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($modalidadeAD as $modalidade) {
                                            $selected = $modalidade->id === $atencaoDomiciliar[0]->modalidadeAD ? 'selected' : '';
                                            echo "<option value='{$modalidade->id}' {$selected} >{$modalidade->descricao}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['modalidadeAD'] ?>
                                </div>
                            </div>


                        </div>
                        

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="perfilUsuario">Perfil do usuário</label>
                                <select name="perfilUsuario" id="perfilUsuario" class="form-control <?= $errors['perfilUsuario'] ? 'is-invalid' : '' ?>" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($perfilUsuario as $perfilUnic) {
                                            $selected = $perfilUnic->id === $atencaoDomiciliar[0]->perfilUsuario ? 'selected' : '';
                                            echo "<option value='{$perfilUnic->id}' {$selected} >{$perfilUnic->descricao}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['perfilUsuario'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hospitaldeReferencia">Hospital de referêcia</label>
                                <input type="text" id="hospitaldeReferencia" name="hospitaldeReferencia"
                                    class="form-control <?= $errors['hospitaldeReferencia'] ? 'is-invalid' : '' ?>"
                                    value="<?= $atencaoDomiciliar[0]->hospitaldeReferencia ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['hospitaldeReferencia'] ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="UPAdeReferencia">UPA de referêcia</label>
                                <input type="text" id="UPAdeReferencia" name="UPAdeReferencia"
                                    class="form-control <?= $errors['UPAdeReferencia'] ? 'is-invalid' : '' ?>"
                                    value="<?= $atencaoDomiciliar[0]->UPAdeReferencia ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['UPAdeReferencia'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="samutel">Telefone da SAMU</label>
                                <input type="text" id="samutel" name="samutel"
                                    class="form-control <?= $errors['samutel'] ? 'is-invalid' : '' ?>"
                                    value="<?= $atencaoDomiciliar[0]->samutel ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['samutel'] ?>
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

    
