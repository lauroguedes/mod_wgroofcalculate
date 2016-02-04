<?php
/**
 * @package         Leowgweb.Module
 * @subpackage      mod_wgroofcalculate
 * @copyright       Copyright (C) 2016 Leowgweb.com, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

?>
<div class="wg-modroofcalculate <?php echo $moduleclass_sfx; ?>">
    <form id="wgSendData" action="#" method="post">
        <div class="form-group">
            <label for="areasize">Entre com a área a ser coberta em m²: </label>
            <input type="text" name="areasize" class="form-control" id="areasize">
        </div>
        <div class="form-group">
            <label for="correctfactor">Fator de Correção(%)</label>
            <input type="text" value="30" name="correctfactor" class="form-control" id="correctfactor">
        </div>
        <div class="form-group">
            <label for="rooftype">Modelo da Telha</label>
            <select name="rooftype" id="rooftype" class="form-control">
                <?php foreach($typesofroofs as $option) : ?>
                    <option value="<?php echo $option[1] ?>"><?php echo $option[0]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Calcular</button>
    </form>
    <div class="response-calculate">
        <p class="alert alert-success">Teste</p>
    </div>
</div>