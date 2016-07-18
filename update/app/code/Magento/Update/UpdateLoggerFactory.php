<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Update;

/**
 * Class to get PSR-3 compliant logger instance
 */
class UpdateLoggerFactory
{
    /**
     * @var string
     */
    private $logFile;

    /**
     * @var string
     */
    private $channelName;

    /**
     * Constructor
     * @param string $logFile
     * @param string $channelName
     *
     */
    public function __construct(
        $logFile = MAGENTO_BP . '/var/log/update.log',
        $channelName = 'update-cron'
    ) {
        $this->logFile = $logFile;
        $this->channelName = $channelName;
    }

    /**
     * Create logger instance.
     *
     * @return \Psr\Log\LoggerInterface
     */
    public function create()
    {
        $logger = new \Monolog\Logger($this->channelName);
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($this->logFile));
        return $logger;
    }
}
