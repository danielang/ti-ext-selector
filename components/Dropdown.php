<?php

namespace Danielang\AreaSelector\Components;

use Redirect;
use ApplicationException;
use Igniter\Local\Facades\Location;

class Dropdown extends \System\Classes\BaseComponent
{
    use \Igniter\Local\Traits\SearchesNearby;
    use \Main\Traits\UsesPage;

    public function defineProperties()
    {
        return [
            'showSelection' => [
                'type' => 'switch',
                'label' => 'lang:danielang.areaselector::default.dropdown_component_properties_show_selection',
                'comment' => 'lang:danielang.areaselector::default.dropdown_component_properties_show_selection_comment',
                'validationRule' => 'required|boolean',
                'default' => true,
            ],
            'menusPage' => [
                'type' => 'select',
                'label' => 'lang:danielang.areaselector::default.dropdown_component_properties_redirect_to',
                'comment' => 'lang:danielang.areaselector::default.dropdown_component_properties_redirect_to_comment',
                'options' => [static::class, 'getThemePageOptions'],
                'default' => 'local/menus',
                'validationRule' => 'regex:/^[a-z0-9\-_\/]+$/i',
            ],
        ];
    }

    public function onRun()
    {
        $this->addJs('js/dropdown.js', 'dropdown-areaselector-js');
        $this->addCss('css/dropdown.css', 'dropdown-areaselector-css');


        $this->prepareVars();
    }

    protected function prepareVars()
    {
        $this->page['location'] = Location::instance();

        $this->page['areas'] = Location::instance()->deliveryAreas()->sortBy('priority');
        $this->page['current'] = Location::instance()->coveredArea();

        $this->page['selectAreaEventHandler'] = $this->getEventHandler('onSelectArea');

        $this->page['showSelection'] = $this->property('showSelection');
    }

    protected function onSelectArea()
    {
        try {
            if (!strlen($areaId = post('area'))) {
                throw new ApplicationException(lang('igniter.local::default.alert_no_search_query'));
            }

            $deliveryAreas = Location::instance()->deliveryAreas();
            $deliveryArea = $deliveryAreas->get($areaId);

            if (!$deliveryArea) {
                throw new ApplicationException(lang('igniter.local::default.alert_no_found_restaurant'));
            }

            Location::updateNearbyArea($deliveryArea);

            return Redirect::to(restaurant_url($this->property('menusPage')));
        }
        catch (Exception $ex) {
            if (Request::ajax()) throw $ex;
            else flash()->danger($ex->getMessage());
        }
    }
}
