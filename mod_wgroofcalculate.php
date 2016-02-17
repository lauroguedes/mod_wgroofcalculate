<?php
/**
 * @package         Leowgweb.Module
 * @subpackage      mod_wgroofcalculate
 * @copyright       Copyright (C) 2016 Leowgweb.com, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$typesofroofs       = modWGRoofCalculateHelper::getTypeRoof($params);
$moduleclass_sfx    = htmlspecialchars($params->get('moduleclass_sfx'));
$formsize           = $params->get('formsize');
$formalign          = $params->get('formalign');
$fieldalign         = $params->get('fieldalign');
$fieldposition      = $params->get('fieldposition');

// declarando dependências
$pathimage = modWGRoofCalculateHelper::pullDependecies();

require JModuleHelper::getLayoutPath('mod_wgroofcalculate', $params->get('layout', 'default'));