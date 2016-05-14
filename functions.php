<?php
function zboom_default_functions(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    
    load_theme_textdomain('zboom',get_template_directory_uri().'/languages'); // to make website translateble
    
    if(function_exists('register_nav_menu')){
        register_nav_menu('main-menu',__('Main Menu', 'zboom'));
    }
    
    function read_more($limit){
        $post_content=  explode(" ",get_the_content());
        $less_content=  array_slice($post_content, 0, $limit);
        echo implode(" ", $less_content);
    }
    
    
    register_post_type('zboom-slider',array(
        'labels'=>array(
            'name'=>'Sliders',
            'add_new_item'=>'Add new slider'
        ),
        'public'=>true,
        'supports'=>array('title','thumbnail')
    ));
    
    register_post_type('zboom-service',array(
        'labels'=>array(
            'name'=>'Blocks',
            'add_new_item'=>__('Add New Block','zboom')
        ),
        'public'=>TRUE,
        'supports=>'=>array('title','editor')
    ));
}
add_action('after_setup_theme','zboom_default_functions');