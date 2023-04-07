<?php

namespace Yoast\PHPUnitPolyfills\TestListeners\Subscribers;

use PHPUnit\Event\Test\MarkedIncomplete;
use PHPUnit\Event\Test\MarkedIncompleteSubscriber;

/**
 * Event subscriber.
 *
 * @since 2.0.0
 */
final class AddIncompleteSubscriber implements MarkedIncompleteSubscriber {

	/**
	 * Subscriber constructor.
	 *
	 * @param object $handler Instance of the class which functions as the "test listener".
	 */
	public function __construct( private readonly object $handler ) {}

	/**
	 * Trigger the test listener method equivalent to this event.
	 *
	 * @param MarkedIncomplete $event The event object.
	 */
	public function notify( MarkedIncomplete $event ): void {
		$this->handler->addIncompleteTest(
			$event->test(),
			$event->throwable(),
			$event->telemetryInfo()->time()
		);
	}
}
