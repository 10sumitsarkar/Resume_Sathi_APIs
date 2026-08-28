(globalThis.TURBOPACK||(globalThis.TURBOPACK=[])).push(["object"==typeof document?document.currentScript:void 0,7670,t=>{"use strict";t.s(["default",0,function(){for(var t,e,a=0,o="",s=arguments.length;a<s;a++)(t=arguments[a])&&(e=function t(e){var a,o,s="";if("string"==typeof e||"number"==typeof e)s+=e;else if("object"==typeof e)if(Array.isArray(e)){var i=e.length;for(a=0;a<i;a++)e[a]&&(o=t(e[a]))&&(s&&(s+=" "),s+=o)}else for(o in e)e[o]&&(s&&(s+=" "),s+=o);return s}(t))&&(o&&(o+=" "),o+=e);return o}])},70319,t=>{"use strict";var e=t.i(71645),a=t.i(7670),o=t=>"number"==typeof t&&!isNaN(t),s=t=>"string"==typeof t||"function"==typeof t?t:null,i=t=>(0,e.isValidElement)(t)||"string"==typeof t||"function"==typeof t||o(t);function r({enter:t,exit:a,appendPosition:o=!1,collapse:s=!0,collapseDuration:i=300}){return function({children:r,position:n,preventExitTransition:l,done:c,nodeRef:d,isIn:f,playToast:u}){let m=o?`${t}--${n}`:t,p=o?`${a}--${n}`:a,h=(0,e.useRef)(0);return(0,e.useLayoutEffect)(()=>{let t=d.current,e=m.split(" "),a=o=>{o.target===d.current&&(u(),t.removeEventListener("animationend",a),t.removeEventListener("animationcancel",a),0===h.current&&"animationcancel"!==o.type&&t.classList.remove(...e))};t.classList.add(...e),t.addEventListener("animationend",a),t.addEventListener("animationcancel",a)},[]),(0,e.useEffect)(()=>{let t=d.current,e=()=>{t.removeEventListener("animationend",e),s?function(t,e,a=300){let{scrollHeight:o,style:s}=t;requestAnimationFrame(()=>{s.minHeight="initial",s.height=o+"px",s.transition=`all ${a}ms`,requestAnimationFrame(()=>{s.height="0",s.padding="0",s.margin="0",setTimeout(e,a)})})}(t,c,i):c()};f||(l?e():(h.current=1,t.className+=` ${p}`,t.addEventListener("animationend",e)))},[f]),e.default.createElement(e.default.Fragment,null,r)}}function n(t,e){return{content:l(t.content,t.props),containerId:t.props.containerId,id:t.props.toastId,theme:t.props.theme,type:t.props.type,data:t.props.data||{},isLoading:t.props.isLoading,icon:t.props.icon,reason:t.removalReason,status:e}}function l(t,a,o=!1){return(0,e.isValidElement)(t)&&"string"!=typeof t.type?(0,e.cloneElement)(t,{closeToast:a.closeToast,toastProps:a,data:a.data,isPaused:o}):"function"==typeof t?t({closeToast:a.closeToast,toastProps:a,data:a.data,isPaused:o}):t}function c({delay:t,isRunning:o,closeToast:s,type:i="default",hide:r,className:n,controlledProgress:l,progress:d,rtl:f,isIn:u,theme:m}){let p=r||l&&0===d,h={animationDuration:`${t}ms`,animationPlayState:o?"running":"paused"};l&&(h.transform=`scaleX(${d})`);let y=(0,a.default)("Toastify__progress-bar",l?"Toastify__progress-bar--controlled":"Toastify__progress-bar--animated",`Toastify__progress-bar-theme--${m}`,`Toastify__progress-bar--${i}`,{"Toastify__progress-bar--rtl":f}),g="function"==typeof n?n({rtl:f,type:i,defaultClassName:y}):(0,a.default)(y,n);return e.default.createElement("div",{className:"Toastify__progress-bar--wrp","data-hidden":p},e.default.createElement("div",{className:`Toastify__progress-bar--bg Toastify__progress-bar-theme--${m} Toastify__progress-bar--${i}`}),e.default.createElement("div",{role:"progressbar","aria-hidden":p?"true":"false","aria-label":"notification timer","aria-valuenow":l?Math.round(100*d):void 0,"aria-valuemin":0,"aria-valuemax":100,className:g,style:h,...{[l&&d>=1?"onTransitionEnd":"onAnimationEnd"]:l&&d<1?null:()=>{u&&s()}}}))}var d=1,f=()=>`${d++}`,u=new Map,m=[],p=new Set,h=t=>p.forEach(e=>e(t));function y(t,e){var a;if(e)return!!(null!=(a=u.get(e))&&a.isToastActive(t));let o=!1;return u.forEach(e=>{e.isToastActive(t)&&(o=!0)}),o}function g(t,e){i(t)&&(u.size>0||m.push({content:t,options:e}),u.forEach(a=>{a.buildToast(t,e)}))}function v(t,e){u.forEach(a=>{null!=e&&null!=e&&e.containerId&&(null==e?void 0:e.containerId)!==a.id||a.toggle(t,null==e?void 0:e.id)})}function _(t,e){return g(t,e),e.toastId}function b(t,e){var a;return{...e,type:e&&e.type||t,toastId:(a=e)&&("string"==typeof a.toastId||o(a.toastId))?a.toastId:f()}}function x(t){return(e,a)=>_(e,b(t,a))}function T(t,e){return _(t,b("default",e))}T.loading=(t,e)=>_(t,b("default",{isLoading:!0,autoClose:!1,closeOnClick:!1,closeButton:!1,draggable:!1,...e})),T.promise=function(t,{pending:e,error:a,success:o},s){let i;e&&(i="string"==typeof e?T.loading(e,s):T.loading(e.render,{...s,...e}));let r={isLoading:null,autoClose:null,closeOnClick:null,closeButton:null,draggable:null},n=(t,e,a)=>{if(null==e)return void T.dismiss(i);let o={type:t,...r,...s,data:a},n="string"==typeof e?{render:e}:e;return i?T.update(i,{...o,...n}):T(n.render,{...o,...n}),a},l="function"==typeof t?t():t;return l.then(t=>n("success",o,t)).catch(t=>n("error",a,t)),l},T.success=x("success"),T.info=x("info"),T.error=x("error"),T.warning=x("warning"),T.warn=T.warning,T.dark=(t,e)=>_(t,b("default",{theme:"dark",...e})),T.dismiss=function(t){!function(t){let e;if(!(u.size>0)){m=m.filter(e=>null!=t&&e.options.toastId!==t);return}if(null==t||"string"==typeof(e=t)||o(e))u.forEach(e=>{e.removeToast(t)});else if(t&&("containerId"in t||"id"in t)){let e=u.get(t.containerId);e?e.removeToast(t.id):u.forEach(e=>{e.removeToast(t.id)})}}(t)},T.clearWaitingQueue=(t={})=>{u.forEach(e=>{e.props.limit&&(!t.containerId||e.id===t.containerId)&&e.clearQueue()})},T.isActive=y,T.update=(t,e={})=>{let a=((t,{containerId:e})=>{var a;return null==(a=u.get(e||1))?void 0:a.toasts.get(t)})(t,e);if(a){let{props:o,content:s}=a,i={delay:100,...o,...e,toastId:e.toastId||t,updateId:f()};i.toastId!==t&&(i.staleId=t);let r=i.render||s;delete i.render,_(r,i)}},T.done=t=>{T.update(t,{progress:1})},T.onChange=function(t){return p.add(t),()=>{p.delete(t)}},T.play=t=>v(!0,t),T.pause=t=>v(!1,t);var w="u">typeof window?e.useLayoutEffect:e.useEffect,k=({theme:t,type:a,isLoading:o,...s})=>e.default.createElement("svg",{viewBox:"0 0 24 24",width:"100%",height:"100%",fill:"colored"===t?"currentColor":`var(--toastify-icon-color-${a})`,...s}),j={info:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.013 12.013 0 0012 0zm.25 5a1.5 1.5 0 11-1.5 1.5 1.5 1.5 0 011.5-1.5zm2.25 13.5h-4a1 1 0 010-2h.75a.25.25 0 00.25-.25v-4.5a.25.25 0 00-.25-.25h-.75a1 1 0 010-2h1a2 2 0 012 2v4.75a.25.25 0 00.25.25h.75a1 1 0 110 2z"}))},warning:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M23.32 17.191L15.438 2.184C14.728.833 13.416 0 11.996 0c-1.42 0-2.733.833-3.443 2.184L.533 17.448a4.744 4.744 0 000 4.368C1.243 23.167 2.555 24 3.975 24h16.05C22.22 24 24 22.044 24 19.632c0-.904-.251-1.746-.68-2.44zm-9.622 1.46c0 1.033-.724 1.823-1.698 1.823s-1.698-.79-1.698-1.822v-.043c0-1.028.724-1.822 1.698-1.822s1.698.79 1.698 1.822v.043zm.039-12.285l-.84 8.06c-.057.581-.408.943-.897.943-.49 0-.84-.367-.896-.942l-.84-8.065c-.057-.624.25-1.095.779-1.095h1.91c.528.005.84.476.784 1.1z"}))},success:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm6.927 8.2l-6.845 9.289a1.011 1.011 0 01-1.43.188l-4.888-3.908a1 1 0 111.25-1.562l4.076 3.261 6.227-8.451a1 1 0 111.61 1.183z"}))},error:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M11.983 0a12.206 12.206 0 00-8.51 3.653A11.8 11.8 0 000 12.207 11.779 11.779 0 0011.8 24h.214A12.111 12.111 0 0024 11.791 11.766 11.766 0 0011.983 0zM10.5 16.542a1.476 1.476 0 011.449-1.53h.027a1.527 1.527 0 011.523 1.47 1.475 1.475 0 01-1.449 1.53h-.027a1.529 1.529 0 01-1.523-1.47zM11 12.5v-6a1 1 0 012 0v6a1 1 0 11-2 0z"}))},spinner:function(){return e.default.createElement("div",{className:"Toastify__spinner"})}},I=t=>{let{isRunning:o,preventExitTransition:s,toastRef:i,eventHandlers:r,playToast:n}=function(t){var a,o;let[s,i]=(0,e.useState)(!1),[r,n]=(0,e.useState)(!1),l=(0,e.useRef)(null),c=(0,e.useRef)({start:0,delta:0,removalDistance:0,canCloseOnClick:!0,canDrag:!1,didMove:!1}).current,{autoClose:d,pauseOnHover:f,closeToast:m,onClick:p,closeOnClick:h}=t;function y(){i(!0)}function g(){i(!1)}function v(e){let a=l.current;if(c.canDrag&&a){c.didMove=!0,s&&g(),"x"===t.draggableDirection?c.delta=e.clientX-c.start:c.delta=e.clientY-c.start,c.start!==e.clientX&&(c.canCloseOnClick=!1);let o="x"===t.draggableDirection?`${c.delta}px, var(--y)`:`0, calc(${c.delta}px + var(--y))`;a.style.transform=`translate3d(${o},0)`,a.style.opacity=`${1-Math.abs(c.delta/c.removalDistance)}`}}function _(){document.removeEventListener("pointermove",v),document.removeEventListener("pointerup",_);let e=l.current;if(c.canDrag&&c.didMove&&e){if(c.canDrag=!1,Math.abs(c.delta)>c.removalDistance){n(!0),t.closeToast(!0),t.collapseAll();return}e.style.transition="transform 0.2s, opacity 0.2s",e.style.removeProperty("transform"),e.style.removeProperty("opacity")}}a={id:t.toastId,containerId:t.containerId,fn:i},null==(o=u.get(a.containerId||1))||o.setToggle(a.id,a.fn),(0,e.useEffect)(()=>{if(t.pauseOnFocusLoss)return document.hasFocus()||g(),window.addEventListener("focus",y),window.addEventListener("blur",g),()=>{window.removeEventListener("focus",y),window.removeEventListener("blur",g)}},[t.pauseOnFocusLoss]);let b={onPointerDown:function(e){if(!0===t.draggable||t.draggable===e.pointerType){c.didMove=!1,document.addEventListener("pointermove",v),document.addEventListener("pointerup",_);let a=l.current;c.canCloseOnClick=!0,c.canDrag=!0,a.style.transition="none","x"===t.draggableDirection?(c.start=e.clientX,c.removalDistance=a.offsetWidth*(t.draggablePercent/100)):(c.start=e.clientY,c.removalDistance=a.offsetHeight*(80===t.draggablePercent?1.5*t.draggablePercent:t.draggablePercent)/100)}},onPointerUp:function(e){let{top:a,bottom:o,left:s,right:i}=l.current.getBoundingClientRect();"mouse"===e.pointerType&&t.pauseOnHover&&e.clientX>=s&&e.clientX<=i&&e.clientY>=a&&e.clientY<=o?g():y()}};return d&&f&&(b.onMouseEnter=g,t.stacked||(b.onMouseLeave=y)),h&&(b.onClick=t=>{p&&p(t),c.canCloseOnClick&&m(!0)}),{playToast:y,pauseToast:g,isRunning:s,preventExitTransition:r,toastRef:l,eventHandlers:b}}(t),{closeButton:d,children:f,autoClose:m,onClick:p,type:h,hideProgressBar:y,closeToast:g,transition:v,position:_,className:b,style:x,progressClassName:T,updateId:w,role:k,progress:I,rtl:E,toastId:N,deleteToast:C,isIn:L,isLoading:z,closeOnClick:P,theme:R,ariaLabel:O}=t,S=(0,a.default)("Toastify__toast",`Toastify__toast-theme--${R}`,`Toastify__toast--${h}`,{"Toastify__toast--rtl":E},{"Toastify__toast--close-on-click":P}),$="function"==typeof b?b({rtl:E,position:_,type:h,defaultClassName:S}):(0,a.default)(S,b),D=function({theme:t,type:a,isLoading:o,icon:s}){let i=null,r={theme:t,type:a};return!1===s||("function"==typeof s?i=s({...r,isLoading:o}):(0,e.isValidElement)(s)?i=(0,e.cloneElement)(s,r):o?i=j.spinner():a in j&&(i=j[a](r))),i}(t),M=!!I||!m,A={closeToast:g,type:h,theme:R},B=null;return!1===d||(B="function"==typeof d?d(A):(0,e.isValidElement)(d)?(0,e.cloneElement)(d,A):function({closeToast:t,theme:a,ariaLabel:o="close"}){return e.default.createElement("button",{className:`Toastify__close-button Toastify__close-button--${a}`,type:"button",onClick:e=>{e.stopPropagation(),t(!0)},"aria-label":o},e.default.createElement("svg",{"aria-hidden":"true",viewBox:"0 0 14 16"},e.default.createElement("path",{fillRule:"evenodd",d:"M7.71 8.23l3.75 3.75-1.48 1.48-3.75-3.75-3.75 3.75L1 11.98l3.75-3.75L1 4.48 2.48 3l3.75 3.75L9.98 3l1.48 1.48-3.75 3.75z"})))}(A)),e.default.createElement(v,{isIn:L,done:C,position:_,preventExitTransition:s,nodeRef:i,playToast:n},e.default.createElement("div",{id:N,tabIndex:0,onClick:p,"data-in":L,className:$,...r,style:x,ref:i,...L&&{role:k,"aria-label":O}},null!=D&&e.default.createElement("div",{className:(0,a.default)("Toastify__toast-icon",{"Toastify--animate-icon Toastify__zoom-enter":!z})},D),l(f,t,!o),B,!t.customProgressBar&&e.default.createElement(c,{...w&&!M?{key:`p-${w}`}:{},rtl:E,theme:R,delay:m,isRunning:o,isIn:L,closeToast:g,hide:y,type:h,className:T,controlledProgress:M,progress:I||0})))},E=(t,e=!1)=>({enter:`Toastify--animate Toastify__${t}-enter`,exit:`Toastify--animate Toastify__${t}-exit`,appendPosition:e}),N=r(E("bounce",!0));r(E("slide",!0)),r(E("zoom")),r(E("flip"));var C={position:"top-right",transition:N,autoClose:5e3,closeButton:!0,pauseOnHover:!0,pauseOnFocusLoss:!0,draggable:"touch",draggablePercent:80,draggableDirection:"x",role:"alert",theme:"light","aria-label":"Notifications Alt+T",hotKeys:t=>t.altKey&&"KeyT"===t.code};function L(t){let r={...C,...t},l=t.stacked,[c,d]=(0,e.useState)(!0),f=(0,e.useRef)(null),{getToastToRender:p,isToastActive:v,count:_}=function(t){var a;let r,{subscribe:l,getSnapshot:c,setProps:d}=(0,e.useRef)((r=t.containerId||1,{subscribe(e){let a,l,c,d,f,p,y,v,_,b,x,T=(a=1,l=0,c=[],d=[],f=t,p=new Map,y=new Set,v=()=>{d=Array.from(p.values()),y.forEach(t=>t())},_=t=>{var e,a;t.isActive&&(null==(a=null==(e=t.props)?void 0:e.onClose)||a.call(e,t.removalReason),t.isActive=!1,h(n(t,"removed")))},b=t=>{if(null==t)p.forEach(_);else{let e=p.get(t);e&&_(e)}v()},x=t=>{var e,a;let{toastId:o,updateId:s}=t.props,i=null==s;t.staleId&&p.delete(t.staleId),t.isActive=!0,p.set(o,t),v(),h(n(t,i?"added":"updated")),i&&(null==(a=(e=t.props).onOpen)||a.call(e))},{id:r,props:f,observe:t=>(y.add(t),()=>y.delete(t)),toggle:(t,e)=>{p.forEach(a=>{var o;(null==e||e===a.props.toastId)&&(null==(o=a.toggle)||o.call(a,t))})},removeToast:b,toasts:p,clearQueue:()=>{l-=c.length,c=[]},buildToast:(t,e)=>{let n,d;if((({containerId:t,toastId:e,updateId:a})=>{let o=p.has(e)&&null==a;return(t?t!==r:1!==r)||o})(e))return;let{toastId:u,updateId:m,data:h,staleId:y,delay:g}=e,_=null==m;_&&l++;let T={...f,style:f.toastStyle,key:a++,...Object.fromEntries(Object.entries(e).filter(([t,e])=>null!=e)),toastId:u,updateId:m,data:h,isIn:!1,className:s(e.className||f.toastClassName),progressClassName:s(e.progressClassName||f.progressClassName),autoClose:!e.isLoading&&(n=e.autoClose,d=f.autoClose,!1===n||o(n)&&n>0?n:d),closeToast(t){let e=p.get(u);e&&(e.removalReason=t,b(u))},deleteToast(){if(null!=p.get(u)){if(p.delete(u),--l<0&&(l=0),c.length>0)return void x(c.shift());v()}}};T.closeButton=f.closeButton,!1===e.closeButton||i(e.closeButton)?T.closeButton=e.closeButton:!0===e.closeButton&&(T.closeButton=!i(f.closeButton)||f.closeButton);let w={content:t,props:T,staleId:y};f.limit&&f.limit>0&&l>f.limit&&_?c.push(w):o(g)?setTimeout(()=>{x(w)},g):x(w)},setProps(t){f=t},setToggle:(t,e)=>{let a=p.get(t);a&&(a.toggle=e)},isToastActive:t=>{var e;return null==(e=p.get(t))?void 0:e.isActive},getSnapshot:()=>d});u.set(r,T);let w=T.observe(e);return m.forEach(t=>g(t.content,t.options)),m=[],()=>{w(),u.delete(r)}},setProps(t){var e;null==(e=u.get(r))||e.setProps(t)},getSnapshot(){var t;return null==(t=u.get(r))?void 0:t.getSnapshot()}})).current;d(t);let f=null==(a=(0,e.useSyncExternalStore)(l,c,c))?void 0:a.slice();return{getToastToRender:function(e){if(!f)return[];let a=new Map;return t.newestOnTop&&f.reverse(),f.forEach(t=>{let{position:e}=t.props;a.has(e)||a.set(e,[]),a.get(e).push(t)}),Array.from(a,t=>e(t[0],t[1]))},isToastActive:y,count:null==f?void 0:f.length}}(r),{className:b,style:x,rtl:k,containerId:j,hotKeys:E}=r;function N(){l&&(d(!0),T.play())}return w(()=>{var t;if(l){let e=f.current.querySelectorAll('[data-in="true"]'),a=null==(t=r.position)?void 0:t.includes("top"),o=0,s=0;Array.from(e).reverse().forEach((t,e)=>{t.classList.add("Toastify__toast--stacked"),e>0&&(t.dataset.collapsed=`${c}`),t.dataset.pos||(t.dataset.pos=a?"top":"bot");let i=o*(c?.2:1)+(c?0:12*e),r=Math.max(.5,1-(c?s:0));t.style.setProperty("--y",`${a?i:-1*i}px`),t.style.setProperty("--g","12"),t.style.setProperty("--s",`${r}`),o+=t.offsetHeight,s+=.025})}},[c,_,l]),(0,e.useEffect)(()=>{function t(t){var e;let a=f.current;E(t)&&(null==(e=null==a?void 0:a.querySelector('[tabIndex="0"]'))||e.focus(),d(!1),T.pause()),"Escape"===t.key&&(document.activeElement===a||null!=a&&a.contains(document.activeElement))&&(d(!0),T.play())}return document.addEventListener("keydown",t),()=>{document.removeEventListener("keydown",t)}},[E]),e.default.createElement("section",{ref:f,className:"Toastify",id:j,onMouseEnter:()=>{l&&(d(!1),T.pause())},onMouseLeave:N,"aria-live":"polite","aria-atomic":"false","aria-relevant":"additions text","aria-label":r["aria-label"]},p((t,o)=>{var i;let r,n=o.length?{...x}:{...x,pointerEvents:"none"};return e.default.createElement("div",{tabIndex:-1,className:(i=t,r=(0,a.default)("Toastify__toast-container",`Toastify__toast-container--${i}`,{"Toastify__toast-container--rtl":k}),"function"==typeof b?b({position:i,rtl:k,defaultClassName:r}):(0,a.default)(r,s(b))),"data-stacked":l,style:n,key:`c-${t}`},o.map(({content:t,props:a})=>e.default.createElement(I,{...a,stacked:l,collapseAll:N,isIn:v(a.toastId,a.containerId),key:`t-${a.key}`},t)))}))}var z=`:root {
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
`,P=new Map;t.s(["ToastContainer",0,function(t){var a;return w(()=>{if(!z||"u"<typeof document)return;let t=document,e=P.get(t);if(e){a&&e.setAttribute("nonce",a);return}let o=t.createElement("style");o.textContent=z,a&&o.setAttribute("nonce",a),t.head.appendChild(o),P.set(t,o)},[a=t.nonce]),e.default.createElement(L,{...t})},"toast",0,T])},59298,t=>{"use strict";var e=t.i(43476),a=t.i(71645),o=t.i(70319);let s=[{label:"Govt Default",width:140,height:60},{label:"SSC CGL",width:140,height:60},{label:"GDS / Railway",width:300,height:120},{label:"Wide Signature",width:400,height:150}];function i(t,e){return t?Math.max(e.width/t.width,e.height/t.height):1}t.s(["default",0,function(){let t=(0,a.useRef)(null),r=(0,a.useRef)(null),n=(0,a.useRef)(null),[l,c]=(0,a.useState)(null),[d,f]=(0,a.useState)("signature"),[u,m]=(0,a.useState)({width:140,height:60}),[p,h]=(0,a.useState)({width:"140",height:"60"}),[y,g]=(0,a.useState)(100),[v,_]=(0,a.useState)(0),[b,x]=(0,a.useState)({x:0,y:0}),[T,w]=(0,a.useState)(!1),k=(0,a.useMemo)(()=>Math.max(1,Math.min(10,620/u.width,260/u.height)),[u]),j={width:`${u.width*k}px`,height:`${u.height*k}px`},I=l?{width:`${l.width*i(l,u)*(y/100)*k}px`,height:`${l.height*i(l,u)*(y/100)*k}px`,transform:`translate(calc(-50% + ${b.x*k}px), calc(-50% + ${b.y*k}px)) rotate(${v}deg)`}:{},E=t=>{let e=Array.from(t||[]).find(t=>t.type.startsWith("image/"));if(!e)return void o.toast.error("Please select an image");l?.url&&URL.revokeObjectURL(l.url);let a=URL.createObjectURL(e),s=new Image;s.onload=()=>{c({url:a,width:s.width,height:s.height}),f(e.name.replace(/\.[^.]+$/,"")||"signature"),g(100),_(0),x({x:0,y:0})},s.src=a},N=(t,e)=>{/^\d*$/.test(e)&&(h(a=>({...a,[t]:e})),""!==e&&(m(a=>({...a,[t]:Math.max(1,Number(e))})),x({x:0,y:0})))},C=()=>{let t=Math.max(1,Number(p.width)||140),e=Math.max(1,Number(p.height)||60);m({width:t,height:e}),h({width:String(t),height:String(e)})},L=t=>{n.current&&x({x:n.current.offset.x+(t.clientX-n.current.x)/k,y:n.current.offset.y+(t.clientY-n.current.y)/k})},z=()=>{n.current=null,window.removeEventListener("pointermove",L),window.removeEventListener("pointerup",z)};return(0,e.jsxs)("div",{className:"tools-right-div custom-container py-custom pb-120 mb-3",children:[(0,e.jsxs)("section",{className:"merge-pdf-tool mb-3 mb-md-5 extra-tool",children:[(0,e.jsxs)("div",{className:"tool-header",children:[(0,e.jsxs)("h1",{children:["Signature ",(0,e.jsx)("span",{children:"Cropper"})]}),(0,e.jsxs)("p",{children:["Crop and resize a signature image for forms. ",(0,e.jsx)("br",{}),(0,e.jsx)("span",{children:"Drag image inside the frame, then download exact size"})]})]}),l?(0,e.jsxs)("div",{className:"signature-layout",children:[(0,e.jsxs)("div",{className:"signature-main",children:[(0,e.jsx)("h2",{className:"signature-section-title",children:"Crop Preview"}),(0,e.jsx)("div",{className:"signature-preview",children:(0,e.jsx)("div",{className:"signature-frame",style:j,children:(0,e.jsx)("img",{src:l.url,alt:"Uploaded signature",className:"signature-frame-image",style:I,onPointerDown:t=>{t.preventDefault(),n.current={x:t.clientX,y:t.clientY,offset:b},window.addEventListener("pointermove",L),window.addEventListener("pointerup",z)},draggable:!1})})}),(0,e.jsxs)("div",{className:"signature-preview-meta",children:["Preview is enlarged. Download stays exactly ",u.width," x ",u.height,"px."]})]}),(0,e.jsxs)("div",{className:"signature-controls",children:[(0,e.jsx)("h2",{className:"signature-section-title",children:"Crop Settings"}),(0,e.jsx)("div",{className:"signature-preset-row d-none",children:s.map(t=>(0,e.jsxs)("button",{type:"button",onClick:()=>{m({width:t.width,height:t.height}),h({width:String(t.width),height:String(t.height)}),x({x:0,y:0}),g(100)},children:[t.label,(0,e.jsxs)("span",{children:[t.width," x ",t.height,"px"]})]},t.label))}),(0,e.jsxs)("div",{className:"signature-size-card",children:[(0,e.jsxs)("label",{children:["Width",(0,e.jsx)("input",{type:"text",inputMode:"numeric",value:p.width,onChange:t=>N("width",t.target.value),onBlur:C})]}),(0,e.jsxs)("label",{children:["Height",(0,e.jsx)("input",{type:"text",inputMode:"numeric",value:p.height,onChange:t=>N("height",t.target.value),onBlur:C})]})]}),(0,e.jsxs)("div",{className:"signature-adjust-card",children:[(0,e.jsxs)("button",{type:"button",onClick:()=>{_(t=>(t+90)%360)},children:[(0,e.jsxs)("svg",{width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.3",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M21 12a9 9 0 1 1-3-6.7"}),(0,e.jsx)("polyline",{points:"21 3 21 9 15 9"})]}),"Rotate 90"]}),(0,e.jsxs)("label",{children:["Zoom",(0,e.jsx)("input",{type:"range",min:"40",max:"300",value:y,onChange:t=>g(Number(t.target.value))})]}),(0,e.jsxs)("label",{children:["Rotate Angle",(0,e.jsx)("input",{type:"range",min:"0",max:"359",value:v,onChange:t=>_(Number(t.target.value))})]})]}),(0,e.jsxs)("div",{className:"signature-current-size",children:["Final PNG: ",u.width," x ",u.height,"px"]})]})]}):(0,e.jsxs)("div",{className:`drop-zone${T?" drag-over":""} mb-3 mb-md-5`,onDragOver:t=>{t.preventDefault(),w(!0)},onDragLeave:()=>w(!1),onDrop:t=>{t.preventDefault(),t.stopPropagation(),w(!1),E(t.dataTransfer.files)},onClick:()=>t.current?.click(),children:[(0,e.jsx)("input",{ref:t,className:"drop-zone-input",type:"file",accept:"image/*",onChange:t=>E(t.target.files)}),(0,e.jsx)("div",{className:"drop-zone-icon",children:(0,e.jsxs)("svg",{viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",children:[(0,e.jsx)("path",{d:"M6.13 1 6 16a2 2 0 0 0 2 2h15"}),(0,e.jsx)("path",{d:"M1 6.13 16 6a2 2 0 0 1 2 2v15"})]})}),(0,e.jsx)("div",{className:"drop-zone-title",children:"Upload signature image"}),(0,e.jsx)("div",{className:"drop-zone-sub",children:"PNG, JPG, or scanned signature"}),(0,e.jsx)("button",{className:"drop-zone-btn",type:"button",children:"Select Image"})]}),(0,e.jsx)("canvas",{ref:r,className:"d-none"}),(0,e.jsx)(o.ToastContainer,{position:"top-right"})]}),l&&(0,e.jsxs)("div",{className:"tools-bottom-button-div",children:[(0,e.jsxs)("button",{className:"tool-outline-btn",type:"button",onClick:()=>{l?.url&&URL.revokeObjectURL(l.url),c(null),x({x:0,y:0}),g(100),_(0)},children:[(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M3 6h18"}),(0,e.jsx)("path",{d:"M8 6V4h8v2"}),(0,e.jsx)("path",{d:"M19 6l-1 14H6L5 6"})]}),"Change Image"]}),(0,e.jsxs)("button",{className:"tool-solid-btn",type:"button",onClick:()=>{if(!l)return void o.toast.error("Please upload a signature image");let t=new Image;t.onload=()=>{let e=r.current;e.width=u.width,e.height=u.height;let a=e.getContext("2d"),s=y/100*i(t,u);a.fillStyle="#fff",a.fillRect(0,0,e.width,e.height),a.save(),a.translate(u.width/2+b.x,u.height/2+b.y),a.rotate(v*Math.PI/180),a.scale(s,s),a.drawImage(t,-t.width/2,-t.height/2),a.restore();let n=document.createElement("a");n.download=`${d}-${u.width}x${u.height}.png`,n.href=e.toDataURL("image/png"),n.click(),o.toast.success("Signature downloaded!")},t.src=l.url},children:[(0,e.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}),(0,e.jsx)("polyline",{points:"7 10 12 15 17 10"}),(0,e.jsx)("line",{x1:"12",y1:"15",x2:"12",y2:"3"})]}),"Download PNG"]})]}),(0,e.jsxs)("section",{className:"signature-cropper-info",children:[(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h2",{children:"Crop A Signature Photo To The Exact Size A Form Needs"}),(0,e.jsx)("p",{children:"Almost every sarkari form comes with a very specific signature size mentioned in the instructions, something like 140 by 60 pixels, and if what you upload doesn't match that exactly, the portal either stretches it into something odd looking or just refuses the file outright. Most people only have a signature photographed on plain paper with a phone, tilted a little, with extra white space around it. This tool takes that raw photo and turns it into a properly sized, properly cropped signature image ready for whichever form is asking for it."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Where People Actually Use This"}),(0,e.jsx)("p",{children:"Government recruitment forms are the main reason this gets used, SSC, railway, banking exams, and various state and central portals all mention an exact pixel size for the signature upload, and getting it wrong is one of the more common reasons an application gets stuck at the last step. Bank account opening forms have their own separate size requirement too, usually different from exam portals. And sometimes it's simpler than that, someone signed on a piece of paper, took a photo at an angle, and now needs it straightened and trimmed down to just the signature itself before uploading anywhere."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Setting The Width And Height"}),(0,e.jsx)("p",{children:"Once your image is uploaded, there are two fields for width and height, type in whatever size the form you're applying to asks for. Most sarkari recruitment notifications mention this exact number somewhere in the instructions section, so it's worth checking there first. The frame on the preview updates to match those numbers right away, so you're always cropping to that exact box rather than guessing. Whatever shows inside that black-bordered frame at the end is exactly what comes out in your downloaded file, pixel for pixel."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Zoom, Rotate, And Getting The Position Right"}),(0,e.jsx)("p",{children:"Signatures photographed by hand are rarely straight, so there's a rotate angle slider to fix small tilts, and a full 90 degree rotate button if the photo came in sideways entirely. The zoom slider lets you move in closer or pull back so the signature fills the frame properly instead of floating in a sea of white space. You can also drag the image itself inside the frame to center the signature exactly where you want it before locking in the crop."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"What You Actually Get In The Download"}),(0,e.jsx)("p",{children:"The preview on screen looks larger than the real output, that's just for your convenience while adjusting things. What actually downloads is a PNG at the precise width and height you typed in, nothing more and nothing less. So if a notification asks for 140 by 60, that's the exact file size you get, ready to upload on the application portal without any resizing surprises later."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Notes"}),(0,e.jsx)("p",{children:"Before uploading a sarkari form, always confirm the exact signature size mentioned in the official notification, portals can differ from each other even for similar exams. Try to photograph your signature on a plain, well-lit background too, it makes cropping and positioning much easier. Everything runs in your browser itself, your signature photo is never sent to a server, and once you close the tab nothing from that session sticks around anywhere."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Questions"}),(0,e.jsxs)("div",{className:"faq-list",children:[(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Is this free to use?"}),(0,e.jsx)("p",{children:"Yes, completely free, no account needed, use it as many times as you want."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"How do I know what size to enter for a government form?"}),(0,e.jsx)("p",{children:"Check the official recruitment notification or the upload instructions on the portal, most sarkari forms mention the exact width and height expected for a signature."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"What if my signature photo is sideways?"}),(0,e.jsx)("p",{children:"Use the Rotate 90 button to fix a fully sideways image, and the rotate angle slider for smaller tilts."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Can I move the image around inside the frame?"}),(0,e.jsx)("p",{children:"Yes, drag it directly to position your signature exactly where you want within the crop area."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Is the downloaded file actually the size I entered?"}),(0,e.jsx)("p",{children:"Yes, the preview appears larger on screen for easier editing, but the final PNG matches your entered width and height exactly."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Does my photo get uploaded to a server?"}),(0,e.jsx)("p",{children:"No, the entire cropping process happens in your browser, your image never leaves your device."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"What image formats can I upload?"}),(0,e.jsx)("p",{children:"PNG and JPG both work fine, along with a regular scanned or photographed signature."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Can I change the image after uploading?"}),(0,e.jsx)("p",{children:"Yes, use the Change Image option to swap it out and start over with a different photo."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Different exams ask for different signature sizes, does this handle that?"}),(0,e.jsx)("p",{children:"Yes, just enter whatever width and height the particular exam or form is asking for, the crop adjusts to match every time."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Do I need any software installed for this?"}),(0,e.jsx)("p",{children:"No, it works directly in your browser on both mobile and desktop, nothing to download separately."})]})]})]})]})]})}])}]);