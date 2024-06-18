<?php

declare(strict_types=1);

namespace App\Redis;

use Redis;

class RedisTransactionManager
{
    public function __construct(private readonly Redis $redis)
    {
    }
    public function beginTransaction(): void
    {
        $this->redis->multi();
    }

    public function commit() : void
    {
        $this->redis->exec();
    }
}