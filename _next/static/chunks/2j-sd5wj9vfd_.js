(globalThis.TURBOPACK||(globalThis.TURBOPACK=[])).push(["object"==typeof document?document.currentScript:void 0,7670,e=>{"use strict";e.s(["default",0,function(){for(var e,t,a=0,o="",s=arguments.length;a<s;a++)(e=arguments[a])&&(t=function e(t){var a,o,s="";if("string"==typeof t||"number"==typeof t)s+=t;else if("object"==typeof t)if(Array.isArray(t)){var i=t.length;for(a=0;a<i;a++)t[a]&&(o=e(t[a]))&&(s&&(s+=" "),s+=o)}else for(o in t)t[o]&&(s&&(s+=" "),s+=o);return s}(e))&&(o&&(o+=" "),o+=t);return o}])},70319,e=>{"use strict";var t=e.i(71645),a=e.i(7670),o=e=>"number"==typeof e&&!isNaN(e),s=e=>"string"==typeof e||"function"==typeof e?e:null,i=e=>(0,t.isValidElement)(e)||"string"==typeof e||"function"==typeof e||o(e);function r({enter:e,exit:a,appendPosition:o=!1,collapse:s=!0,collapseDuration:i=300}){return function({children:r,position:n,preventExitTransition:l,done:c,nodeRef:d,isIn:f,playToast:u}){let m=o?`${e}--${n}`:e,p=o?`${a}--${n}`:a,y=(0,t.useRef)(0);return(0,t.useLayoutEffect)(()=>{let e=d.current,t=m.split(" "),a=o=>{o.target===d.current&&(u(),e.removeEventListener("animationend",a),e.removeEventListener("animationcancel",a),0===y.current&&"animationcancel"!==o.type&&e.classList.remove(...t))};e.classList.add(...t),e.addEventListener("animationend",a),e.addEventListener("animationcancel",a)},[]),(0,t.useEffect)(()=>{let e=d.current,t=()=>{e.removeEventListener("animationend",t),s?function(e,t,a=300){let{scrollHeight:o,style:s}=e;requestAnimationFrame(()=>{s.minHeight="initial",s.height=o+"px",s.transition=`all ${a}ms`,requestAnimationFrame(()=>{s.height="0",s.padding="0",s.margin="0",setTimeout(t,a)})})}(e,c,i):c()};f||(l?t():(y.current=1,e.className+=` ${p}`,e.addEventListener("animationend",t)))},[f]),t.default.createElement(t.default.Fragment,null,r)}}function n(e,t){return{content:l(e.content,e.props),containerId:e.props.containerId,id:e.props.toastId,theme:e.props.theme,type:e.props.type,data:e.props.data||{},isLoading:e.props.isLoading,icon:e.props.icon,reason:e.removalReason,status:t}}function l(e,a,o=!1){return(0,t.isValidElement)(e)&&"string"!=typeof e.type?(0,t.cloneElement)(e,{closeToast:a.closeToast,toastProps:a,data:a.data,isPaused:o}):"function"==typeof e?e({closeToast:a.closeToast,toastProps:a,data:a.data,isPaused:o}):e}function c({delay:e,isRunning:o,closeToast:s,type:i="default",hide:r,className:n,controlledProgress:l,progress:d,rtl:f,isIn:u,theme:m}){let p=r||l&&0===d,y={animationDuration:`${e}ms`,animationPlayState:o?"running":"paused"};l&&(y.transform=`scaleX(${d})`);let h=(0,a.default)("Toastify__progress-bar",l?"Toastify__progress-bar--controlled":"Toastify__progress-bar--animated",`Toastify__progress-bar-theme--${m}`,`Toastify__progress-bar--${i}`,{"Toastify__progress-bar--rtl":f}),g="function"==typeof n?n({rtl:f,type:i,defaultClassName:h}):(0,a.default)(h,n);return t.default.createElement("div",{className:"Toastify__progress-bar--wrp","data-hidden":p},t.default.createElement("div",{className:`Toastify__progress-bar--bg Toastify__progress-bar-theme--${m} Toastify__progress-bar--${i}`}),t.default.createElement("div",{role:"progressbar","aria-hidden":p?"true":"false","aria-label":"notification timer","aria-valuenow":l?Math.round(100*d):void 0,"aria-valuemin":0,"aria-valuemax":100,className:g,style:y,...{[l&&d>=1?"onTransitionEnd":"onAnimationEnd"]:l&&d<1?null:()=>{u&&s()}}}))}var d=1,f=()=>`${d++}`,u=new Map,m=[],p=new Set,y=e=>p.forEach(t=>t(e));function h(e,t){var a;if(t)return!!(null!=(a=u.get(t))&&a.isToastActive(e));let o=!1;return u.forEach(t=>{t.isToastActive(e)&&(o=!0)}),o}function g(e,t){i(e)&&(u.size>0||m.push({content:e,options:t}),u.forEach(a=>{a.buildToast(e,t)}))}function v(e,t){u.forEach(a=>{null!=t&&null!=t&&t.containerId&&(null==t?void 0:t.containerId)!==a.id||a.toggle(e,null==t?void 0:t.id)})}function x(e,t){return g(e,t),t.toastId}function b(e,t){var a;return{...t,type:t&&t.type||e,toastId:(a=t)&&("string"==typeof a.toastId||o(a.toastId))?a.toastId:f()}}function _(e){return(t,a)=>x(t,b(e,a))}function T(e,t){return x(e,b("default",t))}T.loading=(e,t)=>x(e,b("default",{isLoading:!0,autoClose:!1,closeOnClick:!1,closeButton:!1,draggable:!1,...t})),T.promise=function(e,{pending:t,error:a,success:o},s){let i;t&&(i="string"==typeof t?T.loading(t,s):T.loading(t.render,{...s,...t}));let r={isLoading:null,autoClose:null,closeOnClick:null,closeButton:null,draggable:null},n=(e,t,a)=>{if(null==t)return void T.dismiss(i);let o={type:e,...r,...s,data:a},n="string"==typeof t?{render:t}:t;return i?T.update(i,{...o,...n}):T(n.render,{...o,...n}),a},l="function"==typeof e?e():e;return l.then(e=>n("success",o,e)).catch(e=>n("error",a,e)),l},T.success=_("success"),T.info=_("info"),T.error=_("error"),T.warning=_("warning"),T.warn=T.warning,T.dark=(e,t)=>x(e,b("default",{theme:"dark",...t})),T.dismiss=function(e){!function(e){let t;if(!(u.size>0)){m=m.filter(t=>null!=e&&t.options.toastId!==e);return}if(null==e||"string"==typeof(t=e)||o(t))u.forEach(t=>{t.removeToast(e)});else if(e&&("containerId"in e||"id"in e)){let t=u.get(e.containerId);t?t.removeToast(e.id):u.forEach(t=>{t.removeToast(e.id)})}}(e)},T.clearWaitingQueue=(e={})=>{u.forEach(t=>{t.props.limit&&(!e.containerId||t.id===e.containerId)&&t.clearQueue()})},T.isActive=h,T.update=(e,t={})=>{let a=((e,{containerId:t})=>{var a;return null==(a=u.get(t||1))?void 0:a.toasts.get(e)})(e,t);if(a){let{props:o,content:s}=a,i={delay:100,...o,...t,toastId:t.toastId||e,updateId:f()};i.toastId!==e&&(i.staleId=e);let r=i.render||s;delete i.render,x(r,i)}},T.done=e=>{T.update(e,{progress:1})},T.onChange=function(e){return p.add(e),()=>{p.delete(e)}},T.play=e=>v(!0,e),T.pause=e=>v(!1,e);var j="u">typeof window?t.useLayoutEffect:t.useEffect,k=({theme:e,type:a,isLoading:o,...s})=>t.default.createElement("svg",{viewBox:"0 0 24 24",width:"100%",height:"100%",fill:"colored"===e?"currentColor":`var(--toastify-icon-color-${a})`,...s}),w={info:function(e){return t.default.createElement(k,{...e},t.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.013 12.013 0 0012 0zm.25 5a1.5 1.5 0 11-1.5 1.5 1.5 1.5 0 011.5-1.5zm2.25 13.5h-4a1 1 0 010-2h.75a.25.25 0 00.25-.25v-4.5a.25.25 0 00-.25-.25h-.75a1 1 0 010-2h1a2 2 0 012 2v4.75a.25.25 0 00.25.25h.75a1 1 0 110 2z"}))},warning:function(e){return t.default.createElement(k,{...e},t.default.createElement("path",{d:"M23.32 17.191L15.438 2.184C14.728.833 13.416 0 11.996 0c-1.42 0-2.733.833-3.443 2.184L.533 17.448a4.744 4.744 0 000 4.368C1.243 23.167 2.555 24 3.975 24h16.05C22.22 24 24 22.044 24 19.632c0-.904-.251-1.746-.68-2.44zm-9.622 1.46c0 1.033-.724 1.823-1.698 1.823s-1.698-.79-1.698-1.822v-.043c0-1.028.724-1.822 1.698-1.822s1.698.79 1.698 1.822v.043zm.039-12.285l-.84 8.06c-.057.581-.408.943-.897.943-.49 0-.84-.367-.896-.942l-.84-8.065c-.057-.624.25-1.095.779-1.095h1.91c.528.005.84.476.784 1.1z"}))},success:function(e){return t.default.createElement(k,{...e},t.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm6.927 8.2l-6.845 9.289a1.011 1.011 0 01-1.43.188l-4.888-3.908a1 1 0 111.25-1.562l4.076 3.261 6.227-8.451a1 1 0 111.61 1.183z"}))},error:function(e){return t.default.createElement(k,{...e},t.default.createElement("path",{d:"M11.983 0a12.206 12.206 0 00-8.51 3.653A11.8 11.8 0 000 12.207 11.779 11.779 0 0011.8 24h.214A12.111 12.111 0 0024 11.791 11.766 11.766 0 0011.983 0zM10.5 16.542a1.476 1.476 0 011.449-1.53h.027a1.527 1.527 0 011.523 1.47 1.475 1.475 0 01-1.449 1.53h-.027a1.529 1.529 0 01-1.523-1.47zM11 12.5v-6a1 1 0 012 0v6a1 1 0 11-2 0z"}))},spinner:function(){return t.default.createElement("div",{className:"Toastify__spinner"})}},N=e=>{let{isRunning:o,preventExitTransition:s,toastRef:i,eventHandlers:r,playToast:n}=function(e){var a,o;let[s,i]=(0,t.useState)(!1),[r,n]=(0,t.useState)(!1),l=(0,t.useRef)(null),c=(0,t.useRef)({start:0,delta:0,removalDistance:0,canCloseOnClick:!0,canDrag:!1,didMove:!1}).current,{autoClose:d,pauseOnHover:f,closeToast:m,onClick:p,closeOnClick:y}=e;function h(){i(!0)}function g(){i(!1)}function v(t){let a=l.current;if(c.canDrag&&a){c.didMove=!0,s&&g(),"x"===e.draggableDirection?c.delta=t.clientX-c.start:c.delta=t.clientY-c.start,c.start!==t.clientX&&(c.canCloseOnClick=!1);let o="x"===e.draggableDirection?`${c.delta}px, var(--y)`:`0, calc(${c.delta}px + var(--y))`;a.style.transform=`translate3d(${o},0)`,a.style.opacity=`${1-Math.abs(c.delta/c.removalDistance)}`}}function x(){document.removeEventListener("pointermove",v),document.removeEventListener("pointerup",x);let t=l.current;if(c.canDrag&&c.didMove&&t){if(c.canDrag=!1,Math.abs(c.delta)>c.removalDistance){n(!0),e.closeToast(!0),e.collapseAll();return}t.style.transition="transform 0.2s, opacity 0.2s",t.style.removeProperty("transform"),t.style.removeProperty("opacity")}}a={id:e.toastId,containerId:e.containerId,fn:i},null==(o=u.get(a.containerId||1))||o.setToggle(a.id,a.fn),(0,t.useEffect)(()=>{if(e.pauseOnFocusLoss)return document.hasFocus()||g(),window.addEventListener("focus",h),window.addEventListener("blur",g),()=>{window.removeEventListener("focus",h),window.removeEventListener("blur",g)}},[e.pauseOnFocusLoss]);let b={onPointerDown:function(t){if(!0===e.draggable||e.draggable===t.pointerType){c.didMove=!1,document.addEventListener("pointermove",v),document.addEventListener("pointerup",x);let a=l.current;c.canCloseOnClick=!0,c.canDrag=!0,a.style.transition="none","x"===e.draggableDirection?(c.start=t.clientX,c.removalDistance=a.offsetWidth*(e.draggablePercent/100)):(c.start=t.clientY,c.removalDistance=a.offsetHeight*(80===e.draggablePercent?1.5*e.draggablePercent:e.draggablePercent)/100)}},onPointerUp:function(t){let{top:a,bottom:o,left:s,right:i}=l.current.getBoundingClientRect();"mouse"===t.pointerType&&e.pauseOnHover&&t.clientX>=s&&t.clientX<=i&&t.clientY>=a&&t.clientY<=o?g():h()}};return d&&f&&(b.onMouseEnter=g,e.stacked||(b.onMouseLeave=h)),y&&(b.onClick=e=>{p&&p(e),c.canCloseOnClick&&m(!0)}),{playToast:h,pauseToast:g,isRunning:s,preventExitTransition:r,toastRef:l,eventHandlers:b}}(e),{closeButton:d,children:f,autoClose:m,onClick:p,type:y,hideProgressBar:h,closeToast:g,transition:v,position:x,className:b,style:_,progressClassName:T,updateId:j,role:k,progress:N,rtl:C,toastId:E,deleteToast:I,isIn:P,isLoading:L,closeOnClick:D,theme:z,ariaLabel:O}=e,R=(0,a.default)("Toastify__toast",`Toastify__toast-theme--${z}`,`Toastify__toast--${y}`,{"Toastify__toast--rtl":C},{"Toastify__toast--close-on-click":D}),S="function"==typeof b?b({rtl:C,position:x,type:y,defaultClassName:R}):(0,a.default)(R,b),A=function({theme:e,type:a,isLoading:o,icon:s}){let i=null,r={theme:e,type:a};return!1===s||("function"==typeof s?i=s({...r,isLoading:o}):(0,t.isValidElement)(s)?i=(0,t.cloneElement)(s,r):o?i=w.spinner():a in w&&(i=w[a](r))),i}(e),B=!!N||!m,q={closeToast:g,type:y,theme:z},M=null;return!1===d||(M="function"==typeof d?d(q):(0,t.isValidElement)(d)?(0,t.cloneElement)(d,q):function({closeToast:e,theme:a,ariaLabel:o="close"}){return t.default.createElement("button",{className:`Toastify__close-button Toastify__close-button--${a}`,type:"button",onClick:t=>{t.stopPropagation(),e(!0)},"aria-label":o},t.default.createElement("svg",{"aria-hidden":"true",viewBox:"0 0 14 16"},t.default.createElement("path",{fillRule:"evenodd",d:"M7.71 8.23l3.75 3.75-1.48 1.48-3.75-3.75-3.75 3.75L1 11.98l3.75-3.75L1 4.48 2.48 3l3.75 3.75L9.98 3l1.48 1.48-3.75 3.75z"})))}(q)),t.default.createElement(v,{isIn:P,done:I,position:x,preventExitTransition:s,nodeRef:i,playToast:n},t.default.createElement("div",{id:E,tabIndex:0,onClick:p,"data-in":P,className:S,...r,style:_,ref:i,...P&&{role:k,"aria-label":O}},null!=A&&t.default.createElement("div",{className:(0,a.default)("Toastify__toast-icon",{"Toastify--animate-icon Toastify__zoom-enter":!L})},A),l(f,e,!o),M,!e.customProgressBar&&t.default.createElement(c,{...j&&!B?{key:`p-${j}`}:{},rtl:C,theme:z,delay:m,isRunning:o,isIn:P,closeToast:g,hide:h,type:y,className:T,controlledProgress:B,progress:N||0})))},C=(e,t=!1)=>({enter:`Toastify--animate Toastify__${e}-enter`,exit:`Toastify--animate Toastify__${e}-exit`,appendPosition:t}),E=r(C("bounce",!0));r(C("slide",!0)),r(C("zoom")),r(C("flip"));var I={position:"top-right",transition:E,autoClose:5e3,closeButton:!0,pauseOnHover:!0,pauseOnFocusLoss:!0,draggable:"touch",draggablePercent:80,draggableDirection:"x",role:"alert",theme:"light","aria-label":"Notifications Alt+T",hotKeys:e=>e.altKey&&"KeyT"===e.code};function P(e){let r={...I,...e},l=e.stacked,[c,d]=(0,t.useState)(!0),f=(0,t.useRef)(null),{getToastToRender:p,isToastActive:v,count:x}=function(e){var a;let r,{subscribe:l,getSnapshot:c,setProps:d}=(0,t.useRef)((r=e.containerId||1,{subscribe(t){let a,l,c,d,f,p,h,v,x,b,_,T=(a=1,l=0,c=[],d=[],f=e,p=new Map,h=new Set,v=()=>{d=Array.from(p.values()),h.forEach(e=>e())},x=e=>{var t,a;e.isActive&&(null==(a=null==(t=e.props)?void 0:t.onClose)||a.call(t,e.removalReason),e.isActive=!1,y(n(e,"removed")))},b=e=>{if(null==e)p.forEach(x);else{let t=p.get(e);t&&x(t)}v()},_=e=>{var t,a;let{toastId:o,updateId:s}=e.props,i=null==s;e.staleId&&p.delete(e.staleId),e.isActive=!0,p.set(o,e),v(),y(n(e,i?"added":"updated")),i&&(null==(a=(t=e.props).onOpen)||a.call(t))},{id:r,props:f,observe:e=>(h.add(e),()=>h.delete(e)),toggle:(e,t)=>{p.forEach(a=>{var o;(null==t||t===a.props.toastId)&&(null==(o=a.toggle)||o.call(a,e))})},removeToast:b,toasts:p,clearQueue:()=>{l-=c.length,c=[]},buildToast:(e,t)=>{let n,d;if((({containerId:e,toastId:t,updateId:a})=>{let o=p.has(t)&&null==a;return(e?e!==r:1!==r)||o})(t))return;let{toastId:u,updateId:m,data:y,staleId:h,delay:g}=t,x=null==m;x&&l++;let T={...f,style:f.toastStyle,key:a++,...Object.fromEntries(Object.entries(t).filter(([e,t])=>null!=t)),toastId:u,updateId:m,data:y,isIn:!1,className:s(t.className||f.toastClassName),progressClassName:s(t.progressClassName||f.progressClassName),autoClose:!t.isLoading&&(n=t.autoClose,d=f.autoClose,!1===n||o(n)&&n>0?n:d),closeToast(e){let t=p.get(u);t&&(t.removalReason=e,b(u))},deleteToast(){if(null!=p.get(u)){if(p.delete(u),--l<0&&(l=0),c.length>0)return void _(c.shift());v()}}};T.closeButton=f.closeButton,!1===t.closeButton||i(t.closeButton)?T.closeButton=t.closeButton:!0===t.closeButton&&(T.closeButton=!i(f.closeButton)||f.closeButton);let j={content:e,props:T,staleId:h};f.limit&&f.limit>0&&l>f.limit&&x?c.push(j):o(g)?setTimeout(()=>{_(j)},g):_(j)},setProps(e){f=e},setToggle:(e,t)=>{let a=p.get(e);a&&(a.toggle=t)},isToastActive:e=>{var t;return null==(t=p.get(e))?void 0:t.isActive},getSnapshot:()=>d});u.set(r,T);let j=T.observe(t);return m.forEach(e=>g(e.content,e.options)),m=[],()=>{j(),u.delete(r)}},setProps(e){var t;null==(t=u.get(r))||t.setProps(e)},getSnapshot(){var e;return null==(e=u.get(r))?void 0:e.getSnapshot()}})).current;d(e);let f=null==(a=(0,t.useSyncExternalStore)(l,c,c))?void 0:a.slice();return{getToastToRender:function(t){if(!f)return[];let a=new Map;return e.newestOnTop&&f.reverse(),f.forEach(e=>{let{position:t}=e.props;a.has(t)||a.set(t,[]),a.get(t).push(e)}),Array.from(a,e=>t(e[0],e[1]))},isToastActive:h,count:null==f?void 0:f.length}}(r),{className:b,style:_,rtl:k,containerId:w,hotKeys:C}=r;function E(){l&&(d(!0),T.play())}return j(()=>{var e;if(l){let t=f.current.querySelectorAll('[data-in="true"]'),a=null==(e=r.position)?void 0:e.includes("top"),o=0,s=0;Array.from(t).reverse().forEach((e,t)=>{e.classList.add("Toastify__toast--stacked"),t>0&&(e.dataset.collapsed=`${c}`),e.dataset.pos||(e.dataset.pos=a?"top":"bot");let i=o*(c?.2:1)+(c?0:12*t),r=Math.max(.5,1-(c?s:0));e.style.setProperty("--y",`${a?i:-1*i}px`),e.style.setProperty("--g","12"),e.style.setProperty("--s",`${r}`),o+=e.offsetHeight,s+=.025})}},[c,x,l]),(0,t.useEffect)(()=>{function e(e){var t;let a=f.current;C(e)&&(null==(t=null==a?void 0:a.querySelector('[tabIndex="0"]'))||t.focus(),d(!1),T.pause()),"Escape"===e.key&&(document.activeElement===a||null!=a&&a.contains(document.activeElement))&&(d(!0),T.play())}return document.addEventListener("keydown",e),()=>{document.removeEventListener("keydown",e)}},[C]),t.default.createElement("section",{ref:f,className:"Toastify",id:w,onMouseEnter:()=>{l&&(d(!1),T.pause())},onMouseLeave:E,"aria-live":"polite","aria-atomic":"false","aria-relevant":"additions text","aria-label":r["aria-label"]},p((e,o)=>{var i;let r,n=o.length?{..._}:{..._,pointerEvents:"none"};return t.default.createElement("div",{tabIndex:-1,className:(i=e,r=(0,a.default)("Toastify__toast-container",`Toastify__toast-container--${i}`,{"Toastify__toast-container--rtl":k}),"function"==typeof b?b({position:i,rtl:k,defaultClassName:r}):(0,a.default)(r,s(b))),"data-stacked":l,style:n,key:`c-${e}`},o.map(({content:e,props:a})=>t.default.createElement(N,{...a,stacked:l,collapseAll:E,isIn:v(a.toastId,a.containerId),key:`t-${a.key}`},e)))}))}var L=`:root {
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
`,D=new Map;e.s(["ToastContainer",0,function(e){var a;return j(()=>{if(!L||"u"<typeof document)return;let e=document,t=D.get(e);if(t){a&&t.setAttribute("nonce",a);return}let o=e.createElement("style");o.textContent=L,a&&o.setAttribute("nonce",a),e.head.appendChild(o),D.set(e,o)},[a=e.nonce]),t.default.createElement(P,{...e})},"toast",0,T])},84975,(e,t,a)=>{t.exports={frontendBase:"https://www.resumesathi.com",backendBase:"https://api.resumesathi.com"}},56518,e=>{"use strict";var t=e.i(47167),a=e.i(84975);let o=t.default.env.NEXT_PUBLIC_SITE_URL||t.default.env.NEXT_PUBLIC_FRONTEND_URL||a.default.frontendBase,s=t.default.env.NEXT_PUBLIC_BACKEND_BASE||a.default.backendBase;function i(){return s.replace(/\/+$/,"")}function r(){return`${i()}/api`}e.s(["getApiBase",0,r,"getBackendBase",0,i,"getContentCacheUrl",0,function(e){return`${r()}/public-cache/${String(e).replace(/^\/+/,"")}`},"getSiteBase",0,function(){return o.replace(/\/+$/,"")},"resolveApiMediaUrl",0,function(e,t){return e?/^https?:\/\//i.test(e)||String(e).startsWith("//")?e:`${i()}/${String(e).replace(/^\/+/,"")}`:t}])},67585,(e,t,a)=>{"use strict";Object.defineProperty(a,"__esModule",{value:!0}),Object.defineProperty(a,"BailoutToCSR",{enumerable:!0,get:function(){return s}});let o=e.r(32061);function s({reason:e,children:t}){if("u"<typeof window)throw Object.defineProperty(new o.BailoutToCSRError(e),"__NEXT_ERROR_CODE",{value:"E394",enumerable:!1,configurable:!0});return t}},9885,(e,t,a)=>{"use strict";function o(e){return e.split("/").map(e=>encodeURIComponent(e)).join("/")}Object.defineProperty(a,"__esModule",{value:!0}),Object.defineProperty(a,"encodeURIPath",{enumerable:!0,get:function(){return o}})},52157,(e,t,a)=>{"use strict";Object.defineProperty(a,"__esModule",{value:!0}),Object.defineProperty(a,"PreloadChunks",{enumerable:!0,get:function(){return l}});let o=e.r(43476),s=e.r(74080),i=e.r(63599),r=e.r(9885),n=e.r(43369);function l({moduleIds:e}){if("u">typeof window)return null;let t=i.workAsyncStorage.getStore();if(void 0===t)return null;let a=[];if(t.reactLoadableManifest&&e){let o=t.reactLoadableManifest;for(let t of e){if(!o[t])continue;let e=o[t].files;a.push(...e)}}if(0===a.length)return null;let c=(0,n.getAssetTokenQuery)();return(0,o.jsx)(o.Fragment,{children:a.map(e=>{let a=`${t.assetPrefix}/_next/${(0,r.encodeURIPath)(e)}${c}`;return e.endsWith(".css")?(0,o.jsx)("link",{precedence:"dynamic",href:a,rel:"stylesheet",as:"style",nonce:t.nonce},e):((0,s.preload)(a,{as:"script",fetchPriority:"low",nonce:t.nonce}),null)})})}},69093,(e,t,a)=>{"use strict";Object.defineProperty(a,"__esModule",{value:!0}),Object.defineProperty(a,"default",{enumerable:!0,get:function(){return c}});let o=e.r(43476),s=e.r(71645),i=e.r(67585),r=e.r(52157);function n(e){return{default:e&&"default"in e?e.default:e}}let l={loader:()=>Promise.resolve(n(()=>null)),loading:null,ssr:!0},c=function(e){let t={...l,...e},a=(0,s.lazy)(()=>t.loader().then(n)),c=t.loading;function d(e){let n=c?(0,o.jsx)(c,{isLoading:!0,pastDelay:!0,error:null}):null,l=!t.ssr||!!t.loading,d=l?s.Suspense:s.Fragment,f=t.ssr?(0,o.jsxs)(o.Fragment,{children:["u"<typeof window?(0,o.jsx)(r.PreloadChunks,{moduleIds:t.modules}):null,(0,o.jsx)(a,{...e})]}):(0,o.jsx)(i.BailoutToCSR,{reason:"next/dynamic",children:(0,o.jsx)(a,{...e})});return(0,o.jsx)(d,{...l?{fallback:n}:{},children:f})}return d.displayName="LoadableComponent",d}},70703,(e,t,a)=>{"use strict";Object.defineProperty(a,"__esModule",{value:!0}),Object.defineProperty(a,"default",{enumerable:!0,get:function(){return s}});let o=e.r(55682)._(e.r(69093));function s(e,t){let a={};"function"==typeof e&&(a.loader=e);let s={...a,...t};return(0,o.default)({...s,modules:s.loadableGenerated?.modules})}("function"==typeof a.default||"object"==typeof a.default&&null!==a.default)&&void 0===a.default.__esModule&&(Object.defineProperty(a.default,"__esModule",{value:!0}),Object.assign(a.default,a),t.exports=a.default)},31144,e=>{"use strict";var t=e.i(43476),a=e.i(71645),o=e.i(70703),s=e.i(70319),i=e.i(56518);let r=(0,o.default)(()=>e.A(18121),{loadableGenerated:{modules:[76348]},ssr:!1}),n=[{value:"extreme",title:"Extreme Compression",desc:"Smallest file size, lower quality"},{value:"recommended",title:"Recommended Compression",desc:"Good quality, good compression"},{value:"less",title:"Less Compression",desc:"Better quality, larger file size"}];function l({percentage:e}){let a=2*Math.PI*64,o=Math.max(0,Math.min(100,e||0));return(0,t.jsxs)("svg",{className:"compression-ring",width:140,height:140,viewBox:"0 0 140 140",children:[(0,t.jsx)("circle",{className:"ring-bg",cx:70,cy:70,r:64,strokeWidth:12}),(0,t.jsx)("circle",{className:"ring-progress",cx:70,cy:70,r:64,strokeWidth:12,strokeDasharray:a,strokeDashoffset:a-o/100*a}),(0,t.jsxs)("text",{x:"50%",y:"47%",textAnchor:"middle",className:"ring-value",children:[o,"%"]}),(0,t.jsx)("text",{x:"50%",y:"65%",textAnchor:"middle",className:"ring-label",children:"saved"})]})}e.s(["default",0,function(){let[e,o]=(0,a.useState)(null),[c,d]=(0,a.useState)(null),[f,u]=(0,a.useState)("recommended"),[m,p]=(0,a.useState)(!1),[y,h]=(0,a.useState)(null),[g,v]=(0,a.useState)(!1),[x,b]=(0,a.useState)(!1),[_,T]=(0,a.useState)(!1),[j,k]=(0,a.useState)(!1),[w,N]=(0,a.useState)(!1),C=(0,a.useRef)(null);function E(e){return e?e<1024?e+" Bytes":e<1048576?(e/1024).toFixed(2)+" KB":(e/1048576).toFixed(2)+" MB":""}let I=e=>{let t=Array.from(e).find(e=>"application/pdf"===e.type);t?(c&&URL.revokeObjectURL(c),o(t),d(URL.createObjectURL(t)),h(null)):s.toast.error("Only PDF files are accepted")},P=()=>{c&&URL.revokeObjectURL(c),o(null),d(null),h(null),p(!1),T(!1),k(!1)},L=async()=>{if(!e)return void s.toast.error("Please select a PDF file");try{p(!0),h(null);let t=new FormData;t.append("pdf",e),t.append("quality",f),t.append("compression",f),t.append("level",f);let a=await fetch(`${(0,i.getApiBase)()}/pdf/compress`,{method:"POST",body:t}),o=await a.json();if(!a.ok)throw Error(o.message||"Compression failed");h(o),s.toast.success("PDF compressed successfully!")}catch(e){s.toast.error(e.message||"Failed to compress PDF")}finally{p(!1)}},D=y?function(e){if(null==e)return 0;let t=parseFloat(String(e).replace("%",""));return isNaN(t)?0:Math.round(t)}(y.saved_percentage):0;return(0,t.jsxs)("div",{className:"tools-right-div custom-container py-custom pb-120 mb-3",children:[(0,t.jsxs)("section",{className:`pdf-compress-tool${x?" page-drag-over":""} mb-3 mb-md-5`,onDragOver:e?e=>{e.preventDefault(),b(!0)}:void 0,onDragLeave:e?e=>{e.currentTarget.contains(e.relatedTarget)||b(!1)}:void 0,onDrop:e?e=>{e.preventDefault(),b(!1),I(e.dataTransfer.files)}:void 0,children:[(0,t.jsxs)("div",{className:"tool-header",children:[(0,t.jsxs)("h1",{children:["Compress ",(0,t.jsx)("span",{children:"PDF"})," Online"]}),(0,t.jsxs)("p",{children:["Reduce your PDF file size without losing the quality you need."," ",(0,t.jsx)("br",{})," ",(0,t.jsx)("span",{children:"Fast, secure, and hassle-free"})]})]}),!e&&(0,t.jsxs)("div",{className:`drop-zone${g?" drag-over":""}`,onDragOver:e=>{e.preventDefault(),e.stopPropagation(),v(!0)},onDragLeave:e=>{e.preventDefault(),e.stopPropagation(),v(!1)},onDrop:e=>{e.preventDefault(),e.stopPropagation(),v(!1),I(e.dataTransfer.files)},children:[(0,t.jsx)("input",{ref:C,className:"drop-zone-input",type:"file",accept:".pdf",onChange:e=>{I(e.target.files),e.target.value=""}}),(0,t.jsx)("div",{className:"drop-zone-icon",children:(0,t.jsxs)("svg",{viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,t.jsx)("path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}),(0,t.jsx)("polyline",{points:"17 8 12 3 7 8"}),(0,t.jsx)("line",{x1:"12",y1:"3",x2:"12",y2:"15"})]})}),(0,t.jsx)("div",{className:"drop-zone-title",children:g?"Release to add PDF":"Drag & Drop PDF file here"}),(0,t.jsxs)("div",{className:"drop-zone-sub",children:["or ",(0,t.jsx)("span",{children:"browse from your device"})]}),(0,t.jsx)("button",{className:"drop-zone-btn",onClick:()=>C.current?.click(),type:"button",children:"Select PDF File"})]}),x&&(0,t.jsx)("div",{className:"page-drop-overlay",children:(0,t.jsxs)("div",{className:"page-drop-inner",children:[(0,t.jsxs)("svg",{viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,t.jsx)("path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}),(0,t.jsx)("polyline",{points:"17 8 12 3 7 8"}),(0,t.jsx)("line",{x1:"12",y1:"3",x2:"12",y2:"15"})]}),(0,t.jsx)("p",{children:"Drop PDF to replace"})]})}),e&&!y&&(0,t.jsxs)("div",{className:"pdf-workspace",children:[(0,t.jsxs)("div",{className:"pdf-card-wrap",children:[(0,t.jsx)("h2",{className:"section-subtitle d-none d-md-block",children:"PDF Preview"}),(0,t.jsxs)("div",{className:"pdf-card",children:[(0,t.jsx)("button",{className:"pdf-remove",onClick:P,type:"button",title:"Remove",children:"×"}),(0,t.jsx)("div",{className:"pdf-preview-wrap",children:(0,t.jsx)(r,{file:c})}),(0,t.jsxs)("div",{className:"pdf-info",children:[(0,t.jsx)("div",{className:"pdf-name",title:e.name,children:e.name}),(0,t.jsx)("div",{className:"pdf-size",children:E(e.size)})]})]}),(0,t.jsxs)("button",{className:"mobile-quality-trigger",type:"button",onClick:()=>T(!0),children:[(0,t.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,t.jsx)("circle",{cx:"12",cy:"12",r:"3"}),(0,t.jsx)("path",{d:"M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"})]}),n.find(e=>e.value===f)?.title||"Compression Level"]})]}),(0,t.jsx)("div",{className:"pdf-side-panel",children:(0,t.jsxs)("div",{className:"quality-options",children:[(0,t.jsx)("h2",{className:"section-subtitle",children:"Compression Level"}),n.map(e=>(0,t.jsxs)("label",{className:`quality-card${f===e.value?" active":""}`,children:[(0,t.jsx)("input",{type:"radio",name:"quality",value:e.value,checked:f===e.value,onChange:e=>u(e.target.value),disabled:m}),(0,t.jsx)("span",{className:"quality-title",children:e.title}),(0,t.jsx)("p",{className:"quality-desc",children:e.desc})]},e.value))]})})]}),e&&y&&(0,t.jsx)("div",{className:"pdf-result-wrap",children:(0,t.jsxs)("div",{className:"compress-result",children:[(0,t.jsx)("h2",{className:"section-subtitle d-none",children:"Compression Complete 🎉"}),(0,t.jsx)("div",{className:"result-ring-wrap",children:(0,t.jsx)(l,{percentage:D})}),(0,t.jsxs)("div",{className:"result-file-row",children:[(0,t.jsx)("div",{className:"result-file-name",title:e.name,children:e.name}),(0,t.jsxs)("button",{className:"preview-pdf-btn",type:"button",onClick:()=>k(!0),children:[(0,t.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,t.jsx)("path",{d:"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"}),(0,t.jsx)("circle",{cx:"12",cy:"12",r:"3"})]}),"Preview"]})]}),(0,t.jsxs)("div",{className:"result-stats",children:[(0,t.jsxs)("p",{children:["Original Size: ",(0,t.jsx)("b",{children:y.original_size})]}),(0,t.jsxs)("p",{children:["Compressed Size: ",(0,t.jsx)("b",{children:y.compressed_size})]})]})]})}),_&&!y&&(0,t.jsx)("div",{className:"quality-modal-overlay",onClick:()=>T(!1),children:(0,t.jsxs)("div",{className:"quality-modal",onClick:e=>e.stopPropagation(),children:[(0,t.jsxs)("div",{className:"quality-modal-header",children:[(0,t.jsx)("h2",{className:"section-subtitle",children:"Compression Level"}),(0,t.jsx)("button",{className:"quality-modal-close",type:"button",onClick:()=>T(!1),"aria-label":"Close",children:"×"})]}),(0,t.jsx)("div",{className:"quality-options",children:n.map(e=>(0,t.jsxs)("label",{className:`quality-card${f===e.value?" active":""}`,children:[(0,t.jsx)("input",{type:"radio",name:"quality-modal",value:e.value,checked:f===e.value,onChange:e=>u(e.target.value),disabled:m}),(0,t.jsx)("span",{className:"quality-title",children:e.title}),(0,t.jsx)("p",{className:"quality-desc",children:e.desc})]},e.value))}),(0,t.jsx)("button",{className:"quality-modal-apply",type:"button",onClick:()=>T(!1),children:"Apply"})]})}),j&&y&&(0,t.jsx)("div",{className:"preview-modal-overlay",onClick:()=>k(!1),children:(0,t.jsxs)("div",{className:"preview-modal",onClick:e=>e.stopPropagation(),children:[(0,t.jsxs)("div",{className:"quality-modal-header",children:[(0,t.jsx)("h2",{className:"section-subtitle",children:"PDF Preview"}),(0,t.jsx)("button",{className:"quality-modal-close",type:"button",onClick:()=>k(!1),"aria-label":"Close",children:"×"})]}),(0,t.jsx)("div",{className:"preview-modal-canvas",children:(0,t.jsx)(r,{file:c})}),(0,t.jsxs)("div",{className:"pdf-info",children:[(0,t.jsx)("div",{className:"pdf-name",title:e?.name,children:e?.name}),(0,t.jsx)("div",{className:"pdf-size",children:E(e?.size)})]})]})}),m&&(0,t.jsxs)("div",{className:"loader-overlay",children:[(0,t.jsxs)("div",{className:"loader-inner-div",children:[(0,t.jsx)("div",{className:"box",id:"loader1"}),(0,t.jsx)("div",{className:"box",id:"loader2"}),(0,t.jsx)("div",{className:"box",id:"loader3"}),(0,t.jsx)("div",{className:"box",id:"loader4"}),(0,t.jsx)("div",{className:"box",id:"loader5"})]}),(0,t.jsx)("div",{className:"loader-text",children:"Compressing your PDF…"})]}),(0,t.jsx)(s.ToastContainer,{position:"top-right"})]}),e&&(0,t.jsxs)("div",{className:"tools-bottom-button-div",children:[(0,t.jsxs)("button",{className:"tool-outline-btn",type:"button",onClick:P,children:[(0,t.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,t.jsx)("line",{x1:"12",y1:"5",x2:"12",y2:"19"}),(0,t.jsx)("line",{x1:"5",y1:"12",x2:"19",y2:"12"})]}),"Change File"]}),y?(0,t.jsxs)("button",{className:"tool-solid-btn btn-download",type:"button",onClick:()=>{y?.download_url&&(window.location.href=y.download_url)},disabled:w,children:[(0,t.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,t.jsx)("path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}),(0,t.jsx)("polyline",{points:"7 10 12 15 17 10"}),(0,t.jsx)("line",{x1:"12",y1:"15",x2:"12",y2:"3"})]}),w?"Downloading...":"Download"," ",(0,t.jsx)("span",{className:"d-none d-sm-block",children:"Compressed PDF"})]}):(0,t.jsxs)("button",{className:"tool-solid-btn",type:"button",onClick:L,disabled:m,children:[(0,t.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,t.jsx)("path",{d:"M8 6H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h4"}),(0,t.jsx)("path",{d:"M16 6h4a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-4"}),(0,t.jsx)("line",{x1:"12",y1:"2",x2:"12",y2:"22"})]}),m?"Compressing...":"Compress"," ",(0,t.jsx)("span",{className:"d-none d-sm-block",children:"& Download"})]})]}),(0,t.jsxs)("section",{className:"pdf-compress-info",children:[(0,t.jsxs)("div",{className:"info-block",children:[(0,t.jsx)("h2",{children:"Compress PDF Without Losing Quality"}),(0,t.jsx)("p",{children:"Almost every job portal, government application form, or online submission site has some kind of file size limit, and it's usually smaller than you'd expect. Two or three megabytes is common, and that's often not enough for a scanned certificate or a resume with a photo on it. If your file gets rejected for being too large, this tool brings the size down while keeping the text readable and the document usable. Upload your PDF, pick how much you want it compressed, and the smaller file downloads within a few seconds. No account needed, no waiting around."}),(0,t.jsx)("p",{children:"There isn't one perfect compression setting for every file. A scanned document with a lot of image data behaves very differently from a plain text PDF exported from Word, so the tool gives you a few levels to choose from depending on what you're working with and how strict the upload limit actually is."})]}),(0,t.jsxs)("div",{className:"info-block",children:[(0,t.jsx)("h3",{children:"Why People Usually Need This"}),(0,t.jsxs)("ul",{className:"info-list",children:[(0,t.jsxs)("li",{children:[(0,t.jsx)("b",{children:"Sarkari job applications"})," : recruitment portals like SSC, state PSCs, and railway recruitment sites often cap file size for resumes, certificates, and ID proof, sometimes at just 1 or 2 MB."]}),(0,t.jsxs)("li",{children:[(0,t.jsx)("b",{children:"Email attachments"})," : a smaller file is just easier to send, especially if someone's on a weak mobile connection or the inbox has a size limit on attachments."]}),(0,t.jsxs)("li",{children:[(0,t.jsx)("b",{children:"Resume uploads"})," : a lot of ATS platforms and job boards reject resumes past a certain size, so compression becomes a necessary step before you can even submit."]}),(0,t.jsxs)("li",{children:[(0,t.jsx)("b",{children:"Scanned documents"})," : PDFs made from a phone camera or a scanning app are almost always bigger than they need to be, and usually shrink a lot without the text becoming hard to read."]})]})]}),(0,t.jsxs)("div",{className:"info-block",children:[(0,t.jsx)("h3",{children:"Compression Levels"}),(0,t.jsx)("p",{children:"Different documents need different amounts of compression, so there are three levels to pick from here, depending on what matters more for your file smaller size or sharper quality."}),(0,t.jsxs)("div",{className:"info-cards",children:[(0,t.jsxs)("div",{className:"info-card",children:[(0,t.jsx)("span",{className:"info-card-tag",children:"Extreme"}),(0,t.jsx)("p",{children:"Squeezes the file down as much as possible. Good option when a portal has a very strict upload limit and you just need the file to fit, even if image quality drops a bit."})]}),(0,t.jsxs)("div",{className:"info-card info-card--highlight",children:[(0,t.jsx)("span",{className:"info-card-tag",children:"Recommended"}),(0,t.jsx)("p",{children:"A middle ground between size and quality. Text stays sharp and images still look fine for things like resumes, certificates, and everyday documents. Works for most people most of the time."})]}),(0,t.jsxs)("div",{className:"info-card",children:[(0,t.jsx)("span",{className:"info-card-tag",children:"Less Compression"}),(0,t.jsx)("p",{children:"Trims the file size down with almost no visible change in quality. Better suited to PDFs with photos, diagrams, or anything where visual detail actually matters."})]})]})]}),(0,t.jsxs)("div",{className:"info-block",children:[(0,t.jsx)("h3",{children:"How Much Smaller Will My File Get?"}),(0,t.jsx)("p",{children:"This really depends on what's inside your PDF. A text-heavy document, like a plain resume with no images, usually only shrinks a little, because there isn't much to compress in the first place text takes up very little space compared to images. Scanned documents are a different story. Since a scan is basically one big image per page, there's a lot more room to compress, and you'll often see the file size drop by more than half, sometimes a lot more depending on how the scan was originally saved. If your file barely shrinks after compressing, it's usually a sign that it was already fairly text-based to begin with, not that something went wrong with the tool."})]}),(0,t.jsxs)("div",{className:"info-block",children:[(0,t.jsx)("h3",{children:"Choosing the Right Level for Your Situation"}),(0,t.jsx)("p",{children:"Honestly it comes down to what you're using the file for. Say you're uploading a resume somewhere with a tight 2 MB cap go with Extreme and just double-check the text still reads fine after. Sending a certificate over email where the limit's more relaxed? Recommended handles that without the document looking any different really. And if there are diagrams or photos in there that someone actually needs to look at closely, Less Compression keeps it closer to the original while still shaving off some size. Nothing stopping you from trying a couple of these and comparing before picking one to actually submit."})]}),(0,t.jsxs)("div",{className:"info-block",children:[(0,t.jsx)("h3",{children:"Things to Keep in Mind"}),(0,t.jsxs)("ul",{className:"info-list info-list--plain",children:[(0,t.jsx)("li",{children:"Hold on to your original PDF until you've checked that the compressed version still looks right."}),(0,t.jsx)("li",{children:"Password-protected PDFs sometimes don't compress as much, since the encryption limits what the tool can rework."}),(0,t.jsx)("li",{children:"Text-only PDFs will usually show a smaller reduction than scanned or image-heavy files, and that's expected."}),(0,t.jsx)("li",{children:"If quality matters more than size for a particular file, Less Compression is usually the safer pick."})]})]}),(0,t.jsxs)("div",{className:"info-block",children:[(0,t.jsx)("h3",{children:"Frequently Asked Questions"}),(0,t.jsxs)("div",{className:"faq-list",children:[(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Is this tool free?"}),(0,t.jsx)("p",{children:"Yes, completely free. No account, no payment, no limit on how many times you use it."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Will compression reduce PDF quality?"}),(0,t.jsx)("p",{children:"A little, depending on the level you pick. Recommended keeps text sharp and is fine for most resumes and documents. If quality matters more than size for you, go with Less Compression instead."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Does it work on mobile?"}),(0,t.jsx)("p",{children:"Yes, works fine from any mobile browser, no app needed."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Are my files stored anywhere?"}),(0,t.jsx)("p",{children:"No. Your file gets processed for compression and that's it, nothing gets kept or saved afterward."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"What's the maximum file size I can upload?"}),(0,t.jsx)("p",{children:"That changes based on whatever limit is currently set on the tool. If a file won't upload, chances are it's just over that."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Why did my file barely shrink after compressing?"}),(0,t.jsx)("p",{children:"Most likely it was already mostly text. There just isn't a lot to squeeze out of plain text compared to images, so scanned files usually shrink way more than something like a Word-exported resume."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Can I compress a scanned document?"}),(0,t.jsx)("p",{children:"Yes, and scanned PDFs actually tend to compress the most, since each page is basically one big image and there's plenty of room to reduce."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Should I always pick Extreme compression?"}),(0,t.jsx)("p",{children:"Not necessarily. Extreme is great when you're up against a strict upload limit, but it can affect image quality more than the other levels. If your file already fits comfortably, Recommended or Less Compression is usually a better balance."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Will compressing a password-protected PDF work the same way?"}),(0,t.jsx)("p",{children:"Not quite as well usually. The encryption gets in the way of how much the tool can rework the file, so heavily protected PDFs tend to shrink less than you'd expect."})]}),(0,t.jsxs)("details",{className:"faq-item",children:[(0,t.jsx)("summary",{children:"Can I compress the file more than once if it's still too big?"}),(0,t.jsx)("p",{children:"You can, but repeated compression usually gives diminishing results and can start hurting quality noticeably. It's better to go back to the original file and pick a stronger compression level in one pass instead."})]})]})]})]})]})}])},18121,e=>{e.v(t=>Promise.all(["static/chunks/41j--pdwf77g9.js","static/chunks/03w6bttqv7jlc.js","static/chunks/2ekyigtrc63_3.css"].map(t=>e.l(t))).then(()=>t(76348)))}]);