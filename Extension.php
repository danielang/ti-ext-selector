<?php namespace Danielang\Selector;

use System\Classes\BaseExtension;

/**
 * Selector Extension Information File
 */
class Extension extends BaseExtension
{
    /**
     * Register method, called when the extension is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this extension.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Danielang\Selector\Components\AreaDropdown' => [
                'code' => 'areaDropdown',
                'name' => 'lang:danielang.selector::default.area_dropdown_component_title',
                'description' => 'lang:danielang.selector::default.area_dropdown_component_desc',
            ],
        ];
    }

    /**
     * Registers any admin permissions used by this extension.
     *
     * @return array
     */
    public function registerPermissions()
    {
// Remove this line and uncomment block to activate
        return [
//            'Danielang.AreaSelector.SomePermission' => [
//                'description' => 'Some permission',
//                'group' => 'module',
//            ],
        ];
    }
}
