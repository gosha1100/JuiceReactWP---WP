<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
$menu_items = wp_get_nav_menu_items('navigation-menu');

function prepare_menu_data($items) {
    $top_level_items = array_filter($items, function ($item) {
        return $item->menu_item_parent == 0;
    });

    $menu = array_map(function ($item) {
        return [
            'id' => $item->ID,
            'url' => $item->url,
            'title' => $item->title,
            'items' => []
        ];
    }, $top_level_items);

    $menu = array_column($menu, null, 'id');

    $sub_items = array_filter($items, function ($item) use ($menu) {
        return isset($menu[$item->menu_item_parent]);
    });

    array_map(function ($item) use (&$menu) {
        $menu[$item->menu_item_parent]['items'][] = [
            'id' => $item->ID,
            'url' => $item->url,
            'title' => $item->title
        ];
    }, $sub_items);

    return array_values($menu);
}

$prepared_data = prepare_menu_data($menu_items);

print_r($prepared_data);
?>

<div data-component="header" data-props='<?php echo json_encode($prepared_data); ?>'></div>