<?php
use App\Models\Tag;

return [
    'title' => 'label',
    'heading' => 'label',
    'single' => 'label',
    'model' => Tag::class,
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => 'name',
            'sortable' => false,
        ],
        'slug' => [
            'title' => 'Slug',
            'sortable' => false,
        ],
        'description' => [
            'title' => 'description',
            'sortable' => false,
        ],
        'depth' => [
            'title' => 'ordering level (0 max)',
            'sortable' => false,
        ],
        'count' => [
            'title' => '打过label的内容数量',
            'sortable' => false,
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
        'name' => [
            'title' => 'name',
        ],
        'slug' => [
            'title' => 'Slug',
        ],
        'description' => [
            'title' => 'description',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'label ID',
        ],
        'name' => [
            'title' => 'name',
        ],
    ],
    'actions' => [],
    'rules' => [
        'name' => 'required|min:1|unique:tags'
    ],
    'messages' => [
        'name.unique' => 'label名在数据库里有重复，请选用其他name。',
        'name.required' => 'Make sure the name is at least one character above',
    ],
];
