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
use Neos\Flow\ResourceManagement\ResourceManager;

/**
 * External Dynamic Stylesheet implementation
 */
class ExternalStylesImplementation extends AbstractFusionObject
{
    const TEMPLATE = '<link rel="stylesheet" href="%s" />';

    /**
     * @var ResourceManager
     * @Flow\Inject
     */
    protected $resourceManager;

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
        $content = trim($content);

        $resource = $this->resourceManager->importResourceFromContent($content, 'ExternalStyles.css');
        unset($content);

        $href = $this->resourceManager->getPublicPersistentResourceUri($resource);
        $link = sprintf(self::TEMPLATE, $href);

        return $this->pushToPageHead($link);
    }
}
