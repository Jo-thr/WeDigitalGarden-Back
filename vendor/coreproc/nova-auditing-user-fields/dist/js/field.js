!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:r})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=1)}([function(e,t){e.exports=function(e,t,n,r,o,i){var s,u=e=e||{},a=typeof e.default;"object"!==a&&"function"!==a||(s=e,u=e.default);var l,d="function"==typeof u?u.options:u;if(t&&(d.render=t.render,d.staticRenderFns=t.staticRenderFns,d._compiled=!0),n&&(d.functional=!0),o&&(d._scopeId=o),i?(l=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),r&&r.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(i)},d._ssrRegister=l):r&&(l=r),l){var c=d.functional,f=c?d.render:d.beforeCreate;c?(d._injectStyles=l,d.render=function(e,t){return l.call(t),f(e,t)}):d.beforeCreate=f?[].concat(f,l):[l]}return{esModule:s,exports:u,options:d}}},function(e,t,n){n(2),e.exports=n(9)},function(e,t,n){Nova.booting(function(e,t){e.component("index-nova-auditing-user-field",n(3)),e.component("detail-nova-auditing-user-field",n(6))})},function(e,t,n){var r=n(0)(n(4),n(5),!1,null,null,null);e.exports=r.exports},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["resourceName","field"]}},function(e,t){e.exports={render:function(){var e=this.$createElement,t=this._self._c||e;return t("span",[this.field.value?t("span",[t("router-link",{staticClass:"no-underline dim text-primary font-bold",attrs:{to:{name:"detail",params:{resourceName:this.field.auditingUserResource,resourceId:this.field.auditingUserResourceId}}}},[this._v("\n            "+this._s(this.field.value)+"\n        ")])],1):t("span",[this._v("—")])])},staticRenderFns:[]}},function(e,t,n){var r=n(0)(n(7),n(8),!1,null,null,null);e.exports=r.exports},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["resource","resourceName","resourceId","field"]}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("panel-item",{attrs:{field:e.field}},[n("template",{slot:"value"},[e.field.value?n("router-link",{staticClass:"no-underline font-bold dim text-primary",attrs:{to:{name:"detail",params:{resourceName:e.field.auditingUserResource,resourceId:e.field.auditingUserResourceId}}}},[e._v("\n      "+e._s(e.field.value)+"\n    ")]):n("p",[e._v("—")])],1)],2)},staticRenderFns:[]}},function(e,t){}]);