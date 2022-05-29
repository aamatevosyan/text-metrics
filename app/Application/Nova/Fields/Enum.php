<?php

namespace App\Nova\Fields;

class Enum extends \Suleymanozev\EnumField\Enum
{
    public function attach($class): static
    {
        $this->options(collect($class::cases())->pluck('name', 'value'));

        $this->displayUsing(
            function ($value) use ($class) {
                if ($value instanceof \UnitEnum) {
                    return $value->name;
                }

                $parsedValue = $class::tryFrom($value);
                if ($parsedValue instanceof \UnitEnum) {
                    return $parsedValue->name;
                }
                return $value;
            }
        );

        $this->rules = [new \Illuminate\Validation\Rules\Enum($class)];
        return $this;
    }
}
