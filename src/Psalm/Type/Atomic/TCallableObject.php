<?php

namespace Psalm\Type\Atomic;

/**
 * Denotes an object that is also `callable` (i.e. it has `__invoke` defined).
 */
class TCallableObject extends TObject
{
    public function __toString(): string
    {
        return 'callable-object';
    }

    public function getKey(bool $include_extra = true): string
    {
        return 'callable-object';
    }

    /**
     * @param  array<lowercase-string, string> $aliased_classes
     */
    public function toPhpString(
        ?string $namespace,
        array $aliased_classes,
        ?string $this_class,
        int $analysis_php_version_id
    ): ?string {
        return $analysis_php_version_id >= 7_20_00 ? 'object' : null;
    }

    public function canBeFullyExpressedInPhp(int $analysis_php_version_id): bool
    {
        return false;
    }

    public function getAssertionString(bool $exact = false): string
    {
        return 'object';
    }
}
