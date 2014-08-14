<?php
/**
 * Created by PhpStorm.
 * User: sebastian
 * Date: 14.08.14
 * Time: 07:42
 */

namespace Sandstorm\ManualProxyClassFlusher;


use TYPO3\Flow\Core\Bootstrap;

class Package extends \TYPO3\Flow\Package\Package {

	/**
	 * Invokes custom PHP code directly after the package manager has been initialized.
	 *
	 * @param Bootstrap $bootstrap The current bootstrap
	 * @return void
	 */
	public function boot(Bootstrap $bootstrap) {
		$bootstrap->registerRequestHandler(new CommandRequestHandler($bootstrap));
	}
}