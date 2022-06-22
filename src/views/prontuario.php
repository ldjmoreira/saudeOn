
    <main class="content">
        <form action="#" method="post" id="idOfForm">
            <div class="caixa-Lista-paciente">  
                            <div class="caixa-titulo">
                                <h2>Resumo do perfil</h2>
                            </div>
            </div> 

            <div class="caixa-data">
            <h3>perfil paciente: informações gerais</h3>
            </div>

            <div class="caixa-Lista-paciente">  
                <div class="caixa-titulo">
                    <h2>Anamnese</h2>
                </div>
                <input type="hidden" name="prontuario_id" value="<?= $paciente_id ?>">
                    <input type="hidden" name="paciente_id" value="<?= $paciente_id ?>">
                    <input type="hidden" name="numero" value="<?= $numero ?>">
                    <input type="hidden" name="finalizado" value="1">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="queixa">Queixa relatada</label>
                            <textarea id="queixa" name="queixa"class="form-control" ><?= $queixa ?></textarea>
                            
                            <div class="invalid-feedback">
                                <?= $errors['queixa'] ?>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="historia">Historia</label>
                            <textarea id="historia" name="historia"class="form-control" ><?= $historia ?></textarea>
                            
                            <div class="invalid-feedback">
                                <?= $errors['historia'] ?>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="antecedentes">Antecedentes pessoais</label>
                            <textarea id="antecedentes" name="antecedentes"class="form-control" ><?= $antecedentes ?>
                            </textarea>
                            <div class="invalid-feedback">
                                <?= $errors['antecedentes'] ?>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="caixa-Lista-paciente">  
                <div class="caixa-titulo">
                    <h2>Exame físico</h2>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                            <label for="exameSegmentar">Exame segmentar</label>
                            <textarea id="exameSegmentar" name="exameSegmentar"class="form-control" ><?= $exameSegmentar ?>
                            </textarea>
                            <div class="invalid-feedback">
                                <?= $errors['exameSegmentar'] ?>
                            </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="frequenciaCard">frequencia cardiaca</label>
                        <input type="frequenciaCard" id="frequenciaCard" name="frequenciaCard" placeholder="Informe a senha"
                            class="form-control <?= $errors['frequenciaCard'] ? 'is-invalid' : '' ?>"
                            value="<?= $frequenciaCard ?>">
                        <div class="invalid-feedback">
                            <?= $errors['frequenciaCard'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="peso">Peso</label>
                        <input type="peso" id="peso" name="peso" placeholder="Informe a senha"
                            class="form-control <?= $errors['peso'] ? 'is-invalid' : '' ?>"
                            value="<?= $peso ?>">
                        <div class="invalid-feedback">
                            <?= $errors['peso'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pressao">pressão</label>
                        <input type="pressao" id="pressao" name="pressao" placeholder="Informe a senha"
                            class="form-control <?= $errors['pressao'] ? 'is-invalid' : '' ?>"
                            value="<?= $pressao ?>">
                        <div class="invalid-feedback">
                            <?= $errors['pressao'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="altura">altura</label>
                        <input type="altura" id="altura" name="altura" placeholder="Informe a senha"
                            class="form-control <?= $errors['altura'] ? 'is-invalid' : '' ?>"
                            value="<?= $altura?>">
                        <div class="invalid-feedback">
                            <?= $errors['altura'] ?>
                        </div>
                    </div>
                </div>
                    
            </div> 

            <div class="caixa-Lista-paciente">  
                <div class="caixa-titulo">
                    <h2>evolução</h2>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                            <label for="evolucao">Evolucao</label>
                            <textarea id="evolucao" name="evolucao"class="form-control" ><?= $evolucao ?></textarea>
                            
                            <div class="invalid-feedback">
                                <?= $errors['evolucao'] ?>
                            </div>
                    </div>
                </div>

                    
            </div> 



        </form>
        
    </main>
    <script src="assets/js/paciente_.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>