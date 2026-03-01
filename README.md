# city-budget-calculator
calculator for city officials to see impact of healthcare on ovrerall budget

## WordPress (reliable setup)

If pasting raw HTML into a page does not calculate, use the included shortcode plugin package:

- Plugin folder: [wordpress-plugin/city-budget-dashboard](wordpress-plugin/city-budget-dashboard)
- Main plugin file: [wordpress-plugin/city-budget-dashboard/city-budget-dashboard.php](wordpress-plugin/city-budget-dashboard/city-budget-dashboard.php)

### Install

1. Zip the `city-budget-dashboard` folder.
2. In WordPress Admin, go to Plugins → Add New → Upload Plugin.
3. Upload and activate the zip.

### Use

Add this shortcode to any page/post:

`[city_budget_dashboard]`

Optional custom height:

`[city_budget_dashboard height="2400"]`

Optional width behavior:

- Fill content area width: `[city_budget_dashboard max_width="none"]`
- Full browser-width (edge to edge): `[city_budget_dashboard full_bleed="yes"]`
