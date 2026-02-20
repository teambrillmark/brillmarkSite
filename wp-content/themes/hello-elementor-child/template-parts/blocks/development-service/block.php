<?php
/**
 * Development Service Block Template
 * Renders the block with ACF field values
 */

$block_id         = $block['id'] ?? '';
$block_class = isset($block['className']) && $block['className'] ? 'test-development-service ' . esc_attr($block['className']) : 'test-development-service';
$section_title    = get_field('section_title') ?? '';
$description      = get_field('description') ?? '';
$services         = get_field('services') ?: [];
$session_cta_text  = get_field('session_cta_text') ?? 'Schedule FREE strategy session';
$session_cta_url = get_field('session_cta_url') ?: '/contact-us/';

// Default services from HTML when empty
if (empty($services)) {
    $services = [
        [
            'tab_title'        => 'A/B Test Development',
            'tab_id'           => 'ab-test-development',
            'info_title'       => 'A/B Test Development',
            'info_description' => 'We specialize in high-velocity A/B testing—including server-side tests, multivariate experiments, personalization, and split-URL testing. Our process is designed for maximum efficiency and quality:',
            'info_list'        => '<ul><li><strong>Rapid Development</strong>: Build and deploy tests—often within a single day—on any platform.</li><li><strong>Adherence to Best Standards</strong>: We code with precision and follow strict QA protocols to guarantee flawless execution.</li><li><strong>Scalable Approach</strong>: Whether you\'re a startup or an enterprise, our solutions adapt to your evolving needs.</li></ul>',
            'cta_text'         => 'Schedule FREE strategy session',
            'cta_url'          => '/contact-us/',
        ],
        [
            'tab_title'        => 'A/B Test Tool Setup',
            'tab_id'           => 'ab-test-tool-setup',
            'info_title'       => 'A/B Test Tool Setup',
            'info_description' => 'Proper goal setting and data accuracy are vital for making informed decisions. We partner with leading platforms— Optimizely, Convert, AB Tasty, Varify.io, and more—to:',
            'info_list'        => '<ul><li><strong>Implement Quick & Accurate Setups</strong>: Eliminate guesswork with precise goal tracking.</li><li><strong>Streamline Data Flow</strong>: Ensure every metric you track feeds back into your experimentation seamlessly.</li><li><strong>Optimize Tool Usage</strong>: Maximize platform capabilities for faster, more reliable insights.</li></ul>',
            'cta_text'         => 'Schedule FREE strategy session',
            'cta_url'          => '/contact-us/',
        ],
        [
            'tab_title'        => 'CRM Integration',
            'tab_id'           => 'CRM-integration',
            'info_title'       => 'CRM Integration',
            'info_description' => 'A/B testing doesn\'t deliver its full value if your marketing tools aren\'t aligned. We integrate essential platforms like Marketo, HubSpot, and Clearbit with testing environments to:',
            'info_list'        => '<ul><li><strong>Sync CRM Dashboards</strong>: Keep all vital data in one place for easy analysis and action.</li><li><strong>Prevent Data Silos</strong>: Eliminate fragmented reporting and guesswork.</li><li><strong>Enhance Campaign Efficiency</strong>: Deploy, measure, and iterate on marketing strategies with confidence.</li></ul>',
            'cta_text'         => 'Schedule FREE strategy session',
            'cta_url'          => '/contact-us/',
        ],
        [
            'tab_title'        => 'A/B Test Mockups & Design',
            'tab_id'           => 'ab-test-mockups-design',
            'info_title'       => 'A/B Test Mockups & Design',
            'info_description' => 'Leverage our proven templates and design expertise to create captivating test variations:',
            'info_list'        => '<ul><li><strong>Industry-Trend Alignment</strong>: Modern, conversion-focused layouts that resonate with your brand\'s identity.</li><li><strong>Enhanced Functionality</strong>: Optimize landing pages, PDPs, and theme customizations without sacrificing style.</li><li><strong>Faster Feedback Loops</strong>: Quickly iterate on designs, elevating user experience and conversion rates.</li></ul>',
            'cta_text'         => 'Schedule FREE strategy session',
            'cta_url'          => '/contact-us/',
        ],
        [
            'tab_title'        => 'Server side testing',
            'tab_id'           => 'server-side-testing',
            'info_title'       => 'Server side testing',
            'info_description' => 'We excel in server-side A/B testing, handling code-level configurations across various tech stacks:',
            'info_list'        => '<ul><li><strong>Flexible Integration</strong>: Whether it\'s a custom-built site, eCommerce platform, or React-based app, we integrate smoothly.</li><li><strong>Accurate Data Collection</strong>: Ensure every user interaction is captured correctly, enabling precise measurements.</li><li><strong>Future-Proof Solutions</strong>: Build for scalability, so your testing strategy remains effective as you grow.</li></ul>',
            'cta_text'         => 'Schedule FREE strategy session',
            'cta_url'          => '/contact-us/',
        ],
        [
            'tab_title'        => 'Analytical Support',
            'tab_id'           => 'analytical-support',
            'info_title'       => 'Analytical Support',
            'info_description' => 'Data is key to driving meaningful improvements. We offer comprehensive analytical services, including GTM, GA4 configuration, and Looker Studio',
            'info_list'        => '<ul><li><strong>Dedicated Tool Setup</strong>: From code-level configuration to goal/event tracking, we ensure top-notch accuracy.</li><li><strong>Actionable Insights</strong>: Equip your team with reliable data to make informed decisions.</li><li><strong>Industry Best Practices</strong>: Maintain consistency and compliance throughout your project\'s lifecycle.</li></ul>',
            'cta_text'         => 'Schedule FREE strategy session',
            'cta_url'          => '/contact-us/',
        ],
        [
            'tab_title'        => 'A/B Test Quality Assurance',
            'tab_id'           => 'ab-test-quality-assurance',
            'info_title'       => 'A/B Test Quality Assurance',
            'info_description' => 'Our commitment to QA ensures your tests run flawlessly:',
            'info_list'        => '<ul><li><strong>Customized Checklists</strong>: Every test receives a tailored QA plan to cover edge cases and unique scenarios.</li><li><strong>Pre- & Post-Launch Testing</strong>: Maintain high standards at every stage, minimizing costly rework.</li><li><strong>Reduced Delays</strong>: Fewer back-and-forth cycles mean faster approvals and timely launches.</li></ul>',
            'cta_text'         => 'Schedule FREE strategy session',
            'cta_url'          => '/contact-us/',
        ],
        [
            'tab_title'        => 'CRO Support',
            'tab_id'           => 'CRO-support',
            'info_title'       => 'CRO Support',
            'info_description' => 'With decades of A/B testing expertise, BrillMark keeps you ahead of the curve:',
            'info_list'        => '<ul><li><strong>Cutting-Edge Insights</strong>: Stay on top of the latest trends and innovative tactics in conversion optimization.</li><li><strong>Strategic Guidance</strong>: We become an extra pair of eyes, refining your CRO campaigns for maximum impact.</li><li><strong>Focused on Results</strong>: Our goal is your success—each recommendation is designed to help you achieve measurable growth.</li></ul>',
            'cta_text'         => 'Schedule FREE strategy session',
            'cta_url'          => '/contact-us/',
        ],
    ];
}

