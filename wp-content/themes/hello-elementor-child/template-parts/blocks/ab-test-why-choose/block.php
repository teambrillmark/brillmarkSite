<?php
/**
 * AB Test Why Choose Block Template
 * Renders the comparison table with ACF field values
 */

$block_id         = $block['id'] ?? '';
$className        = isset($block['className']) && $block['className'] ? 'AB-test-why-choose ' . esc_attr($block['className']) : 'AB-test-why-choose';
$heading          = get_field('heading') ?? '';
$description      = get_field('description') ?? '';
$column_2_header  = get_field('column_2_header') ?? '';
$column_3_header  = get_field('column_3_header') ?? '';
$table_rows       = get_field('table_rows') ?: [];

// Default rows from HTML when repeater is empty
if (empty($table_rows)) {
    $table_rows = [
        [
            'criteria_label'   => 'Team Composition',
            'brillmark_content' => '<strong>Full-Service A/B Testing Experts –</strong> Enjoy a dedicated crew of project managers, developers, QA specialists, GA & tool analysts, CRO strategists, and UX designers working in sync on your experimentation goals.',
            'other_content'    => 'Typically a <strong>solo developer</strong> or a small, core-centric team with limited knowledge of A/B testing tools and methodologies, risking delays and subpar execution.',
        ],
        [
            'criteria_label'   => 'Service Scope',
            'brillmark_content' => '<strong>All-Inclusive, End-to-End –</strong> From ideation and technical setup to development, QA, and final deployment, we handle every stage for your A/B test campaigns and CRO projects.',
            'other_content'    => '<strong>Primarily Development-Focused –</strong> Lacks comprehensive A/B testing support and tool knowledge, limiting capabilities for big experimentation or complex test implementations.',
        ],
        [
            'criteria_label'   => 'Cost-Effectiveness',
            'brillmark_content' => '<strong>Transparent, Hourly Model –</strong> Pay only for the services you need, with no hidden costs. Gain a complete, cross-functional team—no need for multiple separate hires.',
            'other_content'    => '<strong>Hidden Costs for Each Stage –</strong> Separate fees for project management, QA, analytics, etc., quickly driving up expenses as your testing and development needs grow.',
        ],
        [
            'criteria_label'   => 'Flexibility & Integration',
            'brillmark_content' => '<strong>Seamless Collaboration –</strong> Our specialists coordinate under one process, ensuring timely delivery and frictionless integration with your internal workflows and marketing tools.',
            'other_content'    => '<strong>Limited Team Interaction –</strong> Focused on narrow deliverables with minimal synergy, often causing communication gaps, missed deadlines, or suboptimal test designs.',
        ],
        [
            'criteria_label'   => 'End-to-End Support',
            'brillmark_content' => '<strong>Dedicated Lifecycle Assistance –</strong> From platform migrations (Shopify, WordPress) to new site launches, we provide ongoing support for everything from setting up goals to troubleshooting post-launch issues.',
            'other_content'    => '<strong>Minimal Post-Launch Backup –</strong> Tends to offer limited dev support for diagnosing goal-tracking problems or resolving analytics bugs after deployment.',
        ],
    ];
}

$title_id = 'ab-test-why-choose-title-' . esc_attr($block_id);
$wrapper = theme_get_block_wrapper_attributes($block, $title_id);
?>

<section class="<?php echo esc_attr($className);?> <?php echo $wrapper['class'];?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="<?php echo esc_attr($title_id); ?>">
    <div class="container">
        <?php if ($heading) : ?>
            <h2 class="title" id="<?php echo esc_attr($title_id); ?>"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php if ($description) : ?>
            <p class="description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>

        <div class="table-container" role="region" aria-label="<?php echo esc_attr__('Comparison table', 'textdomain'); ?>">
            <div class="column-01">
                <div class="row row-01"><?php echo esc_html__('CRITERIA', 'textdomain'); ?></div>
                <?php foreach ($table_rows as $i => $row) :
                    $row_class = 'row row-' . sprintf('%02d', $i + 2);
                    $criteria = $row['criteria_label'] ?? '';
                    if ($criteria === '') continue;
                ?>
                    <div class="<?php echo esc_attr($row_class); ?>"><?php echo esc_html($criteria); ?></div>
                <?php endforeach; ?>
            </div>
            <div class="column-02">
                <div class="row row-01 highlight"><?php echo wp_kses_post($column_2_header); ?></div>
                <?php foreach ($table_rows as $i => $row) :
                    $row_class = 'row row-' . sprintf('%02d', $i + 2);
                    $content = $row['brillmark_content'] ?? '';
                ?>
                    <div class="<?php echo esc_attr($row_class); ?>">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="column-03">
               <div class="row row-01"><?php echo wp_kses_post($column_3_header); ?></div>
                <?php foreach ($table_rows as $i => $row) :
                    $row_class = 'row row-' . sprintf('%02d', $i + 2);
                    $content = $row['other_content'] ?? '';
                ?>
                    <div class="<?php echo esc_attr($row_class); ?>">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
