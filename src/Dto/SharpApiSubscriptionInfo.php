<?php

declare(strict_types=1);

namespace SharpAPI\SharpApiService\Dto;

use Carbon\Carbon;

class SharpApiSubscriptionInfo
{
    /**
     * Initializes a new instance with details regarding the subscription's current period,
     * usage, and status.
     *
     * @param Carbon $timestamp Timestamp of the subscription check.
     * @param bool $on_trial Indicates if the account is on a trial period.
     * @param Carbon $trial_ends Timestamp for the end of the trial period.
     * @param bool $subscribed Indicates if the user is currently subscribed.
     * @param Carbon $current_subscription_start Start timestamp of the current subscription period.
     * @param Carbon $current_subscription_end End timestamp of the current subscription period.
     * @param int $subscription_words_quota Total word quota for the current subscription period.
     * @param int $subscription_words_used Number of words used in the current subscription period.
     * @param float $subscription_words_used_percentage Percentage of the word quota used
     *                                                     in the current subscription period.
     */
    public function __construct(
        public Carbon $timestamp,
        public bool   $on_trial,
        public Carbon $trial_ends,
        public bool   $subscribed,
        public Carbon $current_subscription_start,
        public Carbon $current_subscription_end,
        public int    $subscription_words_quota,
        public int    $subscription_words_used,
        public float  $subscription_words_used_percentage
    )
    {
    }

    public function toArray(): array
    {
        return [
            'timestamp' => $this->timestamp,
            'on_trial' => $this->on_trial,
            'trial_ends' => $this->trial_ends,
            'subscribed' => $this->subscribed,
            'current_subscription_start' => $this->current_subscription_start,
            'current_subscription_end' => $this->current_subscription_end,
            'subscription_words_quota' => $this->subscription_words_quota,
            'subscription_words_used' => $this->subscription_words_used,
            'subscription_words_used_percentage' => $this->subscription_words_used_percentage,
        ];
    }
}
