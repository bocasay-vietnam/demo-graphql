<?php

require_once 'vendor/autoload.php';
include 'db.php';

use Siler\Graphql;

DB::loadDatas();

$typeDefinition = file_get_contents(__DIR__.'/schema.graphql');
$resolvers = include (__DIR__.'/resolvers.php');

$schema = Graphql\schema($typeDefinition, $resolvers);

Graphql\init($schema);