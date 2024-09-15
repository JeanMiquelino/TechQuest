<?php


namespace Gamify\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\FlaggedEnum;
use Illuminate\Support\Arr;

/**
 * @method static static OnQuestionAnswered()
 * @method static static OnQuestionCorrectlyAnswered()
 * @method static static OnQuestionIncorrectlyAnswered()
 * @method static static OnUserLoggedIn()
 * @method static static OnUserProfileUpdated()
 * @method static static OnUserAvatarUploaded()
 * @method static static None()
 */
final class BadgeActuators extends FlaggedEnum implements LocalizedEnum
{
    /** Actuators based on question's events */
    const OnQuestionAnswered = 1 << 0;

    const OnQuestionCorrectlyAnswered = 1 << 1;

    const OnQuestionIncorrectlyAnswered = 1 << 2;

    /** Actuators based on user's events */
    const OnUserLoggedIn = 1 << 3;

    const OnUserProfileUpdated = 1 << 4;

    const OnUserAvatarUploaded = 1 << 5;

    /**
     * Returns an array of values to be used on <select> with <optgroups> and filtered options.
     *
     * @return array<int|string, array<int, string>|string>
     */
    public static function toSelectArray(): array
    {
        $questionEventsKey = (string) __('enums.actuators_related_with_question_events');
        $userEventsKey = (string) __('enums.actuators_related_with_user_events');

        return [
            self::None => self::None()->description,
            $questionEventsKey => [
                self::OnQuestionAnswered => self::OnQuestionAnswered()->description,
                self::OnQuestionCorrectlyAnswered => self::OnQuestionCorrectlyAnswered()->description,
                self::OnQuestionIncorrectlyAnswered => self::OnQuestionIncorrectlyAnswered()->description,
            ],
            $userEventsKey => [
                self::OnUserLoggedIn => self::OnUserLoggedIn()->description,
                self::OnUserProfileUpdated => self::OnUserProfileUpdated()->description,
                self::OnUserAvatarUploaded => self::OnUserAvatarUploaded()->description,
            ],
        ];
    }

    public static function triggeredByQuestionsList(): string
    {
        return Arr::join(self::triggeredByQuestions(), ',');
    }

    public static function triggeredByQuestions(): array
    {
        return [
            self::OnQuestionAnswered,
            self::OnQuestionCorrectlyAnswered,
            self::OnQuestionIncorrectlyAnswered,
        ];
    }

    /**
     * Returns if the provided $actuator can be filtered by Tags.
     * Only Question based actuators can be filtered.
     */
    public static function canBeTagged(BadgeActuators $actuator): bool
    {
        return $actuator->in(self::triggeredByQuestions());
    }
}
