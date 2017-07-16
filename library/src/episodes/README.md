# Episodes Module

Labs are comprised of multiple episodes.  This module provides the functionality to split the episodes into a parent (lab landing page) and child (episode video page) architecture.

## Features

The features include the following:

1. Automatic episode pre-build - click the button in the lab's back-end to automatically prebuild the playlist and stats.
2. Playlist - consistent episode playlist
3. Single episode template handler
4. Metadata handler
5. New `[episodes_playlist]` shortcode

This module includes the following events to allow other plugins/theme to interact with it.

1. `render_episode_buttons` action event to alert User History to build/render out the buttons
2. `built_the_episodes_playlist` action event alerts listeners the parent lab just built the episodes' playlist

## Configuration

Everything is configurable using the configuration files found in the `config/episodes` folder.

## Contributions

All feedback, bug reports, and pull requests are welcome.