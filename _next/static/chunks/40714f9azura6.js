(globalThis.TURBOPACK||(globalThis.TURBOPACK=[])).push(["object"==typeof document?document.currentScript:void 0,7670,t=>{"use strict";t.s(["default",0,function(){for(var t,e,o=0,a="",s=arguments.length;o<s;o++)(t=arguments[o])&&(e=function t(e){var o,a,s="";if("string"==typeof e||"number"==typeof e)s+=e;else if("object"==typeof e)if(Array.isArray(e)){var i=e.length;for(o=0;o<i;o++)e[o]&&(a=t(e[o]))&&(s&&(s+=" "),s+=a)}else for(a in e)e[a]&&(s&&(s+=" "),s+=a);return s}(t))&&(a&&(a+=" "),a+=e);return a}])},70319,t=>{"use strict";var e=t.i(71645),o=t.i(7670),a=t=>"number"==typeof t&&!isNaN(t),s=t=>"string"==typeof t||"function"==typeof t?t:null,i=t=>(0,e.isValidElement)(t)||"string"==typeof t||"function"==typeof t||a(t);function r({enter:t,exit:o,appendPosition:a=!1,collapse:s=!0,collapseDuration:i=300}){return function({children:r,position:n,preventExitTransition:l,done:c,nodeRef:d,isIn:f,playToast:h}){let u=a?`${t}--${n}`:t,m=a?`${o}--${n}`:o,p=(0,e.useRef)(0);return(0,e.useLayoutEffect)(()=>{let t=d.current,e=u.split(" "),o=a=>{a.target===d.current&&(h(),t.removeEventListener("animationend",o),t.removeEventListener("animationcancel",o),0===p.current&&"animationcancel"!==a.type&&t.classList.remove(...e))};t.classList.add(...e),t.addEventListener("animationend",o),t.addEventListener("animationcancel",o)},[]),(0,e.useEffect)(()=>{let t=d.current,e=()=>{t.removeEventListener("animationend",e),s?function(t,e,o=300){let{scrollHeight:a,style:s}=t;requestAnimationFrame(()=>{s.minHeight="initial",s.height=a+"px",s.transition=`all ${o}ms`,requestAnimationFrame(()=>{s.height="0",s.padding="0",s.margin="0",setTimeout(e,o)})})}(t,c,i):c()};f||(l?e():(p.current=1,t.className+=` ${m}`,t.addEventListener("animationend",e)))},[f]),e.default.createElement(e.default.Fragment,null,r)}}function n(t,e){return{content:l(t.content,t.props),containerId:t.props.containerId,id:t.props.toastId,theme:t.props.theme,type:t.props.type,data:t.props.data||{},isLoading:t.props.isLoading,icon:t.props.icon,reason:t.removalReason,status:e}}function l(t,o,a=!1){return(0,e.isValidElement)(t)&&"string"!=typeof t.type?(0,e.cloneElement)(t,{closeToast:o.closeToast,toastProps:o,data:o.data,isPaused:a}):"function"==typeof t?t({closeToast:o.closeToast,toastProps:o,data:o.data,isPaused:a}):t}function c({delay:t,isRunning:a,closeToast:s,type:i="default",hide:r,className:n,controlledProgress:l,progress:d,rtl:f,isIn:h,theme:u}){let m=r||l&&0===d,p={animationDuration:`${t}ms`,animationPlayState:a?"running":"paused"};l&&(p.transform=`scaleX(${d})`);let y=(0,o.default)("Toastify__progress-bar",l?"Toastify__progress-bar--controlled":"Toastify__progress-bar--animated",`Toastify__progress-bar-theme--${u}`,`Toastify__progress-bar--${i}`,{"Toastify__progress-bar--rtl":f}),x="function"==typeof n?n({rtl:f,type:i,defaultClassName:y}):(0,o.default)(y,n);return e.default.createElement("div",{className:"Toastify__progress-bar--wrp","data-hidden":m},e.default.createElement("div",{className:`Toastify__progress-bar--bg Toastify__progress-bar-theme--${u} Toastify__progress-bar--${i}`}),e.default.createElement("div",{role:"progressbar","aria-hidden":m?"true":"false","aria-label":"notification timer","aria-valuenow":l?Math.round(100*d):void 0,"aria-valuemin":0,"aria-valuemax":100,className:x,style:p,...{[l&&d>=1?"onTransitionEnd":"onAnimationEnd"]:l&&d<1?null:()=>{h&&s()}}}))}var d=1,f=()=>`${d++}`,h=new Map,u=[],m=new Set,p=t=>m.forEach(e=>e(t));function y(t,e){var o;if(e)return!!(null!=(o=h.get(e))&&o.isToastActive(t));let a=!1;return h.forEach(e=>{e.isToastActive(t)&&(a=!0)}),a}function x(t,e){i(t)&&(h.size>0||u.push({content:t,options:e}),h.forEach(o=>{o.buildToast(t,e)}))}function g(t,e){h.forEach(o=>{null!=e&&null!=e&&e.containerId&&(null==e?void 0:e.containerId)!==o.id||o.toggle(t,null==e?void 0:e.id)})}function C(t,e){return x(t,e),e.toastId}function v(t,e){var o;return{...e,type:e&&e.type||t,toastId:(o=e)&&("string"==typeof o.toastId||a(o.toastId))?o.toastId:f()}}function _(t){return(e,o)=>C(e,v(t,o))}function b(t,e){return C(t,v("default",e))}b.loading=(t,e)=>C(t,v("default",{isLoading:!0,autoClose:!1,closeOnClick:!1,closeButton:!1,draggable:!1,...e})),b.promise=function(t,{pending:e,error:o,success:a},s){let i;e&&(i="string"==typeof e?b.loading(e,s):b.loading(e.render,{...s,...e}));let r={isLoading:null,autoClose:null,closeOnClick:null,closeButton:null,draggable:null},n=(t,e,o)=>{if(null==e)return void b.dismiss(i);let a={type:t,...r,...s,data:o},n="string"==typeof e?{render:e}:e;return i?b.update(i,{...a,...n}):b(n.render,{...a,...n}),o},l="function"==typeof t?t():t;return l.then(t=>n("success",a,t)).catch(t=>n("error",o,t)),l},b.success=_("success"),b.info=_("info"),b.error=_("error"),b.warning=_("warning"),b.warn=b.warning,b.dark=(t,e)=>C(t,v("default",{theme:"dark",...e})),b.dismiss=function(t){!function(t){let e;if(!(h.size>0)){u=u.filter(e=>null!=t&&e.options.toastId!==t);return}if(null==t||"string"==typeof(e=t)||a(e))h.forEach(e=>{e.removeToast(t)});else if(t&&("containerId"in t||"id"in t)){let e=h.get(t.containerId);e?e.removeToast(t.id):h.forEach(e=>{e.removeToast(t.id)})}}(t)},b.clearWaitingQueue=(t={})=>{h.forEach(e=>{e.props.limit&&(!t.containerId||e.id===t.containerId)&&e.clearQueue()})},b.isActive=y,b.update=(t,e={})=>{let o=((t,{containerId:e})=>{var o;return null==(o=h.get(e||1))?void 0:o.toasts.get(t)})(t,e);if(o){let{props:a,content:s}=o,i={delay:100,...a,...e,toastId:e.toastId||t,updateId:f()};i.toastId!==t&&(i.staleId=t);let r=i.render||s;delete i.render,C(r,i)}},b.done=t=>{b.update(t,{progress:1})},b.onChange=function(t){return m.add(t),()=>{m.delete(t)}},b.play=t=>g(!0,t),b.pause=t=>g(!1,t);var j="u">typeof window?e.useLayoutEffect:e.useEffect,k=({theme:t,type:o,isLoading:a,...s})=>e.default.createElement("svg",{viewBox:"0 0 24 24",width:"100%",height:"100%",fill:"colored"===t?"currentColor":`var(--toastify-icon-color-${o})`,...s}),T={info:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.013 12.013 0 0012 0zm.25 5a1.5 1.5 0 11-1.5 1.5 1.5 1.5 0 011.5-1.5zm2.25 13.5h-4a1 1 0 010-2h.75a.25.25 0 00.25-.25v-4.5a.25.25 0 00-.25-.25h-.75a1 1 0 010-2h1a2 2 0 012 2v4.75a.25.25 0 00.25.25h.75a1 1 0 110 2z"}))},warning:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M23.32 17.191L15.438 2.184C14.728.833 13.416 0 11.996 0c-1.42 0-2.733.833-3.443 2.184L.533 17.448a4.744 4.744 0 000 4.368C1.243 23.167 2.555 24 3.975 24h16.05C22.22 24 24 22.044 24 19.632c0-.904-.251-1.746-.68-2.44zm-9.622 1.46c0 1.033-.724 1.823-1.698 1.823s-1.698-.79-1.698-1.822v-.043c0-1.028.724-1.822 1.698-1.822s1.698.79 1.698 1.822v.043zm.039-12.285l-.84 8.06c-.057.581-.408.943-.897.943-.49 0-.84-.367-.896-.942l-.84-8.065c-.057-.624.25-1.095.779-1.095h1.91c.528.005.84.476.784 1.1z"}))},success:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm6.927 8.2l-6.845 9.289a1.011 1.011 0 01-1.43.188l-4.888-3.908a1 1 0 111.25-1.562l4.076 3.261 6.227-8.451a1 1 0 111.61 1.183z"}))},error:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M11.983 0a12.206 12.206 0 00-8.51 3.653A11.8 11.8 0 000 12.207 11.779 11.779 0 0011.8 24h.214A12.111 12.111 0 0024 11.791 11.766 11.766 0 0011.983 0zM10.5 16.542a1.476 1.476 0 011.449-1.53h.027a1.527 1.527 0 011.523 1.47 1.475 1.475 0 01-1.449 1.53h-.027a1.529 1.529 0 01-1.523-1.47zM11 12.5v-6a1 1 0 012 0v6a1 1 0 11-2 0z"}))},spinner:function(){return e.default.createElement("div",{className:"Toastify__spinner"})}},w=t=>{let{isRunning:a,preventExitTransition:s,toastRef:i,eventHandlers:r,playToast:n}=function(t){var o,a;let[s,i]=(0,e.useState)(!1),[r,n]=(0,e.useState)(!1),l=(0,e.useRef)(null),c=(0,e.useRef)({start:0,delta:0,removalDistance:0,canCloseOnClick:!0,canDrag:!1,didMove:!1}).current,{autoClose:d,pauseOnHover:f,closeToast:u,onClick:m,closeOnClick:p}=t;function y(){i(!0)}function x(){i(!1)}function g(e){let o=l.current;if(c.canDrag&&o){c.didMove=!0,s&&x(),"x"===t.draggableDirection?c.delta=e.clientX-c.start:c.delta=e.clientY-c.start,c.start!==e.clientX&&(c.canCloseOnClick=!1);let a="x"===t.draggableDirection?`${c.delta}px, var(--y)`:`0, calc(${c.delta}px + var(--y))`;o.style.transform=`translate3d(${a},0)`,o.style.opacity=`${1-Math.abs(c.delta/c.removalDistance)}`}}function C(){document.removeEventListener("pointermove",g),document.removeEventListener("pointerup",C);let e=l.current;if(c.canDrag&&c.didMove&&e){if(c.canDrag=!1,Math.abs(c.delta)>c.removalDistance){n(!0),t.closeToast(!0),t.collapseAll();return}e.style.transition="transform 0.2s, opacity 0.2s",e.style.removeProperty("transform"),e.style.removeProperty("opacity")}}o={id:t.toastId,containerId:t.containerId,fn:i},null==(a=h.get(o.containerId||1))||a.setToggle(o.id,o.fn),(0,e.useEffect)(()=>{if(t.pauseOnFocusLoss)return document.hasFocus()||x(),window.addEventListener("focus",y),window.addEventListener("blur",x),()=>{window.removeEventListener("focus",y),window.removeEventListener("blur",x)}},[t.pauseOnFocusLoss]);let v={onPointerDown:function(e){if(!0===t.draggable||t.draggable===e.pointerType){c.didMove=!1,document.addEventListener("pointermove",g),document.addEventListener("pointerup",C);let o=l.current;c.canCloseOnClick=!0,c.canDrag=!0,o.style.transition="none","x"===t.draggableDirection?(c.start=e.clientX,c.removalDistance=o.offsetWidth*(t.draggablePercent/100)):(c.start=e.clientY,c.removalDistance=o.offsetHeight*(80===t.draggablePercent?1.5*t.draggablePercent:t.draggablePercent)/100)}},onPointerUp:function(e){let{top:o,bottom:a,left:s,right:i}=l.current.getBoundingClientRect();"mouse"===e.pointerType&&t.pauseOnHover&&e.clientX>=s&&e.clientX<=i&&e.clientY>=o&&e.clientY<=a?x():y()}};return d&&f&&(v.onMouseEnter=x,t.stacked||(v.onMouseLeave=y)),p&&(v.onClick=t=>{m&&m(t),c.canCloseOnClick&&u(!0)}),{playToast:y,pauseToast:x,isRunning:s,preventExitTransition:r,toastRef:l,eventHandlers:v}}(t),{closeButton:d,children:f,autoClose:u,onClick:m,type:p,hideProgressBar:y,closeToast:x,transition:g,position:C,className:v,style:_,progressClassName:b,updateId:j,role:k,progress:w,rtl:L,toastId:N,deleteToast:H,isIn:M,isLoading:V,closeOnClick:E,theme:I,ariaLabel:B}=t,Z=(0,o.default)("Toastify__toast",`Toastify__toast-theme--${I}`,`Toastify__toast--${p}`,{"Toastify__toast--rtl":L},{"Toastify__toast--close-on-click":E}),P="function"==typeof v?v({rtl:L,position:C,type:p,defaultClassName:Z}):(0,o.default)(Z,v),O=function({theme:t,type:o,isLoading:a,icon:s}){let i=null,r={theme:t,type:o};return!1===s||("function"==typeof s?i=s({...r,isLoading:a}):(0,e.isValidElement)(s)?i=(0,e.cloneElement)(s,r):a?i=T.spinner():o in T&&(i=T[o](r))),i}(t),W=!!w||!u,$={closeToast:x,type:p,theme:I},S=null;return!1===d||(S="function"==typeof d?d($):(0,e.isValidElement)(d)?(0,e.cloneElement)(d,$):function({closeToast:t,theme:o,ariaLabel:a="close"}){return e.default.createElement("button",{className:`Toastify__close-button Toastify__close-button--${o}`,type:"button",onClick:e=>{e.stopPropagation(),t(!0)},"aria-label":a},e.default.createElement("svg",{"aria-hidden":"true",viewBox:"0 0 14 16"},e.default.createElement("path",{fillRule:"evenodd",d:"M7.71 8.23l3.75 3.75-1.48 1.48-3.75-3.75-3.75 3.75L1 11.98l3.75-3.75L1 4.48 2.48 3l3.75 3.75L9.98 3l1.48 1.48-3.75 3.75z"})))}($)),e.default.createElement(g,{isIn:M,done:H,position:C,preventExitTransition:s,nodeRef:i,playToast:n},e.default.createElement("div",{id:N,tabIndex:0,onClick:m,"data-in":M,className:P,...r,style:_,ref:i,...M&&{role:k,"aria-label":B}},null!=O&&e.default.createElement("div",{className:(0,o.default)("Toastify__toast-icon",{"Toastify--animate-icon Toastify__zoom-enter":!V})},O),l(f,t,!a),S,!t.customProgressBar&&e.default.createElement(c,{...j&&!W?{key:`p-${j}`}:{},rtl:L,theme:I,delay:u,isRunning:a,isIn:M,closeToast:x,hide:y,type:p,className:b,controlledProgress:W,progress:w||0})))},L=(t,e=!1)=>({enter:`Toastify--animate Toastify__${t}-enter`,exit:`Toastify--animate Toastify__${t}-exit`,appendPosition:e}),N=r(L("bounce",!0));r(L("slide",!0)),r(L("zoom")),r(L("flip"));var H={position:"top-right",transition:N,autoClose:5e3,closeButton:!0,pauseOnHover:!0,pauseOnFocusLoss:!0,draggable:"touch",draggablePercent:80,draggableDirection:"x",role:"alert",theme:"light","aria-label":"Notifications Alt+T",hotKeys:t=>t.altKey&&"KeyT"===t.code};function M(t){let r={...H,...t},l=t.stacked,[c,d]=(0,e.useState)(!0),f=(0,e.useRef)(null),{getToastToRender:m,isToastActive:g,count:C}=function(t){var o;let r,{subscribe:l,getSnapshot:c,setProps:d}=(0,e.useRef)((r=t.containerId||1,{subscribe(e){let o,l,c,d,f,m,y,g,C,v,_,b=(o=1,l=0,c=[],d=[],f=t,m=new Map,y=new Set,g=()=>{d=Array.from(m.values()),y.forEach(t=>t())},C=t=>{var e,o;t.isActive&&(null==(o=null==(e=t.props)?void 0:e.onClose)||o.call(e,t.removalReason),t.isActive=!1,p(n(t,"removed")))},v=t=>{if(null==t)m.forEach(C);else{let e=m.get(t);e&&C(e)}g()},_=t=>{var e,o;let{toastId:a,updateId:s}=t.props,i=null==s;t.staleId&&m.delete(t.staleId),t.isActive=!0,m.set(a,t),g(),p(n(t,i?"added":"updated")),i&&(null==(o=(e=t.props).onOpen)||o.call(e))},{id:r,props:f,observe:t=>(y.add(t),()=>y.delete(t)),toggle:(t,e)=>{m.forEach(o=>{var a;(null==e||e===o.props.toastId)&&(null==(a=o.toggle)||a.call(o,t))})},removeToast:v,toasts:m,clearQueue:()=>{l-=c.length,c=[]},buildToast:(t,e)=>{let n,d;if((({containerId:t,toastId:e,updateId:o})=>{let a=m.has(e)&&null==o;return(t?t!==r:1!==r)||a})(e))return;let{toastId:h,updateId:u,data:p,staleId:y,delay:x}=e,C=null==u;C&&l++;let b={...f,style:f.toastStyle,key:o++,...Object.fromEntries(Object.entries(e).filter(([t,e])=>null!=e)),toastId:h,updateId:u,data:p,isIn:!1,className:s(e.className||f.toastClassName),progressClassName:s(e.progressClassName||f.progressClassName),autoClose:!e.isLoading&&(n=e.autoClose,d=f.autoClose,!1===n||a(n)&&n>0?n:d),closeToast(t){let e=m.get(h);e&&(e.removalReason=t,v(h))},deleteToast(){if(null!=m.get(h)){if(m.delete(h),--l<0&&(l=0),c.length>0)return void _(c.shift());g()}}};b.closeButton=f.closeButton,!1===e.closeButton||i(e.closeButton)?b.closeButton=e.closeButton:!0===e.closeButton&&(b.closeButton=!i(f.closeButton)||f.closeButton);let j={content:t,props:b,staleId:y};f.limit&&f.limit>0&&l>f.limit&&C?c.push(j):a(x)?setTimeout(()=>{_(j)},x):_(j)},setProps(t){f=t},setToggle:(t,e)=>{let o=m.get(t);o&&(o.toggle=e)},isToastActive:t=>{var e;return null==(e=m.get(t))?void 0:e.isActive},getSnapshot:()=>d});h.set(r,b);let j=b.observe(e);return u.forEach(t=>x(t.content,t.options)),u=[],()=>{j(),h.delete(r)}},setProps(t){var e;null==(e=h.get(r))||e.setProps(t)},getSnapshot(){var t;return null==(t=h.get(r))?void 0:t.getSnapshot()}})).current;d(t);let f=null==(o=(0,e.useSyncExternalStore)(l,c,c))?void 0:o.slice();return{getToastToRender:function(e){if(!f)return[];let o=new Map;return t.newestOnTop&&f.reverse(),f.forEach(t=>{let{position:e}=t.props;o.has(e)||o.set(e,[]),o.get(e).push(t)}),Array.from(o,t=>e(t[0],t[1]))},isToastActive:y,count:null==f?void 0:f.length}}(r),{className:v,style:_,rtl:k,containerId:T,hotKeys:L}=r;function N(){l&&(d(!0),b.play())}return j(()=>{var t;if(l){let e=f.current.querySelectorAll('[data-in="true"]'),o=null==(t=r.position)?void 0:t.includes("top"),a=0,s=0;Array.from(e).reverse().forEach((t,e)=>{t.classList.add("Toastify__toast--stacked"),e>0&&(t.dataset.collapsed=`${c}`),t.dataset.pos||(t.dataset.pos=o?"top":"bot");let i=a*(c?.2:1)+(c?0:12*e),r=Math.max(.5,1-(c?s:0));t.style.setProperty("--y",`${o?i:-1*i}px`),t.style.setProperty("--g","12"),t.style.setProperty("--s",`${r}`),a+=t.offsetHeight,s+=.025})}},[c,C,l]),(0,e.useEffect)(()=>{function t(t){var e;let o=f.current;L(t)&&(null==(e=null==o?void 0:o.querySelector('[tabIndex="0"]'))||e.focus(),d(!1),b.pause()),"Escape"===t.key&&(document.activeElement===o||null!=o&&o.contains(document.activeElement))&&(d(!0),b.play())}return document.addEventListener("keydown",t),()=>{document.removeEventListener("keydown",t)}},[L]),e.default.createElement("section",{ref:f,className:"Toastify",id:T,onMouseEnter:()=>{l&&(d(!1),b.pause())},onMouseLeave:N,"aria-live":"polite","aria-atomic":"false","aria-relevant":"additions text","aria-label":r["aria-label"]},m((t,a)=>{var i;let r,n=a.length?{..._}:{..._,pointerEvents:"none"};return e.default.createElement("div",{tabIndex:-1,className:(i=t,r=(0,o.default)("Toastify__toast-container",`Toastify__toast-container--${i}`,{"Toastify__toast-container--rtl":k}),"function"==typeof v?v({position:i,rtl:k,defaultClassName:r}):(0,o.default)(r,s(v))),"data-stacked":l,style:n,key:`c-${t}`},a.map(({content:t,props:o})=>e.default.createElement(w,{...o,stacked:l,collapseAll:N,isIn:g(o.toastId,o.containerId),key:`t-${o.key}`},t)))}))}var V=`:root {
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
`,E=new Map;t.s(["ToastContainer",0,function(t){var o;return j(()=>{if(!V||"u"<typeof document)return;let t=document,e=E.get(t);if(e){o&&e.setAttribute("nonce",o);return}let a=t.createElement("style");a.textContent=V,o&&a.setAttribute("nonce",o),t.head.appendChild(a),E.set(t,a)},[o=t.nonce]),e.default.createElement(M,{...t})},"toast",0,b])},84975,(t,e,o)=>{e.exports={frontendBase:"https://www.resumesathi.com",backendBase:"http://127.0.0.1:8000"}},56518,t=>{"use strict";var e=t.i(47167),o=t.i(84975);let a=e.default.env.NEXT_PUBLIC_SITE_URL||e.default.env.NEXT_PUBLIC_FRONTEND_URL||o.default.frontendBase,s=e.default.env.NEXT_PUBLIC_BACKEND_BASE||o.default.backendBase;function i(){return s.replace(/\/+$/,"")}function r(){return`${i()}/api`}t.s(["getApiBase",0,r,"getBackendBase",0,i,"getContentCacheUrl",0,function(t){return`${r()}/public-cache/${String(t).replace(/^\/+/,"")}`},"getSiteBase",0,function(){return a.replace(/\/+$/,"")},"resolveApiMediaUrl",0,function(t,e){return t?/^https?:\/\//i.test(t)||String(t).startsWith("//")?t:`${i()}/${String(t).replace(/^\/+/,"")}`:e}])},44134,t=>{"use strict";var e=t.i(43476),o=t.i(71645),a=t.i(22016),s=t.i(18566);t.s(["default",0,function({className:t=""}){let[i,r]=(0,o.useState)(!1),[n,l]=(0,o.useState)(!1),[c,d]=(0,o.useState)(!1),f=(0,s.usePathname)(),h=f?.startsWith("/resume/"),u=f.startsWith("/resume"),m=f.startsWith("/tools"),p=f.startsWith("/blog"),y=f.startsWith("/jobs"),x=()=>{r(!1),l(!1),d(!1)};return(0,e.jsxs)(e.Fragment,{children:[(0,e.jsx)("nav",{className:`navbar ${t}`.trim(),children:(0,e.jsxs)("div",{className:"container-fluid custom-container d-flex align-items-center justify-content-between",children:[(0,e.jsx)(a.default,{prefetch:!1,href:"/",onClick:x,style:{display:"inline-flex",alignItems:"center",minWidth:160,minHeight:38},children:(0,e.jsx)("img",{src:"/front-assets/images/logo/logo.svg",className:"img-fluid nav-logo",width:250,height:52,alt:"ResumeSathi",style:{display:"block"}})}),(0,e.jsxs)("div",{className:"d-flex align-items-center gap-2",children:[(0,e.jsxs)("div",{className:"d-none d-lg-flex align-items-center gap-1",children:[(0,e.jsxs)(a.default,{prefetch:!1,href:"/resume",className:`nav-link ${u?"active":""}`,children:[(0,e.jsxs)("svg",{width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("rect",{x:"2",y:"3",width:"20",height:"14",rx:"2"}),(0,e.jsx)("line",{x1:"8",y1:"21",x2:"16",y2:"21"}),(0,e.jsx)("line",{x1:"12",y1:"17",x2:"12",y2:"21"})]}),"Resume / CVs"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/tools",className:`nav-link ${m?"active":""}`,children:[(0,e.jsx)("svg",{width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:(0,e.jsx)("path",{d:"M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"})}),"Tools"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/jobs",className:`nav-link ${y?"active":""}`,children:[(0,e.jsxs)("svg",{width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"3",y1:"22",x2:"21",y2:"22"}),(0,e.jsx)("line",{x1:"6",y1:"18",x2:"6",y2:"11"}),(0,e.jsx)("line",{x1:"10",y1:"18",x2:"10",y2:"11"}),(0,e.jsx)("line",{x1:"14",y1:"18",x2:"14",y2:"11"}),(0,e.jsx)("line",{x1:"18",y1:"18",x2:"18",y2:"11"}),(0,e.jsx)("polygon",{points:"12 2 20 7 4 7"})]}),"Jobs"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/blog",className:`nav-link ${p?"active":""}`,children:[(0,e.jsxs)("svg",{width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M4 4h16v16H4z"}),(0,e.jsx)("line",{x1:"8",y1:"9",x2:"16",y2:"9"}),(0,e.jsx)("line",{x1:"8",y1:"13",x2:"16",y2:"13"}),(0,e.jsx)("line",{x1:"8",y1:"17",x2:"12",y2:"17"})]}),"Blog"]})]}),!h&&(0,e.jsxs)(a.default,{prefetch:!1,href:"/resume/resume-type",className:"btn-create d-none d-lg-inline-flex",children:[(0,e.jsxs)("svg",{width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"12",y1:"5",x2:"12",y2:"19"}),(0,e.jsx)("line",{x1:"5",y1:"12",x2:"19",y2:"12"})]}),"Create Resume"]}),(0,e.jsx)("button",{className:"hamburger d-lg-none",onClick:()=>l(!0),"aria-label":"Open menu",children:(0,e.jsxs)("svg",{width:"22",height:"22",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"3",y1:"6",x2:"21",y2:"6"}),(0,e.jsx)("line",{x1:"3",y1:"12",x2:"21",y2:"12"}),(0,e.jsx)("line",{x1:"3",y1:"18",x2:"21",y2:"18"})]})})]})]})}),(0,e.jsx)("div",{className:`offcanvas-overlay ${n?"open":""}`,onClick:x}),(0,e.jsxs)("div",{className:`offcanvas-panel ${n?"open":""}`,children:[(0,e.jsxs)("div",{className:"offcanvas-header",children:[(0,e.jsx)(a.default,{prefetch:!1,href:"/",onClick:x,style:{display:"inline-flex",alignItems:"center",minWidth:120,minHeight:30},children:(0,e.jsx)("img",{src:"/front-assets/images/logo/logo.svg",className:"img-fluid",width:160,height:35,alt:"ResumeSathi",style:{display:"block"}})}),(0,e.jsx)("button",{className:"offcanvas-close",onClick:x,"aria-label":"Close menu",children:(0,e.jsxs)("svg",{width:"20",height:"20",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"18",y1:"6",x2:"6",y2:"18"}),(0,e.jsx)("line",{x1:"6",y1:"6",x2:"18",y2:"18"})]})})]}),(0,e.jsxs)("div",{className:"offcanvas-body",children:[h&&(0,e.jsxs)(e.Fragment,{children:[(0,e.jsx)("p",{className:"offcanvas-section-label",children:"Menu"}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/resume",className:"offcanvas-link",onClick:x,children:[(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("rect",{x:"2",y:"3",width:"20",height:"14",rx:"2"}),(0,e.jsx)("line",{x1:"8",y1:"21",x2:"16",y2:"21"}),(0,e.jsx)("line",{x1:"12",y1:"17",x2:"12",y2:"21"})]}),"Resume/CVs"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/tools",className:"offcanvas-link",onClick:x,children:[(0,e.jsx)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:(0,e.jsx)("path",{d:"M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"})}),"Tools"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/jobs",className:"offcanvas-link",onClick:x,children:[(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"3",y1:"22",x2:"21",y2:"22"}),(0,e.jsx)("line",{x1:"6",y1:"18",x2:"6",y2:"11"}),(0,e.jsx)("line",{x1:"10",y1:"18",x2:"10",y2:"11"}),(0,e.jsx)("line",{x1:"14",y1:"18",x2:"14",y2:"11"}),(0,e.jsx)("line",{x1:"18",y1:"18",x2:"18",y2:"11"}),(0,e.jsx)("polygon",{points:"12 2 20 7 4 7"})]}),"Jobs"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/blog",className:"offcanvas-link",onClick:x,children:[(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M4 4h16v16H4z"}),(0,e.jsx)("line",{x1:"8",y1:"9",x2:"16",y2:"9"}),(0,e.jsx)("line",{x1:"8",y1:"13",x2:"16",y2:"13"}),(0,e.jsx)("line",{x1:"8",y1:"17",x2:"12",y2:"17"})]}),"Blog"]})]}),(0,e.jsxs)(e.Fragment,{children:[(0,e.jsxs)(a.default,{prefetch:!1,href:"/privacy-policy",className:"offcanvas-link",onClick:x,children:[(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("rect",{width:"18",height:"11",x:"3",y:"11",rx:"2",ry:"2"}),(0,e.jsx)("path",{d:"M7 11V7a5 5 0 0 1 10 0v4"})]}),"Privacy Policy"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/terms-and-conditions",className:"offcanvas-link",onClick:x,children:[(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"}),(0,e.jsx)("path",{d:"M14 2v6h6"}),(0,e.jsx)("line",{x1:"16",y1:"13",x2:"8",y2:"13"}),(0,e.jsx)("line",{x1:"16",y1:"17",x2:"8",y2:"17"}),(0,e.jsx)("line",{x1:"10",y1:"9",x2:"8",y2:"9"})]}),"Terms & Conditions"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/about",className:"offcanvas-link",onClick:x,children:[(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("circle",{cx:"12",cy:"12",r:"10"}),(0,e.jsx)("path",{d:"M12 16v-4"}),(0,e.jsx)("path",{d:"M12 8h.01"})]}),"About Us"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/contact",className:"offcanvas-link",onClick:x,children:[(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}),(0,e.jsx)("path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"})]}),"Contact"]}),(0,e.jsxs)(a.default,{prefetch:!1,href:"/disclaimer",className:"offcanvas-link",onClick:x,children:[(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("circle",{cx:"12",cy:"12",r:"10"}),(0,e.jsx)("line",{x1:"12",y1:"8",x2:"12",y2:"12"}),(0,e.jsx)("line",{x1:"12",y1:"16",x2:"12.01",y2:"16"})]}),"Disclaimer"]})]}),!h&&(0,e.jsxs)(a.default,{prefetch:!1,href:"/resume/resume-type",className:"btn-create offcanvas-btn-create",onClick:x,children:[(0,e.jsxs)("svg",{width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"12",y1:"5",x2:"12",y2:"19"}),(0,e.jsx)("line",{x1:"5",y1:"12",x2:"19",y2:"12"})]}),"Create Resume"]})]})]})]})}])},48293,t=>{"use strict";var e=t.i(43476),o=t.i(71645),a=t.i(22016),s=t.i(18566);function i(t){return["footer-each-tab",t?"active":""].filter(Boolean).join(" ")}t.s(["default",0,function(){let t=(0,s.usePathname)()||"",[r,n]=(0,o.useState)("");(0,o.useEffect)(()=>{n(t)},[t]);let l=r||t,c=l.startsWith("/resume"),d=l.startsWith("/tools"),f=l.startsWith("/tools/"),h=!l.startsWith("/tools")&&!l.startsWith("/blog")&&!l.startsWith("/jobs"),u=l.startsWith("/blog")||l.startsWith("/jobs"),m=l.startsWith("/blog"),p=l.startsWith("/jobs");return(0,e.jsx)(e.Fragment,{children:(0,e.jsxs)("footer",{className:"mob-footer-nav d-lg-none",children:[f&&(0,e.jsx)("div",{className:"footer-lists-btn","data-bs-toggle":"offcanvas","data-bs-target":"#commonOffcanvas","aria-controls":"commonOffcanvas",children:(0,e.jsx)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 20 20",fill:"none",children:(0,e.jsx)("path",{d:"M9.16228 3.9V7.13333C9.16229 7.40106 9.10942 7.66615 9.00671 7.91339C8.90401 8.16063 8.75349 8.38515 8.56379 8.57407C8.37409 8.76299 8.14896 8.91259 7.9013 9.01429C7.65364 9.11598 7.38834 9.16776 7.12062 9.16667H3.90395C3.63695 9.16829 3.37237 9.11598 3.12608 9.01288C2.87978 8.90978 2.65684 8.75801 2.47062 8.56667C2.28155 8.37917 2.13182 8.1558 2.03022 7.90967C1.92862 7.66354 1.87719 7.3996 1.87895 7.13333V3.90833C1.87895 3.3705 2.09203 2.85457 2.47155 2.47349C2.85107 2.0924 3.36612 1.8772 3.90395 1.875H7.12895C7.39567 1.87526 7.65969 1.92842 7.90572 2.03141C8.15176 2.1344 8.37492 2.28517 8.56228 2.475C8.75186 2.66082 8.90254 2.88252 9.00556 3.12717C9.10857 3.37183 9.16185 3.63454 9.16228 3.9ZM18.1206 3.90833V7.13333C18.1163 7.66983 17.9018 8.18325 17.5232 8.56341C17.1446 8.94356 16.6321 9.16014 16.0956 9.16667H12.8623C12.3233 9.16337 11.8065 8.95129 11.4206 8.575C11.232 8.38541 11.0827 8.16048 10.9812 7.9131C10.8797 7.66571 10.8279 7.40074 10.8289 7.13333V3.90833C10.8283 3.64147 10.881 3.37718 10.9841 3.13102C11.0871 2.88485 11.2384 2.6618 11.4289 2.475C11.6163 2.28517 11.8395 2.1344 12.0855 2.03141C12.3315 1.92842 12.5956 1.87526 12.8623 1.875H16.0873C16.6252 1.87936 17.1399 2.09498 17.5203 2.47536C17.9006 2.85575 18.1163 3.37041 18.1206 3.90833ZM18.1206 12.8667V16.0917C18.1163 16.6282 17.9018 17.1416 17.5232 17.5217C17.1446 17.9019 16.6321 18.1185 16.0956 18.125H12.8623C12.3199 18.1305 11.7967 17.9242 11.4039 17.55C11.2146 17.361 11.0648 17.1361 10.9632 16.8886C10.8617 16.6411 10.8103 16.3759 10.8123 16.1083V12.8833C10.8116 12.6165 10.8643 12.3522 10.9674 12.106C11.0704 11.8599 11.2217 11.6368 11.4123 11.45C11.5996 11.2602 11.8228 11.1094 12.0688 11.0064C12.3149 10.9034 12.5789 10.8503 12.8456 10.85H16.0706C16.6085 10.8544 17.1232 11.07 17.5036 11.4504C17.884 11.8307 18.0996 12.3454 18.1039 12.8833L18.1206 12.8667ZM9.16228 12.875V16.1C9.15573 16.6379 8.93799 17.1517 8.55605 17.5305C8.17411 17.9093 7.65856 18.1229 7.12062 18.125H3.90395C3.63771 18.1261 3.3739 18.0745 3.12771 17.9731C2.88153 17.8717 2.65786 17.7226 2.4696 17.5343C2.28134 17.3461 2.13222 17.1224 2.03085 16.8762C1.92947 16.6301 1.87785 16.3662 1.87895 16.1V12.875C1.8811 12.3371 2.09461 11.8215 2.47344 11.4396C2.85226 11.0576 3.36604 10.8399 3.90395 10.8333H7.12895C7.66912 10.8389 8.18602 11.054 8.57062 11.4333C8.95069 11.8168 9.16343 12.3351 9.16228 12.875Z",fill:"white"})})}),h&&(0,e.jsxs)(a.default,{prefetch:!1,href:"/resume/resume-type",className:"footer-lists-btn","aria-label":"Create resume",title:"Create resume",children:[(0,e.jsx)("span",{style:{position:"absolute",width:"1px",height:"1px",padding:0,margin:"-1px",overflow:"hidden",clip:"rect(0, 0, 0, 0)",whiteSpace:"nowrap",border:0},children:"Create resume"}),(0,e.jsxs)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"white",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"12",y1:"5",x2:"12",y2:"19"}),(0,e.jsx)("line",{x1:"5",y1:"12",x2:"19",y2:"12"})]})]}),u&&(0,e.jsx)("div",{className:"footer-lists-btn","data-bs-toggle":"offcanvas","data-bs-target":"#BlogsOffcanvas","aria-controls":"commonOffcanvas",children:(0,e.jsx)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 20 20",fill:"none",children:(0,e.jsx)("path",{d:"M9.16228 3.9V7.13333C9.16229 7.40106 9.10942 7.66615 9.00671 7.91339C8.90401 8.16063 8.75349 8.38515 8.56379 8.57407C8.37409 8.76299 8.14896 8.91259 7.9013 9.01429C7.65364 9.11598 7.38834 9.16776 7.12062 9.16667H3.90395C3.63695 9.16829 3.37237 9.11598 3.12608 9.01288C2.87978 8.90978 2.65684 8.75801 2.47062 8.56667C2.28155 8.37917 2.13182 8.1558 2.03022 7.90967C1.92862 7.66354 1.87719 7.3996 1.87895 7.13333V3.90833C1.87895 3.3705 2.09203 2.85457 2.47155 2.47349C2.85107 2.0924 3.36612 1.8772 3.90395 1.875H7.12895C7.39567 1.87526 7.65969 1.92842 7.90572 2.03141C8.15176 2.1344 8.37492 2.28517 8.56228 2.475C8.75186 2.66082 8.90254 2.88252 9.00556 3.12717C9.10857 3.37183 9.16185 3.63454 9.16228 3.9ZM18.1206 3.90833V7.13333C18.1163 7.66983 17.9018 8.18325 17.5232 8.56341C17.1446 8.94356 16.6321 9.16014 16.0956 9.16667H12.8623C12.3233 9.16337 11.8065 8.95129 11.4206 8.575C11.232 8.38541 11.0827 8.16048 10.9812 7.9131C10.8797 7.66571 10.8279 7.40074 10.8289 7.13333V3.90833C10.8283 3.64147 10.881 3.37718 10.9841 3.13102C11.0871 2.88485 11.2384 2.6618 11.4289 2.475C11.6163 2.28517 11.8395 2.1344 12.0855 2.03141C12.3315 1.92842 12.5956 1.87526 12.8623 1.875H16.0873C16.6252 1.87936 17.1399 2.09498 17.5203 2.47536C17.9006 2.85575 18.1163 3.37041 18.1206 3.90833ZM18.1206 12.8667V16.0917C18.1163 16.6282 17.9018 17.1416 17.5232 17.5217C17.1446 17.9019 16.6321 18.1185 16.0956 18.125H12.8623C12.3199 18.1305 11.7967 17.9242 11.4039 17.55C11.2146 17.361 11.0648 17.1361 10.9632 16.8886C10.8617 16.6411 10.8103 16.3759 10.8123 16.1083V12.8833C10.8116 12.6165 10.8643 12.3522 10.9674 12.106C11.0704 11.8599 11.2217 11.6368 11.4123 11.45C11.5996 11.2602 11.8228 11.1094 12.0688 11.0064C12.3149 10.9034 12.5789 10.8503 12.8456 10.85H16.0706C16.6085 10.8544 17.1232 11.07 17.5036 11.4504C17.884 11.8307 18.0996 12.3454 18.1039 12.8833L18.1206 12.8667ZM9.16228 12.875V16.1C9.15573 16.6379 8.93799 17.1517 8.55605 17.5305C8.17411 17.9093 7.65856 18.1229 7.12062 18.125H3.90395C3.63771 18.1261 3.3739 18.0745 3.12771 17.9731C2.88153 17.8717 2.65786 17.7226 2.4696 17.5343C2.28134 17.3461 2.13222 17.1224 2.03085 16.8762C1.92947 16.6301 1.87785 16.3662 1.87895 16.1V12.875C1.8811 12.3371 2.09461 11.8215 2.47344 11.4396C2.85226 11.0576 3.36604 10.8399 3.90395 10.8333H7.12895C7.66912 10.8389 8.18602 11.054 8.57062 11.4333C8.95069 11.8168 9.16343 12.3351 9.16228 12.875Z",fill:"white"})})}),(0,e.jsx)("div",{className:"footer-main-div",children:(0,e.jsxs)("div",{className:"footer-all-tab",children:[(0,e.jsx)(a.default,{prefetch:!1,href:"/resume",children:(0,e.jsx)("div",{className:i(c),children:(0,e.jsxs)("div",{children:[(0,e.jsxs)("svg",{width:"32",height:"32",viewBox:"0 0 32 32",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:[(0,e.jsx)("path",{d:"M26.5406 1H5.31708C3.48766 1 2 2.34562 2 3.99973V28.0009C2 29.6545 3.48748 31 5.31708 31H26.5406C28.3697 31 29.8571 29.6545 29.8571 28.0009V4.00073C29.8581 2.34644 28.3708 1 26.5406 1ZM28.5313 28.0009C28.5313 28.9938 27.6384 29.8011 26.5406 29.8011H5.31708C4.21968 29.8011 3.32731 28.9938 3.32731 28.0009V4.00073C3.32731 3.00799 4.21968 2.20072 5.31708 2.20072H26.5406C27.6375 2.20072 28.5298 3.00799 28.5298 4.00073V28.0011H28.5313V28.0009Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M23.1595 15.9922H8.69938C8.35135 15.9922 8.07031 16.2744 8.07031 16.6224C8.07031 16.9702 8.35135 17.2526 8.69938 17.2526H23.1593C23.5078 17.2526 23.7888 16.9704 23.7888 16.6224C23.789 16.2745 23.5078 15.9922 23.1595 15.9922Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M23.1595 18.8633H8.69938C8.35135 18.8633 8.07031 19.146 8.07031 19.494C8.07031 19.8421 8.35135 20.1235 8.69938 20.1235H23.1593C23.5078 20.1235 23.7888 19.8421 23.7888 19.494C23.788 19.1441 23.5078 18.8633 23.1595 18.8633Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M23.1595 21.7344H8.69938C8.35135 21.7344 8.07031 22.0171 8.07031 22.3648C8.07031 22.7128 8.35135 22.9946 8.69938 22.9946H23.1593C23.5078 22.9946 23.7888 22.7128 23.7888 22.3648C23.789 22.0171 23.5078 21.7344 23.1595 21.7344Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M23.1593 24.6055H15.9286C15.5812 24.6055 15.2988 24.8871 15.2988 25.2351C15.2988 25.5831 15.5812 25.8659 15.9286 25.8659H23.1591C23.5075 25.8659 23.7876 25.5831 23.7876 25.2351C23.7876 24.8871 23.5075 24.6055 23.1593 24.6055Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M16.6312 13.2213C16.6312 12.0294 15.259 10.4217 13.4066 9.95201C14.1805 9.43157 14.7138 8.40376 14.7138 7.47814C14.7138 6.1727 13.6566 5.11328 12.35 5.11328C11.045 5.11328 9.98632 6.1727 9.98632 7.47814C9.98632 8.40281 10.5196 9.43062 11.2918 9.95201C9.44204 10.4215 8.06885 12.0303 8.06885 13.2213C8.07036 14.6297 16.6312 14.6297 16.6312 13.2213ZM12.1595 10.638H12.1487L11.7573 10.1886C11.9486 10.2563 12.1438 10.2978 12.3502 10.2978C12.5571 10.2978 12.7524 10.2575 12.9433 10.1895L12.5508 10.6378H12.5416L13.5516 13.0782L12.3502 14.2765L11.1502 13.0782L12.1595 10.638Z",fill:"#cc0000"})]}),(0,e.jsxs)("p",{children:["Resume ",(0,e.jsx)("span",{className:"d-none d-sm-inline",children:"/ CVs"})]})]})})}),(0,e.jsx)(a.default,{prefetch:!1,href:"/tools",children:(0,e.jsx)("div",{className:i(d),children:(0,e.jsxs)("div",{children:[(0,e.jsxs)("svg",{width:"32",height:"32",viewBox:"0 0 32 32",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:[(0,e.jsx)("path",{d:"M5.91019 11.8175C7.39082 10.5794 8.61913 11.4332 10.2585 13.4757C10.4426 13.7062 10.6901 13.4364 10.8314 13.3049C10.9726 13.1734 13.134 11.0763 13.2404 10.9807C13.3451 10.8799 13.4721 10.6921 13.3054 10.482C12.904 9.9478 12.5109 9.40637 12.1263 8.85797C9.25709 4.81915 19.9754 2.07993 18.3298 2.03724C17.4918 2.01333 14.1307 1.97064 13.6276 2.03041C11.5915 2.26095 9.03492 4.30854 7.74789 5.26317C6.06412 6.50299 5.43568 7.23049 5.33253 7.33124C4.85644 7.77867 5.25636 8.81186 4.39305 9.62645C3.48055 10.4854 2.91083 9.8348 2.38237 10.3335C2.12052 10.5828 1.38734 11.1737 1.17786 11.3701C0.987353 11.5504 0.937769 11.8421 1.08863 12.0943C1.12206 12.1502 1.16444 12.1981 1.20637 12.2479C1.54533 12.6509 3.16811 14.5806 3.31868 14.7702C3.48531 14.9785 3.93918 15.1595 4.21848 14.8914C4.49938 14.625 5.22144 13.947 5.34205 13.8275C5.46584 13.7148 5.26271 12.3571 5.91019 11.8175ZM14.9686 12.7004C14.7781 12.463 14.5417 12.4562 14.3385 12.6509L12.0628 14.789C11.9753 14.875 11.922 14.994 11.9141 15.1213C11.9061 15.2485 11.944 15.3742 12.02 15.4721L23.0999 28.9991C23.2855 29.2287 23.4836 29.7164 23.7541 29.9141C24.1487 30.2024 24.6195 29.6528 25.0499 29.4213L25.1663 29.3586C25.5196 29.1685 26.0246 28.722 26.2977 28.4281V28.4281C26.8717 27.8104 26.7654 27.2774 26.1478 26.7032C25.9353 26.5056 25.7525 26.3393 25.6999 26.2737L14.9686 12.7004Z",stroke:"#001691",strokeWidth:"1.5"}),(0,e.jsx)("path",{d:"M2.10471 26.5926C2.11511 26.3367 2.22376 26.0969 2.40716 25.925L11.5 18.4996L14 21.5006L5.29002 28.9891C4.90695 29.3444 4.31706 29.4687 3.96466 29.0699L2.35155 27.2926C2.18297 27.0999 2.0943 26.8484 2.10471 26.5926Z",stroke:"#cc0000",strokeWidth:"1.5"}),(0,e.jsx)("path",{d:"M30.0276 6.50891C30.2482 6.21849 30.6406 6.10529 30.6973 6.85275C30.7556 7.60037 30.6684 10.455 29.8528 11.7288C28.9436 13.1548 27.5506 13.9279 25.159 13.1217C24.0432 12.7428 22.7479 13.184 22.1184 13.7119L20.4999 15.4999L17.9999 12.4999L19.7976 11.3717C21.5665 9.88482 20.8481 8.12346 21.441 6.30082C22.0212 4.50837 25.3394 3.56618 25.8887 3.37798C26.4365 3.18963 26.549 3.78987 26.4019 3.97698C26.255 4.1611 25.2202 5.66393 24.8795 6.20285C24.5405 6.73894 23.8852 7.51934 25.5069 8.90772C27.0633 10.2442 28.0303 9.15897 28.4309 8.60086C28.8349 8.03711 29.8068 6.80231 30.0276 6.50891Z",stroke:"#cc0000",strokeWidth:"1.5"})]}),(0,e.jsx)("p",{children:"Tools"})]})})}),(0,e.jsx)(a.default,{prefetch:!1,href:"/jobs",children:(0,e.jsx)("div",{className:i(p),children:(0,e.jsxs)("div",{children:[(0,e.jsxs)("svg",{width:"32",height:"32",viewBox:"0 0 32 32",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:[(0,e.jsx)("path",{d:"M29.7183 8.97656H28.1886V9.93656H29.7183C29.9768 9.93656 30.0743 10.2164 30.0743 10.475V23.1396C30.0743 24.4327 29.1352 25.3994 27.842 25.3994H18.4608C17.6848 25.3994 16.9429 26.1161 16.9429 26.892V27.0451H15.0571V26.892C15.0571 26.1161 14.5461 25.3994 13.7702 25.3994H4.38897C3.09585 25.3994 1.92571 24.4327 1.92571 23.1396V10.475C1.92571 10.2164 2.25417 9.93656 2.51275 9.93656H3.81143V8.97656H2.51275C1.7368 8.97656 1 9.69896 1 10.475V23.1396C1 24.9501 2.57848 26.3251 4.38897 26.3251H13.7702C14.0288 26.3251 14.1314 26.6335 14.1314 26.892V27.1266C14.1314 27.6439 14.66 27.9708 15.1774 27.9708H17.0536C17.571 27.9708 17.8686 27.6439 17.8686 27.1266V26.892C17.8686 26.6335 18.2022 26.3251 18.4608 26.3251H27.842C29.6525 26.3251 31 24.9501 31 23.1396V10.475C31 9.699 30.4942 8.97656 29.7183 8.97656Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M8.02881 8.97656H13.6517V9.93656H8.02881V8.97656ZM8.02881 11.1023H13.6517V12.028H8.02881V11.1023ZM8.02881 13.1937H13.6517V14.1537H8.02881V13.1937ZM18.3488 8.97656H23.9717V9.93656H18.3488V8.97656ZM18.3488 11.1023H23.9717V12.028H18.3488V11.1023ZM18.3488 13.1937H23.9717V14.1537H18.3488V13.1937Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M27.1385 7.12571H26.543V6.95758C26.543 5.92304 25.8278 5 24.7932 5H19.1645C17.8609 5 16.7233 5.71424 16.1156 6.77031C15.5078 5.71424 14.3702 5 13.0667 5H7.43798C6.40344 5 5.45726 5.92301 5.45726 6.95758V7.12571H5.0927C4.18755 7.12571 3.33154 8.03381 3.33154 9.06834V21.733C3.33154 23.0261 4.45049 23.9943 5.67902 23.9943H14.2394C15.0153 23.9943 15.6466 24.68 15.6466 25.4H16.5847C16.5847 24.68 17.2159 23.9943 17.9919 23.9943H26.5522C27.7808 23.9943 28.6687 23.0261 28.6687 21.733V9.06834C28.6686 8.03381 28.0436 7.12571 27.1385 7.12571ZM19.1645 5.92571H24.7932C25.3106 5.92571 25.6172 6.44017 25.6172 6.95758V20.3258C25.6172 20.8432 25.3106 21.1829 24.7932 21.1829H19.1645C18.1447 21.1829 17.1829 21.7027 16.4629 22.3981V8.59928C16.4629 7.17677 17.7419 5.92571 19.1645 5.92571ZM6.38294 6.95758C6.38294 6.44021 6.92057 5.92571 7.43794 5.92571H13.0667C14.4892 5.92571 15.5372 7.17673 15.5372 8.59928V22.3926C15.0572 21.6989 14.0849 21.1829 13.0667 21.1829H7.43798C6.92061 21.1829 6.38297 20.8432 6.38297 20.3258V6.95758H6.38294ZM5.67898 23.0686C4.96783 23.0686 4.25722 22.5089 4.25722 21.733V9.06834C4.25722 8.55989 4.7113 8.05143 5.09266 8.05143H5.45722V20.3258C5.45722 21.3603 6.40341 22.1086 7.43794 22.1086H13.0667C13.9619 22.1086 14.7514 22.5782 15.2142 23.2726C14.9169 23.1359 14.5874 23.0686 14.2393 23.0686H5.67898ZM27.7086 21.733C27.7086 22.5089 27.2633 23.0686 26.5522 23.0686H17.9918C17.6437 23.0686 17.3143 23.1359 17.0169 23.2726C17.4797 22.5782 18.2692 22.1086 19.1644 22.1086H24.7932C25.8277 22.1086 26.5429 21.3603 26.5429 20.3258V8.05143H27.1384C27.5198 8.05143 27.7086 8.55989 27.7086 9.06834V21.733H27.7086Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M13.6517 17.6627C13.6517 17.9217 13.4417 18.1317 13.1826 18.1317H8.49787C8.23881 18.1317 8.02881 17.9217 8.02881 17.6627V15.7894C8.02881 15.5303 8.23881 15.3203 8.49787 15.3203H13.1826C13.4417 15.3203 13.6517 15.5303 13.6517 15.7894V17.6627ZM23.9717 17.6627C23.9717 17.9217 23.7617 18.1317 23.5026 18.1317H18.8179C18.5588 18.1317 18.3488 17.9217 18.3488 17.6627V15.7894C18.3488 15.5303 18.5588 15.3203 18.8179 15.3203H23.5026C23.7617 15.3203 23.9717 15.5303 23.9717 15.7894V17.6627Z",fill:"#E0E0E0"})]}),(0,e.jsx)("p",{children:"Jobs"})]})})}),(0,e.jsx)(a.default,{prefetch:!1,href:"/blog",children:(0,e.jsx)("div",{className:i(m),children:(0,e.jsxs)("div",{children:[(0,e.jsxs)("svg",{width:"32",height:"32",viewBox:"0 0 32 32",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:[(0,e.jsx)("path",{d:"M5.17321 24.0616C4.49775 24.0616 3.93421 23.8353 3.4826 23.3827C3.03098 22.9301 2.80469 22.3666 2.80371 21.6921V7.36804C2.80371 6.69355 3.03001 6.13001 3.4826 5.67742C3.93519 5.22483 4.49824 4.99903 5.17175 5H26.8286C27.5031 5 28.0662 5.22581 28.5178 5.67742C28.9694 6.12904 29.1957 6.69257 29.1967 7.36804V21.6936C29.1967 22.368 28.9704 22.9311 28.5178 23.3827C28.0652 23.8343 27.5017 24.0606 26.8272 24.0616H5.17321ZM5.17321 22.5953H26.8286C27.0535 22.5953 27.2602 22.501 27.4489 22.3123C27.6375 22.1237 27.7314 21.9169 27.7304 21.6921V7.36804C27.7304 7.14321 27.6366 6.93646 27.4489 6.7478C27.2602 6.55914 27.053 6.46481 26.8272 6.46481H5.17321C4.94741 6.46481 4.74017 6.55914 4.55151 6.7478C4.36383 6.93549 4.26999 7.14223 4.26999 7.36804V21.6936C4.26999 21.9184 4.36383 22.1246 4.55151 22.3123C4.73919 22.5 4.94594 22.5943 5.17175 22.5953",fill:"#001691"}),(0,e.jsx)("path",{d:"M1 25.5273V26.9936H31V25.5273H1Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M7.19398 12.2539V9.33487L6.07182 10.4606L5.79483 10.1871L7.38929 8.59624L8.9802 10.1871L8.71032 10.4606L7.58461 9.33487V12.2539H7.19398Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M12.4616 12.2539L12.1882 11.984L13.3139 10.8583H10.3984V10.4677H13.3139L12.1882 9.34553L12.4616 9.07209L14.0526 10.663L12.4616 12.2539Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M20.7477 12.7085V8.163H21.0389V12.7085H20.7477ZM21.7278 9.52663C21.7065 9.34671 21.6201 9.20703 21.4686 9.1076C21.3171 9.00817 21.1312 8.95845 20.911 8.95845C20.7501 8.95845 20.6092 8.98449 20.4885 9.03658C20.3689 9.08866 20.2754 9.16027 20.2079 9.25142C20.1416 9.34257 20.1085 9.44614 20.1085 9.56214C20.1085 9.65921 20.1316 9.74266 20.1777 9.8125C20.2251 9.88116 20.2855 9.93857 20.3588 9.98473C20.4322 10.0297 20.5092 10.067 20.5897 10.0966C20.6702 10.125 20.7441 10.1481 20.8116 10.1658L21.1809 10.2653C21.2756 10.2901 21.381 10.3245 21.497 10.3683C21.6142 10.4121 21.726 10.4718 21.8326 10.5476C21.9403 10.6222 22.0291 10.718 22.0989 10.8352C22.1687 10.9524 22.2037 11.0962 22.2037 11.2667C22.2037 11.4632 22.1522 11.6407 22.0492 11.7994C21.9474 11.958 21.7982 12.084 21.6017 12.1776C21.4064 12.2711 21.1691 12.3178 20.8897 12.3178C20.6293 12.3178 20.4038 12.2758 20.2132 12.1918C20.0239 12.1077 19.8747 11.9905 19.7658 11.8402C19.6581 11.6899 19.5971 11.5153 19.5829 11.3164H20.0375C20.0493 11.4537 20.0955 11.5674 20.176 11.6573C20.2576 11.7461 20.3606 11.8124 20.4849 11.8562C20.6104 11.8988 20.7453 11.9201 20.8897 11.9201C21.0578 11.9201 21.2087 11.8929 21.3425 11.8384C21.4763 11.7828 21.5822 11.7058 21.6603 11.6076C21.7385 11.5082 21.7775 11.3922 21.7775 11.2596C21.7775 11.1388 21.7438 11.0406 21.6763 10.9648C21.6088 10.8891 21.5201 10.8275 21.41 10.7802C21.2999 10.7328 21.1809 10.6914 21.0531 10.6559L20.6056 10.5281C20.3216 10.4464 20.0967 10.3298 19.9309 10.1783C19.7652 10.0268 19.6824 9.82848 19.6824 9.58345C19.6824 9.37985 19.7374 9.2023 19.8475 9.05078C19.9587 8.89808 20.1079 8.77971 20.2949 8.69567C20.4831 8.61044 20.6932 8.56783 20.9252 8.56783C21.1596 8.56783 21.368 8.60985 21.5502 8.69389C21.7325 8.77675 21.877 8.89039 21.9835 9.0348C22.0912 9.17921 22.148 9.34316 22.1539 9.52663H21.7278Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M23.8083 12.2539V8.61754H24.0995V12.2539H23.8083ZM23.9788 11.8455C23.7231 11.8455 23.5029 11.7852 23.3183 11.6644C23.1336 11.5437 22.9916 11.3774 22.8921 11.1655C22.7927 10.9536 22.743 10.7115 22.743 10.4393C22.743 10.1623 22.7939 9.91785 22.8957 9.70597C22.9987 9.4929 23.1419 9.32659 23.3254 9.20703C23.51 9.08629 23.7255 9.02592 23.9717 9.02592C24.1634 9.02592 24.3363 9.06143 24.4901 9.13246C24.644 9.20348 24.7701 9.30291 24.8683 9.43075C24.9666 9.55859 25.0276 9.70774 25.0512 9.8782H24.6322C24.6002 9.75391 24.5292 9.64382 24.4191 9.54794C24.3102 9.45088 24.1634 9.40234 23.9788 9.40234C23.8154 9.40234 23.6722 9.44496 23.5491 9.53018C23.4272 9.61423 23.3319 9.73319 23.2632 9.88707C23.1958 10.0398 23.162 10.2191 23.162 10.4251C23.162 10.6358 23.1952 10.8192 23.2615 10.9755C23.3289 11.1317 23.4236 11.2531 23.5455 11.3395C23.6686 11.4259 23.8131 11.4691 23.9788 11.4691C24.0877 11.4691 24.1865 11.4502 24.2753 11.4123C24.3641 11.3744 24.4392 11.32 24.5008 11.2489C24.5624 11.1779 24.6061 11.0927 24.6322 10.9933H25.0512C25.0276 11.1542 24.969 11.2992 24.8754 11.4283C24.7831 11.5561 24.6606 11.6579 24.5079 11.7337C24.3564 11.8082 24.18 11.8455 23.9788 11.8455Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M6.69203 18.8555H6.23038L7.56561 15.2191H8.02015L9.35538 18.8555H8.89373L7.80708 15.7944H7.77868L6.69203 18.8555ZM6.86248 17.435H8.72328V17.8256H6.86248V17.435Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M10.9729 18.9123C10.7267 18.9123 10.5107 18.8537 10.3248 18.7365C10.1402 18.6193 9.99577 18.4554 9.8916 18.2447C9.78862 18.034 9.73713 17.7878 9.73713 17.506C9.73713 17.2219 9.78862 16.974 9.8916 16.7621C9.99577 16.5502 10.1402 16.3857 10.3248 16.2685C10.5107 16.1513 10.7267 16.0927 10.9729 16.0927C11.2191 16.0927 11.4346 16.1513 11.6192 16.2685C11.8051 16.3857 11.9495 16.5502 12.0525 16.7621C12.1566 16.974 12.2087 17.2219 12.2087 17.506C12.2087 17.7878 12.1566 18.034 12.0525 18.2447C11.9495 18.4554 11.8051 18.6193 11.6192 18.7365C11.4346 18.8537 11.2191 18.9123 10.9729 18.9123ZM10.9729 18.5359C11.1599 18.5359 11.3138 18.4879 11.4346 18.392C11.5553 18.2962 11.6447 18.1701 11.7027 18.0138C11.7607 17.8576 11.7897 17.6883 11.7897 17.506C11.7897 17.3237 11.7607 17.1539 11.7027 16.9964C11.6447 16.839 11.5553 16.7118 11.4346 16.6147C11.3138 16.5176 11.1599 16.4691 10.9729 16.4691C10.7859 16.4691 10.632 16.5176 10.5113 16.6147C10.3905 16.7118 10.3012 16.839 10.2432 16.9964C10.1852 17.1539 10.1562 17.3237 10.1562 17.506C10.1562 17.6883 10.1852 17.8576 10.2432 18.0138C10.3012 18.1701 10.3905 18.2962 10.5113 18.392C10.632 18.4879 10.7859 18.5359 10.9729 18.5359ZM10.4616 15.6737C10.387 15.6737 10.3207 15.6452 10.2627 15.5884C10.2059 15.5304 10.1775 15.4641 10.1775 15.3896C10.1775 15.3079 10.2059 15.2404 10.2627 15.1871C10.3207 15.1327 10.387 15.1055 10.4616 15.1055C10.5432 15.1055 10.6107 15.1327 10.664 15.1871C10.7184 15.2404 10.7456 15.3079 10.7456 15.3896C10.7456 15.4641 10.7184 15.5304 10.664 15.5884C10.6107 15.6452 10.5432 15.6737 10.4616 15.6737ZM11.4843 15.6737C11.4097 15.6737 11.3434 15.6452 11.2854 15.5884C11.2286 15.5304 11.2002 15.4641 11.2002 15.3896C11.2002 15.3079 11.2286 15.2404 11.2854 15.1871C11.3434 15.1327 11.4097 15.1055 11.4843 15.1055C11.566 15.1055 11.6334 15.1327 11.6867 15.1871C11.7412 15.2404 11.7684 15.3079 11.7684 15.3896C11.7684 15.4641 11.7412 15.5304 11.6867 15.5884C11.6334 15.6452 11.566 15.6737 11.4843 15.6737Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M19.3297 18.1737V17.9819C19.3297 17.8493 19.3569 17.728 19.4114 17.6179C19.467 17.5066 19.5475 17.4179 19.6529 17.3516C19.7594 17.2841 19.8884 17.2504 20.04 17.2504C20.1938 17.2504 20.3229 17.2841 20.427 17.3516C20.5312 17.4179 20.6099 17.5066 20.6632 17.6179C20.7164 17.728 20.7431 17.8493 20.7431 17.9819V18.1737C20.7431 18.3062 20.7158 18.4281 20.6614 18.5394C20.6081 18.6495 20.5288 18.7383 20.4235 18.8058C20.3193 18.872 20.1915 18.9052 20.04 18.9052C19.8861 18.9052 19.7565 18.872 19.6511 18.8058C19.5458 18.7383 19.4658 18.6495 19.4114 18.5394C19.3569 18.4281 19.3297 18.3062 19.3297 18.1737ZM19.6919 17.9819V18.1737C19.6919 18.2837 19.718 18.3826 19.7701 18.4702C19.8221 18.5566 19.9121 18.5998 20.04 18.5998C20.1642 18.5998 20.2518 18.5566 20.3027 18.4702C20.3548 18.3826 20.3809 18.2837 20.3809 18.1737V17.9819C20.3809 17.8718 20.356 17.7736 20.3063 17.6871C20.2566 17.5996 20.1678 17.5558 20.04 17.5558C19.9157 17.5558 19.8263 17.5996 19.7718 17.6871C19.7186 17.7736 19.6919 17.8718 19.6919 17.9819ZM17.5186 16.0927V15.9009C17.5186 15.7683 17.5459 15.647 17.6003 15.5369C17.656 15.4257 17.7364 15.3369 17.8418 15.2706C17.9483 15.2031 18.0774 15.1694 18.2289 15.1694C18.3828 15.1694 18.5118 15.2031 18.6159 15.2706C18.7201 15.3369 18.7988 15.4257 18.8521 15.5369C18.9054 15.647 18.932 15.7683 18.932 15.9009V16.0927C18.932 16.2253 18.9048 16.3472 18.8503 16.4585C18.7971 16.5685 18.7177 16.6573 18.6124 16.7248C18.5082 16.7911 18.3804 16.8242 18.2289 16.8242C18.075 16.8242 17.9454 16.7911 17.84 16.7248C17.7347 16.6573 17.6548 16.5685 17.6003 16.4585C17.5459 16.3472 17.5186 16.2253 17.5186 16.0927ZM17.8809 15.9009V16.0927C17.8809 16.2028 17.9069 16.3016 17.959 16.3892C18.0111 16.4756 18.101 16.5188 18.2289 16.5188C18.3532 16.5188 18.4408 16.4756 18.4917 16.3892C18.5437 16.3016 18.5698 16.2028 18.5698 16.0927V15.9009C18.5698 15.7908 18.5449 15.6926 18.4952 15.6062C18.4455 15.5186 18.3567 15.4748 18.2289 15.4748C18.1046 15.4748 18.0152 15.5186 17.9608 15.6062C17.9075 15.6926 17.8809 15.7908 17.8809 15.9009ZM17.6536 18.8555L20.1536 15.2191H20.5584L18.0584 18.8555H17.6536Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M22.611 18.2163V15.8725H23.0087V18.2163H22.611ZM21.638 17.2433V16.8455H23.9817V17.2433H21.638Z",fill:"#001691"})]}),(0,e.jsx)("p",{children:"Blog"})]})})})]})})]})})}])},1805,t=>{"use strict";var e=t.i(43476),o=t.i(22016);t.s(["default",0,function(){return(0,e.jsxs)("footer",{className:"rk-footer",children:[(0,e.jsxs)("div",{className:"container-fluid custom-container rk-footer-inner",children:[(0,e.jsxs)("div",{className:"rk-footer-brand",children:[(0,e.jsx)("div",{className:"rk-logo",children:(0,e.jsx)("img",{src:"/front-assets/images/logo/logo.svg",className:"img-fluid nav-logo",width:200,height:35,alt:"ResumeSathi"})}),(0,e.jsx)("p",{className:"rk-footer-tag",children:"Your data, always yours. Create resumes without signup or hidden fees."})]}),(0,e.jsxs)("div",{className:"rk-footer-cols",children:[(0,e.jsxs)("div",{className:"rk-footer-col",children:[(0,e.jsx)("div",{className:"rk-footer-col-title",children:"Product"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/tools",children:"Tools"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/typing",children:"Typing Practice"})]}),(0,e.jsxs)("div",{className:"rk-footer-col",children:[(0,e.jsx)("div",{className:"rk-footer-col-title",children:"Jobs"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/jobs",children:"Jobs"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/blog",children:"Career Tips"})]}),(0,e.jsxs)("div",{className:"rk-footer-col",children:[(0,e.jsx)("div",{className:"rk-footer-col-title",children:"Company"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/about",children:"About"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/terms-and-conditions",children:"Terms & Conditions"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/privacy-policy",children:"Privacy Policy"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/disclaimer",children:"Disclaimer"}),(0,e.jsx)(o.default,{prefetch:!1,href:"/contact",children:"Contact"})]})]})]}),(0,e.jsx)("div",{className:"rk-footer-bottom",children:(0,e.jsxs)("div",{className:"container-fluid custom-container rk-footer-bottom-inner",children:[(0,e.jsxs)("span",{children:["© ",new Date().getFullYear()," ResumeSathi · Your data never leaves your device"]}),(0,e.jsx)("span",{children:"Made with ♥ for every career"})]})})]})}])},99559,t=>{"use strict";var e=t.i(43476),o=t.i(71645),a=t.i(44134),s=t.i(1805),i=t.i(48293),r=t.i(70319),n=t.i(56518);let l="support@resumesathi.com",c="+91 00000 00000",d=`${(0,n.getApiBase)()}/contact`,f={name:"",email:"",phone:"",message:""},h=()=>{let t=Math.floor(9*Math.random())+1,e=Math.floor(9*Math.random())+1;return{a:t,b:e,answer:t+e}};t.s(["default",0,function(){let[t,n]=(0,o.useState)(f),[u,m]=(0,o.useState)({}),[p,y]=(0,o.useState)(!1),[x,g]=(0,o.useState)({a:0,b:0,answer:0}),[C,v]=(0,o.useState)(""),[_,b]=(0,o.useState)(""),[j,k]=(0,o.useState)(!1);(0,o.useEffect)(()=>{g(h())},[]);let T=(0,o.useCallback)(()=>{g(h()),v("")},[]),w=t=>{(t.preventDefault(),""===C.trim())?b("Please solve the sum to continue."):Number(C.trim())===x.answer?(k(!0),b("")):(b("That’s not quite right — try the new sum below."),T())},L=t=>{let{name:e,value:o}=t.target;n(t=>({...t,[e]:o})),u[e]&&m(t=>({...t,[e]:""}))},N=async e=>{let o;if(e.preventDefault(),!j)return void r.toast.error("Please verify the captcha before sending your message.",{position:"top-right",autoClose:4e3,closeOnClick:!1,theme:"light"});if(o={},t.name.trim()||(o.name="Please enter your name."),t.email.trim()?/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(t.email.trim())||(o.email="Please enter a valid email address."):o.email="Please enter your email.",t.message.trim()||(o.message="Please enter your message."),m(o),0===Object.keys(o).length){y(!0);try{let e=await fetch(d,{method:"POST",headers:{"Content-Type":"application/json",Accept:"application/json"},body:JSON.stringify({name:t.name.trim(),email:t.email.trim(),phone:t.phone.trim()||null,message:t.message.trim()})}),o=await e.json().catch(()=>null);if(422===e.status){(t=>{if(!t)return;let e={};Object.keys(t).forEach(o=>{let a=t[o];e[o]=Array.isArray(a)?a[0]:a}),m(t=>({...t,...e}))})(o?.errors),r.toast.error("Please fix the highlighted fields and try again.",{position:"top-right",autoClose:4e3,closeOnClick:!1,theme:"light"});return}if(!e.ok)throw Error(o?.message||"Something went wrong. Please try again.");r.toast.success(o?.message||"Your message has been sent successfully!",{position:"top-right",autoClose:4e3,closeOnClick:!1,theme:"light"}),n(f),m({}),k(!1),T()}catch(t){console.error("Contact form submission failed:",t),r.toast.error(t.message||"Unable to send your message right now. Please try again later.",{position:"top-right",autoClose:4e3,closeOnClick:!1,theme:"light"})}finally{y(!1)}}};return(0,e.jsxs)(e.Fragment,{children:[(0,e.jsx)(a.default,{}),(0,e.jsx)("section",{className:"lp-hero",children:(0,e.jsxs)("div",{className:"container-fluid custom-container",children:[(0,e.jsxs)("span",{className:"lp-eyebrow",children:[(0,e.jsxs)("svg",{width:"12",height:"12",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"}),(0,e.jsx)("polyline",{points:"22,6 12,13 2,6"})]}),"We’d Love to Hear From You"]}),(0,e.jsx)("h1",{children:"Contact Us"}),(0,e.jsx)("p",{children:"Questions, feedback, or partnership ideas — send us a message and our team will get back to you as soon as possible."})]})}),(0,e.jsx)("section",{className:"lp-body",children:(0,e.jsx)("div",{className:"container-fluid custom-container",children:(0,e.jsxs)("div",{className:"ct-grid",children:[(0,e.jsxs)("div",{className:"ct-form-card",children:[(0,e.jsx)("h3",{children:"Send a Message"}),(0,e.jsx)("p",{children:"Fill out the form below and we’ll respond to your email directly."}),!j&&(0,e.jsxs)("div",{className:"ct-captcha-box",children:[(0,e.jsx)("div",{className:"ct-captcha-icon",children:(0,e.jsxs)("svg",{width:"18",height:"18",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("rect",{width:"18",height:"11",x:"3",y:"11",rx:"2"}),(0,e.jsx)("path",{d:"M7 11V7a5 5 0 0 1 10 0v4"})]})}),(0,e.jsxs)("div",{className:"ct-captcha-body",children:[(0,e.jsx)("p",{className:"ct-captcha-title",children:"Quick check before you write to us"}),(0,e.jsx)("p",{className:"ct-captcha-sub",children:"Solve this to unlock the form — helps us keep spam out."}),(0,e.jsxs)("div",{className:"ct-captcha-row",children:[(0,e.jsxs)("span",{className:"ct-captcha-sum",children:[x.a," + ",x.b," ="]}),(0,e.jsx)("input",{type:"text",inputMode:"numeric",value:C,onChange:t=>{v(t.target.value),_&&b("")},placeholder:"?",className:"ct-captcha-input",onKeyDown:t=>{"Enter"===t.key&&w(t)}}),(0,e.jsx)("button",{type:"button",className:"ct-captcha-verify-btn",onClick:w,children:"Verify"})]}),_&&(0,e.jsx)("p",{className:"ct-error",children:_})]})]}),j&&(0,e.jsxs)("div",{className:"ct-captcha-verified",children:[(0,e.jsx)("svg",{width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:(0,e.jsx)("path",{d:"M20 6 9 17l-5-5"})}),"Verified — you can fill the form now"]}),(0,e.jsx)("fieldset",{disabled:!j,className:`ct-fieldset ${!j?"ct-fieldset--locked":""}`,children:(0,e.jsxs)("form",{onSubmit:N,noValidate:!0,children:[(0,e.jsxs)("div",{className:"ct-row-2",children:[(0,e.jsxs)("div",{className:"ct-field",children:[(0,e.jsxs)("label",{htmlFor:"ct-name",children:["Your Name ",(0,e.jsx)("span",{className:"text-danger",children:"*"})]}),(0,e.jsx)("input",{id:"ct-name",type:"text",name:"name",value:t.name,onChange:L,placeholder:"Enter your full name"}),u.name&&(0,e.jsx)("p",{className:"ct-error",children:u.name})]}),(0,e.jsxs)("div",{className:"ct-field",children:[(0,e.jsxs)("label",{htmlFor:"ct-email",children:["Your Email ",(0,e.jsx)("span",{className:"text-danger",children:"*"})]}),(0,e.jsx)("input",{id:"ct-email",type:"email",name:"email",value:t.email,onChange:L,placeholder:"you@example.com"}),u.email&&(0,e.jsx)("p",{className:"ct-error",children:u.email})]})]}),(0,e.jsx)("div",{className:"ct-row",children:(0,e.jsxs)("div",{className:"ct-field",children:[(0,e.jsx)("label",{htmlFor:"ct-phone",children:"Phone Number (optional)"}),(0,e.jsx)("input",{id:"ct-phone",type:"tel",name:"phone",value:t.phone,onChange:L,placeholder:"+91 00000 00000"}),u.phone&&(0,e.jsx)("p",{className:"ct-error",children:u.phone})]})}),(0,e.jsxs)("div",{className:"ct-field",children:[(0,e.jsxs)("label",{htmlFor:"ct-message",children:["Message ",(0,e.jsx)("span",{className:"text-danger",children:"*"})]}),(0,e.jsx)("textarea",{id:"ct-message",name:"message",value:t.message,onChange:L,placeholder:"Write your message here..."}),u.message&&(0,e.jsx)("p",{className:"ct-error",children:u.message})]}),(0,e.jsxs)("button",{type:"submit",className:"ct-submit-btn",disabled:p||!j,children:[(0,e.jsxs)("svg",{width:"16",height:"16",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"m22 2-7 20-4-9-9-4Z"}),(0,e.jsx)("path",{d:"M22 2 11 13"})]}),p?"Sending...":"Send Message"]})]})})]}),(0,e.jsxs)("div",{className:"ct-info-card",children:[(0,e.jsx)("h3",{children:"Get in Touch"}),(0,e.jsxs)("div",{className:"ct-info-row",children:[(0,e.jsx)("div",{className:"ct-info-icon",children:(0,e.jsxs)("svg",{width:"17",height:"17",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}),(0,e.jsx)("path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"})]})}),(0,e.jsxs)("div",{children:[(0,e.jsx)("p",{className:"ct-info-label",children:"Email"}),(0,e.jsx)("p",{className:"ct-info-value",children:(0,e.jsx)("a",{href:`mailto:${l}`,children:l})})]})]}),(0,e.jsxs)("div",{className:"ct-info-row d-none",children:[(0,e.jsx)("div",{className:"ct-info-icon",children:(0,e.jsx)("svg",{width:"17",height:"17",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:(0,e.jsx)("path",{d:"M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 9.81a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.06 0h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 7.91a16 16 0 0 0 5.45 5.45l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 14.92z"})})}),(0,e.jsxs)("div",{children:[(0,e.jsx)("p",{className:"ct-info-label",children:"Phone"}),(0,e.jsx)("p",{className:"ct-info-value",children:(0,e.jsx)("a",{href:`tel:${c.replace(/\s+/g,"")}`,children:c})})]})]}),(0,e.jsxs)("div",{className:"ct-info-row",children:[(0,e.jsx)("div",{className:"ct-info-icon",children:(0,e.jsxs)("svg",{width:"17",height:"17",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M20 10c0 4.418-8 12-8 12S4 14.418 4 10a8 8 0 0 1 16 0z"}),(0,e.jsx)("circle",{cx:"12",cy:"10",r:"3"})]})}),(0,e.jsxs)("div",{children:[(0,e.jsx)("p",{className:"ct-info-label",children:"Location"}),(0,e.jsx)("p",{className:"ct-info-value",children:"India"})]})]}),(0,e.jsxs)("div",{className:"ct-info-row",children:[(0,e.jsx)("div",{className:"ct-info-icon",children:(0,e.jsxs)("svg",{width:"17",height:"17",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("circle",{cx:"12",cy:"12",r:"10"}),(0,e.jsx)("polyline",{points:"12 6 12 12 16 14"})]})}),(0,e.jsxs)("div",{children:[(0,e.jsx)("p",{className:"ct-info-label",children:"Response Time"}),(0,e.jsx)("p",{className:"ct-info-value",children:"Within 24–48 hours"})]})]})]})]})})}),(0,e.jsx)(s.default,{}),(0,e.jsx)(i.default,{}),(0,e.jsx)(r.ToastContainer,{})]})}])}]);