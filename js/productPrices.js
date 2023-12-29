const arabic_with_numbers = new Set();
const french_with_numbers = new Set();

// Iterate over the states and add unique combinations to the Set
states.forEach((state) => {
  const { code, state_ar, state_fr, price } = state;

  arabic_with_numbers.add(
    JSON.stringify({ label: `${code} - ${state_ar}`, code: code, price: price })
  );
  french_with_numbers.add(
    JSON.stringify({ label: `${code} - ${state_fr}`, code: code, price: price })
  );
});

function injectStates(classes, states) {
  const placeholder = jQuery(classes + " option:first").text();
  jQuery(classes).html("");
  jQuery(classes).append(
    `<option disabled selected value="">${placeholder}</option>`
  );

  states.forEach((state) => {
    state = JSON.parse(state);
    jQuery(classes).append(
      `<option data-price="${state.price ? state.price : 0}" value="${
        state.label
      }">${state.label}</option>`
    );
  });
}

injectStates("select.states_ar", arabic_with_numbers);
injectStates("select.states_fr", french_with_numbers);

jQuery("select.states_ar").on("change", update_price);
jQuery("select.states_fr").on("change", update_price);

function update_price() {
  const price = parseInt(jQuery(".price")[0]?.innerText);
  const salePrice = parseInt(jQuery(".price")[1]?.innerText);
  const statePrice = jQuery(this).find("option:selected").data("price") ?? 0;
  const _price = jQuery(".price")[0];
  const _salePrice = jQuery(".price")[1];

  if (_price) {
    _price.innerText = price + statePrice;
    jQuery('input[name="total_price"]').val(price + statePrice);
    jQuery('.dynamic-price').text(price + statePrice);
  }
  if (_salePrice) {
    _salePrice.innerText = salePrice + statePrice;
    jQuery('input[name="total_price"]').val(salePrice + statePrice);
    jQuery('.dynamic-price').text(salePrice + statePrice);
    
  }
}

function update_offer_price() {
  if (jQuery(".product_offer").length > 0) {
    const price = parseInt(jQuery(".product_offer:checked").val());
    const sale_price = parseInt(
      jQuery(".product_offer:checked").data("sale_price")
    );
    const _price = jQuery(".price")[0];
    const _salePrice = jQuery(".price")[1];
    if (_price) jQuery(".price")[0].innerText = price;
    if (_salePrice) jQuery(".price")[1].innerText = sale_price;
    update_price();
  }
}

update_offer_price();
jQuery(".product_offer").on("change", update_offer_price);
