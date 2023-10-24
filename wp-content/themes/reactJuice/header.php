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

$children = array();
foreach ($navMenu as $item) {
    $id = $item->ID;
    $parentId = $item->menu_item_parent;

    if (!isset($children[$parentId])) {
        $children[$parentId] = array();
    }

    $menuItem = array(
        'id' => $id,
        'parent_id' => $parentId,
        'title' => $item->title,
        'url' => $item->url,
    );

    if ($parentId == 0) {
        $structuredMenu['menu'][] = $menuItem;
    } else {
        $children[$parentId][] = $menuItem;
    }
}

foreach ($structuredMenu['menu'] as &$menuItem) {
    if (isset($children[$menuItem['id']])) {
        $menuItem['items'] = $children[$menuItem['id']];
    }
}

$encodedMenu = json_encode($structuredMenu);

?>

<div data-component="navbar" data-props='<?php echo $encodedMenu; ?>'></div>