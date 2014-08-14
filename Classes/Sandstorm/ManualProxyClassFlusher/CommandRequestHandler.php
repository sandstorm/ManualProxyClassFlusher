<?php
/**
 * Created by PhpStorm.
 * User: sebastian
 * Date: 14.08.14
 * Time: 07:47
 */

namespace Sandstorm\ManualProxyClassFlusher;


use TYPO3\Flow\Reflection\ObjectAccess;

class CommandRequestHandler extends \TYPO3\Flow\Cli\CommandRequestHandler {

	public function getPriority() {
		return 10000;
	}


	protected function boot($runlevel) {
		$sequence = ($runlevel === 'Compiletime') ? $this->bootstrap->buildCompiletimeSequence() : $this->bootstrap->buildRuntimeSequence();


		if ($runlevel !== 'Compiletime') {
			$sequence->removeStep('typo3.flow:systemfilemonitor');// START MODIFICATION
			$sequence->removeStep('typo3.flow:objectmanagement:recompile');
		}

		// END MODIFICATION
		$sequence->invoke($this->bootstrap);

		$this->objectManager = $this->bootstrap->getObjectManager();
		$this->dispatcher = $this->objectManager->get('TYPO3\Flow\Mvc\Dispatcher');
	}

} 