<?php
class My_Helper_Dic extends Zend_Controller_Action_Helper_Abstract
{
    /**
     * @var Di\Container
     */
    protected $container;

    public function __construct($configurationFile, $environment)
    {
        $loader = new Di\Configuration_JsonLoader();
        $loader->addConf(file_get_contents($configurationFile));

        $builder = new Di\Configuration_Builder($loader, $environment);

        $this->container = new Di\Container(new Di\Configuration($builder));
    }

    /**
     * @return Di\Container
     */
    function direct()
    {
        return $this->container;
    }
}