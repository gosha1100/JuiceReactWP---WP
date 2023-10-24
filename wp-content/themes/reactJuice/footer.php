</div> <!-- End React App Container -->

<?php wp_footer(); ?>

<?php
$footerMenu = wp_get_nav_menu_items('footer-menu');


foreach ($footerMenu as $item) {
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

echo '<pre>';
print_r($structuredMenu);

$encodedMenu = json_encode($structuredMenu);
?>
<div data-component="footer" data-props='<?= $encodedMenu ?>'></div>

<script src="<?php echo get_template_directory_uri(); ?>/index.js"></script>

</body>
</html>
