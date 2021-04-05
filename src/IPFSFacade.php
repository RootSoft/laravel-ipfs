<?php

namespace Rootsoft\IPFS;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rootsoft\IPFS\Clients\IPFSClient
 */
class IPFSFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ipfs';
    }
}
