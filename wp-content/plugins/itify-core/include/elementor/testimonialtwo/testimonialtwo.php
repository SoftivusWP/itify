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
class TP_Testimonialtwo extends Widget_Base
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
        return 'tp-testimonialtwo';
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
        return __('Testimonial Two', 'tpcore');
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
                'default' => esc_html__('Why You Should Choose Us?', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Expert Team', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label' => esc_html__('Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis. Pellentesque varius lectus in massa placerat cursus. Donec in dictum nisl. In maximus posuere leo nec porttitor.', 'plugin-name'),
            ]
        );
        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Repeater List', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Expert Team', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis. Pellentesque varius lectus in massa placerat cursus. Donec in dictum nisl. In maximus posuere leo nec porttitor.', 'plugin-name'),
                    ],
                    [
                        'list_title' => esc_html__('Expert Team', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis. Pellentesque varius lectus in massa placerat cursus. Donec in dictum nisl. In maximus posuere leo nec porttitor.', 'plugin-name'),
                    ],
                    [
                        'list_title' => esc_html__('Expert Team', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis. Pellentesque varius lectus in massa placerat cursus. Donec in dictum nisl. In maximus posuere leo nec porttitor.', 'plugin-name'),
                    ],
                    [
                        'list_title' => esc_html__('Expert Team', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis. Pellentesque varius lectus in massa placerat cursus. Donec in dictum nisl. In maximus posuere leo nec porttitor.', 'plugin-name'),
                    ],
                    [
                        'list_title' => esc_html__('Expert Team', 'plugin-name'),
                        'list_content' => esc_html__('Quisque varius malesuada dui, ut posuere purus gravida in. Phasellus ultricies ullamcorper mollis. Pellentesque varius lectus in massa placerat cursus. Donec in dictum nisl. In maximus posuere leo nec porttitor.', 'plugin-name'),
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
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
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
        $this->add_control(
            'titlfe_color',
            [
                'label'     => esc_html__('Background Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .transform .team-single h4::after' => 'background-color: {{VALUE}} !important;',
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
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
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
            $(".team-slider")
                .not(".slick-initialized")
                .slick({
                    infinite: true,
                    autoplay: true,
                    focusOnSelect: false,
                    slidesToShow: 1,
                    speed: 1000,
                    autoplaySpeed: 4000,
                    slidesToScroll: 1,
                    arrows: true,
                    prevArrow: $(".prev-team"),
                    nextArrow: $(".next-team"),
                    dots: false,
                    centerMode: false,
                });

            var totalSlides = $(".team-slider").slick("getSlick").slideCount;

            $(".total-slide-t").text(totalSlides);

            $(".team-slider").on("afterChange", function(event, slick, currentSlide) {
                $(".current-slide-t").text(currentSlide + 1);
            });
        })
        </script>






        <section class="transform pb-120 ">
            <div class="container">
                <div class="row vertical-column-gap pt-120">
                    <div class="col-12 col-lg-6">
                        <div class="team__content">
                            <?php if (!empty($settings['heading'])) :   ?>
                                <h4 class="heading mt-8 title-anim text-secondary fw-7"><?php echo esc_html($settings['heading']) ?></h4>
                            <?php endif ?>
                            <div class="team-slider mt-60">


                                <?php foreach ($settings['list_repeater'] as $item) : ?>


                                    <div class="team-single">
                                        <?php if (!empty($item['list_title'])) :   ?>
                                            <h4 class="title mt-8 text-secondary mb-24"><?php echo esc_html($item['list_title']) ?></h4>
                                        <?php endif ?>
                                        <?php if (!empty($item['list_content'])) :   ?>
                                            <p class="description cur-lg"><?php echo esc_html($item['list_content']) ?></p>
                                        <?php endif ?>
                                    </div>


                                <?php endforeach; ?>







                            </div>
                            <div class="tp-team-arrow mt-60">
                                <button class="prev-team" aria-label="previous team">
                                    <span class="material-symbols-outlined">
                                        <?php echo esc_html('west') ?>
                                    </span>
                                </button>
                                <span class="current-slide-t">1</span>
                                <span class="divider"></span>
                                <span class="total-slide-t"></span>
                                <button class="next-team" aria-label="next team">
                                    <span class="material-symbols-outlined">
                                        <?php echo esc_html('east') ?>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xxl-5 offset-xxl-1">
                        <div class="team__thumb text-start text-lg-end">
                            <?php if (!empty($settings['image']['url'])) :   ?>
                                <img src="<?php echo esc_url($settings['image']['url']) ?>" class="mh-300"alt="<?php echo esc_attr('image')?>">
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>






<?php
    }
}

$widgets_manager->register(new TP_Testimonialtwo());
