# Changelog

## v3.3.0 (2026-08-26)

### What's fixed

* Videos now load when clicked rather than all at once, fixing every embed rendering blank on pages with a long video list. `loading="lazy"` in v3.2.1 did not fix this — it defers embeds, it does not limit them, so all of them still loaded and exhausted the browser's resource budget.

## v3.2.1 (2026-08-25)

### What's fixed

* Fixed most videos failing to load by deferring off-screen embeds
* Fixed the preconnect hint pointing at the wrong Loom origin

## v2.1.1 (2023-09-13)

### What's fixed

* Fixed "broken" video grid with Statamic 4 by @duncanmcclean

## v2.1.0 (2023-04-28)

### What's new

- Statamic 4 Compatibility #3 by @duncanmcclean

## v2.0.0 (2022-10-20)

### What's new

- You may now customise the section name & page title in the Control Panel navigation #2 by @atopping

## v1.0.1

**Full Changelog**: https://github.com/steadfast-collective/statamic-cp-resources/compare/v1.0.0...v1.0.1

## v1.0.0

Initial release.
