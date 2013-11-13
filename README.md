ScContent
=======================

This module in process.
At this time, the module works only with the database MySql.

Introduction
-----------------
This is a simple module for editing the content based on Zend Framework 2.

Requirements
-----------------
* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)
* [ZfcUser](https://github.com/ZF-Commons/ZfcUser) (latest master)
* [ZfcBase](https://github.com/ZF-Commons/ZfcBase) (latest master)



Installation
---------------

### Main Setup

#### By cloning project

1. Install the [ZfcBase](https://github.com/ZF-Commons/ZfcBase) ZF2 module
   by cloning it into `./vendor/`.
2. Install the [ZfcUser](https://github.com/ZF-Commons/ZfcUser) ZF2 module
   by cloning it into `./vendor/`.
3. Clone this project into your `./vendor/` directory.

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "dphn/sc-content" : "dev-master"
    }
    ```
 
2. Now tell composer to download ScContent by running the command:

    ```bash
    $ php composer.phar update
    ```
    
#### Post installation

1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'ZfcBase',
            'ZfcUser',
            'ScContent',
        ),
        // ...
    );
    ```
    
2. Further installation is automatic.

