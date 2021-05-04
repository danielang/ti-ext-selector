<?php namespace Danielang\AreaSelector;

use System\Classes\BaseExtension;

/**
 * AreaSelector Extension Information File
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
            'Danielang\AreaSelector\Components\Dropdown' => [
                'code' => 'areaDropdown',
                'name' => 'lang:danielang.areaselector::default.dropdown_component_title',
                'description' => 'lang:danielang.areaselector::default.dropdown_component_desc',
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
