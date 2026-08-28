(globalThis.TURBOPACK||(globalThis.TURBOPACK=[])).push(["object"==typeof document?document.currentScript:void 0,7670,t=>{"use strict";t.s(["default",0,function(){for(var t,e,r=0,o="",n=arguments.length;r<n;r++)(t=arguments[r])&&(e=function t(e){var r,o,n="";if("string"==typeof e||"number"==typeof e)n+=e;else if("object"==typeof e)if(Array.isArray(e)){var i=e.length;for(r=0;r<i;r++)e[r]&&(o=t(e[r]))&&(n&&(n+=" "),n+=o)}else for(o in e)e[o]&&(n&&(n+=" "),n+=o);return n}(t))&&(o&&(o+=" "),o+=e);return o}])},70319,t=>{"use strict";var e=t.i(71645),r=t.i(7670),o=t=>"number"==typeof t&&!isNaN(t),n=t=>"string"==typeof t||"function"==typeof t?t:null,i=t=>(0,e.isValidElement)(t)||"string"==typeof t||"function"==typeof t||o(t);function a({enter:t,exit:r,appendPosition:o=!1,collapse:n=!0,collapseDuration:i=300}){return function({children:a,position:s,preventExitTransition:l,done:f,nodeRef:c,isIn:u,playToast:d}){let h=o?`${t}--${s}`:t,p=o?`${r}--${s}`:r,m=(0,e.useRef)(0);return(0,e.useLayoutEffect)(()=>{let t=c.current,e=h.split(" "),r=o=>{o.target===c.current&&(d(),t.removeEventListener("animationend",r),t.removeEventListener("animationcancel",r),0===m.current&&"animationcancel"!==o.type&&t.classList.remove(...e))};t.classList.add(...e),t.addEventListener("animationend",r),t.addEventListener("animationcancel",r)},[]),(0,e.useEffect)(()=>{let t=c.current,e=()=>{t.removeEventListener("animationend",e),n?function(t,e,r=300){let{scrollHeight:o,style:n}=t;requestAnimationFrame(()=>{n.minHeight="initial",n.height=o+"px",n.transition=`all ${r}ms`,requestAnimationFrame(()=>{n.height="0",n.padding="0",n.margin="0",setTimeout(e,r)})})}(t,f,i):f()};u||(l?e():(m.current=1,t.className+=` ${p}`,t.addEventListener("animationend",e)))},[u]),e.default.createElement(e.default.Fragment,null,a)}}function s(t,e){return{content:l(t.content,t.props),containerId:t.props.containerId,id:t.props.toastId,theme:t.props.theme,type:t.props.type,data:t.props.data||{},isLoading:t.props.isLoading,icon:t.props.icon,reason:t.removalReason,status:e}}function l(t,r,o=!1){return(0,e.isValidElement)(t)&&"string"!=typeof t.type?(0,e.cloneElement)(t,{closeToast:r.closeToast,toastProps:r,data:r.data,isPaused:o}):"function"==typeof t?t({closeToast:r.closeToast,toastProps:r,data:r.data,isPaused:o}):t}function f({delay:t,isRunning:o,closeToast:n,type:i="default",hide:a,className:s,controlledProgress:l,progress:c,rtl:u,isIn:d,theme:h}){let p=a||l&&0===c,m={animationDuration:`${t}ms`,animationPlayState:o?"running":"paused"};l&&(m.transform=`scaleX(${c})`);let y=(0,r.default)("Toastify__progress-bar",l?"Toastify__progress-bar--controlled":"Toastify__progress-bar--animated",`Toastify__progress-bar-theme--${h}`,`Toastify__progress-bar--${i}`,{"Toastify__progress-bar--rtl":u}),g="function"==typeof s?s({rtl:u,type:i,defaultClassName:y}):(0,r.default)(y,s);return e.default.createElement("div",{className:"Toastify__progress-bar--wrp","data-hidden":p},e.default.createElement("div",{className:`Toastify__progress-bar--bg Toastify__progress-bar-theme--${h} Toastify__progress-bar--${i}`}),e.default.createElement("div",{role:"progressbar","aria-hidden":p?"true":"false","aria-label":"notification timer","aria-valuenow":l?Math.round(100*c):void 0,"aria-valuemin":0,"aria-valuemax":100,className:g,style:m,...{[l&&c>=1?"onTransitionEnd":"onAnimationEnd"]:l&&c<1?null:()=>{d&&n()}}}))}var c=1,u=()=>`${c++}`,d=new Map,h=[],p=new Set,m=t=>p.forEach(e=>e(t));function y(t,e){var r;if(e)return!!(null!=(r=d.get(e))&&r.isToastActive(t));let o=!1;return d.forEach(e=>{e.isToastActive(t)&&(o=!0)}),o}function g(t,e){i(t)&&(d.size>0||h.push({content:t,options:e}),d.forEach(r=>{r.buildToast(t,e)}))}function v(t,e){d.forEach(r=>{null!=e&&null!=e&&e.containerId&&(null==e?void 0:e.containerId)!==r.id||r.toggle(t,null==e?void 0:e.id)})}function _(t,e){return g(t,e),e.toastId}function C(t,e){var r;return{...e,type:e&&e.type||t,toastId:(r=e)&&("string"==typeof r.toastId||o(r.toastId))?r.toastId:u()}}function b(t){return(e,r)=>_(e,C(t,r))}function x(t,e){return _(t,C("default",e))}x.loading=(t,e)=>_(t,C("default",{isLoading:!0,autoClose:!1,closeOnClick:!1,closeButton:!1,draggable:!1,...e})),x.promise=function(t,{pending:e,error:r,success:o},n){let i;e&&(i="string"==typeof e?x.loading(e,n):x.loading(e.render,{...n,...e}));let a={isLoading:null,autoClose:null,closeOnClick:null,closeButton:null,draggable:null},s=(t,e,r)=>{if(null==e)return void x.dismiss(i);let o={type:t,...a,...n,data:r},s="string"==typeof e?{render:e}:e;return i?x.update(i,{...o,...s}):x(s.render,{...o,...s}),r},l="function"==typeof t?t():t;return l.then(t=>s("success",o,t)).catch(t=>s("error",r,t)),l},x.success=b("success"),x.info=b("info"),x.error=b("error"),x.warning=b("warning"),x.warn=x.warning,x.dark=(t,e)=>_(t,C("default",{theme:"dark",...e})),x.dismiss=function(t){!function(t){let e;if(!(d.size>0)){h=h.filter(e=>null!=t&&e.options.toastId!==t);return}if(null==t||"string"==typeof(e=t)||o(e))d.forEach(e=>{e.removeToast(t)});else if(t&&("containerId"in t||"id"in t)){let e=d.get(t.containerId);e?e.removeToast(t.id):d.forEach(e=>{e.removeToast(t.id)})}}(t)},x.clearWaitingQueue=(t={})=>{d.forEach(e=>{e.props.limit&&(!t.containerId||e.id===t.containerId)&&e.clearQueue()})},x.isActive=y,x.update=(t,e={})=>{let r=((t,{containerId:e})=>{var r;return null==(r=d.get(e||1))?void 0:r.toasts.get(t)})(t,e);if(r){let{props:o,content:n}=r,i={delay:100,...o,...e,toastId:e.toastId||t,updateId:u()};i.toastId!==t&&(i.staleId=t);let a=i.render||n;delete i.render,_(a,i)}},x.done=t=>{x.update(t,{progress:1})},x.onChange=function(t){return p.add(t),()=>{p.delete(t)}},x.play=t=>v(!0,t),x.pause=t=>v(!1,t);var w="u">typeof window?e.useLayoutEffect:e.useEffect,T=({theme:t,type:r,isLoading:o,...n})=>e.default.createElement("svg",{viewBox:"0 0 24 24",width:"100%",height:"100%",fill:"colored"===t?"currentColor":`var(--toastify-icon-color-${r})`,...n}),j={info:function(t){return e.default.createElement(T,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.013 12.013 0 0012 0zm.25 5a1.5 1.5 0 11-1.5 1.5 1.5 1.5 0 011.5-1.5zm2.25 13.5h-4a1 1 0 010-2h.75a.25.25 0 00.25-.25v-4.5a.25.25 0 00-.25-.25h-.75a1 1 0 010-2h1a2 2 0 012 2v4.75a.25.25 0 00.25.25h.75a1 1 0 110 2z"}))},warning:function(t){return e.default.createElement(T,{...t},e.default.createElement("path",{d:"M23.32 17.191L15.438 2.184C14.728.833 13.416 0 11.996 0c-1.42 0-2.733.833-3.443 2.184L.533 17.448a4.744 4.744 0 000 4.368C1.243 23.167 2.555 24 3.975 24h16.05C22.22 24 24 22.044 24 19.632c0-.904-.251-1.746-.68-2.44zm-9.622 1.46c0 1.033-.724 1.823-1.698 1.823s-1.698-.79-1.698-1.822v-.043c0-1.028.724-1.822 1.698-1.822s1.698.79 1.698 1.822v.043zm.039-12.285l-.84 8.06c-.057.581-.408.943-.897.943-.49 0-.84-.367-.896-.942l-.84-8.065c-.057-.624.25-1.095.779-1.095h1.91c.528.005.84.476.784 1.1z"}))},success:function(t){return e.default.createElement(T,{...t},e.default.createElement("path",{d:"M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm6.927 8.2l-6.845 9.289a1.011 1.011 0 01-1.43.188l-4.888-3.908a1 1 0 111.25-1.562l4.076 3.261 6.227-8.451a1 1 0 111.61 1.183z"}))},error:function(t){return e.default.createElement(T,{...t},e.default.createElement("path",{d:"M11.983 0a12.206 12.206 0 00-8.51 3.653A11.8 11.8 0 000 12.207 11.779 11.779 0 0011.8 24h.214A12.111 12.111 0 0024 11.791 11.766 11.766 0 0011.983 0zM10.5 16.542a1.476 1.476 0 011.449-1.53h.027a1.527 1.527 0 011.523 1.47 1.475 1.475 0 01-1.449 1.53h-.027a1.529 1.529 0 01-1.523-1.47zM11 12.5v-6a1 1 0 012 0v6a1 1 0 11-2 0z"}))},spinner:function(){return e.default.createElement("div",{className:"Toastify__spinner"})}},k=t=>{let{isRunning:o,preventExitTransition:n,toastRef:i,eventHandlers:a,playToast:s}=function(t){var r,o;let[n,i]=(0,e.useState)(!1),[a,s]=(0,e.useState)(!1),l=(0,e.useRef)(null),f=(0,e.useRef)({start:0,delta:0,removalDistance:0,canCloseOnClick:!0,canDrag:!1,didMove:!1}).current,{autoClose:c,pauseOnHover:u,closeToast:h,onClick:p,closeOnClick:m}=t;function y(){i(!0)}function g(){i(!1)}function v(e){let r=l.current;if(f.canDrag&&r){f.didMove=!0,n&&g(),"x"===t.draggableDirection?f.delta=e.clientX-f.start:f.delta=e.clientY-f.start,f.start!==e.clientX&&(f.canCloseOnClick=!1);let o="x"===t.draggableDirection?`${f.delta}px, var(--y)`:`0, calc(${f.delta}px + var(--y))`;r.style.transform=`translate3d(${o},0)`,r.style.opacity=`${1-Math.abs(f.delta/f.removalDistance)}`}}function _(){document.removeEventListener("pointermove",v),document.removeEventListener("pointerup",_);let e=l.current;if(f.canDrag&&f.didMove&&e){if(f.canDrag=!1,Math.abs(f.delta)>f.removalDistance){s(!0),t.closeToast(!0),t.collapseAll();return}e.style.transition="transform 0.2s, opacity 0.2s",e.style.removeProperty("transform"),e.style.removeProperty("opacity")}}r={id:t.toastId,containerId:t.containerId,fn:i},null==(o=d.get(r.containerId||1))||o.setToggle(r.id,r.fn),(0,e.useEffect)(()=>{if(t.pauseOnFocusLoss)return document.hasFocus()||g(),window.addEventListener("focus",y),window.addEventListener("blur",g),()=>{window.removeEventListener("focus",y),window.removeEventListener("blur",g)}},[t.pauseOnFocusLoss]);let C={onPointerDown:function(e){if(!0===t.draggable||t.draggable===e.pointerType){f.didMove=!1,document.addEventListener("pointermove",v),document.addEventListener("pointerup",_);let r=l.current;f.canCloseOnClick=!0,f.canDrag=!0,r.style.transition="none","x"===t.draggableDirection?(f.start=e.clientX,f.removalDistance=r.offsetWidth*(t.draggablePercent/100)):(f.start=e.clientY,f.removalDistance=r.offsetHeight*(80===t.draggablePercent?1.5*t.draggablePercent:t.draggablePercent)/100)}},onPointerUp:function(e){let{top:r,bottom:o,left:n,right:i}=l.current.getBoundingClientRect();"mouse"===e.pointerType&&t.pauseOnHover&&e.clientX>=n&&e.clientX<=i&&e.clientY>=r&&e.clientY<=o?g():y()}};return c&&u&&(C.onMouseEnter=g,t.stacked||(C.onMouseLeave=y)),m&&(C.onClick=t=>{p&&p(t),f.canCloseOnClick&&h(!0)}),{playToast:y,pauseToast:g,isRunning:n,preventExitTransition:a,toastRef:l,eventHandlers:C}}(t),{closeButton:c,children:u,autoClose:h,onClick:p,type:m,hideProgressBar:y,closeToast:g,transition:v,position:_,className:C,style:b,progressClassName:x,updateId:w,role:T,progress:k,rtl:E,toastId:L,deleteToast:N,isIn:A,isLoading:B,closeOnClick:M,theme:I,ariaLabel:H}=t,R=(0,r.default)("Toastify__toast",`Toastify__toast-theme--${I}`,`Toastify__toast--${m}`,{"Toastify__toast--rtl":E},{"Toastify__toast--close-on-click":M}),O="function"==typeof C?C({rtl:E,position:_,type:m,defaultClassName:R}):(0,r.default)(R,C),V=function({theme:t,type:r,isLoading:o,icon:n}){let i=null,a={theme:t,type:r};return!1===n||("function"==typeof n?i=n({...a,isLoading:o}):(0,e.isValidElement)(n)?i=(0,e.cloneElement)(n,a):o?i=j.spinner():r in j&&(i=j[r](a))),i}(t),P=!!k||!h,S={closeToast:g,type:m,theme:I},U=null;return!1===c||(U="function"==typeof c?c(S):(0,e.isValidElement)(c)?(0,e.cloneElement)(c,S):function({closeToast:t,theme:r,ariaLabel:o="close"}){return e.default.createElement("button",{className:`Toastify__close-button Toastify__close-button--${r}`,type:"button",onClick:e=>{e.stopPropagation(),t(!0)},"aria-label":o},e.default.createElement("svg",{"aria-hidden":"true",viewBox:"0 0 14 16"},e.default.createElement("path",{fillRule:"evenodd",d:"M7.71 8.23l3.75 3.75-1.48 1.48-3.75-3.75-3.75 3.75L1 11.98l3.75-3.75L1 4.48 2.48 3l3.75 3.75L9.98 3l1.48 1.48-3.75 3.75z"})))}(S)),e.default.createElement(v,{isIn:A,done:N,position:_,preventExitTransition:n,nodeRef:i,playToast:s},e.default.createElement("div",{id:L,tabIndex:0,onClick:p,"data-in":A,className:O,...a,style:b,ref:i,...A&&{role:T,"aria-label":H}},null!=V&&e.default.createElement("div",{className:(0,r.default)("Toastify__toast-icon",{"Toastify--animate-icon Toastify__zoom-enter":!B})},V),l(u,t,!o),U,!t.customProgressBar&&e.default.createElement(f,{...w&&!P?{key:`p-${w}`}:{},rtl:E,theme:I,delay:h,isRunning:o,isIn:A,closeToast:g,hide:y,type:m,className:x,controlledProgress:P,progress:k||0})))},E=(t,e=!1)=>({enter:`Toastify--animate Toastify__${t}-enter`,exit:`Toastify--animate Toastify__${t}-exit`,appendPosition:e}),L=a(E("bounce",!0));a(E("slide",!0)),a(E("zoom")),a(E("flip"));var N={position:"top-right",transition:L,autoClose:5e3,closeButton:!0,pauseOnHover:!0,pauseOnFocusLoss:!0,draggable:"touch",draggablePercent:80,draggableDirection:"x",role:"alert",theme:"light","aria-label":"Notifications Alt+T",hotKeys:t=>t.altKey&&"KeyT"===t.code};function A(t){let a={...N,...t},l=t.stacked,[f,c]=(0,e.useState)(!0),u=(0,e.useRef)(null),{getToastToRender:p,isToastActive:v,count:_}=function(t){var r;let a,{subscribe:l,getSnapshot:f,setProps:c}=(0,e.useRef)((a=t.containerId||1,{subscribe(e){let r,l,f,c,u,p,y,v,_,C,b,x=(r=1,l=0,f=[],c=[],u=t,p=new Map,y=new Set,v=()=>{c=Array.from(p.values()),y.forEach(t=>t())},_=t=>{var e,r;t.isActive&&(null==(r=null==(e=t.props)?void 0:e.onClose)||r.call(e,t.removalReason),t.isActive=!1,m(s(t,"removed")))},C=t=>{if(null==t)p.forEach(_);else{let e=p.get(t);e&&_(e)}v()},b=t=>{var e,r;let{toastId:o,updateId:n}=t.props,i=null==n;t.staleId&&p.delete(t.staleId),t.isActive=!0,p.set(o,t),v(),m(s(t,i?"added":"updated")),i&&(null==(r=(e=t.props).onOpen)||r.call(e))},{id:a,props:u,observe:t=>(y.add(t),()=>y.delete(t)),toggle:(t,e)=>{p.forEach(r=>{var o;(null==e||e===r.props.toastId)&&(null==(o=r.toggle)||o.call(r,t))})},removeToast:C,toasts:p,clearQueue:()=>{l-=f.length,f=[]},buildToast:(t,e)=>{let s,c;if((({containerId:t,toastId:e,updateId:r})=>{let o=p.has(e)&&null==r;return(t?t!==a:1!==a)||o})(e))return;let{toastId:d,updateId:h,data:m,staleId:y,delay:g}=e,_=null==h;_&&l++;let x={...u,style:u.toastStyle,key:r++,...Object.fromEntries(Object.entries(e).filter(([t,e])=>null!=e)),toastId:d,updateId:h,data:m,isIn:!1,className:n(e.className||u.toastClassName),progressClassName:n(e.progressClassName||u.progressClassName),autoClose:!e.isLoading&&(s=e.autoClose,c=u.autoClose,!1===s||o(s)&&s>0?s:c),closeToast(t){let e=p.get(d);e&&(e.removalReason=t,C(d))},deleteToast(){if(null!=p.get(d)){if(p.delete(d),--l<0&&(l=0),f.length>0)return void b(f.shift());v()}}};x.closeButton=u.closeButton,!1===e.closeButton||i(e.closeButton)?x.closeButton=e.closeButton:!0===e.closeButton&&(x.closeButton=!i(u.closeButton)||u.closeButton);let w={content:t,props:x,staleId:y};u.limit&&u.limit>0&&l>u.limit&&_?f.push(w):o(g)?setTimeout(()=>{b(w)},g):b(w)},setProps(t){u=t},setToggle:(t,e)=>{let r=p.get(t);r&&(r.toggle=e)},isToastActive:t=>{var e;return null==(e=p.get(t))?void 0:e.isActive},getSnapshot:()=>c});d.set(a,x);let w=x.observe(e);return h.forEach(t=>g(t.content,t.options)),h=[],()=>{w(),d.delete(a)}},setProps(t){var e;null==(e=d.get(a))||e.setProps(t)},getSnapshot(){var t;return null==(t=d.get(a))?void 0:t.getSnapshot()}})).current;c(t);let u=null==(r=(0,e.useSyncExternalStore)(l,f,f))?void 0:r.slice();return{getToastToRender:function(e){if(!u)return[];let r=new Map;return t.newestOnTop&&u.reverse(),u.forEach(t=>{let{position:e}=t.props;r.has(e)||r.set(e,[]),r.get(e).push(t)}),Array.from(r,t=>e(t[0],t[1]))},isToastActive:y,count:null==u?void 0:u.length}}(a),{className:C,style:b,rtl:T,containerId:j,hotKeys:E}=a;function L(){l&&(c(!0),x.play())}return w(()=>{var t;if(l){let e=u.current.querySelectorAll('[data-in="true"]'),r=null==(t=a.position)?void 0:t.includes("top"),o=0,n=0;Array.from(e).reverse().forEach((t,e)=>{t.classList.add("Toastify__toast--stacked"),e>0&&(t.dataset.collapsed=`${f}`),t.dataset.pos||(t.dataset.pos=r?"top":"bot");let i=o*(f?.2:1)+(f?0:12*e),a=Math.max(.5,1-(f?n:0));t.style.setProperty("--y",`${r?i:-1*i}px`),t.style.setProperty("--g","12"),t.style.setProperty("--s",`${a}`),o+=t.offsetHeight,n+=.025})}},[f,_,l]),(0,e.useEffect)(()=>{function t(t){var e;let r=u.current;E(t)&&(null==(e=null==r?void 0:r.querySelector('[tabIndex="0"]'))||e.focus(),c(!1),x.pause()),"Escape"===t.key&&(document.activeElement===r||null!=r&&r.contains(document.activeElement))&&(c(!0),x.play())}return document.addEventListener("keydown",t),()=>{document.removeEventListener("keydown",t)}},[E]),e.default.createElement("section",{ref:u,className:"Toastify",id:j,onMouseEnter:()=>{l&&(c(!1),x.pause())},onMouseLeave:L,"aria-live":"polite","aria-atomic":"false","aria-relevant":"additions text","aria-label":a["aria-label"]},p((t,o)=>{var i;let a,s=o.length?{...b}:{...b,pointerEvents:"none"};return e.default.createElement("div",{tabIndex:-1,className:(i=t,a=(0,r.default)("Toastify__toast-container",`Toastify__toast-container--${i}`,{"Toastify__toast-container--rtl":T}),"function"==typeof C?C({position:i,rtl:T,defaultClassName:a}):(0,r.default)(a,n(C))),"data-stacked":l,style:s,key:`c-${t}`},o.map(({content:t,props:r})=>e.default.createElement(k,{...r,stacked:l,collapseAll:L,isIn:v(r.toastId,r.containerId),key:`t-${r.key}`},t)))}))}var B=`:root {
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
`,M=new Map;t.s(["ToastContainer",0,function(t){var r;return w(()=>{if(!B||"u"<typeof document)return;let t=document,e=M.get(t);if(e){r&&e.setAttribute("nonce",r);return}let o=t.createElement("style");o.textContent=B,r&&o.setAttribute("nonce",r),t.head.appendChild(o),M.set(t,o)},[r=t.nonce]),e.default.createElement(A,{...t})},"toast",0,x])},84975,(t,e,r)=>{e.exports={frontendBase:"https://www.resumesathi.com",backendBase:"http://127.0.0.1:8000"}},56518,t=>{"use strict";var e=t.i(47167),r=t.i(84975);let o=e.default.env.NEXT_PUBLIC_SITE_URL||e.default.env.NEXT_PUBLIC_FRONTEND_URL||r.default.frontendBase,n=e.default.env.NEXT_PUBLIC_BACKEND_BASE||r.default.backendBase;function i(){return n.replace(/\/+$/,"")}function a(){return`${i()}/api`}t.s(["getApiBase",0,a,"getBackendBase",0,i,"getContentCacheUrl",0,function(t){return`${a()}/public-cache/${String(t).replace(/^\/+/,"")}`},"getSiteBase",0,function(){return o.replace(/\/+$/,"")},"resolveApiMediaUrl",0,function(t,e){return t?/^https?:\/\//i.test(t)||String(t).startsWith("//")?t:`${i()}/${String(t).replace(/^\/+/,"")}`:e}])},48293,t=>{"use strict";var e=t.i(43476),r=t.i(71645),o=t.i(22016),n=t.i(18566);function i(t){return["footer-each-tab",t?"active":""].filter(Boolean).join(" ")}t.s(["default",0,function(){let t=(0,n.usePathname)()||"",[a,s]=(0,r.useState)("");(0,r.useEffect)(()=>{s(t)},[t]);let l=a||t,f=l.startsWith("/resume"),c=l.startsWith("/tools"),u=l.startsWith("/tools/"),d=!l.startsWith("/tools")&&!l.startsWith("/blog")&&!l.startsWith("/jobs"),h=l.startsWith("/blog")||l.startsWith("/jobs"),p=l.startsWith("/blog"),m=l.startsWith("/jobs");return(0,e.jsx)(e.Fragment,{children:(0,e.jsxs)("footer",{className:"mob-footer-nav d-lg-none",children:[u&&(0,e.jsx)("div",{className:"footer-lists-btn","data-bs-toggle":"offcanvas","data-bs-target":"#commonOffcanvas","aria-controls":"commonOffcanvas",children:(0,e.jsx)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 20 20",fill:"none",children:(0,e.jsx)("path",{d:"M9.16228 3.9V7.13333C9.16229 7.40106 9.10942 7.66615 9.00671 7.91339C8.90401 8.16063 8.75349 8.38515 8.56379 8.57407C8.37409 8.76299 8.14896 8.91259 7.9013 9.01429C7.65364 9.11598 7.38834 9.16776 7.12062 9.16667H3.90395C3.63695 9.16829 3.37237 9.11598 3.12608 9.01288C2.87978 8.90978 2.65684 8.75801 2.47062 8.56667C2.28155 8.37917 2.13182 8.1558 2.03022 7.90967C1.92862 7.66354 1.87719 7.3996 1.87895 7.13333V3.90833C1.87895 3.3705 2.09203 2.85457 2.47155 2.47349C2.85107 2.0924 3.36612 1.8772 3.90395 1.875H7.12895C7.39567 1.87526 7.65969 1.92842 7.90572 2.03141C8.15176 2.1344 8.37492 2.28517 8.56228 2.475C8.75186 2.66082 8.90254 2.88252 9.00556 3.12717C9.10857 3.37183 9.16185 3.63454 9.16228 3.9ZM18.1206 3.90833V7.13333C18.1163 7.66983 17.9018 8.18325 17.5232 8.56341C17.1446 8.94356 16.6321 9.16014 16.0956 9.16667H12.8623C12.3233 9.16337 11.8065 8.95129 11.4206 8.575C11.232 8.38541 11.0827 8.16048 10.9812 7.9131C10.8797 7.66571 10.8279 7.40074 10.8289 7.13333V3.90833C10.8283 3.64147 10.881 3.37718 10.9841 3.13102C11.0871 2.88485 11.2384 2.6618 11.4289 2.475C11.6163 2.28517 11.8395 2.1344 12.0855 2.03141C12.3315 1.92842 12.5956 1.87526 12.8623 1.875H16.0873C16.6252 1.87936 17.1399 2.09498 17.5203 2.47536C17.9006 2.85575 18.1163 3.37041 18.1206 3.90833ZM18.1206 12.8667V16.0917C18.1163 16.6282 17.9018 17.1416 17.5232 17.5217C17.1446 17.9019 16.6321 18.1185 16.0956 18.125H12.8623C12.3199 18.1305 11.7967 17.9242 11.4039 17.55C11.2146 17.361 11.0648 17.1361 10.9632 16.8886C10.8617 16.6411 10.8103 16.3759 10.8123 16.1083V12.8833C10.8116 12.6165 10.8643 12.3522 10.9674 12.106C11.0704 11.8599 11.2217 11.6368 11.4123 11.45C11.5996 11.2602 11.8228 11.1094 12.0688 11.0064C12.3149 10.9034 12.5789 10.8503 12.8456 10.85H16.0706C16.6085 10.8544 17.1232 11.07 17.5036 11.4504C17.884 11.8307 18.0996 12.3454 18.1039 12.8833L18.1206 12.8667ZM9.16228 12.875V16.1C9.15573 16.6379 8.93799 17.1517 8.55605 17.5305C8.17411 17.9093 7.65856 18.1229 7.12062 18.125H3.90395C3.63771 18.1261 3.3739 18.0745 3.12771 17.9731C2.88153 17.8717 2.65786 17.7226 2.4696 17.5343C2.28134 17.3461 2.13222 17.1224 2.03085 16.8762C1.92947 16.6301 1.87785 16.3662 1.87895 16.1V12.875C1.8811 12.3371 2.09461 11.8215 2.47344 11.4396C2.85226 11.0576 3.36604 10.8399 3.90395 10.8333H7.12895C7.66912 10.8389 8.18602 11.054 8.57062 11.4333C8.95069 11.8168 9.16343 12.3351 9.16228 12.875Z",fill:"white"})})}),d&&(0,e.jsxs)(o.default,{prefetch:!1,href:"/resume/resume-type",className:"footer-lists-btn","aria-label":"Create resume",title:"Create resume",children:[(0,e.jsx)("span",{style:{position:"absolute",width:"1px",height:"1px",padding:0,margin:"-1px",overflow:"hidden",clip:"rect(0, 0, 0, 0)",whiteSpace:"nowrap",border:0},children:"Create resume"}),(0,e.jsxs)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"white",strokeWidth:"2.5",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("line",{x1:"12",y1:"5",x2:"12",y2:"19"}),(0,e.jsx)("line",{x1:"5",y1:"12",x2:"19",y2:"12"})]})]}),h&&(0,e.jsx)("div",{className:"footer-lists-btn","data-bs-toggle":"offcanvas","data-bs-target":"#BlogsOffcanvas","aria-controls":"commonOffcanvas",children:(0,e.jsx)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 20 20",fill:"none",children:(0,e.jsx)("path",{d:"M9.16228 3.9V7.13333C9.16229 7.40106 9.10942 7.66615 9.00671 7.91339C8.90401 8.16063 8.75349 8.38515 8.56379 8.57407C8.37409 8.76299 8.14896 8.91259 7.9013 9.01429C7.65364 9.11598 7.38834 9.16776 7.12062 9.16667H3.90395C3.63695 9.16829 3.37237 9.11598 3.12608 9.01288C2.87978 8.90978 2.65684 8.75801 2.47062 8.56667C2.28155 8.37917 2.13182 8.1558 2.03022 7.90967C1.92862 7.66354 1.87719 7.3996 1.87895 7.13333V3.90833C1.87895 3.3705 2.09203 2.85457 2.47155 2.47349C2.85107 2.0924 3.36612 1.8772 3.90395 1.875H7.12895C7.39567 1.87526 7.65969 1.92842 7.90572 2.03141C8.15176 2.1344 8.37492 2.28517 8.56228 2.475C8.75186 2.66082 8.90254 2.88252 9.00556 3.12717C9.10857 3.37183 9.16185 3.63454 9.16228 3.9ZM18.1206 3.90833V7.13333C18.1163 7.66983 17.9018 8.18325 17.5232 8.56341C17.1446 8.94356 16.6321 9.16014 16.0956 9.16667H12.8623C12.3233 9.16337 11.8065 8.95129 11.4206 8.575C11.232 8.38541 11.0827 8.16048 10.9812 7.9131C10.8797 7.66571 10.8279 7.40074 10.8289 7.13333V3.90833C10.8283 3.64147 10.881 3.37718 10.9841 3.13102C11.0871 2.88485 11.2384 2.6618 11.4289 2.475C11.6163 2.28517 11.8395 2.1344 12.0855 2.03141C12.3315 1.92842 12.5956 1.87526 12.8623 1.875H16.0873C16.6252 1.87936 17.1399 2.09498 17.5203 2.47536C17.9006 2.85575 18.1163 3.37041 18.1206 3.90833ZM18.1206 12.8667V16.0917C18.1163 16.6282 17.9018 17.1416 17.5232 17.5217C17.1446 17.9019 16.6321 18.1185 16.0956 18.125H12.8623C12.3199 18.1305 11.7967 17.9242 11.4039 17.55C11.2146 17.361 11.0648 17.1361 10.9632 16.8886C10.8617 16.6411 10.8103 16.3759 10.8123 16.1083V12.8833C10.8116 12.6165 10.8643 12.3522 10.9674 12.106C11.0704 11.8599 11.2217 11.6368 11.4123 11.45C11.5996 11.2602 11.8228 11.1094 12.0688 11.0064C12.3149 10.9034 12.5789 10.8503 12.8456 10.85H16.0706C16.6085 10.8544 17.1232 11.07 17.5036 11.4504C17.884 11.8307 18.0996 12.3454 18.1039 12.8833L18.1206 12.8667ZM9.16228 12.875V16.1C9.15573 16.6379 8.93799 17.1517 8.55605 17.5305C8.17411 17.9093 7.65856 18.1229 7.12062 18.125H3.90395C3.63771 18.1261 3.3739 18.0745 3.12771 17.9731C2.88153 17.8717 2.65786 17.7226 2.4696 17.5343C2.28134 17.3461 2.13222 17.1224 2.03085 16.8762C1.92947 16.6301 1.87785 16.3662 1.87895 16.1V12.875C1.8811 12.3371 2.09461 11.8215 2.47344 11.4396C2.85226 11.0576 3.36604 10.8399 3.90395 10.8333H7.12895C7.66912 10.8389 8.18602 11.054 8.57062 11.4333C8.95069 11.8168 9.16343 12.3351 9.16228 12.875Z",fill:"white"})})}),(0,e.jsx)("div",{className:"footer-main-div",children:(0,e.jsxs)("div",{className:"footer-all-tab",children:[(0,e.jsx)(o.default,{prefetch:!1,href:"/resume",children:(0,e.jsx)("div",{className:i(f),children:(0,e.jsxs)("div",{children:[(0,e.jsxs)("svg",{width:"32",height:"32",viewBox:"0 0 32 32",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:[(0,e.jsx)("path",{d:"M26.5406 1H5.31708C3.48766 1 2 2.34562 2 3.99973V28.0009C2 29.6545 3.48748 31 5.31708 31H26.5406C28.3697 31 29.8571 29.6545 29.8571 28.0009V4.00073C29.8581 2.34644 28.3708 1 26.5406 1ZM28.5313 28.0009C28.5313 28.9938 27.6384 29.8011 26.5406 29.8011H5.31708C4.21968 29.8011 3.32731 28.9938 3.32731 28.0009V4.00073C3.32731 3.00799 4.21968 2.20072 5.31708 2.20072H26.5406C27.6375 2.20072 28.5298 3.00799 28.5298 4.00073V28.0011H28.5313V28.0009Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M23.1595 15.9922H8.69938C8.35135 15.9922 8.07031 16.2744 8.07031 16.6224C8.07031 16.9702 8.35135 17.2526 8.69938 17.2526H23.1593C23.5078 17.2526 23.7888 16.9704 23.7888 16.6224C23.789 16.2745 23.5078 15.9922 23.1595 15.9922Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M23.1595 18.8633H8.69938C8.35135 18.8633 8.07031 19.146 8.07031 19.494C8.07031 19.8421 8.35135 20.1235 8.69938 20.1235H23.1593C23.5078 20.1235 23.7888 19.8421 23.7888 19.494C23.788 19.1441 23.5078 18.8633 23.1595 18.8633Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M23.1595 21.7344H8.69938C8.35135 21.7344 8.07031 22.0171 8.07031 22.3648C8.07031 22.7128 8.35135 22.9946 8.69938 22.9946H23.1593C23.5078 22.9946 23.7888 22.7128 23.7888 22.3648C23.789 22.0171 23.5078 21.7344 23.1595 21.7344Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M23.1593 24.6055H15.9286C15.5812 24.6055 15.2988 24.8871 15.2988 25.2351C15.2988 25.5831 15.5812 25.8659 15.9286 25.8659H23.1591C23.5075 25.8659 23.7876 25.5831 23.7876 25.2351C23.7876 24.8871 23.5075 24.6055 23.1593 24.6055Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M16.6312 13.2213C16.6312 12.0294 15.259 10.4217 13.4066 9.95201C14.1805 9.43157 14.7138 8.40376 14.7138 7.47814C14.7138 6.1727 13.6566 5.11328 12.35 5.11328C11.045 5.11328 9.98632 6.1727 9.98632 7.47814C9.98632 8.40281 10.5196 9.43062 11.2918 9.95201C9.44204 10.4215 8.06885 12.0303 8.06885 13.2213C8.07036 14.6297 16.6312 14.6297 16.6312 13.2213ZM12.1595 10.638H12.1487L11.7573 10.1886C11.9486 10.2563 12.1438 10.2978 12.3502 10.2978C12.5571 10.2978 12.7524 10.2575 12.9433 10.1895L12.5508 10.6378H12.5416L13.5516 13.0782L12.3502 14.2765L11.1502 13.0782L12.1595 10.638Z",fill:"#cc0000"})]}),(0,e.jsxs)("p",{children:["Resume ",(0,e.jsx)("span",{className:"d-none d-sm-inline",children:"/ CVs"})]})]})})}),(0,e.jsx)(o.default,{prefetch:!1,href:"/tools",children:(0,e.jsx)("div",{className:i(c),children:(0,e.jsxs)("div",{children:[(0,e.jsxs)("svg",{width:"32",height:"32",viewBox:"0 0 32 32",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:[(0,e.jsx)("path",{d:"M5.91019 11.8175C7.39082 10.5794 8.61913 11.4332 10.2585 13.4757C10.4426 13.7062 10.6901 13.4364 10.8314 13.3049C10.9726 13.1734 13.134 11.0763 13.2404 10.9807C13.3451 10.8799 13.4721 10.6921 13.3054 10.482C12.904 9.9478 12.5109 9.40637 12.1263 8.85797C9.25709 4.81915 19.9754 2.07993 18.3298 2.03724C17.4918 2.01333 14.1307 1.97064 13.6276 2.03041C11.5915 2.26095 9.03492 4.30854 7.74789 5.26317C6.06412 6.50299 5.43568 7.23049 5.33253 7.33124C4.85644 7.77867 5.25636 8.81186 4.39305 9.62645C3.48055 10.4854 2.91083 9.8348 2.38237 10.3335C2.12052 10.5828 1.38734 11.1737 1.17786 11.3701C0.987353 11.5504 0.937769 11.8421 1.08863 12.0943C1.12206 12.1502 1.16444 12.1981 1.20637 12.2479C1.54533 12.6509 3.16811 14.5806 3.31868 14.7702C3.48531 14.9785 3.93918 15.1595 4.21848 14.8914C4.49938 14.625 5.22144 13.947 5.34205 13.8275C5.46584 13.7148 5.26271 12.3571 5.91019 11.8175ZM14.9686 12.7004C14.7781 12.463 14.5417 12.4562 14.3385 12.6509L12.0628 14.789C11.9753 14.875 11.922 14.994 11.9141 15.1213C11.9061 15.2485 11.944 15.3742 12.02 15.4721L23.0999 28.9991C23.2855 29.2287 23.4836 29.7164 23.7541 29.9141C24.1487 30.2024 24.6195 29.6528 25.0499 29.4213L25.1663 29.3586C25.5196 29.1685 26.0246 28.722 26.2977 28.4281V28.4281C26.8717 27.8104 26.7654 27.2774 26.1478 26.7032C25.9353 26.5056 25.7525 26.3393 25.6999 26.2737L14.9686 12.7004Z",stroke:"#001691",strokeWidth:"1.5"}),(0,e.jsx)("path",{d:"M2.10471 26.5926C2.11511 26.3367 2.22376 26.0969 2.40716 25.925L11.5 18.4996L14 21.5006L5.29002 28.9891C4.90695 29.3444 4.31706 29.4687 3.96466 29.0699L2.35155 27.2926C2.18297 27.0999 2.0943 26.8484 2.10471 26.5926Z",stroke:"#cc0000",strokeWidth:"1.5"}),(0,e.jsx)("path",{d:"M30.0276 6.50891C30.2482 6.21849 30.6406 6.10529 30.6973 6.85275C30.7556 7.60037 30.6684 10.455 29.8528 11.7288C28.9436 13.1548 27.5506 13.9279 25.159 13.1217C24.0432 12.7428 22.7479 13.184 22.1184 13.7119L20.4999 15.4999L17.9999 12.4999L19.7976 11.3717C21.5665 9.88482 20.8481 8.12346 21.441 6.30082C22.0212 4.50837 25.3394 3.56618 25.8887 3.37798C26.4365 3.18963 26.549 3.78987 26.4019 3.97698C26.255 4.1611 25.2202 5.66393 24.8795 6.20285C24.5405 6.73894 23.8852 7.51934 25.5069 8.90772C27.0633 10.2442 28.0303 9.15897 28.4309 8.60086C28.8349 8.03711 29.8068 6.80231 30.0276 6.50891Z",stroke:"#cc0000",strokeWidth:"1.5"})]}),(0,e.jsx)("p",{children:"Tools"})]})})}),(0,e.jsx)(o.default,{prefetch:!1,href:"/jobs",children:(0,e.jsx)("div",{className:i(m),children:(0,e.jsxs)("div",{children:[(0,e.jsxs)("svg",{width:"32",height:"32",viewBox:"0 0 32 32",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:[(0,e.jsx)("path",{d:"M29.7183 8.97656H28.1886V9.93656H29.7183C29.9768 9.93656 30.0743 10.2164 30.0743 10.475V23.1396C30.0743 24.4327 29.1352 25.3994 27.842 25.3994H18.4608C17.6848 25.3994 16.9429 26.1161 16.9429 26.892V27.0451H15.0571V26.892C15.0571 26.1161 14.5461 25.3994 13.7702 25.3994H4.38897C3.09585 25.3994 1.92571 24.4327 1.92571 23.1396V10.475C1.92571 10.2164 2.25417 9.93656 2.51275 9.93656H3.81143V8.97656H2.51275C1.7368 8.97656 1 9.69896 1 10.475V23.1396C1 24.9501 2.57848 26.3251 4.38897 26.3251H13.7702C14.0288 26.3251 14.1314 26.6335 14.1314 26.892V27.1266C14.1314 27.6439 14.66 27.9708 15.1774 27.9708H17.0536C17.571 27.9708 17.8686 27.6439 17.8686 27.1266V26.892C17.8686 26.6335 18.2022 26.3251 18.4608 26.3251H27.842C29.6525 26.3251 31 24.9501 31 23.1396V10.475C31 9.699 30.4942 8.97656 29.7183 8.97656Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M8.02881 8.97656H13.6517V9.93656H8.02881V8.97656ZM8.02881 11.1023H13.6517V12.028H8.02881V11.1023ZM8.02881 13.1937H13.6517V14.1537H8.02881V13.1937ZM18.3488 8.97656H23.9717V9.93656H18.3488V8.97656ZM18.3488 11.1023H23.9717V12.028H18.3488V11.1023ZM18.3488 13.1937H23.9717V14.1537H18.3488V13.1937Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M27.1385 7.12571H26.543V6.95758C26.543 5.92304 25.8278 5 24.7932 5H19.1645C17.8609 5 16.7233 5.71424 16.1156 6.77031C15.5078 5.71424 14.3702 5 13.0667 5H7.43798C6.40344 5 5.45726 5.92301 5.45726 6.95758V7.12571H5.0927C4.18755 7.12571 3.33154 8.03381 3.33154 9.06834V21.733C3.33154 23.0261 4.45049 23.9943 5.67902 23.9943H14.2394C15.0153 23.9943 15.6466 24.68 15.6466 25.4H16.5847C16.5847 24.68 17.2159 23.9943 17.9919 23.9943H26.5522C27.7808 23.9943 28.6687 23.0261 28.6687 21.733V9.06834C28.6686 8.03381 28.0436 7.12571 27.1385 7.12571ZM19.1645 5.92571H24.7932C25.3106 5.92571 25.6172 6.44017 25.6172 6.95758V20.3258C25.6172 20.8432 25.3106 21.1829 24.7932 21.1829H19.1645C18.1447 21.1829 17.1829 21.7027 16.4629 22.3981V8.59928C16.4629 7.17677 17.7419 5.92571 19.1645 5.92571ZM6.38294 6.95758C6.38294 6.44021 6.92057 5.92571 7.43794 5.92571H13.0667C14.4892 5.92571 15.5372 7.17673 15.5372 8.59928V22.3926C15.0572 21.6989 14.0849 21.1829 13.0667 21.1829H7.43798C6.92061 21.1829 6.38297 20.8432 6.38297 20.3258V6.95758H6.38294ZM5.67898 23.0686C4.96783 23.0686 4.25722 22.5089 4.25722 21.733V9.06834C4.25722 8.55989 4.7113 8.05143 5.09266 8.05143H5.45722V20.3258C5.45722 21.3603 6.40341 22.1086 7.43794 22.1086H13.0667C13.9619 22.1086 14.7514 22.5782 15.2142 23.2726C14.9169 23.1359 14.5874 23.0686 14.2393 23.0686H5.67898ZM27.7086 21.733C27.7086 22.5089 27.2633 23.0686 26.5522 23.0686H17.9918C17.6437 23.0686 17.3143 23.1359 17.0169 23.2726C17.4797 22.5782 18.2692 22.1086 19.1644 22.1086H24.7932C25.8277 22.1086 26.5429 21.3603 26.5429 20.3258V8.05143H27.1384C27.5198 8.05143 27.7086 8.55989 27.7086 9.06834V21.733H27.7086Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M13.6517 17.6627C13.6517 17.9217 13.4417 18.1317 13.1826 18.1317H8.49787C8.23881 18.1317 8.02881 17.9217 8.02881 17.6627V15.7894C8.02881 15.5303 8.23881 15.3203 8.49787 15.3203H13.1826C13.4417 15.3203 13.6517 15.5303 13.6517 15.7894V17.6627ZM23.9717 17.6627C23.9717 17.9217 23.7617 18.1317 23.5026 18.1317H18.8179C18.5588 18.1317 18.3488 17.9217 18.3488 17.6627V15.7894C18.3488 15.5303 18.5588 15.3203 18.8179 15.3203H23.5026C23.7617 15.3203 23.9717 15.5303 23.9717 15.7894V17.6627Z",fill:"#E0E0E0"})]}),(0,e.jsx)("p",{children:"Jobs"})]})})}),(0,e.jsx)(o.default,{prefetch:!1,href:"/blog",children:(0,e.jsx)("div",{className:i(p),children:(0,e.jsxs)("div",{children:[(0,e.jsxs)("svg",{width:"32",height:"32",viewBox:"0 0 32 32",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:[(0,e.jsx)("path",{d:"M5.17321 24.0616C4.49775 24.0616 3.93421 23.8353 3.4826 23.3827C3.03098 22.9301 2.80469 22.3666 2.80371 21.6921V7.36804C2.80371 6.69355 3.03001 6.13001 3.4826 5.67742C3.93519 5.22483 4.49824 4.99903 5.17175 5H26.8286C27.5031 5 28.0662 5.22581 28.5178 5.67742C28.9694 6.12904 29.1957 6.69257 29.1967 7.36804V21.6936C29.1967 22.368 28.9704 22.9311 28.5178 23.3827C28.0652 23.8343 27.5017 24.0606 26.8272 24.0616H5.17321ZM5.17321 22.5953H26.8286C27.0535 22.5953 27.2602 22.501 27.4489 22.3123C27.6375 22.1237 27.7314 21.9169 27.7304 21.6921V7.36804C27.7304 7.14321 27.6366 6.93646 27.4489 6.7478C27.2602 6.55914 27.053 6.46481 26.8272 6.46481H5.17321C4.94741 6.46481 4.74017 6.55914 4.55151 6.7478C4.36383 6.93549 4.26999 7.14223 4.26999 7.36804V21.6936C4.26999 21.9184 4.36383 22.1246 4.55151 22.3123C4.73919 22.5 4.94594 22.5943 5.17175 22.5953",fill:"#001691"}),(0,e.jsx)("path",{d:"M1 25.5273V26.9936H31V25.5273H1Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M7.19398 12.2539V9.33487L6.07182 10.4606L5.79483 10.1871L7.38929 8.59624L8.9802 10.1871L8.71032 10.4606L7.58461 9.33487V12.2539H7.19398Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M12.4616 12.2539L12.1882 11.984L13.3139 10.8583H10.3984V10.4677H13.3139L12.1882 9.34553L12.4616 9.07209L14.0526 10.663L12.4616 12.2539Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M20.7477 12.7085V8.163H21.0389V12.7085H20.7477ZM21.7278 9.52663C21.7065 9.34671 21.6201 9.20703 21.4686 9.1076C21.3171 9.00817 21.1312 8.95845 20.911 8.95845C20.7501 8.95845 20.6092 8.98449 20.4885 9.03658C20.3689 9.08866 20.2754 9.16027 20.2079 9.25142C20.1416 9.34257 20.1085 9.44614 20.1085 9.56214C20.1085 9.65921 20.1316 9.74266 20.1777 9.8125C20.2251 9.88116 20.2855 9.93857 20.3588 9.98473C20.4322 10.0297 20.5092 10.067 20.5897 10.0966C20.6702 10.125 20.7441 10.1481 20.8116 10.1658L21.1809 10.2653C21.2756 10.2901 21.381 10.3245 21.497 10.3683C21.6142 10.4121 21.726 10.4718 21.8326 10.5476C21.9403 10.6222 22.0291 10.718 22.0989 10.8352C22.1687 10.9524 22.2037 11.0962 22.2037 11.2667C22.2037 11.4632 22.1522 11.6407 22.0492 11.7994C21.9474 11.958 21.7982 12.084 21.6017 12.1776C21.4064 12.2711 21.1691 12.3178 20.8897 12.3178C20.6293 12.3178 20.4038 12.2758 20.2132 12.1918C20.0239 12.1077 19.8747 11.9905 19.7658 11.8402C19.6581 11.6899 19.5971 11.5153 19.5829 11.3164H20.0375C20.0493 11.4537 20.0955 11.5674 20.176 11.6573C20.2576 11.7461 20.3606 11.8124 20.4849 11.8562C20.6104 11.8988 20.7453 11.9201 20.8897 11.9201C21.0578 11.9201 21.2087 11.8929 21.3425 11.8384C21.4763 11.7828 21.5822 11.7058 21.6603 11.6076C21.7385 11.5082 21.7775 11.3922 21.7775 11.2596C21.7775 11.1388 21.7438 11.0406 21.6763 10.9648C21.6088 10.8891 21.5201 10.8275 21.41 10.7802C21.2999 10.7328 21.1809 10.6914 21.0531 10.6559L20.6056 10.5281C20.3216 10.4464 20.0967 10.3298 19.9309 10.1783C19.7652 10.0268 19.6824 9.82848 19.6824 9.58345C19.6824 9.37985 19.7374 9.2023 19.8475 9.05078C19.9587 8.89808 20.1079 8.77971 20.2949 8.69567C20.4831 8.61044 20.6932 8.56783 20.9252 8.56783C21.1596 8.56783 21.368 8.60985 21.5502 8.69389C21.7325 8.77675 21.877 8.89039 21.9835 9.0348C22.0912 9.17921 22.148 9.34316 22.1539 9.52663H21.7278Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M23.8083 12.2539V8.61754H24.0995V12.2539H23.8083ZM23.9788 11.8455C23.7231 11.8455 23.5029 11.7852 23.3183 11.6644C23.1336 11.5437 22.9916 11.3774 22.8921 11.1655C22.7927 10.9536 22.743 10.7115 22.743 10.4393C22.743 10.1623 22.7939 9.91785 22.8957 9.70597C22.9987 9.4929 23.1419 9.32659 23.3254 9.20703C23.51 9.08629 23.7255 9.02592 23.9717 9.02592C24.1634 9.02592 24.3363 9.06143 24.4901 9.13246C24.644 9.20348 24.7701 9.30291 24.8683 9.43075C24.9666 9.55859 25.0276 9.70774 25.0512 9.8782H24.6322C24.6002 9.75391 24.5292 9.64382 24.4191 9.54794C24.3102 9.45088 24.1634 9.40234 23.9788 9.40234C23.8154 9.40234 23.6722 9.44496 23.5491 9.53018C23.4272 9.61423 23.3319 9.73319 23.2632 9.88707C23.1958 10.0398 23.162 10.2191 23.162 10.4251C23.162 10.6358 23.1952 10.8192 23.2615 10.9755C23.3289 11.1317 23.4236 11.2531 23.5455 11.3395C23.6686 11.4259 23.8131 11.4691 23.9788 11.4691C24.0877 11.4691 24.1865 11.4502 24.2753 11.4123C24.3641 11.3744 24.4392 11.32 24.5008 11.2489C24.5624 11.1779 24.6061 11.0927 24.6322 10.9933H25.0512C25.0276 11.1542 24.969 11.2992 24.8754 11.4283C24.7831 11.5561 24.6606 11.6579 24.5079 11.7337C24.3564 11.8082 24.18 11.8455 23.9788 11.8455Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M6.69203 18.8555H6.23038L7.56561 15.2191H8.02015L9.35538 18.8555H8.89373L7.80708 15.7944H7.77868L6.69203 18.8555ZM6.86248 17.435H8.72328V17.8256H6.86248V17.435Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M10.9729 18.9123C10.7267 18.9123 10.5107 18.8537 10.3248 18.7365C10.1402 18.6193 9.99577 18.4554 9.8916 18.2447C9.78862 18.034 9.73713 17.7878 9.73713 17.506C9.73713 17.2219 9.78862 16.974 9.8916 16.7621C9.99577 16.5502 10.1402 16.3857 10.3248 16.2685C10.5107 16.1513 10.7267 16.0927 10.9729 16.0927C11.2191 16.0927 11.4346 16.1513 11.6192 16.2685C11.8051 16.3857 11.9495 16.5502 12.0525 16.7621C12.1566 16.974 12.2087 17.2219 12.2087 17.506C12.2087 17.7878 12.1566 18.034 12.0525 18.2447C11.9495 18.4554 11.8051 18.6193 11.6192 18.7365C11.4346 18.8537 11.2191 18.9123 10.9729 18.9123ZM10.9729 18.5359C11.1599 18.5359 11.3138 18.4879 11.4346 18.392C11.5553 18.2962 11.6447 18.1701 11.7027 18.0138C11.7607 17.8576 11.7897 17.6883 11.7897 17.506C11.7897 17.3237 11.7607 17.1539 11.7027 16.9964C11.6447 16.839 11.5553 16.7118 11.4346 16.6147C11.3138 16.5176 11.1599 16.4691 10.9729 16.4691C10.7859 16.4691 10.632 16.5176 10.5113 16.6147C10.3905 16.7118 10.3012 16.839 10.2432 16.9964C10.1852 17.1539 10.1562 17.3237 10.1562 17.506C10.1562 17.6883 10.1852 17.8576 10.2432 18.0138C10.3012 18.1701 10.3905 18.2962 10.5113 18.392C10.632 18.4879 10.7859 18.5359 10.9729 18.5359ZM10.4616 15.6737C10.387 15.6737 10.3207 15.6452 10.2627 15.5884C10.2059 15.5304 10.1775 15.4641 10.1775 15.3896C10.1775 15.3079 10.2059 15.2404 10.2627 15.1871C10.3207 15.1327 10.387 15.1055 10.4616 15.1055C10.5432 15.1055 10.6107 15.1327 10.664 15.1871C10.7184 15.2404 10.7456 15.3079 10.7456 15.3896C10.7456 15.4641 10.7184 15.5304 10.664 15.5884C10.6107 15.6452 10.5432 15.6737 10.4616 15.6737ZM11.4843 15.6737C11.4097 15.6737 11.3434 15.6452 11.2854 15.5884C11.2286 15.5304 11.2002 15.4641 11.2002 15.3896C11.2002 15.3079 11.2286 15.2404 11.2854 15.1871C11.3434 15.1327 11.4097 15.1055 11.4843 15.1055C11.566 15.1055 11.6334 15.1327 11.6867 15.1871C11.7412 15.2404 11.7684 15.3079 11.7684 15.3896C11.7684 15.4641 11.7412 15.5304 11.6867 15.5884C11.6334 15.6452 11.566 15.6737 11.4843 15.6737Z",fill:"#001691"}),(0,e.jsx)("path",{d:"M19.3297 18.1737V17.9819C19.3297 17.8493 19.3569 17.728 19.4114 17.6179C19.467 17.5066 19.5475 17.4179 19.6529 17.3516C19.7594 17.2841 19.8884 17.2504 20.04 17.2504C20.1938 17.2504 20.3229 17.2841 20.427 17.3516C20.5312 17.4179 20.6099 17.5066 20.6632 17.6179C20.7164 17.728 20.7431 17.8493 20.7431 17.9819V18.1737C20.7431 18.3062 20.7158 18.4281 20.6614 18.5394C20.6081 18.6495 20.5288 18.7383 20.4235 18.8058C20.3193 18.872 20.1915 18.9052 20.04 18.9052C19.8861 18.9052 19.7565 18.872 19.6511 18.8058C19.5458 18.7383 19.4658 18.6495 19.4114 18.5394C19.3569 18.4281 19.3297 18.3062 19.3297 18.1737ZM19.6919 17.9819V18.1737C19.6919 18.2837 19.718 18.3826 19.7701 18.4702C19.8221 18.5566 19.9121 18.5998 20.04 18.5998C20.1642 18.5998 20.2518 18.5566 20.3027 18.4702C20.3548 18.3826 20.3809 18.2837 20.3809 18.1737V17.9819C20.3809 17.8718 20.356 17.7736 20.3063 17.6871C20.2566 17.5996 20.1678 17.5558 20.04 17.5558C19.9157 17.5558 19.8263 17.5996 19.7718 17.6871C19.7186 17.7736 19.6919 17.8718 19.6919 17.9819ZM17.5186 16.0927V15.9009C17.5186 15.7683 17.5459 15.647 17.6003 15.5369C17.656 15.4257 17.7364 15.3369 17.8418 15.2706C17.9483 15.2031 18.0774 15.1694 18.2289 15.1694C18.3828 15.1694 18.5118 15.2031 18.6159 15.2706C18.7201 15.3369 18.7988 15.4257 18.8521 15.5369C18.9054 15.647 18.932 15.7683 18.932 15.9009V16.0927C18.932 16.2253 18.9048 16.3472 18.8503 16.4585C18.7971 16.5685 18.7177 16.6573 18.6124 16.7248C18.5082 16.7911 18.3804 16.8242 18.2289 16.8242C18.075 16.8242 17.9454 16.7911 17.84 16.7248C17.7347 16.6573 17.6548 16.5685 17.6003 16.4585C17.5459 16.3472 17.5186 16.2253 17.5186 16.0927ZM17.8809 15.9009V16.0927C17.8809 16.2028 17.9069 16.3016 17.959 16.3892C18.0111 16.4756 18.101 16.5188 18.2289 16.5188C18.3532 16.5188 18.4408 16.4756 18.4917 16.3892C18.5437 16.3016 18.5698 16.2028 18.5698 16.0927V15.9009C18.5698 15.7908 18.5449 15.6926 18.4952 15.6062C18.4455 15.5186 18.3567 15.4748 18.2289 15.4748C18.1046 15.4748 18.0152 15.5186 17.9608 15.6062C17.9075 15.6926 17.8809 15.7908 17.8809 15.9009ZM17.6536 18.8555L20.1536 15.2191H20.5584L18.0584 18.8555H17.6536Z",fill:"#cc0000"}),(0,e.jsx)("path",{d:"M22.611 18.2163V15.8725H23.0087V18.2163H22.611ZM21.638 17.2433V16.8455H23.9817V17.2433H21.638Z",fill:"#001691"})]}),(0,e.jsx)("p",{children:"Blog"})]})})})]})})]})})}])},1805,t=>{"use strict";var e=t.i(43476),r=t.i(22016);t.s(["default",0,function(){return(0,e.jsxs)("footer",{className:"rk-footer",children:[(0,e.jsxs)("div",{className:"container-fluid custom-container rk-footer-inner",children:[(0,e.jsxs)("div",{className:"rk-footer-brand",children:[(0,e.jsx)("div",{className:"rk-logo",children:(0,e.jsx)("img",{src:"/front-assets/images/logo/logo.svg",className:"img-fluid nav-logo",width:200,height:35,alt:"ResumeSathi"})}),(0,e.jsx)("p",{className:"rk-footer-tag",children:"Your data, always yours. Create resumes without signup or hidden fees."})]}),(0,e.jsxs)("div",{className:"rk-footer-cols",children:[(0,e.jsxs)("div",{className:"rk-footer-col",children:[(0,e.jsx)("div",{className:"rk-footer-col-title",children:"Product"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/tools",children:"Tools"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/typing",children:"Typing Practice"})]}),(0,e.jsxs)("div",{className:"rk-footer-col",children:[(0,e.jsx)("div",{className:"rk-footer-col-title",children:"Jobs"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/jobs",children:"Jobs"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/blog",children:"Career Tips"})]}),(0,e.jsxs)("div",{className:"rk-footer-col",children:[(0,e.jsx)("div",{className:"rk-footer-col-title",children:"Company"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/about",children:"About"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/terms-and-conditions",children:"Terms & Conditions"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/privacy-policy",children:"Privacy Policy"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/disclaimer",children:"Disclaimer"}),(0,e.jsx)(r.default,{prefetch:!1,href:"/contact",children:"Contact"})]})]})]}),(0,e.jsx)("div",{className:"rk-footer-bottom",children:(0,e.jsxs)("div",{className:"container-fluid custom-container rk-footer-bottom-inner",children:[(0,e.jsxs)("span",{children:["© ",new Date().getFullYear()," ResumeSathi · Your data never leaves your device"]}),(0,e.jsx)("span",{children:"Made with ♥ for every career"})]})})]})}])},67034,(t,e,r)=>{var o={675:function(t,e){"use strict";e.byteLength=function(t){var e=l(t),r=e[0],o=e[1];return(r+o)*3/4-o},e.toByteArray=function(t){var e,r,i=l(t),a=i[0],s=i[1],f=new n((a+s)*3/4-s),c=0,u=s>0?a-4:a;for(r=0;r<u;r+=4)e=o[t.charCodeAt(r)]<<18|o[t.charCodeAt(r+1)]<<12|o[t.charCodeAt(r+2)]<<6|o[t.charCodeAt(r+3)],f[c++]=e>>16&255,f[c++]=e>>8&255,f[c++]=255&e;return 2===s&&(e=o[t.charCodeAt(r)]<<2|o[t.charCodeAt(r+1)]>>4,f[c++]=255&e),1===s&&(e=o[t.charCodeAt(r)]<<10|o[t.charCodeAt(r+1)]<<4|o[t.charCodeAt(r+2)]>>2,f[c++]=e>>8&255,f[c++]=255&e),f},e.fromByteArray=function(t){for(var e,o=t.length,n=o%3,i=[],a=0,s=o-n;a<s;a+=16383)i.push(function(t,e,o){for(var n,i=[],a=e;a<o;a+=3)n=(t[a]<<16&0xff0000)+(t[a+1]<<8&65280)+(255&t[a+2]),i.push(r[n>>18&63]+r[n>>12&63]+r[n>>6&63]+r[63&n]);return i.join("")}(t,a,a+16383>s?s:a+16383));return 1===n?i.push(r[(e=t[o-1])>>2]+r[e<<4&63]+"=="):2===n&&i.push(r[(e=(t[o-2]<<8)+t[o-1])>>10]+r[e>>4&63]+r[e<<2&63]+"="),i.join("")};for(var r=[],o=[],n="u">typeof Uint8Array?Uint8Array:Array,i="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",a=0,s=i.length;a<s;++a)r[a]=i[a],o[i.charCodeAt(a)]=a;function l(t){var e=t.length;if(e%4>0)throw Error("Invalid string. Length must be a multiple of 4");var r=t.indexOf("=");-1===r&&(r=e);var o=r===e?0:4-r%4;return[r,o]}o[45]=62,o[95]=63},72:function(t,e,r){"use strict";var o=r(675),n=r(783),i="function"==typeof Symbol&&"function"==typeof Symbol.for?Symbol.for("nodejs.util.inspect.custom"):null;function a(t){if(t>0x7fffffff)throw RangeError('The value "'+t+'" is invalid for option "size"');var e=new Uint8Array(t);return Object.setPrototypeOf(e,s.prototype),e}function s(t,e,r){if("number"==typeof t){if("string"==typeof e)throw TypeError('The "string" argument must be of type string. Received type number');return c(t)}return l(t,e,r)}function l(t,e,r){if("string"==typeof t){var o=t,n=e;if(("string"!=typeof n||""===n)&&(n="utf8"),!s.isEncoding(n))throw TypeError("Unknown encoding: "+n);var i=0|h(o,n),l=a(i),f=l.write(o,n);return f!==i&&(l=l.slice(0,f)),l}if(ArrayBuffer.isView(t))return u(t);if(null==t)throw TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object. Received type "+typeof t);if(N(t,ArrayBuffer)||t&&N(t.buffer,ArrayBuffer)||"u">typeof SharedArrayBuffer&&(N(t,SharedArrayBuffer)||t&&N(t.buffer,SharedArrayBuffer)))return function(t,e,r){var o;if(e<0||t.byteLength<e)throw RangeError('"offset" is outside of buffer bounds');if(t.byteLength<e+(r||0))throw RangeError('"length" is outside of buffer bounds');return Object.setPrototypeOf(o=void 0===e&&void 0===r?new Uint8Array(t):void 0===r?new Uint8Array(t,e):new Uint8Array(t,e,r),s.prototype),o}(t,e,r);if("number"==typeof t)throw TypeError('The "value" argument must not be of type number. Received type number');var c=t.valueOf&&t.valueOf();if(null!=c&&c!==t)return s.from(c,e,r);var p=function(t){if(s.isBuffer(t)){var e=0|d(t.length),r=a(e);return 0===r.length||t.copy(r,0,0,e),r}return void 0!==t.length?"number"!=typeof t.length||function(t){return t!=t}(t.length)?a(0):u(t):"Buffer"===t.type&&Array.isArray(t.data)?u(t.data):void 0}(t);if(p)return p;if("u">typeof Symbol&&null!=Symbol.toPrimitive&&"function"==typeof t[Symbol.toPrimitive])return s.from(t[Symbol.toPrimitive]("string"),e,r);throw TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object. Received type "+typeof t)}function f(t){if("number"!=typeof t)throw TypeError('"size" argument must be of type number');if(t<0)throw RangeError('The value "'+t+'" is invalid for option "size"')}function c(t){return f(t),a(t<0?0:0|d(t))}function u(t){for(var e=t.length<0?0:0|d(t.length),r=a(e),o=0;o<e;o+=1)r[o]=255&t[o];return r}e.Buffer=s,e.SlowBuffer=function(t){return+t!=t&&(t=0),s.alloc(+t)},e.INSPECT_MAX_BYTES=50,e.kMaxLength=0x7fffffff,s.TYPED_ARRAY_SUPPORT=function(){try{var t=new Uint8Array(1),e={foo:function(){return 42}};return Object.setPrototypeOf(e,Uint8Array.prototype),Object.setPrototypeOf(t,e),42===t.foo()}catch(t){return!1}}(),!s.TYPED_ARRAY_SUPPORT&&"u">typeof console&&"function"==typeof console.error&&console.error("This browser lacks typed array (Uint8Array) support which is required by `buffer` v5.x. Use `buffer` v4.x if you require old browser support."),Object.defineProperty(s.prototype,"parent",{enumerable:!0,get:function(){if(s.isBuffer(this))return this.buffer}}),Object.defineProperty(s.prototype,"offset",{enumerable:!0,get:function(){if(s.isBuffer(this))return this.byteOffset}}),s.poolSize=8192,s.from=function(t,e,r){return l(t,e,r)},Object.setPrototypeOf(s.prototype,Uint8Array.prototype),Object.setPrototypeOf(s,Uint8Array),s.alloc=function(t,e,r){return(f(t),t<=0)?a(t):void 0!==e?"string"==typeof r?a(t).fill(e,r):a(t).fill(e):a(t)},s.allocUnsafe=function(t){return c(t)},s.allocUnsafeSlow=function(t){return c(t)};function d(t){if(t>=0x7fffffff)throw RangeError("Attempt to allocate Buffer larger than maximum size: 0x7fffffff bytes");return 0|t}function h(t,e){if(s.isBuffer(t))return t.length;if(ArrayBuffer.isView(t)||N(t,ArrayBuffer))return t.byteLength;if("string"!=typeof t)throw TypeError('The "string" argument must be one of type string, Buffer, or ArrayBuffer. Received type '+typeof t);var r=t.length,o=arguments.length>2&&!0===arguments[2];if(!o&&0===r)return 0;for(var n=!1;;)switch(e){case"ascii":case"latin1":case"binary":return r;case"utf8":case"utf-8":return j(t).length;case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return 2*r;case"hex":return r>>>1;case"base64":return E(t).length;default:if(n)return o?-1:j(t).length;e=(""+e).toLowerCase(),n=!0}}function p(t,e,r){var n,i,a,s=!1;if((void 0===e||e<0)&&(e=0),e>this.length||((void 0===r||r>this.length)&&(r=this.length),r<=0||(r>>>=0)<=(e>>>=0)))return"";for(t||(t="utf8");;)switch(t){case"hex":return function(t,e,r){var o=t.length;(!e||e<0)&&(e=0),(!r||r<0||r>o)&&(r=o);for(var n="",i=e;i<r;++i)n+=A[t[i]];return n}(this,e,r);case"utf8":case"utf-8":return v(this,e,r);case"ascii":return function(t,e,r){var o="";r=Math.min(t.length,r);for(var n=e;n<r;++n)o+=String.fromCharCode(127&t[n]);return o}(this,e,r);case"latin1":case"binary":return function(t,e,r){var o="";r=Math.min(t.length,r);for(var n=e;n<r;++n)o+=String.fromCharCode(t[n]);return o}(this,e,r);case"base64":return n=this,i=e,a=r,0===i&&a===n.length?o.fromByteArray(n):o.fromByteArray(n.slice(i,a));case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return function(t,e,r){for(var o=t.slice(e,r),n="",i=0;i<o.length;i+=2)n+=String.fromCharCode(o[i]+256*o[i+1]);return n}(this,e,r);default:if(s)throw TypeError("Unknown encoding: "+t);t=(t+"").toLowerCase(),s=!0}}function m(t,e,r){var o=t[e];t[e]=t[r],t[r]=o}function y(t,e,r,o,n){var i;if(0===t.length)return -1;if("string"==typeof r?(o=r,r=0):r>0x7fffffff?r=0x7fffffff:r<-0x80000000&&(r=-0x80000000),(i=r*=1)!=i&&(r=n?0:t.length-1),r<0&&(r=t.length+r),r>=t.length)if(n)return -1;else r=t.length-1;else if(r<0)if(!n)return -1;else r=0;if("string"==typeof e&&(e=s.from(e,o)),s.isBuffer(e))return 0===e.length?-1:g(t,e,r,o,n);if("number"==typeof e){if(e&=255,"function"==typeof Uint8Array.prototype.indexOf)if(n)return Uint8Array.prototype.indexOf.call(t,e,r);else return Uint8Array.prototype.lastIndexOf.call(t,e,r);return g(t,[e],r,o,n)}throw TypeError("val must be string, number or Buffer")}function g(t,e,r,o,n){var i,a=1,s=t.length,l=e.length;if(void 0!==o&&("ucs2"===(o=String(o).toLowerCase())||"ucs-2"===o||"utf16le"===o||"utf-16le"===o)){if(t.length<2||e.length<2)return -1;a=2,s/=2,l/=2,r/=2}function f(t,e){return 1===a?t[e]:t.readUInt16BE(e*a)}if(n){var c=-1;for(i=r;i<s;i++)if(f(t,i)===f(e,-1===c?0:i-c)){if(-1===c&&(c=i),i-c+1===l)return c*a}else -1!==c&&(i-=i-c),c=-1}else for(r+l>s&&(r=s-l),i=r;i>=0;i--){for(var u=!0,d=0;d<l;d++)if(f(t,i+d)!==f(e,d)){u=!1;break}if(u)return i}return -1}s.isBuffer=function(t){return null!=t&&!0===t._isBuffer&&t!==s.prototype},s.compare=function(t,e){if(N(t,Uint8Array)&&(t=s.from(t,t.offset,t.byteLength)),N(e,Uint8Array)&&(e=s.from(e,e.offset,e.byteLength)),!s.isBuffer(t)||!s.isBuffer(e))throw TypeError('The "buf1", "buf2" arguments must be one of type Buffer or Uint8Array');if(t===e)return 0;for(var r=t.length,o=e.length,n=0,i=Math.min(r,o);n<i;++n)if(t[n]!==e[n]){r=t[n],o=e[n];break}return r<o?-1:+(o<r)},s.isEncoding=function(t){switch(String(t).toLowerCase()){case"hex":case"utf8":case"utf-8":case"ascii":case"latin1":case"binary":case"base64":case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return!0;default:return!1}},s.concat=function(t,e){if(!Array.isArray(t))throw TypeError('"list" argument must be an Array of Buffers');if(0===t.length)return s.alloc(0);if(void 0===e)for(r=0,e=0;r<t.length;++r)e+=t[r].length;var r,o=s.allocUnsafe(e),n=0;for(r=0;r<t.length;++r){var i=t[r];if(N(i,Uint8Array)&&(i=s.from(i)),!s.isBuffer(i))throw TypeError('"list" argument must be an Array of Buffers');i.copy(o,n),n+=i.length}return o},s.byteLength=h,s.prototype._isBuffer=!0,s.prototype.swap16=function(){var t=this.length;if(t%2!=0)throw RangeError("Buffer size must be a multiple of 16-bits");for(var e=0;e<t;e+=2)m(this,e,e+1);return this},s.prototype.swap32=function(){var t=this.length;if(t%4!=0)throw RangeError("Buffer size must be a multiple of 32-bits");for(var e=0;e<t;e+=4)m(this,e,e+3),m(this,e+1,e+2);return this},s.prototype.swap64=function(){var t=this.length;if(t%8!=0)throw RangeError("Buffer size must be a multiple of 64-bits");for(var e=0;e<t;e+=8)m(this,e,e+7),m(this,e+1,e+6),m(this,e+2,e+5),m(this,e+3,e+4);return this},s.prototype.toString=function(){var t=this.length;return 0===t?"":0==arguments.length?v(this,0,t):p.apply(this,arguments)},s.prototype.toLocaleString=s.prototype.toString,s.prototype.equals=function(t){if(!s.isBuffer(t))throw TypeError("Argument must be a Buffer");return this===t||0===s.compare(this,t)},s.prototype.inspect=function(){var t="",r=e.INSPECT_MAX_BYTES;return t=this.toString("hex",0,r).replace(/(.{2})/g,"$1 ").trim(),this.length>r&&(t+=" ... "),"<Buffer "+t+">"},i&&(s.prototype[i]=s.prototype.inspect),s.prototype.compare=function(t,e,r,o,n){if(N(t,Uint8Array)&&(t=s.from(t,t.offset,t.byteLength)),!s.isBuffer(t))throw TypeError('The "target" argument must be one of type Buffer or Uint8Array. Received type '+typeof t);if(void 0===e&&(e=0),void 0===r&&(r=t?t.length:0),void 0===o&&(o=0),void 0===n&&(n=this.length),e<0||r>t.length||o<0||n>this.length)throw RangeError("out of range index");if(o>=n&&e>=r)return 0;if(o>=n)return -1;if(e>=r)return 1;if(e>>>=0,r>>>=0,o>>>=0,n>>>=0,this===t)return 0;for(var i=n-o,a=r-e,l=Math.min(i,a),f=this.slice(o,n),c=t.slice(e,r),u=0;u<l;++u)if(f[u]!==c[u]){i=f[u],a=c[u];break}return i<a?-1:+(a<i)},s.prototype.includes=function(t,e,r){return -1!==this.indexOf(t,e,r)},s.prototype.indexOf=function(t,e,r){return y(this,t,e,r,!0)},s.prototype.lastIndexOf=function(t,e,r){return y(this,t,e,r,!1)};function v(t,e,r){r=Math.min(t.length,r);for(var o=[],n=e;n<r;){var i,a,s,l,f=t[n],c=null,u=f>239?4:f>223?3:f>191?2:1;if(n+u<=r)switch(u){case 1:f<128&&(c=f);break;case 2:(192&(i=t[n+1]))==128&&(l=(31&f)<<6|63&i)>127&&(c=l);break;case 3:i=t[n+1],a=t[n+2],(192&i)==128&&(192&a)==128&&(l=(15&f)<<12|(63&i)<<6|63&a)>2047&&(l<55296||l>57343)&&(c=l);break;case 4:i=t[n+1],a=t[n+2],s=t[n+3],(192&i)==128&&(192&a)==128&&(192&s)==128&&(l=(15&f)<<18|(63&i)<<12|(63&a)<<6|63&s)>65535&&l<1114112&&(c=l)}null===c?(c=65533,u=1):c>65535&&(c-=65536,o.push(c>>>10&1023|55296),c=56320|1023&c),o.push(c),n+=u}var d=o,h=d.length;if(h<=4096)return String.fromCharCode.apply(String,d);for(var p="",m=0;m<h;)p+=String.fromCharCode.apply(String,d.slice(m,m+=4096));return p}function _(t,e,r){if(t%1!=0||t<0)throw RangeError("offset is not uint");if(t+e>r)throw RangeError("Trying to access beyond buffer length")}function C(t,e,r,o,n,i){if(!s.isBuffer(t))throw TypeError('"buffer" argument must be a Buffer instance');if(e>n||e<i)throw RangeError('"value" argument is out of bounds');if(r+o>t.length)throw RangeError("Index out of range")}function b(t,e,r,o,n,i){if(r+o>t.length||r<0)throw RangeError("Index out of range")}function x(t,e,r,o,i){return e*=1,r>>>=0,i||b(t,e,r,4,34028234663852886e22,-34028234663852886e22),n.write(t,e,r,o,23,4),r+4}function w(t,e,r,o,i){return e*=1,r>>>=0,i||b(t,e,r,8,17976931348623157e292,-17976931348623157e292),n.write(t,e,r,o,52,8),r+8}s.prototype.write=function(t,e,r,o){if(void 0===e)o="utf8",r=this.length,e=0;else if(void 0===r&&"string"==typeof e)o=e,r=this.length,e=0;else if(isFinite(e))e>>>=0,isFinite(r)?(r>>>=0,void 0===o&&(o="utf8")):(o=r,r=void 0);else throw Error("Buffer.write(string, encoding, offset[, length]) is no longer supported");var n,i,a,s,l,f,c,u,d=this.length-e;if((void 0===r||r>d)&&(r=d),t.length>0&&(r<0||e<0)||e>this.length)throw RangeError("Attempt to write outside buffer bounds");o||(o="utf8");for(var h=!1;;)switch(o){case"hex":return function(t,e,r,o){r=Number(r)||0;var n=t.length-r;o?(o=Number(o))>n&&(o=n):o=n;var i=e.length;o>i/2&&(o=i/2);for(var a=0;a<o;++a){var s,l=parseInt(e.substr(2*a,2),16);if((s=l)!=s)break;t[r+a]=l}return a}(this,t,e,r);case"utf8":case"utf-8":return n=e,i=r,L(j(t,this.length-n),this,n,i);case"ascii":return a=e,s=r,L(k(t),this,a,s);case"latin1":case"binary":return function(t,e,r,o){return L(k(e),t,r,o)}(this,t,e,r);case"base64":return l=e,f=r,L(E(t),this,l,f);case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return c=e,u=r,L(function(t,e){for(var r,o,n=[],i=0;i<t.length&&!((e-=2)<0);++i)o=(r=t.charCodeAt(i))>>8,n.push(r%256),n.push(o);return n}(t,this.length-c),this,c,u);default:if(h)throw TypeError("Unknown encoding: "+o);o=(""+o).toLowerCase(),h=!0}},s.prototype.toJSON=function(){return{type:"Buffer",data:Array.prototype.slice.call(this._arr||this,0)}},s.prototype.slice=function(t,e){var r=this.length;t=~~t,e=void 0===e?r:~~e,t<0?(t+=r)<0&&(t=0):t>r&&(t=r),e<0?(e+=r)<0&&(e=0):e>r&&(e=r),e<t&&(e=t);var o=this.subarray(t,e);return Object.setPrototypeOf(o,s.prototype),o},s.prototype.readUIntLE=function(t,e,r){t>>>=0,e>>>=0,r||_(t,e,this.length);for(var o=this[t],n=1,i=0;++i<e&&(n*=256);)o+=this[t+i]*n;return o},s.prototype.readUIntBE=function(t,e,r){t>>>=0,e>>>=0,r||_(t,e,this.length);for(var o=this[t+--e],n=1;e>0&&(n*=256);)o+=this[t+--e]*n;return o},s.prototype.readUInt8=function(t,e){return t>>>=0,e||_(t,1,this.length),this[t]},s.prototype.readUInt16LE=function(t,e){return t>>>=0,e||_(t,2,this.length),this[t]|this[t+1]<<8},s.prototype.readUInt16BE=function(t,e){return t>>>=0,e||_(t,2,this.length),this[t]<<8|this[t+1]},s.prototype.readUInt32LE=function(t,e){return t>>>=0,e||_(t,4,this.length),(this[t]|this[t+1]<<8|this[t+2]<<16)+0x1000000*this[t+3]},s.prototype.readUInt32BE=function(t,e){return t>>>=0,e||_(t,4,this.length),0x1000000*this[t]+(this[t+1]<<16|this[t+2]<<8|this[t+3])},s.prototype.readIntLE=function(t,e,r){t>>>=0,e>>>=0,r||_(t,e,this.length);for(var o=this[t],n=1,i=0;++i<e&&(n*=256);)o+=this[t+i]*n;return o>=(n*=128)&&(o-=Math.pow(2,8*e)),o},s.prototype.readIntBE=function(t,e,r){t>>>=0,e>>>=0,r||_(t,e,this.length);for(var o=e,n=1,i=this[t+--o];o>0&&(n*=256);)i+=this[t+--o]*n;return i>=(n*=128)&&(i-=Math.pow(2,8*e)),i},s.prototype.readInt8=function(t,e){return(t>>>=0,e||_(t,1,this.length),128&this[t])?-((255-this[t]+1)*1):this[t]},s.prototype.readInt16LE=function(t,e){t>>>=0,e||_(t,2,this.length);var r=this[t]|this[t+1]<<8;return 32768&r?0xffff0000|r:r},s.prototype.readInt16BE=function(t,e){t>>>=0,e||_(t,2,this.length);var r=this[t+1]|this[t]<<8;return 32768&r?0xffff0000|r:r},s.prototype.readInt32LE=function(t,e){return t>>>=0,e||_(t,4,this.length),this[t]|this[t+1]<<8|this[t+2]<<16|this[t+3]<<24},s.prototype.readInt32BE=function(t,e){return t>>>=0,e||_(t,4,this.length),this[t]<<24|this[t+1]<<16|this[t+2]<<8|this[t+3]},s.prototype.readFloatLE=function(t,e){return t>>>=0,e||_(t,4,this.length),n.read(this,t,!0,23,4)},s.prototype.readFloatBE=function(t,e){return t>>>=0,e||_(t,4,this.length),n.read(this,t,!1,23,4)},s.prototype.readDoubleLE=function(t,e){return t>>>=0,e||_(t,8,this.length),n.read(this,t,!0,52,8)},s.prototype.readDoubleBE=function(t,e){return t>>>=0,e||_(t,8,this.length),n.read(this,t,!1,52,8)},s.prototype.writeUIntLE=function(t,e,r,o){if(t*=1,e>>>=0,r>>>=0,!o){var n=Math.pow(2,8*r)-1;C(this,t,e,r,n,0)}var i=1,a=0;for(this[e]=255&t;++a<r&&(i*=256);)this[e+a]=t/i&255;return e+r},s.prototype.writeUIntBE=function(t,e,r,o){if(t*=1,e>>>=0,r>>>=0,!o){var n=Math.pow(2,8*r)-1;C(this,t,e,r,n,0)}var i=r-1,a=1;for(this[e+i]=255&t;--i>=0&&(a*=256);)this[e+i]=t/a&255;return e+r},s.prototype.writeUInt8=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,1,255,0),this[e]=255&t,e+1},s.prototype.writeUInt16LE=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,2,65535,0),this[e]=255&t,this[e+1]=t>>>8,e+2},s.prototype.writeUInt16BE=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,2,65535,0),this[e]=t>>>8,this[e+1]=255&t,e+2},s.prototype.writeUInt32LE=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,4,0xffffffff,0),this[e+3]=t>>>24,this[e+2]=t>>>16,this[e+1]=t>>>8,this[e]=255&t,e+4},s.prototype.writeUInt32BE=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,4,0xffffffff,0),this[e]=t>>>24,this[e+1]=t>>>16,this[e+2]=t>>>8,this[e+3]=255&t,e+4},s.prototype.writeIntLE=function(t,e,r,o){if(t*=1,e>>>=0,!o){var n=Math.pow(2,8*r-1);C(this,t,e,r,n-1,-n)}var i=0,a=1,s=0;for(this[e]=255&t;++i<r&&(a*=256);)t<0&&0===s&&0!==this[e+i-1]&&(s=1),this[e+i]=(t/a|0)-s&255;return e+r},s.prototype.writeIntBE=function(t,e,r,o){if(t*=1,e>>>=0,!o){var n=Math.pow(2,8*r-1);C(this,t,e,r,n-1,-n)}var i=r-1,a=1,s=0;for(this[e+i]=255&t;--i>=0&&(a*=256);)t<0&&0===s&&0!==this[e+i+1]&&(s=1),this[e+i]=(t/a|0)-s&255;return e+r},s.prototype.writeInt8=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,1,127,-128),t<0&&(t=255+t+1),this[e]=255&t,e+1},s.prototype.writeInt16LE=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,2,32767,-32768),this[e]=255&t,this[e+1]=t>>>8,e+2},s.prototype.writeInt16BE=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,2,32767,-32768),this[e]=t>>>8,this[e+1]=255&t,e+2},s.prototype.writeInt32LE=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,4,0x7fffffff,-0x80000000),this[e]=255&t,this[e+1]=t>>>8,this[e+2]=t>>>16,this[e+3]=t>>>24,e+4},s.prototype.writeInt32BE=function(t,e,r){return t*=1,e>>>=0,r||C(this,t,e,4,0x7fffffff,-0x80000000),t<0&&(t=0xffffffff+t+1),this[e]=t>>>24,this[e+1]=t>>>16,this[e+2]=t>>>8,this[e+3]=255&t,e+4},s.prototype.writeFloatLE=function(t,e,r){return x(this,t,e,!0,r)},s.prototype.writeFloatBE=function(t,e,r){return x(this,t,e,!1,r)},s.prototype.writeDoubleLE=function(t,e,r){return w(this,t,e,!0,r)},s.prototype.writeDoubleBE=function(t,e,r){return w(this,t,e,!1,r)},s.prototype.copy=function(t,e,r,o){if(!s.isBuffer(t))throw TypeError("argument should be a Buffer");if(r||(r=0),o||0===o||(o=this.length),e>=t.length&&(e=t.length),e||(e=0),o>0&&o<r&&(o=r),o===r||0===t.length||0===this.length)return 0;if(e<0)throw RangeError("targetStart out of bounds");if(r<0||r>=this.length)throw RangeError("Index out of range");if(o<0)throw RangeError("sourceEnd out of bounds");o>this.length&&(o=this.length),t.length-e<o-r&&(o=t.length-e+r);var n=o-r;if(this===t&&"function"==typeof Uint8Array.prototype.copyWithin)this.copyWithin(e,r,o);else if(this===t&&r<e&&e<o)for(var i=n-1;i>=0;--i)t[i+e]=this[i+r];else Uint8Array.prototype.set.call(t,this.subarray(r,o),e);return n},s.prototype.fill=function(t,e,r,o){if("string"==typeof t){if("string"==typeof e?(o=e,e=0,r=this.length):"string"==typeof r&&(o=r,r=this.length),void 0!==o&&"string"!=typeof o)throw TypeError("encoding must be a string");if("string"==typeof o&&!s.isEncoding(o))throw TypeError("Unknown encoding: "+o);if(1===t.length){var n,i=t.charCodeAt(0);("utf8"===o&&i<128||"latin1"===o)&&(t=i)}}else"number"==typeof t?t&=255:"boolean"==typeof t&&(t=Number(t));if(e<0||this.length<e||this.length<r)throw RangeError("Out of range index");if(r<=e)return this;if(e>>>=0,r=void 0===r?this.length:r>>>0,t||(t=0),"number"==typeof t)for(n=e;n<r;++n)this[n]=t;else{var a=s.isBuffer(t)?t:s.from(t,o),l=a.length;if(0===l)throw TypeError('The value "'+t+'" is invalid for argument "value"');for(n=0;n<r-e;++n)this[n+e]=a[n%l]}return this};var T=/[^+/0-9A-Za-z-_]/g;function j(t,e){e=e||1/0;for(var r,o=t.length,n=null,i=[],a=0;a<o;++a){if((r=t.charCodeAt(a))>55295&&r<57344){if(!n){if(r>56319||a+1===o){(e-=3)>-1&&i.push(239,191,189);continue}n=r;continue}if(r<56320){(e-=3)>-1&&i.push(239,191,189),n=r;continue}r=(n-55296<<10|r-56320)+65536}else n&&(e-=3)>-1&&i.push(239,191,189);if(n=null,r<128){if((e-=1)<0)break;i.push(r)}else if(r<2048){if((e-=2)<0)break;i.push(r>>6|192,63&r|128)}else if(r<65536){if((e-=3)<0)break;i.push(r>>12|224,r>>6&63|128,63&r|128)}else if(r<1114112){if((e-=4)<0)break;i.push(r>>18|240,r>>12&63|128,r>>6&63|128,63&r|128)}else throw Error("Invalid code point")}return i}function k(t){for(var e=[],r=0;r<t.length;++r)e.push(255&t.charCodeAt(r));return e}function E(t){return o.toByteArray(function(t){if((t=(t=t.split("=")[0]).trim().replace(T,"")).length<2)return"";for(;t.length%4!=0;)t+="=";return t}(t))}function L(t,e,r,o){for(var n=0;n<o&&!(n+r>=e.length)&&!(n>=t.length);++n)e[n+r]=t[n];return n}function N(t,e){return t instanceof e||null!=t&&null!=t.constructor&&null!=t.constructor.name&&t.constructor.name===e.name}var A=function(){for(var t="0123456789abcdef",e=Array(256),r=0;r<16;++r)for(var o=16*r,n=0;n<16;++n)e[o+n]=t[r]+t[n];return e}()},783:function(t,e){e.read=function(t,e,r,o,n){var i,a,s=8*n-o-1,l=(1<<s)-1,f=l>>1,c=-7,u=r?n-1:0,d=r?-1:1,h=t[e+u];for(u+=d,i=h&(1<<-c)-1,h>>=-c,c+=s;c>0;i=256*i+t[e+u],u+=d,c-=8);for(a=i&(1<<-c)-1,i>>=-c,c+=o;c>0;a=256*a+t[e+u],u+=d,c-=8);if(0===i)i=1-f;else{if(i===l)return a?NaN:1/0*(h?-1:1);a+=Math.pow(2,o),i-=f}return(h?-1:1)*a*Math.pow(2,i-o)},e.write=function(t,e,r,o,n,i){var a,s,l,f=8*i-n-1,c=(1<<f)-1,u=c>>1,d=5960464477539062e-23*(23===n),h=o?0:i-1,p=o?1:-1,m=+(e<0||0===e&&1/e<0);for(isNaN(e=Math.abs(e))||e===1/0?(s=+!!isNaN(e),a=c):(a=Math.floor(Math.log(e)/Math.LN2),e*(l=Math.pow(2,-a))<1&&(a--,l*=2),a+u>=1?e+=d/l:e+=d*Math.pow(2,1-u),e*l>=2&&(a++,l/=2),a+u>=c?(s=0,a=c):a+u>=1?(s=(e*l-1)*Math.pow(2,n),a+=u):(s=e*Math.pow(2,u-1)*Math.pow(2,n),a=0));n>=8;t[r+h]=255&s,h+=p,s/=256,n-=8);for(a=a<<n|s,f+=n;f>0;t[r+h]=255&a,h+=p,a/=256,f-=8);t[r+h-p]|=128*m}}},n={};function i(t){var e=n[t];if(void 0!==e)return e.exports;var r=n[t]={exports:{}},a=!0;try{o[t](r,r.exports,i),a=!1}finally{a&&delete n[t]}return r.exports}i.ab="/ROOT/node_modules/next/dist/compiled/buffer/",e.exports=i(72)},19298,(t,e,r)=>{"use strict";var o,n="object"==typeof Reflect?Reflect:null,i=n&&"function"==typeof n.apply?n.apply:function(t,e,r){return Function.prototype.apply.call(t,e,r)};o=n&&"function"==typeof n.ownKeys?n.ownKeys:Object.getOwnPropertySymbols?function(t){return Object.getOwnPropertyNames(t).concat(Object.getOwnPropertySymbols(t))}:function(t){return Object.getOwnPropertyNames(t)};var a=Number.isNaN||function(t){return t!=t};function s(){s.init.call(this)}e.exports=s,e.exports.once=function(t,e){return new Promise(function(r,o){var n,i,a;function s(r){t.removeListener(e,l),o(r)}function l(){"function"==typeof t.removeListener&&t.removeListener("error",s),r([].slice.call(arguments))}g(t,e,l,{once:!0}),"error"!==e&&(n=t,i=s,a={once:!0},"function"==typeof n.on&&g(n,"error",i,a))})},s.EventEmitter=s,s.prototype._events=void 0,s.prototype._eventsCount=0,s.prototype._maxListeners=void 0;var l=10;function f(t){if("function"!=typeof t)throw TypeError('The "listener" argument must be of type Function. Received type '+typeof t)}function c(t){return void 0===t._maxListeners?s.defaultMaxListeners:t._maxListeners}function u(t,e,r,o){if(f(r),void 0===(i=t._events)?(i=t._events=Object.create(null),t._eventsCount=0):(void 0!==i.newListener&&(t.emit("newListener",e,r.listener?r.listener:r),i=t._events),a=i[e]),void 0===a)a=i[e]=r,++t._eventsCount;else if("function"==typeof a?a=i[e]=o?[r,a]:[a,r]:o?a.unshift(r):a.push(r),(n=c(t))>0&&a.length>n&&!a.warned){a.warned=!0;var n,i,a,s=Error("Possible EventEmitter memory leak detected. "+a.length+" "+String(e)+" listeners added. Use emitter.setMaxListeners() to increase limit");s.name="MaxListenersExceededWarning",s.emitter=t,s.type=e,s.count=a.length,console&&console.warn&&console.warn(s)}return t}function d(){if(!this.fired)return(this.target.removeListener(this.type,this.wrapFn),this.fired=!0,0==arguments.length)?this.listener.call(this.target):this.listener.apply(this.target,arguments)}function h(t,e,r){var o={fired:!1,wrapFn:void 0,target:t,type:e,listener:r},n=d.bind(o);return n.listener=r,o.wrapFn=n,n}function p(t,e,r){var o=t._events;if(void 0===o)return[];var n=o[e];return void 0===n?[]:"function"==typeof n?r?[n.listener||n]:[n]:r?function(t){for(var e=Array(t.length),r=0;r<e.length;++r)e[r]=t[r].listener||t[r];return e}(n):y(n,n.length)}function m(t){var e=this._events;if(void 0!==e){var r=e[t];if("function"==typeof r)return 1;if(void 0!==r)return r.length}return 0}function y(t,e){for(var r=Array(e),o=0;o<e;++o)r[o]=t[o];return r}function g(t,e,r,o){if("function"==typeof t.on)o.once?t.once(e,r):t.on(e,r);else if("function"==typeof t.addEventListener)t.addEventListener(e,function n(i){o.once&&t.removeEventListener(e,n),r(i)});else throw TypeError('The "emitter" argument must be of type EventEmitter. Received type '+typeof t)}Object.defineProperty(s,"defaultMaxListeners",{enumerable:!0,get:function(){return l},set:function(t){if("number"!=typeof t||t<0||a(t))throw RangeError('The value of "defaultMaxListeners" is out of range. It must be a non-negative number. Received '+t+".");l=t}}),s.init=function(){(void 0===this._events||this._events===Object.getPrototypeOf(this)._events)&&(this._events=Object.create(null),this._eventsCount=0),this._maxListeners=this._maxListeners||void 0},s.prototype.setMaxListeners=function(t){if("number"!=typeof t||t<0||a(t))throw RangeError('The value of "n" is out of range. It must be a non-negative number. Received '+t+".");return this._maxListeners=t,this},s.prototype.getMaxListeners=function(){return c(this)},s.prototype.emit=function(t){for(var e=[],r=1;r<arguments.length;r++)e.push(arguments[r]);var o="error"===t,n=this._events;if(void 0!==n)o=o&&void 0===n.error;else if(!o)return!1;if(o){if(e.length>0&&(a=e[0]),a instanceof Error)throw a;var a,s=Error("Unhandled error."+(a?" ("+a.message+")":""));throw s.context=a,s}var l=n[t];if(void 0===l)return!1;if("function"==typeof l)i(l,this,e);else for(var f=l.length,c=y(l,f),r=0;r<f;++r)i(c[r],this,e);return!0},s.prototype.addListener=function(t,e){return u(this,t,e,!1)},s.prototype.on=s.prototype.addListener,s.prototype.prependListener=function(t,e){return u(this,t,e,!0)},s.prototype.once=function(t,e){return f(e),this.on(t,h(this,t,e)),this},s.prototype.prependOnceListener=function(t,e){return f(e),this.prependListener(t,h(this,t,e)),this},s.prototype.removeListener=function(t,e){var r,o,n,i,a;if(f(e),void 0===(o=this._events)||void 0===(r=o[t]))return this;if(r===e||r.listener===e)0==--this._eventsCount?this._events=Object.create(null):(delete o[t],o.removeListener&&this.emit("removeListener",t,r.listener||e));else if("function"!=typeof r){for(n=-1,i=r.length-1;i>=0;i--)if(r[i]===e||r[i].listener===e){a=r[i].listener,n=i;break}if(n<0)return this;0===n?r.shift():function(t,e){for(;e+1<t.length;e++)t[e]=t[e+1];t.pop()}(r,n),1===r.length&&(o[t]=r[0]),void 0!==o.removeListener&&this.emit("removeListener",t,a||e)}return this},s.prototype.off=s.prototype.removeListener,s.prototype.removeAllListeners=function(t){var e,r,o;if(void 0===(r=this._events))return this;if(void 0===r.removeListener)return 0==arguments.length?(this._events=Object.create(null),this._eventsCount=0):void 0!==r[t]&&(0==--this._eventsCount?this._events=Object.create(null):delete r[t]),this;if(0==arguments.length){var n,i=Object.keys(r);for(o=0;o<i.length;++o)"removeListener"!==(n=i[o])&&this.removeAllListeners(n);return this.removeAllListeners("removeListener"),this._events=Object.create(null),this._eventsCount=0,this}if("function"==typeof(e=r[t]))this.removeListener(t,e);else if(void 0!==e)for(o=e.length-1;o>=0;o--)this.removeListener(t,e[o]);return this},s.prototype.listeners=function(t){return p(this,t,!0)},s.prototype.rawListeners=function(t){return p(this,t,!1)},s.listenerCount=function(t,e){return"function"==typeof t.listenerCount?t.listenerCount(e):m.call(t,e)},s.prototype.listenerCount=m,s.prototype.eventNames=function(){return this._eventsCount>0?o(this._events):[]}},34582,(t,e,r)=>{"use strict";r.byteLength=function(t){var e=f(t),r=e[0],o=e[1];return(r+o)*3/4-o},r.toByteArray=function(t){var e,r,o=f(t),a=o[0],s=o[1],l=new i((a+s)*3/4-s),c=0,u=s>0?a-4:a;for(r=0;r<u;r+=4)e=n[t.charCodeAt(r)]<<18|n[t.charCodeAt(r+1)]<<12|n[t.charCodeAt(r+2)]<<6|n[t.charCodeAt(r+3)],l[c++]=e>>16&255,l[c++]=e>>8&255,l[c++]=255&e;return 2===s&&(e=n[t.charCodeAt(r)]<<2|n[t.charCodeAt(r+1)]>>4,l[c++]=255&e),1===s&&(e=n[t.charCodeAt(r)]<<10|n[t.charCodeAt(r+1)]<<4|n[t.charCodeAt(r+2)]>>2,l[c++]=e>>8&255,l[c++]=255&e),l},r.fromByteArray=function(t){for(var e,r=t.length,n=r%3,i=[],a=0,s=r-n;a<s;a+=16383)i.push(function(t,e,r){for(var n,i=[],a=e;a<r;a+=3)n=(t[a]<<16&0xff0000)+(t[a+1]<<8&65280)+(255&t[a+2]),i.push(o[n>>18&63]+o[n>>12&63]+o[n>>6&63]+o[63&n]);return i.join("")}(t,a,a+16383>s?s:a+16383));return 1===n?i.push(o[(e=t[r-1])>>2]+o[e<<4&63]+"=="):2===n&&i.push(o[(e=(t[r-2]<<8)+t[r-1])>>10]+o[e>>4&63]+o[e<<2&63]+"="),i.join("")};for(var o=[],n=[],i="u">typeof Uint8Array?Uint8Array:Array,a="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",s=0,l=a.length;s<l;++s)o[s]=a[s],n[a.charCodeAt(s)]=s;function f(t){var e=t.length;if(e%4>0)throw Error("Invalid string. Length must be a multiple of 4");var r=t.indexOf("=");-1===r&&(r=e);var o=r===e?0:4-r%4;return[r,o]}n[45]=62,n[95]=63},48259,t=>{"use strict";var e=t.i(43476),r=t.i(55487),o=t.i(23680),n=t.i(71645),i=t.i(1805),a=t.i(48293),s=t.i(70319),l=t.i(22016),f=t.i(74881),c=t.i(78631),u=t.i(16992),d=t.i(57055),h=t.i(62917),p=t.i(9113),m=t.i(29336),y=t.i(15233),g=t.i(36783),v=t.i(42836),_=t.i(1268);let C={ResumeTemplate1:d.default,ResumeTemplate2:h.default,ResumeTemplate3:p.default,ResumeTemplate4:m.default,ResumeTemplate5:y.default,ResumeTemplate6:g.default,ResumeTemplate7:v.default},b=t=>{let e=t.personal_infomation||{},r=[[e.firstName,e.lastName].filter(Boolean).join(" ")||t.resume_name||"Resume",[e.email,e.phone,e.city,e.state].filter(Boolean).join(" | "),e.website||"",""];return t.summary?.summary&&r.push("SUMMARY",t.summary.summary,""),t.educations?.length&&(r.push("EDUCATION"),t.educations.forEach(t=>r.push(`${t.degree||""}${t.field_study?` in ${t.field_study}`:""}`,[t.institute_name,t.location,t.date,t.year].filter(Boolean).join(" | "))),r.push("")),t.skills?.length&&r.push("SKILLS",t.skills.map(t=>[t.skill_name,t.proficiency_level].filter(Boolean).join(" - ")).join(", "),""),t.work_experiences?.length&&(r.push("WORK EXPERIENCE"),t.work_experiences.forEach(t=>r.push([t.job_title,t.company_name,t.employee_type].filter(Boolean).join(" | "),[t.location,t.start_month,t.start_year,t.end_month,t.end_year].filter(Boolean).join(" "),t.description||"")),r.push("")),t.certificates?.length&&(r.push("CERTIFICATIONS"),t.certificates.forEach(t=>r.push([t.certificate_name,t.issuing_organization,t.issue_date].filter(Boolean).join(" | "))),r.push("")),t.languages?.length&&r.push("LANGUAGES",t.languages.map(t=>[t.language,t.proficiency_level].filter(Boolean).join(" - ")).join(", "),""),t.hobbies?.length&&r.push("HOBBIES",t.hobbies.map(t=>t.hobbies).filter(Boolean).join(", "),""),r.filter((t,e,r)=>t||r[e-1]).join("\n")},x=t=>(t.resume_name||`${t.personal_infomation?.firstName||"resume"}-${t.id}`).replace(/[^\w-]+/g,"-").replace(/-+/g,"-").replace(/^-|-$/g,"").toLowerCase()||"resume";t.s(["default",0,function(){let t=(0,r.useDispatch)(),[h,p]=(0,n.useState)(null),[m,y]=(0,n.useState)(null),g=(0,r.useSelector)(t=>Array.isArray(t.resume.resumes)?t.resume.resumes:[]),v=g.filter(t=>!1!==t.is_submitted).sort((t,e)=>(e.updated_at||Number(e.id)||0)-(t.updated_at||Number(t.id)||0)),w=async t=>{y(t.id);let e=Date.now();return new Promise(r=>{let o=()=>{let n=document.querySelector(`#resume-list-render-${t.id} #resume-download-area`);n?r(n):Date.now()-e>1500?r(null):requestAnimationFrame(o)};o()})},T=async t=>{try{await (0,u.createResumePdf)({resume:t,fileName:t.resume_name||"resume",selectedTheme:t.configuration?.selected_theme||"ResumeTemplate1",palette:t.configuration?.color_palette||"color-1",selectedFont:t.configuration?.font_style})}catch(t){console.error("PDF generation failed:",t),s.toast.error("PDF download failed. Please try again.",{position:"top-right",autoClose:3e3,theme:"light"})}},j=async t=>{let e=await w(t);if(!e)return void s.toast.error("Resume preview not ready. Please try again.",{position:"top-right",autoClose:3e3,theme:"light"});let r=document.createElement("div");r.id="__resume_list_print_root__",r.style.cssText="display:none;position:fixed;inset:0;background:#fff;z-index:9999999;margin:0;padding:0;";let o=document.createElement("div");o.className=`print-wrapper ${(0,_.getResumeCustomizationClasses)(t.configuration)}`,o.style.cssText="width:100%;margin:0;padding:0;";let n=e.cloneNode(!0);n.style.cssText="width:100% !important;max-width:100% !important;transform:none !important;position:static !important;box-shadow:none !important;overflow:visible !important;margin:0 !important;padding:0 !important;",o.appendChild(n),r.appendChild(o),document.body.appendChild(r);let i=document.createElement("style");i.id="__resume_list_print_style__";let a="";Array.from(document.styleSheets).forEach(t=>{try{let e=t.cssRules||t.rules;for(let t=0;t<e.length;t+=1)a+=e[t].cssText}catch(t){}}),i.innerHTML=a+="@media print{body>*:not(#__resume_list_print_root__){display:none !important;visibility:hidden !important;}html,body{margin:0 !important;padding:0 !important;height:auto !important;min-height:auto !important;overflow:visible !important;background:#fff !important;}#__resume_list_print_root__{display:block !important;position:relative !important;width:100% !important;max-width:100% !important;height:auto !important;overflow:visible !important;margin:0 !important;padding:0 !important;background:#fff !important;}#__resume_list_print_root__ *{visibility:visible !important;-webkit-print-color-adjust:exact !important;print-color-adjust:exact !important;color-adjust:exact !important;}@page{size:A4 portrait;margin:10mm 0 10mm 0 !important;}@page :first{margin-top:0 !important;}}",document.head.appendChild(i);let l=()=>{let t=document.getElementById("__resume_list_print_root__"),e=document.getElementById("__resume_list_print_style__");t&&document.body.removeChild(t),e&&document.head.removeChild(e),window.removeEventListener("afterprint",l),y(null)};window.addEventListener("afterprint",l),setTimeout(()=>{window.print(),setTimeout(l,5e3)},150)},k=[{key:"email",label:"Email Address",points:15,check:t=>!!t.personal_infomation?.email},{key:"phone",label:"Phone Number",points:15,check:t=>!!t.personal_infomation?.phone},{key:"linkedin",label:"LinkedIn Profile",points:10,check:t=>(t.social_medias||[]).some(t=>{let e=(t.social_name||"").trim().toLowerCase(),r=(t.social_url||"").trim().toLowerCase();return"linkedin"===e&&r&&r.includes("linkedin.com")})},{key:"education",label:"Education Section",points:15,check:t=>!!t.educations?.length},{key:"experience",label:"Work Experience",points:25,check:t=>!!t.work_experiences?.length},{key:"skills",label:"Skills Section",points:10,check:t=>!!t.skills?.length},{key:"summary",label:"Professional Summary",points:10,check:t=>!!t.summary?.summary}],E=g.find(t=>t.id===m),L=E?C[E.configuration?.selected_theme||"ResumeTemplate1"]||d.default:null;return(0,e.jsxs)(e.Fragment,{children:[(0,e.jsxs)("section",{className:"container-fluid custom-container small-hero-area",children:[(0,e.jsxs)("div",{className:"left-part",children:[(0,e.jsxs)("div",{children:[(0,e.jsxs)("label",{className:"tl-eyebrow fs-mob-12",children:[(0,e.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"1.8",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}),(0,e.jsx)("polyline",{points:"15 2 15 8 21 8"}),(0,e.jsx)("path",{d:"M9 18V12M9 12l-2 2M9 12l2 2"})]}),"100% Free • ATS Optimized"]}),(0,e.jsx)("h1",{className:"fs-mob-22",children:"Manage Your Resumes"})]}),(0,e.jsx)("p",{className:"fs-mob-16",children:"Keep all your resumes organized, update them anytime, and export them in PDF, Word, or text format with ease."}),(0,e.jsxs)(l.default,{prefetch:!1,className:"rl-create-btn",href:"/resume/resume-type",children:[(0,e.jsx)("svg",{width:"16",height:"16",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.2",strokeLinecap:"round",strokeLinejoin:"round",children:(0,e.jsx)("path",{d:"M12 5v14M5 12h14"})}),"Create New Resume"]})]}),(0,e.jsx)("div",{className:"right-part d-none d-md-block",children:(0,e.jsx)("img",{src:"/front-assets/images/resume-hero.webp",className:"img-fluid",width:500,height:360,alt:"ResumeSathi resume builder dashboard",loading:"eager",fetchPriority:"high"})})]}),(0,e.jsx)("section",{className:"resumelist-section py-custom pb-120",children:(0,e.jsx)("div",{className:"container-fluid custom-container",children:v.length>0?(0,e.jsx)("div",{className:"row g-4",children:v.map(t=>{let r,o,n,i,a=(t.personal_infomation?.firstName?.[0]||t.resume_name?.[0]||"R").toUpperCase(),s=t.personal_infomation?.photo||t.personal_infomation?.profile_image||t.personal_infomation?.image||null,u=k.reduce((e,r)=>e+(r.check(t)?r.points:0),0),d=u>=75?"ats-high":u>=45?"ats-mid":"ats-low";return(0,e.jsx)("div",{className:"col-12 col-md-6 col-xl-4",children:(0,e.jsxs)("div",{className:"rl-card h-100",children:[(0,e.jsx)("div",{className:"rl-card__accent"}),(r=k.filter(e=>!e.check(t)),n=u/100*(o=2*Math.PI*22),(0,e.jsxs)("div",{className:"rl-card__ats-wrap",children:[(0,e.jsxs)("div",{className:`rl-card__ats-badge ${d}`,children:[(0,e.jsxs)("svg",{width:"54",height:"54",viewBox:"0 0 54 54",className:"rl-ats-svg",children:[(0,e.jsx)("circle",{cx:"27",cy:"27",r:22,fill:"none",stroke:"#f0f0f0",strokeWidth:"3.5"}),(0,e.jsx)("circle",{cx:"27",cy:"27",r:22,fill:"none",stroke:"ats-high"===d?"#16a34a":"ats-mid"===d?"#d97706":"#cc0000",strokeWidth:"3.5",strokeDasharray:`${n} ${Math.max(0,o-n)}`,strokeDashoffset:.25*o,strokeLinecap:"round",className:"rl-ats-arc"})]}),(0,e.jsxs)("div",{className:"rl-card__ats-inner",children:[(0,e.jsxs)("span",{className:"rl-card__ats-score",children:[u,"%"]}),(0,e.jsx)("span",{className:"rl-card__ats-label",children:"ATS"})]})]}),r.length>0&&(0,e.jsxs)("div",{className:"rl-card__ats-tooltip",children:[(0,e.jsx)("p",{className:"rl-ats-tt-title",children:"Boost your ATS score"}),(0,e.jsx)("ul",{className:"rl-ats-tt-list",children:r.map(t=>(0,e.jsxs)("li",{children:[(0,e.jsx)("span",{className:"rl-ats-tt-dot"}),(0,e.jsx)("span",{children:t.label}),(0,e.jsxs)("span",{className:"rl-ats-tt-pts",children:["+",t.points,"%"]})]},t.key))})]})]})),(0,e.jsxs)("div",{className:"rl-card__head",children:[(0,e.jsx)("div",{className:"rl-card__avatar",children:s?(0,e.jsx)("img",{src:s,alt:`${t.resume_name||a} profile`,className:"rl-card__avatar-img"}):a}),(0,e.jsxs)("div",{className:"rl-card__title-group",children:[(0,e.jsx)("p",{className:"rl-card__name",children:t?.resume_name||"Untitled Resume"}),(0,e.jsxs)("span",{className:"rl-card__date",children:["Updated ",(i=Number(t.updated_at||t.id))?new Date(i).toLocaleDateString("en-US",{month:"long",day:"numeric",year:"numeric"}).replace(",",""):"N/A"]})]})]}),(0,e.jsxs)("div",{className:"rl-card__meta",children:[(0,e.jsxs)("div",{className:"rl-card__meta-row",children:[(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"}),(0,e.jsx)("circle",{cx:"12",cy:"7",r:"4"})]}),(0,e.jsx)("span",{children:[t.personal_infomation?.firstName,t.personal_infomation?.lastName].filter(Boolean).join(" ")||"N/A"})]}),(0,e.jsxs)("div",{className:"rl-card__meta-row",children:[(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}),(0,e.jsx)("path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"})]}),(0,e.jsx)("span",{children:t.personal_infomation?.email||"N/A"})]}),(0,e.jsxs)("div",{className:"rl-card__meta-row",children:[(0,e.jsx)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:(0,e.jsx)("path",{d:"M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 9.81a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.06 0h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 7.91a16 16 0 0 0 5.45 5.45l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 14.92z"})}),(0,e.jsx)("span",{children:t.personal_infomation?.phone||"N/A"})]}),(0,e.jsxs)("div",{className:"rl-card__meta-row",children:[(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M20 10c0 4.418-8 12-8 12S4 14.418 4 10a8 8 0 0 1 16 0z"}),(0,e.jsx)("circle",{cx:"12",cy:"10",r:"3"})]}),(0,e.jsx)("span",{children:[t.personal_infomation?.city,t.personal_infomation?.state].filter(Boolean).join(", ")||"N/A"})]})]}),(0,e.jsx)("div",{className:"rl-card__divider"}),(0,e.jsxs)("div",{className:"rl-card__actions",children:[(0,e.jsxs)(l.default,{prefetch:!1,href:`/resume/preview?id=${t.id}`,className:"rl-card__action-btn rl-card__action-btn--view",children:[(0,e.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"}),(0,e.jsx)("circle",{cx:"12",cy:"12",r:"3"})]}),"Preview"]}),(0,e.jsxs)(l.default,{prefetch:!1,href:`/resume/select-theme/?id=${t.id}`,className:"rl-card__action-btn rl-card__action-btn--edit",children:[(0,e.jsx)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:(0,e.jsx)("path",{d:"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"})}),"Edit"]}),(0,e.jsxs)("button",{className:"rl-card__action-btn rl-card__action-btn--delete",onClick:()=>(t=>{if(p(t),window.bootstrap){let t=document.getElementById("completedModal");new window.bootstrap.Modal(t).show()}})(t.id),children:[(0,e.jsxs)("svg",{width:"14",height:"14",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("polyline",{points:"3 6 5 6 21 6"}),(0,e.jsx)("path",{d:"M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"}),(0,e.jsx)("path",{d:"M10 11v6M14 11v6"}),(0,e.jsx)("path",{d:"M9 6V4h6v2"})]}),"Delete"]})]}),(0,e.jsxs)("div",{className:"rl-card__downloads mt-auto d-none",children:[(0,e.jsx)("span",{className:"rl-card__dl-label",children:"Export as"}),(0,e.jsxs)("div",{className:"rl-card__dl-btns",children:[(0,e.jsxs)("button",{type:"button",className:"rl-card__dl-btn",onClick:()=>T(t),title:"Export PDF",children:[(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"}),(0,e.jsx)("polyline",{points:"14 2 14 8 20 8"}),(0,e.jsx)("path",{d:"M9 15h1.5a1.5 1.5 0 0 0 0-3H9v6"})]}),"PDF"]}),(0,e.jsxs)("button",{type:"button",className:"rl-card__dl-btn",onClick:()=>{let e,r;return e=b(t).split("\n").map((t,e)=>{let r=0===e||t&&t===t.toUpperCase()&&t.length<30;return new f.Paragraph({spacing:{after:r?180:100},children:[new f.TextRun({text:t,bold:r,size:0===e?28:22})]})}),r=new f.Document({sections:[{properties:{},children:e}]}),void f.Packer.toBlob(r).then(e=>(0,c.saveAs)(e,`${x(t)}.docx`))},title:"Export Word",children:[(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"}),(0,e.jsx)("polyline",{points:"14 2 14 8 20 8"}),(0,e.jsx)("line",{x1:"16",y1:"13",x2:"8",y2:"13"}),(0,e.jsx)("line",{x1:"16",y1:"17",x2:"8",y2:"17"}),(0,e.jsx)("line",{x1:"10",y1:"9",x2:"8",y2:"9"})]}),"Word"]}),(0,e.jsxs)("button",{type:"button",className:"rl-card__dl-btn",onClick:()=>{let e,r,o;return e=new Blob([b(t)],{type:"text/plain"}),r=URL.createObjectURL(e),void((o=document.createElement("a")).href=r,o.download=`${x(t)}.txt`,o.click(),URL.revokeObjectURL(r))},title:"Export Text",children:[(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"}),(0,e.jsx)("polyline",{points:"14 2 14 8 20 8"}),(0,e.jsx)("line",{x1:"9",y1:"13",x2:"15",y2:"13"}),(0,e.jsx)("line",{x1:"9",y1:"17",x2:"12",y2:"17"})]}),"Text"]}),(0,e.jsxs)("button",{type:"button",className:"rl-card__dl-btn",onClick:()=>j(t),title:"Print",children:[(0,e.jsxs)("svg",{width:"13",height:"13",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("polyline",{points:"6 9 6 2 18 2 18 9"}),(0,e.jsx)("path",{d:"M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"}),(0,e.jsx)("rect",{x:"6",y:"14",width:"12",height:"8"})]}),"Print"]})]})]})]})},t.id)})}):(0,e.jsx)("div",{className:"row",children:(0,e.jsx)("div",{className:"col-12",children:(0,e.jsxs)("div",{className:"rl-empty",children:[(0,e.jsx)("div",{className:"rl-empty__icon-wrap",children:(0,e.jsxs)("svg",{width:"48",height:"48",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"1.2",strokeLinecap:"round",strokeLinejoin:"round",children:[(0,e.jsx)("path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}),(0,e.jsx)("polyline",{points:"15 2 15 8 21 8"}),(0,e.jsx)("line",{x1:"9",y1:"13",x2:"15",y2:"13"}),(0,e.jsx)("line",{x1:"9",y1:"17",x2:"12",y2:"17"})]})}),(0,e.jsx)("h2",{className:"rl-empty__title",children:"No Resumes Yet"}),(0,e.jsx)("p",{className:"rl-empty__sub",children:"You haven't created any resumes. Start building your professional resume in minutes."}),(0,e.jsxs)(l.default,{prefetch:!1,href:"/resume/resume-type",className:"rl-create-btn",children:[(0,e.jsx)("svg",{width:"16",height:"16",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"2.2",strokeLinecap:"round",strokeLinejoin:"round",children:(0,e.jsx)("path",{d:"M12 5v14M5 12h14"})}),"Create Your First Resume"]})]})})})})}),(0,e.jsx)(i.default,{}),(0,e.jsx)(a.default,{}),E&&L&&(0,e.jsx)("div",{id:`resume-list-render-${E.id}`,className:`print-wrapper review-resume-div ${(0,_.getResumeCustomizationClasses)(E.configuration)}`,style:{position:"fixed",left:"-9999px",top:0,width:"800px",background:"#fff",pointerEvents:"none",zIndex:-1,margin:0,padding:0},children:(0,e.jsx)(L,{resumeId:E.id,isForDownload:!0,additionalClass:(0,_.getResumeCustomizationClasses)(E.configuration)})}),(0,e.jsx)("div",{className:"modal fade completedModal",id:"completedModal",tabIndex:"-1","aria-labelledby":"completedModalLabel","data-bs-backdrop":"static","aria-hidden":"true",children:(0,e.jsx)("div",{className:"modal-dialog modal-dialog-centered",children:(0,e.jsx)("div",{className:"modal-content",children:(0,e.jsxs)("div",{className:"modal-body py-4",children:[(0,e.jsx)("img",{src:"/front-assets/images/icons/delete-resume.svg",width:175,height:175,className:"img-fluid mx-auto d-block",alt:"Completed"}),(0,e.jsx)("h5",{className:"heading",children:"Delete This Resume?"}),(0,e.jsx)("p",{className:"sub-heading",children:"Are you sure you want to delete this resume? This action cannot be undone."}),(0,e.jsxs)("div",{className:"btn-div",children:[(0,e.jsx)("button",{className:"cancel-btn","data-bs-dismiss":"modal","aria-label":"Close",children:"Cancel"}),(0,e.jsx)("button",{className:"delete-btn",onClick:()=>{let e=g.filter(t=>t.id!==h);t((0,o.setResumes)(e));let r=document.querySelector(".modal.show");r&&window.bootstrap&&window.bootstrap.Modal.getInstance(r).hide(),s.toast.success("Deleted successfully.",{position:"top-right",autoClose:5e3,closeOnClick:!1,theme:"light"})},children:"Delete"})]})]})})})}),(0,e.jsx)(s.ToastContainer,{})]})}])}]);