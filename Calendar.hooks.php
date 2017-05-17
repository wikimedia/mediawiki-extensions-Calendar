<?php

/**
 * Some hooks for Calendar extension.
 */
class CalendarHooks {
	/**
	 * @param $parser Parser
	 * @return bool
	 */
	public static function setupParserHooks( $parser ) {
		$parser->setFunctionHook( 'calendar', [ 'CalendarHooks', 'calendarMagicWord' ] );
		return true;
	}

	/**
	 * @param $parser Parser
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
