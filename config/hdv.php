<?php 
// config/hdv.php
return [
    // Fallback .env (les Settings prennent le dessus à runtime)
    'enabled' => env('HDV_ENABLED', true),
    'enforcement' => env('HDV_ENFORCEMENT', 'allow_all_when_disabled'),
    'table_prefix' => env('HDV_TABLE_PREFIX', 'hdv_'),

    // Caching du snapshot settings
    'cache' => [
        'key' => 'hdv:settings:snapshot',
        'ttl' => 3600, // 1h, invalidé lors d’update Settings
    ],

    // Defaults Validation
    'default_sla_hours' => 48,
    'bypass_roles' => ['super-admin'],
    'forbid_self_approval' => true,
    'forbid_self_assignment' => true,

    // Notifications
    'channels_default' => ['database', 'webpush'],
    'templates' => [
        // 'approval.assigned' => 'hdv::notifications/approval_assigned',
    ],
];
