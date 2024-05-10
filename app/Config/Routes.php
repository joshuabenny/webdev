<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Blogs;
use App\Controllers\Agents;
use App\Controllers\Search;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('blogs', [Blogs::class, 'index']);
$routes->get('blogs/new', [Blogs::class, 'new']);
$routes->post('blogs', [Blogs::class, 'create']);
$routes->get('blogs/(:segment)', [Blogs::class, 'show']);

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('agents', [Agents::class, 'index']);

$routes->get('search/searchSuggestions', 'Search::searchSuggestions');