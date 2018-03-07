<?php

// Home
Breadcrumbs::register('welcome', function ($breadcrumbs) {
   
    $breadcrumbs->push('Home', route('welcome'));
});

Breadcrumbs::register('blogpost', function ($breadcrumbs) {
    
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push('Blog', route('blog'));
});

// // Home > About
// Breadcrumbs::register('about', function ($breadcrumbs) {
//     $breadcrumbs->parent('home');
//     $breadcrumbs->push('About', route('about'));
// });

// Home > Blog


// // Home > Blog > [Category]
// Breadcrumbs::register('category', function ($breadcrumbs, $category) {
//     $breadcrumbs->parent('blog');
//     $breadcrumbs->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::register('post', function ($breadcrumbs, $post) {
//     $breadcrumbs->parent('category', $post->category);
//     $breadcrumbs->push($post->title, route('post', $post));
// });

?>