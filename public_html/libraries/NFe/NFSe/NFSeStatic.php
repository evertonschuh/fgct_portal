<?php

//namespace NFePHP\NFSe;

/**
 * Classe para a instanciação das classes espcificas de cada municipio
 * atendido pela API
 *
 * @category  NFePHP
 * @package   NFePHP\NFSe\NFSeStatic
 * @copyright NFePHP Copyright (c) 2016
 * @license   http://www.gnu.org/licenses/lgpl.txt LGPLv3+
 * @license   https://opensource.org/licenses/MIT MIT
 * @license   http://www.gnu.org/licenses/gpl.txt GPLv3+
 * @author    Roberto L. Machado <linux.rlm at gmail dot com>
 * @link      http://github.com/nfephp-org/sped-nfse for the canonical source repository
 */

//use NFePHP\NFSe\Counties;
//use NFePHP\Common\Certificate;
//use stdClass;
//use RuntimeException;

//require_once(JPATH_LIBRARIES . DS . 'NFe'. DS . 'NFSe' . DS . 'Counties');

require_once(JPATH_LIBRARIES . DS . 'NFe'. DS . 'Common' . DS . 'Certificate.php');



class NFSeStatic
{
    /**
     * Instancia a classe usada na conversão dos arquivos txt em RPS
     * @param string $config
     * @return \NFePHP\NFSe\Counties\class
     */
    public static function convert(stdClass $config)
    {
        return self::classCheck(self::getClassName($config, 'Convert'), $config);
    }
    
    /**
     * Instancia a classe usada na construção do RPS
     * para um municipio em particular
     *
     * @param stdClass $config
     * @return \NFePHP\NFSe\Counties\class
     */
    public static function rps(stdClass $config)
    {
        return self::classCheck(self::getClassName($config, 'Rps'), $config);
    }

    /**
     * Instancia a classe usada na comunicação com o webservice
     * para um municipio em particular
     *
     * @param stdClass $config
     * @param NFePHP\Common\Certificate $certificate
     * @return \NFePHP\NFSe\Counties\class
     */
    public static function tools(stdClass $config, Certificate $certificate)
    {
        return self::classCheck(self::getClassName($config, 'Tools'), $config, $certificate);
    }
    
    /**
     * Instancia a classe que converte o xml de resposta em
     * uma stdClass
     * @return \NFePHP\NFSe\Counties\class
     */
    public static function response(stdClass $config)
    {
        return self::classCheck(self::getClassName($config, 'Response'), $config);
    }
    
    /**
     * Monta o nome das classes referentes a determinado municipio
     *
     * @param stdClass $config
     * @param string $complement
     * @return string
     */
    private static function getClassName(stdClass $config, $complement)
    {
		require_once(JPATH_LIBRARIES . DS . 'NFe'. DS . 'NFSe' . DS . 'Counties'. DS . 'M' . $config->cmun . DS . $complement. '.php');
		return $complement;
    }
    
    /**
     * Instancia e retorna a classe desejada
     *
     * @param string $className
     * @param stdClass $config
     * @param NFePHP\Common\Certificate|null $certificate
     * @return \NFePHP\NFSe\className
     * @throws RuntimeException
     */
    private static function classCheck($className, stdClass $config, $certificate = null)
    {
        if (class_exists($className)) {
            return new $className($config, $certificate);
        }

        $msg = 'Este municipio não é atendido pela API.';
        throw new RuntimeException($msg);
    }
}
