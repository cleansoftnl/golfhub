<?php
use App\Models\Category;

return [
    'title' => 'category',
    'heading' => 'category',
    'single' => 'category',
    'model' => Category::class,
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
        'slug' => [
            'title' => 'Slug',
        ],
        'description' => [
            'title' => 'description',
        ],
    ],
    'rules' => [
        'name' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'name.unique' => ' The category name already exists in the database. Please use another name.',
        'name.required' => 'Make sure the name is at least one character above',
    ],
];
