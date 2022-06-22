
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">
    <input type="hidden" name="id" value="<?= $listaOperadores[0]->id ?>">
    <input type="hidden" name="codigo_profissional" value="0">
    <input type="hidden" name="password" value="">


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

    
