<?php

$repeater_items = array();

if (isset($attributes['repeater']) && is_array($attributes['repeater'])) {
    foreach ($attributes['repeater'] as $item) {
        $title = isset($item['title']) ? $item['title'] : null;
        $image_url = isset($item['image']['url']) ? $item['image']['url'] : null;

        if ($title !== null && $image_url !== null) {
            $repeater_items[] = array(
                'title' => $title,
                'url' => $image_url
            );
        }
    }
}

$destructuredJuicer = [
    'headline' => $attributes['headline'],
    'items' => $repeater_items,
];

$encodedJuicer = json_encode($destructuredJuicer);
?>

<div data-component="juice" data-props='<?= $encodedJuicer; ?>'></div>
