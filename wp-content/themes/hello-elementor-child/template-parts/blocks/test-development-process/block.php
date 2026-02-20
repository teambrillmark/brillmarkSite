<?php
/**
 * Test Development Process Block Template
 * Renders the A/B test development process section with tabs (desktop) and accordion (mobile)
 */

$block_id    = $block['id'] ?? '';
$className   = isset($block['className']) && $block['className'] ? 'test-development-process ' . esc_attr($block['className']) : 'test-development-process';
$heading     = get_field('heading') ?? '';
$description = get_field('description') ?? '';
$steps       = get_field('steps');

// Default steps from original HTML when repeater is empty
$default_steps = array(
    array(
        'tab_label'          => '1. Assess the Idea',
        'tab_icon'           => array(),
        'panel_image'        => array(),
        'panel_image_alt'    => 'Assess the idea – team discussing project vision and feasibility',
        'panel_description' => 'We start by immersing ourselves in your project to fully grasp your vision.',
        'panel_list'        => array(
            array('item' => 'Idea Assessment'),
            array('item' => 'Feasibility Analysis'),
            array('item' => 'Vision Alignment'),
            array('item' => 'Detailed Estimations'),
            array('item' => 'Approval to Proceed'),
        ),
        'cta_text' => "Let's Start the Conversation",
        'cta_url'  => '#',
    ),
    array(
        'tab_label'          => '2. Design and Plan',
        'tab_icon'           => array(),
        'panel_image'        => array(),
        'panel_image_alt'    => 'Design and plan – structuring the test approach',
        'panel_description' => 'We craft designs and strategies that resonate with your brand and appeal to your target audience.',
        'panel_list'        => array(
            array('item' => 'Brand Voice Analysis'),
            array('item' => 'Insight Gathering'),
            array('item' => 'UI/UX Design'),
            array('item' => 'Mobile Responsiveness'),
            array('item' => 'Feedback Implementation'),
            array('item' => 'Design Approval'),
        ),
        'cta_text' => "Let's Start the Conversation",
        'cta_url'  => '#',
    ),
    array(
        'tab_label'          => '3. Build the Test',
        'tab_icon'           => array(),
        'panel_image'        => array(),
        'panel_image_alt'    => 'Build the test – development and implementation',
        'panel_description' => 'Our development team brings the designs to life with clean, efficient code',
        'panel_list'        => array(
            array('item' => 'Local Development'),
            array('item' => 'Environment Setup'),
            array('item' => 'Quality Coding Practices'),
            array('item' => 'Responsive Development'),
            array('item' => 'Client Feedback Integration'),
        ),
        'cta_text' => "Let's Start the Conversation",
        'cta_url'  => '#',
    ),
    array(
        'tab_label'          => '4. Quality Assurance',
        'tab_icon'           => array(),
        'panel_image'        => array(),
        'panel_image_alt'    => 'Quality assurance – testing and validation',
        'panel_description' => 'We rigorously test every aspect of the project to guarantee flawless performance.',
        'panel_list'        => array(
            array('item' => 'Test Case Development'),
            array('item' => 'Self-QA Checklists'),
            array('item' => 'Multiphase Testing'),
            array('item' => 'Goal and KPI Verification'),
            array('item' => 'Transparency and Collaboration'),
        ),
        'cta_text' => "Let's Start the Conversation",
        'cta_url'  => '#',
    ),
    array(
        'tab_label'          => '5. Launch & Deploy',
        'tab_icon'           => array(),
        'panel_image'        => array(),
        'panel_image_alt'    => 'Launch and deploy – going live',
        'panel_description' => "We ensure a smooth launch and provide support to maintain and enhance your project's success.",
        'panel_list'        => array(
            array('item' => 'Pre-Launch Verification'),
            array('item' => 'Seamless Deployment'),
            array('item' => 'Post-Launch Monitoring'),
            array('item' => 'Continuous Maintenance'),
            array('item' => 'Performance Optimization'),
        ),
        'cta_text' => "Let's Start the Conversation",
        'cta_url'  => '#',
    ),
);

if (empty($steps) || ! is_array($steps)) {
    $steps = $default_steps;
}

$step_count = count($steps);
?>

