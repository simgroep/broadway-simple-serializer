BroadwaySimpleSerializer
------------------------

At SIMgroep we're really fond of DDD, CQRS and event sourcing. We build our applications using the Symfony
framework and Broadway. One of the things in Broadway that requires a lot of repetitions is implementing
the `Broadway\Serializer\SerializableInterface` for your domain events. The serializer in this repository
aims to solve this problem. Yes, this is a little bit of magic. And magic is evil. Use it wisely!

[![Build Status](https://travis-ci.org/simgroep/broadway-simple-serializer.svg?branch=master)](https://travis-ci.org/simgroep/broadway-simple-serializer)

# Installation

Summon composer:

    $ composer require simgroep/broadway-simple-serializer

Enable the bundle: 

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new Simgroep\BroadwaySimpleSerializer\Bundle\SimgroepBroadwaySimpleSerializerBundle(),
    );
}

```

# Configuration

Configure Broadway:

```yml
broadway:
    serializer:
        payload: simgroep_broadway.simple_serializer

```

Enjoy!
