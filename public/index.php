<?php

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';

use \Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;



class User extends Model
{

    public function telegramId(){
        return $this->hasOne(Telegram::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

}

class Telegram extends Model
{


}

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}

$post1 = Post::find(1);
$post1->tags()->attach([1,5]);
foreach (Post::all() as $post){
    $post->tags()->attach([rand(1,10)]);
}

//foreach (User::all() as $user){
//    echo "<p>{$user->email}</p>";
//
//    foreach ($user->posts as $post){
//        echo "<h5>{$post->title}</h5>";
//        echo "<h6>{$post->text}</h6>";
//    }
//}

//foreach (Post::all() as $post){
//    echo "<p>{$post->title}</p>";
////    echo "<p>{$post->author}</p>";
//    echo "<p>{$post->user->email}</p>";
//}

//$post = Post::find(3);
//echo "<pre>";
//var_dump($post->author);
//echo "</pre>";

//$user = User::find(2);
//echo "<pre>";
//var_dump($user->telegramId->botId);
//echo "</pre>";
