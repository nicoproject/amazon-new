<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <?php
  elegant_description();
  elegant_keywords();
  elegant_canonical();

  /**
   * Fires in the head, before {@see wp_head()} is called. This action can be used to
   * insert elements into the beginning of the head before any styles or scripts.
   *
   * @since 1.0
   */
  do_action('et_head_meta');

  $template_directory_uri = get_template_directory_uri();
  ?>

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <script type="text/javascript">
    document.documentElement.className = 'js';
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  $product_tour_enabled = et_builder_is_product_tour_enabled();
  $page_container_style = $product_tour_enabled ? ' style="padding-top: 0px;"' : ''; ?>
  <div id="page-container" <?php echo et_core_intentionally_unescaped($page_container_style, 'fixed_string'); ?>>
    <?php
    if ($product_tour_enabled || is_page_template('page-template-blank.php')) {
      return;
    }

    $et_secondary_nav_items = et_divi_get_top_nav_items();

    $et_phone_number = $et_secondary_nav_items->phone_number;

    $et_email = $et_secondary_nav_items->email;

    $et_contact_info_defined = $et_secondary_nav_items->contact_info_defined;

    $show_header_social_icons = $et_secondary_nav_items->show_header_social_icons;

    $et_secondary_nav = $et_secondary_nav_items->secondary_nav;

    $et_top_info_defined = $et_secondary_nav_items->top_info_defined;

    $et_slide_header = 'slide' === et_get_option('header_style', 'left') || 'fullscreen' === et_get_option('header_style', 'left') ? true : false;
    ?>

    <?php if ($et_top_info_defined && !$et_slide_header || is_customize_preview()) : ?>
      <?php ob_start(); ?>

      <!-- Callme Popup Form Icon block -->
      <div class="callme__button">
        <a href="#mockCallme"> </a>
      </div>


      <div class="callme__wrapper">
        <div class="callme__form">
          <div class="callme__form__close_button"><span class="dashicons dashicons-no-alt"></span></div>

          <?php echo do_shortcode('
        [et_pb_section fb_built="1" _builder_version="4.7.4" _module_preset="default"][et_pb_row _builder_version="4.7.4" _module_preset="default"][et_pb_column type="4_4" _builder_version="4.7.4" _module_preset="default"][et_pb_contact_form captcha="off" email="nicoproject@ya.ru, annamsk@mail.ru, amazondv@mail.ru" title="Заказать обратный звонок" custom_message="Поступил заказ на обратный звонок||et_pb_line_break_holder||==========||et_pb_line_break_holder||Имя: %%name%%||et_pb_line_break_holder||Телефон: %%phone%%||et_pb_line_break_holder||||et_pb_line_break_holder||Отправлено со страницы: %%page_name%%||et_pb_line_break_holder||URL: %%page_url%%||et_pb_line_break_holder||===========" success_message="Благодарим за обращение, мы свяжемся с Вами в ближайшее время." _builder_version="4.7.5" _module_preset="default" hover_enabled="0" sticky_enabled="0" title_level="h5" module_class="callorder_form"][et_pb_contact_field field_id="name" field_title="Ваше имя" fullwidth_field="on" _builder_version="4.7.5" _module_preset="default" hover_enabled="0" sticky_enabled="0"][/et_pb_contact_field][et_pb_contact_field field_id="phone" field_title="Ваш телефон" fullwidth_field="on" _builder_version="4.7.5" _module_preset="default" hover_enabled="0" allowed_symbols="numbers" sticky_enabled="0"][/et_pb_contact_field][et_pb_contact_field field_id="page_name" field_title="Page Name" fullwidth_field="on" _builder_version="4.7.4" _module_preset="default" custom_css_main_element="display:none;"][/et_pb_contact_field][et_pb_contact_field field_id="page_url" field_title="Page URL" fullwidth_field="on" _builder_version="4.7.4" _module_preset="default" custom_css_main_element="display: none;"][/et_pb_contact_field][/et_pb_contact_form][/et_pb_column][/et_pb_row][/et_pb_section]
        ')
          ?>
          <div class="callme__form_license">
            <p>Заполняя форму, Вы соглашаетесь с <a href="https://amazon-dv.ru/politika-zashhity-i-obrabotki-personalnyh-dannyh-ooo-amazon/" target="_blank" rel="noopener noreferrer">политикой конфиденциальности</a> и даете согласие на <a href="https://amazon-dv.ru/polzovatelskoe-soglashenie/" target="_blank" rel="noopener noreferrer">обработку персональных данных</a>
            </p>
          </div>

        </div>
      </div>

      <div id="top-header" <?php echo $et_top_info_defined ? '' : 'style="display: none;"'; ?>>
        <div class="container clearfix">

          <?php if ($et_contact_info_defined) : ?>

            <div id="et-info">
              <?php if ('' !== ($et_phone_number = et_get_option('phone_number'))) : ?>
                <span id="et-info-phone"><?php echo et_core_esc_previously(et_sanitize_html_input_text($et_phone_number)); ?></span>
              <?php endif; ?>

              <?php if ('' !== ($et_email = et_get_option('header_email'))) : ?>
                <a href="<?php echo esc_attr('mailto:' . $et_email); ?>"><span id="et-info-email"><?php echo esc_html($et_email); ?></span></a>
              <?php endif; ?>

              <?php
              if (true === $show_header_social_icons) {
                get_template_part('includes/social_icons', 'header');
              } ?>
            </div> <!-- #et-info -->

          <?php endif; // true === $et_contact_info_defined 
          ?>

          <div class="social-links">
            <a href="https://www.facebook.com/amazondv" target="_blank" class="social-block__social_link social_link_fb"></a>
            <a href="https://www.instagram.com/amazon_dv" target="_blank" class="social-block__social_link social_link_ig"></a>
            <a href="https://vk.com/amazondv" target="_blank" class="social-block__social_link social_link_vk"></a>
          </div>

          <div class="top-header__search">

            <?php get_search_form(); ?>
          </div>


          <div id="et-secondary-menu">
            <?php
            if (!$et_contact_info_defined && true === $show_header_social_icons) {
              get_template_part('includes/social_icons', 'header');
            } else if ($et_contact_info_defined && true === $show_header_social_icons) {
              ob_start();

              get_template_part('includes/social_icons', 'header');

              $duplicate_social_icons = ob_get_contents();

              ob_end_clean();

              printf(
                '<div class="et_duplicate_social_icons">
								%1$s
							</div>',
                et_core_esc_previously($duplicate_social_icons)
              );
            }

            if ('' !== $et_secondary_nav) {
              echo et_core_esc_wp($et_secondary_nav);
            }

            et_show_cart_total();
            ?>
          </div> <!-- #et-secondary-menu -->

        </div> <!-- .container -->
      </div> <!-- #top-header -->
      <?php
      $top_header = ob_get_clean();

      /**
       * Filters the HTML output for the top header.
       *
       * @since 3.10
       *
       * @param string $top_header
       */
      echo et_core_intentionally_unescaped(apply_filters('et_html_top_header', $top_header), 'html');
      ?>
    <?php endif; // true ==== $et_top_info_defined 
    ?>

    <?php if ($et_slide_header || is_customize_preview()) : ?>
      <?php ob_start(); ?>
      <div class="et_slide_in_menu_container">
        <?php if ('fullscreen' === et_get_option('header_style', 'left') || is_customize_preview()) { ?>
          <span class="mobile_menu_bar et_toggle_fullscreen_menu"></span>
        <?php } ?>

        <?php
        if ($et_contact_info_defined || true === $show_header_social_icons || false !== et_get_option('show_search_icon', true) || class_exists('woocommerce') || is_customize_preview()) { ?>
          <div class="et_slide_menu_top">

            <?php if ('fullscreen' === et_get_option('header_style', 'left')) { ?>
              <div class="et_pb_top_menu_inner">
              <?php } ?>
            <?php }

          if (true === $show_header_social_icons) {
            get_template_part('includes/social_icons', 'header');
          }

          et_show_cart_total();
            ?>
            <?php if (false !== et_get_option('show_search_icon', true) || is_customize_preview()) : ?>
              <?php if ('fullscreen' !== et_get_option('header_style', 'left')) { ?>
                <div class="clear"></div>
              <?php } ?>
              <form role="search" method="get" class="et-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <?php
                printf(
                  '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
                  esc_attr__('Search &hellip;', 'Divi'),
                  get_search_query(),
                  esc_attr__('Search for:', 'Divi')
                );

                /**
                 * Fires inside the search form element, just before its closing tag.
                 *
                 * @since ??
                 */
                do_action('et_search_form_fields');
                ?>
                <button type="submit" id="searchsubmit_header"></button>
              </form>
            <?php endif; // true === et_get_option( 'show_search_icon', false ) 
            ?>

            <?php if ($et_contact_info_defined) : ?>

              <div id="et-info">
                <?php if ('' !== ($et_phone_number = et_get_option('phone_number'))) : ?>
                  <span id="et-info-phone"><?php echo et_core_esc_previously(et_sanitize_html_input_text($et_phone_number)); ?></span>
                <?php endif; ?>

                <?php if ('' !== ($et_email = et_get_option('header_email'))) : ?>
                  <a href="<?php echo esc_attr('mailto:' . $et_email); ?>"><span id="et-info-email"><?php echo esc_html($et_email); ?></span></a>
                <?php endif; ?>
              </div> <!-- #et-info -->

            <?php endif; // true === $et_contact_info_defined 
            ?>
            <?php if ($et_contact_info_defined || true === $show_header_social_icons || false !== et_get_option('show_search_icon', true) || class_exists('woocommerce') || is_customize_preview()) { ?>
              <?php if ('fullscreen' === et_get_option('header_style', 'left')) { ?>
              </div> <!-- .et_pb_top_menu_inner -->
            <?php } ?>

          </div> <!-- .et_slide_menu_top -->
        <?php } ?>

        <div class="et_pb_fullscreen_nav_container">
          <?php
          $slide_nav = '';
          $slide_menu_class = 'et_mobile_menu';

          $slide_nav = wp_nav_menu(array('theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'echo' => false, 'items_wrap' => '%3$s'));
          $slide_nav .= wp_nav_menu(array('theme_location' => 'secondary-menu', 'container' => '', 'fallback_cb' => '', 'echo' => false, 'items_wrap' => '%3$s'));
          ?>

          <ul id="mobile_menu_slide" class="<?php echo esc_attr($slide_menu_class); ?>">

            <?php
            if ('' === $slide_nav) :
            ?>
              <?php if ('on' === et_get_option('divi_home_link')) { ?>
                <li <?php if (is_home()) echo ('class="current_page_item"'); ?>><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'Divi'); ?></a></li>
              <?php }; ?>

              <?php show_page_menu($slide_menu_class, false, false); ?>
              <?php show_categories_menu($slide_menu_class, false); ?>
            <?php
            else :
              echo et_core_esc_wp($slide_nav);
            endif;
            ?>

          </ul>
        </div>
      </div>
      <?php
      $slide_header = ob_get_clean();

      /**
       * Filters the HTML output for the slide header.
       *
       * @since 3.10
       *
       * @param string $top_header
       */
      echo et_core_intentionally_unescaped(apply_filters('et_html_slide_header', $slide_header), 'html');
      ?>
    <?php endif; // true ==== $et_slide_header 
    ?>

    <?php ob_start(); ?>
    <header id="main-header" data-height-onload="<?php echo esc_attr(et_get_option('menu_height', '66')); ?>">

      <?php
      $logo = ($user_logo = et_get_option('divi_logo')) && !empty($user_logo)
        ? $user_logo
        : $template_directory_uri . '/images/logo.png';
      ?>

      <div class="mobile-menu__wrapper">
        <div class="mobile_menu__header">
          <!-- Menu Hamburger Icon -->
          <div class="mobile_menu__bar"></div>

          <!-- Menu Logo -->
          <div class="mobile_menu__logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <img src="<?php echo esc_attr($logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
            </a>
          </div>

          <!-- Menu Search Icon -->
          <div class="mobile_menu__search_icon"></div>

          <!-- Menu Cart Icon -->
          <div class="mobile_menu__cart_icon">
            <?php
            $items_number = WC()->cart->get_cart_contents_count();
            $url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : WC()->cart->get_cart_url();
            ?>
            <?php if ($items_number != 0) : ?>
              <a href="<?php echo $url ?>" class="mobile_menu__cart_items"><?php echo $items_number ?></a>
            <?php endif ?>
          </div>

        </div>

        <!-- Mobile sliding search Div -->
        <div class="mobile_menu__search_wrapper">
          <form role="search" method="get" class="mobile_menu__search_form" action="<?php echo esc_url(home_url('/')); ?>">
            <?php
            printf(
              '<input type="search" class="mobile_menu__search_field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
              esc_attr__('Search &hellip;', 'Divi'),
              get_search_query(),
              esc_attr__('Search for:', 'Divi')
            );
            ?>

            <input type="submit" class="mobile_menu__search_submit" value="Искать">
            <?php
            /**
             * Fires inside the search form element, just before its closing tag.
             *
             * @since ??
             */
            do_action('et_search_form_fields');
            ?>
          </form>
        </div>

        <!-- Mobile sliding menu Start -->
        <div class="mobile_menu">

          <?php
          /** 
           * Displaying mobile menu 
           */
          wp_nav_menu(array(
            'menu' => 469
          ));
          ?>

          <div class="menu-mobile__business-info">
            <div class="phones-block">
              <!-- Clean-Carpets AD block -->
              <div class="clean-carpet">
                <span>Чистка ковров</span>
                <span>(4212) 20-66-50</span>
              </div>
              <!-- Clean-water AD block -->
              <div class="clean-water">
                <span>Фильтры для воды <sup>new</sup></span>
                <span>+7 914 544-16-17</span>
              </div>
              <!-- Clean-Clothes AD block -->
              <div class="clean-clothes">
                <span>Химчистка одежды <sup>new</sup></span>
                <span>(4212) 20-21-06</span>
              </div>
            </div>
          </div>

          <div class="social-links">
            <a href="https://www.facebook.com/amazondv" target="_blank" class="social-block__social_link social_link_fb"></a>
            <a href="https://www.instagram.com/amazon_dv" target="_blank" class="social-block__social_link social_link_ig"></a>
            <a href="https://vk.com/amazondv" target="_blank" class="social-block__social_link social_link_vk"></a>
          </div>

        </div>
      </div>
      <!-- Mobile sliding menu End -->

      <div class="container clearfix et_menu_container">

        <div class="additional-business-info">
          <div class="phones-block">
            <!-- Clean-Carpets AD block -->
            <div class="clean-carpet">
              <span>Чистка ковров</span>
              <span>(4212) 20-66-50</span>
            </div>
            <!-- Clean-water AD block -->
            <div class="clean-water">
              <span>Фильтры для воды <sup>new</sup></span>
              <span>+7 914 544-16-17</span>
            </div>
            <!-- Clean-Clothes AD block -->
            <div class="clean-clothes">
              <span>Химчистка одежды <sup>new</sup></span>
              <span>(4212) 20-21-06</span>
            </div>
          </div>
        </div>

        <!-- Logo -->
        <?php
        $logo = ($user_logo = et_get_option('divi_logo')) && !empty($user_logo)
          ? $user_logo
          : $template_directory_uri . '/images/logo.png';

        ob_start();
        ?>
        <div class="logo_container">
          <span class="logo_helper"></span>
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_attr($logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" id="logo" data-height-percentage="<?php echo esc_attr(et_get_option('logo_height', '54')); ?>" />
          </a>
        </div>

        <?php
        $logo_container = ob_get_clean();

        /**
         * Filters the HTML output for the logo container.
         *
         * @since 3.10
         *
         * @param string $logo_container
         */
        echo et_core_intentionally_unescaped(apply_filters('et_html_logo_container', $logo_container), 'html');
        ?>

        <div id="et-top-navigation" data-height="<?php echo esc_attr(et_get_option('menu_height', '66')); ?>" data-fixed-height="<?php echo esc_attr(et_get_option('minimized_menu_height', '40')); ?>">
          <?php if (!$et_slide_header || is_customize_preview()) : ?>
            <nav id="top-menu-nav">
              <?php
              $menuClass = 'nav';
              if ('on' === et_get_option('divi_disable_toptier')) $menuClass .= ' et_disable_top_tier';
              $primaryNav = '';

              $primaryNav = wp_nav_menu(array('theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false));
              if (empty($primaryNav)) :
              ?>
                <ul id="top-menu" class="<?php echo esc_attr($menuClass); ?>">
                  <?php if ('on' === et_get_option('divi_home_link')) { ?>
                    <li <?php if (is_home()) echo ('class="current_page_item"'); ?>><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'Divi'); ?></a></li>
                  <?php }; ?>

                  <?php show_page_menu($menuClass, false, false); ?>
                  <?php show_categories_menu($menuClass, false); ?>
                </ul>
              <?php
              else :
                echo et_core_esc_wp($primaryNav);
              endif;
              ?>
            </nav>
          <?php endif; ?>

          <?php
          if (!$et_top_info_defined && (!$et_slide_header || is_customize_preview())) {
            et_show_cart_total(array(
              'no_text' => true,
            ));
          }
          ?>

          <?php if ($et_slide_header || is_customize_preview()) : ?>
            <span class="mobile_menu_bar et_pb_header_toggle et_toggle_<?php echo esc_attr(et_get_option('header_style', 'left')); ?>_menu"></span>
          <?php endif; ?>

          <?php if ((false !== et_get_option('show_search_icon', true) && !$et_slide_header) || is_customize_preview()) : ?>
            <div id="et_top_search">
              <span id="et_search_icon"></span>
            </div>
          <?php endif; // true === et_get_option( 'show_search_icon', false ) 
          ?>

          <?php

          /**
           * Fires at the end of the 'et-top-navigation' element, just before its closing tag.
           *
           * @since 1.0
           */
          do_action('et_header_top');

          ?>
        </div> <!-- #et-top-navigation -->
      </div> <!-- .container -->
      <div class="et_search_outer">
        <div class="container et_search_form_container">
          <form role="search" method="get" class="et-search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <?php
            printf(
              '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
              esc_attr__('Search &hellip;', 'Divi'),
              get_search_query(),
              esc_attr__('Search for:', 'Divi')
            );

            /**
             * Fires inside the search form element, just before its closing tag.
             *
             * @since ??
             */
            do_action('et_search_form_fields');
            ?>
          </form>
          <span class="et_close_search_field"></span>
        </div>
      </div>
      <div class="anticeptics-banner">
        <div class="container">
          <a class="anticeptics-banner__text-link" href="/product-category/dezinfektsiya/antiseptiki-i-sanitajzery/">эффективные антисептики и антибактериальное мыло, свое производство, выгодные цены</a>
        </div>
      </div>
    </header> <!-- #main-header -->
    <?php
    $main_header = ob_get_clean();

    /**
     * Filters the HTML output for the main header.
     *
     * @since 3.10
     *
     * @param string $main_header
     */
    echo et_core_intentionally_unescaped(apply_filters('et_html_main_header', $main_header), 'html');
    ?>
    <div id="et-main-area">
      <?php
      /**
       * Fires after the header, before the main content is output.
       *
       * @since 3.10
       */
      do_action('et_before_main_content');
