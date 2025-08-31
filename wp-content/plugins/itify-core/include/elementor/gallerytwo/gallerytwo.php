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
class TP_Gallarytwo extends Widget_Base
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
        return 'tp-gallerytwo';
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
        return __('Gallery Two', 'tpcore');
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
                'label' => esc_html__('Gallery', 'plugin-name')
            ]
        );

        $this->add_control(
            'image1',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image2',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image3',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image4',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image5',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image6',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image7',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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


        <div class="mason pt-120 pb-120 fade-wrapper">
            <div class="container">
                <div class="row vertical-column-gap">
                    <div class="col-12 col-md-3">
                        <div class="mason-single fade-top">
                            <?php if (!empty($settings['image1']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['image1']['url']) ?>" class="mh-260"alt="<?php echo esc_attr('image')?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mason-single fade-bottom">
                            <?php if (!empty($settings['image2']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['image2']['url']) ?>" class="mh-260"alt="<?php echo esc_attr('image')?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="mason-single fade-left">
                            <?php if (!empty($settings['image3']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['image3']['url']) ?>" class="mh-260 botter"alt="<?php echo esc_attr('image')?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="mason-single fade-right">
                            <?php if (!empty($settings['image4']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['image4']['url']) ?>" class="mh-260 botter"alt="<?php echo esc_attr('image')?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="mason-single fade-top">
                            <?php if (!empty($settings['image5']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['image5']['url']) ?>" class="mh-260"alt="<?php echo esc_attr('image')?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="mason-single fade-bottom">
                            <?php if (!empty($settings['image6']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['image6']['url']) ?>" class="mh-260"alt="<?php echo esc_attr('image')?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="mason-single toper fade-right">
                            <?php if (!empty($settings['image7']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['image7']['url']) ?>" class="mh-260"alt="<?php echo esc_attr('image')?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}

$widgets_manager->register(new TP_Gallarytwo());
