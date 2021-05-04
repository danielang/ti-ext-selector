<div class="selector">
    <form
        method="POST"
        role="form"
        data-request="{{ $selectAreaEventHandler }}"
        data-control="selector-dropdown"
    >
        <div class="dropdown">
            <button
                class="btn btn-light btn-block dropdown-toggle text-truncate"
                type="button"
                data-toggle="dropdown"
                data-boundary="scrollParent"
                aria-haspopup="true"
                aria-expanded="true"
            >
                <i class="fa fa-map-marker"></i>&nbsp;&nbsp;
                <b>
                    {{ $showSelection ? $current->name : lang('danielang.selector::default.area_dropdown_component_choose_action') }}
                </b>
            </button>

            <div class="dropdown-menu" aria-labelledby="areaPicker">
                @foreach ($areas as $area)
                    <button
                        type="button"
                        class="dropdown-item py-2 {{ $showSelection && $area->getKey() === $current->getKey() ? 'active' : '' }}"
                        data-area-id="{{ $area->getKey() }}"
                    >
                        {{ $area->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="area" value="{{ $current->getKey() }}" />
    </form>
</div>
