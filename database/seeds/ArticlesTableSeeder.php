<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Article;
class ArticlesTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();

		for ($i = 0;$i < 10;$i++) {
			Article::create([
				'title' => $faker->sentence,
				'content' => implode('', $faker->sentences(4))
				]);
		}
	}
}