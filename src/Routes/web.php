<?php

use Illuminate\Support\Facades\Route;
/*
Route::middleware(['web'])
    ->namespace('ConfrariaWeb\Post\Controllers\Frontend')
    ->prefix('posts')
    ->name('posts.')
    ->group(function () {

        Route::get('{section}', function ($section) {
            return $section . 'section';
        })->name('section');

        Route::get('{section}/{category}', function ($section, $category) {
            return $category . 'category';
        })->name('category');

        Route::get('{section}/{category}/{post}', function ($section, $category, $post) {
            return $post . '$post';
        })->name('post');

    });

Route::middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Post\Controllers\Backend')
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::prefix('posts')
            ->name('posts.')
            ->group(function () {


                Route::get('datatable', 'PostController@datatables')->name('datatables');

                Route::prefix('sections')
                    ->name('sections.')
                    ->group(function () {
                        Route::get('datatable', 'PostSectionController@datatables')->name('datatables');
                    });
                Route::resource('sections', 'PostSectionController');

                Route::prefix('categories')
                    ->name('categories.')
                    ->group(function () {
                        Route::get('{section}/datatable', 'PostCategoryController@datatables')->name('datatables');
                    });
                Route::resource('categories', 'PostCategoryController');

            });

        Route::resource('posts', 'PostController');
    });
*/