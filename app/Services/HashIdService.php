<?php


namespace Gamify\Services;

use Hashids\Hashids;

class HashIdService
{
    protected Hashids $hashIds;

    public function __construct()
    {
        $salt = config('app.hashids.salt', '');
        $length = config('app.hashids.length', 0);
        $alphabet = config('app.hashids.alphabet', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');

        // IMPORTANT! A weak hash can expose the entire app:
        // http://carnage.github.io/2015/08/cryptanalysis-of-hashids
        $salt = hash('sha256', $salt);

        $this->hashIds = new Hashids($salt, $length, $alphabet);
    }

    public function encode(int $id): string
    {
        return $this->hashIds->encode($id);
    }

    public function decode(int|string $hashId): int
    {
        if (is_int($hashId)) {
            return $hashId;
        }

        return $this->hashIds->decode($hashId)[0];
    }
}
