# city-budget-calculator

Council-ready dashboard showing how employee healthcare costs hit a city's General Fund, tax rate, household tax bills, reserves, and the health fund itself.

## What it models

- **General Fund pressure**: the recurring amount the General Fund must find each year above today's healthcare cost. Two bases:
  - *Full healthcare increase*: assumes normal revenue growth is already spoken for.
  - *Only growth faster than the General Fund*: assumes normal revenue growth covers healthcare at the GF growth rate.
- **Share charged to the General Fund**: most cities bill part of the plan to water, sewer, airport and other funds. Only the GF share drives GF pressure.
- **Tax rate and household impact**, cumulative versus today, plus an approximate check against the voter-approval M&O cap (3.5% for Texas cities under current law; editable).
- **Reserves if the rate is held flat**: every year's gap comes out of fund balance, and the first fiscal year below policy is flagged.
- **Plan improvement scenarios**: each scenario has a trend and a one-time year-1 savings reset, with total savings versus status quo.
- **Health fund liquidity** (optional): months of claims in cash, how much of the fund is IOUs from other funds, and how many months a fixed-dollar reserve target really covers as claims grow.

Outputs: KPI tiles, four charts, a year-by-year table, CSV of all scenarios, a print/PDF report, a read-aloud summary, and a shareable link that reopens the dashboard with the same inputs (stored in the link itself, never sent to a server).

## Editing

`index.html` is the only file to edit. Then run:

```
./sync-copies.sh
```

That copies it to `full-dashboard.html` and the WordPress plugin folder and rebuilds `wordpress-plugin/city-budget-dashboard.zip`.

## WordPress (reliable setup)

If pasting raw HTML into a page does not calculate, use the included shortcode plugin package:

- Plugin folder: [wordpress-plugin/city-budget-dashboard](wordpress-plugin/city-budget-dashboard)
- Main plugin file: [wordpress-plugin/city-budget-dashboard/city-budget-dashboard.php](wordpress-plugin/city-budget-dashboard/city-budget-dashboard.php)

### Install or update

1. In WordPress Admin, go to Plugins → Add New → Upload Plugin.
2. Upload `wordpress-plugin/city-budget-dashboard.zip` and activate. To update, upload the new zip and choose "Replace current with uploaded."

### Use

Add this shortcode to any page/post:

`[city_budget_dashboard]`

The embed grows to fit the dashboard automatically. `height` sets a minimum:

`[city_budget_dashboard height="1500"]`

Optional width behavior:

- Fill content area width: `[city_budget_dashboard max_width="none"]`
- Full browser-width (edge to edge): `[city_budget_dashboard full_bleed="yes"]`
