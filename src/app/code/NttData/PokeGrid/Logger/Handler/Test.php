<?php
 
namespace NttData\PokeGrid\Logger\Handler;
 
use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;
 
class Test extends Base{
 
    /**
     * @var string
     */
    protected $fileName = '/var/log/facuLog.log';
 
    /**
     * @var
     */
    protected $loggerType = Logger::DEBUG;
 
}