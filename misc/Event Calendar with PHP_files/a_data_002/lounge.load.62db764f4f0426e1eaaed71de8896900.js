!function(){"use strict";var a=window.document,b={STYLES:"https://c.disquscdn.com/next/embed/styles/lounge.dbc47866f009f9d6f1556cd58214d9a3.css",RTL_STYLES:"https://c.disquscdn.com/next/embed/styles/lounge_rtl.c7a4fee6da46503e07c9e61415dfd32f.css","lounge/main":"https://c.disquscdn.com/next/embed/lounge.bundle.9afa89eebe6bbc95928fca003dbc8884.js","remote/config":"https://disqus.com/next/config.js","common/vendor_extensions/highlight":"https://c.disquscdn.com/next/embed/highlight.6fbf348532f299e045c254c49c4dbedf.js"};window.require={baseUrl:"https://c.disquscdn.com/next/current/embed/embed",paths:["lounge/main","remote/config","common/vendor_extensions/highlight"].reduce(function(a,c){return a[c]=b[c].slice(0,-3),a},{})};var c=a.createElement("script");c.onload=function(){require(["common/main"],function(a){a.init("lounge",b)})},c.src="https://c.disquscdn.com/next/embed/common.bundle.f2a270bb37834887ad900431f6cb27eb.js",a.body.appendChild(c);var d=["astarostin-test","hovseptestrealm","disqus-pse-stock-v2"],e=!1;if(d.forEach(function(a){(window.location.hostname===a||window.location.search.includes(a))&&(e=!0)}),e){var f=a.createElement("script");f.src="https://c.disquscdn.com/embedv2/latest/embedv2.js",a.body.appendChild(f)}}();