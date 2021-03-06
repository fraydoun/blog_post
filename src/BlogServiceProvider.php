<?php
namespace Fraidoon\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider{


    public function boot(){
        
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views','blog');
        
        
        \Livewire\Livewire::component('Category', Http\Livewire\Category::class);
        \Livewire\Livewire::component('Post', Http\Livewire\Post::class);
        \Livewire\Livewire::component('PostCreate', Http\Livewire\PostCreate::class);
        \Livewire\Livewire::component('PostUpdate', Http\Livewire\PostUpdate::class);
        \Livewire\Livewire::component('Comment', Http\Livewire\Comment::class);
        
        $this->publishes([__DIR__.'\public' => public_path('/vendor/blog')], 'public');
    }


    public function register(){
        
    }

}