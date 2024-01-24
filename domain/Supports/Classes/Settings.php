<?php

namespace Domain\Supports\Classes;

use Spatie\LaravelSettings\Settings as SpatieSettings;

abstract class Settings extends SpatieSettings
{

    abstract public static function group(): string;


    public function update(array $data): self
    {
        if (count($data) > 0) {

            foreach ($data as $property => $value) {
                $this->{$property} = $value;
            }
            $this->save();
        }

        return $this;
    }
}
