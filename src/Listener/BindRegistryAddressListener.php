<?php

declare(strict_types=1);
/**
 * This file is part of gateway-worker.
 *
 * @link     https://github.com/friendsofhyperf/gateway-worker
 * @document https://github.com/friendsofhyperf/gateway-worker/blob/2.x/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\GatewayWorker\Listener;

use FriendsOfHyperf\GatewayWorker\Client;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\BootApplication;

class BindRegistryAddressListener implements ListenerInterface
{
    public function __construct(protected ConfigInterface $config)
    {
    }

    public function listen(): array
    {
        return [
            BootApplication::class,
        ];
    }

    public function process(object $event): void
    {
        if ($registryAddress = $this->config->get('gatewayworker.register_address', '')) {
            Client::$registerAddress = $registryAddress;
        }
    }
}
