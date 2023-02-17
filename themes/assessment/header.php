<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment</title>
    <?php wp_head();?>
</head>
<body <?php body_class();?>>

    <nav id='header'>
        <ul class='primary-menu'>
           <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu'
                ));
           ?>
        </ul>
    </nav>
    
