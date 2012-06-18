# Custom simple DI container in ZF 1.x
Lightweight DI container wired to Zend Framework using action helper.

### Action helper setup in bootstrap file.

``` php

// setup DIC action helper
Zend_Controller_Action_HelperBroker::addHelper(
    new My_Helper_Dic(
        realpath(APPLICATION_PATH . '/../application/configs/di.conf.json'),
        APPLICATION_ENV
    )
);
```

### Action helper

```php
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
```

### Sample usage in controller

```php
class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        // get service from DIC
        $this->_helper->dic()->getService($serviceKey);

        // get property from DIC
        $this->_helper->dic()->getProperty($propertyKey);
    }


}
```