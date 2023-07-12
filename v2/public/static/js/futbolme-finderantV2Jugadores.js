//var finderantEquipos = (function() {
    timesCheckedJQuery = 0;
    url_finderant_server = "https://search.finderant.com/v2/";
    click_url_finderant_server = "https://click.finderant.com/";
    nCurrentSearch = 1;
    nLastSearchDisplayed = 0;
    finderAntAvailablesViewModes = ["list", "grid"];
    finderAntLayerIsCreated = false;
    isMobile = checkIsMobile();
    finderAntLayerType = typeof finderant.parameters.layer == "undefined" ? "dropdown" : finderant.parameters.layer;
    finderAntViewMode = typeof finderant.parameters.viewMode == "undefined" ? "list" : finderant.parameters.viewMode;
    containerId = typeof finderant.parameters.containerId == "undefined" ? "" : finderant.parameters.containerId;
    finderant.parameters.translations = typeof finderant.parameters.translations == "undefined" ? {} : finderant.parameters.translations;
    langResults = typeof finderant.parameters.translations.results == "undefined" ? "resultados" : finderant.parameters.translations.results;
    langWriteYourSearch = typeof finderant.parameters.translations.writeYourSearch == "undefined" ? "Escribe tu búsqueda" : finderant.parameters.translations.writeYourSearch;
    langClose = typeof finderant.parameters.translations.close == "undefined" ? "Cerrar" : finderant.parameters.translations.close;
    checkJQuery();
    function checkJQuery() {
        var a = window.jQuery;
        if (!a) {
            timesCheckedJQuery++;
            setTimeout(function () {
                checkJQuery();
            }, 500);
        } else {
            initFAScripts();
        }
    }
    function initFAScripts() {
        scrollTop = jQuery(window).scrollTop();
        lastScrollTop = scrollTop;
        jQuery("<link/>", { rel: "stylesheet", type: "text/css", href: "https://static.finderant.com/css/finderant/v1.9.1.min.css" }).appendTo("head");
        jQuery("<link/>", { rel: "stylesheet", type: "text/css", href: "https://static.finderant.com/css/jquery.jscrollpane/v2.0.21.css" }).appendTo("head");
        jQuery.when(jQuery.getScript("//static.finderant.com/js/jquery.mousewheel/v3.1.9.js")).done(function () {
            jQuery.when(jQuery.getScript("//static.finderant.com/js/jquery.jscrollpane/v2.0.21.js")).done(function () {
                finderAntInputSelector = jQuery(finderant.parameters.inputSelector);
                finderAntNrp = finderant.parameters.nrp;
                finderAntLayerWidth = typeof finderant.parameters.width == "undefined" ? finderAntInputSelector.outerWidth() : finderant.parameters.width;
                createFinderAntLayer();
                jQuery(finderAntInputSelector).attr("autocomplete", "off");
                detectKeys();
                jQuery(document).on("click", ".item-product-individual", function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    var c = a.target;
                    var d = jQuery("#finderAntMainLayer").data("searchId");
                    var b = !(c.closest(".torneos") == null);
                    if (!b) {
                        document.location.href = jQuery(this).data("product-url");
                    } else {
                        var e = jQuery(c).prop("href");
                        if (typeof e != "undefined") {
                            document.location.href = e;
                        }
                    }
                    saveClickAction(jQuery(this), b, d);
                });
                if (isMobile) {
                    lauchMobileLayer();
                    jQuery(document).on("keyup", "#finderAntInputMobile", function (a) {
                        detectKeys();
                    });
                    jQuery(document).on("click, click touchstart, click touch, focusin, keyup", finderAntInputSelector, function (a) {
                        lauchMobileLayer();
                    });
                } else {
                    jQuery(document).on("keyup", finderAntInputSelector, function (a) {
                        detectKeys();
                    });
                    jQuery(document).on("click", ".FAAddToCartPrestaShop", function (b) {
                        b.stopPropagation();
                        b.preventDefault();
                        var a = jQuery(this).data("id-product");
                        prestashopAddToCart(a);
                    });
                    jQuery(document).on("DOMSubtreeModified", "#finderAntResultsContainer .jspPane", function (a) {
                        api.reinitialise();
                    });
                }
            });
        });
        jQuery(document).on("click", "body", function (i) {
            var d = jQuery(this).offset();
            var m = i.pageX - d.left;
            var k = i.pageY - d.top;
            if (jQuery("#finderAntMainLayer").length == 1 && jQuery("#finderAntMainLayer").css("display") == "block") {
                var n = jQuery("#finderAntMainLayer").offset();
                var h = n.top;
                var o = n.left;
                var g = jQuery("#finderAntMainLayer").width();
                var c = jQuery("#finderAntMainLayer").height();
                var s = h;
                var f = o;
                var a = o + g;
                var j = h + c;
                if (!(k >= s && k <= j && m >= f && m <= a)) {
                    hideFinderAntLayer();
                }
            }
        });
        if (isMobile) {
            lastMobileScrollPosition = 0;
            document.addEventListener(
                "scroll",
                function (d) {
                    if (event.target.id != "finderAntResultsContainerMobile") {
                        return false;
                    }
                    var g = jQuery("#finderAntResultsContainerMobile").scrollTop();
                    if (g <= lastMobileScrollPosition) {
                        lastMobileScrollPosition = g;
                        return false;
                    }
                    lastMobileScrollPosition = g;
                    var h = jQuery(window).height();
                    var c = parseInt(h * 1.3);
                    var b = jQuery("#finderAntResultsContainerMobile .item-product-individual:last-child");
                    var f = b.offset();
                    if (typeof f == "undefined") {
                        return false;
                    }
                    var a = f.top;
                    if (a < c) {
                        startSearch(finderAntLastP + 1);
                        jQuery("#finderAntResultsContainerMobile").append('<div class="finderant-loading" style="float:left; width:100%; text-align: center; padding: 25px 0px;">Cargando...</div>');
                    }
                },
                true
            );
        } else {
            if (finderAntLayerType == "embedded") {
                jQuery(window).scroll(function (a) {
                    scrollTop = jQuery(window).scrollTop();
                    if (scrollTop > lastScrollTop) {
                        if (jQuery("#" + getOldEmbeddedContainerId()).length == 1) {
                            ultimoProducto = jQuery("#" + getEmbeddedContainerId() + " .item-product-individual:last");
                            distanciaTopUltimoProducto = ultimoProducto.offset().top;
                            bottomUltimoProducto = distanciaTopUltimoProducto + ultimoProducto.height();
                            alturaDeCarga = bottomUltimoProducto - window.innerHeight;
                            if (scrollTop > alturaDeCarga && !isLoading) {
                                startSearch(finderAntLastP + 1);
                                jQuery("#" + getEmbeddedContainerId()).append('<div class="finderant-loading" style="float:left; width:100%; text-align: center; padding: 25px 0px;">Cargando...</div>');
                            }
                        }
                    }
                    lastScrollTop = scrollTop;
                });
                jQuery(document).on("click", "#list-button-embedded", function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    finderAntViewMode = "list";
                    jQuery("#finderAntResultsContainerEmbedded").removeClass("grid-container").addClass("list-container");
                });
                jQuery(document).on("click", "#grid-button-embedded", function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    finderAntViewMode = "grid";
                    jQuery("#finderAntResultsContainerEmbedded").removeClass("list-container").addClass("grid-container");
                });
            } else {
                jQuery(document).on("click", "#list-button", function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    finderAntViewMode = "list";
                    jQuery("#finderAntResultsContainer").removeClass("grid-container").addClass("list-container");
                });
                jQuery(document).on("click", "#grid-button", function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    finderAntViewMode = "grid";
                    jQuery("#finderAntResultsContainer").removeClass("list-container").addClass("grid-container");
                });
                jQuery(window).resize(function () {
                    changeProperties();
                });
            }
        }
        if (isMobile) {
            jQuery(document).on("click", "#finderAntCloseButtonMobile", function (a) {
                a.preventDefault();
                a.stopPropagation();
                closeFinderAntMobile();
            });
        }
    }
    function createFinderAntLayer() {
        finderAntLastWindowHeight = 0;
        finderAntLastWindowWidth = 0;
        jQuery("body").append(
            '<div id="finderAntMainLayer"><div id="finderAntTopContainer"><div id="FinderAntViewMode"><a href="" id="list-button"><div class="list-element"></div><div class="list-element"></div><div class="list-element"></div></a><a href="" id="grid-button"><div class="grid-element"></div><div class="grid-element"></div><div class="grid-element"></div><div class="grid-element"></div></a></div><div id="finderAntNResults"></div></div><div id="finderAntResultsContainer"></div></div>'
        );
        if (finderAntLayerType == "float") {
            if (finderAntAvailablesViewModes.indexOf(finderAntViewMode) > -1) {
                jQuery("#finderAntResultsContainer").addClass(finderAntViewMode + "-container");
            }
        }
        api = jQuery("#finderAntMainLayer #finderAntResultsContainer").jScrollPane({ maintainPosition: false }).data("jsp");
        jQuery(document).on("jsp-scroll-y", "#finderAntMainLayer #finderAntResultsContainer", function (c, b, d, a) {
            checkIfNeedLoadMoreResults();
        });
        finderAntLayerIsCreated = true;
    }
    function checkIfNeedLoadMoreResults() {
        if (jQuery("#finderAntResultsContainer .jspTrack").length == 0) {
            startSearch(finderAntLastP + 1);
        } else {
            var e = jQuery("#finderAntResultsContainer .jspTrack").height();
            var c = jQuery("#finderAntResultsContainer .jspDrag").height();
            var a = e - c;
            var d = jQuery("#finderAntResultsContainer .jspDrag").position().top;
            var f = a - d;
            var b = (f * 100) / a;
            if (b <= 20) {
                startSearch(finderAntLastP + 1);
            }
        }
    }
    function changeProperties() {
        if (!finderAntLayerIsCreated) {
            return false;
        }
        if (finderAntLastWindowHeight == jQuery(window).height() && finderAntLastWindowWidth == jQuery(window).width()) {
            return false;
        }
        if (finderAntLayerType == "embedded") {
            return false;
        }
        var g = finderAntInputSelector.offset();
        var i = parseInt(g.top) + parseInt(finderAntInputSelector.outerHeight());
        var b = parseInt(g.left);
        var f = typeof finderant.parameters.width == "undefined" ? finderAntInputSelector.outerWidth() : finderant.parameters.width;
        if (f < 1) {
            f = 100;
        }
        isFixedLayer = typeof finderant.parameters.fixedLayer != "undefined" && finderant.parameters.fixedLayer == true ? true : false;
        var h = i + finderant.parameters.mtop;
        var d = h - window.pageYOffset;
        var a = jQuery(window).height() - i - 20;
        jQuery("#finderAntMainLayer").css({ top: h + "px", "max-height": a + "px" });
        if (isFixedLayer) {
            var j = jQuery(window).height() - d - 20 - 41;
        } else {
            var j = jQuery(window).height() - i - 20 - 41;
        }
        jQuery("#finderAntMainLayer #finderAntResultsContainer").css({ height: j + "px" });
        if (finderAntLayerType == "dropdown") {
            jQuery("#finderAntMainLayer").css({ left: b + finderant.parameters.mleft + "px", width: f + "px" });
            jQuery("#finderAntMainLayer #finderAntResultsContainer").css({ width: f + "px", "min-width": f + "px", height: jQuery(window).height() - i - 20 - 41 + "px" });
        } else {
            if (finderAntLayerType == "float") {
                var e = typeof finderant.parameters.percentWidth == "undefined" ? 75 : finderant.parameters.percentWidth;
                var c = (Math.round(($(window).width() / 100) * e) / 2) * -1 + finderant.parameters.mleft + "px";
                jQuery("#finderAntMainLayer").css({ top: h + "px", left: "50%", "margin-left": c, width: e + "%" });
                jQuery("#finderAntMainLayer #finderAntResultsContainer").css({ "min-width": e + "%" });
            }
        }
        if (isFixedLayer) {
            jQuery("#finderAntMainLayer").css({ position: "fixed", top: d + "px" });
        }
        api.reinitialise();
        finderAntLastWindowHeight = jQuery(window).height();
        finderAntLastWindowWidth = jQuery(window).width();
    }
    function hideFinderAntLayer() {
        if (isMobile) {
            return false;
        }
        if (finderAntLayerType == "embedded") {
            if (jQuery("#" + getOldEmbeddedContainerId()).length == 1) {
                jQuery("#" + getEmbeddedContainerId()).remove();
                jQuery("#" + getOldEmbeddedContainerId())
                    .attr("id", getEmbeddedContainerId())
                    .css("display", "block");
            }
        } else {
            jQuery("#finderAntMainLayer").css("display", "none");
        }
    }
    function displayFinderAntLayer() {
        if (isMobile) {
            return false;
        }
        if (finderAntLayerType == "embedded") {
            if (jQuery("#" + getOldEmbeddedContainerId()).length == 0) {
                jQuery("#" + getEmbeddedContainerId())
                    .attr("id", getOldEmbeddedContainerId())
                    .css("display", "none");
                jQuery("#" + getOldEmbeddedContainerId()).after(
                    '<div id="' +
                        getEmbeddedContainerId() +
                        '" class="finderAntContainerEmbedded"><div id="finderAntTopContainerEmbedded"><div id="FinderAntViewModeEmbedded"><a href="" id="list-button-embedded"><div class="list-element"></div><div class="list-element"></div><div class="list-element"></div></a><a href="" id="grid-button-embedded"><div class="grid-element"></div><div class="grid-element"></div><div class="grid-element"></div><div class="grid-element"></div></a></div><div id="finderAntNResultsEmbedded"></div></div><div id="finderAntResultsContainerEmbedded"></div></div>'
                );
                if (finderAntAvailablesViewModes.indexOf(finderAntViewMode) > -1) {
                    jQuery("#finderAntResultsContainerEmbedded").addClass(finderAntViewMode + "-container");
                }
            }
        } else {
            jQuery("#finderAntMainLayer").css("display", "block");
        }
    }
    finderAntLastQ = "";
    finderAntLastP = 0;
    function startSearch(c, a) {
        displayFinderAntLayer();
        if (isMobile) {
            q = c == 1 ? jQuery("#finderAntInputMobile").val() : finderAntLastQ;
        } else {
            q = c == 1 ? jQuery(finderant.parameters.inputSelector).val() : finderAntLastQ;
        }
        if (finderAntLastQ == q && c <= finderAntLastP && !a) {
            return false;
        }
        finderAntLastQ = q;
        finderAntLastP = c;
        q = jQuery.trim(q);
        nCurrentSearch++;
        var b = { se: finderant.parameters.se, p: c, q: q, nCurrentSearch: nCurrentSearch };
        if (typeof finderAntNrp != "undefined") {
            b.n = finderAntNrp;
        }
        jQuery.ajax({ url: url_finderant_server, type: "POST", dataType: "json", data: b, cache: false }).done(function (g) {
            jQuery("#finderAntNResults").html(g.n_results + " " + langResults);
            jQuery("#finderAntMainLayer").data("searchId", g.searchId);
            var f = "";
            jQuery.each(g.search_result, function (l, r) {
                var o = r.additional.hasOwnProperty("price_wor") ? r.additional.price_wor : "";
                var n = "";
                if (o !== "" && o > r.price) {
                    n += '<div class="price-wor-content">' + o + "&#8364;</div>";
                }
                r.price = parseFloat(r.price).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                n += '<div class="price-content">' + r.price + "&#8364;</div>";
                var k = "";
                if (finderant.parameters.buttonTemplate) {
                    var m = finderant.parameters.buttonTemplate;
                    m = m.replace(/__ID_PRODUCT__/gi, r.id);
                    m = m.replace(/__PRICE__/gi, r.price);
                    m = m.replace(/__PRODUCT_URL__/gi, r.url);
                    k += '<div class="productButtonContainer">';
                    k += m;
                    k += "</div>";
                }
                var p = "";
                p += k == "" ? "" : "hasProductButton";
                f += '<div class="item-product-individual ' + p + '" data-id-product="' + r.id_page + '" data-product-url="' + r.url + '">';
                f += '<a class="img-content" href="' + r.url + '"><img src="' + r.additional.imagenJugador + '" alt="" /></a>';
                f +=
                    '<div class="txt-content" href="' +
                    r.url +
                    '"><h1>' +
                    r.title +
                    '</h1><div class="categoria">' +
                    r.additional.nombre +
                    '</div><div class="separador"><hr /></div><div class="torneos">';
                    if (typeof r.additional.equipo_nombre != "undefined") {
                        f += '<a class="enlace-torneo" href="' + r.additional.equipo_enlace + '">' + r.additional.equipo_nombre + '</a><br />' +
                        '<a style="font-size: 11px;" class="enlace-torneo" href="' + r.additional.temporada_enlace + '">' + r.additional.temporada_nombre + '</a>'
                    }
                f += "</div></div>";
                f += k;
                f += "</div>";
            });
            g.nCurrentSearch = parseInt(g.nCurrentSearch);
            if (finderAntLastP == 1) {
                if (g.nCurrentSearch > nLastSearchDisplayed) {
                    nLastSearchDisplayed = g.nCurrentSearch;
                    if (isMobile) {
                        jQuery("#finderAntMainLayerMobile #finderAntResultsContainerMobile").html(f);
                    } else {
                        if (finderAntLayerType == "embedded") {
                            jQuery("#" + getEmbeddedContainerId() + " #finderAntResultsContainerEmbedded").html(f);
                        } else {
                            api.getContentPane().html(f);
                            checkIfNeedLoadMoreResults();
                        }
                    }
                }
            } else {
                if (g.nCurrentSearch > nLastSearchDisplayed) {
                    nLastSearchDisplayed = g.nCurrentSearch;
                    if (isMobile) {
                        jQuery(".finderant-loading").remove();
                        jQuery("#finderAntMainLayerMobile #finderAntResultsContainerMobile").append(f);
                    } else {
                        if (finderAntLayerType == "embedded") {
                            jQuery(".finderant-loading").remove();
                            jQuery("#" + getEmbeddedContainerId() + " #finderAntResultsContainerEmbedded").append(f);
                        } else {
                            var i = jQuery("#finderAntResultsContainer .jspPane");
                            var e = jQuery("#finderAntResultsContainer .jspDrag");
                            var d = i.length == 0 ? 0 : i.position().top;
                            var h = e.length == 0 ? 0 : e.position().top;
                            api.getContentPane().append(f);
                        }
                    }
                }
            }
            isLoading = false;
            api.reinitialise();
            if (finderAntLastP > 1) {
                jQuery("#finderAntResultsContainer .jspPane").css("top", d);
                jQuery("#finderAntResultsContainer .jspDrag").css("top", h);
            }
        });
    }
    function checkIsMobile() {
        isMobile = false;
        if (
            /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(
                navigator.userAgent
            ) ||
            /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
                navigator.userAgent.substr(0, 4)
            )
        ) {
            isMobile = true;
        }
        return isMobile;
    }
    function detectKeys() {
        if (isMobile) {
            if (jQuery.trim(jQuery("#finderAntInputMobile").val()).length > 2) {
                startSearch(1, true);
            } else {
                hideFinderAntLayer();
            }
        } else {
            changeProperties();
            if (jQuery.trim(jQuery(finderant.parameters.inputSelector).val()).length > 2) {
                startSearch(1);
            } else {
                hideFinderAntLayer();
            }
        }
    }
    function getEmbeddedContainerId() {
        return containerId;
    }
    function getOldEmbeddedContainerId() {
        return containerId + "-finderAnt-old";
    }
    function lauchMobileLayer() {
        if (jQuery(finderAntInputSelector).is(":focus")) {
            displayMobileLayer();
        }
    }
    function displayMobileLayer() {
        if (jQuery("#finderAntMainLayerMobile").length == 0) {
            jQuery("body").append(
                '<div id="finderAntMainLayerMobile" style="z-index: 10000001;"><div id="finderAntTopContainerMobile"><div id="finderAntSearchContainerMobile"><div id="finderAntSearchInputContainerMobile"><input autocomplete="off" id="finderAntInputMobile" type="text" placeholder="' +
                    langWriteYourSearch +
                    '"></div><div id="finderAntCloseButtonMobileContainer"><a href="" id ="finderAntCloseButtonMobile">' +
                    langClose +
                    '</a></div></div></div><div id="finderAntResultsContainerMobile"></div></div>'
            );
            jQuery("#finderAntInputMobile").val(jQuery(finderant.parameters.inputSelector).val());
            jQuery("#finderAntInputMobile").focus();
            jQuery("#finderAntResultsContainerMobile").css("height", jQuery(window).height() - jQuery("#finderAntTopContainerMobile").outerHeight() + "px");
            detectKeys();
            lockBodyScroll();
        }
    }
    function closeFinderAntMobile() {
        jQuery(finderant.parameters.inputSelector).val(jQuery("#finderAntInputMobile").val());
        unlockBodyScroll();
        jQuery("#finderAntMainLayerMobile").remove();
    }
    function lockBodyScroll() {
        lastBodyHeight = jQuery("body").css("height");
        lastBodyOverflow = jQuery("body").css("overflow");
        lastHtmlHeight = jQuery("html").css("height");
        lastHtmlOverflow = jQuery("html").css("overflow");
        document.body.scrollTop = document.documentElement.scrollTop = 0;
        jQuery("body, html").css({ height: "100%", overflow: "hidden" });
    }
    function unlockBodyScroll() {
        jQuery("body").css({ height: lastBodyHeight, overflow: lastBodyOverflow });
        jQuery("html").css({ height: lastHtmlHeight, overflow: lastHtmlOverflow });
    }
    function saveClickAction(a, e, f) {
        var b = a.closest(".item-product-individual");
        var c = b.data("id-product");
        var d = { idProduct: c, buttonIsClicked: e, searchId: f };
        jQuery.ajax({ url: click_url_finderant_server, type: "POST", dataType: "json", data: d, cache: false }).done(function (g) {});
    }
    function prestashopAddToCart(a) {
        var b = location.protocol ? location.protocol : "http:";
        document.location.href = b + "//" + window.location.hostname + "/index.php?controller=cart&add&id_product=" + a + "&qty=1";
    }
//})();