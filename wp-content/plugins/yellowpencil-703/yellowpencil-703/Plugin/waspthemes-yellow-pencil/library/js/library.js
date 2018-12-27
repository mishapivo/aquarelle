!function($){"use strict";function is_yellow_pencil(){return!!$("body").hasClass("yp-yellow-pencil")||$(document).find(".yp-select-bar").length>0}function get_all_selectors(e){return""!=e&&(e.split("{").length==e.split("}").length&&array_cleaner((e=e.toString().replace(/\}\,/g,"}")).replace(/\{(.*?)\}/g,"|BREAK|").split("|BREAK|")))}function get_minimized_css(e,t){return e=e.replace(/(\r\n|\n|\r)/g,"").replace(/\t/g,""),e=e.replace(/\/\*(.*?)\*\//g,""),e=e.replace(/\}\s+\}/g,"}}").replace(/\s+\{/g,"{"),e=e.replace(/\s+\}/g,"}").replace(/\{\s+/g,"{"),e=filter_bad_queries(e),!0===t&&(e=e.replace(/@media(.*?)\}\}/g,"").replace(/@?([a-zA-Z0-9_-]+)?keyframes(.*?)\}\}/g,"").replace(/@font-face(.*?)\}\}/g,"").replace(/@import(.*?)\;/g,"").replace(/@charset(.*?)\;/g,"")),e}function filter_bad_queries(e){return e.replace(/[\u2018\u2019\u201A\u201B\u2032\u2035\u201C\u201D]/g,"")}function array_cleaner(e){var t=[];return $.each(e,function(e,l){-1===$.inArray(l,t)&&t.push(l)}),t}function get_css_data(){if(0===$("style#yellow-pencil,style#yp-live-preview,link#yp-custom-css").length)return!1;var e="";return 0==window.externalCSS?($("style#yellow-pencil").length>0&&(e+=$("style#yellow-pencil").html()),$("style#yp-live-preview").length>0&&(e+=$("style#yp-live-preview").html())):(e=window.externalData,$("style#yp-live-preview").length>0&&(e+=$("style#yp-live-preview").html())),0==window.cacheCSS&&(window.cacheCSS=e),window.cacheCSS}function get_matches_selectors(e){var t=get_css_data(),l=get_all_selectors(get_minimized_css(t,!0)),r=[];$.each(l,function(t,l){if(l.match(/\:|\}|\{|\;/))return!0;l.indexOf(e)>=0&&""!=l&&r.push(l.replace(e,""))});var a=get_minimized_css(t,!1).match(/@media(.*?){(.*?)}/g),n="",i="",s="";return $.each(a,function(t,l){i=l.match(/@media(.*?){/g).toString().replace(/\{/g,"").replace(/@media /g,"").replace(/@media/g,""),n=l.toString().replace(/@media(.*?){/g,""),s=get_all_selectors(n),$.each(s,function(t,l){if(l.match(/\:|\}|\{|\;/))return!0;window.matchMedia(i).matches&&l.indexOf(e)>=0&&""!=l&&r.push(l.replace(e,""))})}),r.toString()}function click_detect(){$(get_matches_selectors(".yp_click")).each(function(){$(this).click(function(){var e=$(this);e.addClass("yp_click"),e.one("webkitAnimationEnd oanimationend msAnimationEnd animationend",function(){e.removeClass("yp_click")})})})}function hover_detect(){$(get_matches_selectors(".yp_hover")).each(function(){$(this).mouseenter(function(){var e=$(this);e.addClass("yp_hover"),e.one("webkitAnimationEnd oanimationend msAnimationEnd animationend",function(){e.removeClass("yp_hover")})})})}function focus_detect(){$(get_matches_selectors(".yp_focus")).each(function(){$(this).focus(function(){$(this).addClass("yp_focus")}).blur(function(){$(this).removeClass("yp_focus")})})}function onscreen_detect(){$(get_matches_selectors(".yp_onscreen")).each(function(){$(this).visible(!0)&&$(this).addClass("yp_onscreen")})}function cssEngine(rule,scriptMarkup,defaults,data){data=get_minimized_css(data,!0);var matches=data.match(new RegExp(rule+"(s+)?:","gi"));if(!matches)return!1;if(matches.length>0)for(var ix=0;ix<matches.length;ix++){var output=scriptMarkup,selector="",ruleData=data.match(new RegExp("}(.*){(.*)"+rule+"(s+)?:(.*);"));if(data=data.replaceLast(rule+":","processed-rule:"),null==ruleData)return!0;if(-1!=(selector=$.trim(ruleData[1])).indexOf("}")&&(selector=$.trim(ruleData[1].split("}")[ruleData[1].split("}").length-1])),selector.indexOf(":")>=0&&-1==selector.indexOf(":nth"))return!0;var value=$.trim(ruleData[4].split(";")[0]),otherProperties=ruleData[4];-1!=ruleData[4].indexOf("}")&&(otherProperties=ruleData[4].split("}")[0]);for(var allRules=(ruleData[2]+otherProperties).replace(value,"").split(";"),allRulesArray=[],item,ruleName,i=0;i<allRules.length;i++)null!=(item=$.trim(allRules[i]))&&""!=item&&","!=item&&void 0!=item&&allRulesArray.push(allRules[i]);if(allRules=allRulesArray,void 0!=defaults)for(var e=0;e<Object.keys(defaults).length;e++)-1==allRules.join(",").indexOf(Object.keys(defaults)[e]+":")&&allRules.push(Object.keys(defaults)[e]+":"+defaults[Object.keys(defaults)[e]]);for(var s=0;s<allRules.length;s++)ruleName=allRules[s].replace(/\"\)*$/,"").split(":")[0],output=output.replace(ruleName,allRules[s].replace(/\"\)*$/,"").split(":")[1]);if(output=output.replace(/\$selector/g,selector),output=output.replace(/\$value/g,value),output=-1!=rule.indexOf("jquery-")?output.replace(/\$rule/g,rule.split("-")[1]):output.replace(/\$rule/g,rule),output=output.replace(/\$self/g,"$('"+selector+"')"),output=output.replace(/undefined/g,"0"),"none"!=value&&"0"!=value)if(is_yellow_pencil()){var ifrm=$("#iframe")[0],iwind=ifrm.contentWindow;iwind.eval("(function($){"+output+"}(jQuery));")}else eval(output)}}function customRules(e){var t=get_css_data();0!=t&&(e+=t),cssEngine("background-parallax","$self.simple_parallax({speed: background-parallax-speed, x: background-parallax-x});",{"background-parallax-speed":"1","background-parallax-x":"50"},e="#yellow-pencil{-yp-engine:true;}"+e),is_yellow_pencil()||($(window).resize(function(){onscreen_detect()}),$(document).ready(function(){onscreen_detect(),click_detect(),hover_detect(),focus_detect()}),$(document).scroll(function(){onscreen_detect()}))}if(function(e){e.fn.simple_parallax=function(t){var l={speed:1,x:50},r=e.extend(l,t);return this.each(function(){var t=e(this);if("none"==t.css("background-image")||1==t.hasClass("yp-parallax-disabled"))return!1;r.speed<1&&(r.speed=1);var l=-e(window).scrollTop()/10*r.speed,a=r.x+"% "+l+"px";t.css({backgroundPosition:a}),e(window).scroll(function(){if("none"==t.css("background-image")||1==t.hasClass("yp-parallax-disabled"))return!1;r.speed<1&&(r.speed=1);var l=-e(window).scrollTop()/10*r.speed,a=r.x+"% "+l+"px";t.css({backgroundPosition:a})})})}}(jQuery),function(e){var t=e(window);e.fn.visible=function(e,l,r){if(!(this.length<1)){var a=this.length>1?this.eq(0):this,n=a.get(0),i=t.width(),s=t.height(),r=r||"both",c=!0!==l||n.offsetWidth*n.offsetHeight;if("function"==typeof n.getBoundingClientRect){var o=n.getBoundingClientRect(),u=o.top>=0&&o.top<s,p=o.bottom>0&&o.bottom<=s,d=o.left>=0&&o.left<i,f=o.right>0&&o.right<=i,h=e?u||p:u&&p,g=e?d||f:d&&f;if("both"===r)return c&&h&&g;if("vertical"===r)return c&&h;if("horizontal"===r)return c&&g}else{var m=t.scrollTop(),_=m+s,v=t.scrollLeft(),y=v+i,w=a.offset(),$=w.top,x=$+a.height(),b=w.left,k=b+a.width(),R=!0===e?x:$,C=!0===e?$:x,S=!0===e?k:b,D=!0===e?b:k;if("both"===r)return!!c&&_>=C&&R>=m&&y>=D&&S>=v;if("vertical"===r)return!!c&&_>=C&&R>=m;if("horizontal"===r)return!!c&&y>=D&&S>=v}}}}(jQuery),String.prototype.reverse=function(){return this.split("").reverse().join("")},String.prototype.replaceLast=function(e,t){return this.reverse().replace(new RegExp(e.reverse()),t.reverse()).reverse()},window.cacheCSS=!1,is_yellow_pencil())$("#iframe").on("load",function(){customRules("")});else if($("link#yp-custom-css").length>0){window.externalCSS=!0,window.externalData=!0;var href=$("link#yp-custom-css").attr("href");$.when($.get(href)).done(function(e){window.externalData=e,customRules("")})}else window.externalCSS=!1,customRules("")}(jQuery);