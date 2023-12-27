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

const price = parseInt(jQuery(".price")[0]?.innerText);
const salePrice = parseInt(jQuery(".price")[1]?.innerText); 

function update_price() {

  const statePrice = jQuery(this).find("option:selected").data("price");
  const _price = jQuery(".price")[0];
  const _salePrice = jQuery(".price")[1];

  if (_price) _price.innerText = price + statePrice;
  if (_salePrice) _salePrice.innerText = salePrice + statePrice;
}
