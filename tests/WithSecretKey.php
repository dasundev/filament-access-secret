<?php

namespace Dasundev\FilamentAccessSecret\Tests;

use Laravel\Dusk\Browser;

trait WithSecretKey
{
    protected bool $withSecretKey = false;

    protected string $url;

    public function withSecretKey(string $key): static
    {
        $this->withSecretKey = true;

        $this->url = "/$this->panel/$key";

        return $this;
    }

    public function url(): string
    {
        if ($this->withSecretKey) {
            return $this->url;
        }

        return "/$this->panel/login";
    }

    public function assert(Browser $browser): void
    {
        $browser->assertPathIs("/$this->panel/login");
    }
}
