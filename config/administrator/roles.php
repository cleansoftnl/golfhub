<?php
use App\Models\Role;

return [
    'title' => 'user组',
    'heading' => 'user组',
    'single' => 'user组',
    'model' => Role::class,
    'permission' => function () {
        return Auth::user()->may('manage_users');
    },
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'display_name' => [
            'title' => '显示name',
            'sortable' => false
        ],
        'name' => [
            'title' => '标识'
        ],
        'operation' => [
            'title' => 'operation',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'display_name' => [
            'title' => '显示name',
        ],
        'name' => [
            'title' => '标识',
        ],
        'description' => [
            'type' => 'textarea',
            'title' => 'description',
        ],
        'perms' => array(
            'type' => 'relationship',
            'title' => '权限',
            'name_field' => 'display_name',
        ),
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'display_name' => [
            'title' => '显示name'
        ],
        'name' => [
            'title' => '标识',
        ]
    ],
    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
        'display_name' => 'required|unique:roles,display_name'
    ],
    'messages' => [
        'name.required' => '标识不能为空',
        'name.unique' => '标识已存在',
        'display_name.required' => '显示name不能为空',
        'display_name.unique' => '显示name已存在'
    ]
];
