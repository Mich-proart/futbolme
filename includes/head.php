<?php $static_v=6;
//$raiz="";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<script async src="https://tags.refinery89.com/v2/futbolmecom.js"></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="https://futbolme.eu/img/logo.png" />
<meta name="ga-site-verification" content="UPgOhn36Odw90H6CQqECMmTG" />
<?php if (isset($metaDescripcion)) { ?>
<meta name="description" content="<?php echo $metaDescripcion; ?>" />
<meta property="og:description" content="<?php echo $metaDescripcion; ?>" />
<?php } ?>

<?php if (0 == $_SESSION['app']) { ?>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<?php } else { ?>
<link rel="shortcut icon" href="/touch-icon.png">
<?php  } ?>

<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/apple-touch-icon-57x57-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png" />

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/comunidades.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/paises.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>



<?php require_once __DIR__.'/publicidad/publiHead.php'; ?>

<!-- Infolinks 
<script type="text/javascript"> var infolinks_pid = 3270931; var infolinks_wsid = 0; </script> 
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script> End Infolinks -->

<!-- Sport Local Media -->

<script async src="https://ads.sportslocalmedia.com/slm.prebid.futbolme.js"></script>

<!-- End Sport Local Media -->

<!-- Refinery89 -->
    <script async src="https://tags.refinery89.com/v2/futbolmecom.js"></script>
<!-- End Refinery89 -->

<script data-ad-client="ca-pub-2316935358389492" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


<?php if ($slm===1){ ?>
   <script type='text/javascript'>
    (function(c){
      var s=document.createElement('script');
      s.src='//ads.sportslocalmedia.com/slm.prebid.futbolme.js?'+((new Date).getTime()/1e3/600).toFixed();
      s.type='text/javascript';s.async='true';
      try{ var i=document.getElementsByTagName('script')[0];i.parentNode.insertBefore(s,i); }catch(e){};
    })();
  </script>
<?php } ?>

<?php if ($adeq===1){ ?>
<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
<script>
  window.googletag = window.googletag || {cmd: []};
  googletag.cmd.push(function() {
    googletag.defineSlot('/21820527814/futbolme.com_video_inbanner_300x250_ADEQ', [300, 250], 'div-gpt-ad-1582885377349-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>
<?php } ?>


<!-- 


 -->


<?php if ($themoneytizer===1){ ?>

<div id="13939-11"><script src="//ads.themoneytizer.com/s/gen.js?type=11"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=11"></script></div>


<div id="13939-6"><script src="//ads.themoneytizer.com/s/gen.js?type=6"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=6"></script></div>  

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



<?php } ?>



<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script async src="/js/highcharts.min.js"></script>


    <style type="text/css">
        
        #busquedaEquipos {
            border: solid 1px #333333;
            width: 400px;
            height: 34px;
            margin-top: 5px;
        }
        
        #FinderAntViewMode #list-button, #FinderAntViewMode #grid-button {
            display: none;
        }
        #finderAntMainLayer #finderAntResultsContainer .txt-content div.description {
            height: 16px !important;
        }
        #finderAntMainLayer #finderAntResultsContainer .txt-content {
            position: static !important;
            width: 259px !important;
            float: left !important;
            overflow: hidden !important;
            margin-left: 10px !important;
        }
        #finderAntMainLayer .categoria {
            font-style: italic;
        }
        #finderAntMainLayer .torneos .enlace-torneo {
            display: inline-block;
            width: 100%;
            word-break: break-all;
        }

        #finderAntResultsContainerMobile .enlace-torneo {
            color:navy;
        }

        #finderAntMainLayerMobile .torneos a {
            color: #337ab7 !important;
        }

        #finderAntMainLayerMobile .separador hr {
            border-top: 1px solid #777 !important;
            margin-top: 5px !important;
            margin-bottom: 5px !important;
        }

        #finderAntMainLayerMobile .txt-content div.description {
            height: auto !important;
            overflow: hidden !important;
        }


        #finderAntMainLayer .separador hr {
            border-top: 1px solid #777 !important;
            margin-top: 5px !important;
            margin-bottom: 5px !important;
        }


    </style>

    <script
            src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        var finderant={};
        finderant.parameters={
            se: '49d1b46d8238f34e97e96122ead6e80c',
            inputSelector: 'input#busquedaEquipos',
            layer: 'dropdown',
            fixedLayer: true,
            viewMode: 'list',
            mtop: 0,
            mleft: 0,
            width: 400,
            translations: {
                results: 'resultados',
                writeYourSearch: 'Busca aquí tu equipo',
                close: 'Cerrar'
            }
        };
    </script>
    <script>
        !function(t,n,r,a){e=n.createElement(r),j=n.getElementsByTagName(r)[0],e.async=1,e.src=a,j.parentNode.insertBefore(e,j)}(window,document,"script","/js/futbolme-finderantV2.min.js");
    </script>

