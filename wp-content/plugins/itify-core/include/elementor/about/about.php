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
class TP_About extends Widget_Base
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
        return 'tp-about';
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
        return __('About', 'tpcore');
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
            'content',
            [
                'label' => esc_html__('Content', 'plugin-name')
            ]
        );



        $this->add_control(
            'imageone',
            [
                'label' => esc_html__( 'Choose Image', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'titleone',
            [
                'label' => esc_html__( 'Title', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Who We Are', 'plugin-name' ),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'descriptionone',
            [
                'label' => esc_html__( 'Description', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Lorem Ipsum Dolor Sit Amet Consectetur. Rhoncus Turpis In Placerat Faucibus Dignissim. Ac Nisl Varius Rutrum Tempus Turpis Duis Ut Ut Tristique. Morbi Netus Pulvinar Vitae Malesuada. Dapibus Commodo Aliquam Quis Sit, Morbi Netus Pulvinar Vitae Malesuada. Dapibus Commodo Aliquam Quis Sit.', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'buttononetext',
            [
                'label' => esc_html__( 'Button One Text', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Learn More', 'plugin-name' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'buttononelink',
            [
                'label' => esc_html__( 'Button One Link', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
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
            'imagetwo',
            [
                'label' => esc_html__( 'Choose Image', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'titletwo',
            [
                'label' => esc_html__( 'Title Two', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'How We Work', 'plugin-name' ),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'descriptiontwo',
            [
                'label' => esc_html__( 'Description Two', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Lorem Ipsum Dolor Sit Amet Consectetur. Rhoncus Turpis In Placerat Faucibus Dignissim. Ac Nisl Varius Rutrum Tempus Turpis Duis Ut Ut Tristique. Morbi Netus Pulvinar Vitae Malesuada. Dapibus Commodo Aliquam Quis Sit, Morbi Netus Pulvinar Vitae Malesuada. Dapibus Commodo Aliquam Quis Sit.', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'buttontwotext',
            [
                'label' => esc_html__( 'Button Two Text', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Explore Services', 'plugin-name' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'buttontwolink',
            [
                'label' => esc_html__( 'Button Two Link', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
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
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'title_typ',
                'selector' => '{{WRAPPER}} .title',
        
            ]
        );
        
        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'style_description',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'description_typ',
                'selector' => '{{WRAPPER}} .description',
        
            ]
        );
        
        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'description_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'style_btn',
             [
                'label' => esc_html__('Button', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__( 'Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-line::before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .btn-line' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'button_colorh',
            [
                'label' => esc_html__( 'HoverColor', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-line::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .btn-line:hover' => 'color: {{VALUE}}',
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





<section class="tp-service pt-120 pb-120">
    <div class="container">
        <div class="row vertical-column-gap-md align-items-center">
            <div class="col-12 col-lg-5">
                <div class="tp-service__thumb fade-top fade-img">
                    <div class="w-100">
                        <?php if (!empty($settings['imageone']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['imageone']['url']) ?>" class="w-100 mh-300 parallax-image" alt="<?php echo esc_attr('image')?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-6 offset-xl-1">
                <div class="tp-service__content">
                    <h2 class="title mt-8 title-anim text-secondary fw-7 mb-24 text-capitalize">
                        <?php if (!empty($settings['titleone'])) {
                            echo esc_html($settings['titleone']);
                        } ?>
                    </h2>
                    <p class="description cur-lg">
                        <?php if (!empty($settings['descriptionone'])) {
                            echo esc_html($settings['descriptionone']);
                        } ?>
                    </p>
                    <div class="mt-40">
                        <?php if (!empty($settings['buttononelink']['url'])) : ?>
                            <a href="<?php echo esc_url($settings['buttononelink']['url']) ?>" class="btn-line">
                                <?php echo esc_html($settings['buttononetext']) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row vertical-column-gap-md align-items-center pt-120">
            <div class="col-12 col-lg-6">
                <div class="tp-service__content">
                    <h2 class="title mt-8 title-anim text-secondary fw-7 mb-24 text-capitalize">
                        <?php if (!empty($settings['titletwo'])) {
                            echo esc_html($settings['titletwo']);
                        } ?>
                    </h2>
                    <p class="description cur-lg">
                        <?php if (!empty($settings['descriptiontwo'])) {
                            echo esc_html($settings['descriptiontwo']);
                        } ?>
                    </p>
                    <div class="mt-40">
                        <?php if (!empty($settings['buttontwolink']['url'])) : ?>
                            <a href="<?php echo esc_url($settings['buttontwolink']['url']) ?>" class="btn-line">
                                <?php echo esc_html($settings['buttontwotext']) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="tp-service__thumb fade-top fade-img">
                    <div class="w-100">
                        <?php if (!empty($settings['imagetwo']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['imagetwo']['url']) ?>" class="w-100 mh-300 parallax-image"alt="<?php echo esc_attr('image')?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>








<?php
    }
}

$widgets_manager->register(new TP_About());
