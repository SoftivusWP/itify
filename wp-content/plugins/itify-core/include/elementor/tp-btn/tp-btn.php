<?php

namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Btn extends Widget_Base
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
        return 'tp-btn';
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
        return __('Button', 'tpcore');
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



        //Content Section Start
        $this->start_controls_section(
            'bankiobutton_content_general_section',
            [
                'label' => esc_html__('General', 'gamestorm-core')
            ]
        );

        $this->add_control(
            'bankio_button_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gamestorm-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'gamestorm-core'),
                    'style_two' => esc_html__('Style Two', 'gamestorm-core'),
                    'style_three' => esc_html__('Style Three', 'gamestorm-core'),
                ],
                'default' => 'style_one',
            ]
        );


        $this->add_responsive_control(
            'bankiobutton_content_button_align',
            [
                'label'         => esc_html__('Button Align', 'gamestorm-core'),
                'type'             => \Elementor\Controls_Manager::CHOOSE,
                'options'         => [
                    'left'         => [
                        'title' => esc_html__('Left', 'gamestorm-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'gamestorm-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__('Right', 'gamestorm-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                    'justify'     => [
                        'title' => esc_html__('Justified', 'gamestorm-core'),
                        'icon'     => 'eicon-text-align-justify',
                    ],
                ],
                'default'         => 'left',
                'selectors'     => [
                    '{{WRAPPER}} .button-one' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .button-too' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .button-two' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'bankio_button_style_selection' => ['style_one', 'style_two', 'style_three']
                ]
            ]
        );


        $this->add_control(
            'bankiobutton_content_button_text',
            [
                'label' => esc_html__('Button Text', 'avalle-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'avalle-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'bankiobutton_content_button_url',
            [
                'label' => esc_html__('Button URL', 'avalle-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'avalle-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );




        $this->end_controls_section();

        // =========================Style One===================================//


        $this->start_controls_section(
            'button_one_style',
            [
                'label' => esc_html__('Style', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'bankio_button_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'button_one_typ',
                'selector' => '{{WRAPPER}} .button-one a',

            ]
        );

        $this->add_control(
            'button_one_colorr',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-one a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_color_hoverr',
            [
                'label'     => esc_html__('Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-one a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_baccolor',
            [
                'label'     => esc_html__('Background', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-one a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_h_bacolor',
            [
                'label'     => esc_html__('Hover Background', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-one a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_b_color',
            [
                'label' => esc_html__('Border Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-one a' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_one_h_b_color',
            [
                'label' => esc_html__('Hover Border Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-one a:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_one_border_radius',
            [
                'label'      => __('Border Radius', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .button-one a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_responsive_control(
            'button_one_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .button-one a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_one_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .button-one a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );





        $this->end_controls_section();




        // =========================Style too===================================//


        $this->start_controls_section(
            'button_too_style',
            [
                'label' => esc_html__('Style', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'bankio_button_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'button_too_typ',
                'selector' => '{{WRAPPER}} .button-too a',

            ]
        );

        $this->add_control(
            'button_too_colorr',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-too a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_too_color_hoverr',
            [
                'label'     => esc_html__('Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-too a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_too_baccolor',
            [
                'label'     => esc_html__('Background', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-too a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_too_h_bacolor',
            [
                'label'     => esc_html__('Hover Background', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-too a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_too_b_color',
            [
                'label' => esc_html__('Border Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-too a' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_too_h_b_color',
            [
                'label' => esc_html__('Hover Border Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-too a:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_too_border_radius',
            [
                'label'      => __('Border Radius', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .button-too a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_responsive_control(
            'button_too_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .button-too a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_too_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .button-too a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );





        $this->end_controls_section();


        // ==============================Style Three===============================//


        $this->start_controls_section(
            'button_three_style',
            [
                'label' => esc_html__('Style', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'bankio_button_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'spinner_typ',
                'selector' => '{{WRAPPER}} .button-two a',

            ]
        );

        $this->add_control(
            'spinner_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-two a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_show',
            [
                'label' => esc_html__('Show Icon', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'plugin-name'),
                'label_off' => esc_html__('Hide', 'plugin-name'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_responsive_control(
            'spinner_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .button-two a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'spinner_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .button-two a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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


        <?php if ($settings['bankio_button_style_selection'] == 'style_one') : ?>
            <div class="bottom-area  button-one">
                <?php if (!empty($settings['bankiobutton_content_button_text'])) :   ?>
                    <a href="<?php echo esc_url($settings['bankiobutton_content_button_url']['url']) ?>" class="cmn-btn"><?php echo esc_html($settings['bankiobutton_content_button_text']) ?></a>
                <?php endif ?>
            </div>
        <?php endif; ?>





        <?php if ($settings['bankio_button_style_selection'] == 'style_two') : ?>
            <div class="bottom-area  button-too">
                <?php if (!empty($settings['bankiobutton_content_button_text'])) :   ?>
                    <a href="<?php echo esc_url($settings['bankiobutton_content_button_url']['url']) ?>" class="cmn-btn second"><?php echo esc_html($settings['bankiobutton_content_button_text']) ?></a>
                <?php endif ?>
            </div>
        <?php endif; ?>






        <?php if ($settings['bankio_button_style_selection'] == 'style_three') : ?>
            <div class="button-two">
                <?php if (!empty($settings['bankiobutton_content_button_text'])) :   ?>
                    <a href="<?php echo esc_url($settings['bankiobutton_content_button_url']['url']) ?>" class="btn-arrow"><?php echo esc_html($settings['bankiobutton_content_button_text']) ?>
                        <?php if (!empty($settings['icon_show'] == 'yes')) :   ?>
                            <span class="material-symbols-outlined"> <?php echo esc_html('east') ?> </span>
                        <?php endif ?>

                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>







<?php
    }
}

$widgets_manager->register(new TP_Btn());
