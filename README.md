# Gravpluginmanager Plugin

**This README.md file should be modified to describe the features, installation, configuration, and general usage of the plugin.**

The **Gravpluginmanager** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav). plugin manager other plugin

## Installation

Installing the Gravpluginmanager plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](http://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install gravpluginmanager

This will install the Gravpluginmanager plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/gravpluginmanager`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `gravpluginmanager`. You can find these files on [GitHub](https://github.com//grav-plugin-gravpluginmanager) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/gravpluginmanager
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com//grav-plugin-gravpluginmanager/blob/master/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/gravpluginmanager/gravpluginmanager.yaml` to `user/config/plugins/gravpluginmanager.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

Note that if you use the Admin Plugin, a file with your configuration named gravpluginmanager.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

## Usage

Go to the root of your project. 
```sh
bin/plugin gravpluginmanager
```
There are ways to use the plugin, you can `install` plugins from a file that this has generated or `export` the modules to a file, so that we have two argument.

### Export
To export the plugins in a file, you must pass the name of the output file (required) and/or the target directory where the file will be saved.

The syntax to export a file with its name:
```sh
bin/plugin gravpluginmanager export <filename> 
```
The syntax to export a file with its name is the target directory.
```sh
bin/plugin gravpluginmanager export <filename> <directory target>
```

### Install
To install the plugins, you must give it the name of the file or the relative path of the file.
```sh
bin/plugin gravpluginmanager install <filename>
```
