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
    
    add_action('slim_mapping',function($slim){
        $slim->get('/slim/api/user/:u',function($user){
        printf("User is %s",$user);            
        });
    });

Note: All routes must have prefix `/slim/api`. This is added to avoid misunderstandings with Wordpress permalinks. But feel free to change it as you wish in `wp-slim-framework/wp-slim-framework.php` on line 17 `'(slim/api/)' => 'index.php'` and line 24 `if (strstr($_SERVER['REQUEST_URI'], '/slim/api')) {`
