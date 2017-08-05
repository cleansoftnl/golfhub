<?php
use App\Models\Revision;

return [
    'title' => '操作记录',
    'heading' => '操作记录',
    'single' => '操作记录',
    'model' => Revision::class,
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
    ],
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'revisionable_type' => [
            'title' => '记录 of  Model'
        ],
        'revisionable_id' => [
            'title' => '记录 of  id',
            'sortable' => false,
        ],
        'user' => [
            'title' => '操作user',
            'relationship' => 'user',
            'select' => "(:table).name",
        ],
        'key' => [
            'title' => '操作 of 字段',
        ],
        'logs' => [
            'title' => '操作 of  Log',
            'output' => function ($value, $model) {
                $html = "<div style='text-align:left;'>
                            <div style='text-indent:2em'>'old_value'&nbsp;&nbsp;&nbsp;=> '$model->old_value',</div>
                            <div style='text-indent:2em'>'new_value' => '$model->new_value'</div>
                        </div>";
                return $html;
            }
        ],
        'created_at' => [
            'title' => '操作时间'
        ]
    ],
    'edit_fields' => [
        'id' => [
            'title' => 'id'
        ]
    ],
    'filters' => [
        'revisionable_type' => [
            'title' => '记录 of  Model'
        ],
        'revisionable_id' => [
            'title' => '记录 of  id',
        ],
        'user' => [
            'title' => '操作user',
            'type' => 'relationship',
            'select' => "(:table).name",
        ],
        'key' => [
            'title' => '操作 of 字段',
        ],
        'old_value' => [
            'title' => '修改前 of 值'
        ],
        'new_value' => [
            'title' => '修改后 of 值'
        ],
    ],
    'actions' => [],
];
