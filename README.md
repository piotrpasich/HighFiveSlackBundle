#HighFiveSlackBundle

This is a plugin for the XTeam SlackMessage Bundle which count a number of high fives on slack. Once a week we publish
a chart with statistics on slack.

## Installation

### Step 1: Composer require

``` bash
$ php composer.phar require xteam/highfiveslackbundle "dev-master"
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new XTeam\HighFiveSlackBundle\XTeamHighFiveSlackBundle(),
    );

    if (...) {
        // ...
        $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
    };


    // ...
}
```

### Step 3: Add options to parameters.yml

```
#app/config/parameters.yml
parameters:
  # ...
  slack.token: Your SLack token
```

### Step 4: Add routes

```
#app/congig/routes.yml

x_team_slack_messenger:
    resource: "@XTeamSlackMessengerBundle/Resources/config/routing.yml"
    prefix:   /

```

Notes
---------

This bundle requires a Symfony in version higher or equal 2.7