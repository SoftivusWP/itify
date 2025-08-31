<?php

namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Banner extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'tp-banner';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Banner', 'tpcore');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'tp-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['tpcore'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['tpcore'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        // ======================Content================================//

        $this->start_controls_section(
            'general_content',
            [
                'label' => esc_html__('Content', 'plugin-name')
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Background Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'more_options',
            [
                'label' => esc_html__('Heading', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title1',
            [
                'label' => esc_html__('Title One', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Make Your Awesome', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => esc_html__('Title Two', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Digital', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title3',
            [
                'label' => esc_html__('Title Three', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Product', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'titleimage',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'more_optifons',
            [
                'label' => esc_html__('Button', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'buttontext1',
            [
                'label' => esc_html__('Button Text1', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'buttontext2',
            [
                'label' => esc_html__('Button Text2', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Services', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'buttonlink',
            [
                'label' => esc_html__('Button Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'more_opfdftions',
            [
                'label' => esc_html__('Video Popup', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'popupimage',
            [
                'label' => esc_html__('Popup Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'popuplink',
            [
                'label' => esc_html__('Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'paralaximage',
            [
                'label' => esc_html__('Paralax Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'more_fdsfoptions',
            [
                'label' => esc_html__('User', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'user1',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'user2',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'user3',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'usertitleone',
            [
                'label' => esc_html__('Title One', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('240 Business Peoples', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'usertitletwo',
            [
                'label' => esc_html__('Title Two', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2Already registered', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'more_optdafions',
            [
                'label' => esc_html__('Social', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'facebook_link',
            [
                'label' => esc_html__('Facebook Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'twitter_link',
            [
                'label' => esc_html__('Twitter Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'linkedin_link',
            [
                'label' => esc_html__('Linkedin Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'Instagram_link',
            [
                'label' => esc_html__('Instagram Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'more_ophhtions',
            [
                'label' => esc_html__('Scroll Options', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'scrolllink',
            [
                'label' => esc_html__('Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();




        // =======================Style=================================//

        $this->start_controls_section(
            'style_title',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography One', 'plugin-name'),
                'name'     => 'titleonetyp',
                'selector' => '{{WRAPPER}} .titleone',

            ]
        );

        $this->add_control(
            'titleonecolor',
            [
                'label'     => esc_html__('Color One', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .titleone' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography Two', 'plugin-name'),
                'name'     => 'titletwotyp',
                'selector' => '{{WRAPPER}} .titletwo',

            ]
        );

        $this->add_control(
            'titletwocolor',
            [
                'label'     => esc_html__('Color Two', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .titletwo' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography Three', 'plugin-name'),
                'name'     => 'titlethreetyp',
                'selector' => '{{WRAPPER}} .titlethree',

            ]
        );

        $this->add_control(
            'titlethreecolor',
            [
                'label'     => esc_html__('Color Three', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-banner .tp-banner__content .titlethree' => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'stylebutton',
            [
                'label' => esc_html__('Button', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .alter-btn' => 'color: {{VALUE}};border-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'button_hovujer_color',
            [
                'label' => esc_html__('Hover Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .alter-btn:hover' => 'color: {{VALUE}};border-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'hoverbutton_color',
            [
                'label' => esc_html__('Hover BG', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .alter-btn span' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'button_border_width',
            [
                'label' => esc_html__('Button Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn-anim' => 'width: {{SIZE}}{{UNIT}}!important;min-width: {{SIZE}}{{UNIT}}!important;height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_social',
            [
                'label' => esc_html__('Social', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'social_color',
            [
                'label' => esc_html__('Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.social li a' => 'color: {{VALUE}} !important',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'style_user',
            [
                'label' => esc_html__('User', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'more_optiffons',
            [
                'label' => esc_html__('Title One', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spinneffr_typ',
                'selector' => '{{WRAPPER}} .usertitleone',

            ]
        );

        $this->add_control(
            'spinnefdfr_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .usertitleone' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'more_optfifdffons',
            [
                'label' => esc_html__('Title Two', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spinfdfner_typ',
                'selector' => '{{WRAPPER}} .usertitletwo',

            ]
        );

        $this->add_control(
            'spinfdfner_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .usertitletwo' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <script>
            jQuery(document).ready(function($) {
                $("[data-background]").each(function() {
                    var backgroundImages = $(this).attr("data-background").split(",");
                    var cssValue = backgroundImages
                        .map(function(image) {
                            return 'url("' + image.trim() + '")';
                        })
                        .join(",");

                    $(this).css("background-image", cssValue);
                });
            })
        </script>



        <section class="tp-banner fix-top pb-120" data-background="<?php echo esc_url($settings['image']['url']) ?>">
            <div class="container">
                <div class="row vertical-column-gap align-items-center">
                    <div class="col-12 col-md-9 col-lg-9">
                        <div class="tp-banner__content">
                            <h1 class="mt-8 text-white fw-7 title-anim titleone">
                                <?php if (!empty($settings['title1'])) : ?>
                                    <?php echo esc_html($settings['title1']); ?>
                                <?php endif; ?>

                                <?php if (!empty($settings['titleimage']['url'])) : ?>
                                    <img src="<?php echo esc_url($settings['titleimage']['url']); ?>" alt="<?php echo esc_attr('image') ?>">
                                <?php endif; ?>

                                <?php if (!empty($settings['title2'])) : ?>
                                    <span class="titletwo d-inline-block"><?php echo esc_html($settings['title2']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($settings['title3'])) : ?>
                                    <span class="titlethree text-quaternary"><?php echo esc_html($settings['title3']); ?></span>
                                <?php endif; ?>
                            </h1>

                        </div>

                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="text-start text-lg-end">
                            <?php if (!empty($settings['buttonlink']['url'])) : ?>
                                <a href="<?php echo esc_url($settings['buttonlink']['url']); ?>" class="alter-btn btn-anim">
                                    <?php if (!empty($settings['buttontext1'])) : ?>
                                        <?php echo esc_html($settings['buttontext1']); ?>
                                    <?php endif; ?>

                                    <i class="fa-solid fa-arrow-trend-up"></i>

                                    <?php if (!empty($settings['buttontext2'])) : ?>
                                        <?php echo esc_html($settings['buttontext2']); ?>
                                    <?php endif; ?>

                                    <span></span>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="row vertical-column-gap mt-60">
                    <div class="col-12 col-lg-4 col-xxl-3 order-last order-lg-first">
                        <div class="tp-banner__users h-100">
                            <div class="tp-banner__avatar mb-24">
                                <?php if (!empty($settings['user1']['url'])) : ?>
                                    <img src="<?php echo esc_url($settings['user1']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                <?php endif; ?>
                                <?php if (!empty($settings['user2']['url'])) : ?>
                                    <img src="<?php echo esc_url($settings['user2']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                <?php endif; ?>
                                <?php if (!empty($settings['user3']['url'])) : ?>
                                    <img src="<?php echo esc_url($settings['user3']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['usertitleone'])) : ?>
                                <h5 class="usertitleone fw-5 text-white mt-8 mb-8"><?php echo esc_html($settings['usertitleone']) ?></h5>
                            <?php endif; ?>
                            <?php if (!empty($settings['usertitletwo'])) : ?>
                                <p class="usertitletwo text-white"><?php echo esc_html($settings['usertitletwo']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-xxl-9">
                        <div class="tp-banner__thumb">
                            <?php if (!empty($settings['paralaximage']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['paralaximage']['url']) ?>" class="w-100 mh-400 parallax-image" alt="<?php echo esc_attr('image') ?>">
                            <?php endif; ?>
                            <?php if (!empty($settings['popuplink']['url']) && !empty($settings['popupimage']['url'])) : ?>
                                <a class="video-frame video-btn" href="<?php echo esc_url($settings['popuplink']['url']) ?>" target="_blank">
                                    <img src="<?php echo esc_url($settings['popupimage']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


            </div>
            <ul class="social">
                <?php if (!empty($settings['facebook_link']['url'])) : ?>
                    <li>
                        <a href="<?php echo esc_url($settings['facebook_link']['url']) ?>" target="_blank" aria-label="share us on facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($settings['twitter_link']['url'])) : ?>
                    <li>
                        <a href="<?php echo esc_url($settings['twitter_link']['url']) ?>" target="_blank" aria-label="share us on twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($settings['linkedin_link']['url'])) : ?>
                    <li>
                        <a href="<?php echo esc_url($settings['linkedin_link']['url']) ?>" target="_blank" aria-label="share us on linkedin">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($settings['Instagram_link']['url'])) : ?>
                    <li>
                        <a href="<?php echo esc_url($settings['Instagram_link']['url']) ?>" target="_blank" aria-label="share us on instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <a href="<?php echo esc_url($settings['scrolllink']['url']) ?>" class="scroll-to">
                <?php echo esc_html__('Scroll', 'itify') ?>
                <span class="arrow"></span>
            </a>
        </section>









<?php
    }
}

$widgets_manager->register(new TP_Banner());
