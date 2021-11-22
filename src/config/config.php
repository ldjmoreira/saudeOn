<?php
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
//$currentLocale  = setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
//setlocale(LC_ALL, 'pt_BR');

//Constantes gerais
define('DAYLY_TIME', 60*60*8);
//IP novo
//inside
define('IP_PAGINA_IN', '192.168.1.7:81');//[0]
define('IP_SERVIDOR_IN', '192.168.1.7:8401');//[1]

//outside
define('IP_PAGINA_OUT', 'saudeon.giize.com:81');//[0]
define('IP_SERVIDOR_OUT', 'saudeon.giize.com:8401');//[1]

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
require_once(realpath(MODEL_PATH . '/model.php'));
require_once(realpath(MODEL_PATH . '/user.php'));
require_once(realpath(MODEL_PATH . '/profissional.php'));
require_once(realpath(MODEL_PATH . '/concentrador.php'));
require_once(realpath(MODEL_PATH . '/paciente.php'));
require_once(realpath(MODEL_PATH . '/exame.php'));
require_once(realpath(MODEL_PATH . '/agenda.php'));
require_once(realpath(MODEL_PATH . '/assets.php'));
require_once(realpath(EXCEPTION_PATH . '/appException.php'));
require_once(realpath(EXCEPTION_PATH . '/validationException.php'));