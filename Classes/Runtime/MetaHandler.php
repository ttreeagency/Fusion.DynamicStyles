<?php
namespace Ttree\Fusion\DynamicStyles\Runtime;

/*
 * This file is part of the Ttree.Fusion.DynamicStyles package.
 *
 * (c) Handcrafted with love by ttree agency, ttree.ch
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Fusion\FusionObjects\AbstractFusionObject;

/**
 * Registry to keep track of used CSS in the current page rendering
 *
 * @Flow\Scope("singleton")
 * @api
 */
class MetaHandler
{
    /**
     * @param mixed $content
     * @param string $typoScriptPath
     * @param AbstractFusionObject|null $contextObject
     */
    public function handle($content, string $typoScriptPath, AbstractFusionObject $contextObject = null): void
    {
        \Neos\Flow\var_dump($content, $typoScriptPath);
    }
}
