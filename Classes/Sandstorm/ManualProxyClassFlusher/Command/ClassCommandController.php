<?php
namespace Sandstorm\ManualProxyClassFlusher\Command;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Sandstorm.ManualProxyClassFlusher".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cache\CacheManager;
use TYPO3\Flow\Core\Booting\Scripts;
use TYPO3\Flow\Core\Bootstrap;
use TYPO3\Flow\Monitor\ChangeDetectionStrategy\ChangeDetectionStrategyInterface;

/**
 * @Flow\Scope("singleton")
 */
class ClassCommandController extends \TYPO3\Flow\Cli\CommandController {

	/**
	 * @Flow\Inject
	 * @var CacheManager
	 */
	protected $cacheManager;

	/**
	 * @Flow\Inject
	 * @var Bootstrap
	 */
	protected $bootstrap;

	/**
	 * @param string $fullPathToChangedFile
	 */
	public function eagerCompileCommand($fullPathToChangedFile) {
		$this->cacheManager->flushSystemCachesByChangedFiles('Flow_ClassFiles', array($fullPathToChangedFile => ChangeDetectionStrategyInterface::STATUS_CHANGED));
		Scripts::recompileClasses($this->bootstrap);
	}
}