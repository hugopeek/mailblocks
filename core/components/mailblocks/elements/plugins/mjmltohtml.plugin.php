<?php
/**
 * mjmlToHTML plugin
 *
 * @var modX $modx
 * @var array $scriptProperties
 *
 * @package mailblocks
 */

use Spatie\Mjml\Mjml;
use Spatie\Mjml\Exceptions;

switch ($modx->event->name) {
    // Use HTML mime type when viewed as a web page
    // Based on: https://github.com/GoldCoastMedia/modx-xhtml-mime-switch
    case 'OnLoadWebDocument':
        $resource = &$modx->resource;

        // Make sure content is MJML
        if ($resource->get('content_type') !== 10) {
            break;
        }

        // Display as HTML
        $resource->ContentType->set('mime_type', 'text/html');
        break;

    // Process MJML
    case 'OnWebPagePrerender':
        // Make sure content is MJML
        if ($modx->resource->get('content_type') !== 10) {
            break;
        }

        // Cached output already includes processed MJML
        $cacheManager = $modx->getCacheManager();
        $cacheElementKey = '/mjml';
        $cacheOptions = [
            xPDO::OPT_CACHE_KEY => 'resource/' . $modx->resource->getCacheKey()
        ];
        $cachedOutput = $cacheManager->get($cacheElementKey, $cacheOptions);
        if ($cachedOutput) {
            $modx->resource->_output = $cachedOutput;
            break;
        }

        $output = &$modx->resource->_output;

        try {
            $html = Mjml::new()->toHtml($output);
            $output = $html;
        } catch (Exception $e) {
            $output = $e->getMessage();
        }

        $modx->cacheManager->set($cacheElementKey, $output, 0, $cacheOptions);

        break;
}