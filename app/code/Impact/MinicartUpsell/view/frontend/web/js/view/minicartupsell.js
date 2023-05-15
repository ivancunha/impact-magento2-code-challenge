define([
    "ko",
    "uiComponent",
    "jquery",
    "Magento_Customer/js/customer-data",
], function (ko, Component, $, customerData) {
    "use strict";

    return Component.extend({
        // This is the part I was working on when I stopped to deliver the challenge.
        displaySubtotal: ko.observable(true),

        /**
         * @override
         */
        initialize: function () {
            this._super();
            this.cart = customerData.get("cart");
        },
        getTotalCartItems: function () {
            return customerData.get("cart")().summary_count;
        },
        getCartItems: function () {
            // This is the list of items printed to the console:
            //console.log(customerData.get("cart")().items);
            console.table(customerData.get("cart")().items);
            // Now that I have the list of items, I was looking for a way to check for last one added to the cart.
            // In case that would not be possible with Javascript, I would have to get the last item from PHP
            // Or just get the up-sell product right from PHP to Javascript.
            // This is the part I was working on when I stopped to deliver the challenge.

            // This opens the popup every time an item is added to the cart.
            // It is not finished because it's only supposed to open, if the added item has up-sell products.
            $('[data-block="minicart"]')
                .find('[data-role="dropdownDialog"]')
                .dropdownDialog("open");

            return customerData.get("cart")().items;
        },
    });
});
