(globalThis.TURBOPACK||(globalThis.TURBOPACK=[])).push(["object"==typeof document?document.currentScript:void 0,7670,t=>{"use strict";t.s(["default",0,function(){for(var t,e,o=0,r="",n=arguments.length;o<n;o++)(t=arguments[o])&&(e=function t(e){var o,r,n="";if("string"==typeof e||"number"==typeof e)n+=e;else if("object"==typeof e)if(Array.isArray(e)){var a=e.length;for(o=0;o<a;o++)e[o]&&(r=t(e[o]))&&(n&&(n+=" "),n+=r)}else for(r in e)e[r]&&(n&&(n+=" "),n+=r);return n}(t))&&(r&&(r+=" "),r+=e);return r}])},70319,t=>{"use strict";var e=t.i(71645),o=t.i(7670),r=t=>"number"==typeof t&&!isNaN(t),n=t=>"string"==typeof t||"function"==typeof t?t:null,a=t=>(0,e.isValidElement)(t)||"string"==typeof t||"function"==typeof t||r(t);function i({enter:t,exit:o,appendPosition:r=!1,collapse:n=!0,collapseDuration:a=300}){return function({children:i,position:s,preventExitTransition:l,done:c,nodeRef:f,isIn:u,playToast:d}){let p=r?`${t}--${s}`:t,m=r?`${o}--${s}`:o,h=(0,e.useRef)(0);return(0,e.useLayoutEffect)(()=>{let t=f.current,e=p.split(" "),o=r=>{r.target===f.current&&(d(),t.removeEventListener("animationend",o),t.removeEventListener("animationcancel",o),0===h.current&&"animationcancel"!==r.type&&t.classList.remove(...e))};t.classList.add(...e),t.addEventListener("animationend",o),t.addEventListener("animationcancel",o)},[]),(0,e.useEffect)(()=>{let t=f.current,e=()=>{t.removeEventListener("animationend",e),n?function(t,e,o=300){let{scrollHeight:r,style:n}=t;requestAnimationFrame(()=>{n.minHeight="initial",n.height=r+"px",n.transition=`all ${o}ms`,requestAnimationFrame(()=>{n.height="0",n.padding="0",n.margin="0",setTimeout(e,o)})})}(t,c,a):c()};u||(l?e():(h.current=1,t.className+=` ${m}`,t.addEventListener("animationend",e)))},[u]),e.default.createElement(e.default.Fragment,null,i)}}function s(t,e){return{content:l(t.content,t.props),containerId:t.props.containerId,id:t.props.toastId,theme:t.props.theme,type:t.props.type,data:t.props.data||{},isLoading:t.props.isLoading,icon:t.props.icon,reason:t.removalReason,status:e}}function l(t,o,r=!1){return(0,e.isValidElement)(t)&&"string"!=typeof t.type?(0,e.cloneElement)(t,{closeToast:o.closeToast,toastProps:o,data:o.data,isPaused:r}):"function"==typeof t?t({closeToast:o.closeToast,toastProps:o,data:o.data,isPaused:r}):t}function c({delay:t,isRunning:r,closeToast:n,type:a="default",hide:i,className:s,controlledProgress:l,progress:f,rtl:u,isIn:d,theme:p}){let m=i||l&&0===f,h={animationDuration:`${t}ms`,animationPlayState:r?"running":"paused"};l&&(h.transform=`scaleX(${f})`);let y=(0,o.default)("Toastify__progress-bar",l?"Toastify__progress-bar--controlled":"Toastify__progress-bar--animated",`Toastify__progress-bar-theme--${p}`,`Toastify__progress-bar--${a}`,{"Toastify__progress-bar--rtl":u}),g="function"==typeof s?s({rtl:u,type:a,defaultClassName:y}):(0,o.default)(y,s);return e.default.createElement("div",{className:"Toastify__progress-bar--wrp","data-hidden":m},e.default.createElement("div",{className:`Toastify__progress-bar--bg Toastify__progress-bar-theme--${p} Toastify__progress-bar--${a}`}),e.default.createElement("div",{role:"progressbar","aria-hidden":m?"true":"false","aria-label":"notification timer","aria-valuenow":l?Math.round(100*f):void 0,"aria-valuemin":0,"aria-valuemax":100,className:g,style:h,...{[l&&f>=1?"onTransitionEnd":"onAnimationEnd"]:l&&f<1?null:()=>{d&&n()}}}))}var f=1,u=()=>`${f++}`,d=new Map,p=[],m=new Set,h=t=>m.forEach(e=>e(t));function y(t,e){var o;if(e)return!!(null!=(o=d.get(e))&&o.isToastActive(t));let r=!1;return d.forEach(e=>{e.isToastActive(t)&&(r=!0)}),r}function g(t,e){a(t)&&(d.size>0||p.push({content:t,options:e}),d.forEach(o=>{o.buildToast(t,e)}))}function v(t,e){d.forEach(o=>{null!=e&&null!=e&&e.containerId&&(null==e?void 0:e.containerId)!==o.id||o.toggle(t,null==e?void 0:e.id)})}function b(t,e){return g(t,e),e.toastId}function _(t,e){var o;return{...e,type:e&&e.type||t,toastId:(o=e)&&("string"==typeof o.toastId||r(o.toastId))?o.toastId:u()}}function x(t){return(e,o)=>b(e,_(t,o))}function w(t,e){return b(t,_("default",e))}w.loading=(t,e)=>b(t,_("default",{isLoading:!0,autoClose:!1,closeOnClick:!1,closeButton:!1,draggable:!1,...e})),w.promise=function(t,{pending:e,error:o,success:r},n){let a;e&&(a="string"==typeof e?w.loading(e,n):w.loading(e.render,{...n,...e}));let i={isLoading:null,autoClose:null,closeOnClick:null,closeButton:null,draggable:null},s=(t,e,o)=>{if(null==e)return void w.dismiss(a);let r={type:t,...i,...n,data:o},s="string"==typeof e?{render:e}:e;return a?w.update(a,{...r,...s}):w(s.render,{...r,...s}),o},l="function"==typeof t?t():t;return l.then(t=>s("success",r,t)).catch(t=>s("error",o,t)),l},w.success=x("success"),w.info=x("info"),w.error=x("error"),w.warning=x("warning"),w.warn=w.warning,w.dark=(t,e)=>b(t,_("default",{theme:"dark",...e})),w.dismiss=function(t){!function(t){let e;if(!(d.size>0)){p=p.filter(e=>null!=t&&e.options.toastId!==t);return}if(null==t||"string"==typeof(e=t)||r(e))d.forEach(e=>{e.removeToast(t)});else if(t&&("containerId"in t||"id"in t)){let e=d.get(t.containerId);e?e.removeToast(t.id):d.forEach(e=>{e.removeToast(t.id)})}}(t)},w.clearWaitingQueue=(t={})=>{d.forEach(e=>{e.props.limit&&(!t.containerId||e.id===t.containerId)&&e.clearQueue()})},w.isActive=y,w.update=(t,e={})=>{let o=((t,{containerId:e})=>{var o;return null==(o=d.get(e||1))?void 0:o.toasts.get(t)})(t,e);if(o){let{props:r,content:n}=o,a={delay:100,...r,...e,toastId:e.toastId||t,updateId:u()};a.toastId!==t&&(a.staleId=t);let i=a.render||n;delete a.render,b(i,a)}},w.done=t=>{w.update(t,{progress:1})},w.onChange=function(t){return m.add(t),()=>{m.delete(t)}},w.play=t=>v(!0,t),w.pause=t=>v(!1,t);var T="u">typeof window?e.useLayoutEffect:e.useEffect,C=({theme:t,type:o,isLoading:r,...n})=>e.default.createElement("svg",{viewBox:"0 0 24 24",width:"100%",height:"100%",fill:"colored"===t?"currentColor":`var(--toastify-icon-color-${o})`,...n}),j={info:function(t){return e.default.createElement(C,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.013 12.013 0 0012 0zm.25 5a1.5 1.5 0 11-1.5 1.5 1.5 1.5 0 011.5-1.5zm2.25 13.5h-4a1 1 0 010-2h.75a.25.25 0 00.25-.25v-4.5a.25.25 0 00-.25-.25h-.75a1 1 0 010-2h1a2 2 0 012 2v4.75a.25.25 0 00.25.25h.75a1 1 0 110 2z"}))},warning:function(t){return e.default.createElement(C,{...t},e.default.createElement("path",{d:"M23.32 17.191L15.438 2.184C14.728.833 13.416 0 11.996 0c-1.42 0-2.733.833-3.443 2.184L.533 17.448a4.744 4.744 0 000 4.368C1.243 23.167 2.555 24 3.975 24h16.05C22.22 24 24 22.044 24 19.632c0-.904-.251-1.746-.68-2.44zm-9.622 1.46c0 1.033-.724 1.823-1.698 1.823s-1.698-.79-1.698-1.822v-.043c0-1.028.724-1.822 1.698-1.822s1.698.79 1.698 1.822v.043zm.039-12.285l-.84 8.06c-.057.581-.408.943-.897.943-.49 0-.84-.367-.896-.942l-.84-8.065c-.057-.624.25-1.095.779-1.095h1.91c.528.005.84.476.784 1.1z"}))},success:function(t){return e.default.createElement(C,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm6.927 8.2l-6.845 9.289a1.011 1.011 0 01-1.43.188l-4.888-3.908a1 1 0 111.25-1.562l4.076 3.261 6.227-8.451a1 1 0 111.61 1.183z"}))},error:function(t){return e.default.createElement(C,{...t},e.default.createElement("path",{d:"M11.983 0a12.206 12.206 0 00-8.51 3.653A11.8 11.8 0 000 12.207 11.779 11.779 0 0011.8 24h.214A12.111 12.111 0 0024 11.791 11.766 11.766 0 0011.983 0zM10.5 16.542a1.476 1.476 0 011.449-1.53h.027a1.527 1.527 0 011.523 1.47 1.475 1.475 0 01-1.449 1.53h-.027a1.529 1.529 0 01-1.523-1.47zM11 12.5v-6a1 1 0 012 0v6a1 1 0 11-2 0z"}))},spinner:function(){return e.default.createElement("div",{className:"Toastify__spinner"})}},E=t=>{let{isRunning:r,preventExitTransition:n,toastRef:a,eventHandlers:i,playToast:s}=function(t){var o,r;let[n,a]=(0,e.useState)(!1),[i,s]=(0,e.useState)(!1),l=(0,e.useRef)(null),c=(0,e.useRef)({start:0,delta:0,removalDistance:0,canCloseOnClick:!0,canDrag:!1,didMove:!1}).current,{autoClose:f,pauseOnHover:u,closeToast:p,onClick:m,closeOnClick:h}=t;function y(){a(!0)}function g(){a(!1)}function v(e){let o=l.current;if(c.canDrag&&o){c.didMove=!0,n&&g(),"x"===t.draggableDirection?c.delta=e.clientX-c.start:c.delta=e.clientY-c.start,c.start!==e.clientX&&(c.canCloseOnClick=!1);let r="x"===t.draggableDirection?`${c.delta}px, var(--y)`:`0, calc(${c.delta}px + var(--y))`;o.style.transform=`translate3d(${r},0)`,o.style.opacity=`${1-Math.abs(c.delta/c.removalDistance)}`}}function b(){document.removeEventListener("pointermove",v),document.removeEventListener("pointerup",b);let e=l.current;if(c.canDrag&&c.didMove&&e){if(c.canDrag=!1,Math.abs(c.delta)>c.removalDistance){s(!0),t.closeToast(!0),t.collapseAll();return}e.style.transition="transform 0.2s, opacity 0.2s",e.style.removeProperty("transform"),e.style.removeProperty("opacity")}}o={id:t.toastId,containerId:t.containerId,fn:a},null==(r=d.get(o.containerId||1))||r.setToggle(o.id,o.fn),(0,e.useEffect)(()=>{if(t.pauseOnFocusLoss)return document.hasFocus()||g(),window.addEventListener("focus",y),window.addEventListener("blur",g),()=>{window.removeEventListener("focus",y),window.removeEventListener("blur",g)}},[t.pauseOnFocusLoss]);let _={onPointerDown:function(e){if(!0===t.draggable||t.draggable===e.pointerType){c.didMove=!1,document.addEventListener("pointermove",v),document.addEventListener("pointerup",b);let o=l.current;c.canCloseOnClick=!0,c.canDrag=!0,o.style.transition="none","x"===t.draggableDirection?(c.start=e.clientX,c.removalDistance=o.offsetWidth*(t.draggablePercent/100)):(c.start=e.clientY,c.removalDistance=o.offsetHeight*(80===t.draggablePercent?1.5*t.draggablePercent:t.draggablePercent)/100)}},onPointerUp:function(e){let{top:o,bottom:r,left:n,right:a}=l.current.getBoundingClientRect();"mouse"===e.pointerType&&t.pauseOnHover&&e.clientX>=n&&e.clientX<=a&&e.clientY>=o&&e.clientY<=r?g():y()}};return f&&u&&(_.onMouseEnter=g,t.stacked||(_.onMouseLeave=y)),h&&(_.onClick=t=>{m&&m(t),c.canCloseOnClick&&p(!0)}),{playToast:y,pauseToast:g,isRunning:n,preventExitTransition:i,toastRef:l,eventHandlers:_}}(t),{closeButton:f,children:u,autoClose:p,onClick:m,type:h,hideProgressBar:y,closeToast:g,transition:v,position:b,className:_,style:x,progressClassName:w,updateId:T,role:C,progress:E,rtl:k,toastId:N,deleteToast:L,isIn:A,isLoading:I,closeOnClick:B,theme:R,ariaLabel:O}=t,S=(0,o.default)("Toastify__toast",`Toastify__toast-theme--${R}`,`Toastify__toast--${h}`,{"Toastify__toast--rtl":k},{"Toastify__toast--close-on-click":B}),M="function"==typeof _?_({rtl:k,position:b,type:h,defaultClassName:S}):(0,o.default)(S,_),P=function({theme:t,type:o,isLoading:r,icon:n}){let a=null,i={theme:t,type:o};return!1===n||("function"==typeof n?a=n({...i,isLoading:r}):(0,e.isValidElement)(n)?a=(0,e.cloneElement)(n,i):r?a=j.spinner():o in j&&(a=j[o](i))),a}(t),U=!!E||!p,z={closeToast:g,type:h,theme:R},$=null;return!1===f||($="function"==typeof f?f(z):(0,e.isValidElement)(f)?(0,e.cloneElement)(f,z):function({closeToast:t,theme:o,ariaLabel:r="close"}){return e.default.createElement("button",{className:`Toastify__close-button Toastify__close-button--${o}`,type:"button",onClick:e=>{e.stopPropagation(),t(!0)},"aria-label":r},e.default.createElement("svg",{"aria-hidden":"true",viewBox:"0 0 14 16"},e.default.createElement("path",{fillRule:"evenodd",d:"M7.71 8.23l3.75 3.75-1.48 1.48-3.75-3.75-3.75 3.75L1 11.98l3.75-3.75L1 4.48 2.48 3l3.75 3.75L9.98 3l1.48 1.48-3.75 3.75z"})))}(z)),e.default.createElement(v,{isIn:A,done:L,position:b,preventExitTransition:n,nodeRef:a,playToast:s},e.default.createElement("div",{id:N,tabIndex:0,onClick:m,"data-in":A,className:M,...i,style:x,ref:a,...A&&{role:C,"aria-label":O}},null!=P&&e.default.createElement("div",{className:(0,o.default)("Toastify__toast-icon",{"Toastify--animate-icon Toastify__zoom-enter":!I})},P),l(u,t,!r),$,!t.customProgressBar&&e.default.createElement(c,{...T&&!U?{key:`p-${T}`}:{},rtl:k,theme:R,delay:p,isRunning:r,isIn:A,closeToast:g,hide:y,type:h,className:w,controlledProgress:U,progress:E||0})))},k=(t,e=!1)=>({enter:`Toastify--animate Toastify__${t}-enter`,exit:`Toastify--animate Toastify__${t}-exit`,appendPosition:e}),N=i(k("bounce",!0));i(k("slide",!0)),i(k("zoom")),i(k("flip"));var L={position:"top-right",transition:N,autoClose:5e3,closeButton:!0,pauseOnHover:!0,pauseOnFocusLoss:!0,draggable:"touch",draggablePercent:80,draggableDirection:"x",role:"alert",theme:"light","aria-label":"Notifications Alt+T",hotKeys:t=>t.altKey&&"KeyT"===t.code};function A(t){let i={...L,...t},l=t.stacked,[c,f]=(0,e.useState)(!0),u=(0,e.useRef)(null),{getToastToRender:m,isToastActive:v,count:b}=function(t){var o;let i,{subscribe:l,getSnapshot:c,setProps:f}=(0,e.useRef)((i=t.containerId||1,{subscribe(e){let o,l,c,f,u,m,y,v,b,_,x,w=(o=1,l=0,c=[],f=[],u=t,m=new Map,y=new Set,v=()=>{f=Array.from(m.values()),y.forEach(t=>t())},b=t=>{var e,o;t.isActive&&(null==(o=null==(e=t.props)?void 0:e.onClose)||o.call(e,t.removalReason),t.isActive=!1,h(s(t,"removed")))},_=t=>{if(null==t)m.forEach(b);else{let e=m.get(t);e&&b(e)}v()},x=t=>{var e,o;let{toastId:r,updateId:n}=t.props,a=null==n;t.staleId&&m.delete(t.staleId),t.isActive=!0,m.set(r,t),v(),h(s(t,a?"added":"updated")),a&&(null==(o=(e=t.props).onOpen)||o.call(e))},{id:i,props:u,observe:t=>(y.add(t),()=>y.delete(t)),toggle:(t,e)=>{m.forEach(o=>{var r;(null==e||e===o.props.toastId)&&(null==(r=o.toggle)||r.call(o,t))})},removeToast:_,toasts:m,clearQueue:()=>{l-=c.length,c=[]},buildToast:(t,e)=>{let s,f;if((({containerId:t,toastId:e,updateId:o})=>{let r=m.has(e)&&null==o;return(t?t!==i:1!==i)||r})(e))return;let{toastId:d,updateId:p,data:h,staleId:y,delay:g}=e,b=null==p;b&&l++;let w={...u,style:u.toastStyle,key:o++,...Object.fromEntries(Object.entries(e).filter(([t,e])=>null!=e)),toastId:d,updateId:p,data:h,isIn:!1,className:n(e.className||u.toastClassName),progressClassName:n(e.progressClassName||u.progressClassName),autoClose:!e.isLoading&&(s=e.autoClose,f=u.autoClose,!1===s||r(s)&&s>0?s:f),closeToast(t){let e=m.get(d);e&&(e.removalReason=t,_(d))},deleteToast(){if(null!=m.get(d)){if(m.delete(d),--l<0&&(l=0),c.length>0)return void x(c.shift());v()}}};w.closeButton=u.closeButton,!1===e.closeButton||a(e.closeButton)?w.closeButton=e.closeButton:!0===e.closeButton&&(w.closeButton=!a(u.closeButton)||u.closeButton);let T={content:t,props:w,staleId:y};u.limit&&u.limit>0&&l>u.limit&&b?c.push(T):r(g)?setTimeout(()=>{x(T)},g):x(T)},setProps(t){u=t},setToggle:(t,e)=>{let o=m.get(t);o&&(o.toggle=e)},isToastActive:t=>{var e;return null==(e=m.get(t))?void 0:e.isActive},getSnapshot:()=>f});d.set(i,w);let T=w.observe(e);return p.forEach(t=>g(t.content,t.options)),p=[],()=>{T(),d.delete(i)}},setProps(t){var e;null==(e=d.get(i))||e.setProps(t)},getSnapshot(){var t;return null==(t=d.get(i))?void 0:t.getSnapshot()}})).current;f(t);let u=null==(o=(0,e.useSyncExternalStore)(l,c,c))?void 0:o.slice();return{getToastToRender:function(e){if(!u)return[];let o=new Map;return t.newestOnTop&&u.reverse(),u.forEach(t=>{let{position:e}=t.props;o.has(e)||o.set(e,[]),o.get(e).push(t)}),Array.from(o,t=>e(t[0],t[1]))},isToastActive:y,count:null==u?void 0:u.length}}(i),{className:_,style:x,rtl:C,containerId:j,hotKeys:k}=i;function N(){l&&(f(!0),w.play())}return T(()=>{var t;if(l){let e=u.current.querySelectorAll('[data-in="true"]'),o=null==(t=i.position)?void 0:t.includes("top"),r=0,n=0;Array.from(e).reverse().forEach((t,e)=>{t.classList.add("Toastify__toast--stacked"),e>0&&(t.dataset.collapsed=`${c}`),t.dataset.pos||(t.dataset.pos=o?"top":"bot");let a=r*(c?.2:1)+(c?0:12*e),i=Math.max(.5,1-(c?n:0));t.style.setProperty("--y",`${o?a:-1*a}px`),t.style.setProperty("--g","12"),t.style.setProperty("--s",`${i}`),r+=t.offsetHeight,n+=.025})}},[c,b,l]),(0,e.useEffect)(()=>{function t(t){var e;let o=u.current;k(t)&&(null==(e=null==o?void 0:o.querySelector('[tabIndex="0"]'))||e.focus(),f(!1),w.pause()),"Escape"===t.key&&(document.activeElement===o||null!=o&&o.contains(document.activeElement))&&(f(!0),w.play())}return document.addEventListener("keydown",t),()=>{document.removeEventListener("keydown",t)}},[k]),e.default.createElement("section",{ref:u,className:"Toastify",id:j,onMouseEnter:()=>{l&&(f(!1),w.pause())},onMouseLeave:N,"aria-live":"polite","aria-atomic":"false","aria-relevant":"additions text","aria-label":i["aria-label"]},m((t,r)=>{var a;let i,s=r.length?{...x}:{...x,pointerEvents:"none"};return e.default.createElement("div",{tabIndex:-1,className:(a=t,i=(0,o.default)("Toastify__toast-container",`Toastify__toast-container--${a}`,{"Toastify__toast-container--rtl":C}),"function"==typeof _?_({position:a,rtl:C,defaultClassName:i}):(0,o.default)(i,n(_))),"data-stacked":l,style:s,key:`c-${t}`},r.map(({content:t,props:o})=>e.default.createElement(E,{...o,stacked:l,collapseAll:N,isIn:v(o.toastId,o.containerId),key:`t-${o.key}`},t)))}))}var I=`:root {
  --toastify-color-light: #fff;
  --toastify-color-dark: #121212;
  --toastify-color-info: #3498db;
  --toastify-color-success: #07bc0c;
  --toastify-color-warning: #f1c40f;
  --toastify-color-error: hsl(6, 78%, 57%);
  --toastify-color-transparent: rgba(255, 255, 255, 0.7);

  --toastify-icon-color-info: var(--toastify-color-info);
  --toastify-icon-color-success: var(--toastify-color-success);
  --toastify-icon-color-warning: var(--toastify-color-warning);
  --toastify-icon-color-error: var(--toastify-color-error);

  --toastify-container-width: fit-content;
  --toastify-toast-width: 320px;
  --toastify-toast-offset: 16px;
  --toastify-toast-top: max(var(--toastify-toast-offset), env(safe-area-inset-top));
  --toastify-toast-right: max(var(--toastify-toast-offset), env(safe-area-inset-right));
  --toastify-toast-left: max(var(--toastify-toast-offset), env(safe-area-inset-left));
  --toastify-toast-bottom: max(var(--toastify-toast-offset), env(safe-area-inset-bottom));
  --toastify-toast-background: #fff;
  --toastify-toast-padding: 14px;
  --toastify-toast-min-height: 64px;
  --toastify-toast-max-height: 800px;
  --toastify-toast-bd-radius: 6px;
  --toastify-toast-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
  --toastify-font-family: sans-serif;
  --toastify-z-index: 9999;
  --toastify-text-color-light: #757575;
  --toastify-text-color-dark: #fff;

  /* Used only for colored theme */
  --toastify-text-color-info: #fff;
  --toastify-text-color-success: #fff;
  --toastify-text-color-warning: #fff;
  --toastify-text-color-error: #fff;

  --toastify-spinner-color: #616161;
  --toastify-spinner-color-empty-area: #e0e0e0;
  --toastify-color-progress-light: linear-gradient(to right, #4cd964, #5ac8fa, #007aff, #34aadc, #5856d6, #ff2d55);
  --toastify-color-progress-dark: #bb86fc;
  --toastify-color-progress-info: var(--toastify-color-info);
  --toastify-color-progress-success: var(--toastify-color-success);
  --toastify-color-progress-warning: var(--toastify-color-warning);
  --toastify-color-progress-error: var(--toastify-color-error);
  /* used to control the opacity of the progress trail */
  --toastify-color-progress-bgo: 0.2;
}

.Toastify__toast-container {
  z-index: var(--toastify-z-index);
  -webkit-transform: translate3d(0, 0, var(--toastify-z-index));
  position: fixed;
  width: var(--toastify-container-width);
  box-sizing: border-box;
  color: #fff;
  display: flex;
  flex-direction: column;
}

.Toastify__toast-container--top-left {
  top: var(--toastify-toast-top);
  left: var(--toastify-toast-left);
}
.Toastify__toast-container--top-center {
  top: var(--toastify-toast-top);
  left: 50%;
  transform: translateX(-50%);
  align-items: center;
}
.Toastify__toast-container--top-right {
  top: var(--toastify-toast-top);
  right: var(--toastify-toast-right);
  align-items: end;
}
.Toastify__toast-container--bottom-left {
  bottom: var(--toastify-toast-bottom);
  left: var(--toastify-toast-left);
}
.Toastify__toast-container--bottom-center {
  bottom: var(--toastify-toast-bottom);
  left: 50%;
  transform: translateX(-50%);
  align-items: center;
}
.Toastify__toast-container--bottom-right {
  bottom: var(--toastify-toast-bottom);
  right: var(--toastify-toast-right);
  align-items: end;
}

.Toastify__toast {
  --y: 0px;
  position: relative;
  touch-action: none;
  width: var(--toastify-toast-width);
  min-height: var(--toastify-toast-min-height);
  box-sizing: border-box;
  margin-bottom: 1rem;
  padding: var(--toastify-toast-padding);
  border-radius: var(--toastify-toast-bd-radius);
  box-shadow: var(--toastify-toast-shadow);
  max-height: var(--toastify-toast-max-height);
  font-family: var(--toastify-font-family);
  /* webkit only issue #791 */
  z-index: 0;
  /* inner swag */
  display: flex;
  flex: 1 auto;
  align-items: center;
  word-break: break-word;
}

@media only screen and (max-width: 480px) {
  .Toastify__toast-container {
    width: 100vw;
    left: env(safe-area-inset-left);
    margin: 0;
  }
  .Toastify__toast-container--top-left,
  .Toastify__toast-container--top-center,
  .Toastify__toast-container--top-right {
    top: env(safe-area-inset-top);
    transform: translateX(0);
  }
  .Toastify__toast-container--bottom-left,
  .Toastify__toast-container--bottom-center,
  .Toastify__toast-container--bottom-right {
    bottom: env(safe-area-inset-bottom);
    transform: translateX(0);
  }
  .Toastify__toast-container--rtl {
    right: env(safe-area-inset-right);
    left: initial;
  }
  .Toastify__toast {
    --toastify-toast-width: 100%;
    margin-bottom: 0;
    border-radius: 0;
  }
}

.Toastify__toast-container[data-stacked='true'] {
  width: var(--toastify-toast-width);
}

@media only screen and (max-width: 480px) {
  .Toastify__toast-container[data-stacked='true'] {
    width: 100vw;
  }
}

.Toastify__toast--stacked {
  position: absolute;
  width: 100%;
  transform: translate3d(0, var(--y), 0) scale(var(--s));
  transition: transform 0.3s;
}

.Toastify__toast--stacked[data-collapsed] .Toastify__toast-body,
.Toastify__toast--stacked[data-collapsed] .Toastify__close-button {
  transition: opacity 0.1s;
}

.Toastify__toast--stacked[data-collapsed='false'] {
  overflow: visible;
}

.Toastify__toast--stacked[data-collapsed='true']:not(:last-child) > * {
  opacity: 0;
}

.Toastify__toast--stacked:after {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  height: calc(var(--g) * 1px);
  bottom: 100%;
}

.Toastify__toast--stacked[data-pos='top'] {
  top: 0;
}

.Toastify__toast--stacked[data-pos='bot'] {
  bottom: 0;
}

.Toastify__toast--stacked[data-pos='bot'].Toastify__toast--stacked:before {
  transform-origin: top;
}

.Toastify__toast--stacked[data-pos='top'].Toastify__toast--stacked:before {
  transform-origin: bottom;
}

.Toastify__toast--stacked:before {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  height: 100%;
  transform: scaleY(3);
  z-index: -1;
}

.Toastify__toast--rtl {
  direction: rtl;
}

.Toastify__toast--close-on-click {
  cursor: pointer;
}

.Toastify__toast-icon {
  margin-inline-end: 10px;
  width: 22px;
  flex-shrink: 0;
  display: flex;
}

.Toastify--animate {
  animation-fill-mode: both;
  animation-duration: 0.5s;
}

.Toastify--animate-icon {
  animation-fill-mode: both;
  animation-duration: 0.3s;
}

.Toastify__toast-theme--dark {
  background: var(--toastify-color-dark);
  color: var(--toastify-text-color-dark);
}

.Toastify__toast-theme--light {
  background: var(--toastify-color-light);
  color: var(--toastify-text-color-light);
}

.Toastify__toast-theme--colored.Toastify__toast--default {
  background: var(--toastify-color-light);
  color: var(--toastify-text-color-light);
}

.Toastify__toast-theme--colored.Toastify__toast--info {
  color: var(--toastify-text-color-info);
  background: var(--toastify-color-info);
}

.Toastify__toast-theme--colored.Toastify__toast--success {
  color: var(--toastify-text-color-success);
  background: var(--toastify-color-success);
}

.Toastify__toast-theme--colored.Toastify__toast--warning {
  color: var(--toastify-text-color-warning);
  background: var(--toastify-color-warning);
}

.Toastify__toast-theme--colored.Toastify__toast--error {
  color: var(--toastify-text-color-error);
  background: var(--toastify-color-error);
}

.Toastify__progress-bar-theme--light {
  background: var(--toastify-color-progress-light);
}

.Toastify__progress-bar-theme--dark {
  background: var(--toastify-color-progress-dark);
}

.Toastify__progress-bar--info {
  background: var(--toastify-color-progress-info);
}

.Toastify__progress-bar--success {
  background: var(--toastify-color-progress-success);
}

.Toastify__progress-bar--warning {
  background: var(--toastify-color-progress-warning);
}

.Toastify__progress-bar--error {
  background: var(--toastify-color-progress-error);
}

.Toastify__progress-bar-theme--colored.Toastify__progress-bar--info,
.Toastify__progress-bar-theme--colored.Toastify__progress-bar--success,
.Toastify__progress-bar-theme--colored.Toastify__progress-bar--warning,
.Toastify__progress-bar-theme--colored.Toastify__progress-bar--error {
  background: var(--toastify-color-transparent);
}

.Toastify__close-button {
  color: #fff;
  position: absolute;
  top: 6px;
  right: 6px;
  background: transparent;
  outline: none;
  border: none;
  padding: 0;
  cursor: pointer;
  opacity: 0.7;
  transition: 0.3s ease;
  z-index: 1;
}

.Toastify__toast--rtl .Toastify__close-button {
  left: 6px;
  right: unset;
}

.Toastify__close-button--light {
  color: #000;
  opacity: 0.3;
}

.Toastify__close-button > svg {
  fill: currentColor;
  height: 16px;
  width: 14px;
}

.Toastify__close-button:hover,
.Toastify__close-button:focus {
  opacity: 1;
}

@keyframes Toastify__trackProgress {
  0% {
    transform: scaleX(1);
  }
  100% {
    transform: scaleX(0);
  }
}

.Toastify__progress-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0.7;
  transform-origin: left;
}

.Toastify__progress-bar--animated {
  animation: Toastify__trackProgress linear 1 forwards;
}

.Toastify__progress-bar--controlled {
  transition: transform 0.2s;
}

.Toastify__progress-bar--rtl {
  right: 0;
  left: initial;
  transform-origin: right;
  border-bottom-left-radius: initial;
}

.Toastify__progress-bar--wrp {
  position: absolute;
  overflow: hidden;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 5px;
  border-bottom-left-radius: var(--toastify-toast-bd-radius);
  border-bottom-right-radius: var(--toastify-toast-bd-radius);
}

.Toastify__progress-bar--wrp[data-hidden='true'] {
  opacity: 0;
}

.Toastify__progress-bar--bg {
  opacity: var(--toastify-color-progress-bgo);
  width: 100%;
  height: 100%;
}

.Toastify__spinner {
  width: 20px;
  height: 20px;
  box-sizing: border-box;
  border: 2px solid;
  border-radius: 100%;
  border-color: var(--toastify-spinner-color-empty-area);
  border-right-color: var(--toastify-spinner-color);
  animation: Toastify__spin 0.65s linear infinite;
}

@keyframes Toastify__bounceInRight {
  from,
  60%,
  75%,
  90%,
  to {
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  from {
    opacity: 0;
    transform: translate3d(3000px, 0, 0);
  }
  60% {
    opacity: 1;
    transform: translate3d(-25px, 0, 0);
  }
  75% {
    transform: translate3d(10px, 0, 0);
  }
  90% {
    transform: translate3d(-5px, 0, 0);
  }
  to {
    transform: none;
  }
}

@keyframes Toastify__bounceOutRight {
  20% {
    opacity: 1;
    transform: translate3d(-20px, var(--y), 0);
  }
  to {
    opacity: 0;
    transform: translate3d(2000px, var(--y), 0);
  }
}

@keyframes Toastify__bounceInLeft {
  from,
  60%,
  75%,
  90%,
  to {
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  0% {
    opacity: 0;
    transform: translate3d(-3000px, 0, 0);
  }
  60% {
    opacity: 1;
    transform: translate3d(25px, 0, 0);
  }
  75% {
    transform: translate3d(-10px, 0, 0);
  }
  90% {
    transform: translate3d(5px, 0, 0);
  }
  to {
    transform: none;
  }
}

@keyframes Toastify__bounceOutLeft {
  20% {
    opacity: 1;
    transform: translate3d(20px, var(--y), 0);
  }
  to {
    opacity: 0;
    transform: translate3d(-2000px, var(--y), 0);
  }
}

@keyframes Toastify__bounceInUp {
  from,
  60%,
  75%,
  90%,
  to {
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  from {
    opacity: 0;
    transform: translate3d(0, 3000px, 0);
  }
  60% {
    opacity: 1;
    transform: translate3d(0, -20px, 0);
  }
  75% {
    transform: translate3d(0, 10px, 0);
  }
  90% {
    transform: translate3d(0, -5px, 0);
  }
  to {
    transform: translate3d(0, 0, 0);
  }
}

@keyframes Toastify__bounceOutUp {
  20% {
    transform: translate3d(0, calc(var(--y) - 10px), 0);
  }
  40%,
  45% {
    opacity: 1;
    transform: translate3d(0, calc(var(--y) + 20px), 0);
  }
  to {
    opacity: 0;
    transform: translate3d(0, -2000px, 0);
  }
}

@keyframes Toastify__bounceInDown {
  from,
  60%,
  75%,
  90%,
  to {
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  0% {
    opacity: 0;
    transform: translate3d(0, -3000px, 0);
  }
  60% {
    opacity: 1;
    transform: translate3d(0, 25px, 0);
  }
  75% {
    transform: translate3d(0, -10px, 0);
  }
  90% {
    transform: translate3d(0, 5px, 0);
  }
  to {
    transform: none;
  }
}

@keyframes Toastify__bounceOutDown {
  20% {
    transform: translate3d(0, calc(var(--y) - 10px), 0);
  }
  40%,
  45% {
    opacity: 1;
    transform: translate3d(0, calc(var(--y) + 20px), 0);
  }
  to {
    opacity: 0;
    transform: translate3d(0, 2000px, 0);
  }
}

.Toastify__bounce-enter--top-left,
.Toastify__bounce-enter--bottom-left {
  animation-name: Toastify__bounceInLeft;
}

.Toastify__bounce-enter--top-right,
.Toastify__bounce-enter--bottom-right {
  animation-name: Toastify__bounceInRight;
}

.Toastify__bounce-enter--top-center {
  animation-name: Toastify__bounceInDown;
}

.Toastify__bounce-enter--bottom-center {
  animation-name: Toastify__bounceInUp;
}

.Toastify__bounce-exit--top-left,
.Toastify__bounce-exit--bottom-left {
  animation-name: Toastify__bounceOutLeft;
}

.Toastify__bounce-exit--top-right,
.Toastify__bounce-exit--bottom-right {
  animation-name: Toastify__bounceOutRight;
}

.Toastify__bounce-exit--top-center {
  animation-name: Toastify__bounceOutUp;
}

.Toastify__bounce-exit--bottom-center {
  animation-name: Toastify__bounceOutDown;
}

@keyframes Toastify__zoomIn {
  from {
    opacity: 0;
    transform: scale3d(0.3, 0.3, 0.3);
  }
  50% {
    opacity: 1;
  }
}

@keyframes Toastify__zoomOut {
  from {
    opacity: 1;
  }
  50% {
    opacity: 0;
    transform: translate3d(0, var(--y), 0) scale3d(0.3, 0.3, 0.3);
  }
  to {
    opacity: 0;
  }
}

.Toastify__zoom-enter {
  animation-name: Toastify__zoomIn;
}

.Toastify__zoom-exit {
  animation-name: Toastify__zoomOut;
}

@keyframes Toastify__flipIn {
  from {
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    animation-timing-function: ease-in;
    opacity: 0;
  }
  40% {
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    animation-timing-function: ease-in;
  }
  60% {
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }
  80% {
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }
  to {
    transform: perspective(400px);
  }
}

@keyframes Toastify__flipOut {
  from {
    transform: translate3d(0, var(--y), 0) perspective(400px);
  }
  30% {
    transform: translate3d(0, var(--y), 0) perspective(400px) rotate3d(1, 0, 0, -20deg);
    opacity: 1;
  }
  to {
    transform: translate3d(0, var(--y), 0) perspective(400px) rotate3d(1, 0, 0, 90deg);
    opacity: 0;
  }
}

.Toastify__flip-enter {
  animation-name: Toastify__flipIn;
}

.Toastify__flip-exit {
  animation-name: Toastify__flipOut;
}

@keyframes Toastify__slideInRight {
  from {
    transform: translate3d(110%, 0, 0);
    visibility: visible;
  }
  to {
    transform: translate3d(0, var(--y), 0);
  }
}

@keyframes Toastify__slideInLeft {
  from {
    transform: translate3d(-110%, 0, 0);
    visibility: visible;
  }
  to {
    transform: translate3d(0, var(--y), 0);
  }
}

@keyframes Toastify__slideInUp {
  from {
    transform: translate3d(0, 110%, 0);
    visibility: visible;
  }
  to {
    transform: translate3d(0, var(--y), 0);
  }
}

@keyframes Toastify__slideInDown {
  from {
    transform: translate3d(0, -110%, 0);
    visibility: visible;
  }
  to {
    transform: translate3d(0, var(--y), 0);
  }
}

@keyframes Toastify__slideOutRight {
  from {
    transform: translate3d(0, var(--y), 0);
  }
  to {
    visibility: hidden;
    transform: translate3d(110%, var(--y), 0);
  }
}

@keyframes Toastify__slideOutLeft {
  from {
    transform: translate3d(0, var(--y), 0);
  }
  to {
    visibility: hidden;
    transform: translate3d(-110%, var(--y), 0);
  }
}

@keyframes Toastify__slideOutDown {
  from {
    transform: translate3d(0, var(--y), 0);
  }
  to {
    visibility: hidden;
    transform: translate3d(0, 500px, 0);
  }
}

@keyframes Toastify__slideOutUp {
  from {
    transform: translate3d(0, var(--y), 0);
  }
  to {
    visibility: hidden;
    transform: translate3d(0, -500px, 0);
  }
}

.Toastify__slide-enter--top-left,
.Toastify__slide-enter--bottom-left {
  animation-name: Toastify__slideInLeft;
}

.Toastify__slide-enter--top-right,
.Toastify__slide-enter--bottom-right {
  animation-name: Toastify__slideInRight;
}

.Toastify__slide-enter--top-center {
  animation-name: Toastify__slideInDown;
}

.Toastify__slide-enter--bottom-center {
  animation-name: Toastify__slideInUp;
}

.Toastify__slide-exit--top-left,
.Toastify__slide-exit--bottom-left {
  animation-name: Toastify__slideOutLeft;
  animation-timing-function: ease-in;
  animation-duration: 0.3s;
}

.Toastify__slide-exit--top-right,
.Toastify__slide-exit--bottom-right {
  animation-name: Toastify__slideOutRight;
  animation-timing-function: ease-in;
  animation-duration: 0.3s;
}

.Toastify__slide-exit--top-center {
  animation-name: Toastify__slideOutUp;
  animation-timing-function: ease-in;
  animation-duration: 0.3s;
}

.Toastify__slide-exit--bottom-center {
  animation-name: Toastify__slideOutDown;
  animation-timing-function: ease-in;
  animation-duration: 0.3s;
}

@keyframes Toastify__spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
`,B=new Map;t.s(["ToastContainer",0,function(t){var o;return T(()=>{if(!I||"u"<typeof document)return;let t=document,e=B.get(t);if(e){o&&e.setAttribute("nonce",o);return}let r=t.createElement("style");r.textContent=I,o&&r.setAttribute("nonce",o),t.head.appendChild(r),B.set(t,r)},[o=t.nonce]),e.default.createElement(A,{...t})},"toast",0,w])},84975,(t,e,o)=>{e.exports={frontendBase:"https://www.resumesathi.com",backendBase:"http://127.0.0.1:8000"}},56518,t=>{"use strict";var e=t.i(47167),o=t.i(84975);let r=e.default.env.NEXT_PUBLIC_SITE_URL||e.default.env.NEXT_PUBLIC_FRONTEND_URL||o.default.frontendBase,n=e.default.env.NEXT_PUBLIC_BACKEND_BASE||o.default.backendBase;function a(){return n.replace(/\/+$/,"")}function i(){return`${a()}/api`}t.s(["getApiBase",0,i,"getBackendBase",0,a,"getContentCacheUrl",0,function(t){return`${i()}/public-cache/${String(t).replace(/^\/+/,"")}`},"getSiteBase",0,function(){return r.replace(/\/+$/,"")},"resolveApiMediaUrl",0,function(t,e){return t?/^https?:\/\//i.test(t)||String(t).startsWith("//")?t:`${a()}/${String(t).replace(/^\/+/,"")}`:e}])},67034,(t,e,o)=>{var r={675:function(t,e){"use strict";e.byteLength=function(t){var e=l(t),o=e[0],r=e[1];return(o+r)*3/4-r},e.toByteArray=function(t){var e,o,a=l(t),i=a[0],s=a[1],c=new n((i+s)*3/4-s),f=0,u=s>0?i-4:i;for(o=0;o<u;o+=4)e=r[t.charCodeAt(o)]<<18|r[t.charCodeAt(o+1)]<<12|r[t.charCodeAt(o+2)]<<6|r[t.charCodeAt(o+3)],c[f++]=e>>16&255,c[f++]=e>>8&255,c[f++]=255&e;return 2===s&&(e=r[t.charCodeAt(o)]<<2|r[t.charCodeAt(o+1)]>>4,c[f++]=255&e),1===s&&(e=r[t.charCodeAt(o)]<<10|r[t.charCodeAt(o+1)]<<4|r[t.charCodeAt(o+2)]>>2,c[f++]=e>>8&255,c[f++]=255&e),c},e.fromByteArray=function(t){for(var e,r=t.length,n=r%3,a=[],i=0,s=r-n;i<s;i+=16383)a.push(function(t,e,r){for(var n,a=[],i=e;i<r;i+=3)n=(t[i]<<16&0xff0000)+(t[i+1]<<8&65280)+(255&t[i+2]),a.push(o[n>>18&63]+o[n>>12&63]+o[n>>6&63]+o[63&n]);return a.join("")}(t,i,i+16383>s?s:i+16383));return 1===n?a.push(o[(e=t[r-1])>>2]+o[e<<4&63]+"=="):2===n&&a.push(o[(e=(t[r-2]<<8)+t[r-1])>>10]+o[e>>4&63]+o[e<<2&63]+"="),a.join("")};for(var o=[],r=[],n="u">typeof Uint8Array?Uint8Array:Array,a="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",i=0,s=a.length;i<s;++i)o[i]=a[i],r[a.charCodeAt(i)]=i;function l(t){var e=t.length;if(e%4>0)throw Error("Invalid string. Length must be a multiple of 4");var o=t.indexOf("=");-1===o&&(o=e);var r=o===e?0:4-o%4;return[o,r]}r[45]=62,r[95]=63},72:function(t,e,o){"use strict";var r=o(675),n=o(783),a="function"==typeof Symbol&&"function"==typeof Symbol.for?Symbol.for("nodejs.util.inspect.custom"):null;function i(t){if(t>0x7fffffff)throw RangeError('The value "'+t+'" is invalid for option "size"');var e=new Uint8Array(t);return Object.setPrototypeOf(e,s.prototype),e}function s(t,e,o){if("number"==typeof t){if("string"==typeof e)throw TypeError('The "string" argument must be of type string. Received type number');return f(t)}return l(t,e,o)}function l(t,e,o){if("string"==typeof t){var r=t,n=e;if(("string"!=typeof n||""===n)&&(n="utf8"),!s.isEncoding(n))throw TypeError("Unknown encoding: "+n);var a=0|p(r,n),l=i(a),c=l.write(r,n);return c!==a&&(l=l.slice(0,c)),l}if(ArrayBuffer.isView(t))return u(t);if(null==t)throw TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object. Received type "+typeof t);if(L(t,ArrayBuffer)||t&&L(t.buffer,ArrayBuffer)||"u">typeof SharedArrayBuffer&&(L(t,SharedArrayBuffer)||t&&L(t.buffer,SharedArrayBuffer)))return function(t,e,o){var r;if(e<0||t.byteLength<e)throw RangeError('"offset" is outside of buffer bounds');if(t.byteLength<e+(o||0))throw RangeError('"length" is outside of buffer bounds');return Object.setPrototypeOf(r=void 0===e&&void 0===o?new Uint8Array(t):void 0===o?new Uint8Array(t,e):new Uint8Array(t,e,o),s.prototype),r}(t,e,o);if("number"==typeof t)throw TypeError('The "value" argument must not be of type number. Received type number');var f=t.valueOf&&t.valueOf();if(null!=f&&f!==t)return s.from(f,e,o);var m=function(t){if(s.isBuffer(t)){var e=0|d(t.length),o=i(e);return 0===o.length||t.copy(o,0,0,e),o}return void 0!==t.length?"number"!=typeof t.length||function(t){return t!=t}(t.length)?i(0):u(t):"Buffer"===t.type&&Array.isArray(t.data)?u(t.data):void 0}(t);if(m)return m;if("u">typeof Symbol&&null!=Symbol.toPrimitive&&"function"==typeof t[Symbol.toPrimitive])return s.from(t[Symbol.toPrimitive]("string"),e,o);throw TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object. Received type "+typeof t)}function c(t){if("number"!=typeof t)throw TypeError('"size" argument must be of type number');if(t<0)throw RangeError('The value "'+t+'" is invalid for option "size"')}function f(t){return c(t),i(t<0?0:0|d(t))}function u(t){for(var e=t.length<0?0:0|d(t.length),o=i(e),r=0;r<e;r+=1)o[r]=255&t[r];return o}e.Buffer=s,e.SlowBuffer=function(t){return+t!=t&&(t=0),s.alloc(+t)},e.INSPECT_MAX_BYTES=50,e.kMaxLength=0x7fffffff,s.TYPED_ARRAY_SUPPORT=function(){try{var t=new Uint8Array(1),e={foo:function(){return 42}};return Object.setPrototypeOf(e,Uint8Array.prototype),Object.setPrototypeOf(t,e),42===t.foo()}catch(t){return!1}}(),!s.TYPED_ARRAY_SUPPORT&&"u">typeof console&&"function"==typeof console.error&&console.error("This browser lacks typed array (Uint8Array) support which is required by `buffer` v5.x. Use `buffer` v4.x if you require old browser support."),Object.defineProperty(s.prototype,"parent",{enumerable:!0,get:function(){if(s.isBuffer(this))return this.buffer}}),Object.defineProperty(s.prototype,"offset",{enumerable:!0,get:function(){if(s.isBuffer(this))return this.byteOffset}}),s.poolSize=8192,s.from=function(t,e,o){return l(t,e,o)},Object.setPrototypeOf(s.prototype,Uint8Array.prototype),Object.setPrototypeOf(s,Uint8Array),s.alloc=function(t,e,o){return(c(t),t<=0)?i(t):void 0!==e?"string"==typeof o?i(t).fill(e,o):i(t).fill(e):i(t)},s.allocUnsafe=function(t){return f(t)},s.allocUnsafeSlow=function(t){return f(t)};function d(t){if(t>=0x7fffffff)throw RangeError("Attempt to allocate Buffer larger than maximum size: 0x7fffffff bytes");return 0|t}function p(t,e){if(s.isBuffer(t))return t.length;if(ArrayBuffer.isView(t)||L(t,ArrayBuffer))return t.byteLength;if("string"!=typeof t)throw TypeError('The "string" argument must be one of type string, Buffer, or ArrayBuffer. Received type '+typeof t);var o=t.length,r=arguments.length>2&&!0===arguments[2];if(!r&&0===o)return 0;for(var n=!1;;)switch(e){case"ascii":case"latin1":case"binary":return o;case"utf8":case"utf-8":return j(t).length;case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return 2*o;case"hex":return o>>>1;case"base64":return k(t).length;default:if(n)return r?-1:j(t).length;e=(""+e).toLowerCase(),n=!0}}function m(t,e,o){var n,a,i,s=!1;if((void 0===e||e<0)&&(e=0),e>this.length||((void 0===o||o>this.length)&&(o=this.length),o<=0||(o>>>=0)<=(e>>>=0)))return"";for(t||(t="utf8");;)switch(t){case"hex":return function(t,e,o){var r=t.length;(!e||e<0)&&(e=0),(!o||o<0||o>r)&&(o=r);for(var n="",a=e;a<o;++a)n+=A[t[a]];return n}(this,e,o);case"utf8":case"utf-8":return v(this,e,o);case"ascii":return function(t,e,o){var r="";o=Math.min(t.length,o);for(var n=e;n<o;++n)r+=String.fromCharCode(127&t[n]);return r}(this,e,o);case"latin1":case"binary":return function(t,e,o){var r="";o=Math.min(t.length,o);for(var n=e;n<o;++n)r+=String.fromCharCode(t[n]);return r}(this,e,o);case"base64":return n=this,a=e,i=o,0===a&&i===n.length?r.fromByteArray(n):r.fromByteArray(n.slice(a,i));case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return function(t,e,o){for(var r=t.slice(e,o),n="",a=0;a<r.length;a+=2)n+=String.fromCharCode(r[a]+256*r[a+1]);return n}(this,e,o);default:if(s)throw TypeError("Unknown encoding: "+t);t=(t+"").toLowerCase(),s=!0}}function h(t,e,o){var r=t[e];t[e]=t[o],t[o]=r}function y(t,e,o,r,n){var a;if(0===t.length)return -1;if("string"==typeof o?(r=o,o=0):o>0x7fffffff?o=0x7fffffff:o<-0x80000000&&(o=-0x80000000),(a=o*=1)!=a&&(o=n?0:t.length-1),o<0&&(o=t.length+o),o>=t.length)if(n)return -1;else o=t.length-1;else if(o<0)if(!n)return -1;else o=0;if("string"==typeof e&&(e=s.from(e,r)),s.isBuffer(e))return 0===e.length?-1:g(t,e,o,r,n);if("number"==typeof e){if(e&=255,"function"==typeof Uint8Array.prototype.indexOf)if(n)return Uint8Array.prototype.indexOf.call(t,e,o);else return Uint8Array.prototype.lastIndexOf.call(t,e,o);return g(t,[e],o,r,n)}throw TypeError("val must be string, number or Buffer")}function g(t,e,o,r,n){var a,i=1,s=t.length,l=e.length;if(void 0!==r&&("ucs2"===(r=String(r).toLowerCase())||"ucs-2"===r||"utf16le"===r||"utf-16le"===r)){if(t.length<2||e.length<2)return -1;i=2,s/=2,l/=2,o/=2}function c(t,e){return 1===i?t[e]:t.readUInt16BE(e*i)}if(n){var f=-1;for(a=o;a<s;a++)if(c(t,a)===c(e,-1===f?0:a-f)){if(-1===f&&(f=a),a-f+1===l)return f*i}else -1!==f&&(a-=a-f),f=-1}else for(o+l>s&&(o=s-l),a=o;a>=0;a--){for(var u=!0,d=0;d<l;d++)if(c(t,a+d)!==c(e,d)){u=!1;break}if(u)return a}return -1}s.isBuffer=function(t){return null!=t&&!0===t._isBuffer&&t!==s.prototype},s.compare=function(t,e){if(L(t,Uint8Array)&&(t=s.from(t,t.offset,t.byteLength)),L(e,Uint8Array)&&(e=s.from(e,e.offset,e.byteLength)),!s.isBuffer(t)||!s.isBuffer(e))throw TypeError('The "buf1", "buf2" arguments must be one of type Buffer or Uint8Array');if(t===e)return 0;for(var o=t.length,r=e.length,n=0,a=Math.min(o,r);n<a;++n)if(t[n]!==e[n]){o=t[n],r=e[n];break}return o<r?-1:+(r<o)},s.isEncoding=function(t){switch(String(t).toLowerCase()){case"hex":case"utf8":case"utf-8":case"ascii":case"latin1":case"binary":case"base64":case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return!0;default:return!1}},s.concat=function(t,e){if(!Array.isArray(t))throw TypeError('"list" argument must be an Array of Buffers');if(0===t.length)return s.alloc(0);if(void 0===e)for(o=0,e=0;o<t.length;++o)e+=t[o].length;var o,r=s.allocUnsafe(e),n=0;for(o=0;o<t.length;++o){var a=t[o];if(L(a,Uint8Array)&&(a=s.from(a)),!s.isBuffer(a))throw TypeError('"list" argument must be an Array of Buffers');a.copy(r,n),n+=a.length}return r},s.byteLength=p,s.prototype._isBuffer=!0,s.prototype.swap16=function(){var t=this.length;if(t%2!=0)throw RangeError("Buffer size must be a multiple of 16-bits");for(var e=0;e<t;e+=2)h(this,e,e+1);return this},s.prototype.swap32=function(){var t=this.length;if(t%4!=0)throw RangeError("Buffer size must be a multiple of 32-bits");for(var e=0;e<t;e+=4)h(this,e,e+3),h(this,e+1,e+2);return this},s.prototype.swap64=function(){var t=this.length;if(t%8!=0)throw RangeError("Buffer size must be a multiple of 64-bits");for(var e=0;e<t;e+=8)h(this,e,e+7),h(this,e+1,e+6),h(this,e+2,e+5),h(this,e+3,e+4);return this},s.prototype.toString=function(){var t=this.length;return 0===t?"":0==arguments.length?v(this,0,t):m.apply(this,arguments)},s.prototype.toLocaleString=s.prototype.toString,s.prototype.equals=function(t){if(!s.isBuffer(t))throw TypeError("Argument must be a Buffer");return this===t||0===s.compare(this,t)},s.prototype.inspect=function(){var t="",o=e.INSPECT_MAX_BYTES;return t=this.toString("hex",0,o).replace(/(.{2})/g,"$1 ").trim(),this.length>o&&(t+=" ... "),"<Buffer "+t+">"},a&&(s.prototype[a]=s.prototype.inspect),s.prototype.compare=function(t,e,o,r,n){if(L(t,Uint8Array)&&(t=s.from(t,t.offset,t.byteLength)),!s.isBuffer(t))throw TypeError('The "target" argument must be one of type Buffer or Uint8Array. Received type '+typeof t);if(void 0===e&&(e=0),void 0===o&&(o=t?t.length:0),void 0===r&&(r=0),void 0===n&&(n=this.length),e<0||o>t.length||r<0||n>this.length)throw RangeError("out of range index");if(r>=n&&e>=o)return 0;if(r>=n)return -1;if(e>=o)return 1;if(e>>>=0,o>>>=0,r>>>=0,n>>>=0,this===t)return 0;for(var a=n-r,i=o-e,l=Math.min(a,i),c=this.slice(r,n),f=t.slice(e,o),u=0;u<l;++u)if(c[u]!==f[u]){a=c[u],i=f[u];break}return a<i?-1:+(i<a)},s.prototype.includes=function(t,e,o){return -1!==this.indexOf(t,e,o)},s.prototype.indexOf=function(t,e,o){return y(this,t,e,o,!0)},s.prototype.lastIndexOf=function(t,e,o){return y(this,t,e,o,!1)};function v(t,e,o){o=Math.min(t.length,o);for(var r=[],n=e;n<o;){var a,i,s,l,c=t[n],f=null,u=c>239?4:c>223?3:c>191?2:1;if(n+u<=o)switch(u){case 1:c<128&&(f=c);break;case 2:(192&(a=t[n+1]))==128&&(l=(31&c)<<6|63&a)>127&&(f=l);break;case 3:a=t[n+1],i=t[n+2],(192&a)==128&&(192&i)==128&&(l=(15&c)<<12|(63&a)<<6|63&i)>2047&&(l<55296||l>57343)&&(f=l);break;case 4:a=t[n+1],i=t[n+2],s=t[n+3],(192&a)==128&&(192&i)==128&&(192&s)==128&&(l=(15&c)<<18|(63&a)<<12|(63&i)<<6|63&s)>65535&&l<1114112&&(f=l)}null===f?(f=65533,u=1):f>65535&&(f-=65536,r.push(f>>>10&1023|55296),f=56320|1023&f),r.push(f),n+=u}var d=r,p=d.length;if(p<=4096)return String.fromCharCode.apply(String,d);for(var m="",h=0;h<p;)m+=String.fromCharCode.apply(String,d.slice(h,h+=4096));return m}function b(t,e,o){if(t%1!=0||t<0)throw RangeError("offset is not uint");if(t+e>o)throw RangeError("Trying to access beyond buffer length")}function _(t,e,o,r,n,a){if(!s.isBuffer(t))throw TypeError('"buffer" argument must be a Buffer instance');if(e>n||e<a)throw RangeError('"value" argument is out of bounds');if(o+r>t.length)throw RangeError("Index out of range")}function x(t,e,o,r,n,a){if(o+r>t.length||o<0)throw RangeError("Index out of range")}function w(t,e,o,r,a){return e*=1,o>>>=0,a||x(t,e,o,4,34028234663852886e22,-34028234663852886e22),n.write(t,e,o,r,23,4),o+4}function T(t,e,o,r,a){return e*=1,o>>>=0,a||x(t,e,o,8,17976931348623157e292,-17976931348623157e292),n.write(t,e,o,r,52,8),o+8}s.prototype.write=function(t,e,o,r){if(void 0===e)r="utf8",o=this.length,e=0;else if(void 0===o&&"string"==typeof e)r=e,o=this.length,e=0;else if(isFinite(e))e>>>=0,isFinite(o)?(o>>>=0,void 0===r&&(r="utf8")):(r=o,o=void 0);else throw Error("Buffer.write(string, encoding, offset[, length]) is no longer supported");var n,a,i,s,l,c,f,u,d=this.length-e;if((void 0===o||o>d)&&(o=d),t.length>0&&(o<0||e<0)||e>this.length)throw RangeError("Attempt to write outside buffer bounds");r||(r="utf8");for(var p=!1;;)switch(r){case"hex":return function(t,e,o,r){o=Number(o)||0;var n=t.length-o;r?(r=Number(r))>n&&(r=n):r=n;var a=e.length;r>a/2&&(r=a/2);for(var i=0;i<r;++i){var s,l=parseInt(e.substr(2*i,2),16);if((s=l)!=s)break;t[o+i]=l}return i}(this,t,e,o);case"utf8":case"utf-8":return n=e,a=o,N(j(t,this.length-n),this,n,a);case"ascii":return i=e,s=o,N(E(t),this,i,s);case"latin1":case"binary":return function(t,e,o,r){return N(E(e),t,o,r)}(this,t,e,o);case"base64":return l=e,c=o,N(k(t),this,l,c);case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return f=e,u=o,N(function(t,e){for(var o,r,n=[],a=0;a<t.length&&!((e-=2)<0);++a)r=(o=t.charCodeAt(a))>>8,n.push(o%256),n.push(r);return n}(t,this.length-f),this,f,u);default:if(p)throw TypeError("Unknown encoding: "+r);r=(""+r).toLowerCase(),p=!0}},s.prototype.toJSON=function(){return{type:"Buffer",data:Array.prototype.slice.call(this._arr||this,0)}},s.prototype.slice=function(t,e){var o=this.length;t=~~t,e=void 0===e?o:~~e,t<0?(t+=o)<0&&(t=0):t>o&&(t=o),e<0?(e+=o)<0&&(e=0):e>o&&(e=o),e<t&&(e=t);var r=this.subarray(t,e);return Object.setPrototypeOf(r,s.prototype),r},s.prototype.readUIntLE=function(t,e,o){t>>>=0,e>>>=0,o||b(t,e,this.length);for(var r=this[t],n=1,a=0;++a<e&&(n*=256);)r+=this[t+a]*n;return r},s.prototype.readUIntBE=function(t,e,o){t>>>=0,e>>>=0,o||b(t,e,this.length);for(var r=this[t+--e],n=1;e>0&&(n*=256);)r+=this[t+--e]*n;return r},s.prototype.readUInt8=function(t,e){return t>>>=0,e||b(t,1,this.length),this[t]},s.prototype.readUInt16LE=function(t,e){return t>>>=0,e||b(t,2,this.length),this[t]|this[t+1]<<8},s.prototype.readUInt16BE=function(t,e){return t>>>=0,e||b(t,2,this.length),this[t]<<8|this[t+1]},s.prototype.readUInt32LE=function(t,e){return t>>>=0,e||b(t,4,this.length),(this[t]|this[t+1]<<8|this[t+2]<<16)+0x1000000*this[t+3]},s.prototype.readUInt32BE=function(t,e){return t>>>=0,e||b(t,4,this.length),0x1000000*this[t]+(this[t+1]<<16|this[t+2]<<8|this[t+3])},s.prototype.readIntLE=function(t,e,o){t>>>=0,e>>>=0,o||b(t,e,this.length);for(var r=this[t],n=1,a=0;++a<e&&(n*=256);)r+=this[t+a]*n;return r>=(n*=128)&&(r-=Math.pow(2,8*e)),r},s.prototype.readIntBE=function(t,e,o){t>>>=0,e>>>=0,o||b(t,e,this.length);for(var r=e,n=1,a=this[t+--r];r>0&&(n*=256);)a+=this[t+--r]*n;return a>=(n*=128)&&(a-=Math.pow(2,8*e)),a},s.prototype.readInt8=function(t,e){return(t>>>=0,e||b(t,1,this.length),128&this[t])?-((255-this[t]+1)*1):this[t]},s.prototype.readInt16LE=function(t,e){t>>>=0,e||b(t,2,this.length);var o=this[t]|this[t+1]<<8;return 32768&o?0xffff0000|o:o},s.prototype.readInt16BE=function(t,e){t>>>=0,e||b(t,2,this.length);var o=this[t+1]|this[t]<<8;return 32768&o?0xffff0000|o:o},s.prototype.readInt32LE=function(t,e){return t>>>=0,e||b(t,4,this.length),this[t]|this[t+1]<<8|this[t+2]<<16|this[t+3]<<24},s.prototype.readInt32BE=function(t,e){return t>>>=0,e||b(t,4,this.length),this[t]<<24|this[t+1]<<16|this[t+2]<<8|this[t+3]},s.prototype.readFloatLE=function(t,e){return t>>>=0,e||b(t,4,this.length),n.read(this,t,!0,23,4)},s.prototype.readFloatBE=function(t,e){return t>>>=0,e||b(t,4,this.length),n.read(this,t,!1,23,4)},s.prototype.readDoubleLE=function(t,e){return t>>>=0,e||b(t,8,this.length),n.read(this,t,!0,52,8)},s.prototype.readDoubleBE=function(t,e){return t>>>=0,e||b(t,8,this.length),n.read(this,t,!1,52,8)},s.prototype.writeUIntLE=function(t,e,o,r){if(t*=1,e>>>=0,o>>>=0,!r){var n=Math.pow(2,8*o)-1;_(this,t,e,o,n,0)}var a=1,i=0;for(this[e]=255&t;++i<o&&(a*=256);)this[e+i]=t/a&255;return e+o},s.prototype.writeUIntBE=function(t,e,o,r){if(t*=1,e>>>=0,o>>>=0,!r){var n=Math.pow(2,8*o)-1;_(this,t,e,o,n,0)}var a=o-1,i=1;for(this[e+a]=255&t;--a>=0&&(i*=256);)this[e+a]=t/i&255;return e+o},s.prototype.writeUInt8=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,1,255,0),this[e]=255&t,e+1},s.prototype.writeUInt16LE=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,2,65535,0),this[e]=255&t,this[e+1]=t>>>8,e+2},s.prototype.writeUInt16BE=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,2,65535,0),this[e]=t>>>8,this[e+1]=255&t,e+2},s.prototype.writeUInt32LE=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,4,0xffffffff,0),this[e+3]=t>>>24,this[e+2]=t>>>16,this[e+1]=t>>>8,this[e]=255&t,e+4},s.prototype.writeUInt32BE=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,4,0xffffffff,0),this[e]=t>>>24,this[e+1]=t>>>16,this[e+2]=t>>>8,this[e+3]=255&t,e+4},s.prototype.writeIntLE=function(t,e,o,r){if(t*=1,e>>>=0,!r){var n=Math.pow(2,8*o-1);_(this,t,e,o,n-1,-n)}var a=0,i=1,s=0;for(this[e]=255&t;++a<o&&(i*=256);)t<0&&0===s&&0!==this[e+a-1]&&(s=1),this[e+a]=(t/i|0)-s&255;return e+o},s.prototype.writeIntBE=function(t,e,o,r){if(t*=1,e>>>=0,!r){var n=Math.pow(2,8*o-1);_(this,t,e,o,n-1,-n)}var a=o-1,i=1,s=0;for(this[e+a]=255&t;--a>=0&&(i*=256);)t<0&&0===s&&0!==this[e+a+1]&&(s=1),this[e+a]=(t/i|0)-s&255;return e+o},s.prototype.writeInt8=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,1,127,-128),t<0&&(t=255+t+1),this[e]=255&t,e+1},s.prototype.writeInt16LE=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,2,32767,-32768),this[e]=255&t,this[e+1]=t>>>8,e+2},s.prototype.writeInt16BE=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,2,32767,-32768),this[e]=t>>>8,this[e+1]=255&t,e+2},s.prototype.writeInt32LE=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,4,0x7fffffff,-0x80000000),this[e]=255&t,this[e+1]=t>>>8,this[e+2]=t>>>16,this[e+3]=t>>>24,e+4},s.prototype.writeInt32BE=function(t,e,o){return t*=1,e>>>=0,o||_(this,t,e,4,0x7fffffff,-0x80000000),t<0&&(t=0xffffffff+t+1),this[e]=t>>>24,this[e+1]=t>>>16,this[e+2]=t>>>8,this[e+3]=255&t,e+4},s.prototype.writeFloatLE=function(t,e,o){return w(this,t,e,!0,o)},s.prototype.writeFloatBE=function(t,e,o){return w(this,t,e,!1,o)},s.prototype.writeDoubleLE=function(t,e,o){return T(this,t,e,!0,o)},s.prototype.writeDoubleBE=function(t,e,o){return T(this,t,e,!1,o)},s.prototype.copy=function(t,e,o,r){if(!s.isBuffer(t))throw TypeError("argument should be a Buffer");if(o||(o=0),r||0===r||(r=this.length),e>=t.length&&(e=t.length),e||(e=0),r>0&&r<o&&(r=o),r===o||0===t.length||0===this.length)return 0;if(e<0)throw RangeError("targetStart out of bounds");if(o<0||o>=this.length)throw RangeError("Index out of range");if(r<0)throw RangeError("sourceEnd out of bounds");r>this.length&&(r=this.length),t.length-e<r-o&&(r=t.length-e+o);var n=r-o;if(this===t&&"function"==typeof Uint8Array.prototype.copyWithin)this.copyWithin(e,o,r);else if(this===t&&o<e&&e<r)for(var a=n-1;a>=0;--a)t[a+e]=this[a+o];else Uint8Array.prototype.set.call(t,this.subarray(o,r),e);return n},s.prototype.fill=function(t,e,o,r){if("string"==typeof t){if("string"==typeof e?(r=e,e=0,o=this.length):"string"==typeof o&&(r=o,o=this.length),void 0!==r&&"string"!=typeof r)throw TypeError("encoding must be a string");if("string"==typeof r&&!s.isEncoding(r))throw TypeError("Unknown encoding: "+r);if(1===t.length){var n,a=t.charCodeAt(0);("utf8"===r&&a<128||"latin1"===r)&&(t=a)}}else"number"==typeof t?t&=255:"boolean"==typeof t&&(t=Number(t));if(e<0||this.length<e||this.length<o)throw RangeError("Out of range index");if(o<=e)return this;if(e>>>=0,o=void 0===o?this.length:o>>>0,t||(t=0),"number"==typeof t)for(n=e;n<o;++n)this[n]=t;else{var i=s.isBuffer(t)?t:s.from(t,r),l=i.length;if(0===l)throw TypeError('The value "'+t+'" is invalid for argument "value"');for(n=0;n<o-e;++n)this[n+e]=i[n%l]}return this};var C=/[^+/0-9A-Za-z-_]/g;function j(t,e){e=e||1/0;for(var o,r=t.length,n=null,a=[],i=0;i<r;++i){if((o=t.charCodeAt(i))>55295&&o<57344){if(!n){if(o>56319||i+1===r){(e-=3)>-1&&a.push(239,191,189);continue}n=o;continue}if(o<56320){(e-=3)>-1&&a.push(239,191,189),n=o;continue}o=(n-55296<<10|o-56320)+65536}else n&&(e-=3)>-1&&a.push(239,191,189);if(n=null,o<128){if((e-=1)<0)break;a.push(o)}else if(o<2048){if((e-=2)<0)break;a.push(o>>6|192,63&o|128)}else if(o<65536){if((e-=3)<0)break;a.push(o>>12|224,o>>6&63|128,63&o|128)}else if(o<1114112){if((e-=4)<0)break;a.push(o>>18|240,o>>12&63|128,o>>6&63|128,63&o|128)}else throw Error("Invalid code point")}return a}function E(t){for(var e=[],o=0;o<t.length;++o)e.push(255&t.charCodeAt(o));return e}function k(t){return r.toByteArray(function(t){if((t=(t=t.split("=")[0]).trim().replace(C,"")).length<2)return"";for(;t.length%4!=0;)t+="=";return t}(t))}function N(t,e,o,r){for(var n=0;n<r&&!(n+o>=e.length)&&!(n>=t.length);++n)e[n+o]=t[n];return n}function L(t,e){return t instanceof e||null!=t&&null!=t.constructor&&null!=t.constructor.name&&t.constructor.name===e.name}var A=function(){for(var t="0123456789abcdef",e=Array(256),o=0;o<16;++o)for(var r=16*o,n=0;n<16;++n)e[r+n]=t[o]+t[n];return e}()},783:function(t,e){e.read=function(t,e,o,r,n){var a,i,s=8*n-r-1,l=(1<<s)-1,c=l>>1,f=-7,u=o?n-1:0,d=o?-1:1,p=t[e+u];for(u+=d,a=p&(1<<-f)-1,p>>=-f,f+=s;f>0;a=256*a+t[e+u],u+=d,f-=8);for(i=a&(1<<-f)-1,a>>=-f,f+=r;f>0;i=256*i+t[e+u],u+=d,f-=8);if(0===a)a=1-c;else{if(a===l)return i?NaN:1/0*(p?-1:1);i+=Math.pow(2,r),a-=c}return(p?-1:1)*i*Math.pow(2,a-r)},e.write=function(t,e,o,r,n,a){var i,s,l,c=8*a-n-1,f=(1<<c)-1,u=f>>1,d=5960464477539062e-23*(23===n),p=r?0:a-1,m=r?1:-1,h=+(e<0||0===e&&1/e<0);for(isNaN(e=Math.abs(e))||e===1/0?(s=+!!isNaN(e),i=f):(i=Math.floor(Math.log(e)/Math.LN2),e*(l=Math.pow(2,-i))<1&&(i--,l*=2),i+u>=1?e+=d/l:e+=d*Math.pow(2,1-u),e*l>=2&&(i++,l/=2),i+u>=f?(s=0,i=f):i+u>=1?(s=(e*l-1)*Math.pow(2,n),i+=u):(s=e*Math.pow(2,u-1)*Math.pow(2,n),i=0));n>=8;t[o+p]=255&s,p+=m,s/=256,n-=8);for(i=i<<n|s,c+=n;c>0;t[o+p]=255&i,p+=m,i/=256,c-=8);t[o+p-m]|=128*h}}},n={};function a(t){var e=n[t];if(void 0!==e)return e.exports;var o=n[t]={exports:{}},i=!0;try{r[t](o,o.exports,a),i=!1}finally{i&&delete n[t]}return o.exports}a.ab="/ROOT/node_modules/next/dist/compiled/buffer/",e.exports=a(72)},19298,(t,e,o)=>{"use strict";var r,n="object"==typeof Reflect?Reflect:null,a=n&&"function"==typeof n.apply?n.apply:function(t,e,o){return Function.prototype.apply.call(t,e,o)};r=n&&"function"==typeof n.ownKeys?n.ownKeys:Object.getOwnPropertySymbols?function(t){return Object.getOwnPropertyNames(t).concat(Object.getOwnPropertySymbols(t))}:function(t){return Object.getOwnPropertyNames(t)};var i=Number.isNaN||function(t){return t!=t};function s(){s.init.call(this)}e.exports=s,e.exports.once=function(t,e){return new Promise(function(o,r){var n,a,i;function s(o){t.removeListener(e,l),r(o)}function l(){"function"==typeof t.removeListener&&t.removeListener("error",s),o([].slice.call(arguments))}g(t,e,l,{once:!0}),"error"!==e&&(n=t,a=s,i={once:!0},"function"==typeof n.on&&g(n,"error",a,i))})},s.EventEmitter=s,s.prototype._events=void 0,s.prototype._eventsCount=0,s.prototype._maxListeners=void 0;var l=10;function c(t){if("function"!=typeof t)throw TypeError('The "listener" argument must be of type Function. Received type '+typeof t)}function f(t){return void 0===t._maxListeners?s.defaultMaxListeners:t._maxListeners}function u(t,e,o,r){if(c(o),void 0===(a=t._events)?(a=t._events=Object.create(null),t._eventsCount=0):(void 0!==a.newListener&&(t.emit("newListener",e,o.listener?o.listener:o),a=t._events),i=a[e]),void 0===i)i=a[e]=o,++t._eventsCount;else if("function"==typeof i?i=a[e]=r?[o,i]:[i,o]:r?i.unshift(o):i.push(o),(n=f(t))>0&&i.length>n&&!i.warned){i.warned=!0;var n,a,i,s=Error("Possible EventEmitter memory leak detected. "+i.length+" "+String(e)+" listeners added. Use emitter.setMaxListeners() to increase limit");s.name="MaxListenersExceededWarning",s.emitter=t,s.type=e,s.count=i.length,console&&console.warn&&console.warn(s)}return t}function d(){if(!this.fired)return(this.target.removeListener(this.type,this.wrapFn),this.fired=!0,0==arguments.length)?this.listener.call(this.target):this.listener.apply(this.target,arguments)}function p(t,e,o){var r={fired:!1,wrapFn:void 0,target:t,type:e,listener:o},n=d.bind(r);return n.listener=o,r.wrapFn=n,n}function m(t,e,o){var r=t._events;if(void 0===r)return[];var n=r[e];return void 0===n?[]:"function"==typeof n?o?[n.listener||n]:[n]:o?function(t){for(var e=Array(t.length),o=0;o<e.length;++o)e[o]=t[o].listener||t[o];return e}(n):y(n,n.length)}function h(t){var e=this._events;if(void 0!==e){var o=e[t];if("function"==typeof o)return 1;if(void 0!==o)return o.length}return 0}function y(t,e){for(var o=Array(e),r=0;r<e;++r)o[r]=t[r];return o}function g(t,e,o,r){if("function"==typeof t.on)r.once?t.once(e,o):t.on(e,o);else if("function"==typeof t.addEventListener)t.addEventListener(e,function n(a){r.once&&t.removeEventListener(e,n),o(a)});else throw TypeError('The "emitter" argument must be of type EventEmitter. Received type '+typeof t)}Object.defineProperty(s,"defaultMaxListeners",{enumerable:!0,get:function(){return l},set:function(t){if("number"!=typeof t||t<0||i(t))throw RangeError('The value of "defaultMaxListeners" is out of range. It must be a non-negative number. Received '+t+".");l=t}}),s.init=function(){(void 0===this._events||this._events===Object.getPrototypeOf(this)._events)&&(this._events=Object.create(null),this._eventsCount=0),this._maxListeners=this._maxListeners||void 0},s.prototype.setMaxListeners=function(t){if("number"!=typeof t||t<0||i(t))throw RangeError('The value of "n" is out of range. It must be a non-negative number. Received '+t+".");return this._maxListeners=t,this},s.prototype.getMaxListeners=function(){return f(this)},s.prototype.emit=function(t){for(var e=[],o=1;o<arguments.length;o++)e.push(arguments[o]);var r="error"===t,n=this._events;if(void 0!==n)r=r&&void 0===n.error;else if(!r)return!1;if(r){if(e.length>0&&(i=e[0]),i instanceof Error)throw i;var i,s=Error("Unhandled error."+(i?" ("+i.message+")":""));throw s.context=i,s}var l=n[t];if(void 0===l)return!1;if("function"==typeof l)a(l,this,e);else for(var c=l.length,f=y(l,c),o=0;o<c;++o)a(f[o],this,e);return!0},s.prototype.addListener=function(t,e){return u(this,t,e,!1)},s.prototype.on=s.prototype.addListener,s.prototype.prependListener=function(t,e){return u(this,t,e,!0)},s.prototype.once=function(t,e){return c(e),this.on(t,p(this,t,e)),this},s.prototype.prependOnceListener=function(t,e){return c(e),this.prependListener(t,p(this,t,e)),this},s.prototype.removeListener=function(t,e){var o,r,n,a,i;if(c(e),void 0===(r=this._events)||void 0===(o=r[t]))return this;if(o===e||o.listener===e)0==--this._eventsCount?this._events=Object.create(null):(delete r[t],r.removeListener&&this.emit("removeListener",t,o.listener||e));else if("function"!=typeof o){for(n=-1,a=o.length-1;a>=0;a--)if(o[a]===e||o[a].listener===e){i=o[a].listener,n=a;break}if(n<0)return this;0===n?o.shift():function(t,e){for(;e+1<t.length;e++)t[e]=t[e+1];t.pop()}(o,n),1===o.length&&(r[t]=o[0]),void 0!==r.removeListener&&this.emit("removeListener",t,i||e)}return this},s.prototype.off=s.prototype.removeListener,s.prototype.removeAllListeners=function(t){var e,o,r;if(void 0===(o=this._events))return this;if(void 0===o.removeListener)return 0==arguments.length?(this._events=Object.create(null),this._eventsCount=0):void 0!==o[t]&&(0==--this._eventsCount?this._events=Object.create(null):delete o[t]),this;if(0==arguments.length){var n,a=Object.keys(o);for(r=0;r<a.length;++r)"removeListener"!==(n=a[r])&&this.removeAllListeners(n);return this.removeAllListeners("removeListener"),this._events=Object.create(null),this._eventsCount=0,this}if("function"==typeof(e=o[t]))this.removeListener(t,e);else if(void 0!==e)for(r=e.length-1;r>=0;r--)this.removeListener(t,e[r]);return this},s.prototype.listeners=function(t){return m(this,t,!0)},s.prototype.rawListeners=function(t){return m(this,t,!1)},s.listenerCount=function(t,e){return"function"==typeof t.listenerCount?t.listenerCount(e):h.call(t,e)},s.prototype.listenerCount=h,s.prototype.eventNames=function(){return this._eventsCount>0?r(this._events):[]}},34582,(t,e,o)=>{"use strict";o.byteLength=function(t){var e=c(t),o=e[0],r=e[1];return(o+r)*3/4-r},o.toByteArray=function(t){var e,o,r=c(t),i=r[0],s=r[1],l=new a((i+s)*3/4-s),f=0,u=s>0?i-4:i;for(o=0;o<u;o+=4)e=n[t.charCodeAt(o)]<<18|n[t.charCodeAt(o+1)]<<12|n[t.charCodeAt(o+2)]<<6|n[t.charCodeAt(o+3)],l[f++]=e>>16&255,l[f++]=e>>8&255,l[f++]=255&e;return 2===s&&(e=n[t.charCodeAt(o)]<<2|n[t.charCodeAt(o+1)]>>4,l[f++]=255&e),1===s&&(e=n[t.charCodeAt(o)]<<10|n[t.charCodeAt(o+1)]<<4|n[t.charCodeAt(o+2)]>>2,l[f++]=e>>8&255,l[f++]=255&e),l},o.fromByteArray=function(t){for(var e,o=t.length,n=o%3,a=[],i=0,s=o-n;i<s;i+=16383)a.push(function(t,e,o){for(var n,a=[],i=e;i<o;i+=3)n=(t[i]<<16&0xff0000)+(t[i+1]<<8&65280)+(255&t[i+2]),a.push(r[n>>18&63]+r[n>>12&63]+r[n>>6&63]+r[63&n]);return a.join("")}(t,i,i+16383>s?s:i+16383));return 1===n?a.push(r[(e=t[o-1])>>2]+r[e<<4&63]+"=="):2===n&&a.push(r[(e=(t[o-2]<<8)+t[o-1])>>10]+r[e>>4&63]+r[e<<2&63]+"="),a.join("")};for(var r=[],n=[],a="u">typeof Uint8Array?Uint8Array:Array,i="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",s=0,l=i.length;s<l;++s)r[s]=i[s],n[i.charCodeAt(s)]=s;function c(t){var e=t.length;if(e%4>0)throw Error("Invalid string. Length must be a multiple of 4");var o=t.indexOf("=");-1===o&&(o=e);var r=o===e?0:4-o%4;return[o,r]}n[45]=62,n[95]=63},62565,t=>{"use strict";var e=t.i(43476),o=t.i(71645),r=t.i(57055),n=t.i(62917),a=t.i(9113),i=t.i(29336),s=t.i(15233),l=t.i(36783),c=t.i(42836),f=t.i(55487),u=t.i(18566),d=t.i(1268);t.s(["default",0,function({isMainPreview:t=!1}){let[p,m]=(0,o.useState)(!1);(0,o.useEffect)(()=>{m(!0)},[]);let h=(0,u.useSearchParams)().get("id"),y={ResumeTemplate1:r.default,ResumeTemplate2:n.default,ResumeTemplate3:a.default,ResumeTemplate4:i.default,ResumeTemplate5:s.default,ResumeTemplate6:l.default,ResumeTemplate7:c.default},g=(0,f.useSelector)(t=>{let e=Array.isArray(t.resume.resumes)?t.resume.resumes:[];return e.find(t=>t.id===h)?.configuration||{}}),v=y[g.selected_theme]||r.default,b=(0,d.getResumeCustomizationClasses)(g);return p?(0,e.jsxs)(e.Fragment,{children:[(0,e.jsx)("div",{className:"review-resume-div custom-container",children:v?(0,e.jsx)(v,{isForDownload:t,additionalClass:b}):(0,e.jsx)(e.Fragment,{})}),(0,e.jsx)("div",{className:"offcanvas offcanvas-start","data-bs-scroll":"true","data-bs-backdrop":"false",tabIndex:"-1",id:"reviewOffcanvas","aria-labelledby":"reviewOffcanvasLabel",children:(0,e.jsxs)("div",{className:"offcanvas-resume-sidebar custom-container",children:[(0,e.jsxs)("div",{className:"review-offcanvas-header",children:[(0,e.jsx)("h5",{children:"Preview"}),(0,e.jsx)("button",{type:"button",className:"btn-close","data-bs-dismiss":"offcanvas","aria-label":"Close"})]}),(0,e.jsx)("div",{className:"scroll-div",children:v?(0,e.jsx)(v,{isForDownload:!1,additionalClass:b}):(0,e.jsx)(e.Fragment,{})})]})})]}):null}])},38927,t=>{"use strict";var e=t.i(43476),o=t.i(71645),r=t.i(70319),n=t.i(57055),a=t.i(62917),i=t.i(9113),s=t.i(29336),l=t.i(15233),c=t.i(36783),f=t.i(42836),u=t.i(18566),d=t.i(22016),p=t.i(55487),m=t.i(23680),h=t.i(62565),y=t.i(74881),g=t.i(78631),v=t.i(16992),b=t.i(1268);let _=[{id:"ResumeTemplate1",component:n.default},{id:"ResumeTemplate2",component:a.default},{id:"ResumeTemplate3",component:i.default},{id:"ResumeTemplate4",component:s.default},{id:"ResumeTemplate5",component:l.default},{id:"ResumeTemplate6",component:c.default},{id:"ResumeTemplate7",component:f.default}];t.s(["default",0,function(){let t=(0,u.useSearchParams)().get("id"),[n,a]=(0,o.useState)(!1),i=(0,o.useRef)(null),[s,l]=(0,o.useState)([0,1,2]),[c,f]=(0,o.useState)(),[x,w]=(0,o.useState)(),T=(0,p.useSelector)(e=>{let o=Array.isArray(e.resume.resumes)?e.resume.resumes:[];return o.find(e=>e.id===t)?.configuration||{font_style:"poppins",layout_style:"all",color_palette:"color-1",selected_theme:"ResumeTemplate1"}}),C=(0,p.useSelector)(e=>{let o=Array.isArray(e.resume.resumes)?e.resume.resumes:[];return o.find(e=>e.id===t)?.resume_name||"Resume Name"}),j=(0,p.useSelector)(e=>(Array.isArray(e.resume.resumes)?e.resume.resumes:[]).find(e=>e.id===t)||null),[E,k]=(0,o.useState)({...T,layout_style:"all"}),N=(0,b.getResumeCustomizationClasses)(E),[L,A]=(0,o.useState)(!1),[I,B]=(0,o.useState)(100);(0,o.useEffect)(()=>{let t=()=>{B(80)};return t(),window.addEventListener("resize",t),()=>window.removeEventListener("resize",t)},[]);let R=(0,p.useDispatch)(),O=(0,o.useRef)(null);(0,o.useEffect)(()=>{if(L&&O.current){let t=O.current;t.focus();let e=document.createRange(),o=window.getSelection();e.selectNodeContents(t),e.collapse(!1),o.removeAllRanges(),o.addRange(e)}},[L]);let S=(t,e)=>{k({...E,[t]:e})};(0,o.useEffect)(()=>{R((0,m.setResumeConfigration)({id:t,data:E}))},[E,R]);let M=t=>{l(e=>e.includes(t)?e.filter(e=>e!==t):[...e,t])},P=(0,o.useRef)();(0,o.useEffect)(()=>{let t=t=>{P.current&&!P.current.contains(t.target)&&f()};return document.addEventListener("mousedown",t),()=>document.removeEventListener("mousedown",t)},[]);let U=(0,o.useRef)();(0,o.useEffect)(()=>{let t=t=>{U.current&&!U.current.contains(t.target)&&w()};return document.addEventListener("mousedown",t),()=>document.removeEventListener("mousedown",t)},[]),(0,o.useEffect)(()=>{R((0,m.setPreviewResumeSize)(I))},[I]);let z=(0,o.useRef)(null),$=()=>{z.current&&(clearInterval(z.current),z.current=null)},D=()=>{z.current||(B(t=>t<100?t+1:t),z.current=setInterval(()=>{B(t=>t<100?t+1:($(),t))},70))},F=()=>{z.current||(B(t=>t>40?t-1:t),z.current=setInterval(()=>{B(t=>t>40?t-1:($(),t))},70))};(0,o.useEffect)(()=>()=>$(),[]);let H=t=>{if(!t||"string"!=typeof t||-1===t.indexOf("color("))return t;try{return t.replace(/color\([^)]*\)/gi,t=>{let e=t.match(/[\d.]+/g)||[];if(e.length>=3){let t=parseFloat(e[0]),o=parseFloat(e[1]),r=parseFloat(e[2]),n=void 0!==e[3]?parseFloat(e[3]):1;return t<=1&&o<=1&&r<=1?(t=Math.round(255*t),o=Math.round(255*o),r=Math.round(255*r)):(t=Math.round(t),o=Math.round(o),r=Math.round(r)),n&&0!==n||(n=1),`rgba(${t}, ${o}, ${r}, ${n})`}return t})}catch(e){return t}},V=()=>{let t=i.current;return t?t.querySelector("#resume-download-area"):null},X=async()=>{a(!0);try{await (0,v.createResumePdf)({resume:j||{},fileName:C||"resume",selectedTheme:E?.selected_theme||"ResumeTemplate1",palette:E?.color_palette||"color-1",selectedFont:E?.font_style})}catch(t){console.error("PDF generation failed:",t),r.toast.error("PDF download failed. Please try again.",{position:"top-right",autoClose:3e3,theme:"light"})}finally{a(!1)}},q=()=>{let t,e,o=i.current?.querySelector("#resume-download-area");if(!o)return void window.print();t=document.getElementById("__resume_print_root__"),e=document.getElementById("__resume_print_style__"),t&&t.remove(),e&&e.remove();let r=document.createElement("div");r.id="__resume_print_root__",r.style.cssText=`
            display: none;
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            z-index: 9999999;
            background: #fff;
        `;let n=document.createElement("div");n.className=`print-wrapper ${N}`,n.style.cssText=`
            width: 100%;
            margin: 0;
            padding: 0;
        `;let a=o.cloneNode(!0);a.style.cssText=`
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            transform: none !important;
            box-shadow: none !important;
            overflow: visible !important;
            position: static !important;
        `;try{((t,e)=>{try{let o=t.querySelectorAll("*"),r=e.querySelectorAll("*"),n=Math.min(o.length,r.length);for(let t=0;t<n;t++){let e=o[t],n=r[t];if(!e||!n)continue;let a=window.getComputedStyle(e);["color","background-color","border-top-color","border-right-color","border-bottom-color","border-left-color","box-shadow","outline-color","text-decoration-color","fill","stroke","background-image"].forEach(t=>{try{let e=a.getPropertyValue(t);if(e){let o=H(e);if(n.style.setProperty(t,o,"important"),-1!==o.indexOf("color("))try{console.warn("Unconverted color() in sanitize:",{prop:t,value:e,converted:o})}catch(t){}}}catch(t){}})}}catch(t){}})(o,a)}catch(t){}n.appendChild(a),r.appendChild(n),document.body.appendChild(r);let s=document.createElement("style");s.id="__resume_print_style__",s.innerHTML=`
            @media print {
                body > *:not(#__resume_print_root__) {
                    display: none !important;
                    visibility: hidden !important;
                }
                html, body {
                    height: auto !important;
                    min-height: auto !important;
                    width: 210mm !important;
                    margin: 0 !important;
                    overflow: visible !important;
                    background: #fff !important;
                }
                #__resume_print_root__ {
                    display: block !important;
                    position: relative !important;
                    width: 210mm !important;
                    max-width: 100% !important;
                    height: auto !important;
                    margin: 0 !important;
                    padding: 0 !important;
                    background: #fff !important;
                    overflow: visible !important;
                }
                #__resume_print_root__ * {
                    visibility: visible !important;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                    color-adjust: exact !important;
                }
                @page {
                    size: A4 portrait;
                    margin: 0 !important;
                }
            }
        `,document.head.appendChild(s);let l=document.title;document.title=C||"Resume";let c=()=>{document.title=l;let t=document.getElementById("__resume_print_root__"),e=document.getElementById("__resume_print_style__");t&&t.remove(),e&&e.remove(),window.removeEventListener("afterprint",c)};window.addEventListener("afterprint",c),setTimeout(()=>{let t=window.open("","_blank","width=800,height=900");if(t){t.document.write("<html><head><title>Resume</title></head><body></body></html>"),t.document.close(),t.focus(),t.document.body.innerHTML=r.innerHTML;let e=t.document.createElement("style");e.innerHTML=`
                    @page { size: A4 portrait; margin: 0; }
                    html, body { margin: 0; padding: 0; background: #fff; }
                    body { width: 210mm; }
                    * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; color-adjust: exact !important; }
                `,t.document.head.appendChild(e),t.print(),t.addEventListener("afterprint",()=>{c(),t.close()})}else window.print(),setTimeout(c,1e3)},150)},Y=(t,e)=>{k({...E,[t]:e})};return(0,e.jsxs)(e.Fragment,{children:[(0,e.jsx)("style",{dangerouslySetInnerHTML:{__html:`
                /* ── LOADER ───────────────────────────────────────────── */
                .loader-div {
                    position: fixed !important;
                    inset: 0 !important;
                    z-index: 999999 !important;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: rgba(0, 0, 0, 0.6) !important;
                }

                /* ── NATIVE PRINT FIX ─────────────────────────────────── */
                @media print {
                    body > *:not(#__resume_print_root__) {
                        display: none !important;
                        visibility: hidden !important;
                    }
                    html, body {
                        height: auto !important;
                        min-height: auto !important;
                        overflow: visible !important;
                    }
                    #__resume_print_root__ {
                        display: block !important;
                        position: relative !important;
                        width: 100% !important;
                        height: auto !important;
                        margin: 0 !important;
                        padding: 0 !important;
                        background: #fff !important;
                        overflow: visible !important;
                    }
                    #__resume_print_root__ * {
                        visibility: visible !important;
                        -webkit-print-color-adjust: exact !important;
                        print-color-adjust: exact !important;
                        color-adjust: exact !important;
                    }
                    * {
                        -webkit-print-color-adjust: exact !important;
                        print-color-adjust: exact !important;
                        color-adjust: exact !important;
                    }
                    @page {
                        size: A4 portrait;
                        margin-top: 15mm !important;
                        margin-bottom: 15mm !important;
                        margin-left: 0 !important;
                        margin-right: 0 !important;
                    }
                    @page :first {
                        margin-top: 0 !important;
                    }
                }
            `}}),(0,e.jsxs)("section",{className:"show-resume-section pb-5 pb-md-0 mb-5 mb-md-0",children:[(0,e.jsxs)("div",{className:"left-customize-and-resumes-div",children:[(0,e.jsxs)("div",{className:"tabs-btn-div nav nav-tabs",children:[(0,e.jsxs)("button",{type:"button",className:"active nav-item","data-bs-toggle":"tab","data-bs-target":"#templates",children:[(0,e.jsxs)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",children:[(0,e.jsx)("path",{d:"M15 2.5V4C15 5.414 15 6.121 15.44 6.56C15.878 7 16.585 7 18 7H19.5",stroke:"white",strokeWidth:"1.5",strokeLinecap:"round",strokeLinejoin:"round"}),(0,e.jsx)("path",{d:"M8 11H16M8 14H16M8 17H12.17M4 16V8C4 5.172 4 3.757 4.879 2.879C5.757 2 7.172 2 10 2H14.172C14.58 2 14.785 2 14.969 2.076C15.152 2.152 15.297 2.296 15.586 2.586L19.414 6.414C19.704 6.704 19.848 6.848 19.924 7.032C20 7.215 20 7.42 20 7.828V16C20 18.828 20 20.243 19.121 21.121C18.243 22 16.828 22 14 22H10C7.172 22 5.757 22 4.879 21.121C4 20.243 4 18.828 4 16Z",stroke:"#000",strokeWidth:"1.5",strokeLinecap:"round",strokeLinejoin:"round"})]}),"Templates"]}),(0,e.jsxs)("button",{type:"button",className:"nav-item",role:"presentation","data-bs-toggle":"tab","data-bs-target":"#customization",children:[(0,e.jsx)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",children:(0,e.jsx)("path",{d:"M5.25 1.5C5.05109 1.5 4.86032 1.57902 4.71967 1.71967C4.57902 1.86032 4.5 2.05109 4.5 2.25V13.875C4.5 14.5712 4.77656 15.2389 5.26884 15.7312C5.76113 16.2234 6.42881 16.5 7.125 16.5H9V19.5C9 20.2956 9.31607 21.0587 9.87868 21.6213C10.4413 22.1839 11.2044 22.5 12 22.5C12.7956 22.5 13.5587 22.1839 14.1213 21.6213C14.6839 21.0587 15 20.2956 15 19.5V16.5H16.875C17.5712 16.5 18.2389 16.2234 18.7312 15.7312C19.2234 15.2389 19.5 14.5712 19.5 13.875V2.25C19.5 2.05109 19.421 1.86032 19.2803 1.71967C19.1397 1.57902 18.9489 1.5 18.75 1.5H5.25ZM13.5 2.25H15.75V7.125C15.75 7.22446 15.7895 7.31984 15.8598 7.39017C15.9302 7.46049 16.0255 7.5 16.125 7.5C16.2245 7.5 16.3198 7.46049 16.3902 7.39017C16.4605 7.31984 16.5 7.22446 16.5 7.125V2.25H18.75V11.25H5.25V2.25H12.75V5.625C12.75 5.72446 12.7895 5.81984 12.8598 5.89016C12.9302 5.96049 13.0255 6 13.125 6C13.2245 6 13.3198 5.96049 13.3902 5.89016C13.4605 5.81984 13.5 5.72446 13.5 5.625V2.25ZM5.25 12H18.75V13.875C18.75 14.3723 18.5525 14.8492 18.2008 15.2008C17.8492 15.5525 17.3723 15.75 16.875 15.75H15C14.8011 15.75 14.6103 15.829 14.4697 15.9697C14.329 16.1103 14.25 16.3011 14.25 16.5V19.5C14.25 20.0967 14.0129 20.669 13.591 21.091C13.169 21.5129 12.5967 21.75 12 21.75C11.4033 21.75 10.831 21.5129 10.409 21.091C9.98705 20.669 9.75 20.0967 9.75 19.5V16.5C9.75 16.3011 9.67098 16.1103 9.53033 15.9697C9.38968 15.829 9.19891 15.75 9 15.75H7.125C6.62772 15.75 6.15081 15.5525 5.79917 15.2008C5.44754 14.8492 5.25 14.3723 5.25 13.875V12Z",stroke:"#000",strokeWidth:"1"})}),"Customization"]})]}),(0,e.jsxs)("div",{className:"tab-content costomize-tab-content",children:[(0,e.jsx)("div",{className:"tab-pane fade show active",id:"templates",role:"tabpanel",children:(0,e.jsx)("div",{className:"row gx-3 gy-0",children:_.filter(t=>!E?.layout_style||E?.layout_style==="all"||t.component.layoutStyle===E?.layout_style).map(t=>{let o=t.component;return(0,e.jsx)("div",{className:`col-md-6 mb-2 ${E?.selected_theme===t.id?"active":""}`,children:(0,e.jsxs)("label",{className:"each-resume-label",children:[(0,e.jsx)("input",{type:"radio",name:"selectResume",checked:E?.selected_theme===t.id,onChange:()=>S("selected_theme",t.id),hidden:!0}),(0,e.jsx)("img",{src:"/front-assets/images/icons/resume-selected.svg",className:"img-fluid resume-selected-icon",alt:"Checked"}),(0,e.jsx)(o,{isStatic:!0,additionalClass:N})]})},t.id)})})}),(0,e.jsx)("div",{className:"tab-pane fade",id:"customization",role:"tabpanel",children:(0,e.jsxs)("div",{className:"customization-div",children:[(0,e.jsx)("p",{className:"heading fs-mob-20",children:"Customization"}),(0,e.jsxs)("div",{className:`each-collapse-div ${s.includes(0)?"active":""}`,children:[(0,e.jsx)("button",{type:"button",className:"collapse-btn",onClick:()=>M(0),children:"Font Style Options"}),(0,e.jsxs)("div",{className:"collapse-content",children:[(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"fontStyle",checked:E?.font_style==="poppins",onChange:()=>S("font_style","poppins"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Poppins"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"fontStyle",checked:E?.font_style==="roboto",onChange:()=>S("font_style","roboto"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Roboto"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"fontStyle",checked:E?.font_style==="arial",onChange:()=>S("font_style","arial"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Arial"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"fontStyle",checked:E?.font_style==="montserrat",onChange:()=>S("font_style","montserrat"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Montserrat"]})]})]}),(0,e.jsxs)("div",{className:`each-collapse-div ${s.includes(1)?"active":""}`,children:[(0,e.jsx)("button",{type:"button",className:"collapse-btn",onClick:()=>M(1),children:"Layout Style"}),(0,e.jsxs)("div",{className:"collapse-content",children:[(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"layoutStyle",checked:!E?.layout_style||E?.layout_style==="all",onChange:()=>Y("layout_style","all"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"All"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"layoutStyle",checked:E?.layout_style==="single-column",onChange:()=>Y("layout_style","single-column"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Single Column"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"layoutStyle",checked:E?.layout_style==="two-column",onChange:()=>Y("layout_style","two-column"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Two Column"]})]})]}),(0,e.jsxs)("div",{className:`each-collapse-div ${s.includes(2)?"active":""}`,children:[(0,e.jsx)("button",{type:"button",className:"collapse-btn",onClick:()=>M(2),children:"Color Palette"}),(0,e.jsxs)("div",{className:"collapse-content color-palette-div",children:[(0,e.jsx)("label",{className:"color1",children:(0,e.jsx)("input",{type:"radio",name:"colorPalette",checked:E?.color_palette==="color-1",onChange:()=>S("color_palette","color-1"),hidden:!0})}),(0,e.jsx)("label",{className:"color2",children:(0,e.jsx)("input",{type:"radio",name:"colorPalette",checked:E?.color_palette==="color-2",onChange:()=>S("color_palette","color-2"),hidden:!0})}),(0,e.jsx)("label",{className:"color3",children:(0,e.jsx)("input",{type:"radio",name:"colorPalette",checked:E?.color_palette==="color-3",onChange:()=>S("color_palette","color-3"),hidden:!0})}),(0,e.jsx)("label",{className:"color4",children:(0,e.jsx)("input",{type:"radio",name:"colorPalette",checked:E?.color_palette==="color-4",onChange:()=>S("color_palette","color-4"),hidden:!0})}),(0,e.jsx)("label",{className:"color5",children:(0,e.jsx)("input",{type:"radio",name:"colorPalette",checked:E?.color_palette==="color-5",onChange:()=>S("color_palette","color-5"),hidden:!0})}),(0,e.jsx)("label",{className:"color6",children:(0,e.jsx)("input",{type:"radio",name:"colorPalette",checked:E?.color_palette==="color-6",onChange:()=>S("color_palette","color-6"),hidden:!0})})]})]})]})})]})]}),(0,e.jsxs)("div",{className:"middle-resume-preview-div",children:[(0,e.jsxs)("div",{className:"header-part-div",children:[(0,e.jsxs)("div",{className:!0===L?"resume-name editable-on":"resume-name",children:[(0,e.jsxs)("div",{ref:O,contentEditable:L,suppressContentEditableWarning:!0,id:"resumeName",className:"fs-mob-16",children:[" ",C," "]}),(0,e.jsx)("button",{onClick:()=>A(!0),className:!0===L?"d-none":"d-block",children:(0,e.jsx)("img",{src:"/front-assets/images/icons/pen-icon.svg",alt:"Edit"})}),(0,e.jsx)("button",{onClick:()=>{let e=document.getElementById("resumeName").innerText;e.length>15?r.toast.error("Max 15 characters allowed.",{position:"top-right",autoClose:5e3,closeOnClick:!1,theme:"light"}):(R((0,m.setResumeName)({id:t,data:e})),r.toast.success("Saved successfully.",{position:"top-right",autoClose:5e3,closeOnClick:!1,theme:"light"}),A(!1))},className:!0===L?"d-block":"d-none",children:(0,e.jsx)("img",{src:"/front-assets/images/icons/tick.svg",alt:"Done"})})]}),(0,e.jsxs)("div",{className:"edit-zoom-div",children:[(0,e.jsx)(d.default,{prefetch:!1,href:`/resume/personal-info/?id=${t}`,className:"edit-btn",children:"Edit Details"}),(0,e.jsxs)("div",{className:"zoom-div",children:[(0,e.jsx)("button",{onMouseDown:F,onMouseUp:$,onMouseLeave:$,onTouchStart:F,onTouchEnd:$,className:I<41?"pe-none disabled":"",children:(0,e.jsx)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"14",height:"2",viewBox:"0 0 14 2",fill:"none",children:(0,e.jsx)("path",{d:"M0 1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H13C13.2652 0 13.5196 0.105357 13.7071 0.292893C13.8946 0.48043 14 0.734784 14 1C14 1.26522 13.8946 1.51957 13.7071 1.70711C13.5196 1.89464 13.2652 2 13 2H1C0.734784 2 0.48043 1.89464 0.292893 1.70711C0.105357 1.51957 0 1.26522 0 1Z",fill:"#008AD5"})})}),(0,e.jsxs)("span",{children:[I,"%"]}),(0,e.jsx)("button",{onMouseDown:D,onMouseUp:$,onMouseLeave:$,onTouchStart:D,onTouchEnd:$,className:I>99?"pe-none disabled":"",children:(0,e.jsx)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"14",height:"14",viewBox:"0 0 14 14",fill:"none",children:(0,e.jsx)("path",{d:"M6 8H1C0.71667 8 0.479337 7.904 0.288004 7.712C0.0966702 7.52 0.000670115 7.28267 3.44827e-06 7C-0.000663218 6.71734 0.0953369 6.48 0.288004 6.288C0.48067 6.096 0.718003 6 1 6H6V1C6 0.71667 6.096 0.479337 6.288 0.288004C6.48 0.0966702 6.71734 0.000670115 7 3.44827e-06C7.28267 -0.000663218 7.52034 0.0953369 7.713 0.288004C7.90567 0.48067 8.00134 0.718003 8 1V6H13C13.2833 6 13.521 6.096 13.713 6.288C13.905 6.48 14.0007 6.71734 14 7C13.9993 7.28267 13.9033 7.52034 13.712 7.713C13.5207 7.90567 13.2833 8.00134 13 8H8V13C8 13.2833 7.904 13.521 7.712 13.713C7.52 13.905 7.28267 14.0007 7 14C6.71734 13.9993 6.48 13.9033 6.288 13.712C6.096 13.5207 6 13.2833 6 13V8Z",fill:"#008AD5"})})})]})]})]}),(0,e.jsx)("div",{className:"review-resume-area main-review-resume-div",style:{width:I+"%"},children:(0,e.jsx)("div",{ref:i,className:`print-wrapper review-resume-div ${N}`,children:(0,e.jsx)(h.default,{isMainPreview:!0})})})]}),(0,e.jsxs)("div",{className:"right-download-div",children:[(0,e.jsx)("p",{className:"download-heading",children:"Downloads"}),(0,e.jsxs)("button",{className:"each-btn",onClick:X,children:[(0,e.jsx)("img",{src:"/front-assets/images/icons/download-pdf.svg",alt:"PDF"}),"PDF"]}),(0,e.jsxs)("button",{className:"each-btn",onClick:()=>{let t=V();if(!t)return;let e=t.innerText.split(/\n+/).map((t,e)=>new y.Paragraph({spacing:{after:200},children:[new y.TextRun({text:t.trim(),bold:0===e||/^[A-Z\s]+$/.test(t.trim())||t.trim().length<20})]})),o=new y.Document({sections:[{properties:{},children:e}]});y.Packer.toBlob(o).then(t=>{(0,g.saveAs)(t,"resume.docx")})},children:[(0,e.jsx)("img",{src:"/front-assets/images/icons/download-docx.svg",alt:"DOCX"}),"DOCX"]}),(0,e.jsxs)("button",{className:"each-btn",onClick:()=>{let t=V();if(!t)return void console.error("Resume text section not found!");let e=new Blob([t.innerText],{type:"text/plain"}),o=URL.createObjectURL(e),r=document.createElement("a");r.href=o,r.download="resume.txt",r.click(),URL.revokeObjectURL(o)},children:[(0,e.jsx)("img",{src:"/front-assets/images/icons/download-txt.svg",alt:"TXT"}),"TXT"]}),(0,e.jsx)("p",{className:"download-heading",children:"Printing"}),(0,e.jsxs)("button",{className:"each-btn",onClick:q,children:[(0,e.jsx)("img",{src:"/front-assets/images/icons/print.svg",alt:"Print"}),"Print"]})]}),(0,e.jsxs)("div",{ref:P,className:`mob-customization-slider d-lg-none ${"open"===c?"open":""}`,children:[(0,e.jsxs)("div",{className:"header",children:["Customization",(0,e.jsx)("img",{src:"/front-assets/images/icons/close-cross.svg",onClick:()=>f(),alt:"Close"})]}),(0,e.jsxs)("div",{className:"scroll-div",children:[(0,e.jsxs)("div",{className:`each-collapse-div ${s.includes(0)?"active":""}`,children:[(0,e.jsx)("button",{type:"button",className:"collapse-btn",onClick:()=>M(0),children:"Font Style Options"}),(0,e.jsxs)("div",{className:"collapse-content",children:[(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"fontStyleMob",checked:E?.font_style==="poppins",onChange:()=>S("font_style","poppins"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Poppins"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"fontStyleMob",checked:E?.font_style==="roboto",onChange:()=>S("font_style","roboto"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Roboto"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"fontStyleMob",checked:E?.font_style==="arial",onChange:()=>S("font_style","arial"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Arial"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"fontStyleMob",checked:E?.font_style==="montserrat",onChange:()=>S("font_style","montserrat"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Montserrat"]})]})]}),(0,e.jsxs)("div",{className:`each-collapse-div ${s.includes(1)?"active":""}`,children:[(0,e.jsx)("button",{type:"button",className:"collapse-btn",onClick:()=>M(1),children:"Layout Style"}),(0,e.jsxs)("div",{className:"collapse-content",children:[(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"layoutStyleMob",checked:!E?.layout_style||E?.layout_style==="all",onChange:()=>Y("layout_style","all"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"All"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"layoutStyleMob",checked:E?.layout_style==="single-column",onChange:()=>Y("layout_style","single-column"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Single Column"]}),(0,e.jsxs)("label",{children:[(0,e.jsx)("input",{type:"radio",name:"layoutStyleMob",checked:E?.layout_style==="two-column",onChange:()=>Y("layout_style","two-column"),hidden:!0}),(0,e.jsx)("div",{className:"radio-btn"}),"Two Column"]})]})]}),(0,e.jsxs)("div",{className:`each-collapse-div ${s.includes(2)?"active":""}`,children:[(0,e.jsx)("button",{type:"button",className:"collapse-btn",onClick:()=>M(2),children:"Color Palette"}),(0,e.jsxs)("div",{className:"collapse-content color-palette-div",children:[(0,e.jsx)("label",{className:"color1",children:(0,e.jsx)("input",{type:"radio",name:"colorPaletteMob",checked:E?.color_palette==="color-1",onChange:()=>S("color_palette","color-1"),hidden:!0})}),(0,e.jsx)("label",{className:"color2",children:(0,e.jsx)("input",{type:"radio",name:"colorPaletteMob",checked:E?.color_palette==="color-2",onChange:()=>S("color_palette","color-2"),hidden:!0})}),(0,e.jsx)("label",{className:"color3",children:(0,e.jsx)("input",{type:"radio",name:"colorPaletteMob",checked:E?.color_palette==="color-3",onChange:()=>S("color_palette","color-3"),hidden:!0})}),(0,e.jsx)("label",{className:"color4",children:(0,e.jsx)("input",{type:"radio",name:"colorPaletteMob",checked:E?.color_palette==="color-4",onChange:()=>S("color_palette","color-4"),hidden:!0})}),(0,e.jsx)("label",{className:"color5",children:(0,e.jsx)("input",{type:"radio",name:"colorPaletteMob",checked:E?.color_palette==="color-5",onChange:()=>S("color_palette","color-5"),hidden:!0})}),(0,e.jsx)("label",{className:"color6",children:(0,e.jsx)("input",{type:"radio",name:"colorPaletteMob",checked:E?.color_palette==="color-6",onChange:()=>S("color_palette","color-6"),hidden:!0})})]})]})]})]}),(0,e.jsxs)("div",{ref:U,className:`mob-customization-slider d-lg-none ${"open"===x?"open":""}`,children:[(0,e.jsxs)("div",{className:"header",children:["Templates",(0,e.jsx)("img",{src:"/front-assets/images/icons/close-cross.svg",onClick:()=>w(),alt:"Close"})]}),(0,e.jsx)("div",{className:"scroll-div",children:(0,e.jsx)("div",{className:"row resume-slider-row",children:_.filter(t=>!E?.layout_style||E?.layout_style==="all"||t.component.layoutStyle===E?.layout_style).map(t=>{let o=t.component;return(0,e.jsx)("div",{className:`col-6 mb-2 ${E?.selected_theme===t.id?"active":""}`,children:(0,e.jsxs)("label",{className:"each-resume-label",children:[(0,e.jsx)("input",{type:"radio",name:"selectResumeMob",checked:E?.selected_theme===t.id,onChange:()=>S("selected_theme",t.id),hidden:!0}),(0,e.jsx)("img",{src:"/front-assets/images/icons/resume-selected.svg",className:"img-fluid resume-selected-icon",alt:"Checked"}),(0,e.jsx)(o,{isStatic:!0,additionalClass:N})]})},t.id)})})})]}),(0,e.jsx)("div",{className:"mob-show-bottom-nav custom-container d-lg-none",children:(0,e.jsxs)("div",{className:"form-button-div",children:[(0,e.jsxs)("div",{className:"all-mob-btn-div",children:[(0,e.jsxs)("button",{type:"button",className:"each-btn",onClick:X,children:[(0,e.jsx)("img",{src:"/front-assets/images/icons/download-pdf.svg",width:24,height:24,className:"img-fluid",alt:"PDF"}),"Download"]}),(0,e.jsxs)("button",{type:"button",className:"each-btn",onClick:q,children:[(0,e.jsx)("img",{src:"/front-assets/images/icons/print.svg",width:24,height:24,className:"img-fluid",alt:"Print"}),"Print"]}),(0,e.jsxs)(d.default,{prefetch:!1,href:`/resume/personal-info/?id=${t}`,className:"edit-btn",children:[(0,e.jsx)("img",{src:"/front-assets/images/icons/edit-details.svg",width:22,height:24,className:"img-fluid",alt:"Edit"}),"Edit Details"]})]}),(0,e.jsxs)("div",{className:"template-customization-btn-div mt-2",children:[(0,e.jsx)("button",{type:"button",onClick:()=>w("open"),children:"Templates"}),(0,e.jsx)("button",{type:"button",onClick:()=>f("open"),children:"Customization"})]})]})})]}),n&&(0,e.jsxs)("div",{className:"loader-div flex-column",children:[(0,e.jsx)("img",{src:"/front-assets/images/pleasewait.gif",width:250,alt:"Please wait"}),(0,e.jsx)("p",{className:"text-white m-0",children:"Generating..."})]}),(0,e.jsx)(r.ToastContainer,{})]})}])}]);