<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of bootstrapper classes to load
 */
/**
 * ----------------------------------------------------------
 * List of bootstrapper classes
 * ----------------------------------------------------------
 */
return [
    "Project\\Authentication\\Bootstrappers\\Credentials",
    "Project\\Databases\\Bootstrappers\\SQL",
    "Project\\ORM\\Bootstrappers\\ORM"
];