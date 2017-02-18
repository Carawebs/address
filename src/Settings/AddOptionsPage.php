<?php
namespace Carawebs\Address\Settings;

/**
* Control the creation of an Options page (under the Settings menu).
*/
class AddOptionsPage extends Page
{

    /**
    * Create a new menu item
    */
    public function addOptionsPage() {
        add_action( 'admin_menu', [$this, 'defineOptionsPage']);
    }

    /**
    * Add a sub menu page to the Settings menu.
    * @return void
    */
    public function defineOptionsPage() {

        add_options_page(
            __( $this->pageArguments['page_title'], 'textdomain' ), // Page Title
            __( $this->pageArguments['menu_title'], 'textdomain' ), // Menu Title
            $this->pageArguments['capability'],                     // Capability
            $this->pageArguments['unique_page_slug'],                      // ! Menu slug !
            [$this, 'outputOptionsPage']                            // Callback to render form
        );

    }

    public function outputOptionsPage()
    {
        ?>
        <div class="wrap">
            <h2><?= $this->pageArguments['page_title']; ?></h2>
            <form method="post" action="options.php">
                <?php
                var_dump($this->optionGroup);
                settings_fields( $this->optionGroup ); // Must be the option group defined with `register_setting()`
                do_settings_sections( $this->pageArguments['unique_page_slug'] );
                submit_button();
                ?>
            </form>
        </div> <?php
    }

}
