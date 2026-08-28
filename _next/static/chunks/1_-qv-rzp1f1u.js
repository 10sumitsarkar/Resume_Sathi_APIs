(globalThis.TURBOPACK||(globalThis.TURBOPACK=[])).push(["object"==typeof document?document.currentScript:void 0,7670,t=>{"use strict";t.s(["default",0,function(){for(var t,e,o=0,a="",r=arguments.length;o<r;o++)(t=arguments[o])&&(e=function t(e){var o,a,r="";if("string"==typeof e||"number"==typeof e)r+=e;else if("object"==typeof e)if(Array.isArray(e)){var s=e.length;for(o=0;o<s;o++)e[o]&&(a=t(e[o]))&&(r&&(r+=" "),r+=a)}else for(a in e)e[a]&&(r&&(r+=" "),r+=a);return r}(t))&&(a&&(a+=" "),a+=e);return a}])},70319,t=>{"use strict";var e=t.i(71645),o=t.i(7670),a=t=>"number"==typeof t&&!isNaN(t),r=t=>"string"==typeof t||"function"==typeof t?t:null,s=t=>(0,e.isValidElement)(t)||"string"==typeof t||"function"==typeof t||a(t);function n({enter:t,exit:o,appendPosition:a=!1,collapse:r=!0,collapseDuration:s=300}){return function({children:n,position:i,preventExitTransition:l,done:c,nodeRef:d,isIn:f,playToast:u}){let m=a?`${t}--${i}`:t,p=a?`${o}--${i}`:o,y=(0,e.useRef)(0);return(0,e.useLayoutEffect)(()=>{let t=d.current,e=m.split(" "),o=a=>{a.target===d.current&&(u(),t.removeEventListener("animationend",o),t.removeEventListener("animationcancel",o),0===y.current&&"animationcancel"!==a.type&&t.classList.remove(...e))};t.classList.add(...e),t.addEventListener("animationend",o),t.addEventListener("animationcancel",o)},[]),(0,e.useEffect)(()=>{let t=d.current,e=()=>{t.removeEventListener("animationend",e),r?function(t,e,o=300){let{scrollHeight:a,style:r}=t;requestAnimationFrame(()=>{r.minHeight="initial",r.height=a+"px",r.transition=`all ${o}ms`,requestAnimationFrame(()=>{r.height="0",r.padding="0",r.margin="0",setTimeout(e,o)})})}(t,c,s):c()};f||(l?e():(y.current=1,t.className+=` ${p}`,t.addEventListener("animationend",e)))},[f]),e.default.createElement(e.default.Fragment,null,n)}}function i(t,e){return{content:l(t.content,t.props),containerId:t.props.containerId,id:t.props.toastId,theme:t.props.theme,type:t.props.type,data:t.props.data||{},isLoading:t.props.isLoading,icon:t.props.icon,reason:t.removalReason,status:e}}function l(t,o,a=!1){return(0,e.isValidElement)(t)&&"string"!=typeof t.type?(0,e.cloneElement)(t,{closeToast:o.closeToast,toastProps:o,data:o.data,isPaused:a}):"function"==typeof t?t({closeToast:o.closeToast,toastProps:o,data:o.data,isPaused:a}):t}function c({delay:t,isRunning:a,closeToast:r,type:s="default",hide:n,className:i,controlledProgress:l,progress:d,rtl:f,isIn:u,theme:m}){let p=n||l&&0===d,y={animationDuration:`${t}ms`,animationPlayState:a?"running":"paused"};l&&(y.transform=`scaleX(${d})`);let g=(0,o.default)("Toastify__progress-bar",l?"Toastify__progress-bar--controlled":"Toastify__progress-bar--animated",`Toastify__progress-bar-theme--${m}`,`Toastify__progress-bar--${s}`,{"Toastify__progress-bar--rtl":f}),h="function"==typeof i?i({rtl:f,type:s,defaultClassName:g}):(0,o.default)(g,i);return e.default.createElement("div",{className:"Toastify__progress-bar--wrp","data-hidden":p},e.default.createElement("div",{className:`Toastify__progress-bar--bg Toastify__progress-bar-theme--${m} Toastify__progress-bar--${s}`}),e.default.createElement("div",{role:"progressbar","aria-hidden":p?"true":"false","aria-label":"notification timer","aria-valuenow":l?Math.round(100*d):void 0,"aria-valuemin":0,"aria-valuemax":100,className:h,style:y,...{[l&&d>=1?"onTransitionEnd":"onAnimationEnd"]:l&&d<1?null:()=>{u&&r()}}}))}var d=1,f=()=>`${d++}`,u=new Map,m=[],p=new Set,y=t=>p.forEach(e=>e(t));function g(t,e){var o;if(e)return!!(null!=(o=u.get(e))&&o.isToastActive(t));let a=!1;return u.forEach(e=>{e.isToastActive(t)&&(a=!0)}),a}function h(t,e){s(t)&&(u.size>0||m.push({content:t,options:e}),u.forEach(o=>{o.buildToast(t,e)}))}function v(t,e){u.forEach(o=>{null!=e&&null!=e&&e.containerId&&(null==e?void 0:e.containerId)!==o.id||o.toggle(t,null==e?void 0:e.id)})}function _(t,e){return h(t,e),e.toastId}function b(t,e){var o;return{...e,type:e&&e.type||t,toastId:(o=e)&&("string"==typeof o.toastId||a(o.toastId))?o.toastId:f()}}function x(t){return(e,o)=>_(e,b(t,o))}function T(t,e){return _(t,b("default",e))}T.loading=(t,e)=>_(t,b("default",{isLoading:!0,autoClose:!1,closeOnClick:!1,closeButton:!1,draggable:!1,...e})),T.promise=function(t,{pending:e,error:o,success:a},r){let s;e&&(s="string"==typeof e?T.loading(e,r):T.loading(e.render,{...r,...e}));let n={isLoading:null,autoClose:null,closeOnClick:null,closeButton:null,draggable:null},i=(t,e,o)=>{if(null==e)return void T.dismiss(s);let a={type:t,...n,...r,data:o},i="string"==typeof e?{render:e}:e;return s?T.update(s,{...a,...i}):T(i.render,{...a,...i}),o},l="function"==typeof t?t():t;return l.then(t=>i("success",a,t)).catch(t=>i("error",o,t)),l},T.success=x("success"),T.info=x("info"),T.error=x("error"),T.warning=x("warning"),T.warn=T.warning,T.dark=(t,e)=>_(t,b("default",{theme:"dark",...e})),T.dismiss=function(t){!function(t){let e;if(!(u.size>0)){m=m.filter(e=>null!=t&&e.options.toastId!==t);return}if(null==t||"string"==typeof(e=t)||a(e))u.forEach(e=>{e.removeToast(t)});else if(t&&("containerId"in t||"id"in t)){let e=u.get(t.containerId);e?e.removeToast(t.id):u.forEach(e=>{e.removeToast(t.id)})}}(t)},T.clearWaitingQueue=(t={})=>{u.forEach(e=>{e.props.limit&&(!t.containerId||e.id===t.containerId)&&e.clearQueue()})},T.isActive=g,T.update=(t,e={})=>{let o=((t,{containerId:e})=>{var o;return null==(o=u.get(e||1))?void 0:o.toasts.get(t)})(t,e);if(o){let{props:a,content:r}=o,s={delay:100,...a,...e,toastId:e.toastId||t,updateId:f()};s.toastId!==t&&(s.staleId=t);let n=s.render||r;delete s.render,_(n,s)}},T.done=t=>{T.update(t,{progress:1})},T.onChange=function(t){return p.add(t),()=>{p.delete(t)}},T.play=t=>v(!0,t),T.pause=t=>v(!1,t);var k="u">typeof window?e.useLayoutEffect:e.useEffect,w=({theme:t,type:o,isLoading:a,...r})=>e.default.createElement("svg",{viewBox:"0 0 24 24",width:"100%",height:"100%",fill:"colored"===t?"currentColor":`var(--toastify-icon-color-${o})`,...r}),j={info:function(t){return e.default.createElement(w,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.013 12.013 0 0012 0zm.25 5a1.5 1.5 0 11-1.5 1.5 1.5 1.5 0 011.5-1.5zm2.25 13.5h-4a1 1 0 010-2h.75a.25.25 0 00.25-.25v-4.5a.25.25 0 00-.25-.25h-.75a1 1 0 010-2h1a2 2 0 012 2v4.75a.25.25 0 00.25.25h.75a1 1 0 110 2z"}))},warning:function(t){return e.default.createElement(w,{...t},e.default.createElement("path",{d:"M23.32 17.191L15.438 2.184C14.728.833 13.416 0 11.996 0c-1.42 0-2.733.833-3.443 2.184L.533 17.448a4.744 4.744 0 000 4.368C1.243 23.167 2.555 24 3.975 24h16.05C22.22 24 24 22.044 24 19.632c0-.904-.251-1.746-.68-2.44zm-9.622 1.46c0 1.033-.724 1.823-1.698 1.823s-1.698-.79-1.698-1.822v-.043c0-1.028.724-1.822 1.698-1.822s1.698.79 1.698 1.822v.043zm.039-12.285l-.84 8.06c-.057.581-.408.943-.897.943-.49 0-.84-.367-.896-.942l-.84-8.065c-.057-.624.25-1.095.779-1.095h1.91c.528.005.84.476.784 1.1z"}))},success:function(t){return e.default.createElement(w,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm6.927 8.2l-6.845 9.289a1.011 1.011 0 01-1.43.188l-4.888-3.908a1 1 0 111.25-1.562l4.076 3.261 6.227-8.451a1 1 0 111.61 1.183z"}))},error:function(t){return e.default.createElement(w,{...t},e.default.createElement("path",{d:"M11.983 0a12.206 12.206 0 00-8.51 3.653A11.8 11.8 0 000 12.207 11.779 11.779 0 0011.8 24h.214A12.111 12.111 0 0024 11.791 11.766 11.766 0 0011.983 0zM10.5 16.542a1.476 1.476 0 011.449-1.53h.027a1.527 1.527 0 011.523 1.47 1.475 1.475 0 01-1.449 1.53h-.027a1.529 1.529 0 01-1.523-1.47zM11 12.5v-6a1 1 0 012 0v6a1 1 0 11-2 0z"}))},spinner:function(){return e.default.createElement("div",{className:"Toastify__spinner"})}},N=t=>{let{isRunning:a,preventExitTransition:r,toastRef:s,eventHandlers:n,playToast:i}=function(t){var o,a;let[r,s]=(0,e.useState)(!1),[n,i]=(0,e.useState)(!1),l=(0,e.useRef)(null),c=(0,e.useRef)({start:0,delta:0,removalDistance:0,canCloseOnClick:!0,canDrag:!1,didMove:!1}).current,{autoClose:d,pauseOnHover:f,closeToast:m,onClick:p,closeOnClick:y}=t;function g(){s(!0)}function h(){s(!1)}function v(e){let o=l.current;if(c.canDrag&&o){c.didMove=!0,r&&h(),"x"===t.draggableDirection?c.delta=e.clientX-c.start:c.delta=e.clientY-c.start,c.start!==e.clientX&&(c.canCloseOnClick=!1);let a="x"===t.draggableDirection?`${c.delta}px, var(--y)`:`0, calc(${c.delta}px + var(--y))`;o.style.transform=`translate3d(${a},0)`,o.style.opacity=`${1-Math.abs(c.delta/c.removalDistance)}`}}function _(){document.removeEventListener("pointermove",v),document.removeEventListener("pointerup",_);let e=l.current;if(c.canDrag&&c.didMove&&e){if(c.canDrag=!1,Math.abs(c.delta)>c.removalDistance){i(!0),t.closeToast(!0),t.collapseAll();return}e.style.transition="transform 0.2s, opacity 0.2s",e.style.removeProperty("transform"),e.style.removeProperty("opacity")}}o={id:t.toastId,containerId:t.containerId,fn:s},null==(a=u.get(o.containerId||1))||a.setToggle(o.id,o.fn),(0,e.useEffect)(()=>{if(t.pauseOnFocusLoss)return document.hasFocus()||h(),window.addEventListener("focus",g),window.addEventListener("blur",h),()=>{window.removeEventListener("focus",g),window.removeEventListener("blur",h)}},[t.pauseOnFocusLoss]);let b={onPointerDown:function(e){if(!0===t.draggable||t.draggable===e.pointerType){c.didMove=!1,document.addEventListener("pointermove",v),document.addEventListener("pointerup",_);let o=l.current;c.canCloseOnClick=!0,c.canDrag=!0,o.style.transition="none","x"===t.draggableDirection?(c.start=e.clientX,c.removalDistance=o.offsetWidth*(t.draggablePercent/100)):(c.start=e.clientY,c.removalDistance=o.offsetHeight*(80===t.draggablePercent?1.5*t.draggablePercent:t.draggablePercent)/100)}},onPointerUp:function(e){let{top:o,bottom:a,left:r,right:s}=l.current.getBoundingClientRect();"mouse"===e.pointerType&&t.pauseOnHover&&e.clientX>=r&&e.clientX<=s&&e.clientY>=o&&e.clientY<=a?h():g()}};return d&&f&&(b.onMouseEnter=h,t.stacked||(b.onMouseLeave=g)),y&&(b.onClick=t=>{p&&p(t),c.canCloseOnClick&&m(!0)}),{playToast:g,pauseToast:h,isRunning:r,preventExitTransition:n,toastRef:l,eventHandlers:b}}(t),{closeButton:d,children:f,autoClose:m,onClick:p,type:y,hideProgressBar:g,closeToast:h,transition:v,position:_,className:b,style:x,progressClassName:T,updateId:k,role:w,progress:N,rtl:E,toastId:I,deleteToast:P,isIn:C,isLoading:D,closeOnClick:L,theme:O,ariaLabel:R}=t,z=(0,o.default)("Toastify__toast",`Toastify__toast-theme--${O}`,`Toastify__toast--${y}`,{"Toastify__toast--rtl":E},{"Toastify__toast--close-on-click":L}),A="function"==typeof b?b({rtl:E,position:_,type:y,defaultClassName:z}):(0,o.default)(z,b),$=function({theme:t,type:o,isLoading:a,icon:r}){let s=null,n={theme:t,type:o};return!1===r||("function"==typeof r?s=r({...n,isLoading:a}):(0,e.isValidElement)(r)?s=(0,e.cloneElement)(r,n):a?s=j.spinner():o in j&&(s=j[o](n))),s}(t),B=!!N||!m,F={closeToast:h,type:y,theme:O},M=null;return!1===d||(M="function"==typeof d?d(F):(0,e.isValidElement)(d)?(0,e.cloneElement)(d,F):function({closeToast:t,theme:o,ariaLabel:a="close"}){return e.default.createElement("button",{className:`Toastify__close-button Toastify__close-button--${o}`,type:"button",onClick:e=>{e.stopPropagation(),t(!0)},"aria-label":a},e.default.createElement("svg",{"aria-hidden":"true",viewBox:"0 0 14 16"},e.default.createElement("path",{fillRule:"evenodd",d:"M7.71 8.23l3.75 3.75-1.48 1.48-3.75-3.75-3.75 3.75L1 11.98l3.75-3.75L1 4.48 2.48 3l3.75 3.75L9.98 3l1.48 1.48-3.75 3.75z"})))}(F)),e.default.createElement(v,{isIn:C,done:P,position:_,preventExitTransition:r,nodeRef:s,playToast:i},e.default.createElement("div",{id:I,tabIndex:0,onClick:p,"data-in":C,className:A,...n,style:x,ref:s,...C&&{role:w,"aria-label":R}},null!=$&&e.default.createElement("div",{className:(0,o.default)("Toastify__toast-icon",{"Toastify--animate-icon Toastify__zoom-enter":!D})},$),l(f,t,!a),M,!t.customProgressBar&&e.default.createElement(c,{...k&&!B?{key:`p-${k}`}:{},rtl:E,theme:O,delay:m,isRunning:a,isIn:C,closeToast:h,hide:g,type:y,className:T,controlledProgress:B,progress:N||0})))},E=(t,e=!1)=>({enter:`Toastify--animate Toastify__${t}-enter`,exit:`Toastify--animate Toastify__${t}-exit`,appendPosition:e}),I=n(E("bounce",!0));n(E("slide",!0)),n(E("zoom")),n(E("flip"));var P={position:"top-right",transition:I,autoClose:5e3,closeButton:!0,pauseOnHover:!0,pauseOnFocusLoss:!0,draggable:"touch",draggablePercent:80,draggableDirection:"x",role:"alert",theme:"light","aria-label":"Notifications Alt+T",hotKeys:t=>t.altKey&&"KeyT"===t.code};function C(t){let n={...P,...t},l=t.stacked,[c,d]=(0,e.useState)(!0),f=(0,e.useRef)(null),{getToastToRender:p,isToastActive:v,count:_}=function(t){var o;let n,{subscribe:l,getSnapshot:c,setProps:d}=(0,e.useRef)((n=t.containerId||1,{subscribe(e){let o,l,c,d,f,p,g,v,_,b,x,T=(o=1,l=0,c=[],d=[],f=t,p=new Map,g=new Set,v=()=>{d=Array.from(p.values()),g.forEach(t=>t())},_=t=>{var e,o;t.isActive&&(null==(o=null==(e=t.props)?void 0:e.onClose)||o.call(e,t.removalReason),t.isActive=!1,y(i(t,"removed")))},b=t=>{if(null==t)p.forEach(_);else{let e=p.get(t);e&&_(e)}v()},x=t=>{var e,o;let{toastId:a,updateId:r}=t.props,s=null==r;t.staleId&&p.delete(t.staleId),t.isActive=!0,p.set(a,t),v(),y(i(t,s?"added":"updated")),s&&(null==(o=(e=t.props).onOpen)||o.call(e))},{id:n,props:f,observe:t=>(g.add(t),()=>g.delete(t)),toggle:(t,e)=>{p.forEach(o=>{var a;(null==e||e===o.props.toastId)&&(null==(a=o.toggle)||a.call(o,t))})},removeToast:b,toasts:p,clearQueue:()=>{l-=c.length,c=[]},buildToast:(t,e)=>{let i,d;if((({containerId:t,toastId:e,updateId:o})=>{let a=p.has(e)&&null==o;return(t?t!==n:1!==n)||a})(e))return;let{toastId:u,updateId:m,data:y,staleId:g,delay:h}=e,_=null==m;_&&l++;let T={...f,style:f.toastStyle,key:o++,...Object.fromEntries(Object.entries(e).filter(([t,e])=>null!=e)),toastId:u,updateId:m,data:y,isIn:!1,className:r(e.className||f.toastClassName),progressClassName:r(e.progressClassName||f.progressClassName),autoClose:!e.isLoading&&(i=e.autoClose,d=f.autoClose,!1===i||a(i)&&i>0?i:d),closeToast(t){let e=p.get(u);e&&(e.removalReason=t,b(u))},deleteToast(){if(null!=p.get(u)){if(p.delete(u),--l<0&&(l=0),c.length>0)return void x(c.shift());v()}}};T.closeButton=f.closeButton,!1===e.closeButton||s(e.closeButton)?T.closeButton=e.closeButton:!0===e.closeButton&&(T.closeButton=!s(f.closeButton)||f.closeButton);let k={content:t,props:T,staleId:g};f.limit&&f.limit>0&&l>f.limit&&_?c.push(k):a(h)?setTimeout(()=>{x(k)},h):x(k)},setProps(t){f=t},setToggle:(t,e)=>{let o=p.get(t);o&&(o.toggle=e)},isToastActive:t=>{var e;return null==(e=p.get(t))?void 0:e.isActive},getSnapshot:()=>d});u.set(n,T);let k=T.observe(e);return m.forEach(t=>h(t.content,t.options)),m=[],()=>{k(),u.delete(n)}},setProps(t){var e;null==(e=u.get(n))||e.setProps(t)},getSnapshot(){var t;return null==(t=u.get(n))?void 0:t.getSnapshot()}})).current;d(t);let f=null==(o=(0,e.useSyncExternalStore)(l,c,c))?void 0:o.slice();return{getToastToRender:function(e){if(!f)return[];let o=new Map;return t.newestOnTop&&f.reverse(),f.forEach(t=>{let{position:e}=t.props;o.has(e)||o.set(e,[]),o.get(e).push(t)}),Array.from(o,t=>e(t[0],t[1]))},isToastActive:g,count:null==f?void 0:f.length}}(n),{className:b,style:x,rtl:w,containerId:j,hotKeys:E}=n;function I(){l&&(d(!0),T.play())}return k(()=>{var t;if(l){let e=f.current.querySelectorAll('[data-in="true"]'),o=null==(t=n.position)?void 0:t.includes("top"),a=0,r=0;Array.from(e).reverse().forEach((t,e)=>{t.classList.add("Toastify__toast--stacked"),e>0&&(t.dataset.collapsed=`${c}`),t.dataset.pos||(t.dataset.pos=o?"top":"bot");let s=a*(c?.2:1)+(c?0:12*e),n=Math.max(.5,1-(c?r:0));t.style.setProperty("--y",`${o?s:-1*s}px`),t.style.setProperty("--g","12"),t.style.setProperty("--s",`${n}`),a+=t.offsetHeight,r+=.025})}},[c,_,l]),(0,e.useEffect)(()=>{function t(t){var e;let o=f.current;E(t)&&(null==(e=null==o?void 0:o.querySelector('[tabIndex="0"]'))||e.focus(),d(!1),T.pause()),"Escape"===t.key&&(document.activeElement===o||null!=o&&o.contains(document.activeElement))&&(d(!0),T.play())}return document.addEventListener("keydown",t),()=>{document.removeEventListener("keydown",t)}},[E]),e.default.createElement("section",{ref:f,className:"Toastify",id:j,onMouseEnter:()=>{l&&(d(!1),T.pause())},onMouseLeave:I,"aria-live":"polite","aria-atomic":"false","aria-relevant":"additions text","aria-label":n["aria-label"]},p((t,a)=>{var s;let n,i=a.length?{...x}:{...x,pointerEvents:"none"};return e.default.createElement("div",{tabIndex:-1,className:(s=t,n=(0,o.default)("Toastify__toast-container",`Toastify__toast-container--${s}`,{"Toastify__toast-container--rtl":w}),"function"==typeof b?b({position:s,rtl:w,defaultClassName:n}):(0,o.default)(n,r(b))),"data-stacked":l,style:i,key:`c-${t}`},a.map(({content:t,props:o})=>e.default.createElement(N,{...o,stacked:l,collapseAll:I,isIn:v(o.toastId,o.containerId),key:`t-${o.key}`},t)))}))}var D=`:root {
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
`,L=new Map;t.s(["ToastContainer",0,function(t){var o;return k(()=>{if(!D||"u"<typeof document)return;let t=document,e=L.get(t);if(e){o&&e.setAttribute("nonce",o);return}let a=t.createElement("style");a.textContent=D,o&&a.setAttribute("nonce",o),t.head.appendChild(a),L.set(t,a)},[o=t.nonce]),e.default.createElement(C,{...t})},"toast",0,T])},67585,(t,e,o)=>{"use strict";Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"BailoutToCSR",{enumerable:!0,get:function(){return r}});let a=t.r(32061);function r({reason:t,children:e}){if("u"<typeof window)throw Object.defineProperty(new a.BailoutToCSRError(t),"__NEXT_ERROR_CODE",{value:"E394",enumerable:!1,configurable:!0});return e}},9885,(t,e,o)=>{"use strict";function a(t){return t.split("/").map(t=>encodeURIComponent(t)).join("/")}Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"encodeURIPath",{enumerable:!0,get:function(){return a}})},52157,(t,e,o)=>{"use strict";Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"PreloadChunks",{enumerable:!0,get:function(){return l}});let a=t.r(43476),r=t.r(74080),s=t.r(63599),n=t.r(9885),i=t.r(43369);function l({moduleIds:t}){if("u">typeof window)return null;let e=s.workAsyncStorage.getStore();if(void 0===e)return null;let o=[];if(e.reactLoadableManifest&&t){let a=e.reactLoadableManifest;for(let e of t){if(!a[e])continue;let t=a[e].files;o.push(...t)}}if(0===o.length)return null;let c=(0,i.getAssetTokenQuery)();return(0,a.jsx)(a.Fragment,{children:o.map(t=>{let o=`${e.assetPrefix}/_next/${(0,n.encodeURIPath)(t)}${c}`;return t.endsWith(".css")?(0,a.jsx)("link",{precedence:"dynamic",href:o,rel:"stylesheet",as:"style",nonce:e.nonce},t):((0,r.preload)(o,{as:"script",fetchPriority:"low",nonce:e.nonce}),null)})})}},69093,(t,e,o)=>{"use strict";Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"default",{enumerable:!0,get:function(){return c}});let a=t.r(43476),r=t.r(71645),s=t.r(67585),n=t.r(52157);function i(t){return{default:t&&"default"in t?t.default:t}}let l={loader:()=>Promise.resolve(i(()=>null)),loading:null,ssr:!0},c=function(t){let e={...l,...t},o=(0,r.lazy)(()=>e.loader().then(i)),c=e.loading;function d(t){let i=c?(0,a.jsx)(c,{isLoading:!0,pastDelay:!0,error:null}):null,l=!e.ssr||!!e.loading,d=l?r.Suspense:r.Fragment,f=e.ssr?(0,a.jsxs)(a.Fragment,{children:["u"<typeof window?(0,a.jsx)(n.PreloadChunks,{moduleIds:e.modules}):null,(0,a.jsx)(o,{...t})]}):(0,a.jsx)(s.BailoutToCSR,{reason:"next/dynamic",children:(0,a.jsx)(o,{...t})});return(0,a.jsx)(d,{...l?{fallback:i}:{},children:f})}return d.displayName="LoadableComponent",d}},70703,(t,e,o)=>{"use strict";Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"default",{enumerable:!0,get:function(){return r}});let a=t.r(55682)._(t.r(69093));function r(t,e){let o={};"function"==typeof t&&(o.loader=t);let r={...o,...e};return(0,a.default)({...r,modules:r.loadableGenerated?.modules})}("function"==typeof o.default||"object"==typeof o.default&&null!==o.default)&&void 0===o.default.__esModule&&(Object.defineProperty(o.default,"__esModule",{value:!0}),Object.assign(o.default,o),e.exports=o.default)},52483,t=>{"use strict";var e=t.i(43476),o=t.i(71645),a=t.i(70703);t.i(89308);var r=t.i(59749),s=t.i(70319);let n=(0,a.default)(()=>t.A(62713),{loadableGenerated:{modules:[93052]},ssr:!1});t.s(["default",0,function(){let t=(0,o.useRef)(null),[a,i]=(0,o.useState)(null),[l,c]=(0,o.useState)(!1),[d,f]=(0,o.useState)([]),[u,m]=(0,o.useState)(!1),[p,y]=(0,o.useState)(null),[g,h]=(0,o.useState)(null),v=(0,o.useCallback)(async t=>{if(!t||"application/pdf"!==t.type)return void s.toast.error("Only PDF files are accepted");let e=URL.createObjectURL(t);a?.preview&&URL.revokeObjectURL(a.preview);try{c(!0);let o=await r.PDFDocument.load(await t.arrayBuffer(),{ignoreEncryption:!0});i({id:crypto.randomUUID(),file:t,preview:e}),f(Array.from({length:o.getPageCount()},(t,e)=>({id:crypto.randomUUID(),pageNumber:e+1,removed:!1})))}catch(t){URL.revokeObjectURL(e),i(null),f([]),s.toast.error("Could not read PDF. It might be corrupted or encrypted.")}finally{c(!1)}},[a]),_=()=>{y(null),h(null)},b=async()=>{if(!a)return void s.toast.error("Please upload a PDF file");let t=d.filter(t=>!t.removed).map(t=>t.pageNumber-1);if(0===t.length)return void s.toast.error("You can't remove all pages.");try{c(!0);let e=await r.PDFDocument.load(await a.file.arrayBuffer(),{ignoreEncryption:!0}),o=await r.PDFDocument.create();(await o.copyPages(e,t)).forEach(t=>o.addPage(t));let n=await o.save(),i=URL.createObjectURL(new Blob([n],{type:"application/pdf"})),l=document.createElement("a");l.href=i,l.download=`${a.file.name.replace(/\.pdf$/i,"")}-pages-removed.pdf`,l.click(),URL.revokeObjectURL(i),s.toast.success("PDF downloaded!")}catch(t){s.toast.error("Failed to create modified PDF.")}finally{c(!1)}},x=d.filter(t=>t.removed).length;return(0,e.jsxs)("div",{className:"tools-right-div custom-container py-custom pb-120 mb-3",children:[(0,e.jsx)("input",{ref:t,type:"file",accept:".pdf",className:"d-none",onChange:t=>{t.target.files?.length&&v(t.target.files[0]),t.target.value=""}}),(0,e.jsxs)("section",{className:"merge-pdf-tool pdf-remove-tool",children:[(0,e.jsxs)("div",{className:"tool-header",children:[(0,e.jsxs)("h1",{children:["Remove ",(0,e.jsx)("span",{children:"PDF"})," Pages"]}),(0,e.jsxs)("p",{children:["Delete unwanted pages from your PDF. ",(0,e.jsx)("br",{}),(0,e.jsx)("span",{children:"Drag kept pages to reorder before downloading"})]}),a&&(0,e.jsxs)("div",{className:"drag-hint pdf-remove-hint",children:[(0,e.jsxs)("svg",{className:"me-1",width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("circle",{cx:"12",cy:"12",r:"10"}),(0,e.jsx)("line",{x1:"12",y1:"8",x2:"12",y2:"12"}),(0,e.jsx)("line",{x1:"12",y1:"16",x2:"12.01",y2:"16"})]}),"Click pages to remove. Drag only kept pages to reorder."]})]}),!a&&(0,e.jsxs)("div",{className:`drop-zone${u?" drag-over":""} mb-3 mb-md-5`,onDragOver:t=>{t.preventDefault(),m(!0)},onDragLeave:t=>{t.preventDefault(),m(!1)},onDrop:t=>{t.preventDefault(),t.stopPropagation(),m(!1),t.dataTransfer.files?.length&&v(t.dataTransfer.files[0])},onClick:()=>t.current?.click(),children:[(0,e.jsx)("div",{className:"drop-zone-icon",children:(0,e.jsxs)("svg",{viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",children:[(0,e.jsx)("path",{d:"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"}),(0,e.jsx)("polyline",{points:"14 2 14 8 20 8"}),(0,e.jsx)("line",{x1:"9",y1:"15",x2:"15",y2:"15"})]})}),(0,e.jsx)("div",{className:"drop-zone-title",children:u?"Release to add PDF":"Drag & Drop PDF file here"}),(0,e.jsxs)("div",{className:"drop-zone-sub",children:["or ",(0,e.jsx)("span",{children:"browse from your device"})]}),(0,e.jsx)("button",{className:"drop-zone-btn",type:"button",children:"Select PDF File"})]}),a&&(0,e.jsx)("div",{className:"pdf-grid pdf-remove-grid mb-3 mb-md-5",children:d.map(({id:t,pageNumber:o,removed:r},s)=>(0,e.jsxs)("button",{className:["pdf-card pdf-remove-card",r?"removed":"",p===s?"dragging":"",g===s&&p!==s?"drag-target":""].filter(Boolean).join(" "),type:"button",draggable:!r,onClick:()=>{f(t=>t.map(t=>t.pageNumber===o?{...t,removed:!t.removed}:t))},onDragStart:t=>{r?t.preventDefault():y(s)},onDragOver:t=>{r||null===p||(t.preventDefault(),p!==s&&h(s))},onDrop:t=>{t.preventDefault(),null!==p&&null!==s&&p!==s&&f(t=>{if(t[p]?.removed||t[s]?.removed)return t;let e=[...t],[o]=e.splice(p,1);return e.splice(s,0,o),e}),_()},onDragEnd:_,children:[(0,e.jsx)("div",{className:"drag-handle",title:r?"Page marked for removal":"Drag to reorder",children:(0,e.jsxs)("svg",{viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("circle",{cx:"9",cy:"5",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"9",cy:"12",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"9",cy:"19",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"15",cy:"5",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"15",cy:"12",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"15",cy:"19",r:"1",fill:"currentColor",stroke:"none"})]})}),(0,e.jsx)("div",{className:"pdf-order",children:s+1}),(0,e.jsx)("div",{className:"pdf-remove",children:r?"+":"x"}),(0,e.jsx)("div",{className:"pdf-preview-wrap",children:(0,e.jsx)(n,{file:a.preview,pageNumber:o})}),(0,e.jsxs)("div",{className:"pdf-info",children:[(0,e.jsxs)("div",{className:"pdf-name",children:["Page ",o]}),(0,e.jsx)("div",{className:"pdf-size",children:r?"Will be removed":"Will be kept"})]}),(0,e.jsxs)("div",{className:"page-remove-overlay",children:[(0,e.jsx)("div",{className:"page-remove-icon",children:"x"}),(0,e.jsx)("div",{className:"page-remove-text",children:"Marked for Removal"})]})]},t))}),l&&(0,e.jsxs)("div",{className:"loader-overlay",children:[(0,e.jsxs)("div",{className:"loader-inner-div",children:[(0,e.jsx)("div",{className:"box",id:"loader1"}),(0,e.jsx)("div",{className:"box",id:"loader2"}),(0,e.jsx)("div",{className:"box",id:"loader3"}),(0,e.jsx)("div",{className:"box",id:"loader4"}),(0,e.jsx)("div",{className:"box",id:"loader5"})]}),(0,e.jsx)("div",{className:"loader-text",children:"Processing your PDF..."})]}),(0,e.jsx)(s.ToastContainer,{position:"top-right"})]}),a&&(0,e.jsxs)("div",{className:"tools-bottom-button-div",children:[(0,e.jsxs)("button",{className:"tool-outline-btn",type:"button",onClick:()=>{a?.preview&&URL.revokeObjectURL(a.preview),i(null),f([]),_()},children:[(0,e.jsx)("span",{className:"file-count",children:d.length-x}),(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"12",y1:"5",x2:"12",y2:"19"}),(0,e.jsx)("line",{x1:"5",y1:"12",x2:"19",y2:"12"})]}),"Change PDF"]}),(0,e.jsxs)("button",{className:"tool-solid-btn",type:"button",onClick:b,disabled:l||d.length===x,children:[(0,e.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}),(0,e.jsx)("polyline",{points:"7 10 12 15 17 10"}),(0,e.jsx)("line",{x1:"12",y1:"15",x2:"12",y2:"3"})]}),"Download PDF"]})]}),(0,e.jsxs)("section",{className:"pdf-remove-info",children:[(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h2",{children:"Remove Unwanted Pages From A PDF"}),(0,e.jsx)("p",{children:"Not every page in a PDF deserves to stay there. A blank page got scanned in by mistake, an old cover sheet is sitting in front of the actual document, or there's a page with someone else's data mixed into a bundle that was never meant to be shared. Instead of redoing the whole scan or asking someone to resend the file, you can just open it here, tap the pages you don't want, and get a clean copy back with only what should actually be there."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Situations This Solves"}),(0,e.jsx)("p",{children:"Aadhaar and PAN scans often come with an extra blank side that a scanner adds automatically, and portals reject that right away. College certificates sometimes get combined with a random instructions page that was only meant for printing, not for uploading. And every so often someone realizes halfway through filling a form that one page in their PDF has outdated information on it and needs to go before submitting anywhere."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"How Removing Actually Works Here"}),(0,e.jsx)("p",{children:"After the file loads, every page appears as its own thumbnail so you know exactly what you're looking at. Tap or click on any page you want gone, it gets marked and won't be part of the final file, tap it again if you change your mind. The pages you're keeping can still be dragged around to fix their order, but the ones marked for removal stay locked in place since there's no point rearranging something that's about to be deleted anyway."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Checking Order Before You Download"}),(0,e.jsx)("p",{children:"Once you're happy with which pages are staying, look over the order one more time. If page 4 should really come before page 2, just drag it there, the numbering on each card updates as you move things so you can confirm the final arrangement before hitting download. This step matters more than people expect, fixing order after downloading means starting the whole process again."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"What Happens To The Removed Pages"}),(0,e.jsx)("p",{children:"They're simply left out of the new file, nothing more dramatic than that. Your original PDF isn't edited or overwritten, it stays exactly as it was on your device. What you download is a fresh file built only from the pages you chose to keep, quality unchanged, nothing recompressed or resized in the process."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Notes"}),(0,e.jsx)("p",{children:"Take a moment before downloading to double check both the pages you removed and the order of what's left, small mistakes are easy to miss when you're going fast. This tool works entirely in your browser, no file gets uploaded to any server, and nothing from the session is kept once you close the tab."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Questions"}),(0,e.jsxs)("div",{className:"faq-list",children:[(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Is this free to use?"}),(0,e.jsx)("p",{children:"Yes, no login and no cost, use it as often as you need to."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"How do I mark a page for removal?"}),(0,e.jsx)("p",{children:"Just click or tap on the page thumbnail, it'll show as removed. Click it again if you want to keep it after all."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Can I reorder pages while removing others?"}),(0,e.jsx)("p",{children:"Yes, but only the pages you're keeping can be dragged into a new order, pages marked for removal aren't draggable since they won't be in the final file anyway."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Does my file get uploaded anywhere?"}),(0,e.jsx)("p",{children:"No, everything happens locally in your browser, your PDF never leaves your device."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Will the remaining pages lose quality?"}),(0,e.jsx)("p",{children:"No, the kept pages are copied over exactly as they were, nothing gets compressed or resized."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Is my original file changed after this?"}),(0,e.jsx)("p",{children:"No, your original stays untouched on your device, you get a separate new file with the removed pages left out."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"What if I remove the wrong page by accident?"}),(0,e.jsx)("p",{children:"Just click on it again before downloading to bring it back into the kept pages, no need to re-upload anything."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Can I remove more than one page at a time?"}),(0,e.jsx)("p",{children:"Yes, click on as many pages as you want removed, there's no limit on how many you mark."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Can I remove pages from a password protected PDF?"}),(0,e.jsx)("p",{children:"Best to unlock it first with a password removal tool, then come back here to remove the pages you need to."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Do I need to install any software for this?"}),(0,e.jsx)("p",{children:"No, it runs directly in the browser on desktop or mobile, nothing to download beforehand."})]})]})]})]})]})}])},62713,t=>{t.v(e=>Promise.all(["static/chunks/1b-ut2yif14ng.js","static/chunks/03w6bttqv7jlc.js","static/chunks/2ekyigtrc63_3.css"].map(e=>t.l(e))).then(()=>e(93052)))}]);