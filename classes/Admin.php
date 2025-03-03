<?php
namespace MultiVendorX;


class Admin{
    /**
     * Admin page submenu Payments page constructor function
     */
    public function __construct()
    {
        add_action('admin_menu',[$this,'add_menu']);
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_script' ]);
    }

    /**
     * Add menu in admin panel
     */
    public function add_menu(){
        global $submenu;

        add_menu_page(
            'MultiVendorX',
            'MultiVendorX',
            'manage_woocommerce',
            'multivendorx',
            [$this,'menu_page_callback'],
            'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><g fill="#a7aaad" fill-rule="nonzero"><path d="M10.8,0H9.5C8,0,6.7,1.3,6.7,2.8V4C6.9,4,7,4,7.2,4.1V2.8c0-1.3,1-2.3,2.3-2.3h1.3
        c1.3,0,2.3,1,2.3,2.3v1.7c0.2,0,0.3,0,0.5,0V2.8C13.6,1.3,12.3,0,10.8,0z"/><path d="M16.8,4.4C7.6,6.8,3.7,1.9,1.8,4.9c-1.1,1.7,0.3,7.6,1.2,13c2,1.3,4.4,2.1,7,2.1
        c2.7,0,5.2-0.8,7.3-2.3C18.6,12.3,19.5,3.7,16.8,4.4z M6.7,10.3V9.9h0.7v0.4v0.2H6.7V10.3z M5.6,8.9h0.3v0.3H5.6V8.9z M3.9,9.2h0.6
        v0.6H3.9V9.2z M5,10.8H4.3v-0.6H5V10.8z M5.1,9.9H4.7V9.5h0.3V9.9z M5.3,9.1H4.9V8.7h0.5V9.1z M5.4,9.4h0.7v0.7H5.4V9.4z
         M14.3,16.3h-0.6v-0.6h0.6V16.3z M13.9,15.4v-0.3h0.3v0.3H13.9z M11.7,14.2l1.4,1.6h-0.6v1h1v-0.6l0.8,0.9h-2.4l-1.6-1.7l-1.6,1.7
        H6.3l2.5-3l-2.2-2.6V11H6.1l-0.5-0.6h0.9v0.4h1.2v-0.4h0.3l2.3,2.6L13,9.8c0.4-0.5,1-0.8,1.7-0.8h1.4L11.7,14.2z M13.1,15.5V15h0.5
        v0.5H13.1z M13.2,16.1v0.5h-0.5v-0.5H13.2z M5.9,11.8v-0.5h0.2h0.3v0.3v0.2H5.9z"/></g></svg>'),
            50
        );

        add_submenu_page(
            'multivendorx',
            __( 'Dashboard', 'multivendorx' ),
            __( 'Dashboard', 'multivendorx' ),
            'manage_woocommerce',
            'multivendorx#&tab=dashboard',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __( 'Work Board', 'multivendorx' ),
            __( 'Work Board', 'multivendorx' ),
            'manage_woocommerce',
            'multivendorx#&tab=work-board&name=activity-reminder',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __( 'Commissions', 'multivendorx' ),
            __( 'Commissions', 'multivendorx' ),
            'manage_woocommerce',
            'multivendorx#&tab=Commissions',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __('Vendors', 'multivendorx'),
            __('Vendors', 'multivendorx'),
            'manage_woocommerce',
            'multivendorx#&tab=vendor',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __( 'Payments', 'multivendorx' ),
            __( 'Payments', 'multivendorx' ),
            'manage_woocommerce',
            'multivendorx#&tab=payment&name=payment-masspay',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __( 'Commissions', 'multivendorx' ),
            __( 'Commissions', 'multivendorx' ),
            'manage_woocommerce',
            'multivendorx#&tab=commission',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __( 'Settings', 'multivendorx' ),
            __( 'Settings', 'multivendorx' ),
            'manage_woocommerce',
            'multivendorx#&tab=settings&subtab=settings_general',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __( 'Analytics', 'multivendorx' ),
            __( 'Analytics', 'multivendorx' ),
            'manage_woocommerce',
            'multivendorx#&tab=analytics&name=admin-overview',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __( 'Status and Tools', 'multivendorx' ),
            __( 'Status and Tools', 'multivendorx' ),
            'manage_woocommerce',
            'multivendorx#&tab=status-tools&name=database-tools',
            '__return_null'
        );

        add_submenu_page(
            'multivendorx',
            __( '<div id="help-and-support">Help & Support</div>', 'multivendorx' ),
            __( '<div id="help-and-support">Help & Support</div>', 'multivendorx' ),
            'manage_woocommerce',
            'https://multivendorx.com/'
        );

        remove_submenu_page( 'multivendorx', 'multivendorx' );

    }

