# Tools

## a cake2.x plugin

This plugin contains several useful tools that can be used in many projects.
Please fork and help to improve (bugfixing, test cases, ...)

CODING STANDARDS
- http://www.dereuromark.de/coding-standards/

## How to include
Installing the Plugin is pretty much as with every other CakePHP Plugin.

* Put the files in `APP/Plugin/Tools`
* Make sure you have `CakePlugin::load('Tools')` or `CakePlugin::loadAll()` in your bootstrap

That's it

## The basics

MyModel can be extended to use more powerful validation and other improvements:

    App::uses('MyModel', 'Tools.Model');

    class AppModel extends MyModel {
    }

MyHelper can be extended and used this way:

    App::uses('MyHelper', 'Tools.View/Helper');

    class AppHelper extends MyHelper {
    }

The test suite improvements can be used via:

    App::uses('MyCakeTestCase', 'Tools.TestSuite');

    class SomeClassTest extends MyCakeTestCase {
    }

To run any of the console commands (replace [ShellName] and [command]!):

    cake Tools.[ShellName] [command]

The models, behaviors, helpers, libs and other classes are used the same way prefixing them with the plugin name:

    App::uses('GooglLib', 'Tools.Lib');
    App::uses('TimeLib', 'Tools.Utility');
    App::uses('GeocodeBehavior', 'Tools.Model/Behavior');
    ...

Tip: For how to use them, try to find some information in the test cases.