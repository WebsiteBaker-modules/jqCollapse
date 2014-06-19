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

// Get id
if(!isset($_POST['question_id']) OR !is_numeric($_POST['question_id'])) {
	header("Location: ".ADMIN_URL."/pages/index.php");
} else {
	$question_id = $_POST['question_id'];
}

// Include WB admin wrapper script
$update_when_modified = true; // Tells script to update when this page was last updated
require(WB_PATH.'/modules/admin.php');

// Validate all fields
if($admin->get_post('question') == '' AND $admin->get_post('answer') == '') {
	$admin->print_error($MESSAGE['GENERIC']['FILL_IN_ALL'], WB_URL.'/modules/jqCollapse/modify_question.php?page_id='.$page_id.'&section_id='.$section_id.'&question_id='.$question_id);
} else {
	$question = $admin->add_slashes($admin->get_post('question'));
	$answer = $admin->add_slashes($admin->get_post('answer'));
	$category = $admin->add_slashes($admin->get_post('category'));
}

// Update row
$database->query("UPDATE ".TABLE_PREFIX."mod_jqCollapse_questions SET question='$question', answer='$answer', cat_id='$category' WHERE question_id='$question_id'");

// Check if there is a db error, otherwise say successful
if($database->is_error()) {
	$admin->print_error($database->get_error(), WB_URL.'/modules/jqCollapse/modify_question.php?page_id='.$page_id.'&section_id='.$section_id.'&question_id='.$question_id);
} else {
	$admin->print_success($TEXT['SUCCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

// Print admin footer
$admin->print_footer();

?>