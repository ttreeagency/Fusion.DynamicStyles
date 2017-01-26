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

use MatthiasMullie\Minify\CSS;
use Neos\Flow\Annotations as Flow;
use Neos\Fusion\FusionObjects\AbstractFusionObject;
use Neos\Utility\Files;

/**
 * Registry to keep track of used CSS in the current page rendering
 *
 * @Flow\Scope("singleton")
 * @api
 */
class DynamicStyleHandler implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $registry = [];

    /**
     * @param string $meta
     * @param mixed $content
     * @param string $typoScriptPath
     * @param AbstractFusionObject|null $contextObject
     */
    public function handle(string $meta, $content, string $typoScriptPath, AbstractFusionObject $contextObject = null): void
    {
        if ($meta !== 'css') {
            return;
        }
        $hash = md5($content);
        $this->registry[$hash] = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        foreach ($this->registry as $resource) {
            $minifier = new CSS();
            $minifier->add(Files::getFileContents($resource));
            yield $minifier->minify();
        }
    }
}
