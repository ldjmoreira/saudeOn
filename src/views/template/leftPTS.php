<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="Home.php">
                    <i class="icofont-ui-home mr-2"></i>
                    <div class="lateral-nome">
                    Inicio
                    </div>
                </a>
            </li>
            <li class="nav-item nav-item-paciente  ">
                <a >
                    <i class="icofont-male  mr-2"></i>
                    <div class="lateral-nome">
                    PTS
                    </div>
                    <i id="ico-paciente" class="icofont-simple-right ml-2"></i>
                </a>
            </li>
            <li   class="nav-item nav-paciente-filho  w3-animate-top demoAcc ">
                <a href="novoPaciente.php">
                    
                    <div class="lateral-lista-paciente ml-5">
                    Resumo do perfil
                    </div>
                </a>
            </li>
            <li class="nav-item nav-paciente-filho  w3-animate-top demoAcc ">
                <a href="ListaPaciente.php">
                    
                    <div class="lateral-lista-paciente ml-5">
                    Dados gerais
                    </div>
                </a>
            </li>
            <li class="nav-item nav-paciente-filho  w3-animate-top demoAcc ">
                <a href="CoEscolhaEvolucao.php">
                    
                    <div class="lateral-lista-paciente ml-5">
                    Evolução
                    </div>
                </a>
            </li>
 
            <li class="nav-item">
                <a href="EscolhaPaciente.php">
                    <i class="icofont-simple-left mr-2"></i>
                    <div class="lateral-nome">
                    Voltar
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a >
                    <i class="icofont-papers"></i>
                    <div class="lateral-nome">
                    Lista de PTS:
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <nav class="menu2 mt-3">

        <?php

            foreach($listadePTS as $dados): ?>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="PTS.php?paciente2=<?=$dados->id ?>&id=<?= $dados->PTS_id ?>">
                                <div class="lateral-nome">
                                    <?= $dados->data_PTS ?> - Dr(a). <?= $dados->nome_Prof ?>
                                </div>
                        </a>
                    </li>
                </ul>
            <?php endforeach ?>
                        
    </nav>
    
</aside>