<?php
use App\Models\Permission;

return [
    'title' => 'user组权限',
    'heading' => 'user组权限',
    'single' => 'user组权限',
    'model' => Permission::class,
    'permission' => function () {
        return Auth::user()->may('manage_users');
    },
    'action_permissions' => [
        'create' => function ($model) {
            return true;
        },
        'update' => function ($model) {
            return true;
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
        'name' => [
            'title' => '标示',
            'sortable' => false,
        ],
        'display_name' => [
            'title' => '权限name',
            'sortable' => false,
        ],
        'description' => [
            'title' => 'description',
            'sortable' => false,
            'output' => function ($value, $model) {
                return empty($value) ? 'N/A' : $value;
            },
        ],
        'roles' => [
            'title' => 'user组',
            'output' => function ($value, $model) {
                $model->load('roles');
                $result = [];
                foreach ($model->roles as $role) {
                    $result[] = $role->display_name;
                }
                return empty($result) ? 'N/A' : implode($result, ' | ');
            },
            'sortable' => false,
        ],
        'operation' => [
            'title' => 'operation',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'name' => [
            'title' => '标示（请慎重修改）',
        ],
        'display_name' => [
            'title' => '权限name',
        ],
        'description' => [
            'title' => 'description',
        ],
    ],
    'filters' => [
        'name' => [
            'title' => '标示',
        ],
        'display_name' => [
            'title' => '权限name',
        ],
        'description' => [
            'title' => 'description',
        ],
    ],
    'actions' => [],
];
