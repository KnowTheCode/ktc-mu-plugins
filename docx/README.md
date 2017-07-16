# Docx Plugin

Powering up our Labs, Docx, and Glossary goodness. Library Plugin adds all the functionality we need for our video, lab, docx, and glossary libraries including the custom post types, shortcodes, taxonomies, scripts, and more.

## Features

This plugin extends [Fulcrum](https://github.com/hellofromtonya/Fulcrum). It's OOP and fully configurable.  The components include the needed post type, taxonomy, shortcode(s), meta, and templates.

1. Labs - Code workshop labs libraries
2. Docx - Technology documentation libraries
3. Custom permalink structure for the Docx
4. Glossary - Terminology library
5. Episodes module - Lab episodes and playlist handling

Packages included are:

1. [FitVids](http://fitvidsjs.com/) - A lightweight, easy-to-use jQuery plugin for fluid width video embeds.
2. [Composer](https://getcomposer.org/)

Shortcodes that this plugin provides are:

1. `[content_adder]` - this shortcode provides an event hook for us to add content into any page where we place this baby.
2. `[docx_list]` - Docx list
3. `[latest_content]` - Lists the latest content for the selected type
4. `[technology_list]` - Technologies list
5. `[vimeo]` - container for the Vimeo videos
6. `[episode_playlist]` - Playlist of lab episodes

## Custom Permalink Structure
The Docx require a custom permalink structure to ensure the base of `docx\%technology%` is incorporated into the permalink.  With this, we needed to add additional query vars, rewrite rules, and inpost permalink filtering.  The main functionality is contained within [Fulcrum](https://github.com/hellofromtonya/Fulcrum), but is configured here in this plugin.

Our structure is `/docx/%technology%/%postname%`, e.g. `https://knowthecode.io/docx/php/foreach`.

## Dependencies

This plugin is dependent upon the following:

1. [Fulcrum](https://github.com/hellofromtonya/Fulcrum) - The central custom repository for WordPress
2. [Genesis](http://www.studiopress.com/features/) theming framework - the templates use Genesis.
3. [Carbon](http://carbon.nesbot.com/docs/) - which is baked into Fulcrum

## Installation

1. Install the [Fulcrum](https://github.com/hellofromtonya/Fulcrum), the central custom repository plugin for WordPress.
2. Then you can install this plugin.

Installation from GitHub is as simple as cloning the repo onto your local machine.  To clone the repo, do the following:

1. Using PhpStorm, open your project and navigate to `wp-content/plugins/`. (Or open terminal and navigate there).
2. Then type: `git clone https://github.com/KnowTheCode/Library`.

## Configuration

Everything is configurable using the configuration files found in the `config` folder.

## Contributions

All feedback, bug reports, and pull requests are welcome.