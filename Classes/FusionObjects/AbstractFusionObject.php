<?php
namespace Ttree\Fusion\DynamicStyles\FusionObjects;

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
use Neos\Fusion\FusionObjects;
use Ttree\Fusion\DynamicStyles\Service\DynamicStyleRegistryService;

/**
 * Base class for Dynamic Stylsheet implementation
 */
abstract class AbstractFusionObject extends FusionObjects\AbstractFusionObject
{
    /**
     * @var DynamicStyleRegistryService
     * @Flow\Inject(proxy=false)
     */
    protected $dynamicStyleHandler;

    /**
     * @param string $content
     * @return string
     */
    public function pushToPageHead($content)
    {
        $value = $this->runtime->getCurrentContext()['value'];
        return preg_replace('(<\/head>)', $content . PHP_EOL . '</head>', $value, 1);
    }
}
