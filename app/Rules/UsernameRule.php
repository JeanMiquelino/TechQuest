<?php


namespace Gamify\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class UsernameRule implements ValidationRule
{
    /**
     * Indicates whether the rule should be implicit.
     */
    public bool $implicit = true;

    /**
     * Based on POSIX set of valid usernames:
     * Lower and upper case ASCII letters, digits, period, underscore, and hyphen, with the
     * restriction that hyphen is not allowed as first character of the username. The maximum
     * length is 255 chars.
     *
     * @see https://systemd.io/USER_NAMES/
     */
    const VALID_USERNAME_REGEXP = '/^[A-Za-z\d][A-Za-z\d._-]{2,254}$/';

    /**
     * Run the validation rule.
     *
     * @param  Closure(string): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match(self::VALID_USERNAME_REGEXP, $value)) {
            $fail('validation.username')->translate([
                'value' => 'The :attribute is not a valid POSIX username.',
            ], 'en');
        }
    }
}
