<?php
/**
 * \TechDivision\Server\Configuration\MainXmlConfiguration
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

use TechDivision\Server\Configuration\ServerXmlConfiguration;
use TechDivision\Server\Configuration\ConfigXmlConfiguration;

/**
 * Class MainXmlConfiguration
 *
 * @category   Server
 * @package    TechDivision_Server
 * @subpackage Configuration
 * @author     Johann Zelger <jz@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Server
 */
class MainXmlConfiguration
{
    /**
     * Hold's the simple xml element read from file
     *
     * @var \SimpleXMLElement
     */
    protected $xml;

    /**
     * Constructs main configuration
     *
     * @param string $filename The filename to load simple xml with
     */
    public function __construct($filename)
    {
        $this->xml = simplexml_load_file($filename);
    }

    /**
     * Return's server config nodes as array
     *
     * @return array
     */
    public function getServerConfigs()
    {
        $serverConfigurations = array();
        foreach ($this->xml->servers->server as $serverConfig) {
            $serverConfigurations[] = new ServerXmlConfiguration($serverConfig);
        }
        return $serverConfigurations;
    }

    /**
     * Return's logger config nodes as array
     *
     * @return array
     */
    public function getLoggerConfigs()
    {
        $loggerConfigurations = array();
        foreach ($this->xml->loggers->logger as $loggerConfig) {
            $loggerConfigurations[] = new LoggerXmlConfiguration($loggerConfig);
        }
        return $loggerConfigurations;
    }
}
