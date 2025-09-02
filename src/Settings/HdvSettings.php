<?php
namespace LaravelHdv\Settings;

use Spatie\LaravelSettings\Settings;

class HdvSettings extends Settings
{
    public bool $enabled;
    public string $enforcement; // allow_all_when_disabled | deny_all_when_disabled
    public array $scopes; // ['site' => true|false, 'org_unit:{id}' => bool, 'geo_unit:{id}' => bool, 'model:{FQCN}' => bool]

    // Validation
    public int $default_sla_hours;
    public array $bypass_roles;
    public bool $forbid_self_approval;
    public bool $forbid_self_assignment;

    // Notifications
    public array $channels_default;
    public array $templates;

    public static function group(): string
    {
        return 'hdv';
    }
}
