<?php

namespace MediaWiki\Extension\Calendar;

use Parser;

/**
 * Some hooks for Calendar extension.
 */
class Hooks {
	/**
	 * @param Parser $parser
	 */
	public static function setupParserHooks( Parser $parser ) {
		$parser->setFunctionHook( 'calendar', [ self::class, 'calendarMagicWord' ] );
	}

	/**
	 * @param Parser $parser
	 * @param string ...$args
	 * @return string
	 */
	public static function calendarMagicWord( Parser $parser, ...$args ) {
		$parser->getOutput()->addModuleStyles( [ 'ext.calendar' ] );

		$calendar = new CalendarTable;
		$calendar->setParameters( $args );
		return $calendar->buildTable();
	}
}
