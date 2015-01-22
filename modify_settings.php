<?php

/*
 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2007, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

require('../../config.php');

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

// include core functions of WB 2.7 to edit the optional module CSS files (frontend.css, backend.css)
@include_once(WB_PATH .'/framework/module.functions.php');

// Load Language file
if(LANGUAGE_LOADED) {
    require_once(WB_PATH.'/modules/jqCollapse/languages/EN.php');
    if(file_exists(WB_PATH.'/modules/jqCollapse/languages/'.LANGUAGE.'.php')) {
        require_once(WB_PATH.'/modules/jqCollapse/languages/'.LANGUAGE.'.php');
    }
}

// Get header and footer
$query_settings = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_jqCollapse_settings WHERE section_id='$section_id'");
$fetch_settings = $query_settings->fetchRow();



// check if backend.css file needs to be included into the <body></body> of modify.php
if(!method_exists($admin, 'register_backend_modfiles') && file_exists(WB_PATH ."/modules/form/backend.css")) {
	echo '<style type="text/css">';
	include(WB_PATH .'/modules/form/backend.css');
	echo "\n</style>\n";
}
	
// include the button to edit the optional module CSS files (function added with WB 2.7)
// Note: CSS styles for the button are defined in backend.css (div class="mod_moduledirectory_edit_css")
// Place this call outside of any <form></form> construct!!!
if(function_exists('edit_module_css')) {
	edit_module_css('jqCollapse');
}
?>

<form name="edit" action="<?php echo WB_URL; ?>/modules/jqCollapse/save_settings.php" method="post" style="margin: 0;">

<input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
<input type="hidden" name="page_id" value="<?php echo $page_id; ?>">

<table class="row_a" cellpadding="2" cellspacing="0" border="0" align="center" width="100%">
<tr>
	<td colspan="2"><strong><?php echo $FQTEXT['SETTINGS']; ?></strong></td>
</tr>
<tr>
	<td class="setting_name">
		<?php echo $FQTEXT['COLOR']; ?>:<br />
	</td>
	<td class="setting_value">
	<select id="colors" name="color">		
		<option value="<?php echo $admin->strip_slashes($fetch_settings['color']); ?>" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/<?php echo $admin->strip_slashes($fetch_settings['color']); ?>.png" data-description="<?php echo $FQTEXT['ACTIVE_COLOR']; ?>"><?php echo $FQTEXT['CHOOSE_COLOR']; ?></option>
		<option value="blue" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/blue.png" data-description=""><?php echo $FQTEXT['BLUE']; ?></option>
		<option value="dark-blue" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/dark-blue.png" data-description=""><?php echo $FQTEXT['DARK_BLUE']; ?></option>
		<option value="dark-gray" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/dark-gray.png" data-description=""><?php echo $FQTEXT['DARK_GRAY']; ?></option>
		<option value="salmon" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/salmon.png" data-description=""><?php echo $FQTEXT['SALMON']; ?></option>
		<option value="orange" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/orange.png" data-description=""><?php echo $FQTEXT['ORANGE']; ?></option>
		<option value="mint" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/mint.png" data-description=""><?php echo $FQTEXT['MINT']; ?></option>
		<option value="pink" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/pink.png" data-description=""><?php echo $FQTEXT['PINK']; ?></option>
		<option value="purple" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/purple.png" data-description=""><?php echo $FQTEXT['PURPLE']; ?></option>
		<option value="yellow" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/yellow.png" data-description=""><?php echo $FQTEXT['YELLOW']; ?></option>
		<option value="white" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/white.png" data-description=""><?php echo $FQTEXT['WHITE']; ?></option>
	</select>
	</td>
</tr>
<tr>
	<td class="setting_name">
		<?php echo $FQTEXT['GRADIENT']; ?>:
	</td>
	<td class="setting_value">
		<select id="gradients" name="gradient">		
			<option value="<?php echo $admin->strip_slashes($fetch_settings['gradient']); ?>" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/<?php echo $admin->strip_slashes($fetch_settings['gradient']); ?>.png" data-description="<?php echo $FQTEXT['ACTIVE_GRADIENT']; ?>"><?php echo $FQTEXT['CHOOSE_GRADIENT']; ?></option>
			<option value="no-gradient" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/no-gradient.png" data-description=""><?php echo $FQTEXT['NO_GRADIENT']; ?></option>
			<option value="gradient" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/gradient.png" data-description=""><?php echo $FQTEXT['GRADIENT']; ?></option>
		</select>
	</td>
</tr>
<tr>
	<td class="setting_name">
		<?php echo $FQTEXT['ICON']; ?>:
	</td>
	<td class="setting_value">
		<select id="icons" name="icon">
			<option value="<?php echo $admin->strip_slashes($fetch_settings['icon']); ?>" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/<?php echo $admin->strip_slashes($fetch_settings['icon']); ?>.png" data-description="<?php echo $FQTEXT['ACTIVE_ICON']; ?>"><?php echo $FQTEXT['CHOOSE_ICON']; ?></option>
			<option value="default" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/default.png" data-description=""><?php echo $FQTEXT['DEFAULT_ICON']; ?></option>
			<option value="chevrons" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/chevrons.png" data-description=""><?php echo $FQTEXT['CHEVRONS']; ?></option>
			<option value="signs" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/signs.png" data-description=""><?php echo $FQTEXT['SIGNS']; ?></option>
			<option value="carets" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/carets.png" data-description=""><?php echo $FQTEXT['CARETS']; ?></option>
			<option value="circle-arrows" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/circle-arrows.png" data-description=""><?php echo $FQTEXT['CIRCLE_ARROWS']; ?></option>
		</select>
	</td>
</tr>
<tr>
	<td class="setting_name">
		<?php echo $FQTEXT['FONTANDICONCOLOR']; ?>: <!- Needs to be translated->
	</td>
	<td class="setting_value">
		<select id="fontcolors" name="fontcolor">		
		<option value="<?php echo $admin->strip_slashes($fetch_settings['fontcolor']); ?>" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/<?php echo $admin->strip_slashes($fetch_settings['fontcolor']); ?>.png" data-description="<?php echo $FQTEXT['ACTIVE_TEXTCOLOR']; ?>"><?php echo $FQTEXT['CHOOSE_TEXTCOLOR']; ?></option>
		<option value="white" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/white.png" data-description=""><?php echo $FQTEXT['WHITE']; ?></option>
		<option value="black" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/black.png" data-description=""><?php echo $FQTEXT['BLACK']; ?></option>
		<option value="dark-gray" data-image="<?php echo WB_URL; ?>/modules/jqCollapse/images/msdropdown/icons/dark-gray.png" data-description=""><?php echo $FQTEXT['DARK_GRAY']; ?></option>
	</select>
		<!--<textarea name="fontcolor" style="width: 98%;"><?php echo $admin->strip_slashes($fetch_settings['fontcolor']); ?></textarea>-->
	</td>
</tr>
<tr>
	<td class="setting_name">
		<?php echo $TEXT['HEADER']; ?>:
	</td>
	<td class="setting_value">
		<textarea name="header" style="width: 98%;"><?php echo $admin->strip_slashes($fetch_settings['header']); ?></textarea>
	</td>
</tr>
<tr>
	<td class="setting_name" style="width: 200px">
		<?php echo $TEXT['FOOTER']; ?>:
	</td>
	<td class="setting_value">
		<textarea name="footer" style="width: 98%;"><?php echo $admin->strip_slashes($fetch_settings['footer']); ?></textarea>
	</td>
</tr>
<tr>
	<td class="setting_name" style="width: 200px">
		<?php echo $FQTEXT['TEMPLATE_DETAIL']; ?>:
	</td>
	<td class="setting_value">	
		<textarea name="template_details" style="width: 98%; height:200px;"><?php echo $admin->strip_slashes($fetch_settings['template_details']); ?></textarea>
	</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<td align="left">
		<input name="save" type="submit" value="<?php echo $TEXT['SAVE']; ?>" style="width: 100px; margin-top: 5px;"></form>
	</td>
	<td align="right">
		<input type="button" value="<?php echo $TEXT['CANCEL']; ?>" onclick="javascript: window.location = '<?php echo ADMIN_URL; ?>/pages/modify.php?page_id=<?php echo $page_id; ?>';" style="width: 100px; margin-top: 5px;" />
	</td>
</tr>
</table>



<script>
$(document).ready(function(e) {
	$("#colors").msDropdown({});
	$("#gradients").msDropdown({});
	$("#icons").msDropdown({});
	$("#fontcolors").msDropdown({});
});
</script>



<?php
// Print admin footer
$admin->print_footer();

?>
