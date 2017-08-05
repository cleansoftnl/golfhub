<?php
use App\Models\SiteStatus;

return [
    'title' => 'title',
    'heading' => 'heading',
    'single' => 'single',
    'model' => SiteStatus::class,
    'permission' => function () {
        // return Auth::user()->hasRole('Developer');
        return true;
    },
    'action_permissions' => [
        'create' => function ($model) {
            return false;
        },
        'update' => function ($model) {
            return false;
        },
        'delete' => function ($model) {
            return false;
        },
        'view' => function ($model) {
            return true;
        },
    ],
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'day' => [
            'title' => '日期',
            'sortable' => false,
        ],
        'register_count' => [
            'title' => '注册user数',
        ],
        'github_regitster_count' => [
            'title' => 'Github 注册数',
        ],
        'wechat_registered_count' => [
            'title' => 'WeChat 注册数',
        ],
        'topic_count' => [
            'title' => 'topic数量',
        ],
        'reply_count' => [
            'title' => 'replies数量',
        ],
        'image_count' => [
            'title' => '图片数量',
        ],
        'operation' => [
            'title' => 'operation',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'day' => [
            'title' => '日期',
        ],
    ],
    'filters' => [
        'day' => [
            'title' => '日期',
        ],
    ],
];
