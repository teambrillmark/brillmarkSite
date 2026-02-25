<?php
/**
 * Register additional ACF fields for Video Testimonial Section block.
 * Add these to your existing block field group, or this file registers them in a separate group.
 */

if (!function_exists('acf_add_local_field_group')) {
  return;
}

acf_add_local_field_group([
  'key' => 'group_video_testimonial_section_extra',
  'title' => 'Video Testimonial Section — Options',
  'fields' => [
    [
      'key'   => 'field_vts_common_images',
      'label' => 'Common Images',
      'name'  => 'common_images',
      'type'  => 'gallery',
      'instructions' => 'Upload images to display in this section (e.g. logos, thumbnails). Shown above the main content.',
      'required' => 0,
      'return_format' => 'array',
      'preview_size' => 'medium',
      'library' => 'all',
      'min' => 0,
      'max' => 0,
    ],
    [
      'key'   => 'field_vts_slides_per_view',
      'label' => 'Slides per view',
      'name'  => 'slides_per_view',
      'type'  => 'number',
      'instructions' => 'Number of testimonial slides visible at once (Layout 3 slider). 1–5.',
      'required' => 0,
      'default_value' => 1,
      'min' => 1,
      'max' => 5,
      'step' => 1,
    ],
    [
      'key'   => 'field_vts_section_background',
      'label' => 'Section background',
      'name'  => 'section_background',
      'type'  => 'text',
      'instructions' => 'CSS background value. Supports solid colors and gradients, e.g. <code>#f5f5f5</code> or <code>linear-gradient(135deg, #667eea 0%, #764ba2 100%)</code>',
      'required' => 0,
      'placeholder' => 'e.g. linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
    ],
    [
      'key'   => 'field_vts_quote_icon',
      'label' => 'Quote icon',
      'name'  => 'quote_icon',
      'type'  => 'image',
      'instructions' => 'Upload a custom quote icon image. Used in text testimonials (Layout 2 and 3). Leave empty to use the default SVG/character.',
      'required' => 0,
      'return_format' => 'array',
    ],
  ],
  'location' => [
    [
      [
        'param' => 'block',
        'operator' => '==',
        'value' => 'acf/video-testimonial-section',
      ],
    ],
  ],
]);
