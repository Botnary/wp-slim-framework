Wordpress Slim framework plugin
===============================

I built this plugin from a need of using a micro framework as Slim but inside Wordpress.

Installation
------------

Copy wp-slim-framework folder with all it's content's into /wp-content/plugins directory.
From Wordpress administrator enable the plugin and you are ready to go. But keep in mind that after enabling this plugin
Wordpress must use permalinks `Settings -> Permalinks` use any structure except default one and `Save changes`.

Usage
-----
To use it all you have to do is to map your routes.
This plugin will register your routes when action `slim_mapping` is triggered.
This action has one argument which is the Slim object.

Example of usage:
    
    add_action('slim_mapping',function($slim){
        $slim->get('/slim/api/user/:u',function($user){
        printf("User is %s",$user);            
        });
    });

Example of usage inside of a class:

    class Rest{
        function __construct(){
            add_action('slim_mapping',array(&$this,'slim_mapping');            
        }

        function slim_mapping($slim){
            //if needed the class context
            $context = $this;
            $slim->get('/slim/api/user/:u',function($user)use($context){
                  $context->printUser($user);            
            });
            $slim->put('/slim/api/user/:id',function($id)use($context){
                  $context->updateUser($id);
            });
            //.... and so on
        }

        function printUser($user){
            printf("User is %s",$user);
        }
    }
The default base path of the url is `/slim/api`. Added the possibility to change the base path, it can be found
in `Settings -> Slim Framework`.
Note: All routes must have the default base path `/slim/api` or the one used here `Settings -> Slim Framework`.
This is added to avoid misunderstandings with Wordpress permalinks.

