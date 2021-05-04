# Selector
An extension for single place resaurants.
Let the customer select the delivery area from a dropdown list 

### Components
| Name     | Page variable                | Description                                      |
| -------- | ---------------------------- | ------------------------------------------------ |
| Area Dropdown Component  | `component('areaDropdown')` | Display a dropdown list of delivery areas |

### Search Component

**Properties**

| Property                 | Description              | Example Value | Default Value |
| ------------------------ | ------------------------ | ------------- | ------------- |
| showSelection            | Hides the search field            | true/false        | false         |
| menusPage                | Page name to the menus page            | local/menus         | local/menus         |

**Variables available in templates**

| Variable                  | Description                                                  |
| ------------------------- | ------------------------------------------------------------ |
| `{{ $areas }}` | List of Delivery Areas ordered by priority |
| `{{ $current }}` | Current selected Delivery Area |
| `{{ $showSelection }}` | Should the current selected Deliver Area be displayed |

**Example:**

```
---
title: 'Home'
permalink: /

'[areaDropdown]':
    showSelection: 0
    menusPage: local/menus
---
...
@component('areaDropdown')
...
```