    /**
     * Callback function for menu page
     * @return void
     */
    public function menu_page_callback(){
        echo '<div id="mvx-admin-dashboard"></div>';
    }

    
    /**
     * Enque javascript and css
     * @return void
     */

     public function enqueue_script() {
        // Enque script and style
        wp_enqueue_style('mvx_admin_css', MVX()->plugin_url . 'build/index.css');
        wp_enqueue_script('mvx_admin_script', MVX()->plugin_url. 'build/index.js', [ 'wp-element'], '1.0.0', true);


        // Preapere page list. Will move to utility function. !!!!!!!!
        $page_list = [];
        $pages = get_pages();
        $woocommerce_pages = array(wc_get_page_id('shop'), wc_get_page_id('cart'), wc_get_page_id('checkout'), wc_get_page_id('myaccount'));
        if($pages){
            foreach ($pages as $page) {
                if (!in_array($page->ID, $woocommerce_pages)) {
                    $page_list[] = array(
                        'value'=> $page->ID,
                        'label'=> $page->post_title,
                        'key'=> $page->ID,
                    );
                }
            }
        };

        // Get all tab setting's database value
        $settings_value = [];
        $tabs_names     = [ 'settings_general_tab', 'disbursement_tab', 'commissions_tab', 'spmv_pages_tab', 'products_capability_tab', 'products_tab', 'payment_masspay_tab'];
        foreach ( $tabs_names as $tab_name ) {
            $settings_value[ $tab_name ] = MVX()->setting->mvx_get_option( 'mvx_' . $tab_name . '_settings' );
        }

        
        wp_localize_script( 'mvx_admin_script', 'appLocalizer', apply_filters('mvx_module_complete_settings', [
            // Required in new code
            'apiUrl'        => untrailingslashit(get_rest_url()),
            'restUrl'       => 'mvx_module/v1',
            'nonce'         => wp_create_nonce( 'wp_rest' ),
            'moduleList'    => MVX()->modules->get_active_modules(),
            'pageList'      => $page_list,
            'settings_databases_value'  => $settings_value,
            'pro_settings_list'=> '',
            'template1'     => MVX()->plugin_url . 'src/assets/images/template1.jpg',
            'template2'     => MVX()->plugin_url  . 'src/assets/images/template2.jpg',
            'template3'     => MVX()->plugin_url  . 'src/assets/images/template3.jpg',

        // 'marker_icon' => $MVX->plugin_url . 'assets/images/store-marker.png',
        // 'marketplace_logo' => $MVX->plugin_url.'assets/images/dclogo.svg',
        // 'marketplace_text' => __('MultiVendorX', 'multivendorx'),
        // 'google_api'    =>  get_mvx_global_settings('google_api_key'),
        // 'mapbox_api'    =>  get_mvx_global_settings('mapbox_api_key'),
        // 'location_provider'    =>  get_mvx_global_settings('choose_map_api'),
        // 'store_location_check'    =>  get_mvx_global_settings('enable_store_map_for_vendor') && !empty(get_mvx_global_settings('enable_store_map_for_vendor')) ? true : false,
        // 'store_location_enabled'    =>  mvx_is_module_active('store-location'),
        // 'multivendor_right_white_logo' => $MVX->plugin_url.'assets/images/vertical-logo-white.png', 
        // 'knowledgebase_url'     => 'https://multivendorx.com/knowledgebase/',
        // 'knowledgebase_title'   => __('MVX knowledge Base', 'multivendorx'),
        // 'search_module' =>  __('Search Modules', 'multivendorx'),
        // 'search_module_placeholder' => __('Search Modules', 'multivendorx'),
        // 'pro_text' => __('Pro', 'multivendorx'),
        // 'documentation_extra_text' => __('For more info, please check the', 'multivendorx'),
        // 'documentation_text' => __('DOC', 'multivendorx'),
        // 'settings_text' => __('Settings', 'multivendorx'),
        // 'admin_mod_url' => admin_url('admin.php?page=modules'),
        // 'admin_setup_widget_option' => admin_url( 'index.php?page=mvx-setup' ),
        // 'admin_migration_widget_option' => admin_url( 'index.php?page=mvx-setup' ),
        // 'multivendor_migration_link' => admin_url('index.php?page=mvx-migrator'),
        // 'add_announcement_link' =>  admin_url('admin.php?page=mvx#&submenu=work-board&name=announcement&create=announcement'),
        // 'announcement_back' =>  admin_url('admin.php?page=mvx#&submenu=work-board&name=announcement'),
        // 'add_knowladgebase_link' =>  admin_url('admin.php?page=mvx#&submenu=work-board&name=knowladgebase&create=knowladgebase'),
        // 'knowladgebase_back' =>  admin_url('admin.php?page=mvx#&submenu=work-board&name=knowladgebase'),
        // 'settings_fields' => apply_filters('mvx-settings-fileds-details', $settings_fields),
        // 'databse_settings' => $database_settings,
        // 'countries'                 => wp_json_encode( array_merge( WC()->countries->get_allowed_country_states(), WC()->countries->get_shipping_country_states() ) ),
        // 'mvx_all_backend_tab_list' => $mvx_all_backend_tab_list,
        // 'mvx_vendor_application_header' =>  $vendor_application_header,
        // 'default_logo'                  => $MVX->plugin_url.'assets/images/WP-stdavatar.png',
        // 'commission_bulk_list_option'   =>  $commission_bulk_list_action,
        // 'commission_header'             => $commission_header,
        // 'commission_status_list_action' =>  $commission_status_list_action,
        // 'commission_page_string'        =>  $commission_page_string,
        // 'vendor_page_string'            =>  $vendor_page_string,
        // 'status_and_tools_string'       =>  $status_and_tools_string,
        // 'settings_page_string'          =>  $settings_page_string,
        // 'global_string'                 =>  $global_string,
        // 'workboard_string'              =>  $workboard_string,
        // 'dashboard_string'              =>  $dashboard_page_string,
        // 'module_page_string'            =>  $module_page_string,
        // 'analytics_page_string'         =>  $analytics_page_string,
        // 'report_product_header'         =>  $report_product_header,
        // 'report_vendor_header'          =>  $report_vendor_header,
        // 'report_page_string'            =>  $report_page_string,
        // 'post_bulk_status'              =>  $post_bulk_status,
        // 'question_selection_wordpboard' =>  $question_selection_wordpboard,
        // 'question_product_selection_wordpboard' =>  $question_product_selection_wordpboard,
        // 'pending_question_bulk'         =>  $pending_question_bulk,
        // 'task_board_bulk_status'        =>  $task_board_bulk_status,
        // 'columns_announcement'          =>  $columns_announcement,
        // 'columns_questions'             =>  $columns_questions,
        // 'columns_knowledgebase'         =>  $columns_knowledgebase,
        // 'columns_store_review'          =>  $columns_store_review,
        // 'columns_vendor'                =>  $columns_vendor,
        // 'columns_followers'             =>  $columns_followers,
        // 'columns_zone_shipping'         =>  $columns_zone_shipping,
        // 'select_option_delete'          =>  $select_option_delete,
        // 'select_option_delete_for_vendor'       =>  $select_option_delete_for_vendor,
        // 'columns_commission'                    =>  $columns_commission,
        // 'columns_report_abuse'                  =>  $columns_report_abuse,
        // 'columns_refunded_order'                =>  $columns_refunded_order,
        // 'columns_refund_request'                =>  $columns_refund_request,
        // 'columns_pending_shipping'              =>  $columns_pending_shipping,
        // 'select_module_category_option'         =>  $select_module_category_option,
        // 'errors_log'                            =>  $this->get_error_log_rows(100),
        // 'mvx_tinymce_key'                       =>  get_mvx_vendor_settings('mvx_tinymce_api_section', 'settings_general'),
        ] ) );

     }
}
