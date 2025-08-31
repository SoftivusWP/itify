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
class TP_Heading extends Widget_Base
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
        return 'tp-heading';
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
        return __('Heading', 'tpcore');
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


        //General Section
        $this->start_controls_section(
            'bankio_heading_one_section_genaral',
            [
                'label' => esc_html__('General', 'bankio-core')
            ]
        );

        $this->add_control(
            'bankio_heading_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'bankio-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'bankio-core'),
                    'style_two' => esc_html__('Style Two', 'bankio-core'),
                    'style_three' => esc_html__('Style Three', 'bankio-core'),
                    'style_four' => esc_html__('Style Four', 'bankio-core'),
                ],
                'default' => 'style_one',
            ]
        );


        $this->add_control(
            'bankio_heading_one_content_one_subtitle',
            [
                'label' => esc_html__('Subtitle', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default subtitle', 'bankio-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'bankio-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'bankio_heading_one_content_one_title',
            [
                'label' => esc_html__('Title', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'bankio-core'),
                'placeholder' => esc_html__('Type your title here', 'bankio-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'bankio_heading_one_content_one_description',
            [
                'label' => esc_html__('Description', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Products and services designed to help you reach your financial goals.', 'bankio-core'),
                'placeholder' => esc_html__('Type your description here', 'bankio-core'),
            ]
        );





        $this->add_responsive_control(
            'bankio_heading_content_text_align',
            [
                'label'         => esc_html__('Text Align', 'bankio-core'),
                'type'             => \Elementor\Controls_Manager::CHOOSE,
                'options'         => [
                    'start'         => [
                        'title' => esc_html__('Left', 'bankio-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'bankio-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'end'     => [
                        'title' => esc_html__('Right', 'bankio-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                ],
                'default'         => 'left',
                'condition' => [
                    'bankio_heading_content_style_selection' => ['style_one','style_three']
                ],
                'selectors'     => [
                    '{{WRAPPER}} .heading-one-section ' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .top-area.section-text.justify-content-center.heading-one-section ' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // =======================Style=================================//

        $this->start_controls_section(
             'subtitle_style',
             [
                'label' => esc_html__('Subtitle', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'subtitle_style_typ',
                'selector' => '{{WRAPPER}} .sub-title',
        
            ]
        );
        
        $this->add_control(
            'subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subtitle_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'subtitle_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        $this->end_controls_section();


        $this->start_controls_section(
             'title_style',
             [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .title',
        
            ]
        );
        
        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_style_margin',
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
            'title_style_padding',
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
             'description_style',
             [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'description_style_typ',
                'selector' => '{{WRAPPER}} .pp',
        
            ]
        );
        
        $this->add_control(
            'description_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'description_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
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




        <?php if ($settings['bankio_heading_content_style_selection'] == 'style_one') : ?>
            <div class="top-area section-text justify-content-center heading-one-section">
                <?php if (!empty($settings['bankio_heading_one_content_one_subtitle'])) :   ?>
                    <h4 class="sub-title"><?php echo wp_kses($settings['bankio_heading_one_content_one_subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                <?php endif ?>
                <?php if (!empty($settings['bankio_heading_one_content_one_title'])) :   ?>
                    <h1 class="title"><?php echo wp_kses($settings['bankio_heading_one_content_one_title'], wp_kses_allowed_html('post'))  ?></h1>
                <?php endif ?>
                <?php if (!empty($settings['bankio_heading_one_content_one_description'])) :   ?>
                    <p class="xlr pp"><?php echo wp_kses($settings['bankio_heading_one_content_one_description'], wp_kses_allowed_html('post'))  ?></p>
                <?php endif ?>
            </div>
        <?php endif ?>


        <?php if ($settings['bankio_heading_content_style_selection'] == 'style_two') : ?>
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-header text-center">
                            <?php if (!empty($settings['bankio_heading_one_content_one_subtitle'])) :   ?>
                                <h5 class="sub-title"><?php echo wp_kses($settings['bankio_heading_one_content_one_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                            <?php endif ?>
                            <?php if (!empty($settings['bankio_heading_one_content_one_title'])) :   ?>
                                <h2 class="title"><?php echo wp_kses($settings['bankio_heading_one_content_one_title'], wp_kses_allowed_html('post'))  ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['bankio_heading_one_content_one_description'])) :   ?>
                                <p class="style-two-des pp"><?php echo wp_kses($settings['bankio_heading_one_content_one_description'], wp_kses_allowed_html('post'))  ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['bankio_heading_content_style_selection'] == 'style_three') : ?>
            <div class="top-area section-text justify-content-center heading-one-section">
                <?php if (!empty($settings['bankio_heading_one_content_one_subtitle'])) :   ?>
                    <h5 class="sub-title"><?php echo wp_kses($settings['bankio_heading_one_content_one_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                <?php endif ?>
                <?php if (!empty($settings['bankio_heading_one_content_one_title'])) :   ?>
                    <h2 class="title"><?php echo wp_kses($settings['bankio_heading_one_content_one_title'], wp_kses_allowed_html('post'))  ?></h2>
                <?php endif ?>
                <?php if (!empty($settings['bankio_heading_one_content_one_description'])) :   ?>
                    <p><?php echo wp_kses($settings['bankio_heading_one_content_one_description'], wp_kses_allowed_html('post'))  ?></p>
                <?php endif ?>
            </div>
        <?php endif ?>



        <?php if ($settings['bankio_heading_content_style_selection'] == 'style_four') : ?>
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="section-header text-center">
                            <?php if (!empty($settings['bankio_heading_one_content_one_subtitle'])) :   ?>
                                <h5 class="sub-title"><?php echo wp_kses($settings['bankio_heading_one_content_one_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                            <?php endif ?>
                            <?php if (!empty($settings['bankio_heading_one_content_one_title'])) :   ?>
                                <h2 class="title"><?php echo wp_kses($settings['bankio_heading_one_content_one_title'], wp_kses_allowed_html('post'))  ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['bankio_heading_one_content_one_description'])) :   ?>
                                <p class="style-two-des pp"><?php echo wp_kses($settings['bankio_heading_one_content_one_description'], wp_kses_allowed_html('post'))  ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>






<?php
    }
}

$widgets_manager->register(new TP_Heading());
