<?php

return [
    'namespace' => 'App\Models',
    'path' => app_path('Models'),
    'base_class' => \Illuminate\Database\Eloquent\Model::class,
    'date_format' => 'Y-m-d H:i:s',
    'base_files' => false,
    'snake_attributes' => true,
    'qualified_tables' => false,
    'plural_table_names' => true,
    'doctrine' => false,
];
