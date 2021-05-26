https://blog.astrid-guenther.de/der-weg-zu-joomlae4-erweiterungen/

# Boilerplate and Tutorial Sample Files
Boilerplate files for Joomla! 4 extensions. *Use [duplicate.sh](https://github.com/astridx/boilerplate/blob/t43/duplicate.sh) to replace Foo, FOO and foo with the name you want for the extension.*. You have to change the strings at the beginning:
```
ex="yourname"
Ex="Yourname"
EX="YOURNAME"
...
```

You had to run the script twice.


# Tutorial Sample Files
You can find the Tutorial Sample Files in the folder *Tutorial* :)

# Installation

A installable zip file of the last version you can find in the release tab. 
So you do not need to clone this repo.

The boilerplates are in the folder `src`. They can be installed 
as-is using the Extension Manager. 
However, the component, module and plugin will be called Foo :)

The easiest way is to copy 

- the files in administrator folder in the administrator folder of your Joomla installation.
- the files in components folder in the components folder of your Joomla installation.
- the files in media folder in the media folder of your Joomla installation.

Then you can run discover this extension via Joomla System Installer.

To create installable zip packages, you need to run
`composer i` and and after that `vendor/bin/robo build` and in the `dist` 
folder it is ready to be installed.

# Customizing
To customize the boilerplates using your own name you need to take the following steps:

1. Do a **case-sensitive** replace on the following strings and replace them with your own name:
   * foo
   * Foo
   * FOO
2. Do a **case-sensitive** replace on the following tags with their actual information:
   * [DATE]
   * [PROJECT_NAME]
   * [AUTHOR]
   * [AUTHOR_EMAIL]
   * [AUTHOR_URL]
   * [COPYRIGHT]
   * [PACKAGE_NAME]
