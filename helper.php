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
    public static function getTypeRoof($params)
    {
        $typesRoof = explode("\n", $params->get('typesofroof'));

        foreach($typesRoof as $types){
            $typesRoofSeparate[] = explode('|', $types);
        }

        return $typesRoofSeparate;
    }
}
