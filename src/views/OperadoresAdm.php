
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">
    <input type="hidden" name="id" value="<?= $listaOperadores[0]->id ?>">
    <input type="hidden" name="codigo_profissional" value="0">



        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Dados Gerais </h2>
            </div>

            <div class="caixa-padrao-conteudo">

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="name">Nome do perfil</label>
                        <input type="text" id="name" name="name"
                            class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                            value="<?= htmlspecialchars_decode($listaOperadores[0]->name)  ?>">
                        <div class="invalid-feedback">
                            <?= $errors['name'] ?>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="email">E-mail de cadastro</label>
                        <input type="text" id="email" name="email"
                            class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
                            value="<?= htmlspecialchars_decode($listaOperadores[0]->email)  ?>">
                        <div class="invalid-feedback">
                            <?= $errors['email'] ?>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="start_date">Data de Admissão</label>
                        <input type="date" id="start_date" name="start_date"
                            class="form-control <?= $errors['start_date'] ? 'is-invalid' : '' ?>"
                            value="<?= $listaOperadores[0]->start_date ?>">
                        <div class="invalid-feedback">
                            <?= $errors['start_date'] ?>
                        </div>
                    </div>


                </div>

                <div class="form-row">



                    <div class="form-group col-md-4 pt-4 pb-2">
                        <div class=" w3-display-middle " style="width:100%">
                        <button type="button" class="w3-button w3-block w3-teal " onclick="pas_visibl();">Nova senha</button>
                        </div>
                    </div>

 
                </div>

                
                <div class="form-row _demoMon2 w3-hide ">
                    
                    <div class="form-group col-md-4">
                        <label for="password">Senha Atual</label>
                        <input type="password" id="password" name="password" readonly onfocus="this.removeAttribute('readonly');" placeholder="Informe a senha" 
                        class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['password'] ?>
                        </div>
                    </div>


                    <div class="form-group col-md-4">
                        <label for="new_password">Nova senha</label>
                        <input type="password" id="new_password" readonly onfocus="this.removeAttribute('readonly');" name="new_password"
                            placeholder="Nova senha"
                            class="form-control <?= $errors['new_password'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['new_password'] ?>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="confirm_password">Nova senha</label>
                        <input type="password" id="confirm_password" readonly onfocus="this.removeAttribute('readonly');" name="confirm_password"
                            placeholder="confirme a senha"
                            class="form-control <?= $errors['confirm_password'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['confirm_password'] ?>
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
<script src="assets/js/button_visible.js"></script>
</body>
</html>

    
