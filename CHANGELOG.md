# Changelog
This is a list of changes made to my version of ECDBpersonal.

## 
* Fixed some bugs in the code.
* Changed the database collation to utf8mb3_swedish_ci.
* Removed some dead code.
* Changed css to display a wider area.
* Fixed some things in the database.

## [Unreleased]
* Started to look att export and import of the database with option to add, delete or change records in the database.
* Started to look at implementing PDF output of shopping list
* Used an online translator for po-files. Looked promising, but I will keep this on hold as for now.

## [2026-09-03]
* Removed Email from the code, it was not used, no need to keep it.
* Localized more files, removed localization code from a bunch of files as it was already included in include/header.php
* Update of the statistics page, now it only display components and projects belonging to the logged in user

## [2026-09-01]
* Removed all instances of the SMD checkbox. There is no need to use it as the Package should contain the proper package type.
* Removed smd from the database.
* Removed Price from all component listings except Shoplist.
* Added Location to all component listings.
* Replaced the All section with statistics that shows each head category and the number of components in each category.
* Started to localize all text strings to be able to use php i18n
* Clean up code, switch from tabs to 4 spaces
