<?php
/**
 * @package mailblocks
 * @subpackage classfile
 */

namespace FractalFarming\MailBlocks;

use modX;

class MailBlocks
{
    /** @var modX $modx */
    public $modx;

    /** @var string $namespace */
    public $namespace = 'mailblocks';

    /** @var array $config */
    public $config = [];

    /**
     * @param modX $modx
     * @param array $options
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;

        $corePath = $this->getOption('core_path', $config, $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/mailblocks/');
        $assetsUrl = $this->getOption('assets_url', $config, $this->modx->getOption('assets_url', null, MODX_ASSETS_URL) . 'components/mailblocks/');

        $this->config = array_merge(
            [
                'corePath'  => $corePath,
                'srcPath'   => $corePath . 'src/',
                'modelPath' => $corePath . 'model/',
                'assetsUrl' => $assetsUrl,
                'cssUrl'    => $assetsUrl . 'css/',
                'jsUrl'     => $assetsUrl . 'js/',

                'templatesPath' => $corePath . 'templates/',
                'processorsPath' => $corePath . 'src/Processors',
            ],
            $config
        );
        //$this->modx->addPackage($this->namespace, $this->getOption('modelPath'));
        $this->modx->lexicon->load('mailblocks:default');
    }

    /**
     * Get a local configuration option or a namespaced system setting by key.
     *
     * @param string $key The option key to search for.
     * @param array $options An array of options that override local options.
     * @param mixed $default The default value returned if the option is not found locally or as a
     * namespaced system setting; by default this value is null.
     *
     * @return mixed The option value or the default value specified.
     */
    public function getOption(string $key, $options = [], $default = null)
    {
        $option = $default;
        if (!empty($key) && is_string($key)) {
            if ($options != null && array_key_exists($key, $options)) {
                $option = $options[$key];
            } elseif (array_key_exists($key, $this->config)) {
                $option = $this->config[$key];
            } elseif (array_key_exists("{$this->namespace}.{$key}", $this->modx->config)) {
                $option = $this->modx->getOption("{$this->namespace}.{$key}");
            }
        }
        return $option;
    }
}
