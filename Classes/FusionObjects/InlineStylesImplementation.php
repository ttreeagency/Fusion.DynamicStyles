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
use Ttree\Fusion\DynamicStyles\Service\DynamicStyleRegistryService;

/**
 * Inline the dynamic stylesheets
 */
class InlineStylesImplementation extends AbstractFusionObject
{
    const TEMPLATE = '<style>%s</style>';

    /**
     * @var DynamicStyleRegistryService
     * @Flow\Inject(proxy=false)
     */
    protected $dynamicStyleHandler;

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function evaluate()
    {
        $content = '';
        foreach ($this->dynamicStyleHandler as $resource) {
            $content .= $resource;
        }

        $content = sprintf(self::TEMPLATE, $content);

        return $this->pushToPageHead($content);
    }
}
