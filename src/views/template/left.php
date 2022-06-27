<aside  class="sidebar">
<nav class="menu mt-1">
        <ul class="nav-list">

            <?php 
                $dministrativo = leftHome;
                $permission = $_SESSION['permission'][$dministrativo];
                $mystring = $permission->identificacao;

                    if($user->codigo_profissional == 0 ){
                        $findme = "0";
                    }else {
                        $findme = $user->CBO;
                    }
                


                if(!(strpos($mystring, $findme) === false) || $user->is_admin): 
            ?>

            <li class="nav-item">
                <a href="Home.php">
                    <i class="icofont-ui-home mr-2"></i>
                    <div class="lateral-nome">
                    HOME
                    </div>
                </a>
            </li>

            <?php endif ?>

            <?php 
                $dministrativo = leftEmergencia;
                $permission = $_SESSION['permission'][$dministrativo];
                $mystring = $permission->identificacao;

                if($user->codigo_profissional == 0 ){
                    $findme = "0";
                }else {
                    $findme = $user->CBO;
                }
            
                if(!(strpos($mystring, $findme) === false) || $user->is_admin): 
            ?>

            <li class="nav-item" id="corMenu">
                <a href="ListaPacientePanico.php">
                    <i class="icofont-alarm"></i>
                    <div class="lateral-nome">
                    &nbspEmergências & Alarmes
                    </div>
                </a>
            </li>

            <?php endif ?>
           
            <?php 
                $dministrativo = leftPaciente;
                $permission = $_SESSION['permission'][$dministrativo];
                $mystring = $permission->identificacao;

                if($user->codigo_profissional == 0 ){
                    $findme = "0";
                }else {
                    $findme = $user->CBO;
                }
            
                if(!(strpos($mystring, $findme) === false) || $user->is_admin): 
            ?>

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
            <li class="nav-item _filho  _nav-paciente-filho w3-hide w3-animate-top  ">
                <a href="monitoramentos.php">
                    
                    <div class="lateral-lista-paciente _demoAccMon ml-5">
                        Monitoramentos
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
            <li   class="nav-item _filho _nav-paciente-filho w3-hide w3-animate-top  ">
                <a href="ListaSinaisAdm.php">
                    
                    <div class="lateral-lista-paciente _demoAcc8 ml-5">
                    Customização de sinais vitais
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
            <?php endif ?>

            <?php 
                $dministrativo = leftAgenda;
                $permission = $_SESSION['permission'][$dministrativo];
                $mystring = $permission->identificacao;

                if($user->codigo_profissional == 0 ){
                    $findme = "0";
                }else {
                    $findme = $user->CBO;
                }
            
                if(!(strpos($mystring, $findme) === false) || $user->is_admin): 
            ?>

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
                    Agenda do paciente
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
            <?php endif ?>

            <?php 
                $dministrativo = leftProgramacoes;
                $permission = $_SESSION['permission'][$dministrativo];
                $mystring = $permission->identificacao;

                if($user->codigo_profissional == 0 ){
                    $findme = "0";
                }else {
                    $findme = $user->CBO;
                }
            
                if(!(strpos($mystring, $findme) === false) || $user->is_admin): 
            ?>
            <li class="nav-item _pai _nav-item-programacao" onclick="drop_programacao('_nav-item-programacao','ico-programacao','nav-programacao-filho','nav-programacao-filho')">
                <a>
                    <i class="icofont-bag-alt mr-2"></i>
                    <div  class="lateral-nome">
                    Programações
                    </div>
                    <i id="ico-programacao" class="icofont-simple-down ml-2"></i>
                </a>
            </li>
            <li class="nav-item _filho nav-programacao-filho w3-hide w3-animate-top  ">
                <a href="ListaProgCuidados.php">
                    
                    <div class="lateral-lista-paciente _demoProg1 ml-5">
                        Programação de cuidados
                    </div>
                </a>
            </li>
            <li class="nav-item _filho nav-programacao-filho w3-hide w3-animate-top  ">
                <a href="ListaProgMedicamentos.php">
                    
                    <div class="lateral-lista-paciente  _demoProg2 ml-5">
                     Programação de medicação
                    </div>
                </a>
            </li>
            <li class="nav-item _filho nav-programacao-filho w3-hide w3-animate-top  ">
                <a href="ListaSinaisVitais1.php">
                    
                    <div class="lateral-lista-paciente _demoProg3 ml-5">
                    Programação de sinais vitais
                    </div>
                </a>
            </li>
            <?php endif ?>

            <?php 
                $dministrativo = leftMonitoramento;
                $permission = $_SESSION['permission'][$dministrativo];
                $mystring = $permission->identificacao;

                    if($user->codigo_profissional == 0 ){
        $findme = "0";
    }else {
        $findme = $user->CBO;
    }
            
                if(!(strpos($mystring, $findme) === false) || $user->is_admin): 
            ?>
            <li class="nav-item _pai _nav-item-monitoramento" onclick="drop_monitoramentos('_nav-item-monitoramento','ico-monitoramento','_nav-monitoramento-filho','_nav-monitoramento-filho')">
                <a>
                    <i class="icofont-computer mr-2"></i>
                    <div  class="lateral-nome">
                    Unidade de monitoramento
                    </div>
                    <i id="ico-monitoramento" class="icofont-simple-down ml-2"></i>
                </a>
            </li>
            <li class="nav-item _filho  _nav-monitoramento-filho w3-hide w3-animate-top  ">
                <a href="CoEscolhaListaConc.php">
                    
                    <div class="lateral-lista-paciente _demoMon1 ml-5">
                        Cadastro de concentradores
                    </div>
                </a>
            </li>
            <li class="nav-item _filho _nav-monitoramento-filho w3-hide w3-animate-top  ">
                <a href="CoEscolhaListaPac.php">
                    
                    <div class="lateral-lista-paciente _demoMon2 ml-5">
                        Associar paciente ao concentrador
                    </div>
                </a>
            </li>
            <li class="nav-item _filho _nav-monitoramento-filho w3-hide w3-animate-top  ">
                <a href="PacientesAssociados.php">
                    
                    <div class="lateral-lista-paciente _demoMon3 ml-5">
                        Pacientes Associados
                    </div>
                </a>
            </li>
            <?php endif ?>

            <?php 
                $dministrativo = leftMonitoramento;
                $permission = $_SESSION['permission'][$dministrativo];
                $mystring = $permission->identificacao;

                    if($user->codigo_profissional == 0 ){
        $findme = "0";
    }else {
        $findme = $user->CBO;
    }
            
                if(!(strpos($mystring, $findme) === false) || $user->is_admin): 
            ?>

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
            <?php endif ?>
            
            <?php 
            $dministrativo = leftAdministrativo;
            $permission = $_SESSION['permission'][$dministrativo];

                if($user->codigo_profissional == 0 ){
        $findme = "0";
    }else {
        $findme = $user->CBO;
    }
            $mystring = $permission->identificacao;

            if(!(strpos($mystring, $findme) === false) || $user->is_admin): 
            ?>

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

            <?php endif ?>
           
        </ul>
       

   
        
    </nav>
    
    
    

