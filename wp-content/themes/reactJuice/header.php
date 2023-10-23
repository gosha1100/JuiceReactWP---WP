<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php

$navMenu = wp_get_nav_menu_items('navigation-menu');

foreach ($navMenu as $items) {
    $structuredMenu[] = [
        'id'               => $items->ID,
        'menu_item_parent' => $items->menu_item_parent,
        'title'            => $items->title,
        'url'              => $items->url,
    ];
}

echo '<pre>' . print_r($structuredMenu, true) . '</pre>';
echo 'jojo';

$encodedMenu = json_encode($structuredMenu);
?>

<div data-component="nav-bar" data-props='<?php echo $encodedMenu; ?>'></div>