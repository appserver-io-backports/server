<?php
/**
 * \TechDivision\Server\Configuration\MainJsonConfiguration
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Server
 * @package    TechDivision_Server
 * @subpackage Configuration
 * @author     Johann Zelger <jz@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Server
 */

namespace TechDivision\Server\Configuration;

/**
 * Class MainJsonConfiguration
 *
 * @category   Server
 * @package    TechDivision_Server
 * @subpackage Configuration
 * @author     Johann Zelger <jz@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Server
 */
class MainJsonConfiguration
{
    /**
     * Hold's the data instance read by json file
     *
     * @var \stdClass
     */
    protected $data;

    /**
     * Constructs the config by given filename
     *
     * @param string $filename The filename to init the config with
     */
    public function __construct($filename)
    {
        $this->data = json_decode(file_get_contents($filename, FILE_USE_INCLUDE_PATH));
    }

    /**
     * Return's an array of server configs
     *
     * @return array
     */
    public function getServerConfigs()
    {
        $serverConfigurations = array();
        foreach ($this->data->servers as $serverConfig) {
            $serverConfigurations[] = new ServerJsonConfiguration($serverConfig);
        }
        return $serverConfigurations;
    }

    /**
     * Return's an array of logger configs
     *
     * @return array
     */
    public function getLoggerConfigs()
    {
        $loggerConfigurations = array();
        foreach ($this->data->loggers as $loggerConfig) {
            $loggerConfigurations[] = new LoggerJsonConfiguration($loggerConfig);
        }
        return $loggerConfigurations;
    }
}
