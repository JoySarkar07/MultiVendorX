import { __ } from '@wordpress/i18n';

export default {
    id: 'store',
    priority: 13,
    name: __('Store', 'multivendorx'),
    desc: __("Manage setting related to the sellers shop.", 'multivendorx'),
    icon: 'adminLib-storefront',
    submitUrl: 'save_dashpages',
    modal: [
        {
            key: "mvx_vendor_shop_template",
            type: "radio-select",
            label: __( 'Store Header', 'multivendorx' ),
            desc: __( "Select store banner style", 'multivendorx' ),
            options: [
                {
                    key: "template1",
                    label: __('Outer Space', 'multivendorx'),
                    value: 'template1',
                    color: appLocalizer.template1
                }, 
                {
                    key: "template2",
                    label: __('Green Lagoon', 'multivendorx'),
                    value: "template2",
                    color: appLocalizer.template2
                },
                {
                    key: "template3",
                    label: __('Old West', 'multivendorx'),
                    value: "template3",
                    color: appLocalizer.template3
                }
            ]
        }, 
        {
            key: 'enable_store_map_for_vendor',
            type: 'checkbox',
            label: __( 'Store Location', 'multivendorx' ),
            desc:__("Tap to display the location of sellers' shops.", 'multivendorx'),
            options: [
                {
                    key: "enable_store_map_for_vendor",
                    value: "enable_store_map_for_vendor",
                }
            ],
            look: 'toggle',
        },
        {
            key: "choose_map_api",
            type: "select",
            defaulValue:'google_map_set',
            label: __( 'Location Provider', 'multivendorx' ),
            desc: __( 'Select prefered location provider', 'multivendorx' ),
            options: [
                {
                    key: "google_map_set",
                    label: __('Google map', 'multivendorx'),
                    value: __('google_map_set', 'multivendorx'),
                },
                {
                    key: "mapbox_api_set",
                    label:  __('Mapbox map', 'multivendorx'),
                    value: __('mapbox_api_set', 'multivendorx'),
                },
            ],
            dependent:{
                key:'enable_store_map_for_vendor',
                set:true
            }
        },
        {
            key: "google_api_key",
            type: "text",
            label: __( 'Google Map API key', 'multivendorx' ),
            desc: __('<a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key" target="_blank">Click here to generate key</a>','multivendorx'),
        },
        {
            key: "mapbox_api_key",
            type: "text",
            label: __( 'Mapbox access token', 'multivendorx' ),
            desc: __('<a href="https://docs.mapbox.com/help/getting-started/access-tokens/" target="_blank">Click here to generate access token</a>','multivendorx'),
        },
        {
            key: "show_related_products",
            type: "select",
            label: __( 'Related Product', 'multivendorx' ),
            desc: __( 'Let customers view other products related to the product they are viewing..', 'multivendorx' ),
            options: [
                {
                    key: "all_related",
                    label: __('Related Products from Entire Store', 'multivendorx'),
                    value: __('all_related', 'multivendorx'),
                },
                {
                    key: "vendors_related",
                    selected:true,
                    label:  __('Mapbox map', 'multivendorx'),
                    value: __('mapbox_api_set', 'multivendorx'),
                },
            ],
        },
    ]
}