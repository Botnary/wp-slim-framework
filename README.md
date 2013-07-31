Wordpress Slim framework plugin
===============================

I built this plugin from a need of using a micro framework as Slim but inside Wordpress.

Installation
------------

Copy wp-slim-framework folder with all it's content's into /wp-content/plugins directory. From Wordpress administrator enable the plugin and you are ready to go.

Usage
-----
To use it all you have to do is to map your routes.
This plugin will register your routes when action `slim_mapping` is triggered. This action has one argument which is the Slim object.
`add_action('slim_mapping',function($slim){
  $slim->get('/slim/api/user/:u',function($user){
  printf("User is %s",$user);            
  });
});
`