$arrow_svg_active = '<svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11" fill="none"><path d="M5.79429 4.9298C5.93143 5.09143 6 5.28 6 5.49551C6 5.71102 5.93143 5.89959 5.79429 6.06122L1.29429 10.7755C1.14 10.9252 0.96 11 0.754286 11C0.548572 11 0.368571 10.9252 0.214286 10.7755C0.0714286 10.6139 0 10.4253 0 10.2098C0 9.99429 0.0714286 9.80571 0.214286 9.64408L4.2 5.49551L0.214286 1.34694C0.0714286 1.18531 0 0.996735 0 0.781224C0 0.565714 0.0714286 0.377143 0.214286 0.21551C0.368571 0.0718367 0.548572 -2.39788e-08 0.754286 -3.29709e-08C0.96 -4.19629e-08 1.14 0.0718367 1.29429 0.21551L5.79429 4.9298Z" fill="white" /></svg>';
$arrow_svg_default = '<svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11" fill="none"><path d="M5.79429 4.9298C5.93143 5.09143 6 5.28 6 5.49551C6 5.71102 5.93143 5.89959 5.79429 6.06122L1.29429 10.7755C1.14 10.9252 0.96 11 0.754286 11C0.548572 11 0.368571 10.9252 0.214286 10.7755C0.0714286 10.6139 0 10.4253 0 10.2098C0 9.99429 0.0714286 9.80571 0.214286 9.64408L4.2 5.49551L0.214286 1.34694C0.0714286 1.18531 0 0.996735 0 0.781224C0 0.565714 0.0714286 0.377143 0.214286 0.21551C0.368571 0.0718367 0.548572 -2.39788e-08 0.754286 -3.29709e-08C0.96 -4.19629e-08 1.14 0.0718367 1.29429 0.21551L5.79429 4.9298Z" fill="#112446" /></svg>';

$wrapper = theme_get_block_wrapper_attributes($block, $block_class);

?>