</aside>
<div  class="sidenav-mod" id="sidenavmod">
    <div class="closebtn-box">
        <a  class="closebtn" id='close-sidebar-mod' >
            <i class="icofont-arrow-left"></i>
        </a>
    </div>
    <div class="sidenav-menu-box">
        <a href="ListaPacientePanico.php" >&nbspEmergências & Alarmes</a>
    </div>
    <div class="sidenav-menu-box" onclick="drop_paciente('_nav-item-paciente','ico-paciente','_nav-paciente-filho','_nav-paciente-filho')">         
        <a href="#" >Pacientes</a>
    </div>
    <div class="sidenav-menu-box-filho  _nav-paciente-filho w3-hide w3-animate-top  " onclick="MenuEscPac()">
        <a href="EscolhaPaciente.php">
            <div class="lateral-lista-paciente _demoAcc1 ml-5">
                Escolha de paciente
            </div>
        </a>
    </div>
    <li class="sidenav-menu-box-filho  _nav-paciente-filho w3-hide w3-animate-top ">
        <a href="ListaPaciente.php">
            
            <div class="lateral-lista-paciente _demoAcc2 ml-5">
            Cadastro de pacientes
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho _nav-paciente-filho w3-hide w3-animate-top  ">
        <a href="ListaCuidador.php">
            
            <div class="lateral-lista-paciente _demoAcc3 ml-5">
            Cuidadores
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho _nav-paciente-filho w3-hide w3-animate-top  ">
        <a href="PTS.php">
            <div class="lateral-lista-paciente _demoAcc4 ml-5">
                PTS
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho _nav-paciente-filho w3-hide w3-animate-top  ">
        <a href="Evolucao2.php">
            
            <div class="lateral-lista-paciente _demoAcc5 ml-5">
                Evolução do paciente
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho  _nav-paciente-filho w3-hide w3-animate-top  ">
        <a href="monitoramentos.php">
            
            <div class="lateral-lista-paciente _demoAccMon ml-5">
                Monitoramentos
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho _nav-paciente-filho w3-hide w3-animate-top  ">
        <a href="Ocorrencias.php">
            
            <div class="lateral-lista-paciente _demoAcc6 ml-5">
                Histórico de sinais vitais
            </div>
        </a>
    </li>
    <li   class="sidenav-menu-box-filho _filho _nav-paciente-filho w3-hide w3-animate-top  ">
        <a href="ListaSinaisAdm.php">
            
            <div class="lateral-lista-paciente _demoAcc8 ml-5">
            Customização de sinais vitais
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho _nav-paciente-filho w3-hide w3-animate-top  ">
        <a href="ListaHistorico.php">
            
            <div class="lateral-lista-paciente _demoAcc7 ml-5">
                Histórico de emergências
            </div>
        </a>
    </li>
    <div class="sidenav-menu-box"  onclick="drop_agenda('_nav-item-agenda','ico-agenda','nav-agenda-filho','nav-agenda-filho')">
        <a href="#" >Agenda</a>
    </div>
    <li class="sidenav-menu-box-filho _filho nav-agenda-filho w3-hide w3-animate-top  ">
        <a href="ListaProfPac.php">
            
            <div class="lateral-lista-paciente _demoAgn1 ml-5">
            Agenda do paciente
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho nav-agenda-filho w3-hide w3-animate-top  ">
        <a href="ListaProfissional.php">
            
            <div class="lateral-lista-paciente _demoAgn2 ml-5">
            Agenda do profissional
            </div>
        </a>
    </li>
    <div class="sidenav-menu-box"  onclick="drop_programacao('_nav-item-programacao','ico-programacao','nav-programacao-filho','nav-programacao-filho')">
        <a href="#" >Programações</a>
    </div>
    <li class="sidenav-menu-box-filho _filho nav-programacao-filho w3-hide w3-animate-top  ">
        <a href="ListaProgCuidados.php">
            
            <div class="lateral-lista-paciente _demoProg1 ml-5">
                Programação de cuidados
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho nav-programacao-filho w3-hide w3-animate-top  ">
        <a href="ListaProgMedicamentos.php">
            
            <div class="lateral-lista-paciente  _demoProg2 ml-5">
                Programação de medicação
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho nav-programacao-filho w3-hide w3-animate-top  ">
        <a href="ListaSinaisVitais1.php">
            
            <div class="lateral-lista-paciente _demoProg3 ml-5">
            Programação de sinais vitais
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho nav-programacao-filho w3-hide w3-animate-top  ">
        <a href="ListaSinaisVitais1.php">
            
            <div class="lateral-lista-paciente _demoProg3 ml-5">
            Programação de sinais vitais
            </div>
        </a>
    </li>
    <div class="sidenav-menu-box" onclick="drop_monitoramentos('_nav-item-monitoramento','ico-monitoramento','_nav-monitoramento-filho','_nav-monitoramento-filho')">
        <a href="#" >Unidade de monitoramento</a>
    </div>
    <li class="sidenav-menu-box-filho _filho  _nav-monitoramento-filho w3-hide w3-animate-top  ">
        <a href="CoEscolhaListaConc.php">
            
            <div class="lateral-lista-paciente _demoMon1 ml-5">
                Cadastro de concentradores
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho _nav-monitoramento-filho w3-hide w3-animate-top  ">
        <a href="CoEscolhaListaPac.php">
            
            <div class="lateral-lista-paciente _demoMon2 ml-5">
                Associar paciente ao concentrador
            </div>
        </a>
    </li>
    <li class="sidenav-menu-box-filho _filho _nav-monitoramento-filho w3-hide w3-animate-top  ">
        <a href="PacientesAssociados.php">
            
            <div class="lateral-lista-paciente _demoMon3 ml-5">
                Pacientes Associados
            </div>
        </a>
    </li>
   <div class="sidenav-menu-box" onclick="drop_atencaoDom('_nav-item-atencaoDom','ico-atencaoDom','nav-atencao-filho','nav-atencao-filho')">
        <a href="#" >Atenção domiciliar</a>
   </div>
   <li class="sidenav-menu-box-filho _filho nav-atencao-filho w3-hide w3-animate-top  ">
        <a href="ListaAtencaoDom.php">
            
            <div class="lateral-lista-paciente _demoAtenD1 ml-5">
            Solicitação de atenção domiciliar
            </div>
        </a>
    </li>

    <div class="sidenav-menu-box" onclick="drop_adm('_nav-item-administrativo','ico-adm','nav-administrativo-filho','_nav-administrativo-filho')">
        <a href="#" >Administrativo</a>
    </div>
    <li   class="sidenav-menu-box-filho _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
        <a href="ListaSolicitacao.php">
            
            <div class="lateral-lista-paciente _demoAdm2 ml-5">
            Perfil de solicitação
            </div>
        </a>
    </li>
    <li   class="sidenav-menu-box-filho _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
        <a href="ListaInstituicao.php">
            
            <div class="lateral-lista-paciente _demoAdm3 ml-5">
            Instituição
            </div>
        </a>
    </li>
    <li   class="sidenav-menu-box-filho _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
        <a href="ListaMedicamentos.php">
            
            <div class="lateral-lista-paciente _demoAdm4 ml-5">
            Medicamentos
            </div>
        </a>
    </li>
    <li   class="sidenav-menu-box-filho _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
        <a href="ListaCuidadosAdm.php">
            
            <div class="lateral-lista-paciente _demoAdm5 ml-5">
            Cuidados
            </div>
        </a>
    </li>

    <li   class="sidenav-menu-box-filho _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
        <a href="ListaProfissionaisAdm.php">
            
            <div class="lateral-lista-paciente _demoAdm7 ml-5">
            Profissionais
            </div>
        </a>
    </li>
    <li   class="sidenav-menu-box-filho _filho _nav-administrativo-filho w3-hide w3-animate-top  ">
        <a href="ListaOperadoresAdm.php">
            
            <div class="lateral-lista-paciente _demoAdm8 ml-5">
            Operadores
            </div>
        </a>
    </li>
    
</div>
<script type="text/javascript">
$( "#close-sidebar-mod" ).click(function() {
    if($("#sidenavmod").hasClass("sidenav-mod"))  {
        $("#sidenavmod").removeClass('sidenav-mod');
        $("#sidenavmod").addClass('sidenav');
      } else{
        $("#sidenavmod").removeClass('sidenav');
        $("#sidenavmod").addClass('sidenav-mod');
      }
});
</script>
