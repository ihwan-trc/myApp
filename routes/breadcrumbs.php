<?php // routes/breadcrumbs.php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});
// Dashboard > Home
Breadcrumbs::for('dashboard_home', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Home', '#');
});
// Dashboard >Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('categories.index'));
});
// Dashboard > Categories > add
Breadcrumbs::for('add_category', function ($trail) {
    $trail->parent('categories');
    $trail->push('Add', route('categories.create'));
});
// Dashboard > Categories > edit
Breadcrumbs::for('edit_category', function ($trail,$category) {
    $trail->parent('categories');
    $trail->push('Edit', route('categories.edit',['category' => $category]));
});
// Dashboard > Categories > edit > [title]
Breadcrumbs::for('edit_category_title', function ($trail,$category) {
    $trail->parent('categories',$category);
    $trail->push($category->title, route('categories.edit',['category' => $category]));
});

// Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });