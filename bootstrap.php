<?php
/**
 * Project Name: UOSH
 * Project URI: https://github.com/backfront/Uosh
 * Description: Umbrella Online Systen Helpdesk
 * Version: 1.0.0
 * Author: Douglas Alves
 * Author URI: http://alvesdouglas.com.br/
 * License: Apache License 2.0
 * 
 * @package Umbrella
 * @subpackage UOSH
 * @version 1.0.0
 * 
 * @author Douglas Alves <alves.douglaz@gmail.com>
 * @link https://github.com/backfront/ Project Repository
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @since 1.0.0
 */
if(!isset($_SESSION))
    session_start();

$loader = require_once 'vendor/autoload.php';
use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\EventManager as EventManager,
    Doctrine\ORM\Events,
    Doctrine\ORM\Configuration,
    Doctrine\Common\Cache\ArrayCache as Cache,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\Common\ClassLoader;

/**
 * VALORES CONFIGURACAO DO BANCO DE DADOS
 */
@define(DB_HOST, 'localhost');
@define(DB_USER, 'root');
@define(DB_PASS, 'toor');
@define(DB_NAME, 'uosh');
@define(DB_PORT, 3306);


//Instances
$cache = new Doctrine\Common\Cache\ArrayCache;
$annotationReader = new Doctrine\Common\Annotations\AnnotationReader;
$app = new \Silex\Application;

/**
 * Configurações do Doctrine
 */
$cachedAnnotationReader = new Doctrine\Common\Annotations\CachedReader(
        $annotationReader, // use reader
        $cache // and a cache driver
);

$annotationDriver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
        $cachedAnnotationReader, // our cached annotation reader
        array(__DIR__ . DIRECTORY_SEPARATOR . 'src')
);
$driverChain = new Doctrine\ORM\Mapping\Driver\DriverChain();
$driverChain->addDriver($annotationDriver, 'Uosh');


$config = new Doctrine\ORM\Configuration;
$config->setProxyDir('/tmp');
$config->setProxyNamespace('Proxy');
$config->setAutoGenerateProxyClasses(true); // this can be based on production config.
// register metadata driver
$config->setMetadataDriverImpl($driverChain);
// use our allready initialized cache driver
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

AnnotationRegistry::registerFile(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'DoctrineAnnotations.php');

$evm = new Doctrine\Common\EventManager();
$em = EntityManager::create(
                array('driver' => 'pdo_mysql',
            'host' => DB_HOST,
            'port' => DB_PORT,
            'dbname' => DB_NAME,
            'user' => DB_USER,
            'password' => DB_PASS
                ), $config, $evm
);

/* End Configs Doctrine */


//Configs
$app['debug'] = true;

if($app['debug']) :
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
endif;

//Registers
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views'
));
