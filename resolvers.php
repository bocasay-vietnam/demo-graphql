<?php 

return [
    'Query'=> [
        'version' => function($root, $args){
            return "1.0";
        },
        'users'=> function($root,$args){
            return DB::$dbdatas['users'];
        },
        'posts'=> function($root,$args){
            return DB::$dbdatas['posts'];
        },
        'post'=> function($root,$args){
            return DB::$dbdatas['posts'][$args['id']];
        }
    ],
    'User'=>[
        'fullname'=> function($root,$args){
            return $root['firstname'] . ' ' .$root['lastname'] ;
        }
    ],
    'Post'=>[
        'author'=> function($root,$args){
            return DB::$dbdatas['users'][$root['author']];
        }
    ],
    'Mutation' => [
        'changeUserFirstname'=>function($root, $args){
            //(id: ID, firstname: String) : String
            DB::$dbdatas['users'][$args['id']]['firstname']= $args['firstname'];
            DB::saveDatas();
            return 'ok';
        }
    ]
];