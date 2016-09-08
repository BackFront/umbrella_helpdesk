<?php
/**
 * <b>Helper</b>
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

namespace Umbrella {

    class Helper
    {

        //Extract objects to array
        public static function extractArray(array $data)
        {
            foreach ($data as $key => $value):
                if (is_array($value)):
                    $new_data[$key] = self::extractArray($value);
                elseif (is_object($value)):
                    $new_data[$key] = self::extractArray((array) $value);
                else:
                    $new_data[$key] = utf8_encode($value);
                endif;
            endforeach;
            return $new_data;
        }

    }
}