<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General Settings
            ['key' => 'site_name', 'value' => 'Hainan Sendus Education', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Connecting Africa to Quality Education in China', 'type' => 'text', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'info@senduseducation.com', 'type' => 'text', 'group' => 'general'],
            ['key' => 'contact_phone', 'value' => '+86 123 456 7890', 'type' => 'text', 'group' => 'general'],
            ['key' => 'contact_address', 'value' => 'Haikou, Hainan Province, China', 'type' => 'text', 'group' => 'general'],
            
            // Social Links
            ['key' => 'social_facebook', 'value' => '#', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => '#', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => '#', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => '#', 'type' => 'text', 'group' => 'social'],
            
            // SMTP Settings
            ['key' => 'smtp_host', 'value' => '127.0.0.1', 'type' => 'text', 'group' => 'smtp'],
            ['key' => 'smtp_port', 'value' => '2525', 'type' => 'text', 'group' => 'smtp'],
            ['key' => 'smtp_username', 'value' => '', 'type' => 'text', 'group' => 'smtp'],
            ['key' => 'smtp_password', 'value' => '', 'type' => 'text', 'group' => 'smtp'],
            ['key' => 'smtp_encryption', 'value' => 'tls', 'type' => 'text', 'group' => 'smtp'],
            ['key' => 'smtp_from_address', 'value' => 'noreply@senduseducation.com', 'type' => 'text', 'group' => 'smtp'],
            ['key' => 'smtp_from_name', 'value' => 'Hainan Sendus Education', 'type' => 'text', 'group' => 'smtp'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
