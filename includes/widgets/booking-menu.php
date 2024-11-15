<?php
namespace Elementor_Test_Addon; // Add the namespace at the top

class Elementor_Hello_World_Widget_1 extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hello_world_widget_1';
    }

    public function get_title() {
        return esc_html__( 'Svanen Booking Module', 'elementor-addon' );
    }

    public function get_icon() {
        return 'eicon-calendar';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    public function get_keywords() {
        return [ 'booking', 'module' ];
    }

    protected function _register_controls() {
        // Register your widget controls here
    }

    protected function render() {
        ?>
        <div>

		<form id="bookingForm" onsubmit="generateBookingURL(event)">
      <div class="form-box">
        <label for="arrivalDate">Ankomst:</label>
        <input class="input-style" type="date" id="arrivalDate" name="arrivalDate" required>
      </div>
            <div class="form-box">
        <label for="departureDate">Afrejse:</label>
        <input class="input-style" type="date" id="departureDate" name="departureDate" required>
      </div>
      <div class="form-box">
        <label for="adults">Voksne:</label>
        <input class="input-style" type="number" id="adults" name="adults" value="2" required>
      </div>
       <div class="form-box children-box">
        <label for="children1">Børn (3-12 år):</label>
        <input class="input-style" type="number" id="children1" name="children1" value="0">
      </div>
       <div class="form-box">
        <label for="children2">Børn (0-2 år):</label>
        <input class="input-style" type="number" id="children2" name="children2" value="0">
      </div>
        <button type="submit">Søg/Book</button>
    </form>
        </div>
        <?php
    }


    // Register styles for the widget
    public function get_style_depends() {
        return [ 'elementor-addon-styles' ]; // This will link the CSS file
    }

    // Enqueue the styles
    // public function enqueue_style() {
    //     wp_enqueue_style( 'elementor-addon-styles', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    // }

}