<section class="<?php echo esc_attr($block_class); ?> <?php echo $wrapper['class']; ?>" id="block-<?php echo esc_attr($block_id); ?>" aria-labelledby="dev-service-title-<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <?php if ($section_title) : ?>
            <h2 class="section-title" id="dev-service-title-<?php echo esc_attr($block_id); ?>"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>

        <?php if ($description) : ?>
            <p class="description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>

        <?php if (!empty($services)) : ?>
            <div class="service-wrapper">
                <div class="service-list" role="tablist" aria-label="<?php esc_attr_e('Service categories', 'textdomain'); ?>">
                    <?php foreach ($services as $index => $s) :
                        $tab_id    = !empty($s['tab_id']) ? sanitize_title($s['tab_id']) : 'service-' . $index;
                        $tab_title = $s['tab_title'] ?? '';
                        $is_first  = ($index === 0);
                        if ($tab_title === '') continue;
                    ?>
                        <div class="service-title<?php echo $is_first ? ' active' : ''; ?>" id="<?php echo esc_attr($tab_id); ?>" role="tab" aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="panel-<?php echo esc_attr($tab_id); ?>" tabindex="<?php echo $is_first ? '0' : '-1'; ?>">
                            <p><?php echo esc_html($tab_title); ?></p>
                            <div class="active-icon" aria-hidden="true"><?php echo $arrow_svg_active; ?></div>
                            <div class="icon" aria-hidden="true"><?php echo $arrow_svg_default; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="service-info-list">
                    <?php foreach ($services as $index => $s) :
                        $tab_id      = !empty($s['tab_id']) ? sanitize_title($s['tab_id']) : 'service-' . $index;
                        $info_title  = $s['info_title'] ?? '';
                        $info_desc   = $s['info_description'] ?? '';
                        $info_list   = $s['info_list'] ?? '';
                        $cta_text    = $s['cta_text'] ?? '';
                        $cta_url     = isset($s['cta_url']) && $s['cta_url'] !== '' ? $s['cta_url'] : '#';
                        $is_first    = ($index === 0);
                    ?>
                        <div class="service-info<?php echo $is_first ? ' active' : ''; ?>" id="panel-<?php echo esc_attr($tab_id); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($tab_id); ?>" <?php echo $is_first ? '' : ' hidden'; ?>>
                            <?php if ($info_title) : ?>
                                <h3 class="info-title"><?php echo esc_html($info_title); ?></h3>
                            <?php endif; ?>
                            <?php if ($info_desc) : ?>
                                <div class="info-description"><?php echo wp_kses_post($info_desc); ?></div>
                            <?php endif; ?>
                            <?php if ($info_list) : ?>
                                <div class="info-list"><?php echo wp_kses_post($info_list); ?></div>
                            <?php endif; ?>
                            <?php if ($cta_text) : ?>
                                <a href="<?php echo esc_url($cta_url); ?>" class="info-cta"><?php echo esc_html($cta_text); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="service-accordion" role="region" aria-label="<?php esc_attr_e('Services accordion', 'textdomain'); ?>">
                <?php foreach ($services as $index => $s) :
                    $tab_id    = !empty($s['tab_id']) ? sanitize_title($s['tab_id']) : 'accordion-' . $index;
                    $tab_title = $s['tab_title'] ?? '';
                    $info_desc = $s['info_description'] ?? '';
                    $info_list = $s['info_list'] ?? '';
                    $is_first  = ($index === 0);
                    if ($tab_title === '') continue;
                ?>
                    <div class="service-accordion-item<?php echo $is_first ? ' active' : ''; ?>">
                        <div class="accordion-header" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="accordion-content-<?php echo esc_attr($tab_id); ?>" id="accordion-head-<?php echo esc_attr($tab_id); ?>">
                            <p><?php echo esc_html($tab_title); ?></p>
                            <div class="active-icon" aria-hidden="true"><?php echo $arrow_svg_active; ?></div>
                            <div class="icon" aria-hidden="true"><?php echo $arrow_svg_default; ?></div>
                        </div>
                        <div class="accordion-content" id="accordion-content-<?php echo esc_attr($tab_id); ?>" role="region" aria-labelledby="accordion-head-<?php echo esc_attr($tab_id); ?>">
                            <?php if ($info_desc) : ?>
                                <div class="content-description"><?php echo wp_kses_post($info_desc); ?></div>
                            <?php endif; ?>
                            <?php if ($info_list) : ?>
                                <div class="content-list"><?php echo wp_kses_post($info_list); ?></div>
                            <?php endif; ?>
                            <?php if ($session_cta_text) : ?>
                                <a href="<?php echo esc_url($session_cta_url); ?>" class="session-cta"><?php echo esc_html($session_cta_text); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
