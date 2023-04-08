<?php

namespace App\Api\Provider;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

class UserProvider
{
    private TagAwareCacheInterface $cache;
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository, TagAwareCacheInterface $cache)
    {
        $this->cache = $cache;
        $this->userRepository = $userRepository;
    }

    public function provide(int $id): ?User
    {
        $cacheId = sprintf('user_%d', $id);

        return $this->cache->get($cacheId, function (ItemInterface $item) use ($cacheId, $id) {
            $item->expiresAfter(600);
            $item->tag($cacheId);

            return $this->userRepository->find($id);
        });
    }
}
