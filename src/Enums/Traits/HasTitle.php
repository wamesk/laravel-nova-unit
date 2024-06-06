<?php

namespace Wame\LaravelNovaUnit\Enums\Traits;

trait HasTitle
{
    public function title(): string
    {
        return __('unit::unit.' . $this->value);
    }
}
