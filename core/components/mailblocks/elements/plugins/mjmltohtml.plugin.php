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

            // Parse
            $resourceOutput = $modx->resource->process();
            $modx->parser->processElementTags('', $resourceOutput, true, false, '[[', ']]', array(), $maxIterations);
            $modx->parser->processElementTags('', $resourceOutput, true, true, '[[', ']]', array(), $maxIterations);


            // Save to temporary file
            $tempFile = tempnam(sys_get_temp_dir(), 'mjml_');

            $handle = fopen($tempFile, 'w');
            fwrite($handle, $resourceOutput);
            //fseek($temp, 0);
            //echo fread($temp, 1024);

            // do here something (OK)
            $modx->log(modX::LOG_LEVEL_ERROR, 'Temp file "' . $tempFile . '"" created at ' . sys_get_temp_dir() );
            //$modx->log(modX::LOG_LEVEL_ERROR, 'Temp file content: ' . fread($temp, 9999));


            //$validate = exec('mjml --validate ' . escapeshellarg($tempFile));
            //$modx->log(modX::LOG_LEVEL_ERROR, 'Temp file validation error: ' . print_r($validate));

            exec('mjml ' . escapeshellarg($tempFile) . ' -o /var/www/romanesco-nursery/_newsletter/test.html');

            fclose($handle); // this removes the file
            unlink($tempFile);

            //$modx->log(modX::LOG_LEVEL_ERROR, 'Something fired. Content type: ' . $html);
        }

        break;
}

return;