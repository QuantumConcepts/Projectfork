<?php
/**
* @package      Projectfork Task Distribution Statistics
*
* @author       Tobias Kuhn (eaxs)
* @copyright    Copyright (C) 2006-2012 Tobias Kuhn. All rights reserved.
* @license      http://www.gnu.org/licenses/gpl.html GNU/GPL, see LICENSE.txt
**/

defined('_JEXEC') or die();


// Initialize the chart
$doc = JFactory::getDocument();
$doc->addScriptDeclaration("jQuery(function()
{
    var data = " . json_encode($stats) . ";
    jQuery.plot(jQuery('#mod-pf-stats-dist-" . $module->id . "'), data,
    {
        series: {
 			pie: {
        		show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 3/4,
                    formatter: function(label, series) {
                        return '<div style=\'font-size:8pt;text-align:center;padding:2px;color:white;\'>'+label+'<br/>'+Math.round(series.percent)+'%</div>';
                    },
                    background: {
                        opacity: 0.5
                    }
                }
        	}
        },
        legend: {
            show: false
        }
    });
});");
?>
<div id="mod-pf-stats-dist-<?php echo $module->id;?>" style="<?php echo $css_w . $css_h;?>"></div>