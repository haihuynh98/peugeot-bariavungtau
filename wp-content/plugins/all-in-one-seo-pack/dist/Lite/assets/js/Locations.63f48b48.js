import{C as u}from"./Blur.404d53ce.js";import{C as _}from"./SettingsRow.8a127375.js";import{S as d}from"./Plus.6ec3819c.js";import{n}from"./vueComponentNormalizer.58b0a173.js";import{R as p}from"./RequiredPlans.c312629f.js";import{C as m}from"./Card.a455f6aa.js";import{C as f}from"./ProBadge.d6147ee5.js";import{C as h}from"./Index.7823cadd.js";import{A as v}from"./WpTable.8ff25002.js";import"./index.4776f7d5.js";import"./Row.dfea53f7.js";import"./index.4a5acef5.js";import"./client.d00863cc.js";import"./_commonjsHelpers.10c44588.js";import"./translations.3bc9d58c.js";import"./default-i18n.0e73c33c.js";import"./constants.9efee5f7.js";import"./isArrayLikeObject.5268a676.js";import"./portal-vue.esm.272b3133.js";import"./Tooltip.060399ab.js";import"./Slide.8aaa5049.js";import"./attachments.52d4e34c.js";import"./cleanForSlug.788b395f.js";var $=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"aioseo-locations-blur"},[s("core-blur",[s("div",{staticClass:"aioseo-settings-row"},[s("p",{staticClass:"location-description"},[t._v(t._s(t.strings.description))])]),s("core-settings-row",{staticClass:"info-name-row",attrs:{name:t.strings.name,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("base-input",{attrs:{type:"text",size:"medium"}}),s("span",{staticClass:"field-description"},[t._v(t._s(t.strings.nameDesc))])],1)]},proxy:!0}])}),s("core-settings-row",{staticClass:"info-business-image",attrs:{name:t.strings.image},scopedSlots:t._u([{key:"content",fn:function(){return[s("div",{staticClass:"image-upload"},[s("base-input",{attrs:{size:"medium",placeholder:t.strings.pasteYourImageUrl}}),s("base-button",{staticClass:"insert-image",attrs:{size:"medium",type:"black"}},[s("svg-circle-plus"),t._v(" "+t._s(t.strings.uploadOrSelectImage)+" ")],1),s("base-button",{staticClass:"remove-image",attrs:{size:"medium",type:"gray"}},[t._v(" "+t._s(t.strings.remove)+" ")])],1),s("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.minimumSize)+" ")])]},proxy:!0}])}),s("core-settings-row",{staticClass:"info-business-type",attrs:{name:t.strings.businessType,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[s("base-select",{attrs:{size:"large",options:t.businessTypes,value:"default"}})]},proxy:!0}])}),s("core-settings-row",{staticClass:"info-urls-row",attrs:{name:t.strings.urls,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("span",{staticClass:"field-description"},[t._v(t._s(t.strings.websiteDesc))]),s("base-input",{attrs:{type:"text",size:"medium"}})],1),s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("span",{staticClass:"field-description mt-8"},[t._v(t._s(t.strings.aboutDesc))]),s("base-input",{attrs:{type:"text",size:"medium"}})],1),s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("span",{staticClass:"field-description mt-8"},[t._v(t._s(t.strings.contactDesc))]),s("base-input",{attrs:{type:"text",size:"medium"}})],1)])]},proxy:!0}])})],1)],1)},g=[];const y={components:{CoreBlur:u,CoreSettingsRow:_,SvgCirclePlus:d},data(){return{strings:{description:this.$t.sprintf(this.$t.__("Whether your business has multiple locations, or just one, %1$s makes it easy to configure and display relevant information about your local business. You can use the custom-built tools below, or you can use the Locations custom post type (multiple locations only) to generate relevant and necessary information for search engines or for your customers.",this.$td),"AIOSEO"),name:this.$t.__("name",this.$td),nameDesc:this.$t.__("Your name or company name.",this.$td),businessType:this.$t.__("Type",this.$td),urls:this.$t.__("URLs",this.$td),image:this.$t.__("Image",this.$td),uploadOrSelectImage:this.$t.__("Upload or Select Image",this.$td),pasteYourImageUrl:this.$t.__("Paste your image URL or select a new image",this.$td),minimumSize:this.$t.__("Minimum size: 112px x 112px, The image must be in JPG, PNG, GIF, SVG, or WEBP format.",this.$td),remove:this.$t.__("Remove",this.$td),websiteDesc:this.$t.__("Website URL:",this.$td),aboutDesc:this.$t.__("About Page URL:",this.$td),contactDesc:this.$t.__("Contact Page URL:",this.$td)},businessTypes:[{label:this.$t.__("default",this.$td),value:"LocalBusiness"},{label:this.$t.__("Animal Shelter",this.$td),value:"Animal Shelter"}]}}},o={};var x=n(y,$,g,!1,b,null,null,null);function b(t){for(let e in o)this[e]=o[e]}const C=function(){return x.exports}();var S=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"aioseo-locations-lite"},[s("core-card",{staticClass:"aioseo-locations-card",attrs:{slug:"localBusinessInfo",noSlide:!0},scopedSlots:t._u([{key:"header",fn:function(){return[s("span",[t._v(t._s(t.strings.businessInfo))]),s("core-pro-badge")]},proxy:!0}])},[s("blur"),s("cta",{attrs:{"cta-link":t.$links.getPricingUrl("local-seo","local-seo-upsell","locations"),"button-text":t.strings.ctaButtonText,"learn-more-link":t.$links.getUpsellUrl("local-seo",null,"home"),"feature-list":t.features,"align-top":""},scopedSlots:t._u([{key:"header-text",fn:function(){return[t._v(" "+t._s(t.strings.ctaHeader)+" ")]},proxy:!0},{key:"description",fn:function(){return[s("required-plans",{attrs:{addon:"aioseo-local-business"}}),t._v(" "+t._s(t.strings.locationInfo1)+" ")]},proxy:!0}])})],1)],1)},L=[];const w={components:{Blur:C,RequiredPlans:p,CoreCard:m,CoreProBadge:f,Cta:h},data(){return{features:[this.$t.__("Local Business Schema",this.$td),this.$t.__("Multiple Locations",this.$td),this.$t.__("Business Info and Location blocks, widgets and shortcodes",this.$td),this.$t.__("Detailed Address, Contact and Payment Info",this.$td)],strings:{locationInfo1:this.$t.__("Local Business schema markup enables you to tell Google about your business, including your business name, address and phone number, opening hours and price range. This information may be displayed as a Knowledge Graph card or business carousel.",this.$td),businessInfo:this.$t.__("Business Info",this.$td),ctaButtonText:this.$t.__("Upgrade to Pro and Unlock Local SEO",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Local SEO is only available for licensed %1$s %2$s users.",this.$td),"AIOSEO","Pro")}}}},i={};var I=n(w,S,L,!1,k,null,null,null);function k(t){for(let e in i)this[e]=i[e]}const a=function(){return I.exports}();var U=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div")},R=[];const P={},r={};var A=n(P,U,R,!1,B,null,null,null);function B(t){for(let e in r)this[e]=r[e]}const z=function(){return A.exports}();var E=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div")},D=[];const T={},l={};var M=n(T,E,D,!1,O,null,null,null);function O(t){for(let e in l)this[e]=l[e]}const j=function(){return M.exports}();var F=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"aioseo-locations"},[t.shouldShowMain?s("locations"):t._e(),t.shouldShowActivate?s("activate"):t._e(),t.shouldShowUpdate?s("update"):t._e(),t.shouldShowLite?s("lite"):t._e()],1)},G=[];const Y={mixins:[v],components:{Locations:a,Activate:z,Lite:a,Update:j},data(){return{addonSlug:"aioseo-local-business"}}},c={};var W=n(Y,F,G,!1,q,null,null,null);function q(t){for(let e in c)this[e]=c[e]}const ft=function(){return W.exports}();export{ft as default};