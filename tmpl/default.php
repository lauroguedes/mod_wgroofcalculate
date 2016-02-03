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
<div class="example-module-wrap<?php echo $moduleclass_sfx; ?>">
    <div class="example-module-wrap-inner">
        
        <ul class="example-module-list nav nav-tabs nav-stacked">
        <?php foreach( $items as $item ): ?>
            <li class="example-module-list-item">
                <?php echo JHtml::_('link', $item->link, "{$item->a_created} - {$item->a_title}"); ?>
            </li>
        <?php endforeach; ?>
        </ul>
        
    </div>
</div>