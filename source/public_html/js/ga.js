window.dataLayer = window.dataLayer || [];
function gtag() { dataLayer.push(arguments); }
function gtagLoaded() { return Object.keys(window.google_tag_manager ?? {}).includes(GA_MEASUREMENT_ID); }
var params = {};
//params.debug_mode = true;
gtag('js', new Date());
gtag('config', GA_MEASUREMENT_ID, params);