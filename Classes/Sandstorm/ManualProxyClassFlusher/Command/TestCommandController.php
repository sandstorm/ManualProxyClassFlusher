<?php
/**
 * Created by PhpStorm.
 * User: sebastian
 * Date: 14.08.14
 * Time: 08:25
 */

namespace Sandstorm\ManualProxyClassFlusher\Command;


use TYPO3\Flow\Cli\CommandController;

class TestCommandController extends CommandController {

	/**
	 * Test Command
	 */
	public function testCommand() {
		$this->outputLine('TEST COMMANDs');
	}

} 