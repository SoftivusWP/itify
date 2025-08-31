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
class TP_Process extends Widget_Base
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
        return 'tp-process';
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
        return __('Process', 'tpcore');
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
            'heading',
            [
                'label' => esc_html__('Heading', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Artificial Intelligence Process', 'plugin-name'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'headingtitle',
            [
                'label' => esc_html__('Heading Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Quisque Varius Malesuada Dui, Ut Posuere Purus Gravida In. Phasellus Ultricies Ullamcorper Mollis. Pellentesque Varius Lectus In Massa Placerat Cursus. Donec In Dictum Nisl. In Maximus Posuere Leo Nec Porttitor.', 'plugin-name'),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'contentprocess',
            [
                'label' => esc_html__('Process', 'plugin-name')
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_number',
            [
                'label' => esc_html__('Number', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('01', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Computer Vision', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label' => esc_html__('Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis.', 'plugin-name'),
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Process List', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_number' => esc_html__('01', 'plugin-name'),
                        'list_title' => esc_html__('Computer Vision', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis.', 'plugin-name'),
                    ],
                    [
                        'list_number' => esc_html__('02', 'plugin-name'),
                        'list_title' => esc_html__('Computer Vision', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis.', 'plugin-name'),
                    ],
                    [
                        'list_number' => esc_html__('03', 'plugin-name'),
                        'list_title' => esc_html__('3D Vision', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis.', 'plugin-name'),
                    ],
                    [
                        'list_number' => esc_html__('04', 'plugin-name'),
                        'list_title' => esc_html__('Computer Vision', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis.', 'plugin-name'),
                    ],
                    [
                        'list_number' => esc_html__('05', 'plugin-name'),
                        'list_title' => esc_html__('3D Vision', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis.', 'plugin-name'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );



        $this->end_controls_section();




        // =======================Style=================================//


        $this->start_controls_section(
            'styleheading',
            [
                'label' => esc_html__('Heading', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'heading_typ',
                'selector' => '{{WRAPPER}} .heading',

            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'heading_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'styleheadingtilte',
            [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'headingtitle_typ',
                'selector' => '{{WRAPPER}} .headingtitle',

            ]
        );

        $this->add_control(
            'headingtitle_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .headingtitle' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'headingtitle_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .headingtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'headingtitle_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .headingtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'stylenumber',
            [
                'label' => esc_html__('Number', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'stylenumber_typ',
                'selector' => '{{WRAPPER}} .number',

            ]
        );

        $this->add_control(
            'stylenumber_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .number' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'stylenumber_colofr',
            [
                'label'     => esc_html__('Background Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-process .op-text::before' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'stylenumber_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'stylenumber_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'styletitle',
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
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'styledes',
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
                    '{{WRAPPER}} .description' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'stbbyledes',
            [
                'label' => esc_html__('Bar', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'desfcription_color',
            [
                'label'     => esc_html__('Bar Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-process .process__thumb' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'descripftion_color',
            [
                'label'     => esc_html__('Bar Point Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-process .op-text::after' => 'background-color: {{VALUE}} !important;',
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




        <section class="pt-120 pb-120 tp-process  sticky-wrapper">
            <div class="container">
                <div class="row vertical-column-gap">
                    <div class="col-12 col-lg-6">
                        <div class="process__content sticky-item">
                            <?php if (!empty($settings['heading'])) :   ?>
                                <h2 class="heading mt-8 title-anim text-white fw-7 mb-24"><?php echo esc_html($settings['heading']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['headingtitle'])) :   ?>
                                <p class="headingtitle cur-lg text-quinary"><?php echo esc_html($settings['headingtitle']) ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xxl-5 offset-xxl-1">
                        <div class="process__thumb sticky-item">

                            <?php foreach ($settings['list_repeater'] as $item) : ?>
                                <div class="process__single">
                                    <?php if (!empty($item['list_number'])) :   ?>
                                        <span class="number op-text text-white mb-40 cur-lg"><?php echo esc_html($item['list_number']) ?></span>
                                    <?php endif ?>
                                    <?php if (!empty($item['list_title'])) :   ?>
                                        <h5 class="title mt-8 text-white mb-24 title-anim"><?php echo esc_html($item['list_title']) ?></h5>
                                    <?php endif ?>
                                    <?php if (!empty($item['list_content'])) :   ?>
                                        <p class="description cur-lg text-quinary"><?php echo esc_html($item['list_content']) ?></p>
                                    <?php endif ?>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>








<?php
    }
}

$widgets_manager->register(new TP_Process());
