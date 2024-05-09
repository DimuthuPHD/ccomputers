<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia, LogsActivity;

    protected $fillable = ['name', 'price', 'stock'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'price', 'stock'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function setCauser(?User $causer): static{

    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

    public function renderStarRating()
    {
        $averageRating = $this->averageRating();

        // Calculate the number of full stars
        $fullStars = floor($averageRating);

        // Calculate the number of half stars
        $halfStars = ceil($averageRating - $fullStars);

        // Calculate the number of empty stars
        $emptyStars = 5 - ($fullStars + $halfStars);

        // Generate HTML for star ratings
        $html = '<div class="btc_shop_product_rating">';
        for ($i = 1; $i <= $fullStars; $i++) {
            $html .= '<i class="fa fa-star"></i>';
        }
        for ($i = 1; $i <= $halfStars; $i++) {
            $html .= '<i class="fa fa-star-half-empty"></i>';
        }
        for ($i = 1; $i <= $emptyStars; $i++) {
            $html .= '<i class="fa fa-star-o"></i>';
        }
        $html .= '</div>';

        return $html;
    }

}
