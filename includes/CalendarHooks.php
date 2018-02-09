<?php

/**
 * Some hooks for Calendar extension.
 */
class CalendarHooks {
	/**
	 * @param Parser $parser
	 * @return bool
	 */
	public static function setupParserHooks( $parser ) {
		$parser->setFunctionHook( 'calendar', [ 'CalendarHooks', 'calendarMagicWord' ] );
		return true;
	}

	/**
	 * @param Parser &$parser
	 * @return string
	 */
	public static function calendarMagicWord( &$parser ) {
		$parser->getOutput()->addModuleStyles( 'ext.calendar' );

		$args = func_get_args();
		array_shift( $args );

		$calendar = new CalendarTable;
		$calendar->setParameters( $args );
		return $calendar->buildTable();
	}
}
