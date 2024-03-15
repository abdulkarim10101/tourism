<?php

namespace App\Models;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Model;

class GlobalClass extends Model
{
    public static function seo($name,$slug){
        $categories=ProductCategory::all();
        $a='Shopping';
        foreach($categories as $category){
            $a=$a.','.$category->name;
        }
        SEOTools::setTitle($name.' - '.'Ease Shoppings',false);
        SEOTools::setDescription($a.'kids,games,game,study,stationary,pencil,pen,fashion,clothing,pant,suit,ladies,gents,oil,olive');
        SEOTools::opengraph()->setUrl('http://easeshoppings.com/'.$slug);
    }
}
