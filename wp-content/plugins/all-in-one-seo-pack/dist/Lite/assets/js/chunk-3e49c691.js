(window["aioseopjsonp"]=window["aioseopjsonp"]||[]).push([["chunk-3e49c691"],{"0d56":function(t,e,i){},"35dd":function(t,e,i){"use strict";i("0d56")},c1a2:function(t,e,i){"use strict";i.r(e);var s=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"domains-report-inner"},[i("base-wp-table",{key:t.tableKey,staticClass:"link-assistant-inner-table",attrs:{columns:t.columns,rows:t.rows,totals:t.rows[0].totals,"bulk-options":t.bulkOptions,loading:t.wpTableLoading,showSearch:!1,showPagination:t.shouldShowPagination,showTableFooter:!1,initialPageNumber:t.initialPageNumber},on:{"process-bulk-action":t.maybeDoBulkAction,paginate:t.processPagination},scopedSlots:t._u([{key:"post_title",fn:function(e){var s=e.row;return[i("strong",[i("a",{staticClass:"edit-link",attrs:{href:s.context.permalink,target:"_blank"}},[t._v(t._s(s.context.postTitle))])]),i("div",{staticClass:"row-actions"},[i("span",{staticClass:"view"},[i("a",{attrs:{href:s.context.permalink,target:"_blank"}},[t._v(t._s(t.strings.viewPost))]),t._v(" | ")]),i("span",{staticClass:"edit"},[i("a",{attrs:{href:s.context.editLink,target:"_blank"}},[t._v(t._s(t.strings.editPost))])])])]}},{key:"phrases",fn:function(e){var s=e.row,n=e.index;return[i("link-assistant-editable-phrase",{attrs:{row:s,rowIndex:n,activeRow:t.activePost,domainsReport:""},on:{delete:t.deleteLink,toggleShowMorePhrases:t.toggleShowMorePhrases,saveModifiedPhrase:t.saveModifiedPhrase}})]}},{key:"publish_date",fn:function(e){var s=e.row;return[i("span",{staticClass:"date"},[t._v(t._s(t.$moment.utc(s.context.publishDate).tz(t.$moment.tz.guess()).format("MMMM D, YYYY")))])]}},{key:"delete",fn:function(e){var s=e.index;return[i("core-tooltip",{attrs:{type:"action"},scopedSlots:t._u([{key:"tooltip",fn:function(){return[t._v(" "+t._s(t.strings.delete)+" ")]},proxy:!0}],null,!0)},[i("svg-trash",{nativeOn:{click:function(e){return t.maybeDoBulkAction({action:"delete",selectedRows:[s]})}}})],1)]}}])}),i("link-assistant-confirmation-modal",{attrs:{strings:t.modalStrings,showModal:t.showModal,selectedRows:t.selectedRows},on:{doBulkAction:t.doBulkAction,closeModal:function(e){t.showModal=!1}}})],1)},n=[],o=i("5530"),a=(i("a9e3"),i("d3b7"),i("b64b"),i("18a5"),i("2f62")),r={props:{domain:{type:String,required:!0},rows:{type:Array,required:!0},activeDomain:{type:Number}},data:function(){return{tableKey:0,activePost:-1,wpTableLoading:!1,showModal:!1,action:"",selectedRows:null,bulkOptions:[{label:this.$t.__("Delete",this.$tdPro),value:"delete"}],strings:{delete:this.$t.__("Delete",this.$tdPro),viewPost:this.$t.__("View Post",this.$tdPro),editPost:this.$t.__("Edit Post",this.$tdPro)},modalStrings:{areYouSureSingle:this.$t.__("Are you sure you want to delete these links for this domain?",this.$tdPro),areYouSureMultiple:this.$t.__("Are you sure you want to delete these links for this domain?",this.$tdPro),areYouSureAll:this.$t.__("Are you sure you want to delete all links for this domain?",this.$tdPro),actionCannotBeUndone:this.$t.__("This action cannot be undone.",this.$tdPro),yesSingle:this.$t.__("Yes, I want to delete these links",this.$tdPro),yesMultiple:this.$t.__("Yes, I want to delete these links",this.$tdPro),yesAll:this.$t.__("Yes, I want to delete all links",this.$tdPro),noChangedMind:this.$t.__("No, I changed my mind",this.$tdPro)}}},computed:Object(o["a"])(Object(o["a"])({},Object(a["e"])(["linkAssistant"])),{},{columns:function(){return[{slug:"post_title",label:this.$t.__("Post Title",this.$tdPro)},{slug:"phrases",label:this.$t.__("Phrases with Links",this.$tdPro)},{slug:"publish_date",label:this.$t.__("Publish Date",this.$tdPro),width:"160px"},{slug:"delete",width:"50px"}]},shouldShowPagination:function(){return 1<this.rows[0].totals.pages},initialPageNumber:function(){if(void 0===this.linkAssistant.domainsReport.innerPagination||void 0===this.linkAssistant.domainsReport.innerPagination[this.domain])return 1;var t=this.linkAssistant.domainsReport.innerPagination[this.domain];return t||1}}),methods:Object(o["a"])(Object(o["a"])(Object(o["a"])({},Object(a["b"])("linkAssistant",["domainsReportInnerBulk","domainsReportInnerPaginate","domainsReportInnerLinkDelete","domainsReportInnerLinkUpdate"])),Object(a["d"])("linkAssistant",["setDomainsReportInnerPaginatedPage"])),{},{toggleShowMorePhrases:function(t){this.activePost!==t?this.activePost=t:this.activePost=-1},deleteLink:function(t){var e=this,i=t.postIndex,s=t.linkIndex;this.wpTableLoading=!0,this.domainsReportInnerLinkDelete({searchTerm:this.linkAssistant.domainsReport.tableFields.searchTerm,rows:this.rows,postIndex:i,linkIndex:s}).then((function(){e.tableKey++,e.$emit("updated")})).finally((function(){e.wpTableLoading=!1}))},saveModifiedPhrase:function(t){var e=this;if(this.linkAssistant.domainsReport.rows[this.activeDomain]){var i=Object.keys(this.linkAssistant.domainsReport.rows[this.activeDomain])[0];i&&this.linkAssistant.domainsReport.rows[this.activeDomain][i][t.postIndex]&&this.linkAssistant.domainsReport.rows[this.activeDomain][i][t.postIndex].links[t.phraseIndex]&&this.linkAssistant.domainsReport.rows[this.activeDomain][i][t.postIndex].links[t.phraseIndex].phrase_html!==t.phraseHtml&&(this.linkAssistant.domainsReport.rows[this.activeDomain][i][t.postIndex].links[t.phraseIndex].phrase=t.phrase,this.linkAssistant.domainsReport.rows[this.activeDomain][i][t.postIndex].links[t.phraseIndex].phrase_html=t.phraseHtml,this.linkAssistant.domainsReport.rows[this.activeDomain][i][t.postIndex].links[t.phraseIndex].anchor=t.anchor,this.wpTableLoading=!0,this.domainsReportInnerLinkUpdate({domainIndex:this.activeDomain,domain:i,link:this.linkAssistant.domainsReport.rows[this.activeDomain][i][t.postIndex].links[t.phraseIndex]}).then((function(){e.tableKey++,e.$emit("updated")})).finally((function(){e.wpTableLoading=!1})))}},maybeDoBulkAction:function(t){var e=t.action,i=t.selectedRows;e&&i.length&&(this.action=e,this.selectedRows=i,this.showModal=!0)},doBulkAction:function(){var t=this;if(this.showModal=!1,"delete"===this.action)return this.wpTableLoading=!0,this.domainsReportInnerBulk({searchTerm:this.linkAssistant.domainsReport.tableFields.searchTerm,action:this.action,domainIndex:this.activeDomain,linkIndexes:this.selectedRows}).then((function(){t.tableKey++,t.$emit("updated")})).finally((function(){t.wpTableLoading=!1}))},processPagination:function(t){var e=this;this.setDomainsReportInnerPaginatedPage({domain:this.domain,page:t}),this.wpTableLoading=!0,this.domainsReportInnerPaginate({domainIndex:this.activeDomain,domain:this.domain,page:t}).then((function(){e.$emit("updated")})).finally((function(){e.wpTableLoading=!1}))}})},l=r,d=(i("35dd"),i("2877")),h=Object(d["a"])(l,s,n,!1,null,null,null);e["default"]=h.exports}}]);