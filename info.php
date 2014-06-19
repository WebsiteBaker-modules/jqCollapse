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

/*
/*
jqCollapse - Website Baker Module
v0.1 (Nibz, 21 April 2013)
+ Initial version

v0,2 (Nibz, 21 April 2013)
- DELETED: de.php and fr.php because these where incomplete
+ ADDED: color, icon and gradient to EN.php file
! CHANGED NL.php file

v0,3 (Nibz, 21 April 2013)
+ ADDED: DE.php (german translation thanks to Jacobi22
+ ADDED: IE6-9 CSS Gradient code
- DELETED: $style= $admin->strip_slashes($fetch_settings['style']); Because it isn't used
!Corrected a mistake with the Gradient CSS

v0,5 (Nibz, 22 April 2013)
+ ADDED: Translation for things on the settings page in English, German (thanks to Jacobi22) and Dutch
- DELETED: All unnecessary images

v1,0 (Nibz, 21 April 2013)
[THANKS to Jacobi22 for helping with the module and translating to German!]
! CHANGED: A few minor translation mistakes in the DE.php file
! CHANGED: the accordion from ID to a CLASS now it's valid if you use multiple sections or categories
- DELETED: Anchor "top" (was not needed!)
! CHANGED: <script> to <script type="text/javascript"> now the script type is defined
+ Added a functionality - Now you are able to pick a text- and iconcolor (black, white and dark-gray)
*/


$module_directory = 'jqCollapse';
$module_name = 'jqCollapse';
$module_function = 'page';
$module_version = '1.0';
$module_platform = '2.8.x';
$module_author = 'Nibz';
$module_license = 'GNU General Public License';
$module_description = 'Manage a FAQ page with ease!';

?>
