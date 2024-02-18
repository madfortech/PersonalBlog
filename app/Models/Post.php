<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements HasMedia, Feedable
{
    use HasFactory,InteractsWithMedia,HasSlug;

    protected $table = 'posts';
    
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
 

    /**
     * Get the options for generating the slug.
    */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->nonQueued()
            
            ->performOnCollections('posts');
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
        ->id($this->id)
        ->title($this->title)
        ->summary($this->description)
        ->updated($this->updated_at)
        ->link($this->url())
        ->authorName($this->user->name);
    }

    

    public static function getFeedItems()
    {
        return Post::all();
    }

    public function url(): string
    {
        return route('posts.show', ['slug' => $this->slug]);
    }
   
}
