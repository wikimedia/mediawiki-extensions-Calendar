<?php

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'Calendar' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['Calendar'] = __DIR__ . '/i18n';
	$wgExtensionMessagesFiles['CalendarMagic'] = __DIR__ . '/Calendar.i18n.magic.php';
	/* wfWarn(
		'Deprecated PHP entry point used for Calendar extension. Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return true;
} else {
	die( 'This version of the Calendar extension requires MediaWiki 1.25+' );
}
