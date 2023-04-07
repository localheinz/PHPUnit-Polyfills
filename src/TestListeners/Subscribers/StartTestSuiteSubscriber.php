<?php

namespace Yoast\PHPUnitPolyfills\TestListeners\Subscribers;

use PHPUnit\Event\TestSuite\Started;
use PHPUnit\Event\TestSuite\StartedSubscriber;

/**
 * Event subscriber.
 *
 * @since 2.0.0
 */
final class StartTestSuiteSubscriber implements StartedSubscriber {

	/**
	 * Subscriber constructor.
	 *
	 * @param object $handler Instance of the class which functions as the "test listener".
	 */
	public function __construct( private readonly object $handler ) {}

	/**
	 * Trigger the test listener method equivalent to this event.
	 *
	 * @param Started $event The event object.
	 */
	public function notify( Started $event ): void {
		$this->handler->startTestSuite(
			$event->testSuite()
		);
	}
}
