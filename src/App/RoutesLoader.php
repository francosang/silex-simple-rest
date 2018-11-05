<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['notes.controller'] = function() {
            return new Controllers\NotesController($this->app['notes.service']);
        };

        $this->app['users.controller'] = function() {
            return new Controllers\UsersController($this->app['users.service']);
        };
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        // CRUD notes
        $api->get('/notes', "notes.controller:getAll");
        $api->get('/notes/{id}', "notes.controller:getOne");
        $api->post('/notes', "notes.controller:save");
        $api->put('/notes/{id}', "notes.controller:update");
        $api->delete('/notes/{id}', "notes.controller:delete");

        // notas de un usuario
        $api->get('/users/{userId}/notes', "notes.controller:getAllByUser");

        // CRUD users
        $api->get('/users', "users.controller:getAll");
        $api->get('/users/{id}', "users.controller:getOne");
        $api->post('/users', "users.controller:save");
        $api->put('/users/{id}', "users.controller:update");
        $api->delete('/users/{id}', "users.controller:delete");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

