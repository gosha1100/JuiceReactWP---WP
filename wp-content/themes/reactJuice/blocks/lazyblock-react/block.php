<?php
$destructuredJuicer = [
    'headline' => $attributes['headline']
];

$encodedJuicer = json_encode($destructuredJuicer);
?>

<div data-component="juice" data-props='<?php echo $encodedJuicer; ?>'></div>