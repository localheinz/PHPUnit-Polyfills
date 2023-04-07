<?php

namespace Yoast\PHPUnitPolyfills\TestListeners\Subscribers;

use PHPUnit\Event\Test\Failed;
use PHPUnit\Event\Test\FailedSubscriber;

/**
 * Event subscriber.
 *
 * @since 2.0.0
 */
final class AddFailureSubscriber implements FailedSubscriber {

	/**
	 * Subscriber constructor.
	 *
	 * @param object $handler Instance of the class which functions as the "test listener".
	 */
	public function __construct( private readonly object $handler ) {}

	/**
	 * Trigger the test listener method equivalent to this event.
	 *
	 * @param Failed $event The event object.
	 */
	public function notify( Failed $event ): void {
		$this->handler->addFailure(
			$event->test(),
			$event->throwable(),
			$event->telemetryInfo()->time()
		);
	}
}