<section class="<?php echo esc_attr($className); ?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="test-process-title-<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <?php if ($heading) : ?>
            <h2 class="section-title" id="test-process-title-<?php echo esc_attr($block_id); ?>"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
            <p class="description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>

        <nav class="process-tabs" role="tablist" aria-label="<?php esc_attr_e('Process steps', 'textdomain'); ?>">
            <?php foreach ($steps as $i => $step) :
                $step_num = $i + 1;
                $tab_id   = 'tab-' . esc_attr($block_id) . '-' . $step_num;
                $tab_label = isset($step['tab_label']) ? $step['tab_label'] : '';
                $tab_icon  = isset($step['tab_icon']) && is_array($step['tab_icon']) ? $step['tab_icon'] : array();
                $is_first  = ($step_num === 1);
            ?>
                <button class="process-tab<?php echo $is_first ? ' active' : ''; ?>" role="tab" aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>" data-step="<?php echo (int) $step_num; ?>" id="<?php echo $tab_id; ?>">
                    <?php if (!empty($tab_icon['url'])) : ?>
                        <img class="icon" src="<?php echo esc_url($tab_icon['url']); ?>" alt="" aria-hidden="true">
                    <?php else : ?>
                        <span class="icon" aria-hidden="true"></span>
                    <?php endif; ?>
                    <span><?php echo esc_html($tab_label); ?></span>
                </button>
            <?php endforeach; ?>
        </nav>

        <div class="process-content">
            <?php foreach ($steps as $i => $step) :
                $step_num   = $i + 1;
                $panel_id   = 'panel-' . esc_attr($block_id) . '-' . $step_num;
                $tab_id     = 'tab-' . esc_attr($block_id) . '-' . $step_num;
                $img        = isset($step['panel_image']) && is_array($step['panel_image']) ? $step['panel_image'] : array();
                $img_alt    = isset($step['panel_image_alt']) ? $step['panel_image_alt'] : '';
                $panel_desc = isset($step['panel_description']) ? $step['panel_description'] : '';
                $list_items = isset($step['panel_list']) && is_array($step['panel_list']) ? $step['panel_list'] : array();
                $cta_text   = isset($step['cta_text']) ? $step['cta_text'] : '';
                $cta_url    = isset($step['cta_url']) ? $step['cta_url'] : '#';
                $is_first   = ($step_num === 1);
            ?>
                <article class="process-panel<?php echo $is_first ? ' active' : ''; ?>" id="<?php echo $panel_id; ?>" role="tabpanel" aria-labelledby="<?php echo $tab_id; ?>" data-step="<?php echo (int) $step_num; ?>" <?php echo $is_first ? '' : ' hidden'; ?>>
                    <div class="panel-media">
                        <?php if (!empty($img['url'])) : ?>
                            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img_alt ?: ($img['alt'] ?? $img['title'] ?? '')); ?>" class="panel-img" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <?php if ($panel_desc) : ?>
                            <p class="panel-description"><?php echo esc_html($panel_desc); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($list_items)) : ?>
                            <ul class="panel-list">
                                <?php foreach ($list_items as $row) :
                                    $item_text = isset($row['item']) ? $row['item'] : '';
                                    if ($item_text === '') continue;
                                ?>
                                    <li><?php echo esc_html($item_text); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if ($cta_text) : ?>
                            <a href="<?php echo esc_url($cta_url); ?>" class="panel-cta"><?php echo esc_html($cta_text); ?></a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="process-accordion" aria-label="<?php esc_attr_e('Process steps', 'textdomain'); ?>" role="region">
            <?php foreach ($steps as $i => $step) :
                $step_num    = $i + 1;
                $acc_head_id = 'acc-head-' . esc_attr($block_id) . '-' . $step_num;
                $acc_content_id = 'acc-content-' . esc_attr($block_id) . '-' . $step_num;
                $accordion_title = isset($step['tab_label']) ? $step['tab_label'] : '';
                $tab_icon    = isset($step['tab_icon']) && is_array($step['tab_icon']) ? $step['tab_icon'] : array();
                $panel_desc  = isset($step['panel_description']) ? $step['panel_description'] : '';
                $list_items  = isset($step['panel_list']) && is_array($step['panel_list']) ? $step['panel_list'] : array();
                $cta_text    = isset($step['cta_text']) ? $step['cta_text'] : '';
                $cta_url     = isset($step['cta_url']) ? $step['cta_url'] : '#';
                $is_first    = ($step_num === 1);
            ?>
                <div class="accordion-item<?php echo $is_first ? ' active' : ''; ?>">
                    <button type="button" class="accordion-header" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="<?php echo $acc_content_id; ?>" id="<?php echo $acc_head_id; ?>" data-accordion="<?php echo (int) $step_num; ?>">
                        <?php if (!empty($tab_icon['url'])) : ?>
                            <img class="accordion-icon" src="<?php echo esc_url($tab_icon['url']); ?>" alt="" aria-hidden="true">
                        <?php else : ?>
                            <span class="accordion-icon" aria-hidden="true"></span>
                        <?php endif; ?>
                        <span class="accordion-title"><?php echo esc_html($accordion_title); ?></span>
                        <span class="accordion-caret" aria-hidden="true"></span>
                    </button>
                    <div id="<?php echo $acc_content_id; ?>" class="accordion-content" role="region" aria-labelledby="<?php echo $acc_head_id; ?>" <?php echo $is_first ? '' : ' hidden'; ?>>
                        <hr class="accordion-divider">
                        <?php if ($panel_desc) : ?>
                            <p class="panel-description"><?php echo esc_html($panel_desc); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($list_items)) : ?>
                            <ul class="panel-list">
                                <?php foreach ($list_items as $row) :
                                    $item_text = isset($row['item']) ? $row['item'] : '';
                                    if ($item_text === '') continue;
                                ?>
                                    <li><?php echo esc_html($item_text); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if ($cta_text) : ?>
                            <a href="<?php echo esc_url($cta_url); ?>" class="panel-cta"><?php echo esc_html($cta_text); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
