<aside  class="sidebar">
<nav class="menu mt-1">
        <ul class="nav-list">

            <li class="nav-item">
                <a href="Home.php">
                    <i class="icofont-ui-home mr-2"></i>
                    <div class="lateral-nome">
                    HOME
                    </div>
                </a>
            </li>

            <iframe class="asideButtonLeft"  src="http://<?= $ipUser ?>/buttompanic/panic.php?<?= $useInf ?>"></iframe>  
            <li class="nav-item  _nav-item-monitoramento  " onclick="drop_monitoramento('_nav-item-monitoramento','ico-monitoramento','nav-monitoramento-filho','nav-monitoramento-filho')">
                <a >
                    <i class="icofont-computer  mr-2"></i>
                    <div class="lateral-nome">
                    Monitoramento
                    </div>
                    <i id="ico-monitoramento" class="icofont-simple-down ml-2"></i>
                </a>
            </li>
            <li class="nav-item  nav-monitoramento-filho w3-hide w3-animate-top  ">
                <a href="monitoramentos.php">
                    
                    <div class="lateral-lista-paciente _demoMon1 ml-5">
                    Sinais Vitais
                    </div>
                </a>
            </li>
            <li class="nav-item  nav-monitoramento-filho w3-hide w3-animate-top  ">
                <a href="CoEscolhaListaConc.php">
                    
                    <div class="lateral-lista-paciente _demoMon2 ml-5">
                    Cadastro de concentradores
                    </div>
                </a>
            </li>

            <li class="nav-item  _nav-item-paciente  " onclick="drop_paciente('_nav-item-paciente','ico-paciente','_nav-paciente-filho','_nav-paciente-filho')">
                <a >
                    <i class="icofont-male  mr-2"></i>
                    <div class="lateral-nome">
                    Pacientes
                    </div>
                    <i id="ico-paciente" class="icofont-simple-down ml-2"></i>
                </a>
            </li>
            <li class="nav-item  _nav-paciente-filho w3-hide w3-animate-top  " onclick="MenuEscPac()">
                <a href="EscolhaPaciente.php">
                    
                    <div class="lateral-lista-paciente _demoAcc1 ml-5">
                    Escolha de paciente
                    </div>
                </a>
            </li>
            <li class="nav-item  _nav-paciente-filho w3-hide w3-animate-top ">
                <a href="ListaPaciente.php">
                    
                    <div class="lateral-lista-paciente _demoAcc2 ml-5">
                    Cadastro de pacientes
                    </div>
                </a>
            </li>
            <li class="nav-item _filho _nav-paciente-filho w3-hide w3-animate-top  ">
                <a href="ListaCuidador.php">
                    
                    <div class="lateral-lista-paciente _demoAcc3 ml-5">
                    Cuidadores
                    </div>
                </a>
            </li>
            <li class="nav-item _filho _nav-paciente-filho w3-hide w3-animate-top  ">
                <a href="PTS.php">
                    
                    <div class="lateral-lista-paciente _demoAcc4 ml-5">
                        PTS
                    </div>
                </a>
            </li>
            <li class="nav-item _filho _nav-paciente-filho w3-hide w3-animate-top  ">
                <a href="Evolucao2.php">
                    
                    <div class="lateral-lista-paciente _demoAcc5 ml-5">
                        Evolução do paciente
                    </div>
                </a>
            </li>
            <li class="nav-item _filho _nav-paciente-filho w3-hide w3-animate-top  ">
                <a href="Ocorrencias.php">
                    
                    <div class="lateral-lista-paciente _demoAcc6 ml-5">
                    Histórico de sinais vitais
                    </div>
                </a>
            </li>
            <li class="nav-item _filho _nav-paciente-filho w3-hide w3-animate-top  ">
                <a href="ListaHistorico.php">
                    
                    <div class="lateral-lista-paciente _demoAcc7 ml-5">
                        Histórico de emergências
                    </div>
                </a>
            </li>
            <li   class="nav-item _filho _nav-paciente-filho w3-hide w3-animate-top  ">
                <a href="ListaSinaisAdm.php">
                    
                    <div class="lateral-lista-paciente _demoAcc8 ml-5">
                    Alarmes Sinais vitais
                    </div>
                </a>
            </li>

            <li class="nav-item _pai _nav-item-agenda" onclick="drop_agenda('_nav-item-agenda','ico-agenda','nav-agenda-filho','nav-agenda-filho')">
                <a>
                    <i class="icofont-address-book mr-2"></i>
                    <div  class="lateral-nome">
                    Agenda
                    </div>
                    <i id="ico-agenda" class="icofont-simple-down ml-2"></i>
                </a>
            </li>
            <li class="nav-item _filho nav-agenda-filho w3-hide w3-animate-top  ">
                <a href="ListaProfPac.php">
                    
                    <div class="lateral-lista-paciente _demoAgn1 ml-5">
                    Agenda do profissional - paciente
                    </div>
                </a>
            </li>
            <li class="nav-item _filho nav-agenda-filho w3-hide w3-animate-top  ">
                <a href="ListaProfissional.php">
                    
                    <div class="lateral-lista-paciente _demoAgn2 ml-5">
                    Agenda do profissional
                    </div>
                </a>
            </li>
            <li class="nav-item _filho nav-agenda-filho w3-hide w3-animate-top  ">
                <a href="ListaProgCuidados.php">
                    
                    <div class="lateral-lista-paciente _demoAgn3 ml-5">
                    Programação de cuidados
                    </div>
                </a>
            </li>
            <li class="nav-item _filho nav-agenda-filho w3-hide w3-animate-top  ">
                <a href="ListaProgMedicamentos.php">
                    
                    <div class="lateral-lista-paciente  _demoAgn4 ml-5">
                    Programação de medicação
                    </div>
                </a>
            </li>
            <li class="nav-item _filho nav-agenda-filho w3-hide w3-animate-top _demoAgn ">
                <a href="ListaSinaisVitais1.php">
                    
                    <div class="lateral-lista-paciente _demoAgn5 ml-5">
                    Programação de sinais vitais
                    </div>
                </a>
            </li>
            <li class="nav-item _pai _nav-item-atencaoDom" onclick="drop_atencaoDom('_nav-item-atencaoDom','ico-atencaoDom','nav-atencao-filho','nav-atencao-filho')">
                <a>
                    <i class="icofont-nursing-home _demoAgn6 mr-2"></i>
                    <div  class="lateral-nome">
                    Atenção domiciliar
                    </div>
                    <i id="ico-atencaoDom" class="icofont-simple-down ml-2"></i>
                </a>
            </li>
            <li class="nav-item _filho nav-atencao-filho w3-hide w3-animate-top  ">
                <a href="ListaAtencaoDom.php">
                    
                    <div class="lateral-lista-paciente _demoAtenD1 ml-5">
                    Solicitação de atenção domiciliar
                    </div>
                </a>
            </li>

            
            

            <li class="nav-item _pai _nav-item-administrativo  " onclick="drop_adm('_nav-item-administrativo','ico-adm','nav-administrativo-filho','_nav-administrativo-filho')">
                <a >
                    <i class="icofont-folder  mr-2"></i>
                    <div class="lateral-nome">
                    Administrativo/Cadastro
                    </div>
                    <i id="ico-adm" class="icofont-simple-down ml-2"></i>
                </a>
            </li>
            <li   class="nav-item _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
                <a href="ListaSolicitacao.php">
                    
                    <div class="lateral-lista-paciente _demoAdm2 ml-5">
                    Perfil de solicitação
                    </div>
                </a>
            </li>
            <li   class="nav-item _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
                <a href="ListaInstituicao.php">
                    
                    <div class="lateral-lista-paciente _demoAdm3 ml-5">
                    Instituição
                    </div>
                </a>
            </li>
            <li   class="nav-item _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
                <a href="ListaMedicamentos.php">
                    
                    <div class="lateral-lista-paciente _demoAdm4 ml-5">
                    Medicamentos
                    </div>
                </a>
            </li>
            <li   class="nav-item _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
                <a href="ListaCuidadosAdm.php">
                    
                    <div class="lateral-lista-paciente _demoAdm5 ml-5">
                    Cuidados
                    </div>
                </a>
            </li>

            <li   class="nav-item _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
                <a href="ListaProfissionaisAdm.php">
                    
                    <div class="lateral-lista-paciente _demoAdm7 ml-5">
                    Profissionais
                    </div>
                </a>
            </li>
            <li   class="nav-item _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
                <a href="ListaOperadoresAdm.php">
                    
                    <div class="lateral-lista-paciente _demoAdm8 ml-5">
                    Operadores
                    </div>
                </a>
            </li>
          
           
        </ul>
        <a href="ListaPacientePanico.php"><div class="ghost"></div> </a>

   
        
    </nav>
    
    
    

</aside>