<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $guarded = ['id'];


     public function videos()
    {
        return $this->morphMany(Video::class, 'videoble');
    }
    public function captions()
    {
        return $this->morphMany(Caption::class, 'captionable');
    }

     public function seasonobj()
    {
        return $this->belongsTo(Season::class,'season');
    }

     public function serie()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function play()
    {
        $slug_serie = $this->serie->slug;
        $season = $this->seasonobj->name;
         
            return route('S.Series.Play', ['slug' =>$slug_serie,'season'=>$season ,'section'=>$this->section]);
        
    }

   
}
