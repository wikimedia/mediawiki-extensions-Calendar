<?php

namespace MediaWiki\Extension\Calendar;

use MediaWiki\Hook\ParserFirstCallInitHook;
use MediaWiki\Parser\Parser;

/**
 * Some hooks for Calendar extension.
 */
class Hooks implements ParserFirstCallInitHook {
	/**
	 * @param Parser $parser
	 */
	public function onParserFirstCallInit( $parser ) {
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
