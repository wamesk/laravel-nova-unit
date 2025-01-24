<?php

namespace Wame\LaravelNovaUnit\Nova\Fields;

use Exception;
use InvalidArgumentException;
use Laravel\Nova\Fields\Select;
use Wame\LaravelNovaUnit\Enums\UnitAreaEnum;
use Wame\LaravelNovaUnit\Enums\UnitEnergyEnum;
use Wame\LaravelNovaUnit\Enums\UnitInterface;
use Wame\LaravelNovaUnit\Enums\UnitLengthEnum;
use Wame\LaravelNovaUnit\Enums\UnitQuantityEnum;
use Wame\LaravelNovaUnit\Enums\UnitVolumeEnum;
use Wame\LaravelNovaUnit\Enums\UnitWeightEnum;
use function PHPUnit\Framework\returnSelf;

class UnitSelect extends Select
{
    private bool $usedOnlyGroups = false;
    private bool $usedExceptGroups = false;

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->options($this->getOptions());
    }

    /**
     * @throws Exception
     */
    public function exceptGroups(array|UnitInterface $groups): self
    {
        if ($this->usedOnlyGroups) {
            throw new Exception('Cannot use exceptGroups method when already used onlyGroups');
        }

        if ($this->usedExceptGroups) {
            throw new Exception('Cannot use exceptGroups method multiple times');
        }

        if (!is_array($groups)) {
            $groups = [$groups];
        }

        $this->usedExceptGroups = true;

        $this->options($this->getOptions(exceptGroups: $groups));

        return $this;
    }

    /**
     * @throws Exception
     */
    public function onlyGroups(array|string $groups): self
    {
        if (is_array($groups)) {
            foreach ($groups as $group) {
                if (!$group instanceof UnitInterface) {
                    throw new InvalidArgumentException('All elements in the array must implement UnitInterface.');
                }
            }
        } elseif (is_string($groups)) {
            if (!enum_exists($groups) || !is_subclass_of($groups, UnitInterface::class)) {
                throw new InvalidArgumentException('The provided class must be an enum implementing UnitInterface.');
            }
        }

        if ($this->usedExceptGroups) {
            throw new Exception('Cannot use onlyGroups method when already used exceptGroups');
        }

        if ($this->usedOnlyGroups) {
            throw new Exception('Cannot use onlyGroups method multiple times');
        }

        if (!is_array($groups)) {
            $groups = [$groups];
        }

        $this->usedOnlyGroups = true;

        $this->options($this->getOptions(onlyGroups: $groups));

        return $this;
    }

    private function getOptions(array $exceptGroups = [], array $onlyGroups = []): array
    {
        $options = [];

        $cases = array_merge(
            UnitAreaEnum::cases(),
            UnitEnergyEnum::cases(),
            UnitLengthEnum::cases(),
            UnitQuantityEnum::cases(),
            UnitVolumeEnum::cases(),
            UnitWeightEnum::cases(),
        );

        foreach ($cases as $case) {
            $caseClass = get_class($case);

            if (!empty($exceptGroups) && in_array($caseClass, $exceptGroups)) {
                continue;
            }

            if (!empty($onlyGroups) && !in_array($caseClass, $onlyGroups)) {
                continue;
            }

            $options[$case->value] = [
                'label' => $case->title(),
                'group' => $case->groupTitle(),
            ];
        }

        return $options;
    }
}
