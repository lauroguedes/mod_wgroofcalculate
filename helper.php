<?php
/**
 * @package         Leowgweb.Module
 * @subpackage      mod_wgroofcalculate
 * @copyright       Copyright (C) 2016 Leowgweb.com, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

abstract class modWGRoofCalculateHelper
{

    /**
     * Desmembra os tipos de telhas
     * @access public
     */
    public static function getTypeRoof($params)
    {
        $typesRoof = explode("\n", $params->get('typesofroof'));

        foreach($typesRoof as $types){
            $typesRoofSeparate[] = explode('|', $types);
        }

        return $typesRoofSeparate;
    }

    /**
     * Trata a atribuição das dependências do módulo
     * @access public
     */
    public static function pullDependecies()
    {
        $doc   = JFactory::getDocument();
        $app = JFactory::getApplication();
        $template = $app->getTemplate();

        if(file_exists(JPATH_BASE.'/templates/'.$template.'/html/mod_wgroofcalculate/assets/js/wgroofcalculate.js')){
            $doc->addScript(JURI::base().'templates/'.$template.'/html/mod_wgroofcalculate/assets/js/wgroofcalculate.js');
        }else{
            $doc->addScript(JURI::base().'modules/mod_wgroofcalculate/tmpl/assets/js/wgroofcalculate.js');
        }

        if(file_exists(JPATH_BASE.'/templates/'.$template.'/html/mod_wgroofcalculate/assets/css/wgroofcalculate.css')){
            $doc->addStyleSheet(JURI::base().'templates/'.$template.'/html/mod_wgroofcalculate/assets/css/wgroofcalculate.css');
        }else{
            $doc->addStyleSheet(JURI::base().'modules/mod_wgroofcalculate/tmpl/assets/css/wgroofcalculate.css');
        }
    }

    /**
     * Trata o envio dos dados via ajax
     *
     * @access public
     */
    public static function getAjax()
    {
        jimport('joomla.application.module.helper');

        // Chama a biblioteca que trata campos de formulário
        $input = JFactory::getApplication()->input;

        // Chama biblioteca que trata os dados vindo das configurações no backend
        $module = JModuleHelper::getModule('wgroofcalculate');
        $params = new JRegistry();
        $params->loadString($module->params);

        $percent = $params->get('increase');

        // pega os campos digitados pelo usuário no formulário de contato
        $inputs = $input->get('data', array(), 'ARRAY');

        // atribui os campos nas variáveis
        foreach ($inputs as $input) {

            if( $input['name'] == 'areasize' )
            {
                $areasize = $input['value'];
            }

            if( $input['name'] == 'correctfactor' )
            {
                $correctfactor = $input['value'];
            }

            if( $input['name'] == 'rooftype' )
            {
                $rooftype = $input['value'];
            }
        }

        $valuesToCaculate = modWGRoofCalculateHelper::dismemberValue($rooftype);

        $roofCalculate = $areasize * $correctfactor * $valuesToCaculate[1];
        $roofCalculateTotal = round($roofCalculate + (($roofCalculate * $percent)/100));
        $roofCalculateResult = ['totalRoof' => $roofCalculateTotal, 'totalWeight' => ($roofCalculateTotal * $valuesToCaculate[0])];

        return json_encode($roofCalculateResult);
    }

    /**
     * Desmenbra opção escolhida no frontend
     *
     * @access public
     */
    public static function dismemberValue($value)
    {
        $dismenberedValues = explode('|', $value);

        return $dismenberedValues;
    }
}
