(self.__LOADABLE_LOADED_CHUNKS__=self.__LOADABLE_LOADED_CHUNKS__||[]).push([[2074],{6969:function(e,t,r){"use strict";r.d(t,{UE:function(){return n},mT:function(){return a}});const n=r(67294).createContext({}),a=e=>{let{children:t}=e;return t},{Consumer:o}=n},44594:function(e,t,r){"use strict";r.d(t,{N:function(){return n}});const n=(e,t)=>t},57507:function(e,t,r){"use strict";r.d(t,{i:function(){return n}});const n=e=>e},43711:function(e,t,r){"use strict";r.r(t),r.d(t,{default:function(){return $}});var n=r(67294),a=r(57507),o=r(44594);function l(e,t){if(e.length!==t.length)return!1;for(var r=0;r<e.length;r++)if(e[r]!==t[r])return!1;return!0}var i=function(e,t){var r;void 0===t&&(t=l);var n,a=[],o=!1;return function(){for(var l=[],i=0;i<arguments.length;i++)l[i]=arguments[i];return o&&r===this&&t(l,a)||(n=e.apply(this,l),o=!0,r=this,a=l),n}},c=r(35414);var s=r(64e3),u=r(82382),d=r(32491),m=r(81533),f=r(58021),g=r(31941),p=r(45735);const h=["industry","region","usecase","product","showing"];function E(){const e=(0,s.b)(),t={industry:null,region:null,usecase:null,product:null,showing:null},[r,a]=n.useState(t);return n.useEffect((()=>{const e=new URLSearchParams(location.search),r={...t};h.forEach((t=>{if("showing"===t){const n=e.get(t);(function(e){return"all"===e||null===e})(n)&&(r[t]=n)}else r[t]=e.get(t)})),a(r)}),[]),n.useEffect((()=>{const t=[["industry",r&&r.industry],["region",r&&r.region],["usecase",r&&r.usecase],["product",r&&r.product]].filter((e=>{let[t,r]=e;return!!r})),n=new URLSearchParams(t);window.history.replaceState({},document.head.title,(0,m.Kk)(e,(0,m.Dy)("/",u.l,"/")+`${t.length>0?"?":""}${n.toString()}`))}),[r.industry,r.region,r.usecase,r.product]),[r,a]}function y(e){return h.includes(e)}const v=e=>{const t=t=>{const r=t.target.name;y(r)&&e.setFilters({...e.filters,[r]:""===t.target.value?null:t.target.value})},r={outlineWidth:2,outlineStyle:"solid",outlineColor:"blue2",outlineInnerOffset:2,borderColor:"transparent"};return n.createElement(n.Fragment,null,n.createElement(d.X2,null,n.createElement(d.JX,{lg:12},n.createElement(f.Z,{variant:"body2-bold",marginBottom:1,tag:"P"},e.content.filterBy,":"))),n.createElement(d.X2,{marginBottom:5},n.createElement(d.JX,{lg:3,marginBottom:[2,2,2,0]},n.createElement(d.__,{htmlFor:"industry"},n.createElement(f.Z,{marginBottom:1,display:"none",variant:"body2-bold"},e.filters.industry),n.createElement(p.F,{id:"industry",value:e.filters.industry||void 0,styleprops:{width:"100%",paddingVertical:1,...g.q.body2,focused:r},title:"industry",name:"industry","data-key":"industry",onChange:t},e.englishContent.industryFilter.map(((t,r)=>n.createElement("option",{key:`industry-${t}`,value:0===r?"":t},e.content.industryFilter[r])))))),n.createElement(d.JX,{lg:3,marginBottom:[2,2,2,0]},n.createElement(d.__,{htmlFor:"region"},n.createElement(f.Z,{marginBottom:1,display:"none",variant:"body2-bold"},e.filters.region),n.createElement(p.F,{id:"region",value:e.filters.region||void 0,styleprops:{width:"100%",paddingVertical:1,...g.q.body2,focused:r},title:"region",name:"region","data-key":"region",onChange:t},e.englishContent.regionFilter.map(((t,r)=>n.createElement("option",{key:`region-${t}`,value:0===r?"":t},e.content.regionFilter[r])))))),n.createElement(d.JX,{lg:3,marginBottom:[2,2,2,0]},n.createElement(d.__,{htmlFor:"usecase"},n.createElement(f.Z,{marginBottom:1,display:"none",variant:"body2-bold"},e.filters.usecase),n.createElement(p.F,{id:"usecase",value:e.filters.usecase||void 0,styleprops:{width:"100%",paddingVertical:1,...g.q.body2,focused:r},title:"use case",name:"usecase","data-key":"usecase",onChange:t},e.englishContent.usecaseFilter.map(((t,r)=>n.createElement("option",{key:`usecase-${t}`,value:0===r?"":t},e.content.usecaseFilter[r])))))),n.createElement(d.JX,{lg:3},n.createElement(d.__,{htmlFor:"product"},n.createElement(f.Z,{marginBottom:1,display:"none",variant:"body2-bold"},e.filters.product),n.createElement(p.F,{id:"usecase",value:e.filters.product||void 0,styleprops:{width:"100%",paddingVertical:1,...g.q.body2,focused:r},title:"product",name:"product","data-key":"product",onChange:t},e.englishContent.productFilter.map(((t,r)=>n.createElement("option",{key:`product-${t}`,value:0===r?"":t},e.content.productFilter[r]))))))))};var b=r(99753),C=r(3972),w=r(39138),x=r.n(w),_=r(72791),k=r(99258);const L=e=>{let{learnMoreUrl:t,logo:r,grouped:a,description:o,learnMoreText:l,logos:i}=e;const c=(0,k.T)();return n.createElement(d.ZC,{display:"flex",justifyContent:"between",flexDirection:"column",heightPercentage:100,paddingLeft:[0,0,0,a?4:0]},n.createElement(_.M,{to:t,display:"block",flex:"auto",marginBottom:[10,10,10,0],"data-tracking-action":"click","data-tracking-category":"Case Studies Variant - Product Link","data-tracking-label":t},r&&n.createElement(d.ZC,null,n.createElement(C.o,null,n.createElement(d.Ei,{src:r,style:{maxHeight:"5rem"}})))),n.createElement(f.Z,{variant:"body2",marginTop:0,marginBottom:4,tag:"P"},x()(o,{length:200})),(null==i?void 0:i.length)&&n.createElement(d.ZC,{marginBottom:4,flexWrap:"wrap",display:"flex"},null==i?void 0:i.map(((e,t)=>{const r=t===i.length-1?0:2;return n.createElement(d.Ei,{height:2,key:`${e}-${t}`,marginRight:1,marginBottom:[r,r,r,0],src:e})}))),n.createElement(_.M,Object.assign({to:t,"data-tracking-action":"click","data-tracking-category":"Case Studies Variant - Product Link","data-tracking-label":t},g.q.learnmore,{className:"learn-more"}),l||c("Learn More")))};var N=r(32747);const j=e=>{var t,r,a,o;let{content:l,caseStudy:i,index:c,filtersApplied:s,requestOpenVideoModal:m}=e;return n.createElement(n.Fragment,null,5===c&&l.highlightLogo&&!s&&n.createElement(d.ZC,{style:{gridColumn:"span 3"}},n.createElement(d.ZC,{"data-industry":(i.industryNew52420||[]).join(" | ").toLowerCase(),"data-region":(i.regionNew52520||[]).join(" | ").toLowerCase(),"data-usecase":(i.primaryUseCases||[]).join(" | ").toLowerCase(),"data-product":(i.product||[]).join(" | ").toLowerCase(),border:"all",borderColor:"gray2",paddingHorizontal:[3,3,3,4],paddingVertical:3},n.createElement(d.X2,{alignItems:"stretch"},n.createElement(d.JX,{marginBottom:[5,5,5,0],lg:8,sm:6,className:"h-302px"},l.highlightImage&&n.createElement(C.o,{heightPercentage:100},n.createElement(d.Ei,{heightPercentage:100,width:"100%",className:"image-cover",src:l.highlightImage}))),n.createElement(d.JX,{lg:4,sm:6},n.createElement(L,{learnMoreUrl:l.highlightRelatedProductReadMoreUrl.replace("https://www.cloudflare.com",""),grouped:!0,learnMoreText:l.highlightLearnMoreText,logo:l.highlightLogo,description:l.highlightDescription}))))),i.cloudflareStreamVideoId?n.createElement(d.ZC,{style:{gridColumn:"span 2"}},n.createElement(d.ZC,{"data-industry":(i.industryNew52420||[]).join(" | ").toLowerCase(),"data-region":(i.regionNew52520||[]).join(" | ").toLowerCase(),"data-usecase":(i.primaryUseCases||[]).join(" | ").toLowerCase(),"data-product":(i.product||[]).join(" | ").toLowerCase(),border:"all",borderColor:"gray2",paddingHorizontal:[3,3,3,4],paddingVertical:3},n.createElement(d.X2,{alignItems:"stretch"},n.createElement(d.JX,{marginBottom:[5,5,5,0],lg:6},i.ref_streamVideoThumbnail&&i.ref_streamVideoThumbnail.file&&n.createElement(C.o,{style:{height:"302px"}},n.createElement(d.Ei,{className:"pointer image-cover",heightPercentage:100,width:"100%",src:i.twoCardPreviewImage&&i.twoCardPreviewImage.file?i.twoCardPreviewImage.file.publicURL:i.ref_streamVideoThumbnail.file.publicURL}),n.createElement(d.ZC,{className:"js-case-study-stream-video stream-video-thumbnail-overlay","data-name":i.cloudflareStreamVideoId,onClick:()=>m(i.cloudflareStreamVideoId)})),n.createElement(d.ZC,{"data-name":i.cloudflareStreamVideoId})),n.createElement(d.JX,{lg:6},n.createElement(L,{learnMoreUrl:`/${u.l}/${i.nameUrlSlug}`,logo:(null==i||null===(t=i.logo)||void 0===t||null===(r=t.file)||void 0===r?void 0:r.publicURL)||"",grouped:!0,description:i.shortDescription}))))):n.createElement(d.ZC,null,n.createElement(d.ZC,{className:" { cardDisplayClass } js-case-study-card js-case-study-single-card","data-industry":(i.industryNew52420||[]).join(" | ").toLowerCase(),"data-region":(i.regionNew52520||[]).join(" | ").toLowerCase(),"data-usecase":(i.primaryUseCases||[]).join(" | ").toLowerCase(),"data-product":(i.product||[]).join(" | ").toLowerCase(),border:"all",borderColor:"gray2",paddingHorizontal:[3,3,3,4],paddingVertical:3,style:{height:"352px"}},n.createElement(L,{learnMoreUrl:`/${u.l}/${i.nameUrlSlug}`,logo:(null==i||null===(a=i.logo)||void 0===a||null===(o=a.file)||void 0===o?void 0:o.publicURL)||"",description:i.shortDescription}))))},V=e=>{const[t,r]=n.useState(null);return n.createElement(n.Fragment,null,n.createElement(d.X2,null,n.createElement(d.ZC,{className:"js-no-results dn ph3 center"},n.createElement(d.P,{className:"fw7 lh-copy f5 tc"},e.content.noResults))),n.createElement(N.Z,null,(a=>n.createElement(d.ZC,{style:{display:a.lg?"grid":"flex",gridTemplateColumns:"repeat(3, 1fr)",gridAutoFlow:"dense",gridGap:"32px"},flexWrap:"wrap",marginBottom:[2,2,2,4]},t&&n.createElement(b.I,{streamId:t,isOpen:!!t,closeModal:()=>r(null)}),e.caseStudies.map(((t,a)=>n.createElement(j,{content:e.content,caseStudy:t,filtersApplied:e.filtersApplied,index:a,key:t.id,requestOpenVideoModal:e=>r(e)})))))),n.createElement(d.ZC,{display:"flex",justifyContent:"center"},e.isTruncated&&n.createElement(d.zx,Object.assign({type:"button","aria-label":e.content.loadMore,backgroundColor:"transparent",borderColor:"blue1",border:"all",color:"blue1",className:"wide-btn pointer",hovered:{borderColor:"bluehover",color:"bluehover"},focused:{outlineWidth:2,outlineStyle:"solid",outlineColor:"blue1",outlineInnerOffset:2,borderColor:"transparent"},borderWidth:2,paddingVertical:2},g.q.learnmore,{onClick:e.loadMore}),e.content.loadMore)))};var S=r(45601),I=r(89087),D=r(79611),F=r(54500),Z=r(21877),B=r(78918),U=r(70339),M=r(6969);const P={industry:"industryNew52420",region:"regionNew52520",usecase:"primaryUseCases",product:"product"};const T=i((function(e){return e.reduce(((e,t)=>{if(!t.meta_templateVariableName)throw new Error(`no meta_templateVariableName found for ${t}`);const r=t.meta_templateVariableName.endsWith("[]"),n=r?t.meta_templateVariableName.substr(0,t.meta_templateVariableName.length-2):t.meta_templateVariableName;if(r)e[n]=e[n]?e[n].concat(t.mkd_content):[t.mkd_content];else{if(e[n])throw new Error(`duplicate key name ${n}`);e[n]=t.mkd_content}return e}),{})}));function O(e,t){return new Date(t.orderDate).valueOf()-new Date(e.orderDate).valueOf()}const R=e=>{let{data:t,pageContext:r}=e;const l=(0,U.m)();let{page:i,englishPage:s,caseStudies:u,enablement:m,features:f,footerData:g,hero:p,headerData:h,quote:b}=t;"staging"===l.targetEnv&&(i=(0,a.i)(i),s=(0,a.i)(s),m=(0,a.i)(m),f=(0,a.i)(f),g=(0,a.i)(g),p=(0,a.i)(p),b=(0,a.i)(b),h=(0,a.i)(h),u=(0,o.N)("caseStudy",u,{"fields.hideFromCaseStudiesPage[ne]":!0}));const{nodes:C}=u,[w,x]=E(),_=T(i.ref_template.ref_content),k=T(s.ref_template.ref_content),L=function(e){return e.filter((e=>e.cloudflareStreamVideoId))}(C),N=function(e){return e.filter((e=>!e.cloudflareStreamVideoId))}(C),j=function(e,t){let r=[],n=e.sort(O),a=t.sort(O);const o=n.length+a.length;for(let l=0;l<o;l++)if((0===l||l%12==0)&&n.length>0){const e=n.shift();e&&r.push(e)}else if(a.length>0){const e=a.shift();e&&r.push(e)}return r}(L,N),M=function(e,t){return e.filter((e=>Object.keys(P).every((r=>{if(!y(r))return!0;const n=t[r];if(null===n)return!0;const a=e[P[r]];return!!Array.isArray(a)&&a.includes(n)})))).filter(((e,r)=>"all"===t.showing||r<=12))}(j,w);return n.createElement(S.Z,{headerData:h,pageContext:r,footerData:g},n.createElement(c.q,null,n.createElement("title",null,i.str_metadataDescription," | Cloudflare"),n.createElement("meta",{name:"title",content:i.str_pageTitle}),n.createElement("meta",{name:"description",content:i.str_metadataDescription})),n.createElement(d.ZC,null,n.createElement(I.l,{blade:p,page:{contentTypeId:"page",contentfulId:"",relativePath:"",pageName:"",metaTitle:"",metaDescription:""}}),n.createElement(D.FeaturesBlade,{blade:f}),n.createElement(d.W2,null,n.createElement(B.i,{paddingVertical:0})),n.createElement(d.W2,{paddingTop:[4,4,4,9],paddingBottom:[7,7,7,10]},n.createElement(v,{englishContent:k,content:_,filters:w,setFilters:x}),n.createElement(V,{caseStudies:M,content:_,isTruncated:"all"!==w.showing&&M.length>=12,filtersApplied:Object.keys(w).some((e=>null!==w[e])),loadMore:()=>x({...w,showing:"all"})})),n.createElement(F.QuoteBlade,{blade:b}),n.createElement(Z.M,{page:{contentTypeId:"page",contentfulId:"",relativePath:"",pageName:"",metaTitle:"",metaDescription:""},blade:m})))};var $=e=>n.createElement(M.mT,{pollingInterval:1e4},n.createElement(R,e))},82382:function(e,t,r){"use strict";r.d(t,{l:function(){return n}});const n="/case-studies"},48983:function(e,t,r){var n=r(40371)("length");e.exports=n},44286:function(e){e.exports=function(e){return e.split("")}},23933:function(e,t,r){var n=r(44239),a=r(37005);e.exports=function(e){return a(e)&&"[object RegExp]"==n(e)}},14259:function(e){e.exports=function(e,t,r){var n=-1,a=e.length;t<0&&(t=-t>a?0:a+t),(r=r>a?a:r)<0&&(r+=a),a=t>r?0:r-t>>>0,t>>>=0;for(var o=Array(a);++n<a;)o[n]=e[n+t];return o}},40180:function(e,t,r){var n=r(14259);e.exports=function(e,t,r){var a=e.length;return r=void 0===r?a:r,!t&&r>=a?e:n(e,t,r)}},62689:function(e){var t=RegExp("[\\u200d\\ud800-\\udfff\\u0300-\\u036f\\ufe20-\\ufe2f\\u20d0-\\u20ff\\ufe0e\\ufe0f]");e.exports=function(e){return t.test(e)}},88016:function(e,t,r){var n=r(48983),a=r(62689),o=r(21903);e.exports=function(e){return a(e)?o(e):n(e)}},83140:function(e,t,r){var n=r(44286),a=r(62689),o=r(676);e.exports=function(e){return a(e)?o(e):n(e)}},21903:function(e){var t="[\\ud800-\\udfff]",r="[\\u0300-\\u036f\\ufe20-\\ufe2f\\u20d0-\\u20ff]",n="\\ud83c[\\udffb-\\udfff]",a="[^\\ud800-\\udfff]",o="(?:\\ud83c[\\udde6-\\uddff]){2}",l="[\\ud800-\\udbff][\\udc00-\\udfff]",i="(?:"+r+"|"+n+")"+"?",c="[\\ufe0e\\ufe0f]?",s=c+i+("(?:\\u200d(?:"+[a,o,l].join("|")+")"+c+i+")*"),u="(?:"+[a+r+"?",r,o,l,t].join("|")+")",d=RegExp(n+"(?="+n+")|"+u+s,"g");e.exports=function(e){for(var t=d.lastIndex=0;d.test(e);)++t;return t}},676:function(e){var t="[\\ud800-\\udfff]",r="[\\u0300-\\u036f\\ufe20-\\ufe2f\\u20d0-\\u20ff]",n="\\ud83c[\\udffb-\\udfff]",a="[^\\ud800-\\udfff]",o="(?:\\ud83c[\\udde6-\\uddff]){2}",l="[\\ud800-\\udbff][\\udc00-\\udfff]",i="(?:"+r+"|"+n+")"+"?",c="[\\ufe0e\\ufe0f]?",s=c+i+("(?:\\u200d(?:"+[a,o,l].join("|")+")"+c+i+")*"),u="(?:"+[a+r+"?",r,o,l,t].join("|")+")",d=RegExp(n+"(?="+n+")|"+u+s,"g");e.exports=function(e){return e.match(d)||[]}},96347:function(e,t,r){var n=r(23933),a=r(7518),o=r(31167),l=o&&o.isRegExp,i=l?a(l):n;e.exports=i},18601:function(e,t,r){var n=r(14841),a=1/0;e.exports=function(e){return e?(e=n(e))===a||e===-1/0?17976931348623157e292*(e<0?-1:1):e==e?e:0:0===e?e:0}},40554:function(e,t,r){var n=r(18601);e.exports=function(e){var t=n(e),r=t%1;return t==t?r?t-r:t:0}},39138:function(e,t,r){var n=r(80531),a=r(40180),o=r(62689),l=r(13218),i=r(96347),c=r(88016),s=r(83140),u=r(40554),d=r(79833),m=/\w*$/;e.exports=function(e,t){var r=30,f="...";if(l(t)){var g="separator"in t?t.separator:g;r="length"in t?u(t.length):r,f="omission"in t?n(t.omission):f}var p=(e=d(e)).length;if(o(e)){var h=s(e);p=h.length}if(r>=p)return e;var E=r-c(f);if(E<1)return f;var y=h?a(h,0,E).join(""):e.slice(0,E);if(void 0===g)return y+f;if(h&&(E+=y.length-E),i(g)){if(e.slice(E).search(g)){var v,b=y;for(g.global||(g=RegExp(g.source,d(m.exec(g))+"g")),g.lastIndex=0;v=g.exec(b);)var C=v.index;y=y.slice(0,void 0===C?E:C)}}else if(e.indexOf(n(g),E)!=E){var w=y.lastIndexOf(g);w>-1&&(y=y.slice(0,w))}return y+f}}}]);
//# sourceMappingURL=component---src-components-case-studies-templates-case-studies-template-tsx-b8a32cdd32df43b3f805.js.map