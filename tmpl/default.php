<?php
/**
 * @package         Leowgweb.Module
 * @subpackage      mod_wgroofcalculate
 * @copyright       Copyright (C) 2016 Leowgweb.com, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// classes controladores de conflito
$wgSendData = 'wgSendData'.$module->id;
$wgIdContent = 'wgIdContent'.$module->id;

?>
<div class="wg-roof-content <?php echo $formalign; ?> <?php echo $moduleclass_sfx; ?>" id="<?php echo $wgIdContent; ?>">
    <form id="<?php echo $wgSendData; ?>" method="post" class="wg-roof-form <?php echo $fieldalign; ?> <?php echo $fieldposition; ?>" style="width: <?php echo $formsize; ?>%">
        <div class="wg-roof-response-content">
            <i id="close-response" class="icon-remove"></i>
            <div class="wg-roof-response"></div>
        </div>
        <div class="wg-roof-loading-content">
            <div class="wg-roof-loading">
                <img src="<?php echo $pathimage; ?>" alt="Carregando..." />
            </div>
        </div>
        <div class="wg-roof-fields">
            <label class="wg-roof-label" for="areasize"> <?php echo JText::_('MOD_WGROOFCALCULATE_LABEL_AREA'); ?> </label>
            <input type="text" name="areasize" class="wg-roof-input" id="areasize">
        </div>
        <div class="wg-roof-fields">
            <label class="wg-roof-label" for="correctfactor"><?php echo JText::_('MOD_WGROOFCALCULATE_LABEL_FACTOR'); ?></label>
            <select name="correctfactor" id="correctfactor" class="wg-roof-input">
                <option value="" disabled selected><?php echo JText::_('MOD_WGROOFCALCULATE_LABEL_FACTOR_OPTION'); ?></option>
                <option value="1.044">30% - 16°42' - 1,044</option>
                <option value="1.047">31% - 17°13' - 1,047</option>
                <option value="1.050">32% - 17°44' - 1,050</option>
                <option value="1.053">33% - 18°15' - 1,053</option>
                <option value="1.056">34% - 18°46' - 1,056</option>
                <option value="1.059">35% - 19°17' - 1,059</option>
                <option value="1.063">36% - 19°48' - 1,063</option>
                <option value="1.066">37% - 20°18' - 1,066</option>
                <option value="1.070">38% - 20°48' - 1,070</option>
                <option value="1.073">39% - 21°18' - 1,073</option>
                <option value="1.077">40% - 21°48' - 1,077</option>
                <option value="1.081">41% - 22°17' - 1,081</option>
                <option value="1.085">42% - 22°47' - 1,085</option>
                <option value="1.089">43% - 23°16' - 1,089</option>
                <option value="1.093">44% - 23°45' - 1,093</option>
                <option value="1.097">45% - 24°13' - 1,097</option>
                <option value="1.10">46% - 24°42' - 1,10</option>
                <option value="1.104">47% - 25°10' - 1,104</option>
                <option value="1.109">48% - 25°38' - 1,109</option>
                <option value="1.114">49% - 26°06' - 1,114</option>
                <option value="1.118">50% - 26°34' - 1,118</option>
                <option value="1.123">51% - 27°01' - 1,123</option>
                <option value="1.127">52% - 27°28' - 1,127</option>
            </select>
        </div>
        <div class="wg-roof-fields">
            <label class="wg-roof-label" for="rooftype"><?php echo JText::_('MOD_WGROOFCALCULATE_LABEL_ROOFTYPE'); ?></label>
            <select name="rooftype" id="rooftype" class="wg-roof-input">
                <option value="" disabled selected><?php echo JText::_('MOD_WGROOFCALCULATE_LABEL_ROOFTYPE_OPTION'); ?></option>
                <?php foreach($typesofroofs as $option) : ?>
                    <option value="<?php echo $option[1].'|'.$option[2] ?>"><?php echo $option[0]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="wg-roof-button"><?php echo JText::_('MOD_WGROOFCALCULATE_BUTTON_CALC'); ?></button>
    </form>
</div>

<script>
    wgModRequestAjax.getId("<?php echo $wgSendData; ?>", "<?php echo $wgIdContent; ?>");
</script>