<?php
/*
 * Resource is parsed based on the code in the SaveProcessedContent gist by:
 *
 * @author @theboxer
 * @comments @sepiariver
 *
 * https://gist.github.com/sepiariver/a7d6fdc89e2050334086
 *
 */

switch ($modx->event->name) {
//    case 'OnBeforeDocFormSave':
//
//        $modx->event->output('Hi there user!');
//
//        break;

    case 'OnDocFormSave':
        if ($resource->get('content_type') == 9) {

            //$resource = $resource->get('content');

            //$tvName = $modx->getOption('tvName', $scriptProperties, 'processedContent', true);
            //$processTemplate = $modx->getOption('processTemplate', $scriptProperties, false);


            // Assign values from event parameters
            $modx->resource = $resource;
            $modx->resourceIdentifier = $resource->get('id');
            $modx->elementCache = array();

            // Parse the MODX resource, template included
            $resourceOutput = $modx->resource->process();
            $modx->parser->processElementTags('', $resourceOutput, true, false, '[[', ']]', array(), $maxIterations);
            $modx->parser->processElementTags('', $resourceOutput, true, true, '[[', ']]', array(), $maxIterations);


            // Save parsed resource to temporary file
            $tempFile = tempnam(sys_get_temp_dir(), 'mjml_');
            //chmod($tempFile, 0644);

            $handle = fopen($tempFile, 'w');
            fwrite($handle, $resourceOutput);

            //$modx->log(modX::LOG_LEVEL_ERROR, 'Temp file "' . $tempFile . '"" created at ' . sys_get_temp_dir() );


            // Validate the MJML syntax
            $output = array();

            $cmd = exec('mjml --validate ' . escapeshellarg($tempFile) . ' 2>&1', $output, $return_value);

            if ($output) {
                foreach ($output as $line) {
                    $modx->log(modX::LOG_LEVEL_ERROR, 'MJML error: ' . $line);
                }

                $modx->event->output('Hi there user!');
            }

            // Output the HTML
            //exec('mjml ' . escapeshellarg($tempFile) . ' -o /var/www/romanesco-nursery/_newsletter/test.html');

            fclose($handle);
            unlink($tempFile); // this removes the file
        }

        break;
}

return;