<main class="content">
    <?php
    include(TEMPLATE_PATH . "/messages.php");
    ?>
    <form action="#" method="post" id="idOfForm">
        <input type="hidden" name="paciente" value="<?= $paciente[0]->id ?>">
            
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Resumo do perfilL</h2>
            </div>
            <div class="caixa-padrao-conteudo">
                <div class="caixa-padrao-conteudo-esquerda-foto">
                    <img class="evolucao-foto w3-border" src="assets/img/avatar2.png" alt="Smiley face" width="120" height="120">
                </div>
                <div class="caixa-padrao-conteudo-direita-conteudo">
                    <h4>Nome:  <?= $paciente[0]->name ?> </h4>
                    
                    <h4>Idade: <?= 99 ?></h4>
                </div>
                <div class="caixa-padrao-conteudo-botoes">

                        <a class="a-link-button" href="Evolucao2.php?novo=<?=$paciente[0]->id ?>">
                            registrar nova evolução
                        </a>


                </div>
            </div>

                
        </div> 

        <div class="caixa-data">
        <h3><?= $today  ?></h3>
        </div>

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Importante</h2>
            </div>
            <div class="caixa-padrao-conteudo">
                <div class="caixa-padrao-conteudo-esquerda-foto">
                <h1 class="display-1"><i class="icofont-exclamation-circle"></i></h1>
                </div>
                <div class="caixa-padrao-conteudo-direita-conteudo">
                <h3>Não há evolução cadastrada.</h3>
                <h4>Caso deseje criar uma nova evolução. Clicar em "nova evolução".</h4>
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

