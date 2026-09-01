# Changelog
This is a list of changes made to my version of ECDBpersonal.

## 
* Fixed some bugs in the code.
* Changed the database collation to utf8mb3_swedish_ci.
* Removed some dead code.
* Changed css to display a wider area.
* Fixed some things in the database.

## [2026-09-01]
* Removed all instances of the SMD checkbox. There is no need to use it as the Package should contain the proper package type.
* Removed smd from the database.
* Removed Price from all component listings except Shoplist.
* Added Location to all component listings.
* Replaced the All section with statistics that shows each head category and the number of components in each category.
* Started to localize all text strings to be able to use php i18n
* Clean up code, switch from tabs to 4 spaces
