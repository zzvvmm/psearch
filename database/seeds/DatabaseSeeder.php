<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\Caption;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $string = file_get_contents(public_path("/json/vn_input.json"));
        $json_a = json_decode($string, true);
   		foreach ($json_a as $key => $value) {
   			$image = new Image;
	        $image->user_id = (int)$value['id'];
	        $image->file_path = $value['file_path'];
	        $image->split = $value['split'];
	        $image->save();
	        foreach ($value['captions'] as $key_cap => $cap) {
	        	$caption = new Caption;
	        	$caption->caption = $cap;
	        	// $caption->image_id = $image->id;
	        	if (strlen($cap) > 5) {
	        		$caption->edited = true;
	        	}
	        	$caption->image()->associate($image);
	        	$caption->save();
	        }
   		}
    }
}
