<?php

use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use Foostart\Category\Helpers\FooCategory;
use Foostart\Category\Helpers\SortTable;

/*
|-----------------------------------------------------------------------
| GLOBAL VARIABLES
|-----------------------------------------------------------------------
|   $sidebar_items
|   $sorting
|   $order_by
|   $plang_admin = 'helpdesk-admin'
|   $plang_front = 'helpdesk-front'
*/
View::composer([
                // Helpdesk
                'package-helpdesk::admin.helpdesk-edit',
                'package-helpdesk::admin.helpdesk-form',
                'package-helpdesk::admin.helpdesk-items',
                'package-helpdesk::admin.helpdesk-item',
                'package-helpdesk::admin.helpdesk-search',
                'package-helpdesk::admin.helpdesk-config',
                'package-helpdesk::admin.helpdesk-lang',

    ], function ($view) {

        //Order by params
        $params = Request::all();

        /**
         * $plang-admin
         * $plang-front
         */
        $plang_admin = 'helpdesk-admin';
        $plang_front = 'helpdesk-front';

        $fooCategory = new FooCategory();
        $key = $fooCategory->getContextKeyByRef('admin/helpdesk');

        /**
         * $sidebar_items
         */
        $sidebar_items = [
            trans('helpdesk-admin.sidebar.add') => [
                'url' => URL::route('helpdesk.edit', []),
                'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>'
            ],
            trans('helpdesk-admin.sidebar.list_companies') => [
                "url" => URL::route('helpdesk', []),
                'icon' => '<i class="fa fa-list-ul" aria-hidden="true"></i>'
            ],
            trans('pexcel-admin.sidebar.category') => [
                'url' => URL::route('categories.list', ['_key=' . $key]),
                'icon' => '<i class="fa fa-sitemap" aria-hidden="true"></i>'
            ],
            trans('helpdesk-admin.sidebar.config') => [
                "url" => URL::route('helpdesk.config', []),
                'icon' => '<i class="fa fa-braille" aria-hidden="true"></i>'
            ],
            trans('helpdesk-admin.sidebar.lang') => [
                "url" => URL::route('helpdesk.lang', []),
                'icon' => '<i class="fa fa-language" aria-hidden="true"></i>'
            ],
        ];

        /**
         * $sorting
         * $order_by
         */
        $orders = [
            '' => trans($plang_admin.'.form.no-selected'),
            'id' => trans($plang_admin.'.fields.helpdesk_id'),
            'helpdesk_name' => trans($plang_admin.'.fields.helpdesk_name'),
            'updated_at' => trans($plang_admin.'.fields.updated_at'),
            'status' => trans($plang_admin.'.fields.status'),
        ];
        $sortTable = new SortTable();
        $sortTable->setOrders($orders);
        $sorting = $sortTable->linkOrders();

        //Order by
        $order_by = [
            'asc' => trans('category-admin.order.by-asc'),
            'desc' => trans('category-admin.order.by-des'),
        ];

        // assign to view
        $view->with('sidebar_items', $sidebar_items );
        $view->with('order_by', $order_by);
        $view->with('sorting', $sorting);
        $view->with('plang_admin', $plang_admin);
        $view->with('plang_front', $plang_front);
});
