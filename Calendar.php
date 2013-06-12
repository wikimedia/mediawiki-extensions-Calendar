<?php
/*
 * Adds a calendar parser functions for the Wikivoyage project
 *
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @author Roland Unger
 * @copyright Copyright © 2007 - 2009 Roland Unger
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

$wgExtensionCredits['parserhook']['Calendar'] = array(
	'path' => __FILE__,
	'name' => 'Calendar',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Calendar-Wikivoyage',
	'descriptionmsg' => 'calendar-desc',
	'author' => 'Roland Unger',
	'version' => '1.1'
);

$dir = __DIR__ . '/';
$wgAutoloadClasses['CalendarTable'] = $dir . 'CalendarTable.class.php';
$wgAutoloadClasses['CalendarHooks'] = $dir . 'Calendar.hooks.php';
$wgExtensionMessagesFiles['Calendar'] = $dir . 'Calendar.i18n.php';
$wgExtensionMessagesFiles['CalendarMagic'] = $dir . 'Calendar.i18n.magic.php';

$wgHooks['ParserFirstCallInit'][] = 'CalendarHooks::setupParserHooks';

$wgResourceModules['ext.calendar'] = array(
	'styles' => 'ext.calendar.css',
	'localBasePath' => __DIR__ . '/modules',
	'remoteExtPath' => 'Calendar/modules',
);
