(function(){function l(a,b,c){var d=Array.prototype.slice.call(arguments,2);return function(){var c=d.slice();c.push.apply(c,arguments);return a.apply(b,c)}}function m(a,b){if(a){var c=Array.prototype.slice.call(arguments,1);try{return a.apply(null,c)}catch(d){return d}}}function n(){return(new Date).getTime()}function aa(a){var b=(parseInt(p.uid,10)||0)+1;return a["spf-key"]||(a["spf-key"]=""+q("uid",b))}
var r={"animation-class":"spf-animate","animation-duration":425,"cache-lifetime":6E5,"cache-max":50,"link-class":"spf-link","nolink-class":"spf-nolink","navigate-limit":20,"navigate-lifetime":864E5,"navigate-requested-callback":null,"navigate-part-received-callback":null,"navigate-part-processed-callback":null,"navigate-received-callback":null,"navigate-processed-callback":null,"navigate-error-callback":null,"prefetch-on-mousedown":!1,"process-async":!1,"request-timeout":0,"script-loading-callback":null,
"style-loading-callback":null,"url-identifier":"?spf=__type__"};function s(a){return t()[a]}function t(a){return!a&&"config"in p?p.config:q("config",a||{})}function q(a,b){return p[a]=b}var p=window._spf_state||{};window._spf_state=p;function u(a){return a.classList?a.classList:a.className&&a.className.match(/\S+/g)||[]}function v(a,b){if(a.classList)return a.classList.contains(b);for(var c=u(a),d=0,e=c.length;d<e;d++)if(c[d]==b)return!0;return!1}function w(a,b){a.classList?a.classList.add(b):v(a,b)||(a.className+=" "+b)}function x(a,b){if(a.classList)a.classList.remove(b);else{for(var c=u(a),d=[],e=0,f=c.length;e<f;e++)c[e]!=b&&d.push(c[e]);a.className=d.join(" ")}};function ba(a){var b,c=a.parentNode;if(c&&11!=c.nodeType)if(a.removeNode)a.removeNode(!1);else{for(;b=a.firstChild;)c.insertBefore(b,a);c.removeChild(a)}}function z(a,b,c){for(;a;){if(b(a))return a;if(c&&a==c)break;a=a.parentNode}return null}function ca(a,b){var c=a||"",d=document,e=d.createElement("iframe");e.id=c;e.src='javascript:""';e.style.display="none";b&&(e.onload=l(b,null,e));d.body.appendChild(e);return e}var da="Microsoft Internet Explorer"==navigator.appName;function A(a,b,c){B(!0,a,b,c)}function B(a,b,c,d){if(b||c){b=b||window.location.href;c=c||{};var e=n();q("history-timestamp",e);c["spf-timestamp"]=e;a?window.history.replaceState(c,"",b):window.history.pushState(c,"",b);q("history-url",b);d&&(a=p["history-callback"])&&a(b,c)}}
function C(a){var b=window.location.href;if(a.state){a=a.state;var c=a["spf-timestamp"];b==p["history-url"]?(q("history-timestamp",c),window.history.replaceState(a,"",b)):(a["spf-back"]=c<parseInt(p["history-timestamp"],10),q("history-timestamp",c),q("history-url",b),(c=p["history-callback"])&&c(b,a))}};var D=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^\s+|\s+$/g,"")};function E(a){for(var b=0,c=0,d=a.length;c<d;++c)b=31*b+a.charCodeAt(c),b%=4294967296;return b};function F(a,b,c){var d=G[a];return a&&b?(d||(d=G[a]={items:[],j:0,m:1}),d.items.push({D:b,C:c||0})):d&&d.items.length||0}function H(a,b){var c=G[a];if(c){var d=0<c.j;0<c.m&&(b||!d)&&I(a,b)}}function J(a){(a=G[a])&&a.m--}function K(a,b){var c=G[a];c&&(c.m++,H(a,b))}function ea(a){var b=G[a];b&&(clearTimeout(b.j),delete G[a])}
function I(a,b){var c=G[a];if(c&&(clearTimeout(c.j),c.j=0,0<c.m)){var d=c.items.shift();if(d){var e=l(I,null,a,b),e=l(function(a,b){a();b()},null,d.D,e);b?e():c.j=setTimeout(e,d.C)}}}var G={};function fa(){var a=L(),b;for(b in a)ga(a[b])||delete a[b]}function ga(a){if(!(a&&"data"in a))return!1;var b=a.life,b=isNaN(b)?Infinity:b,c=n()-a.time,d=parseInt(s("cache-max"),10),d=isNaN(d)?Infinity:d;a=(parseInt(p["cache-counter"],10)||0)-a.count;return c<b&&a<d}function L(){return"cache-storage"in p?p["cache-storage"]:q("cache-storage",{})};function ha(a,b,c,d){var e=d||{},f=!1,g=0,h,k=new XMLHttpRequest;k.open(a,b,!0);k.timing={};var y=k.abort;k.abort=function(){clearTimeout(h);k.onreadystatechange=null;y.call(k)};k.onreadystatechange=function(){var a=k.timing;2==k.readyState?(a.responseStart=a.responseStart||n(),f=-1<(k.getResponseHeader("Transfer-Encoding")||"").toLowerCase().indexOf("chunked"),e.u&&e.u(k)):3==k.readyState?f&&e.k&&(a=k.responseText.substring(g),g=k.responseText.length,e.k(k,a)):4==k.readyState&&(a.responseEnd=a.responseEnd||
n(),f&&e.k&&k.responseText.length>g&&(a=k.responseText.substring(g),g=k.responseText.length,e.k(k,a)),clearTimeout(h),e.t&&e.t(k))};a="POST"==a;if(e.headers)for(var M in e.headers)k.setRequestHeader(M,e.headers[M]),"content-type"==M.toLowerCase()&&(a=!1);a&&k.setRequestHeader("Content-Type","application/x-www-form-urlencoded");0<e.w&&(h=setTimeout(function(){k.abort();e.v&&e.v(k)},e.w));k.timing.fetchStart=n();k.send(c);return k};function N(a){return a.dataset?a.dataset.loaded:a.getAttribute("data-"+"loaded".replace(/([A-Z])/g,"-$1").toLowerCase())}function ia(a){a.dataset?a.dataset.loaded="true":a.setAttribute("data-"+"loaded".replace(/([A-Z])/g,"-$1").toLowerCase(),"true")};function ja(a,b){if(a&&b){var c=O();a in c||(c[a]=[]);c[a].push(b)}}function ka(a,b){var c=O();if(a in c)for(var d=Array.prototype.slice.call(arguments,1),e=0,f=c[a].length;e<f;e++)c[a][e]&&c[a][e].apply(null,d)}function P(a){var b=O();a?a in b&&delete b[a]:O({})}function O(a){return!a&&"pubsub-subs"in p?p["pubsub-subs"]:q("pubsub-subs",a||{})};function la(a,b,c,d){if("js"!=a&&"css"!=a||!b)return null;var e=a+"-"+E(b);d=d||"";var f=document.getElementById(e),g=f&&N(f),h=f&&!g;if(g)return c&&c(),f;c&&ja(e,c);if(h)return f;c="js"==a;var k=d?document.querySelectorAll?document.querySelectorAll((c?"script":"link")+"."+d):[]:[];m(s(c?"script-loading-callback":"style-loading-callback"),b,d);return f=ma(a,b,e,d,function(){N(f)||(ia(f),na(k),ka(e),P(e))})}
function ma(a,b,c,d,e,f){if("js"!=a&&"css"!=a||!b)return null;var g=document.createElement("js"==a?"script":"link");g.id=c;g.className=d;"css"==a&&(g.rel="stylesheet");g.onload=function(){e&&setTimeout(e,0)};g.onreadystatechange=function(){switch(g.readyState){case "loaded":case "complete":g.onload()}};"js"==a?g.src=b:g.href=b;b=f||document;b=b.getElementsByTagName("head")[0]||b.body;"js"==a?b.insertBefore(g,b.firstChild):b.appendChild(g);return g}
function oa(a,b){if("js"==a||"css"==a){var c=document.getElementById(a+"-"+E(b));c&&na([c])}}function na(a){for(var b=0,c=a.length;b<c;b++)P(a[b].id),a[b].parentNode.removeChild(a[b])}function pa(a,b){if("js"==a||"css"==a){var c=a+"-"+E(b),d=document.getElementById(c);if(!d){var e=a+"-prefetch",f=document.getElementById(e);if(f){if(d=f.contentWindow.document.getElementById(c))return}else f=ca(e,function(a){ia(a);H(e,!0)});N(f)?qa(f,a,b,c):F(e,l(qa,null,f,a,b,c))}}}
function qa(a,b,c,d){a=a.contentWindow.document;"js"==b?(da?(b=a.createElement("script"),b.src=c):(b=a.createElement("object"),b.data=c),b.id=d,a.body.appendChild(b)):ma(b,c,d,"",null,a)};function ra(a,b,c){return la("js",a,b,c)}function sa(a){pa("js",a)}function Q(a,b){if(0>=a.a.length)b&&b();else{var c=-1,d=function(){c++;if(c<a.a.length){var e=a.a[c];if(e.url)ra(e.url,d,e.name);else if(e.text){var f=e.text,e=d;if(window.execScript)window.execScript(f,"JavaScript");else{var g=document.createElement("script");g.appendChild(document.createTextNode(f));f=document.getElementsByTagName("head")[0]||document.body;f.insertBefore(g,f.firstChild)}e&&e()}else d()}else b&&b()};d()}}
function ta(a){if(!(0>=a.a.length))for(var b=0,c=a.a.length;b<c;b++){var d=a.a[b];d.url&&sa(d.url)}}function R(a){var b=new ua;if(!a)return b;a=a.replace(va,function(a,d,e){a=(a=d.match(wa))?a[1]:"";d=(d=d.match(xa))?d[1]:"";b.a.push({url:a,text:e,name:d});return""});b.h=a;return b}function ua(){this.h="";this.a=[]}var va=/\x3cscript([\s\S]*?)\x3e([\s\S]*?)\x3c\/script\x3e/ig,wa=/src="([\S]+)"/,xa=/class="([\S]+)"/;function ya(a,b,c){return la("css",a,b,c)}function za(a){pa("css",a)}function Aa(a){var b=new Ba;if(!a)return b;a=a.replace(Ca,function(a,d){if(-1!=d.indexOf('rel="stylesheet"')){var e=d.match(Da),e=e?e[1]:"",f=d.match(Ea),f=f?f[1]:"";b.a.push({url:e,text:"",name:f});return""}return a});a=a.replace(Fa,function(a,d,e){b.a.push({url:"",text:e,name:""});return""});b.h=a;return b}function Ba(){this.h="";this.a=[]}
var Ca=/\x3clink([\s\S]*?)\x3e/ig,Fa=/\x3cstyle([\s\S]*?)\x3e([\s\S]*?)\x3c\/style/ig,Da=/href="([\S]+)"/,Ea=/class="([\S]+)"/;function S(a){var b=document.createElement("a");b.href=a;return b.href};function Ga(a,b,c){if(b){b=[];var d,e=0;c&&(a+="\r\n");var f=a.indexOf("[\r\n",e);for(-1<f&&(e=f+3);-1<(f=a.indexOf(",\r\n",e));)d=D(a.substring(e,f)),e=f+3,d&&b.push(JSON.parse(d));f=a.indexOf("]\r\n",e);-1<f&&(d=D(a.substring(e,f)),e=f+3,d&&b.push(JSON.parse(d)));d="";if(a.length>e){d=a.substring(e);if(a=c)a=d.length-2,a=0<=a&&d.indexOf("\r\n",a)==a;a&&(d=d.substring(0,d.length-2))}return{i:b,b:d}}b=JSON.parse(a);b="number"==typeof b.length?b:[b];return{i:b,b:""}}
function T(a,b,c,d){var e="process "+S(a),f=!s("process-async"),g;g=0;b.timing||(b.timing={});b.title&&(document.title=b.title);b.css&&(g=l(function(a,b){var c=Aa(a);if(!(0>=c.a.length))for(var d=0,e=c.a.length;d<e;d++){var f=c.a[d];if(f.url)ya(f.url,null,f.name);else if(f.text){var f=f.text,g=document.createElement("style");(document.getElementsByTagName("head")[0]||document.body).appendChild(g);"styleSheet"in g?g.styleSheet.cssText=f:g.appendChild(document.createTextNode(f))}}b.spfProcessCss=n()},
null,b.css,b.timing),g=F(e,g));b.attr&&(g=l(function(a,b){for(var c in a){var d=document.getElementById(c);if(d){var e=a[c],f=void 0;for(f in e){var g=e[f];"class"==f?d.className=g:"style"==f?d.style.cssText=g:d.setAttribute(f,g)}}}b.spfProcessAttr=n()},null,b.attr,b.timing),g=F(e,g));var h=b.html||{},k=g,y;for(y in h)g=l(function(a,b){var c=document.getElementById(a);if(c){var g=R(b),h=s("animation-class");if(Ha&&v(c,h)){J(e);var k=aa(c);H(k,!0);g={r:g,reverse:!!d,d:null,f:null,e:c,A:h+"-old",B:h+
"-new",s:d?h+"-reverse-start":h+"-forward-start",q:d?h+"-reverse-end":h+"-forward-end"};c=l(function(a){w(a.e,a.s);a.d=document.createElement("div");a.d.className=a.A;var b=a.e,c=a.d;if(c){for(var d;d=b.firstChild;)c.appendChild(d);b.appendChild(c)}a.f=document.createElement("div");a.f.className=a.B;a.f.innerHTML=a.r.h;a.reverse?(b=a.d,b.parentNode.insertBefore(a.f,b)):(b=a.d,b.parentNode.insertBefore(a.f,b.nextSibling))},null,g);F(k,c,0);c=l(function(a){x(a.e,a.s);w(a.e,a.q)},null,g);F(k,c,0);c=
l(function(a){a.e.removeChild(a.d);x(a.e,a.q);ba(a.f);J(k);Q(a.r,function(){K(k)})},null,g);F(k,c,parseInt(s("animation-duration"),10));c=l(function(a,b){K(b)},null,g,e);F(k,c);H(k)}else c.innerHTML=g.h,J(e),Q(g,function(){K(e,f)})}},null,y,h[y],b.timing),g=F(e,g);h=g-k;b.js?(g=l(function(a,b,c){c&&(b.spfProcessHtml=n());J(e);Q(R(a),function(){b.spfProcessJs=n();K(e,f)})},null,b.js,b.timing,h),g=F(e,g)):h&&(g=l(function(a){a.spfProcessHtml=n()},null,b.timing),g=F(e,g));c&&(g=F(e,l(c,null,a,b)));H(e,
f)}function Ia(a,b,c){var d="preprocess "+S(a),e;b.css&&(e=l(function(a){a=Aa(a);if(!(0>=a.a.length))for(var b=0,c=a.a.length;b<c;b++){var d=a.a[b];d.url&&za(d.url)}},null,b.css),F(d,e));var f=b.html||{},g;for(g in f)f[g]&&(e=l(function(a,b){ta(R(b))},null,g,f[g]),F(d,e));b.js&&(e=l(function(a){ta(R(a))},null,b.js),F(d,e));c&&F(d,l(c,null,a,b));H(d)}
var Ha=function(){var a=document.createElement("div");if("transition"in a.style)return!0;for(var b=["webkit","Moz","Ms","O","Khtml"],c=0,d=b.length;c<d;c++)if(b[c]+"Transition"in a.style)return!0;return!1}();function U(a,b){var c=b||{};c.method=((c.method||"GET")+"").toUpperCase();c.type=c.type||"request";var d=S(a),e;e=d;var f=c.type,g=s("url-identifier")||"";g&&(g=g.replace("__type__",f||""),e=0==g.lastIndexOf("?",0)&&-1!=e.indexOf("?")?e+g.replace("?","&"):e+g);f={};f.startTime=c.startTime||n();f.fetchStart=f.startTime;n:{g=L();if(d in g){g=g[d];if(ga(g)){d=g.data;break n}g=L();d in g&&delete g[d]}d=void 0}if(d)return c=l(Ja,null,a,c,f,d),setTimeout(c,0),null;d={"X-SPF-Request":c.type};c.p&&(d["X-SPF-Referer"]=
c.p);var h={o:!1,b:"",complete:[]},g=l(Ka,null,a,h),k=l(La,null,a,c,h),f=l(Ma,null,a,c,f,h),f={headers:d,w:s("request-timeout"),u:g,k:k,t:f,v:f};return"POST"==c.method?ha("POST",e,c.n,f):ha("GET",e,null,f)}function Ja(a,b,c,d){c.responseStart=c.responseEnd=n();"navigate"==b.type&&(c.navigationStart=c.startTime);if(b.c&&"multipart"==d.type)for(var e=d.parts,f=0;f<e.length;f++)b.c(a,e[f]);Na(a,b,c,d,!1)}
function Ka(a,b,c){a=c.getResponseHeader("X-SPF-Response-Type")||"";b.o=-1!=a.toLowerCase().indexOf("multipart")}function La(a,b,c,d,e,f){if(c.o){e=c.b+e;var g;try{g=Ga(e,!0,f)}catch(h){d.abort();b.g&&b.g(a,h);return}if(b.c)for(d=0;d<g.i.length;d++)b.c(a,g.i[d]);c.complete=c.complete.concat(g.i);c.b=g.b}}
function Ma(a,b,c,d,e){if(e.timing)for(var f in e.timing)c[f]=e.timing[f];"navigate"==b.type&&(c.navigationStart=c.startTime);var g;d.complete.length&&(d.b=D(d.b),d.b?(f=d.complete.length,La(a,b,d,e,"",!0),d.complete.length>f&&(g=d.complete)):g=d.complete);if(!g){try{g=Ga(e.responseText).i}catch(h){b.g&&b.g(a,h);return}if(b.c&&1<g.length)for(d=d.complete.length;d<g.length;d++)b.c(a,g[d])}Na(a,b,c,1<g.length?{parts:g,type:"multipart"}:1==g.length?g[0]:{},!0)}
function Na(a,b,c,d,e){if(e&&"POST"!=b.method){e=S(a);var f=s("cache-lifetime"),f=parseInt(f,10),g=parseInt(s("cache-max"),10);if(!(0>=f||0>=g)){var g=L(),h=(parseInt(p["cache-counter"],10)||0)+1;q("cache-counter",h);g[e]={data:d,life:f,time:n(),count:h};setTimeout(fa,1E3)}}d.timing=c;b.l&&b.l(a,d)};function Oa(a){if(a.metaKey||a.altKey||a.ctrlKey||a.shiftKey||0<a.button)return null;var b=z(a.target,function(a){return v(a,s("link-class"))});return!b||s("nolink-class")&&z(a.target,function(a){return v(a,s("nolink-class"))})?null:(a=z(a.target,function(a){return a.href&&"img"!=a.tagName.toLowerCase()},b))?a.href:null}function Pa(a){var b=Oa(a);null!==b&&(b&&b!=window.location.href&&V(b),a.preventDefault())}function Qa(a){var b=Oa(a);b&&b!=window.location.href&&setTimeout(function(){W(b)},0)}
function Ra(a,b){V(a,null,b&&b["spf-referer"],!0,!(!b||!b["spf-back"]))}
function V(a,b,c,d,e){b=b||{};if(X("navigate-requested-callback",a))if(p["nav-init"]){var f=(parseInt(p["nav-counter"],10)||0)+1,g=parseInt(s("navigate-limit"),10),g=isNaN(g)?Infinity:g;if(f>g)Y(a);else if(q("nav-counter",f),f=n()-parseInt(p["nav-time"],10),g=parseInt(s("navigate-lifetime"),10),g=isNaN(g)?Infinity:g,f>g)Y(a);else{q("nav-time",n());c=c||window.location.href;q("nav-referer",c);Z();Sa(a);var f="preprocess "+S(a),h;for(h in G)f!=h&&0==h.lastIndexOf("preprocess",0)&&ea(h);h=$()[a];q("nav-request",
h);q("nav-promote",null);h&&4!=h.readyState?(e=!!d,h=S(a),d="preprocess "+h,h="promote "+h,q("nav-promote",a),ea(d),H(h,!0),e||(b=l(Ta,null,b),Ua(a,c,b))):(d=!!d,f=!!e,e=l(Ta,null,b),h=l(Va,null,b,f),f=l(Wa,null,b,c,f),b=U(a,{method:b.method,c:h,g:e,l:f,n:b.postData,type:"navigate",p:c,startTime:p["nav-time"]}),q("nav-request",b),d||Ua(a,c,e))}}else Y(a);else Y(a)}function Ua(a,b,c){try{B(!1,a,{"spf-referer":b},void 0)}catch(d){Z(),c(a,d)}}
function Ta(a,b,c){q("nav-request",null);X(a.onError,b,c)&&X("navigate-error-callback",b,c)&&Y(b)}function Va(a,b,c,d){X("navigate-part-received-callback",c,d)?T(c,d,function(){X(a.onPart,c,d)?X("navigate-part-processed-callback",c,d)||Y(c):Y(c)},b):Y(c)}function Wa(a,b,c,d,e){q("nav-request",null);X("navigate-received-callback",d,e)?e.redirect?A(e.redirect,{"spf-referer":b},!0):T(d,"multipart"==e.type?{}:e,function(){X(a.onSuccess,d,e)&&X("navigate-processed-callback",d,e)},c):Y(d)}
function Z(){var a=p["nav-request"];a&&(a.abort(),q("nav-request",null))}function X(a,b){"string"==typeof a&&(a=s(a));var c=Array.prototype.slice.call(arguments,0);c[0]=a;return!1!==m.apply(null,c)}function Y(a){Z();Sa();window.location.href=a}function Xa(a,b){var c=b||{},d=l(Ya,null,!1,c),e=l(Za,null,!1,c),f=l($a,null,!1,c);U(a,{method:c.method,c:e,g:d,l:f,n:c.postData,type:"load"})}
function W(a,b){var c=b||{},d=l(Ya,null,!0,c),e=l(Za,null,!0,c),f=l($a,null,!0,c),c=U(a,{method:c.method,c:e,g:d,l:f,n:c.postData,type:"prefetch"}),d=S(a);$()[d]=c}function Ya(a,b,c,d){X(b.onError,c,d);a&&ab(c)}function Za(a,b,c,d){var e=a?Ia:T;if(a){var f=l(Va,null,b,!1,c,d),g="promote "+S(c);F(g,f);if(p["nav-promote"]==c){H(bb,!0);return}}a&&!p["nav-promote"]!=c||e(c,d,function(){X(b.onPart,c,d)})}
function $a(a,b,c,d){var e=a?W:Xa;if(d.redirect)e(d.redirect,{onSuccess:b.onSuccess,onPart:b.onPart,onError:b.onError});else{if(a){e=window.location.href;p["nav-promote"]==c&&(e=p["nav-referer"]);var e=l(Wa,null,b,e,!1,c,d),f="promote "+S(c);F(f,e);p["nav-promote"]==c&&H(f,!0)}e=a?Ia:T;f="multipart"==d.type?{}:d;a&&!p["nav-promote"]!=c||e(c,f,function(){X(b.onSuccess,c,d)})}}function ab(a){a=S(a);var b=$(),c=b[a];c&&c.abort();delete b[a]}function Sa(a){var b=$(),c;for(c in b)a!=c&&ab(c)}
function $(){return"nav-prefetches"in p?p["nav-prefetches"]:q("nav-prefetches",{})};var bb;
window.spf={init:function(a){var b=!!window.history.pushState;a=a||{};for(var c in r){var d=c,e=c in a?a[c]:r[c];t()[d]=e}b&&(!p["history-init"]&&window.addEventListener&&(c=window.location.href,window.addEventListener("popstate",C,!1),q("history-init",!0),q("history-callback",Ra),q("history-listener",C),q("history-url",c),q("history-timestamp",n()),A(c,{"spf-referer":document.referrer})),!p["nav-init"]&&document.addEventListener&&(document.addEventListener("click",Pa,!1),s("prefetch-on-mousedown")&&(document.addEventListener("mousedown",
Qa,!1),q("prefetch-listener",Qa)),q("nav-init",!0),q("nav-counter",0),q("nav-time",n()),q("nav-listener",Pa)));return b},dispose:function(){window.history.pushState&&(Z(),p["nav-init"]&&(document.removeEventListener&&(document.removeEventListener("click",p["nav-listener"],!1),s("prefetch-on-mousedown")&&document.removeEventListener("mousedown",p["prefetch-listener"],!1)),q("nav-init",!1),q("nav-counter",null),q("nav-time",null),q("nav-listener",null)),p["history-init"]&&(window.removeEventListener&&
window.removeEventListener("popstate",p["history-listener"],!1),q("history-init",!1),q("history-callback",null),q("history-listener",null),q("history-url",null),q("history-timestamp",0)));t({})},navigate:function(a,b){a&&a!=window.location.href&&V(a,b)},load:Xa,process:T,prefetch:W,scripts:{load:ra,unload:function(a){oa("js",a)},ignore:function(a){P("js-"+E(a))},prefetch:sa},styles:{load:ya,unload:function(a){oa("css",a)},ignore:function(a){P("css-"+E(a))},prefetch:za}};})();