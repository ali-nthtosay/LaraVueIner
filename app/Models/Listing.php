<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Listing extends Model
{
   use HasFactory, SoftDeletes;


   protected $fillable = ['zimmer', 'Badezimmer', 'wohnflaeche', 'stadt', 'plz', 'strasse','strasse_nr', 'preis',  'by_user_id', 'wohnungstype'];


    protected $sortable = ['preis', 'created_at'] ;


    /// image

    public function images(): HasMany
    {
        return $this->hasMany(\App\Models\ListingImage::class);
    }
   public function owner(): BelongsTo
   {
       return $this->belongsTo(
           \App\Models\User::class,
           'by_user_id'
       );
   }
   public function scopeMostRecent(Builder $query): Builder
   {
    return $query->orderByDesc('created_at');
    }
    
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['preisAb'] ?? false,
            fn ($query, $value) => $query->where('preis', '>=', $value)
        )->when(
            $filters['preisBis'] ?? false,
            fn ($query, $value) => $query->where('preis', '<=', $value)
        )->when(
            $filters['zimmer'] ?? false,
            fn ($query, $value) => $query->where('zimmer', (int)$value < 6 ? '=' : '>=', $value)
        )->when(
            $filters['badezimmer'] ?? false,
            fn ($query, $value) => $query->where('badezimmer', (int)$value < 6 ? '=' : '>=', $value)
        )->when(
            $filters['wohnflaecheVon'] ?? false,
            fn ($query, $value) => $query->where('wohnflaeche', '>=', $value)
        )->when(
            $filters['wohnflaecheBis'] ?? false,
            fn ($query, $value) => $query->where('wohnflaeche', '<=', $value)
            )->when(
                $filters['deleted'] ?? false,
                fn ($query, $value) => $query->withTrashed()

                )->when(
                    $filters['by'] ?? false,
                    fn ($query, $value) =>
                    !in_array($value, $this->sortable)
                        ? $query :
                        $query->orderBy($value, $filters['order'] ?? 'desc')
        );
    }

    Public function likes()
    { 
        return 
        $this->belongsToMany(User::class, 'likes')->withTimestamps();
     }
     public function comments()
     {
         return $this->hasMany(\App\Models\Comment::class,'listing_id');
     }

}
