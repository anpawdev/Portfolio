<?php
$options = new StoutLogic\AcfBuilder\FieldsBuilder('Additional_options');
$options
  ->addTab('Head/Body_code')
    ->addTextarea('head_code', [
      'label' => 'Head code',
      'instructions' => 'Paste the code that will be placed in the head section of the page.',
    ])
    ->addTextarea('body_code', [
      'label' => 'Body code',
      'instructions' => 'Paste the code that will be placed immediately after opening the body tag of the page.',
    ])
    ->addTextarea('body_end_code', [
      'label' => 'Body end code',
      'instructions' => 'Paste the code that will be placed just before closing the body tag of the page.',
    ])
  ->setLocation('options_page', '==', 'acf-options');

add_action('acf/init', function () use ($options) {
  acf_add_local_field_group($options->build());
});
