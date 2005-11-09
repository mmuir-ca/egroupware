<?php
  /**************************************************************************\
  * eGroupWare - Calendar's Sidebox-Menu for idots-template                  *
  * http://www.egroupware.org                                                *
  * Written by Pim Snel <pim@lingewoud.nl>                                   *
  * --------------------------------------------                             *
  *  This program is free software; you can redistribute it and/or modify it *
  *  under the terms of the GNU General Public License as published by the   *
  *  Free Software Foundation; either version 2 of the License, or (at your  *
  *  option) any later version.                                              *
  \**************************************************************************/

  /* $Id$ */
{

 /*
	This hookfile is for generating an app-specific side menu used in the idots
	template set.

	$menu_title speaks for itself
	$file is the array with link to app functions

	display_sidebox can be called as much as you like
 */

	$menu_title = $GLOBALS['egw_info']['apps'][$appname]['title'];
	
	$file = Array(
		array(
			'text' => '<a class="textSidebox" href="'.$GLOBALS['egw']->link('/index.php',array('menuaction' => 'addressbook.uicontacts.edit')).
				'" onclick="window.open(this.href,\'_blank\',\'dependent=yes,width=800,height=600,scrollbars=yes,status=yes\'); 
				return false;">'.lang('Add').'</a>',
			'no_lang' => true,
			'link' => false
		),
// 		'Add'=>$GLOBALS['egw']->link('/index.php','menuaction=addressbook.uiaddressbook.add'),
		'Advanced search'=>$GLOBALS['egw']->link('/index.php','menuaction=addressbook.uicontacts.search'),
		'_NewLine_', // give a newline
		'import contacts' => $GLOBALS['egw']->link('/index.php','menuaction=addressbook.uiXport.import'),
		'export contacts' => $GLOBALS['egw']->link('/index.php','menuaction=addressbook.uiXport.export')
	);
	display_sidebox($appname,$menu_title,$file);

	if($GLOBALS['egw_info']['user']['apps']['preferences'])
	{
		$menu_title = lang('Preferences');
		$file 				 = array();
		$file['Addressbook preferences'] = $GLOBALS['egw']->link('/index.php','menuaction=addressbook.uiaddressbook.preferences');
		if(!$GLOBALS['egw_info']['server']['deny_user_grants_access'])
			$file['Grant Access']	 = $GLOBALS['egw']->link('/index.php','menuaction=preferences.uiaclprefs.index&acl_app=addressbook');
		$file['Edit Categories'] 	 = $GLOBALS['egw']->link('/index.php','menuaction=preferences.uicategories.index&cats_app=addressbook&cats_level=True&global_cats=True');

		display_sidebox($appname,$menu_title,$file);
	}

	if ($GLOBALS['egw_info']['user']['apps']['admin'])
	{
		$menu_title = lang('Administration');
		$file = Array(
			'Configuration'=>$GLOBALS['egw']->link('/index.php','menuaction=admin.uiconfig.index&appname=addressbook'),
			'Custom Fields'=>$GLOBALS['egw']->link('/index.php','menuaction=admin.customfields.edit&appname=addressbook'),
			'Global Categories' =>$GLOBALS['egw']->link('/index.php','menuaction=admin.uicategories.index&appname=addressbook')
		);
		display_sidebox($appname,$menu_title,$file);
	}
}
?>
