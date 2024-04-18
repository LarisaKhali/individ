<?php

namespace Src;

interface AuthIdentityInterface
{
    public function findIdentity(int $id);

    public function getId(): int;

    public function attemptIdentity(array $credentials);
}