<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $setting = $this->findSetting('site.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.title'),
                'value'        => __('Seiyra Design'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.description'),
                'value'        => __('Seiyra Design'),
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 2,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.logo');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.logo'),
                'value'        => 'images\SeyraDesignLogo.png',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.google_analytics_tracking_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.google_analytics_tracking_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.email');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Email'),
                'value'        => 'seiyra8@gmail.com',
                'details'      => '',
                'type'         => 'text',
                'order'        => 6,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.linkedin');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('LinkedIn '),
                'value'        => 'https://www.linkedin.com/in/noramolnarercsei',
                'details'      => '',
                'type'         => 'text',
                'order'        => 7,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.instagram');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Instagram'),
                'value'        => 'https://www.instagram.com/seiyradesign',
                'details'      => '',
                'type'         => 'text',
                'order'        => 8,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.behance');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Behance'),
                'value'        => 'https://www.behance.net/nmolnar-ercsei',
                'details'      => '',
                'type'         => 'text',
                'order'        => 9,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('welcome.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Welcome Title '),
                'value'        => 'Welcome to Seiyra Design',
                'details'      => '',
                'type'         => 'text',
                'order'        => 10,
                'group'        => 'Welcome',
            ])->save();
        }

        $setting = $this->findSetting('welcome.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Welcome Description'),
                'value'        => 'My passion is to create beautiful designs. Unique, eye-pleasing, and effective.',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 11,
                'group'        => 'Welcome',
            ])->save();
        }

        $setting = $this->findSetting('services.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Services Title'),
                'value'        => 'Services',
                'details'      => '',
                'type'         => 'text',
                'order'        => 12,
                'group'        => 'Services',
            ])->save();
        }

        $setting = $this->findSetting('services.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Services Description'),
                'value'        => 'As a graphic designer who has digital marketing experience, I can help you with several different design and marketing projects.<br>From creating user-friendly web or app designs, through helping your brand recognition with a unique logo design and social media marketing designs to do quality photo editing for you. Other individual requests can be considered, so please contact me and we can discuss the details. 
                ',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 13,
                'group'        => 'Services',
            ])->save();
        }

        $setting = $this->findSetting('portfolio.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Portfolio Title'),
                'value'        => 'Portfolio',
                'details'      => '',
                'type'         => 'text',
                'order'        => 14,
                'group'        => 'Portfolio',
            ])->save();
        }

        $setting = $this->findSetting('portfolio.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Portfolio Description'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 15,
                'group'        => 'Portfolio',
            ])->save();
        }

        $setting = $this->findSetting('contact.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Contact Title'),
                'value'        => 'Contact Me',
                'details'      => '',
                'type'         => 'text',
                'order'        => 16,
                'group'        => 'Contact',
            ])->save();
        }

        $setting = $this->findSetting('contact.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('Contact Description'),
                'value'        => 'I\'d love to help you reach your goals, contact me today.',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 17,
                'group'        => 'Contact',
            ])->save();
        }

        $setting = $this->findSetting('admin.bg_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.background_image'),
                'value'        => 'images\bg3.png',
                'details'      => '',
                'type'         => 'image',
                'order'        => 5,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.title'),
                'value'        => 'Seiyra Design',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.description'),
                'value'        => __('Welcome to Seiyra Design'),
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 2,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.loader');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.loader'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.icon_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.icon_image'),
                'value'        => 'images\favicon.png',
                'details'      => '',
                'type'         => 'image',
                'order'        => 4,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.google_analytics_client_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.google_analytics_client_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
