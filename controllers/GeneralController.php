<?php
/**
 * <b>Home</b>
 * 
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
namespace Controller
{

    use Umbrella\Authentication;

    abstract class GeneralController
    {

        protected $variables;
        protected $generalVar;
        protected $currentPage;

        function __construct()
        {
            $this->generalVar["page_title"] = 'teste';
            $this->generalVar['charset'] = "uff-8";
            $this->generalVar['language_attributes'] = "pt-br";
            $this->generalVar['page_author'] = "Douglas Alves";
            $this->generalVar['scripts'] = array(
                "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js",                
                "/assets/dist/semantic_ui/semantic.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.1/isotope.pkgd.js",
                "/assets/js/mainscript.js"
            );
            $this->generalVar['styles'] = array(
                "/assets/dist/semantic_ui/semantic.min.css",
                "/assets/css/grid_system.css",
                "/assets/css/mainstyle.css"
            );
        }

        public function page($page)
        {
            $this->currentPage = $page;

            /** @var GeneralController */
            return $this;
        }

        public function setVariable($key, $value)
        {
            $this->generalVar[$key] = $value;
            return $this;
        }

        public function getVariables($page)
        {
            $this->variables[$page] = $this->generalVar;
            return $this->variables[$page];
        }

        //Verify if user is logged
        public static function auth($args)
        {
            $is_auth = new Authentication($args->EntityManager);
            $is_auth->setLevel($args->auth['level']);

            if($is_auth->isAuth()):
                return true;
            endif;
            return false;
        }

    }

}
             