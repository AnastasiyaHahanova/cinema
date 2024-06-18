<?php

declare(strict_types=1);

namespace App\Redis;

use Redis;

class RedisStorageManager
{
    public function __construct(private readonly Redis $redis)
    {
    }

    public function exist(string $key): bool
    {
        return (bool) $this->redis->exists($key);
    }

    public function set(string $key, mixed $value): void
    {
        $this->redis->set($key, $value);
    }

    public function delete(string $key): void
    {
        $this->redis->del($key);
    }

    public function get(string $key): mixed
    {
        return $this->redis->get($key);
    }

    public function prolong(string $key, int $ttl): void
    {
        $this->redis->expire($key, $ttl);
    }

    public function hSet(string $key, string $hashKey, string $value): void
    {
        $this->redis->hSet($key, $hashKey, $value);
    }
}