<?php

declare(strict_types=1);
/**
 * This file is part of gateway-worker.
 *
 * @link     https://github.com/friendsofhyperf/gateway-worker
 * @document https://github.com/friendsofhyperf/gateway-worker/blob/2.x/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\GatewayWorker;

class ConfigProvider
{
    public function __invoke()
    {
        defined('BASE_PATH') || define('BASE_PATH', dirname(__DIR__, 2));

        return [
            'commands' => [
                Command\ServeCommand::class,
            ],
            'listeners' => [
                Listener\BindRegistryAddressListener::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for gateway-worker.',
                    'source' => __DIR__ . '/../publish/gatewayworker.php',
                    'destination' => BASE_PATH . '/config/autoload/gatewayworker.php',
                ],
            ],
        ];
    }
}
