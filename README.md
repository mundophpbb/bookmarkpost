# BookmarkPost

Version: 1.0.9

Bookmark individual posts and manage saved posts from the User Control Panel.
Includes English and Brazilian Portuguese translations and prosilver styling.

## Requirements

- phpBB 3.3.x
- PHP 7.1 or later, subject to the requirements of your phpBB release

## Installation

1. Upload the contents of the bookmarkpost directory to
   `ext/mundophpbb/bookmarkpost/` in your phpBB installation.
2. Open Administration Control Panel > Customise > Manage extensions.
3. Enable BookmarkPost and purge the phpBB cache.

## Updating

1. Back up your extension files and database.
2. Disable BookmarkPost without deleting its data.
3. Replace the files in `ext/mundophpbb/bookmarkpost/` with this version.
4. Enable the extension again and purge the phpBB cache.

## Usage

Sign in and use the star next to the author and posting date to bookmark or
unbookmark a post. Open User Control Panel > Overview > Post bookmarks to
review saved posts and remove selected bookmarks. Indicators in forum and
topic lists show bookmark counts.

## License

The supplied original code declares a proprietary SiteSplat license. See
`license.txt`. This maintenance release does not change the original license.
A license notice is not evidence of eligibility for the phpBB extension
database; resolve the original license terms before submission.

## Validation

The supplied Workspace report could not run official EPV because proc_open()
was disabled. Re-run Workspace validation and official EPV in an environment
where it is available. A live phpBB installation is required for functional
testing of bookmarks, UCP removal, and forum/topic indicators.
