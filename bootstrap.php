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
require_once('vendor/autoload.php');

/**
 * VALORES CONFIGURACAO DO BANCO DE DADOS
 */
@define(DB_HOST, 'localhost');
@define(DB_USER, 'root');
@define(DB_PASS, 'toor');
@define(DB_NAME, 'uosh');

//Instances
global $app;
$app = new \Silex\Application;
$app['DB'] = new Umbrella\Database\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Configs
$app['debug'] = true;


//Registers
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));
