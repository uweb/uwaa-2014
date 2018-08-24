function initForm(){initializeFocus(),addEvent(document.getElementsByTagName("form")[0],"submit",disableSubmitButton),ifInstructs(),showRangeCounters()}function disableSubmitButton(){document.getElementById("saveForm").disabled=!0}function initializeFocus(){var a=getElementsByClassName(document,"*","field");for(i=0;i<a.length;i++)"radio"==a[i].type||"checkbox"==a[i].type?(a[i].onclick=function(){highlight(this,4)},a[i].onfocus=function(){highlight(this,4)}):a[i].className.match("addr")||a[i].className.match("other")?a[i].onfocus=function(){highlight(this,3)}:a[i].onfocus=function(){highlight(this,2)}}function highlight(a,b){if(2==b)var c=a.parentNode.parentNode;if(3==b)var c=a.parentNode.parentNode.parentNode;if(4==b)var c=a.parentNode.parentNode.parentNode.parentNode;addClassName(c,"focused",!0);var d=getElementsByClassName(document,"*","focused");for(i=0;i<d.length;i++)d[i]!=c&&removeClassName(d[i],"focused")}function ifInstructs(){var a=document.getElementById("public");if(a){removeClassName(a,"noI");""==getElementsByClassName(document,"*","instruct")&&addClassName(a,"noI",!0),a.offsetWidth<=450&&addClassName(a,"altInstruct",!0)}}function showRangeCounters(){for(counters=getElementsByClassName(document,"em","currently"),i=0;i<counters.length;i++)counters[i].style.display="inline"}function validateRange(a,b){if(document.getElementById("rangeUsedMsg"+a)){var c=document.getElementById("Field"+a),d=document.getElementById("rangeUsedMsg"+a);switch(b){case"character":d.innerHTML=c.value.length;break;case"word":var e=c.value;e=e.replace(/\n/g," ");var f=e.split(" "),g=0;for(i=0;i<f.length;i++)""!=f[i].replace(/\s+$/,"")&&g++;d.innerHTML=g;break;case"digit":d.innerHTML=c.value.length}}}function getElementsByClassName(a,b,c){var d="*"==b&&a.all?a.all:a.getElementsByTagName(b),e=new Array;c=c.replace(/\-/g,"\\-");for(var f,g=new RegExp("(^|\\s)"+c+"(\\s|$)"),h=0;h<d.length;h++)f=d[h],g.test(f.className)&&e.push(f);return e}function addClassName(a,b,c){if(a.className){var d=a.className.split(" ");if(c)for(var e=b.toUpperCase(),f=0;f<d.length;f++)d[f].toUpperCase()==e&&(d.splice(f,1),f--);d[d.length]=b,a.className=d.join(" ")}else a.className=b}function removeClassName(a,b){if(a.className){for(var c=a.className.split(" "),d=b.toUpperCase(),e=0;e<c.length;e++)c[e].toUpperCase()==d&&(c.splice(e,1),e--);a.className=c.join(" ")}}function addEvent(a,b,c){a.attachEvent?(a["e"+b+c]=c,a[b+c]=function(){a["e"+b+c](window.event)},a.attachEvent("on"+b,a[b+c])):a.addEventListener(b,c,!1)}!function(a){a("#accordion > .closed > .collapse").hide();a(".accordion-heading").keypress(function(b){if(13==b.which||9==b.which){var c=a(this).find(".indicator:first"),d=a(this).siblings(".collapse"),e=a(this).parent();"false"==c.attr("aria-expanded")?(c.attr("aria-expanded","true"),c.text("Expanded"),c.css({position:"absolute",clip:"rect(1px, 1px, 1px, 1px)"}),d.show().attr("aria-hidden","false"),e.removeClass("closed").addClass("open")):"true"==c.attr("aria-expanded")&&(c.attr("aria-expanded","false"),c.text("Collapsed"),c.css({position:"absolute",clip:"rect(1px, 1px, 1px, 1px)"}),d.hide().attr("aria-hidden","true"),e.removeClass("open").addClass("closed"))}}),a(".accordion-heading").click(function(){var b=a(this).find(".indicator:first"),c=a(this).siblings(".collapse"),d=a(this).parent();"false"==b.attr("aria-expanded")?(d.removeClass("closed").addClass("open"),b.attr("aria-expanded","true"),b.text("Expanded"),b.css({position:"absolute",clip:"rect(1px, 1px, 1px, 1px)"}),c.show().attr("aria-hidden","false")):"true"==b.attr("aria-expanded")&&(d.removeClass("open").addClass("closed"),b.attr("aria-expanded","false"),b.text("Collapsed"),b.css({position:"absolute",clip:"rect(1px, 1px, 1px, 1px)"}),c.hide().attr("aria-hidden","true"))})}(jQuery),jQuery(document).ready(function(a){if(a.isFunction(a.fn.coverVid)){var b=window.location.pathname,c=window.location.search,d=b.match(/veterans/),e=c.match(/preview/);(Array.isArray(d)||Array.isArray(e))&&a("#waving-flag-video").on("canplay",function(){a(".covervid-video").coverVid(854,480),document.getElementById("waving-flag-video").play(),a("#waving-flag-video").fadeIn(1e3),_.delay(function(){a(".covervid-video").fadeOut(2e3)},6e3)})}}),function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){function b(b){var c={},d=/^jQuery\d+$/;return a.each(b.attributes,function(a,b){b.specified&&!d.test(b.name)&&(c[b.name]=b.value)}),c}function c(b,c){var d=this,f=a(d);if(d.value==f.attr("placeholder")&&f.hasClass(m.customClass))if(f.data("placeholder-password")){if(f=f.hide().nextAll('input[type="password"]:first').show().attr("id",f.removeAttr("id").data("placeholder-id")),!0===b)return f[0].value=c;f.focus()}else d.value="",f.removeClass(m.customClass),d==e()&&d.select()}function d(){var d,e=this,f=a(e),g=this.id;if(""===e.value){if("password"===e.type){if(!f.data("placeholder-textinput")){try{d=f.clone().attr({type:"text"})}catch(c){d=a("<input>").attr(a.extend(b(this),{type:"text"}))}d.removeAttr("name").data({"placeholder-password":f,"placeholder-id":g}).bind("focus.placeholder",c),f.data({"placeholder-textinput":d,"placeholder-id":g}).before(d)}f=f.removeAttr("id").hide().prevAll('input[type="text"]:first').attr("id",g).show()}f.addClass(m.customClass),f[0].value=f.attr("placeholder")}else f.removeClass(m.customClass)}function e(){try{return document.activeElement}catch(a){}}var f,g,h="[object OperaMini]"==Object.prototype.toString.call(window.operamini),i="placeholder"in document.createElement("input")&&!h,j="placeholder"in document.createElement("textarea")&&!h,k=a.valHooks,l=a.propHooks;if(i&&j)g=a.fn.placeholder=function(){return this},g.input=g.textarea=!0;else{var m={};g=a.fn.placeholder=function(b){var e={customClass:"placeholder"};m=a.extend({},e,b);var f=this;return f.filter((i?"textarea":":input")+"[placeholder]").not("."+m.customClass).bind({"focus.placeholder":c,"blur.placeholder":d}).data("placeholder-enabled",!0).trigger("blur.placeholder"),f},g.input=i,g.textarea=j,f={get:function(b){var c=a(b),d=c.data("placeholder-password");return d?d[0].value:c.data("placeholder-enabled")&&c.hasClass(m.customClass)?"":b.value},set:function(b,f){var g=a(b),h=g.data("placeholder-password");return h?h[0].value=f:g.data("placeholder-enabled")?(""===f?(b.value=f,b!=e()&&d.call(b)):g.hasClass(m.customClass)?c.call(b,!0,f)||(b.value=f):b.value=f,g):b.value=f}},i||(k.input=f,l.value=f),j||(k.textarea=f,l.value=f),a(function(){a(document).delegate("form","submit.placeholder",function(){var b=a("."+m.customClass,this).each(c);setTimeout(function(){b.each(d)},10)})}),a(window).bind("beforeunload.placeholder",function(){a("."+m.customClass).each(function(){this.value=""})})}}),$("input, textarea").placeholder(),$(document).ready(function(){document.getElementById("flag").offsetWidth<=0&&$("body").addClass("no-images")});var AlumniGoogleAnalyticsTracking=function(a){return{init:function(){!function(a,b,c,d,e,f,g){a.GoogleAnalyticsObject=e,a[e]=a[e]||function(){(a[e].q=a[e].q||[]).push(arguments)},a[e].l=1*new Date,f=b.createElement(c),g=b.getElementsByTagName(c)[0],f.async=1,f.src=d,g.parentNode.insertBefore(f,g)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-1576494-1","auto"),ga("send","pageview")},podcastPlay:function(a){ga("send","event","Media Action","Podcast Play",a)},bindAnalyticsEvents:function(){a(document).ready(function(){a("audio").bind("play",function(){AlumniGoogleAnalyticsTracking.podcastPlay(this.currentSrc)})})}}}(jQuery);AlumniGoogleAnalyticsTracking.init(),AlumniGoogleAnalyticsTracking.bindAnalyticsEvents(),function(a){var b=a(".tours-form-print"),c=a(".tours-form-enews"),d=a(".tours-address-fields"),e=a(".tours-email-field"),f=a("#tours-signup .submit-button");b.click(function(){b.is(":checked")?(d.show(),f.css("display","inline-block")):(!1===c.prop("checked")&&f.hide(),d.hide())}),c.click(function(){c.is(":checked")?(e.show(),f.css("display","inline-block")):(!1===b.prop("checked")&&f.hide(),e.hide())}),f.click(function(){a("#form13").submit()})}(jQuery),function(a){var b=a(".uw-thinstrip .uw-thin-links li:nth-child(4) a");a(".uw-thinstrip .uw-thin-links li a").not(b).hover(function(){b.css("color","#FFFFFF")},function(){b.css("color","#b7a57a")})}(jQuery),addEvent(window,"load",initForm);var highlight_array=new Array;