!function(){"use strict";var t=window.wc.blocksCheckout,e=JSON.parse('{"apiVersion":2,"name":"mailpoet/marketing-optin-block","version":"0.1.0","title":"MailPoet Marketing Opt-in","category":"mailpoet","textdomain":"mailpoet","supports":{"align":false,"html":false,"multiple":false,"reusable":false,"inserter":false},"attributes":{"lock":{"type":"object","default":{"remove":true,"move":false}}},"parent":["woocommerce/checkout-contact-information-block"],"editorScript":"file:../../../dist/js/marketing_optin_block/marketing-optin-block.js","editorStyle":"file:../../../dist/js/marketing_optin_block/marketing-optin-block.css"}'),o=window.wp.element,n=window.wc.wcSettings;const{optinEnabled:a,defaultText:i,defaultStatus:l}=(0,n.getSetting)("mailpoet_data");(0,t.registerCheckoutBlock)({metadata:e,component:function(e){let{text:n,checkoutExtensionData:c}=e;const[s,r]=(0,o.useState)(l),{setExtensionData:m}=c||{};return(0,o.useEffect)((()=>{a&&m&&m("mailpoet","optin",s)}),[s,m]),a?(0,o.createElement)(t.CheckboxControl,{checked:s,onChange:r},(0,o.createElement)(o.RawHTML,null,n||i)):null}})}();