﻿window.Silverlight||(window.Silverlight={}),Silverlight._silverlightCount=0,Silverlight.fwlinkRoot="http://go2.microsoft.com/fwlink/?LinkID=",Silverlight.onGetSilverlight=null,Silverlight.onSilverlightInstalled=function(){window.location.reload(!1)},Silverlight.isInstalled=function(e){var i=!1,t=null;try{var l=null;try{l=new ActiveXObject("AgControl.AgControl"),null==e?i=!0:l.IsVersionSupported(e)&&(i=!0),l=null}catch(r){var n=navigator.plugins["Silverlight Plug-In"];if(n)if(null===e)i=!0;else{var o=n.description;"1.0.30226.2"===o&&(o="2.0.30226.2");for(var a=o.split(".");a.length>3;)a.pop();for(;a.length<4;)a.push(0);for(var v=e.split(".");v.length>4;)v.pop();var s,h,g=0;do s=parseInt(v[g]),h=parseInt(a[g]),g++;while(g<v.length&&s===h);h>=s&&!isNaN(s)&&(i=!0)}}}catch(r){i=!1}return t&&document.body.removeChild(t),i},Silverlight.WaitForInstallCompletion=function(){if(!Silverlight.isBrowserRestartRequired&&Silverlight.onSilverlightInstalled){try{navigator.plugins.refresh()}catch(e){}Silverlight.isInstalled(null)?Silverlight.onSilverlightInstalled():setTimeout(Silverlight.WaitForInstallCompletion,3e3)}},Silverlight.__startup=function(){Silverlight.isBrowserRestartRequired=Silverlight.isInstalled(null),Silverlight.isBrowserRestartRequired||Silverlight.WaitForInstallCompletion(),window.removeEventListener?window.removeEventListener("load",Silverlight.__startup,!1):window.detachEvent("onload",Silverlight.__startup)},window.addEventListener?window.addEventListener("load",Silverlight.__startup,!1):window.attachEvent("onload",Silverlight.__startup),Silverlight.createObject=function(e,i,t,l,r,n,o){var a=new Object,v=l,s=r;if(a.version=v.version,v.source=e,a.alt=v.alt,n&&(v.initParams=n),v.isWindowless&&!v.windowless&&(v.windowless=v.isWindowless),v.framerate&&!v.maxFramerate&&(v.maxFramerate=v.framerate),t&&!v.id&&(v.id=t),delete v.ignoreBrowserVer,delete v.inplaceInstallPrompt,delete v.version,delete v.isWindowless,delete v.framerate,delete v.data,delete v.src,delete v.alt,Silverlight.isInstalled(a.version)){for(var h in s)if(s[h]){if("onLoad"==h&&"function"==typeof s[h]&&1!=s[h].length){var g=s[h];s[h]=function(e){return g(document.getElementById(t),o,e)}}var d=Silverlight.__getHandlerName(s[h]);if(null==d)throw"typeof events."+h+" must be 'function' or 'string'";v[h]=d,s[h]=null}slPluginHTML=Silverlight.buildHTML(v)}else slPluginHTML=Silverlight.buildPromptHTML(a);return i?void(i.innerHTML=slPluginHTML):slPluginHTML},Silverlight.buildHTML=function(e){var i=[];i.push('<object type="application/x-silverlight" data="data:application/x-silverlight,"'),null!=e.id&&i.push(' id="'+e.id+'"'),null!=e.width&&i.push(' width="'+e.width+'"'),null!=e.height&&i.push(' height="'+e.height+'"'),i.push(" >"),delete e.id,delete e.width,delete e.height;for(var t in e)e[t]&&i.push('<param name="'+Silverlight.HtmlAttributeEncode(t)+'" value="'+Silverlight.HtmlAttributeEncode(e[t])+'" />');return i.push("</object>"),i.join("")},Silverlight.createObjectEx=function(e){var i=e,t=Silverlight.createObject(i.source,i.parentElement,i.id,i.properties,i.events,i.initParams,i.context);return null==i.parentElement?t:void 0},Silverlight.buildPromptHTML=function(e){var i="",t=Silverlight.fwlinkRoot,l=e.version;return e.alt?i=e.alt:(l||(l=""),i="<a href='javascript:Silverlight.getSilverlight(\"{1}\");' style='text-decoration: none;'><img src='{2}' alt='Get Microsoft Silverlight' style='border-style: none'/></a>",i=i.replace("{1}",l),i=i.replace("{2}",t+"108181")),i},Silverlight.getSilverlight=function(e){Silverlight.onGetSilverlight&&Silverlight.onGetSilverlight();var i="",t=String(e).split(".");if(t.length>1){var l=parseInt(t[0]);i=isNaN(l)||2>l?"1.0":t[0]+"."+t[1]}var r="";i.match(/^\d+\056\d+$/)&&(r="&v="+i),Silverlight.followFWLink("114576"+r)},Silverlight.followFWLink=function(e){top.location=Silverlight.fwlinkRoot+String(e)},Silverlight.HtmlAttributeEncode=function(e){var i,t="";if(null==e)return null;for(var l=0;l<e.length;l++)i=e.charCodeAt(l),i>96&&123>i||i>64&&91>i||i>43&&58>i&&47!=i||95==i?t+=String.fromCharCode(i):t=t+"&#"+i+";";return t},Silverlight.default_error_handler=function(e,i){var t,l=i.ErrorType;t=i.ErrorCode;var r="\nSilverlight error message     \n";r+="ErrorCode: "+t+"\n",r+="ErrorType: "+l+"       \n",r+="Message: "+i.ErrorMessage+"     \n","ParserError"==l?(r+="XamlFile: "+i.xamlFile+"     \n",r+="Line: "+i.lineNumber+"     \n",r+="Position: "+i.charPosition+"     \n"):"RuntimeError"==l&&(0!=i.lineNumber&&(r+="Line: "+i.lineNumber+"     \n",r+="Position: "+i.charPosition+"     \n"),r+="MethodName: "+i.methodName+"     \n"),alert(r)},Silverlight.__cleanup=function(){for(var e=Silverlight._silverlightCount-1;e>=0;e--)window["__slEvent"+e]=null;Silverlight._silverlightCount=0,window.removeEventListener?window.removeEventListener("unload",Silverlight.__cleanup,!1):window.detachEvent("onunload",Silverlight.__cleanup)},Silverlight.__getHandlerName=function(e){var i="";if("string"==typeof e)i=e;else if("function"==typeof e){0==Silverlight._silverlightCount&&(window.addEventListener?window.addEventListener("onunload",Silverlight.__cleanup,!1):window.attachEvent("onunload",Silverlight.__cleanup));var t=Silverlight._silverlightCount++;i="__slEvent"+t,window[i]=e}else i=null;return i};