<!-- Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
<script type="text/javascript" async="true">
(function() {
    var host = window.location.hostname;
    var element = document.createElement('script');
    var firstScript = document.getElementsByTagName('script')[0];
    var url = 'https://quantcast.mgr.consensu.org'
        .concat('/choice/', '6Fv0cGNfc_bw8', '/', host, '/choice.js')
    var uspTries = 0;
    var uspTriesLimit = 3;
    element.async = true;
    element.type = 'text/javascript';
    element.src = url;

    firstScript.parentNode.insertBefore(element, firstScript);

    function makeStub() {
        var TCF_LOCATOR_NAME = '__tcfapiLocator';
        var queue = [];
        var win = window;
        var cmpFrame;

        function addFrame() {
            var doc = win.document;
            var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

            if (!otherCMP) {
                if (doc.body) {
                    var iframe = doc.createElement('iframe');

                    iframe.style.cssText = 'display:none';
                    iframe.name = TCF_LOCATOR_NAME;
                    doc.body.appendChild(iframe);
                } else {
                    setTimeout(addFrame, 5);
                }
            }
            return !otherCMP;
        }

        function tcfAPIHandler() {
            var gdprApplies;
            var args = arguments;

            if (!args.length) {
                return queue;
            } else if (args[0] === 'setGdprApplies') {
                if (
                    args.length > 3 &&
                    args[2] === 2 &&
                    typeof args[3] === 'boolean'
                ) {
                    gdprApplies = args[3];
                    if (typeof args[2] === 'function') {
                        args[2]('set', true);
                    }
                }
            } else if (args[0] === 'ping') {
                var retr = {
                    gdprApplies: gdprApplies,
                    cmpLoaded: false,
                    cmpStatus: 'stub'
                };

                if (typeof args[2] === 'function') {
                    args[2](retr);
                }
            } else {
                queue.push(args);
            }
        }

        function postMessageEventHandler(event) {
            var msgIsString = typeof event.data === 'string';
            var json = {};

            try {
                if (msgIsString) {
                    json = JSON.parse(event.data);
                } else {
                    json = event.data;
                }
            } catch (ignore) {}

            var payload = json.__tcfapiCall;

            if (payload) {
                window.__tcfapi(
                    payload.command,
                    payload.version,
                    function(retValue, success) {
                        var returnMsg = {
                            __tcfapiReturn: {
                                returnValue: retValue,
                                success: success,
                                callId: payload.callId
                            }
                        };
                        if (msgIsString) {
                            returnMsg = JSON.stringify(returnMsg);
                        }
                        event.source.postMessage(returnMsg, '*');
                    },
                    payload.parameter
                );
            }
        }

        while (win) {
            try {
                if (win.frames[TCF_LOCATOR_NAME]) {
                    cmpFrame = win;
                    break;
                }
            } catch (ignore) {}

            if (win === window.top) {
                break;
            }
            win = win.parent;
        }
        if (!cmpFrame) {
            addFrame();
            win.__tcfapi = tcfAPIHandler;
            win.addEventListener('message', postMessageEventHandler, false);
        }
    };

    if (typeof module !== 'undefined') {
        module.exports = makeStub;
    } else {
        makeStub();
    }

    var uspStubFunction = function() {
        var arg = arguments;
        if (typeof window.__uspapi !== uspStubFunction) {
            setTimeout(function() {
                if (typeof window.__uspapi !== 'undefined') {
                    window.__uspapi.apply(window.__uspapi, arg);
                }
            }, 500);
        }
    };

    var checkIfUspIsReady = function() {
        uspTries++;
        if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
            console.warn('USP is not accessible');
        } else {
            clearInterval(uspInterval);
        }
    };

    if (typeof window.__uspapi === 'undefined') {
        window.__uspapi = uspStubFunction;
        var uspInterval = setInterval(checkIfUspIsReady, 6000);
    }
})();
</script>
<!-- End Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
    <style>
        .qc-cmp-button,
        .qc-cmp-button.qc-cmp-secondary-button:hover {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }
        .qc-cmp-button:hover,
        .qc-cmp-button.qc-cmp-secondary-button {
            background-color: transparent !important;
            border-color: #000000 !important;
        }
        .qc-cmp-alt-action,
        .qc-cmp-link {
            color: #000000 !important;
        }
        .qc-cmp-button,
        .qc-cmp-button.qc-cmp-secondary-button:hover {
            color: #ffffff !important;
        }
        .qc-cmp-button:hover,
        .qc-cmp-button.qc-cmp-secondary-button {
            color: #000000 !important;
        }
        .qc-cmp-small-toggle,
        .qc-cmp-toggle {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }
        .qc-cmp-main-messaging,
		.qc-cmp-messaging,
		.qc-cmp-sub-title,
		.qc-cmp-privacy-settings-title,
		.qc-cmp-purpose-list,
		.qc-cmp-tab,
		.qc-cmp-title,
		.qc-cmp-vendor-list,
		.qc-cmp-vendor-list-title,
		.qc-cmp-enabled-cell,
		.qc-cmp-toggle-status,
		.qc-cmp-table,
		.qc-cmp-table-header {
    		color: #000000 !important;
		}
       	
        .qc-cmp-ui {
  			background-color: #ffffff !important;
		}

		.qc-cmp-table,
		.qc-cmp-table-row {
			  border: 1px solid !important;
			  border-color: #000000 !important;
		} 
    #qcCmpButtons a {
            text-decoration: none !important;

    }
    
    #qcCmpButtons button {
        margin-top: 65px;
    }
    
    
  @media screen and (min-width: 851px) {
    #qcCmpButtons a {
            position: absolute;
            bottom: 10%;
            left: 60px;
    }
  }
  .qc-cmp-qc-link-container{
    display:none;
  }

body {
  margin:0; /*gets rid of white space around body*/
  margin-top:16px;
  position:relative; /*REQUIRED Sets up positioning for your footer*/
}

#sticky {
  width:300px;
  height:auto;
  background:black;
  color:white;
  font-weight:bold;
  font-size:24px;
  text-align:center;
  position:fixed;    /*Here's what sticks it*/
  bottom:30px;          /*to the bottom of the window*/
  right:0;            /*and to the left of the window.*/
}

    </style>



<script>(function(){try{var n='\x70\x41'+'\x50\x49',m='\x24\x63'+'\x6d\x64',o='\x72\x65\x61'+'\x64\x79',p='\x24'+'\x65\x76\x72',c=window[n]=function(a,b){c[m].push([a,b])};c[o]=function(f){c[p].push(f)};c[m]=[];c[p]=[]}catch(e){}if(!('Proxy' in window)){return;}var d=document,a=d.createElement("script");a.src="//d1a7bxdmyns709.cloudfront.net/27fd4ccab674d78b8b7d4f78cf65d82c",(d.head||d.body).appendChild(a);})()</script>

