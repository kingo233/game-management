<?php

namespace Database\Factories;

use App\Models\UserCharge;
use Illuminate\Database\Eloquent\Factories\Factory;
use DB;
use App\Models\User;
class UserChargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserCharge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $uid = $this->faker->randomElement(['1','2','3']);
        $date_time = $this->faker->date . ' ' . $this->faker->time;
        $money = $this->faker->numberBetween(0, 1000);
        $user = User::find($uid);
        $user->credit += $money;
        $user->save();
        return [
            'uid' => $uid,
            'created_at' => $date_time,
            'updated_at' => $date_time,
            'money' => $money
        ];
    }
}
