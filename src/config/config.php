<?php
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
//$currentLocale  = setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
//setlocale(LC_ALL, 'pt_BR');

//tabelas de constantes 
// - permissao
// 0;1;2;3;4;5;6;7;8;9
//constante de tela
//é linkado pelo id, sendo o numero do codigo igual ao id do banco +1
//homeIndex  1 codigo -> banco id = 2 
define('leftAdministrativo', 0);
define('homeIndex', 1);
define('telaListaPacientePanicoIndex', 2);

define('leftHome', 3);
define('leftEmergencia', 4);
define('leftPaciente', 5);
define('leftAgenda', 6);
define('leftProgramacoes', 7);
define('leftMonitoramento', 8);
define('leftAtencao', 9);

define('tudoIndex', 10);





//Constantes gerais
define('DAYLY_TIME', 60*60*8);
//IP novo
//inside

define('IP_PAGINA_IN', '127.0.0.1:80');//[0]
define('IP_SERVIDOR_IN', '127.0.0.1:8401');//[1]
define('IP_SERVIDOR_LOCAL', '127.0.0.1:8401');

//include '/var/www/html/SaudeOn_lorion/ips_defines.dah';

//outside

define('IP_PAGINA_OUT', 'saudeon.giize.com:80');//[0]   /* Resp */
define('IP_SERVIDOR_OUT', 'saudeon.giize.com:8401');//[1] /* Resp */

//pastas

define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));

//arquivos
require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(realpath(dirname(__FILE__) . '/sessionPac.php'));
require_once(realpath(dirname(__FILE__) . '/date_utils.php'));
require_once(realpath(dirname(__FILE__) . '/utils.php'));
//require_once('concentrador/concentrador.php');
//require_once('buttompanic/panic.php');
require_once(realpath(MODEL_PATH . '/model.php'));
require_once(realpath(MODEL_PATH . '/user.php'));
require_once(realpath(MODEL_PATH . '/profissional.php'));
require_once(realpath(MODEL_PATH . '/concentrador.php'));
require_once(realpath(MODEL_PATH . '/equipo_concentrador.php'));
require_once(realpath(MODEL_PATH . '/paciente.php'));
require_once(realpath(MODEL_PATH . '/exame.php'));
require_once(realpath(MODEL_PATH . '/agenda.php'));
require_once(realpath(MODEL_PATH . '/assets.php'));
require_once(realpath(EXCEPTION_PATH . '/appException.php'));
require_once(realpath(EXCEPTION_PATH . '/validationException.php'));
