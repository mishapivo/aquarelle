<?php
defined('ABSPATH') || die;

if (!function_exists('register_block_type') && !defined('GUTENBERG_DEVELOPMENT_MODE')) {
    echo '<div class="ju-notice-msg ju-notice-error">'. esc_html__('You need to activate Gutenberg to use our plugin!', 'advanced-gutenberg') .'</div>';
    return false;
}

$tabs_data = array(
    array(
        'id' => 'profiles',
        'title' => __('Profiles', 'advanced-gutenberg'),
        'icon' => 'account-circle',
    ),
    array(
        'id' => 'settings',
        'title' => __('Configuration', 'advanced-gutenberg'),
        'icon' => 'settings',
    ),
    array(
        'id' => 'custom-styles',
        'title' => __('Custom Styles', 'advanced-gutenberg'),
        'icon' => 'code',
    ),
    array(
        'id' => 'translation',
        'title' => __('Translation', 'advanced-gutenberg'),
        'icon' => 'text-format',
    ),
);
?>

<div class="ju-main-wrapper" style="display: none">
    <div class="ju-left-panel">
        <div class="ju-logo">
            <a href="https://www.joomunited.com/" target="_blank">
                <img src="<?php echo esc_url(plugins_url('assets/images/logo-joomUnited-white.png', dirname(dirname(__FILE__)))) ?>"
                     alt="<?php esc_html_e('JoomUnited logo', 'advanced-gutenberg') ?>">
            </a>
        </div>
        <div class="ju-menu-search">
            <i class="mi mi-search ju-menu-search-icon"></i>
            <input type="text" class="ju-menu-search-input"
                   placeholder="<?php esc_html_e('Search settings', 'advanced-gutenberg') ?>"
            >
        </div>
        <ul class="tabs ju-menu-tabs">
            <?php foreach ($tabs_data as $thisTab) : ?>
                <li class="tab" data-tab-title="<?php echo esc_attr($thisTab['title']) ?>">
                    <a href="#<?php echo esc_attr($thisTab['id']) ?>"
                       class="link-tab white-text waves-effect waves-light"
                    >
                        <i class="mi mi-<?php echo esc_attr($thisTab['icon']) ?> menu-tab-icon"></i>
                        <span class="tab-title"><?php echo esc_html($thisTab['title']) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="ju-right-panel">
        <?php
        if (defined('GUTENBERG_VERSION') && version_compare(GUTENBERG_VERSION, GUTENBERG_VERSION_REQUIRED, 'lt')) {
            $gutenbergUpdateUrl = wp_nonce_url(
                add_query_arg(
                    array(
                        'action' => 'upgrade-plugin',
                        'plugin' => 'gutenberg'
                    ),
                    admin_url('update.php')
                ),
                'upgrade-plugin_gutenberg'
            );

            echo '<div class="ju-notice-msg ju-notice-error">'
                 . esc_html__('Our plugin works great with Gutenberg version', 'advanced-gutenberg')
                 . ' <b>' . esc_html(GUTENBERG_VERSION_REQUIRED). '</b> '
                 . esc_html__('and above', 'advanced-gutenberg') . '. '
                 . esc_html__('Your current version is', 'advanced-gutenberg')
                 . ' <b>' . esc_html(GUTENBERG_VERSION) . '</b>. '
                 . '<a href="' . esc_attr($gutenbergUpdateUrl) . '">' . esc_html__('Update now', 'advanced-gutenberg') . '</a>'
                 . '<i class="dashicons dashicons-dismiss ju-notice-close"></i>'
             . '</div>';
        } ?>

        <?php foreach ($tabs_data as $thisTab) : ?>
            <?php if ($thisTab['id'] === 'translation') continue; // phpcs:ignore Generic.ControlStructures.InlineControlStructure.NotAllowed -- inline is ok ?>
            <div class="ju-content-wrapper" id="<?php echo esc_attr($thisTab['id']) ?>" style="display: none">
                <?php $this->loadView($thisTab['id']) ?>
            </div>
        <?php endforeach; ?>

        <div class="ju-content-wrapper" id="translation" style="display: none">
            <div class="advgb-header" style="padding-top: 40px">
                <h1 class="header-title"><?php esc_html_e('Translation', 'advanced-gutenberg') ?></h1>
            </div>
            <?php echo \Joomunited\advgb\Jutranslation\Jutranslation::getInput(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped ?>
        </div>
    </div>
</div>