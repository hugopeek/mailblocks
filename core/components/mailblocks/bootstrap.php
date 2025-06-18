<?php
/**
 * @var \MODX\Revolution\modX $modx
 * @var array $namespace
 */

// Autoload Composer packages
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Add your classes to modx's autoloader
\MODX\Revolution\modX::getLoader()->addPsr4('FractalFarming\MailBlocks\\', $namespace['path'] . 'src/');

if (!$modx->services->has('mailblocks')) {
    // Register base class in the service container
    $modx->services->add('mailblocks', function($c) use ($modx) {
        return new \FractalFarming\MailBlocks\MailBlocks($modx);
    });

    // Load packages model
    //$modx->addPackage('FractalFarming\MailBlocks\Model', $namespace['path'] . 'src/', null, 'FractalFarming\MailBlocks\\');
}
