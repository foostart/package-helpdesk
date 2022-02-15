<?php

use Illuminate\Session\TokenMismatchException;

/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {


    /**
     * Common
     */
    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
        'namespace' => 'Foostart\Course\Controllers\Admin',
    ], function () {

        /**
         * configs
         */
        Route::get('admin/course/config', [
            'as' => 'Course.config',
            'uses' => 'CourseAdminController@config'
        ]);

        Route::post('admin/course/config', [
            'as' => 'course.config',
            'uses' => 'CourseAdminController@config'
        ]);

        /**
         * language
         */
        Route::get('admin/course/lang', [
            'as' => 'course.lang',
            'uses' => 'CourseAdminController@lang'
        ]);

        Route::post('admin/course/lang', [
            'as' => 'course.lang',
            'uses' => 'CourseAdminController@lang'
        ]);

    });

    /****************************************************************************
     * Course
     */
    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
        'namespace' => 'Foostart\Course\Controllers\Admin',
    ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage companies
          |-----------------------------------------------------------------------
          | 1. List of companies
          | 2. Edit course
          | 3. Delete course
          | 4. Add new course
          |
        */

        /**
         * list
         */
        Route::get('admin/course', [
            'as' => 'course',
            'uses' => 'CourseAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/course/edit', [
            'as' => 'course.edit',
            'uses' => 'CourseAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/course/copy', [
            'as' => 'course.copy',
            'uses' => 'CourseAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/course/edit', [
            'as' => 'course.post',
            'uses' => 'CourseAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/course/delete', [
            'as' => 'course.delete',
            'uses' => 'CourseAdminController@delete'
        ]);

        /**
         * restore
         */
        Route::get('admin/course/restore', [
            'as' => 'course.restore',
            'uses' => 'CourseAdminController@restore'
        ]);

        /**
         * trash
         */
        Route::get('admin/course/trash', [
            'as' => 'course.trash',
            'uses' => 'CourseAdminController@trash'
        ]);

        /**
         * search
         */
        Route::get('admin/course/search', [
            'as' => 'course.search',
            'uses' => 'CourseAdminController@search'
        ]);
    });
});
