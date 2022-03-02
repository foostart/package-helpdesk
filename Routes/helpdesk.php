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
        'namespace' => 'Foostart\Helpdesk\Controllers\Admin',
    ], function () {

        /**
         * configs
         */
        Route::get('admin/helpdesk/config', [
            'as' => 'Helpdesk.config',
            'uses' => 'HelpdeskAdminController@config'
        ]);

        Route::post('admin/helpdesk/config', [
            'as' => 'helpdesk.config',
            'uses' => 'HelpdeskAdminController@config'
        ]);

        /**
         * language
         */
        Route::get('admin/helpdesk/lang', [
            'as' => 'helpdesk.lang',
            'uses' => 'HelpdeskAdminController@lang'
        ]);

        Route::post('admin/helpdesk/lang', [
            'as' => 'helpdesk.lang',
            'uses' => 'HelpdeskAdminController@lang'
        ]);

    });

    /****************************************************************************
     * Helpdesk
     */
    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
        'namespace' => 'Foostart\Helpdesk\Controllers\Admin',
    ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage companies
          |-----------------------------------------------------------------------
          | 1. List of companies
          | 2. Edit helpdesk
          | 3. Delete helpdesk
          | 4. Add new helpdesk
          |
        */

        /**
         * list
         */
        Route::get('admin/helpdesk', [
            'as' => 'helpdesk',
            'uses' => 'HelpdeskAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/helpdesk/edit', [
            'as' => 'helpdesk.edit',
            'uses' => 'HelpdeskAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/helpdesk/copy', [
            'as' => 'helpdesk.copy',
            'uses' => 'HelpdeskAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/helpdesk/edit', [
            'as' => 'helpdesk.post',
            'uses' => 'HelpdeskAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/helpdesk/delete', [
            'as' => 'helpdesk.delete',
            'uses' => 'HelpdeskAdminController@delete'
        ]);

        /**
         * restore
         */
        Route::get('admin/helpdesk/restore', [
            'as' => 'helpdesk.restore',
            'uses' => 'HelpdeskAdminController@restore'
        ]);

        /**
         * trash
         */
        Route::get('admin/helpdesk/trash', [
            'as' => 'helpdesk.trash',
            'uses' => 'HelpdeskAdminController@trash'
        ]);

        /**
         * search
         */
        Route::get('admin/helpdesk/search', [
            'as' => 'helpdesk.search',
            'uses' => 'HelpdeskAdminController@search'
        ]);
    });
});
