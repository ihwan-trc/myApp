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
    $trail->parent('edit_category',$category);
    $trail->push($category->title, route('categories.edit',['category' => $category]));
});

// Dashboard > Categories > detail
Breadcrumbs::for('detail_category', function ($trail,$category) {
    $trail->parent('categories');
    $trail->push('Detail', route('categories.show',['category' => $category]));
});
// Dashboard > Categories > edit > [title]
Breadcrumbs::for('detail_category_title', function ($trail,$category) {
    $trail->parent('detail_category',$category);
    $trail->push($category->title, route('categories.show',['category' => $category]));
});

// Dashboard >Tags
Breadcrumbs::for('tags', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('tags.index'));
});
// Dashboard >Tags > Add
Breadcrumbs::for('add_tag', function ($trail) {
    $trail->parent('tags');
    $trail->push('Add', route('tags.create'));
});
// Dashboard > Tags > Edit > [title]
Breadcrumbs::for('edit_tag', function ($trail,$tag) {
    $trail->parent('tags',$tag);
    $trail->push('Edit', route('tags.edit',['tag' => $tag]));
    $trail->push($tag->title, route('tags.edit',['tag' => $tag]));
});
// Dashboard > Posts
Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('posts.index'));
});

// Dashboard > Posts > Add
Breadcrumbs::for('add_post', function ($trail) {
    $trail->parent('posts');
    $trail->push('Add', route('posts.create'));
});
// Dashboard > Posts > Detail > [title]
Breadcrumbs::for('detail_post', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push('Detail', route('posts.show',['post' => $post]));
    $trail->push($post->title, route('posts.show',['post' => $post]));
});
// Dashboard > Posts > Edit > [title]
Breadcrumbs::for('edit_post', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push('Edit', route('posts.edit',['post' => $post]));
    $trail->push($post->title, route('posts.edit',['post' => $post]));
});
// Dashboard > Filemanager
Breadcrumbs::for('file_manager', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('File Manager', route('filemanager.index'));
});

// Dashboard > Roles
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});
// Dashboard > Roles > Add
Breadcrumbs::for('add_role', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Add', route('roles.create'));
});
// Dashboard > Roles > Detail > [name]
Breadcrumbs::for('detail_role', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push('Detail', route('roles.show',['role' => $role]));
    $trail->push($role->name, route('roles.show',['role' => $role]));
});
// Dashboard > Roles > Edit > [title]
Breadcrumbs::for('edit_role', function ($trail,$role) {
    $trail->parent('roles');
    $trail->push('Edit', route('roles.edit',['role' => $role]));
    $trail->push($role->name, route('roles.edit',['role' => $role]));
});

// Dashboard > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});
// Dashboard > Users > Add
Breadcrumbs::for('add_user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Add', route('users.create'));
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