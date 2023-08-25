<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\ForumSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumSubscriptionFactory extends Factory
{

    protected $model = ForumSubscription::class;

    public function definition()
    {
        return [
            'status' => 'active',
            'user_id' => \App\Models\User::factory()->create()->id,
            'subscriptionable_id' => \App\Models\Forum::factory()->create()->id,
            'subscriptionable_type' => 'App\Models\Forum',
        ];
    }

}
