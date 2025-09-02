<?php 
// database/settings/2025_01_01_000000_create_hdv_settings.php
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('hdv.enabled', config('hdv.enabled'));
        $this->migrator->add('hdv.enforcement', config('hdv.enforcement'));
        $this->migrator->add('hdv.scopes', []);

        $this->migrator->add('hdv.default_sla_hours', config('hdv.default_sla_hours'));
        $this->migrator->add('hdv.bypass_roles', config('hdv.bypass_roles'));
        $this->migrator->add('hdv.forbid_self_approval', config('hdv.forbid_self_approval'));
        $this->migrator->add('hdv.forbid_self_assignment', config('hdv.forbid_self_assignment'));

        $this->migrator->add('hdv.channels_default', config('hdv.channels_default'));
        $this->migrator->add('hdv.templates', config('hdv.templates'));
    }
};
