<?php

namespace Database\Factories;

use App\Models\Weapon;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeaponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Weapon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $names = ['降临之剑','昭心','流浪乐章','忍冬之果','宗室秘法录','飞天大御剑','黑岩刺枪','反曲弓','匣里灭辰',
        '祭礼剑','祭礼弓','以理服人','冷刃','白铁大剑','护摩之杖','松籁响起之时','天空之傲','黑剑',
        '流月针','天空之翼','四风原典','风鹰剑','阿莫斯之弓','天空之刃','西风大剑','匣里日月','笛剑','钟剑','试作澹月',
        '雨裁','绝弦','狼的末路','黎明神剑','和璞鸢','白影剑','天空之卷'];//9+9+11+7=20+16=36
        return [
            'name' => $this->faker->unique()->randomElement($names),
            'attack' => $this->faker->numberBetween(500,1000),
            'defend' => $this->faker->numberBetween(500,1000),
            'critical_hit' => $this->faker->numberBetween(0,100),
            'critical_damage' => $this->faker->numberBetween(0,200),
            'skill' => $this->faker->text(50),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
