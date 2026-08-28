(globalThis.TURBOPACK||(globalThis.TURBOPACK=[])).push(["object"==typeof document?document.currentScript:void 0,7670,t=>{"use strict";t.s(["default",0,function(){for(var t,e,o=0,a="",r=arguments.length;o<r;o++)(t=arguments[o])&&(e=function t(e){var o,a,r="";if("string"==typeof e||"number"==typeof e)r+=e;else if("object"==typeof e)if(Array.isArray(e)){var s=e.length;for(o=0;o<s;o++)e[o]&&(a=t(e[o]))&&(r&&(r+=" "),r+=a)}else for(a in e)e[a]&&(r&&(r+=" "),r+=a);return r}(t))&&(a&&(a+=" "),a+=e);return a}])},70319,t=>{"use strict";var e=t.i(71645),o=t.i(7670),a=t=>"number"==typeof t&&!isNaN(t),r=t=>"string"==typeof t||"function"==typeof t?t:null,s=t=>(0,e.isValidElement)(t)||"string"==typeof t||"function"==typeof t||a(t);function n({enter:t,exit:o,appendPosition:a=!1,collapse:r=!0,collapseDuration:s=300}){return function({children:n,position:i,preventExitTransition:l,done:c,nodeRef:d,isIn:f,playToast:u}){let p=a?`${t}--${i}`:t,m=a?`${o}--${i}`:o,y=(0,e.useRef)(0);return(0,e.useLayoutEffect)(()=>{let t=d.current,e=p.split(" "),o=a=>{a.target===d.current&&(u(),t.removeEventListener("animationend",o),t.removeEventListener("animationcancel",o),0===y.current&&"animationcancel"!==a.type&&t.classList.remove(...e))};t.classList.add(...e),t.addEventListener("animationend",o),t.addEventListener("animationcancel",o)},[]),(0,e.useEffect)(()=>{let t=d.current,e=()=>{t.removeEventListener("animationend",e),r?function(t,e,o=300){let{scrollHeight:a,style:r}=t;requestAnimationFrame(()=>{r.minHeight="initial",r.height=a+"px",r.transition=`all ${o}ms`,requestAnimationFrame(()=>{r.height="0",r.padding="0",r.margin="0",setTimeout(e,o)})})}(t,c,s):c()};f||(l?e():(y.current=1,t.className+=` ${m}`,t.addEventListener("animationend",e)))},[f]),e.default.createElement(e.default.Fragment,null,n)}}function i(t,e){return{content:l(t.content,t.props),containerId:t.props.containerId,id:t.props.toastId,theme:t.props.theme,type:t.props.type,data:t.props.data||{},isLoading:t.props.isLoading,icon:t.props.icon,reason:t.removalReason,status:e}}function l(t,o,a=!1){return(0,e.isValidElement)(t)&&"string"!=typeof t.type?(0,e.cloneElement)(t,{closeToast:o.closeToast,toastProps:o,data:o.data,isPaused:a}):"function"==typeof t?t({closeToast:o.closeToast,toastProps:o,data:o.data,isPaused:a}):t}function c({delay:t,isRunning:a,closeToast:r,type:s="default",hide:n,className:i,controlledProgress:l,progress:d,rtl:f,isIn:u,theme:p}){let m=n||l&&0===d,y={animationDuration:`${t}ms`,animationPlayState:a?"running":"paused"};l&&(y.transform=`scaleX(${d})`);let h=(0,o.default)("Toastify__progress-bar",l?"Toastify__progress-bar--controlled":"Toastify__progress-bar--animated",`Toastify__progress-bar-theme--${p}`,`Toastify__progress-bar--${s}`,{"Toastify__progress-bar--rtl":f}),g="function"==typeof i?i({rtl:f,type:s,defaultClassName:h}):(0,o.default)(h,i);return e.default.createElement("div",{className:"Toastify__progress-bar--wrp","data-hidden":m},e.default.createElement("div",{className:`Toastify__progress-bar--bg Toastify__progress-bar-theme--${p} Toastify__progress-bar--${s}`}),e.default.createElement("div",{role:"progressbar","aria-hidden":m?"true":"false","aria-label":"notification timer","aria-valuenow":l?Math.round(100*d):void 0,"aria-valuemin":0,"aria-valuemax":100,className:g,style:y,...{[l&&d>=1?"onTransitionEnd":"onAnimationEnd"]:l&&d<1?null:()=>{u&&r()}}}))}var d=1,f=()=>`${d++}`,u=new Map,p=[],m=new Set,y=t=>m.forEach(e=>e(t));function h(t,e){var o;if(e)return!!(null!=(o=u.get(e))&&o.isToastActive(t));let a=!1;return u.forEach(e=>{e.isToastActive(t)&&(a=!0)}),a}function g(t,e){s(t)&&(u.size>0||p.push({content:t,options:e}),u.forEach(o=>{o.buildToast(t,e)}))}function v(t,e){u.forEach(o=>{null!=e&&null!=e&&e.containerId&&(null==e?void 0:e.containerId)!==o.id||o.toggle(t,null==e?void 0:e.id)})}function b(t,e){return g(t,e),e.toastId}function _(t,e){var o;return{...e,type:e&&e.type||t,toastId:(o=e)&&("string"==typeof o.toastId||a(o.toastId))?o.toastId:f()}}function x(t){return(e,o)=>b(e,_(t,o))}function T(t,e){return b(t,_("default",e))}T.loading=(t,e)=>b(t,_("default",{isLoading:!0,autoClose:!1,closeOnClick:!1,closeButton:!1,draggable:!1,...e})),T.promise=function(t,{pending:e,error:o,success:a},r){let s;e&&(s="string"==typeof e?T.loading(e,r):T.loading(e.render,{...r,...e}));let n={isLoading:null,autoClose:null,closeOnClick:null,closeButton:null,draggable:null},i=(t,e,o)=>{if(null==e)return void T.dismiss(s);let a={type:t,...n,...r,data:o},i="string"==typeof e?{render:e}:e;return s?T.update(s,{...a,...i}):T(i.render,{...a,...i}),o},l="function"==typeof t?t():t;return l.then(t=>i("success",a,t)).catch(t=>i("error",o,t)),l},T.success=x("success"),T.info=x("info"),T.error=x("error"),T.warning=x("warning"),T.warn=T.warning,T.dark=(t,e)=>b(t,_("default",{theme:"dark",...e})),T.dismiss=function(t){!function(t){let e;if(!(u.size>0)){p=p.filter(e=>null!=t&&e.options.toastId!==t);return}if(null==t||"string"==typeof(e=t)||a(e))u.forEach(e=>{e.removeToast(t)});else if(t&&("containerId"in t||"id"in t)){let e=u.get(t.containerId);e?e.removeToast(t.id):u.forEach(e=>{e.removeToast(t.id)})}}(t)},T.clearWaitingQueue=(t={})=>{u.forEach(e=>{e.props.limit&&(!t.containerId||e.id===t.containerId)&&e.clearQueue()})},T.isActive=h,T.update=(t,e={})=>{let o=((t,{containerId:e})=>{var o;return null==(o=u.get(e||1))?void 0:o.toasts.get(t)})(t,e);if(o){let{props:a,content:r}=o,s={delay:100,...a,...e,toastId:e.toastId||t,updateId:f()};s.toastId!==t&&(s.staleId=t);let n=s.render||r;delete s.render,b(n,s)}},T.done=t=>{T.update(t,{progress:1})},T.onChange=function(t){return m.add(t),()=>{m.delete(t)}},T.play=t=>v(!0,t),T.pause=t=>v(!1,t);var w="u">typeof window?e.useLayoutEffect:e.useEffect,k=({theme:t,type:o,isLoading:a,...r})=>e.default.createElement("svg",{viewBox:"0 0 24 24",width:"100%",height:"100%",fill:"colored"===t?"currentColor":`var(--toastify-icon-color-${o})`,...r}),j={info:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.013 12.013 0 0012 0zm.25 5a1.5 1.5 0 11-1.5 1.5 1.5 1.5 0 011.5-1.5zm2.25 13.5h-4a1 1 0 010-2h.75a.25.25 0 00.25-.25v-4.5a.25.25 0 00-.25-.25h-.75a1 1 0 010-2h1a2 2 0 012 2v4.75a.25.25 0 00.25.25h.75a1 1 0 110 2z"}))},warning:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M23.32 17.191L15.438 2.184C14.728.833 13.416 0 11.996 0c-1.42 0-2.733.833-3.443 2.184L.533 17.448a4.744 4.744 0 000 4.368C1.243 23.167 2.555 24 3.975 24h16.05C22.22 24 24 22.044 24 19.632c0-.904-.251-1.746-.68-2.44zm-9.622 1.46c0 1.033-.724 1.823-1.698 1.823s-1.698-.79-1.698-1.822v-.043c0-1.028.724-1.822 1.698-1.822s1.698.79 1.698 1.822v.043zm.039-12.285l-.84 8.06c-.057.581-.408.943-.897.943-.49 0-.84-.367-.896-.942l-.84-8.065c-.057-.624.25-1.095.779-1.095h1.91c.528.005.84.476.784 1.1z"}))},success:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm6.927 8.2l-6.845 9.289a1.011 1.011 0 01-1.43.188l-4.888-3.908a1 1 0 111.25-1.562l4.076 3.261 6.227-8.451a1 1 0 111.61 1.183z"}))},error:function(t){return e.default.createElement(k,{...t},e.default.createElement("path",{d:"M11.983 0a12.206 12.206 0 00-8.51 3.653A11.8 11.8 0 000 12.207 11.779 11.779 0 0011.8 24h.214A12.111 12.111 0 0024 11.791 11.766 11.766 0 0011.983 0zM10.5 16.542a1.476 1.476 0 011.449-1.53h.027a1.527 1.527 0 011.523 1.47 1.475 1.475 0 01-1.449 1.53h-.027a1.529 1.529 0 01-1.523-1.47zM11 12.5v-6a1 1 0 012 0v6a1 1 0 11-2 0z"}))},spinner:function(){return e.default.createElement("div",{className:"Toastify__spinner"})}},I=t=>{let{isRunning:a,preventExitTransition:r,toastRef:s,eventHandlers:n,playToast:i}=function(t){var o,a;let[r,s]=(0,e.useState)(!1),[n,i]=(0,e.useState)(!1),l=(0,e.useRef)(null),c=(0,e.useRef)({start:0,delta:0,removalDistance:0,canCloseOnClick:!0,canDrag:!1,didMove:!1}).current,{autoClose:d,pauseOnHover:f,closeToast:p,onClick:m,closeOnClick:y}=t;function h(){s(!0)}function g(){s(!1)}function v(e){let o=l.current;if(c.canDrag&&o){c.didMove=!0,r&&g(),"x"===t.draggableDirection?c.delta=e.clientX-c.start:c.delta=e.clientY-c.start,c.start!==e.clientX&&(c.canCloseOnClick=!1);let a="x"===t.draggableDirection?`${c.delta}px, var(--y)`:`0, calc(${c.delta}px + var(--y))`;o.style.transform=`translate3d(${a},0)`,o.style.opacity=`${1-Math.abs(c.delta/c.removalDistance)}`}}function b(){document.removeEventListener("pointermove",v),document.removeEventListener("pointerup",b);let e=l.current;if(c.canDrag&&c.didMove&&e){if(c.canDrag=!1,Math.abs(c.delta)>c.removalDistance){i(!0),t.closeToast(!0),t.collapseAll();return}e.style.transition="transform 0.2s, opacity 0.2s",e.style.removeProperty("transform"),e.style.removeProperty("opacity")}}o={id:t.toastId,containerId:t.containerId,fn:s},null==(a=u.get(o.containerId||1))||a.setToggle(o.id,o.fn),(0,e.useEffect)(()=>{if(t.pauseOnFocusLoss)return document.hasFocus()||g(),window.addEventListener("focus",h),window.addEventListener("blur",g),()=>{window.removeEventListener("focus",h),window.removeEventListener("blur",g)}},[t.pauseOnFocusLoss]);let _={onPointerDown:function(e){if(!0===t.draggable||t.draggable===e.pointerType){c.didMove=!1,document.addEventListener("pointermove",v),document.addEventListener("pointerup",b);let o=l.current;c.canCloseOnClick=!0,c.canDrag=!0,o.style.transition="none","x"===t.draggableDirection?(c.start=e.clientX,c.removalDistance=o.offsetWidth*(t.draggablePercent/100)):(c.start=e.clientY,c.removalDistance=o.offsetHeight*(80===t.draggablePercent?1.5*t.draggablePercent:t.draggablePercent)/100)}},onPointerUp:function(e){let{top:o,bottom:a,left:r,right:s}=l.current.getBoundingClientRect();"mouse"===e.pointerType&&t.pauseOnHover&&e.clientX>=r&&e.clientX<=s&&e.clientY>=o&&e.clientY<=a?g():h()}};return d&&f&&(_.onMouseEnter=g,t.stacked||(_.onMouseLeave=h)),y&&(_.onClick=t=>{m&&m(t),c.canCloseOnClick&&p(!0)}),{playToast:h,pauseToast:g,isRunning:r,preventExitTransition:n,toastRef:l,eventHandlers:_}}(t),{closeButton:d,children:f,autoClose:p,onClick:m,type:y,hideProgressBar:h,closeToast:g,transition:v,position:b,className:_,style:x,progressClassName:T,updateId:w,role:k,progress:I,rtl:E,toastId:N,deleteToast:P,isIn:D,isLoading:C,closeOnClick:L,theme:O,ariaLabel:R}=t,z=(0,o.default)("Toastify__toast",`Toastify__toast-theme--${O}`,`Toastify__toast--${y}`,{"Toastify__toast--rtl":E},{"Toastify__toast--close-on-click":L}),M="function"==typeof _?_({rtl:E,position:b,type:y,defaultClassName:z}):(0,o.default)(z,_),A=function({theme:t,type:o,isLoading:a,icon:r}){let s=null,n={theme:t,type:o};return!1===r||("function"==typeof r?s=r({...n,isLoading:a}):(0,e.isValidElement)(r)?s=(0,e.cloneElement)(r,n):a?s=j.spinner():o in j&&(s=j[o](n))),s}(t),F=!!I||!p,$={closeToast:g,type:y,theme:O},B=null;return!1===d||(B="function"==typeof d?d($):(0,e.isValidElement)(d)?(0,e.cloneElement)(d,$):function({closeToast:t,theme:o,ariaLabel:a="close"}){return e.default.createElement("button",{className:`Toastify__close-button Toastify__close-button--${o}`,type:"button",onClick:e=>{e.stopPropagation(),t(!0)},"aria-label":a},e.default.createElement("svg",{"aria-hidden":"true",viewBox:"0 0 14 16"},e.default.createElement("path",{fillRule:"evenodd",d:"M7.71 8.23l3.75 3.75-1.48 1.48-3.75-3.75-3.75 3.75L1 11.98l3.75-3.75L1 4.48 2.48 3l3.75 3.75L9.98 3l1.48 1.48-3.75 3.75z"})))}($)),e.default.createElement(v,{isIn:D,done:P,position:b,preventExitTransition:r,nodeRef:s,playToast:i},e.default.createElement("div",{id:N,tabIndex:0,onClick:m,"data-in":D,className:M,...n,style:x,ref:s,...D&&{role:k,"aria-label":R}},null!=A&&e.default.createElement("div",{className:(0,o.default)("Toastify__toast-icon",{"Toastify--animate-icon Toastify__zoom-enter":!C})},A),l(f,t,!a),B,!t.customProgressBar&&e.default.createElement(c,{...w&&!F?{key:`p-${w}`}:{},rtl:E,theme:O,delay:p,isRunning:a,isIn:D,closeToast:g,hide:h,type:y,className:T,controlledProgress:F,progress:I||0})))},E=(t,e=!1)=>({enter:`Toastify--animate Toastify__${t}-enter`,exit:`Toastify--animate Toastify__${t}-exit`,appendPosition:e}),N=n(E("bounce",!0));n(E("slide",!0)),n(E("zoom")),n(E("flip"));var P={position:"top-right",transition:N,autoClose:5e3,closeButton:!0,pauseOnHover:!0,pauseOnFocusLoss:!0,draggable:"touch",draggablePercent:80,draggableDirection:"x",role:"alert",theme:"light","aria-label":"Notifications Alt+T",hotKeys:t=>t.altKey&&"KeyT"===t.code};function D(t){let n={...P,...t},l=t.stacked,[c,d]=(0,e.useState)(!0),f=(0,e.useRef)(null),{getToastToRender:m,isToastActive:v,count:b}=function(t){var o;let n,{subscribe:l,getSnapshot:c,setProps:d}=(0,e.useRef)((n=t.containerId||1,{subscribe(e){let o,l,c,d,f,m,h,v,b,_,x,T=(o=1,l=0,c=[],d=[],f=t,m=new Map,h=new Set,v=()=>{d=Array.from(m.values()),h.forEach(t=>t())},b=t=>{var e,o;t.isActive&&(null==(o=null==(e=t.props)?void 0:e.onClose)||o.call(e,t.removalReason),t.isActive=!1,y(i(t,"removed")))},_=t=>{if(null==t)m.forEach(b);else{let e=m.get(t);e&&b(e)}v()},x=t=>{var e,o;let{toastId:a,updateId:r}=t.props,s=null==r;t.staleId&&m.delete(t.staleId),t.isActive=!0,m.set(a,t),v(),y(i(t,s?"added":"updated")),s&&(null==(o=(e=t.props).onOpen)||o.call(e))},{id:n,props:f,observe:t=>(h.add(t),()=>h.delete(t)),toggle:(t,e)=>{m.forEach(o=>{var a;(null==e||e===o.props.toastId)&&(null==(a=o.toggle)||a.call(o,t))})},removeToast:_,toasts:m,clearQueue:()=>{l-=c.length,c=[]},buildToast:(t,e)=>{let i,d;if((({containerId:t,toastId:e,updateId:o})=>{let a=m.has(e)&&null==o;return(t?t!==n:1!==n)||a})(e))return;let{toastId:u,updateId:p,data:y,staleId:h,delay:g}=e,b=null==p;b&&l++;let T={...f,style:f.toastStyle,key:o++,...Object.fromEntries(Object.entries(e).filter(([t,e])=>null!=e)),toastId:u,updateId:p,data:y,isIn:!1,className:r(e.className||f.toastClassName),progressClassName:r(e.progressClassName||f.progressClassName),autoClose:!e.isLoading&&(i=e.autoClose,d=f.autoClose,!1===i||a(i)&&i>0?i:d),closeToast(t){let e=m.get(u);e&&(e.removalReason=t,_(u))},deleteToast(){if(null!=m.get(u)){if(m.delete(u),--l<0&&(l=0),c.length>0)return void x(c.shift());v()}}};T.closeButton=f.closeButton,!1===e.closeButton||s(e.closeButton)?T.closeButton=e.closeButton:!0===e.closeButton&&(T.closeButton=!s(f.closeButton)||f.closeButton);let w={content:t,props:T,staleId:h};f.limit&&f.limit>0&&l>f.limit&&b?c.push(w):a(g)?setTimeout(()=>{x(w)},g):x(w)},setProps(t){f=t},setToggle:(t,e)=>{let o=m.get(t);o&&(o.toggle=e)},isToastActive:t=>{var e;return null==(e=m.get(t))?void 0:e.isActive},getSnapshot:()=>d});u.set(n,T);let w=T.observe(e);return p.forEach(t=>g(t.content,t.options)),p=[],()=>{w(),u.delete(n)}},setProps(t){var e;null==(e=u.get(n))||e.setProps(t)},getSnapshot(){var t;return null==(t=u.get(n))?void 0:t.getSnapshot()}})).current;d(t);let f=null==(o=(0,e.useSyncExternalStore)(l,c,c))?void 0:o.slice();return{getToastToRender:function(e){if(!f)return[];let o=new Map;return t.newestOnTop&&f.reverse(),f.forEach(t=>{let{position:e}=t.props;o.has(e)||o.set(e,[]),o.get(e).push(t)}),Array.from(o,t=>e(t[0],t[1]))},isToastActive:h,count:null==f?void 0:f.length}}(n),{className:_,style:x,rtl:k,containerId:j,hotKeys:E}=n;function N(){l&&(d(!0),T.play())}return w(()=>{var t;if(l){let e=f.current.querySelectorAll('[data-in="true"]'),o=null==(t=n.position)?void 0:t.includes("top"),a=0,r=0;Array.from(e).reverse().forEach((t,e)=>{t.classList.add("Toastify__toast--stacked"),e>0&&(t.dataset.collapsed=`${c}`),t.dataset.pos||(t.dataset.pos=o?"top":"bot");let s=a*(c?.2:1)+(c?0:12*e),n=Math.max(.5,1-(c?r:0));t.style.setProperty("--y",`${o?s:-1*s}px`),t.style.setProperty("--g","12"),t.style.setProperty("--s",`${n}`),a+=t.offsetHeight,r+=.025})}},[c,b,l]),(0,e.useEffect)(()=>{function t(t){var e;let o=f.current;E(t)&&(null==(e=null==o?void 0:o.querySelector('[tabIndex="0"]'))||e.focus(),d(!1),T.pause()),"Escape"===t.key&&(document.activeElement===o||null!=o&&o.contains(document.activeElement))&&(d(!0),T.play())}return document.addEventListener("keydown",t),()=>{document.removeEventListener("keydown",t)}},[E]),e.default.createElement("section",{ref:f,className:"Toastify",id:j,onMouseEnter:()=>{l&&(d(!1),T.pause())},onMouseLeave:N,"aria-live":"polite","aria-atomic":"false","aria-relevant":"additions text","aria-label":n["aria-label"]},m((t,a)=>{var s;let n,i=a.length?{...x}:{...x,pointerEvents:"none"};return e.default.createElement("div",{tabIndex:-1,className:(s=t,n=(0,o.default)("Toastify__toast-container",`Toastify__toast-container--${s}`,{"Toastify__toast-container--rtl":k}),"function"==typeof _?_({position:s,rtl:k,defaultClassName:n}):(0,o.default)(n,r(_))),"data-stacked":l,style:i,key:`c-${t}`},a.map(({content:t,props:o})=>e.default.createElement(I,{...o,stacked:l,collapseAll:N,isIn:v(o.toastId,o.containerId),key:`t-${o.key}`},t)))}))}var C=`:root {
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
`,L=new Map;t.s(["ToastContainer",0,function(t){var o;return w(()=>{if(!C||"u"<typeof document)return;let t=document,e=L.get(t);if(e){o&&e.setAttribute("nonce",o);return}let a=t.createElement("style");a.textContent=C,o&&a.setAttribute("nonce",o),t.head.appendChild(a),L.set(t,a)},[o=t.nonce]),e.default.createElement(D,{...t})},"toast",0,T])},67585,(t,e,o)=>{"use strict";Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"BailoutToCSR",{enumerable:!0,get:function(){return r}});let a=t.r(32061);function r({reason:t,children:e}){if("u"<typeof window)throw Object.defineProperty(new a.BailoutToCSRError(t),"__NEXT_ERROR_CODE",{value:"E394",enumerable:!1,configurable:!0});return e}},9885,(t,e,o)=>{"use strict";function a(t){return t.split("/").map(t=>encodeURIComponent(t)).join("/")}Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"encodeURIPath",{enumerable:!0,get:function(){return a}})},52157,(t,e,o)=>{"use strict";Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"PreloadChunks",{enumerable:!0,get:function(){return l}});let a=t.r(43476),r=t.r(74080),s=t.r(63599),n=t.r(9885),i=t.r(43369);function l({moduleIds:t}){if("u">typeof window)return null;let e=s.workAsyncStorage.getStore();if(void 0===e)return null;let o=[];if(e.reactLoadableManifest&&t){let a=e.reactLoadableManifest;for(let e of t){if(!a[e])continue;let t=a[e].files;o.push(...t)}}if(0===o.length)return null;let c=(0,i.getAssetTokenQuery)();return(0,a.jsx)(a.Fragment,{children:o.map(t=>{let o=`${e.assetPrefix}/_next/${(0,n.encodeURIPath)(t)}${c}`;return t.endsWith(".css")?(0,a.jsx)("link",{precedence:"dynamic",href:o,rel:"stylesheet",as:"style",nonce:e.nonce},t):((0,r.preload)(o,{as:"script",fetchPriority:"low",nonce:e.nonce}),null)})})}},69093,(t,e,o)=>{"use strict";Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"default",{enumerable:!0,get:function(){return c}});let a=t.r(43476),r=t.r(71645),s=t.r(67585),n=t.r(52157);function i(t){return{default:t&&"default"in t?t.default:t}}let l={loader:()=>Promise.resolve(i(()=>null)),loading:null,ssr:!0},c=function(t){let e={...l,...t},o=(0,r.lazy)(()=>e.loader().then(i)),c=e.loading;function d(t){let i=c?(0,a.jsx)(c,{isLoading:!0,pastDelay:!0,error:null}):null,l=!e.ssr||!!e.loading,d=l?r.Suspense:r.Fragment,f=e.ssr?(0,a.jsxs)(a.Fragment,{children:["u"<typeof window?(0,a.jsx)(n.PreloadChunks,{moduleIds:e.modules}):null,(0,a.jsx)(o,{...t})]}):(0,a.jsx)(s.BailoutToCSR,{reason:"next/dynamic",children:(0,a.jsx)(o,{...t})});return(0,a.jsx)(d,{...l?{fallback:i}:{},children:f})}return d.displayName="LoadableComponent",d}},70703,(t,e,o)=>{"use strict";Object.defineProperty(o,"__esModule",{value:!0}),Object.defineProperty(o,"default",{enumerable:!0,get:function(){return r}});let a=t.r(55682)._(t.r(69093));function r(t,e){let o={};"function"==typeof t&&(o.loader=t);let r={...o,...e};return(0,a.default)({...r,modules:r.loadableGenerated?.modules})}("function"==typeof o.default||"object"==typeof o.default&&null!==o.default)&&void 0===o.default.__esModule&&(Object.defineProperty(o.default,"__esModule",{value:!0}),Object.assign(o.default,o),e.exports=o.default)},7926,t=>{"use strict";var e=t.i(43476),o=t.i(71645),a=t.i(70703);t.i(89308);var r=t.i(59749),s=t.i(70319);let n=(0,a.default)(()=>t.A(18121),{loadableGenerated:{modules:[76348]},ssr:!1});t.s(["default",0,function(){let[t,a]=(0,o.useState)([]),[i,l]=(0,o.useState)(!1),[c,d]=(0,o.useState)(null),[f,u]=(0,o.useState)(null),[p,m]=(0,o.useState)(!1),[y,h]=(0,o.useState)(!1),g=(0,o.useRef)(null),v=(0,o.useRef)(null),b=(0,o.useRef)(null),_=(0,o.useRef)(null),x=(0,o.useRef)(0),T=(0,o.useRef)(0),w=(0,o.useRef)(null),k=(0,o.useCallback)(t=>{let e=Array.from(t).filter(t=>"application/pdf"===t.type).map(t=>({id:crypto.randomUUID(),file:t,preview:URL.createObjectURL(t)}));e.length?a(t=>[...t,...e]):s.toast.error("Only PDF files are accepted")},[]),j=t=>{k(t.target.files),t.target.value=""},I=()=>{d(null),u(null)},E=t=>{if(null===b.current)return;t.preventDefault();let e=t.touches[0];_.current&&(_.current.style.left=`${e.clientX-x.current}px`,_.current.style.top=`${e.clientY-T.current}px`),_.current&&(_.current.style.display="none");let o=document.elementFromPoint(e.clientX,e.clientY);_.current&&(_.current.style.display="");let a=o?.closest("[data-card-index]");if(a){let t=parseInt(a.getAttribute("data-card-index"),10);t!==w.current&&(w.current=t,u(t))}},N=()=>{if(null===b.current)return;_.current&&(document.body.removeChild(_.current),_.current=null);let t=b.current,e=w.current;null!==t&&null!==e&&t!==e&&a(o=>{let a=[...o],[r]=a.splice(t,1);return a.splice(e,0,r),a}),b.current=null,w.current=null,d(null),u(null)},P=async()=>{if(t.length<2)return void s.toast.error("Please upload at least 2 PDFs");try{l(!0);let e=await r.PDFDocument.create();for(let o of t){let t=await o.file.arrayBuffer(),a=await r.PDFDocument.load(t,{ignoreEncryption:!0});(await e.copyPages(a,a.getPageIndices())).forEach(t=>e.addPage(t))}let o=await e.save(),a=new Blob([o],{type:"application/pdf"}),n=URL.createObjectURL(a),i=document.createElement("a");i.href=n,i.download="merged.pdf",i.click(),URL.revokeObjectURL(n),s.toast.success("PDF merged & downloaded!")}catch(t){console.error(t),s.toast.error("Failed to merge PDFs. File may be corrupted.")}finally{l(!1)}};return(0,e.jsxs)("div",{className:"tools-right-div custom-container py-custom pb-120 mb-3",children:[(0,e.jsxs)("section",{className:`merge-pdf-tool${y?" page-drag-over":""}`,onDragOver:t.length>0?t=>{null===c&&(t.preventDefault(),h(!0))}:void 0,onDragLeave:t.length>0?t=>{null===c&&(t.currentTarget.contains(t.relatedTarget)||h(!1))}:void 0,onDrop:t.length>0?t=>{null===c&&(t.preventDefault(),h(!1),k(t.dataTransfer.files))}:void 0,children:[(0,e.jsxs)("div",{className:"tool-header",children:[(0,e.jsxs)("h1",{children:["Merge ",(0,e.jsx)("span",{children:"PDF"})," Files"]}),(0,e.jsxs)("p",{children:["Merge multiple PDF files into a single document in your preferred order. ",(0,e.jsx)("br",{})," ",(0,e.jsx)("span",{children:" Fast, secure, and hassle-free"})," "]}),t.length>0&&(0,e.jsxs)("div",{className:"drag-hint",children:[(0,e.jsxs)("svg",{className:"me-1",width:"15",height:"15",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("circle",{cx:"12",cy:"12",r:"10"}),(0,e.jsx)("line",{x1:"12",y1:"8",x2:"12",y2:"12"}),(0,e.jsx)("line",{x1:"12",y1:"16",x2:"12.01",y2:"16"})]}),(0,e.jsx)("span",{className:"drag-hint-desktop",children:"Drag cards left or right to reorder before merging"}),(0,e.jsx)("span",{className:"drag-hint-mobile",children:"Hold the ⠿ handle on any card and drag to reorder"})]})]}),0===t.length&&(0,e.jsxs)("div",{className:`drop-zone${p?" drag-over":""} mb-3 mb-md-5`,onDragOver:t=>{t.preventDefault(),t.stopPropagation(),m(!0)},onDragLeave:t=>{t.preventDefault(),t.stopPropagation(),m(!1)},onDrop:t=>{t.preventDefault(),t.stopPropagation(),m(!1),k(t.dataTransfer.files)},children:[(0,e.jsx)("input",{ref:g,className:"drop-zone-input",type:"file",multiple:!0,accept:".pdf",onChange:j}),(0,e.jsx)("div",{className:"drop-zone-icon",children:(0,e.jsxs)("svg",{viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}),(0,e.jsx)("polyline",{points:"17 8 12 3 7 8"}),(0,e.jsx)("line",{x1:"12",y1:"3",x2:"12",y2:"15"})]})}),(0,e.jsx)("div",{className:"drop-zone-title",children:p?"Release to add PDFs":"Drag & Drop PDF files here"}),(0,e.jsxs)("div",{className:"drop-zone-sub",children:["or ",(0,e.jsx)("span",{children:"browse from your device"})]}),(0,e.jsx)("button",{className:"drop-zone-btn",onClick:()=>g.current?.click(),type:"button",children:"Select PDF Files"})]}),y&&(0,e.jsx)("div",{className:"page-drop-overlay",children:(0,e.jsxs)("div",{className:"page-drop-inner",children:[(0,e.jsxs)("svg",{viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}),(0,e.jsx)("polyline",{points:"17 8 12 3 7 8"}),(0,e.jsx)("line",{x1:"12",y1:"3",x2:"12",y2:"15"})]}),(0,e.jsx)("p",{children:"Drop PDFs to add"})]})}),t.length>0&&(0,e.jsx)(e.Fragment,{children:(0,e.jsx)("div",{className:"pdf-grid mb-3 mb-md-5",children:t.map((o,r)=>(0,e.jsxs)("div",{"data-card-index":r,className:["pdf-card",c===r?"dragging":"",f===r&&c!==r?"drag-target":""].filter(Boolean).join(" "),draggable:!0,onDragStart:t=>{t.stopPropagation(),d(r)},onDragOver:t=>{t.preventDefault(),t.stopPropagation(),null!==c&&c!==r&&u(r)},onDrop:e=>((e,o)=>{if(e.preventDefault(),e.stopPropagation(),null===c||c===o){d(null),u(null);return}let r=[...t],[s]=r.splice(c,1);r.splice(o,0,s),a(r),d(null),u(null)})(e,r),onDragEnd:I,onTouchStart:e=>((e,o)=>{if(!e.target.closest("[data-drag-handle]"))return;e.preventDefault();let a=e.touches[0],r=e.currentTarget.getBoundingClientRect();b.current=o,w.current=o,x.current=a.clientX-r.left,T.current=a.clientY-r.top;let s=t[o]?.file?.name??"",n=t[o]?(t[o].file.size/1024/1024).toFixed(2)+" MB":"",i=document.createElement("div");i.style.cssText=`
            position: fixed;
            left: ${r.left}px;
            top: ${r.top}px;
            width: ${r.width}px;
            opacity: 0.92;
            pointer-events: none;
            z-index: 9999;
            transform: scale(1.05) rotate(1.5deg);
            box-shadow: 0 14px 36px rgba(204,0,0,0.25);
            border-radius: 12px;
            border: 2px solid #cc0000;
            background: #fff;
            overflow: hidden;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        `,i.innerHTML=`
            <div style="
                height: 160px;
                background: #fff0f0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 10px;
            ">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cc0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                    <polyline points="10 9 9 9 8 9"/>
                </svg>
                <span style="font-size:11px;font-weight:700;color:#cc0000;letter-spacing:1px;">PDF</span>
            </div>
            <div style="padding: 10px 10px 12px; background:#fff;">
                <div style="
                    font-size: 0.72rem;
                    font-weight: 600;
                    color: #222;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    margin-bottom: 3px;
                ">${s}</div>
                <div style="font-size: 0.65rem; color: #9CA3AF;">${n}</div>
            </div>
            <div style="
                position: absolute;
                top: 8px;
                left: 50%;
                transform: translateX(-50%);
                width: 22px;
                height: 22px;
                background: #cc0000;
                color: #fff;
                border-radius: 50%;
                font-size: 0.68rem;
                font-weight: 700;
                display: flex;
                align-items: center;
                justify-content: center;
            ">${o+1}</div>
        `,document.body.appendChild(i),_.current=i,d(o)})(e,r),onTouchMove:E,onTouchEnd:N,children:[(0,e.jsx)("div",{className:"drag-handle","data-drag-handle":"true",title:"Drag to reorder",children:(0,e.jsxs)("svg",{viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("circle",{cx:"9",cy:"5",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"9",cy:"12",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"9",cy:"19",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"15",cy:"5",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"15",cy:"12",r:"1",fill:"currentColor",stroke:"none"}),(0,e.jsx)("circle",{cx:"15",cy:"19",r:"1",fill:"currentColor",stroke:"none"})]})}),(0,e.jsx)("div",{className:"pdf-order",children:r+1}),(0,e.jsx)("button",{className:"pdf-remove",onClick:()=>{let e;return e=[...t],void(URL.revokeObjectURL(e[r].preview),e.splice(r,1),a(e))},type:"button",title:"Remove",children:"×"}),(0,e.jsx)("div",{className:"pdf-preview-wrap",children:(0,e.jsx)(n,{file:o.preview})}),(0,e.jsxs)("div",{className:"pdf-info",children:[(0,e.jsx)("div",{className:"pdf-name",title:o.file.name,children:o.file.name}),(0,e.jsxs)("div",{className:"pdf-size",children:[(o.file.size/1024/1024).toFixed(2)," MB"]})]})]},o.id))})}),i&&(0,e.jsxs)("div",{className:"loader-overlay",children:[(0,e.jsxs)("div",{className:"loader-inner-div",children:[(0,e.jsx)("div",{className:"box",id:"loader1"}),(0,e.jsx)("div",{className:"box",id:"loader2"}),(0,e.jsx)("div",{className:"box",id:"loader3"}),(0,e.jsx)("div",{className:"box",id:"loader4"}),(0,e.jsx)("div",{className:"box",id:"loader5"})]}),(0,e.jsx)("div",{className:"loader-text",children:"Merging your PDFs…"})]}),(0,e.jsx)(s.ToastContainer,{position:"top-right"})]}),t.length>0&&(0,e.jsxs)("div",{className:"tools-bottom-button-div",children:[(0,e.jsx)("input",{ref:v,type:"file",multiple:!0,accept:".pdf",style:{display:"none"},onChange:j}),(0,e.jsxs)("button",{className:"tool-outline-btn",type:"button",onClick:()=>v.current?.click(),children:[(0,e.jsx)("span",{className:"file-count",children:t.length}),(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"12",y1:"5",x2:"12",y2:"19"}),(0,e.jsx)("line",{x1:"5",y1:"12",x2:"19",y2:"12"})]}),"Add More"]}),(0,e.jsxs)("button",{className:"tool-solid-btn",type:"button",onClick:P,disabled:i||t.length<2,children:[(0,e.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M8 6H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h4"}),(0,e.jsx)("path",{d:"M16 6h4a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-4"}),(0,e.jsx)("line",{x1:"12",y1:"2",x2:"12",y2:"22"})]}),"Merge ",(0,e.jsx)("span",{className:"d-none d-sm-block",children:" & Download"})]})]}),(0,e.jsxs)("section",{className:"pdf-merge-info",children:[(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h2",{children:"Merge Multiple PDF Files Into One"}),(0,e.jsx)("p",{children:"A lot of forms ask for one single PDF, but your documents are usually spread across separate files. Government job portals want your resume, certificates, and ID proof together in one upload. Companies want a resume with the cover letter attached, not two separate attachments in an email. And honestly, sometimes you've just scanned a few pages from your phone and now there are four or five files lying around that should really be one. This tool takes whatever PDFs you give it and joins them, in whatever order you want, so you end up with a single file you can actually submit somewhere."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Where People Actually Use This"}),(0,e.jsx)("p",{children:"Government job applications in India come up a lot here many portals flat out reject multiple attachments and want everything bundled into one PDF with your resume, mark sheets, category certificate, sometimes even a photo. Job seekers use it for resumes too, joining a cover letter to the resume before sending it out, since two attachments in an email can look a bit messy. Then there's the more everyday case, scanning pages one at a time on a phone and ending up with a pile of separate files that need to become one PDF before you can send them anywhere."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Reordering Your Files"}),(0,e.jsx)("p",{children:"After you upload, each file shows up as a card with a number on it, showing the order it'll appear in once merged. If that's not right, no need to start over just drag the card where you want it. On a laptop or desktop, click and drag. On a phone, there's a small handle icon on each card, hold that and move it around. The numbers update as you go so you can see the final order before you commit to merging. Worth double-checking this before you download, since fixing it after is more work than fixing it now."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Does It Affect Quality?"}),(0,e.jsx)("p",{children:"Not really. Merging is just putting pages from separate files into one new file. Nothing gets compressed or resized in the process, and the content inside each page stays exactly as it was. So a high-res scan comes out the other end still high-res, and a document exported from Word still looks like it did before. Your original files aren't touched either they stay right where they were on your device the whole time, since the tool is only reading them to build the new merged version."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Notes"}),(0,e.jsx)("p",{children:"The final order follows exactly what you see on screen, so take a second to check the card order before hitting Merge & Download. Everything runs inside your browser on your own device, meaning there's no server involved at any point and nothing gets uploaded or saved anywhere. Once the tab is closed, that's it, there's nothing left sitting around."})]}),(0,e.jsxs)("div",{className:"info-block",children:[(0,e.jsx)("h3",{children:"Questions"}),(0,e.jsxs)("div",{className:"faq-list",children:[(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Is this free?"}),(0,e.jsx)("p",{children:"Yep, completely free, no signup or login needed. Use it as many times as you want."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"How many files can I merge at once?"}),(0,e.jsx)("p",{children:"No real limit here. Two files or twenty, either works. A big batch of large files might just take a bit longer to process, that's about it."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Can I change the order after uploading?"}),(0,e.jsx)("p",{children:"Yes, and that's basically the point of the drag feature. Move the cards around however you like before merging. On mobile, use the small handle on the card to drag it."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Are my files sent to a server anywhere?"}),(0,e.jsx)("p",{children:"No, this all happens right in your browser. Your files stay on your device the entire time and there's nothing saved once you leave the page."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Does merging lower the quality of my PDFs?"}),(0,e.jsx)("p",{children:"No. The pages get joined as they are, nothing gets compressed or resized along the way. What you upload is what you get back, just combined."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Can I merge PDFs that have a password?"}),(0,e.jsx)("p",{children:"If a PDF is heavily locked down, it's usually easier to remove the password first with an unlock tool and then merge it here."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Will my original files get changed?"}),(0,e.jsx)("p",{children:"No, they stay exactly as they are on your device. The tool reads them to build a new file, that's all, your originals are left alone."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"What if I upload the wrong file by mistake?"}),(0,e.jsx)("p",{children:"There's a small remove button on each card, so just take it off the list before merging. No need to restart the whole thing."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Can I merge scans from my phone?"}),(0,e.jsx)("p",{children:"Definitely, this is actually one of the most common reasons people use this. Upload the scanned pages, arrange them, merge into one file."})]}),(0,e.jsxs)("details",{className:"faq-item",children:[(0,e.jsx)("summary",{children:"Do I need to download any software?"}),(0,e.jsx)("p",{children:"Nope, it all works in your browser, laptop or phone doesn't matter. Open the page, upload, done."})]})]})]})]})]})}])},18121,t=>{t.v(e=>Promise.all(["static/chunks/41j--pdwf77g9.js","static/chunks/03w6bttqv7jlc.js","static/chunks/2ekyigtrc63_3.css"].map(e=>t.l(e))).then(()=>e(76348)))}]);