<?php

namespace App\Front\Controller;

interface FrontInterface
{
    public function pageName(): string;

    public function pageClass(): string;
}
