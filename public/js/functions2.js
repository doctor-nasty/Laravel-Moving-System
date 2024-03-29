var $ = jQuery.noConflict();

function debounce(func, wait, immediate) {
    var timeout, args, context, timestamp, result;
    return function() {
        context = this, args = arguments, timestamp = new Date;
        var a = function() {
                var b = new Date - timestamp;
                b < wait ? timeout = setTimeout(a, wait - b) : (timeout = null, immediate || (result = func.apply(context, args)))
            },
            b = immediate && !timeout;
        return timeout || (timeout = setTimeout(a, wait)), b && (result = func.apply(context, args)), result
    }
}
$.fn.inlineStyle = function(a) {
        return this.prop("style")[$.camelCase(a)]
    }, $.fn.doOnce = function(a) {
        return this.length && a.apply(this), this
    },
    function() {
        for (var c = 0, b = ["ms", "moz", "webkit", "o"], a = 0; a < b.length && !window.requestAnimationFrame; ++a) window.requestAnimationFrame = window[b[a] + "RequestAnimationFrame"], window.cancelAnimationFrame = window[b[a] + "CancelAnimationFrame"] || window[b[a] + "CancelRequestAnimationFrame"];
        window.requestAnimationFrame || (window.requestAnimationFrame = function(e, f) {
            var a = new Date().getTime(),
                b = Math.max(0, 16 - (a - c)),
                d = window.setTimeout(function() {
                    e(a + b)
                }, b);
            return c = a + b, d
        }), window.cancelAnimationFrame || (window.cancelAnimationFrame = function(a) {
            clearTimeout(a)
        })
    }();
var requesting = !1,
    killRequesting = debounce(function() {
        requesting = !1
    }, 100);

function onScrollSliderParallax() {
    requesting || (requesting = !0, requestAnimationFrame(function() {
        SEMICOLON.slider.sliderParallax(), SEMICOLON.slider.sliderElementsFade()
    })), killRequesting()
}
var SEMICOLON = SEMICOLON || {};
! function($) {
    "use strict";
    SEMICOLON.initialize = {
        init: function() {
            SEMICOLON.initialize.stickyElements(), SEMICOLON.initialize.goToTop(), SEMICOLON.initialize.fullScreen(), SEMICOLON.initialize.verticalMiddle(), SEMICOLON.initialize.lightbox(), SEMICOLON.initialize.resizeVideos(), SEMICOLON.initialize.imageFade(), SEMICOLON.initialize.pageTransition(), SEMICOLON.initialize.dataResponsiveClasses(), SEMICOLON.initialize.dataResponsiveHeights(), SEMICOLON.initialize.stickFooterOnSmall(), SEMICOLON.initialize.stickyFooter(), $(".fslider").addClass("preloader2")
        },
        verticalMiddle: function() {
            $verticalMiddleEl.length > 0 && $verticalMiddleEl.each(function() {
                var a = $(this),
                    b = a.outerHeight(),
                    c = $header.outerHeight();
                a.parents("#slider").length > 0 && !a.hasClass("ignore-header") && $header.hasClass("transparent-header") && ($body.hasClass("device-xl") || $body.hasClass("device-lg")) && (b -= 70, $slider.next("#header").length > 0 && (b += c)), ($body.hasClass("device-sm") || $body.hasClass("device-xs")) && a.parents(".full-screen").length && !a.parents(".force-full-screen").length ? a.children(".col-padding").length > 0 ? a.css({
                    position: "relative",
                    top: "0",
                    width: "auto",
                    marginTop: "0"
                }).addClass("clearfix") : a.css({
                    position: "relative",
                    top: "0",
                    width: "auto",
                    marginTop: "0",
                    paddingTop: "60px",
                    paddingBottom: "60px"
                }).addClass("clearfix") : a.css({
                    position: "absolute",
                    top: "50%",
                    width: "100%",
                    paddingTop: "0",
                    paddingBottom: "0",
                    marginTop: -(b / 2) + "px"
                })
            })
        },
        stickyElements: function() {
            if ($siStickyEl.length > 0) {
                var a = $siStickyEl.outerHeight();
                $siStickyEl.css({
                    marginTop: -(a / 2) + "px"
                })
            }
            if ($dotsMenuEl.length > 0) {
                var b = $dotsMenuEl.outerHeight();
                $dotsMenuEl.css({
                    marginTop: -(b / 2) + "px"
                })
            }
        },
        goToTop: function() {
            var a = $goToTopEl.attr("data-speed"),
                b = $goToTopEl.attr("data-easing");
            a || (a = 700), b || (b = "easeOutQuad"), $goToTopEl.off("click").on("click", function() {
                return $("body,html").stop(!0).animate({
                    scrollTop: 0
                }, Number(a), b), !1
            })
        },
        goToTopScroll: function() {
            var b = $goToTopEl.attr("data-mobile"),
                a = $goToTopEl.attr("data-offset");
            if (a || (a = 450), "true" != b && ($body.hasClass("device-sm") || $body.hasClass("device-xs"))) return !0;
            $window.scrollTop() > Number(a) ? ($goToTopEl.fadeIn(), $body.addClass("gototop-active")) : ($goToTopEl.fadeOut(), $body.removeClass("gototop-active"))
        },
        fullScreen: function() {
            $fullScreenEl.length > 0 && $fullScreenEl.each(function() {
                var a = $(this),
                    b = window.innerHeight ? window.innerHeight : $window.height(),
                    c = a.attr("data-negative-height");
                if ("slider" == a.attr("id")) {
                    var d = $slider.offset().top;
                    if (b -= d, a.find(".slider-parallax-inner").length > 0) {
                        var e = a.find(".slider-parallax-inner").css("transform").match(/-?[\d\.]+/g);
                        if (e) var f = e[5];
                        else var f = 0;
                        b = (window.innerHeight ? window.innerHeight : $window.height()) + Number(f) - d
                    }
                    $("#slider.with-header").next("#header:not(.transparent-header)").length > 0 && ($body.hasClass("device-xl") || $body.hasClass("device-lg")) && (b -= $header.outerHeight())
                }
                a.parents(".full-screen").length > 0 && (b = a.parents(".full-screen").height()), ($body.hasClass("device-sm") || $body.hasClass("device-xs")) && (a.hasClass("force-full-screen") || (b = "auto")), c && (b -= Number(c)), a.css("height", b), "slider" == a.attr("id") && !a.hasClass("canvas-slider-grid") && a.has(".swiper-slide") && a.find(".swiper-slide").css("height", b)
            })
        },
        testimonialsGrid: function() {
            if ($testimonialsGridEl.length > 0) {
                if ($body.hasClass("device-md") || $body.hasClass("device-lg") || $body.hasClass("device-xl")) {
                    var a = 0;
                    $testimonialsGridEl.each(function() {
                        $(this).find("li > .testimonial").each(function() {
                            $(this).height() > a && (a = $(this).height())
                        }), $(this).find("li").height(a), a = 0
                    })
                } else $testimonialsGridEl.find("li").css({
                    height: "auto"
                })
            }
        },
        lightbox: function() {
            if (!$().magnificPopup) return console.log("lightbox: Magnific Popup not Defined."), !0;
            var a = $('[data-lightbox="image"]'),
                b = $('[data-lightbox="gallery"]'),
                c = $('[data-lightbox="iframe"]'),
                d = $('[data-lightbox="inline"]'),
                e = $('[data-lightbox="ajax"]'),
                f = $('[data-lightbox="ajax-gallery"]');
            a.length > 0 && a.magnificPopup({
                type: "image",
                closeOnContentClick: !0,
                closeBtnInside: !1,
                fixedContentPos: !0,
                mainClass: "mfp-no-margins mfp-fade",
                image: {
                    verticalFit: !0
                }
            }), b.length > 0 && b.each(function() {
                var a = $(this);
                a.find('a[data-lightbox="gallery-item"]').parent(".clone").hasClass("clone") && a.find('a[data-lightbox="gallery-item"]').parent(".clone").find('a[data-lightbox="gallery-item"]').attr("data-lightbox", ""), a.find('a[data-lightbox="gallery-item"]').parents(".cloned").hasClass("cloned") && a.find('a[data-lightbox="gallery-item"]').parents(".cloned").find('a[data-lightbox="gallery-item"]').attr("data-lightbox", ""), a.magnificPopup({
                    delegate: 'a[data-lightbox="gallery-item"]',
                    type: "image",
                    closeOnContentClick: !0,
                    closeBtnInside: !1,
                    fixedContentPos: !0,
                    mainClass: "mfp-no-margins mfp-fade",
                    image: {
                        verticalFit: !0
                    },
                    gallery: {
                        enabled: !0,
                        navigateByImgClick: !0,
                        preload: [0, 1]
                    }
                })
            }), c.length > 0 && c.magnificPopup({
                disableOn: 600,
                type: "iframe",
                removalDelay: 160,
                preloader: !1,
                fixedContentPos: !1
            }), d.length > 0 && d.magnificPopup({
                type: "inline",
                mainClass: "mfp-no-margins mfp-fade",
                closeBtnInside: !1,
                fixedContentPos: !0,
                overflowY: "scroll"
            }), e.length > 0 && e.magnificPopup({
                type: "ajax",
                closeBtnInside: !1,
                autoFocusLast: !1,
                callbacks: {
                    ajaxContentAdded: function(a) {
                        SEMICOLON.widget.loadFlexSlider(), SEMICOLON.initialize.resizeVideos(), SEMICOLON.widget.masonryThumbs()
                    },
                    open: function() {
                        $body.addClass("ohidden")
                    },
                    close: function() {
                        $body.removeClass("ohidden")
                    }
                }
            }), f.length > 0 && f.magnificPopup({
                delegate: 'a[data-lightbox="ajax-gallery-item"]',
                type: "ajax",
                closeBtnInside: !1,
                autoFocusLast: !1,
                gallery: {
                    enabled: !0,
                    preload: 0,
                    navigateByImgClick: !1
                },
                callbacks: {
                    ajaxContentAdded: function(a) {
                        SEMICOLON.widget.loadFlexSlider(), SEMICOLON.initialize.resizeVideos(), SEMICOLON.widget.masonryThumbs()
                    },
                    open: function() {
                        $body.addClass("ohidden")
                    },
                    close: function() {
                        $body.removeClass("ohidden")
                    }
                }
            }), $("[data-lightbox]").on("mfpOpen", function() {
                var a = $.magnificPopup.instance.currItem.el,
                    b = $(a).attr("data-lightbox-class"),
                    c = $(a).attr("data-lightbox-bg-class");
                "" != b && $($.magnificPopup.instance.container).addClass(b), "" != c && $($.magnificPopup.instance.bgOverlay).addClass(c)
            })
        },
        modal: function() {
            if (!$().magnificPopup) return console.log("modal: Magnific Popup not Defined."), !0;
            if ("undefined" === Cookies) return console.log("cookieNotify: Cookie Function not defined."), !0;
            var a = $(".modal-on-load:not(.customjs)");
            a.length > 0 && a.each(function() {
                var a = $(this),
                    f = a.attr("data-target"),
                    c = f.split("#")[1],
                    b = a.attr("data-delay"),
                    d = a.attr("data-timeout"),
                    g = a.attr("data-animate-in"),
                    h = a.attr("data-animate-out");
                if (a.hasClass("enable-cookie") || Cookies.remove(c), a.hasClass("enable-cookie")) {
                    var e = Cookies.get(c);
                    if (void 0 !== e && "0" == e) return !0
                }
                b = b ? Number(b) + 1500 : 1500, setTimeout(function() {
                    $.magnificPopup.open({
                        items: {
                            src: f
                        },
                        type: "inline",
                        mainClass: "mfp-no-margins mfp-fade",
                        closeBtnInside: !1,
                        fixedContentPos: !0,
                        removalDelay: 500,
                        callbacks: {
                            open: function() {
                                "" != g && $(f).addClass(g + " animated")
                            },
                            beforeClose: function() {
                                "" != h && $(f).removeClass(g).addClass(h)
                            },
                            afterClose: function() {
                                ("" != g || "" != h) && $(f).removeClass(g + " " + h + " animated"), a.hasClass("enable-cookie") && Cookies.set(c, "0")
                            }
                        }
                    }, 0)
                }, Number(b)), "" != d && setTimeout(function() {
                    $.magnificPopup.close()
                }, Number(b) + Number(d))
            })
        },
        resizeVideos: function() {
            if (!$().fitVids) return console.log("resizeVideos: FitVids not Defined."), !0;
            $("#content,#footer,.slider-element:not(.revslider-wrap),.landing-offer-media,.portfolio-ajax-modal,.mega-menu-column").fitVids({
                customSelector: "iframe[src^='//www.dailymotion.com/embed'], iframe[src*='maps.google.com'], iframe[src*='google.com/maps'], iframe[src*='facebook.com/plugins/video']",
                ignore: ".no-fv"
            })
        },
        imageFade: function() {
            $(".image_fade").hover(function() {
                $(this).filter(":not(:animated)").animate({
                    opacity: .8
                }, 400)
            }, function() {
                $(this).animate({
                    opacity: 1
                }, 400)
            })
        },
        blogTimelineEntries: function() {
            $(".post-timeline.grid-2").find(".entry").each(function() {
                "0px" == $(this).inlineStyle("left") ? $(this).removeClass("alt") : $(this).addClass("alt"), $(this).find(".entry-timeline").fadeIn()
            }), $(".entry.entry-date-section").next().next().find(".entry-timeline").css({
                top: "70px"
            })
        },
        pageTransition: function() {
            if ($body.hasClass("no-transition")) return !0;
            if (!$().animsition) return $body.addClass("no-transition"), console.log("pageTransition: Animsition not Defined."), !0;
            window.onpageshow = function(a) {
                a.persisted && window.location.reload()
            };
            var k = $body.attr("data-animation-in"),
                l = $body.attr("data-animation-out"),
                m = $body.attr("data-speed-in"),
                n = $body.attr("data-speed-out"),
                o = !1,
                g = $body.attr("data-loader-timeout"),
                e = $body.attr("data-loader"),
                j = $body.attr("data-loader-color"),
                f = $body.attr("data-loader-html"),
                c = "",
                p = '<div class="css3-spinner">',
                q = "</div>",
                a = "",
                h = "",
                d = "",
                r = "",
                b = "",
                i = "";
            k || (k = "fadeIn"), l || (l = "fadeOut"), m || (m = 1500), n || (n = 800), f || (c = '<div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div>'), g ? (o = !0, g = Number(g)) : (o = !1, g = !1), j && ("theme" == j ? (d = " bgcolor", r = " border-color", b = ' class="bgcolor"', i = ' class="border-color"') : (a = ' style="background-color:' + j + ';"', h = ' style="border-color:' + j + ';"'), c = '<div class="css3-spinner-bounce1' + d + '"' + a + '></div><div class="css3-spinner-bounce2' + d + '"' + a + '></div><div class="css3-spinner-bounce3' + d + '"' + a + "></div>"), "2" == e ? c = '<div class="css3-spinner-flipper' + d + '"' + a + "></div>" : "3" == e ? c = '<div class="css3-spinner-double-bounce1' + d + '"' + a + '></div><div class="css3-spinner-double-bounce2' + d + '"' + a + "></div>" : "4" == e ? c = '<div class="css3-spinner-rect1' + d + '"' + a + '></div><div class="css3-spinner-rect2' + d + '"' + a + '></div><div class="css3-spinner-rect3' + d + '"' + a + '></div><div class="css3-spinner-rect4' + d + '"' + a + '></div><div class="css3-spinner-rect5' + d + '"' + a + "></div>" : "5" == e ? c = '<div class="css3-spinner-cube1' + d + '"' + a + '></div><div class="css3-spinner-cube2' + d + '"' + a + "></div>" : "6" == e ? c = '<div class="css3-spinner-scaler' + d + '"' + a + "></div>" : "7" == e ? c = '<div class="css3-spinner-grid-pulse"><div' + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div></div>" : "8" == e ? c = '<div class="css3-spinner-clip-rotate"><div' + i + h + "></div></div>" : "9" == e ? c = '<div class="css3-spinner-ball-rotate"><div' + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div></div>" : "10" == e ? c = '<div class="css3-spinner-zig-zag"><div' + b + a + "></div><div" + b + a + "></div></div>" : "11" == e ? c = '<div class="css3-spinner-triangle-path"><div' + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div></div>" : "12" == e ? c = '<div class="css3-spinner-ball-scale-multiple"><div' + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div></div>" : "13" == e ? c = '<div class="css3-spinner-ball-pulse-sync"><div' + b + a + "></div><div" + b + a + "></div><div" + b + a + "></div></div>" : "14" == e && (c = '<div class="css3-spinner-scale-ripple"><div' + i + h + "></div><div" + i + h + "></div><div" + i + h + "></div></div>"), f || (f = c), f = p + f + q, $wrapper.css({
                opacity: 1
            }), $wrapper.animsition({
                inClass: k,
                outClass: l,
                inDuration: Number(m),
                outDuration: Number(n),
                linkElement: 'body:not(.device-md):not(.device-sm):not(.device-xs) #primary-menu:not(.on-click) ul li a:not([target="_blank"]):not([href*="#"]):not([data-lightbox]):not([href^="mailto"]):not([href^="tel"]):not([href^="sms"]):not([href^="call"])',
                loading: !0,
                loadingParentElement: "body",
                loadingClass: "page-transition-wrap",
                loadingInner: f + '<button class="disable-pagetransition btn btn-secondary btn-sm mb-3" style="position:absolute;top:auto;bottom:1.5rem;left:50%;transform:translateX(-50%);">Disable Page Transition</button>',
                timeout: o,
                timeoutCountdown: g,
                onLoadEvent: !0,
                browser: ["animation-duration", "-webkit-animation-duration"],
                overlay: !1,
                overlayClass: "animsition-overlay-slide",
                overlayParentElement: "body"
            })
        },
        topScrollOffset: function() {
            var a = 0;
            return ($body.hasClass("device-xl") || $body.hasClass("device-lg")) && !SEMICOLON.isMobile.any() ? (a = $header.hasClass("sticky-header") ? $pagemenu.hasClass("dots-menu") ? 100 : 144 : $pagemenu.hasClass("dots-menu") ? 140 : 184, $pagemenu.length || (a = $header.hasClass("sticky-header") ? 100 : 140)) : a = 40, a
        },
        defineColumns: function(b) {
            var a = 4,
                c = b.attr("data-xl-col"),
                d = b.attr("data-lg-col"),
                e = b.attr("data-md-col"),
                f = b.attr("data-sm-col"),
                g = b.attr("data-xs-col");
            return b.hasClass("portfolio-full") ? (a = b.hasClass("portfolio-3") ? 3 : b.hasClass("portfolio-5") ? 5 : b.hasClass("portfolio-6") ? 6 : 4, $body.hasClass("device-md") && (4 == a || 5 == a || 6 == a) ? a = 3 : $body.hasClass("device-sm") && (3 == a || 4 == a || 5 == a || 6 == a) ? a = 2 : $body.hasClass("device-xs") && (a = 1)) : b.hasClass("masonry-thumbs") && (a = b.hasClass("grid-2") ? 2 : b.hasClass("grid-3") ? 3 : b.hasClass("grid-5") ? 5 : b.hasClass("grid-6") ? 6 : 4), $body.hasClass("device-xl") ? c && (a = Number(c)) : $body.hasClass("device-lg") ? d && (a = Number(d)) : $body.hasClass("device-md") ? e && (a = Number(e)) : $body.hasClass("device-sm") ? f && (a = Number(f)) : $body.hasClass("device-xs") && g && (a = Number(g)), a
        },
        setFullColumnWidth: function(a) {
            if (!$().isotope) return console.log("setFullColumnWidth: Isotope not Defined."), !0;
            if (a.css({
                    width: ""
                }), a.hasClass("portfolio-full")) {
                var d = SEMICOLON.initialize.defineColumns(a),
                    b = a.width(),
                    e = Math.floor(b / d);
                if ($body.hasClass("device-xs")) var i = 1;
                else var i = 0;
                a.find(".portfolio-item").each(function(b) {
                    if (0 == i && $(this).hasClass("wide")) var a = 2 * e;
                    else var a = e;
                    $(this).css({
                        width: a + "px"
                    })
                })
            } else if (a.hasClass("masonry-thumbs")) {
                var d = SEMICOLON.initialize.defineColumns(a),
                    b = a.innerWidth();
                b == windowWidth && (b = 1.005 * windowWidth, a.css({
                    width: b + "px"
                }));
                var e = b / d;
                (e = Math.floor(e)) * d >= b && a.css({
                    "margin-right": "-1px"
                }), a.children("a").css({
                    width: e + "px"
                });
                var g = a.find("a:eq(0)").outerWidth();
                a.isotope({
                    masonry: {
                        columnWidth: g
                    }
                });
                var c = a.attr("data-big");
                if (c) {
                    c = c.split(",");
                    var h = "",
                        f = "";
                    for (f = 0; f < c.length; f++) h = Number(c[f]) - 1, a.find("a:eq(" + h + ")").css({
                        width: 2 * g + "px"
                    });
                    setTimeout(function() {
                        a.isotope("layout")
                    }, 1e3)
                }
            }
        },
        aspectResizer: function() {
            var a = $(".aspect-resizer");
            a.length > 0 && a.each(function() {
                var a = $(this);
                a.inlineStyle("width"), a.inlineStyle("height"), a.parent().innerWidth()
            })
        },
        dataResponsiveClasses: function() {
            var a = $("[data-class-xs]"),
                b = $("[data-class-sm]"),
                c = $("[data-class-md]"),
                d = $("[data-class-lg]"),
                e = $("[data-class-xl]");
            a.length > 0 && a.each(function() {
                var a = $(this),
                    b = a.attr("data-class-xs"),
                    c = a.attr("data-class-sm") + " " + a.attr("data-class-md") + " " + a.attr("data-class-lg") + " " + a.attr("data-class-xl");
                $body.hasClass("device-xs") && (a.removeClass(c), a.addClass(b))
            }), b.length > 0 && b.each(function() {
                var a = $(this),
                    b = a.attr("data-class-sm"),
                    c = a.attr("data-class-xs") + " " + a.attr("data-class-md") + " " + a.attr("data-class-lg") + " " + a.attr("data-class-xl");
                $body.hasClass("device-sm") && (a.removeClass(c), a.addClass(b))
            }), c.length > 0 && c.each(function() {
                var a = $(this),
                    b = a.attr("data-class-md"),
                    c = a.attr("data-class-xs") + " " + a.attr("data-class-sm") + " " + a.attr("data-class-lg") + " " + a.attr("data-class-xl");
                $body.hasClass("device-md") && (a.removeClass(c), a.addClass(b))
            }), d.length > 0 && d.each(function() {
                var a = $(this),
                    b = a.attr("data-class-lg"),
                    c = a.attr("data-class-xs") + " " + a.attr("data-class-sm") + " " + a.attr("data-class-md") + " " + a.attr("data-class-xl");
                $body.hasClass("device-lg") && (a.removeClass(c), a.addClass(b))
            }), e.length > 0 && e.each(function() {
                var a = $(this),
                    b = a.attr("data-class-xl"),
                    c = a.attr("data-class-xs") + " " + a.attr("data-class-sm") + " " + a.attr("data-class-md") + " " + a.attr("data-class-lg");
                $body.hasClass("device-xl") && (a.removeClass(c), a.addClass(b))
            })
        },
        dataResponsiveHeights: function() {
            var a = $("[data-height-xs]"),
                b = $("[data-height-sm]"),
                c = $("[data-height-md]"),
                d = $("[data-height-lg]"),
                e = $("[data-height-xl]");
            a.length > 0 && a.each(function() {
                var a = $(this),
                    b = a.attr("data-height-xs");
                $body.hasClass("device-xs") && "" != b && a.css("height", b)
            }), b.length > 0 && b.each(function() {
                var a = $(this),
                    b = a.attr("data-height-sm");
                $body.hasClass("device-sm") && "" != b && a.css("height", b)
            }), c.length > 0 && c.each(function() {
                var a = $(this),
                    b = a.attr("data-height-md");
                $body.hasClass("device-md") && "" != b && a.css("height", b)
            }), d.length > 0 && d.each(function() {
                var a = $(this),
                    b = a.attr("data-height-lg");
                $body.hasClass("device-lg") && "" != b && a.css("height", b)
            }), e.length > 0 && e.each(function() {
                var a = $(this),
                    b = a.attr("data-height-xl");
                $body.hasClass("device-xl") && "" != b && a.css("height", b)
            })
        },
        stickFooterOnSmall: function() {
            $footer.css({
                "margin-top": ""
            });
            var a = $window.height(),
                b = $wrapper.height();
            !$body.hasClass("sticky-footer") && $footer.length > 0 && $wrapper.has("#footer") && a > b && $footer.css({
                "margin-top": a - b
            })
        },
        stickyFooter: function() {
            if ($body.hasClass("sticky-footer") && $footer.length > 0 && ($body.hasClass("device-xl") || $body.hasClass("device-lg"))) {
                var a = $footer.outerHeight();
                $content.css({
                    "margin-bottom": a
                })
            } else $content.css({
                "margin-bottom": 0
            })
        }
    }, SEMICOLON.header = {
        init: function() {
            SEMICOLON.header.superfish(), SEMICOLON.header.menufunctions(), SEMICOLON.header.fullWidthMenu(), SEMICOLON.header.overlayMenu(), SEMICOLON.header.stickyMenu(), SEMICOLON.header.stickyPageMenu(), SEMICOLON.header.sideHeader(), SEMICOLON.header.sidePanel(), SEMICOLON.header.onePageScroll(), SEMICOLON.header.onepageScroller(), SEMICOLON.header.logo(), SEMICOLON.header.topsearch(), SEMICOLON.header.topcart()
        },
        superfish: function() {
            if ($body.hasClass("device-xl") || $body.hasClass("device-lg")) {
                if ($("#primary-menu ul ul, #primary-menu ul .mega-menu-content").css("display", "block"), SEMICOLON.header.menuInvert(), $("#primary-menu ul ul, #primary-menu ul .mega-menu-content").css("display", ""), !$().superfish) return $body.addClass("no-superfish"), console.log("superfish: Superfish not Defined."), !0;
                $("body:not(.side-header) #primary-menu:not(.on-click) > ul, body:not(.side-header) #primary-menu:not(.on-click) > div > ul:not(.dropdown-menu), .top-links:not(.on-click) > ul").superfish({
                    popUpSelector: "ul,.mega-menu-content,.top-link-section",
                    delay: 250,
                    speed: 350,
                    animation: {
                        opacity: "show"
                    },
                    animationOut: {
                        opacity: "hide"
                    },
                    cssArrows: !1,
                    onShow: function() {
                        var a = $(this);
                        a.find(".owl-carousel.customjs").length > 0 && (a.find(".owl-carousel").removeClass("customjs"), SEMICOLON.widget.carousel()), a.find(".grid-container").length > 0 && a.find(".grid-container").isotope("layout")
                    }
                }), $("body.side-header #primary-menu:not(.on-click) > ul").superfish({
                    popUpSelector: "ul",
                    delay: 250,
                    speed: 350,
                    animation: {
                        opacity: "show",
                        height: "show"
                    },
                    animationOut: {
                        opacity: "hide",
                        height: "hide"
                    },
                    cssArrows: !1
                })
            }
        },
        menuInvert: function() {
            $("#primary-menu .mega-menu-content, #primary-menu ul ul").each(function(f, b) {
                var a = $(b),
                    c = a.offset(),
                    d = a.width(),
                    e = c.left;
                windowWidth - (d + e) < 0 && a.addClass("menu-pos-invert")
            })
        },
        menufunctions: function() {
            $("#primary-menu ul li:has(ul)").addClass("sub-menu"), $(".top-links ul li:has(ul) > a:not(:has(.icon-angle-down)), #primary-menu.with-arrows > ul > li:has(ul) > a > div:not(:has(.icon-angle-down)), #primary-menu.with-arrows > div > ul > li:has(ul) > a > div:not(:has(.icon-angle-down)), #page-menu nav ul li:has(ul) > a > div:not(:has(.icon-angle-down))").append('<i class="icon-angle-down"></i>'), $(".top-links > ul").addClass("clearfix"), ($body.hasClass("device-xl") || $body.hasClass("device-lg")) && ($("#primary-menu.sub-title > ul > li").hover(function() {
                $(this).prev().css({
                    backgroundImage: "none"
                })
            }, function() {
                $(this).prev().css({
                    backgroundImage: 'url("images/icons/menu-divider.png")'
                })
            }), $("#primary-menu.sub-title").children("ul").children(".current").prev().css({
                backgroundImage: "none"
            })), ($("#primary-menu").hasClass("on-click") || $body.hasClass("device-md") || $body.hasClass("device-sm") || $body.hasClass("device-xs")) && $("#primary-menu li:has(ul) > a").on("click touchend", function(a) {
                $(this).parents(".sub-menu").siblings().find("ul,.mega-menu-content").removeClass("d-block"), $(this).parent("li").children("ul,.mega-menu-content").toggleClass("d-block"), a.preventDefault()
            }), ($(".top-links").hasClass("on-click") || $body.hasClass("device-md") || $body.hasClass("device-sm") || $body.hasClass("device-xs")) && $(".top-links li:has(ul,.top-link-section) > a").on("click touchend", function(a) {
                $(this).parents("li").siblings().find("ul,.top-link-section").removeClass("d-block"), $(this).parent("li").children("ul,.top-link-section").toggleClass("d-block"), a.preventDefault()
            })
        },
        fullWidthMenu: function() {
            $body.hasClass("stretched") ? ($header.find(".container-fullwidth").length > 0 && $(".mega-menu .mega-menu-content").css({
                width: $wrapper.width() - 120
            }), $header.hasClass("full-header") && $(".mega-menu .mega-menu-content").css({
                width: $wrapper.width() - 60
            })) : ($header.find(".container-fullwidth").length > 0 && $(".mega-menu .mega-menu-content").css({
                width: $wrapper.width() - 120
            }), $header.hasClass("full-header") && $(".mega-menu .mega-menu-content").css({
                width: $wrapper.width() - 80
            }))
        },
        overlayMenu: function() {
            if ($body.hasClass("overlay-menu")) {
                var a = $("#primary-menu").children("ul").children("li"),
                    b = a.outerHeight(),
                    c = a.length * b,
                    d = ($window.height() - c) / 2;
                $("#primary-menu").children("ul").children("li:first-child").css({
                    "margin-top": d + "px"
                })
            }
        },
        stickyMenu: function(a) {
            $window.scrollTop() > a ? $body.hasClass("device-xl") || $body.hasClass("device-lg") ? ($("body:not(.side-header) #header:not(.no-sticky)").addClass("sticky-header"), $headerWrap.hasClass("force-not-dark") || $headerWrap.removeClass("not-dark"), SEMICOLON.header.stickyMenuClass()) : ($body.hasClass("device-sm") || $body.hasClass("device-xs") || $body.hasClass("device-md")) && $body.hasClass("sticky-responsive-menu") && ($("#header:not(.no-sticky)").addClass("responsive-sticky-header"), SEMICOLON.header.stickyMenuClass()) : SEMICOLON.header.removeStickyness()
        },
        stickyPageMenu: function(a) {
            $window.scrollTop() > a ? $body.hasClass("device-xl") || $body.hasClass("device-lg") ? $("#page-menu:not(.dots-menu,.no-sticky)").addClass("sticky-page-menu") : ($body.hasClass("device-sm") || $body.hasClass("device-xs") || $body.hasClass("device-md")) && $body.hasClass("sticky-responsive-pagemenu") && $("#page-menu:not(.dots-menu,.no-sticky)").addClass("sticky-page-menu") : $("#page-menu:not(.dots-menu,.no-sticky)").removeClass("sticky-page-menu")
        },
        removeStickyness: function() {
            $header.hasClass("sticky-header") && ($("body:not(.side-header) #header:not(.no-sticky)").removeClass("sticky-header"), $header.removeClass().addClass(oldHeaderClasses), $headerWrap.removeClass().addClass(oldHeaderWrapClasses), $headerWrap.hasClass("force-not-dark") || $headerWrap.removeClass("not-dark"), SEMICOLON.slider.swiperSliderMenu(), SEMICOLON.slider.revolutionSliderMenu()), $header.hasClass("responsive-sticky-header") && $("body.sticky-responsive-menu #header").removeClass("responsive-sticky-header"), ($body.hasClass("device-sm") || $body.hasClass("device-xs") || $body.hasClass("device-md")) && void 0 === responsiveMenuClasses && ($header.removeClass().addClass(oldHeaderClasses), $headerWrap.removeClass().addClass(oldHeaderWrapClasses), $headerWrap.hasClass("force-not-dark") || $headerWrap.removeClass("not-dark"))
        },
        sideHeader: function() {
            $("#header-trigger").off("click").on("click", function() {
                return $("body.open-header").toggleClass("side-header-open"), !1
            })
        },
        sidePanel: function() {
            $(".side-panel-trigger").off("click").on("click", function() {
                return $body.toggleClass("side-panel-open"), $body.hasClass("device-touch") && $body.hasClass("side-push-panel") && $body.toggleClass("ohidden"), !1
            })
        },
        onePageScroll: function() {
            if ($onePageMenuEl.length > 0) {
                var a = $onePageMenuEl.attr("data-speed"),
                    c = $onePageMenuEl.attr("data-offset"),
                    b = $onePageMenuEl.attr("data-easing");
                a || (a = 1e3), b || (b = "easeOutQuad"), $onePageMenuEl.find("a[data-href]").off("click").on("click", function() {
                    var e = $(this),
                        f = e.attr("data-href"),
                        g = e.attr("data-speed"),
                        d = e.attr("data-offset"),
                        h = e.attr("data-easing");
                    if ($(f).length > 0) {
                        if (c) var i = c;
                        else var i = SEMICOLON.initialize.topScrollOffset();
                        g || (g = a), d || (d = i), h || (h = b), $onePageMenuEl.hasClass("no-offset") && (d = 0), onePageGlobalOffset = Number(d), $onePageMenuEl.find("li").removeClass("current"), $onePageMenuEl.find('a[data-href="' + f + '"]').parent("li").addClass("current"), (windowWidth < 768 || $body.hasClass("overlay-menu")) && ($("#primary-menu").find("ul.mobile-primary-menu").length > 0 ? $("#primary-menu > ul.mobile-primary-menu, #primary-menu > div > ul.mobile-primary-menu").toggleClass("d-block", !1) : $("#primary-menu > ul, #primary-menu > div > ul").toggleClass("d-block", !1), $pagemenu.toggleClass("pagemenu-active", !1), $body.toggleClass("primary-menu-open", !1)), $("html,body").stop(!0).animate({
                            scrollTop: $(f).offset().top - Number(d)
                        }, Number(g), h), onePageGlobalOffset = Number(d)
                    }
                    return !1
                })
            }
        },
        onepageScroller: function() {
            $onePageMenuEl.find("li").removeClass("current"), $onePageMenuEl.find('a[data-href="#' + SEMICOLON.header.onePageCurrentSection() + '"]').parent("li").addClass("current")
        },
        onePageCurrentSection: function() {
            var a = "home",
                b = $headerWrap.outerHeight();
            return $body.hasClass("side-header") && (b = 0), $pageSectionEl.each(function(e) {
                var c = $(this).offset().top,
                    d = $window.scrollTop();
                d + (b + onePageGlobalOffset) >= c && d < c + $(this).height() && $(this).attr("id") != a && (a = $(this).attr("id"))
            }), a
        },
        logo: function() {
            ($header.hasClass("dark") || $body.hasClass("dark")) && !$headerWrap.hasClass("not-dark") ? (defaultDarkLogo && defaultLogo.find("img").attr("src", defaultDarkLogo), retinaDarkLogo && retinaLogo.find("img").attr("src", retinaDarkLogo)) : (defaultLogoImg && defaultLogo.find("img").attr("src", defaultLogoImg), retinaLogoImg && retinaLogo.find("img").attr("src", retinaLogoImg)), $header.hasClass("sticky-header") && (defaultStickyLogo && defaultLogo.find("img").attr("src", defaultStickyLogo), retinaStickyLogo && retinaLogo.find("img").attr("src", retinaStickyLogo)), ($body.hasClass("device-sm") || $body.hasClass("device-xs")) && (defaultMobileLogo && defaultLogo.find("img").attr("src", defaultMobileLogo), retinaMobileLogo && retinaLogo.find("img").attr("src", retinaMobileLogo))
        },
        stickyMenuClass: function() {
            if (stickyMenuClasses) var b = stickyMenuClasses.split(/ +/);
            else var b = "";
            var c = b.length;
            if (c > 0) {
                var a = 0;
                for (a = 0; a < c; a++) "not-dark" == b[a] ? ($header.removeClass("dark"), $headerWrap.addClass("not-dark")) : ("dark" == b[a] && $headerWrap.removeClass("not-dark force-not-dark"), $header.hasClass(b[a]) || $header.addClass(b[a]))
            }
        },
        responsiveMenuClass: function() {
            if ($body.hasClass("device-sm") || $body.hasClass("device-xs") || $body.hasClass("device-md")) {
                if (responsiveMenuClasses) var b = responsiveMenuClasses.split(/ +/);
                else var b = "";
                var c = b.length;
                if (c > 0) {
                    var a = 0;
                    for (a = 0; a < c; a++) "not-dark" == b[a] ? ($header.removeClass("dark"), $headerWrap.addClass("not-dark")) : ("dark" == b[a] && $headerWrap.removeClass("not-dark force-not-dark"), $header.hasClass(b[a]) || $header.addClass(b[a]))
                }
                SEMICOLON.header.logo()
            }
        },
        topsocial: function() {
            $topSocialEl.length > 0 && ($body.hasClass("device-lg") || $body.hasClass("device-xl") ? ($topSocialEl.show(), $topSocialEl.find("a").css({
                width: 40
            }), $topSocialEl.find(".ts-text").each(function() {
                var a = $(this).clone().css({
                        visibility: "hidden",
                        display: "inline-block",
                        "font-size": "13px",
                        "font-weight": "bold"
                    }).appendTo($body),
                    b = a.innerWidth() + 52;
                $(this).parent("a").attr("data-hover-width", b), a.remove()
            }), $topSocialEl.find("a").hover(function() {
                $(this).find(".ts-text").length > 0 && $(this).css({
                    width: $(this).attr("data-hover-width")
                })
            }, function() {
                $(this).css({
                    width: 40
                })
            })) : ($topSocialEl.show(), $topSocialEl.find("a").css({
                width: 40
            }), $topSocialEl.find("a").each(function() {
                var a = $(this).find(".ts-text").text();
                $(this).attr("title", a)
            }), $topSocialEl.find("a").hover(function() {
                $(this).css({
                    width: 40
                })
            }, function() {
                $(this).css({
                    width: 40
                })
            }), $body.hasClass("device-xs") && ($topSocialEl.hide(), $topSocialEl.slice(0, 8).show())))
        },
        topsearch: function() {
            $(document).on("click", function(a) {
                $(a.target).closest("#top-search").length || $body.toggleClass("top-search-open", !1), $(a.target).closest("#top-cart").length || $topCart.toggleClass("top-cart-open", !1), $(a.target).closest("#page-menu").length || $pagemenu.toggleClass("pagemenu-active", !1), $(a.target).closest("#side-panel").length || $body.toggleClass("side-panel-open", !1), $(a.target).closest("#primary-menu").length || $("#primary-menu.on-click > ul").find(".d-block").removeClass("d-block"), $(a.target).closest("#primary-menu.mobile-menu-off-canvas > ul").length || $("#primary-menu.mobile-menu-off-canvas > ul").toggleClass("d-block", !1), $(a.target).closest("#primary-menu.mobile-menu-off-canvas > div > ul").length || $("#primary-menu.mobile-menu-off-canvas > div > ul").toggleClass("d-block", !1)
            }), $("#top-search-trigger").off("click").on("click", function(a) {
                $body.toggleClass("top-search-open"), $topCart.toggleClass("top-cart-open", !1), $("#primary-menu > ul, #primary-menu > div > ul").toggleClass("d-block", !1), $pagemenu.toggleClass("pagemenu-active", !1), $body.hasClass("top-search-open") && $topSearch.find("input").focus(), a.stopPropagation(), a.preventDefault()
            })
        },
        topcart: function() {
            $("#top-cart-trigger").off("click").on("click", function(a) {
                $pagemenu.toggleClass("pagemenu-active", !1), $topCart.toggleClass("top-cart-open"), a.stopPropagation(), a.preventDefault()
            })
        }
    }, SEMICOLON.slider = {
        init: function() {
            SEMICOLON.slider.sliderParallaxDimensions(), SEMICOLON.slider.sliderRun(), SEMICOLON.slider.sliderParallax(), SEMICOLON.slider.sliderElementsFade(), SEMICOLON.slider.captionPosition()
        },
        sliderParallaxDimensions: function() {
            if ($sliderParallaxEl.find(".slider-parallax-inner").length < 1) return !0;
            if ($body.hasClass("device-xl") || $body.hasClass("device-lg") || $body.hasClass("device-md")) {
                var a = $sliderParallaxEl.outerHeight(),
                    b = $sliderParallaxEl.outerWidth();
                ($sliderParallaxEl.hasClass("revslider-wrap") || $sliderParallaxEl.find(".carousel-widget").length > 0) && (a = $sliderParallaxEl.find(".slider-parallax-inner").children().first().outerHeight(), $sliderParallaxEl.height(a)), $sliderParallaxEl.find(".slider-parallax-inner").height(a), $body.hasClass("side-header") && $sliderParallaxEl.find(".slider-parallax-inner").width(b), $body.hasClass("stretched") || (b = $wrapper.outerWidth(), $sliderParallaxEl.find(".slider-parallax-inner").width(b))
            } else $sliderParallaxEl.find(".slider-parallax-inner").css({
                width: "",
                height: ""
            });
            "" != swiperSlider && swiperSlider.update()
        },
        sliderRun: function() {
            var $sliderEl;
            if ("undefined" == typeof Swiper) return console.log("sliderRun: Swiper not Defined."), !0;
            $sliderElement.filter(":not(.customjs)").each(function() {
                if ($(this).hasClass("swiper_wrapper")) {
                    if ($(this).find(".swiper-slide").length < 1) return !0;
                    var element = $(this).filter(".swiper_wrapper"),
                        elementDirection = element.attr("data-direction"),
                        elementSpeed = element.attr("data-speed"),
                        elementAutoPlay = element.attr("data-autoplay"),
                        elementLoop = element.attr("data-loop"),
                        elementEffect = element.attr("data-effect"),
                        elementGrabCursor = element.attr("data-grab"),
                        slideNumberTotal = element.find(".slide-number-total"),
                        slideNumberCurrent = element.find(".slide-number-current"),
                        sliderVideoAutoPlay = element.attr("data-video-autoplay"),
                        sliderSettings = element.attr("data-settings");
                    if (elementSpeed || (elementSpeed = 300), elementDirection || (elementDirection = "horizontal"), elementAutoPlay = elementAutoPlay ? Number(elementAutoPlay) : 999999999, elementLoop = "true" == elementLoop, elementEffect || (elementEffect = "slide"), elementGrabCursor = "false" != elementGrabCursor, sliderVideoAutoPlay = "false" != sliderVideoAutoPlay, element.find(".swiper-pagination").length > 0) var elementPagination = element.find(".swiper-pagination"),
                        elementPaginationClickable = !0;
                    else var elementPagination = "",
                        elementPaginationClickable = !1;
                    var elementNavNext = element.find(".slider-arrow-right"),
                        elementNavPrev = element.find(".slider-arrow-left"),
                        elementScollBar = element.find(".swiper-scrollbar");
                    if (swiperSlider = new Swiper(element.find(".swiper-parent"), {
                            direction: elementDirection,
                            speed: Number(elementSpeed),
                            autoplay: {
                                delay: elementAutoPlay
                            },
                            loop: elementLoop,
                            effect: elementEffect,
                            slidesPerView: 1,
                            grabCursor: elementGrabCursor,
                            pagination: {
                                el: elementPagination,
                                clickable: elementPaginationClickable
                            },
                            navigation: {
                                prevEl: elementNavPrev,
                                nextEl: elementNavNext
                            },
                            scrollbar: {
                                el: elementScollBar
                            },
                            on: {
                                init: function(a) {
                                    SEMICOLON.slider.sliderParallaxDimensions(), element.find(".yt-bg-player").attr("data-autoplay", "false").removeClass("customjs"), SEMICOLON.widget.youtubeBgVideo(), $(".swiper-slide-active [data-animate]").each(function() {
                                        var a = $(this),
                                            b = a.attr("data-delay"),
                                            c = 0;
                                        if (c = b ? Number(b) + 750 : 750, !a.hasClass("animated")) {
                                            a.addClass("not-animated");
                                            var d = a.attr("data-animate");
                                            setTimeout(function() {
                                                a.removeClass("not-animated").addClass(d + " animated")
                                            }, c)
                                        }
                                    }), element.find("[data-animate]").each(function() {
                                        var a = $(this),
                                            b = a.attr("data-animate");
                                        if (a.parents(".swiper-slide").hasClass("swiper-slide-active")) return !0;
                                        a.removeClass("animated").removeClass(b).addClass("not-animated")
                                    }), SEMICOLON.slider.swiperSliderMenu()
                                },
                                transitionStart: function(a) {
                                    slideNumberCurrent.length > 0 && (!0 == elementLoop ? slideNumberCurrent.html(Number(element.find(".swiper-slide.swiper-slide-active").attr("data-swiper-slide-index")) + 1) : slideNumberCurrent.html(swiperSlider.activeIndex + 1)), element.find("[data-animate]").each(function() {
                                        var a = $(this),
                                            b = a.attr("data-animate");
                                        if (a.parents(".swiper-slide").hasClass("swiper-slide-active")) return !0;
                                        a.removeClass("animated").removeClass(b).addClass("not-animated")
                                    }), SEMICOLON.slider.swiperSliderMenu()
                                },
                                transitionEnd: function(a) {
                                    element.find(".swiper-slide").each(function() {
                                        var a = $(this);
                                        a.find("video").length > 0 && !0 == sliderVideoAutoPlay && a.find("video").get(0).pause(), a.find(".yt-bg-player.mb_YTPlayer:not(.customjs)").length > 0 && a.find(".yt-bg-player.mb_YTPlayer:not(.customjs)").YTPPause()
                                    }), element.find('.swiper-slide:not(".swiper-slide-active")').each(function() {
                                        var a = $(this);
                                        a.find("video").length > 0 && 0 != a.find("video").get(0).currentTime && (a.find("video").get(0).currentTime = 0), a.find(".yt-bg-player.mb_YTPlayer:not(.customjs)").length > 0 && a.find(".yt-bg-player.mb_YTPlayer:not(.customjs)").YTPSeekTo(a.find(".yt-bg-player.mb_YTPlayer:not(.customjs)").attr("data-start"))
                                    }), element.find(".swiper-slide.swiper-slide-active").find("video").length > 0 && !0 == sliderVideoAutoPlay && element.find(".swiper-slide.swiper-slide-active").find("video").get(0).play(), element.find(".swiper-slide.swiper-slide-active").find(".yt-bg-player.mb_YTPlayer:not(.customjs)").length > 0 && !0 == sliderVideoAutoPlay && element.find(".swiper-slide.swiper-slide-active").find(".yt-bg-player.mb_YTPlayer:not(.customjs)").YTPPlay(), element.find(".swiper-slide.swiper-slide-active [data-animate]").each(function() {
                                        var a = $(this),
                                            b = a.attr("data-delay"),
                                            c = 0;
                                        if (c = b ? Number(b) + 300 : 300, !a.hasClass("animated")) {
                                            a.addClass("not-animated");
                                            var d = a.attr("data-animate");
                                            setTimeout(function() {
                                                a.removeClass("not-animated").addClass(d + " animated")
                                            }, c)
                                        }
                                    })
                                }
                            }
                        }), slideNumberCurrent.length > 0 && (!0 == elementLoop ? slideNumberCurrent.html(swiperSlider.realIndex + 1) : slideNumberCurrent.html(swiperSlider.activeIndex + 1)), slideNumberTotal.length > 0 && slideNumberTotal.html(element.find(".swiper-slide:not(.swiper-slide-duplicate)").length), sliderSettings)
                        for (var prop in sliderSettings = eval("(" + sliderSettings + ")")) swiperSlider.params[prop] = sliderSettings[prop], swiperSlider.update()
                }
            })
        },
        sliderParallaxOffset: function() {
            var a = 0,
                b = $header.outerHeight();
            return ($body.hasClass("side-header") || $header.hasClass("transparent-header")) && (b = 0), a = $pageTitle.length > 0 ? $pageTitle.outerHeight() + b : b, $slider.next("#header").length > 0 && (a = 0), a
        },
        sliderParallax: function() {
            if ($sliderParallaxEl.length < 1) return !0;
            var a = SEMICOLON.slider.sliderParallaxOffset(),
                d = $sliderParallaxEl.outerHeight();
            if (($body.hasClass("device-xl") || $body.hasClass("device-lg")) && !SEMICOLON.isMobile.any()) {
                if (d + a + 50 > $window.scrollTop()) {
                    if ($sliderParallaxEl.addClass("slider-parallax-visible").removeClass("slider-parallax-invisible"), $window.scrollTop() > a) {
                        if ($sliderParallaxEl.find(".slider-parallax-inner").length > 0) {
                            var b = (-(($window.scrollTop() - a) * .4)).toFixed(0),
                                c = (-(($window.scrollTop() - a) * .15)).toFixed(0);
                            $sliderParallaxEl.find(".slider-parallax-inner").css({
                                transform: "translateY(" + b + "px)"
                            }), $(".slider-parallax .slider-caption,.ei-title").css({
                                transform: "translateY(" + c + "px)"
                            })
                        } else {
                            var b = (($window.scrollTop() - a) / 1.5).toFixed(0),
                                c = (($window.scrollTop() - a) / 7).toFixed(0);
                            $sliderParallaxEl.css({
                                transform: "translateY(" + b + "px)"
                            }), $(".slider-parallax .slider-caption,.ei-title").css({
                                transform: "translateY(" + -c + "px)"
                            })
                        }
                    } else $sliderParallaxEl.find(".slider-parallax-inner").length > 0 ? $(".slider-parallax-inner,.slider-parallax .slider-caption,.ei-title").css({
                        transform: "translateY(0px)"
                    }) : $(".slider-parallax,.slider-parallax .slider-caption,.ei-title").css({
                        transform: "translateY(0px)"
                    })
                } else $sliderParallaxEl.addClass("slider-parallax-invisible").removeClass("slider-parallax-visible");
                requesting && requestAnimationFrame(function() {
                    SEMICOLON.slider.sliderParallax(), SEMICOLON.slider.sliderElementsFade()
                })
            } else $sliderParallaxEl.find(".slider-parallax-inner").length > 0 ? $(".slider-parallax-inner,.slider-parallax .slider-caption,.ei-title").css({
                transform: "translateY(0px)"
            }) : $(".slider-parallax,.slider-parallax .slider-caption,.ei-title").css({
                transform: "translateY(0px)"
            })
        },
        sliderElementsFade: function() {
            if ($sliderParallaxEl.length > 0) {
                if (($body.hasClass("device-xl") || $body.hasClass("device-lg")) && !SEMICOLON.isMobile.any()) {
                    SEMICOLON.slider.sliderParallaxOffset();
                    var b = $sliderParallaxEl.outerHeight();
                    if ($slider.length > 0) {
                        if ($header.hasClass("transparent-header") || $("body").hasClass("side-header")) var a = 100;
                        else var a = 0;
                        $sliderParallaxEl.find(".slider-arrow-left,.slider-arrow-right,.vertical-middle:not(.no-fade),.slider-caption,.ei-title,.camera_prev,.camera_next").css({
                            opacity: 1 - ($window.scrollTop() - a) * 1.85 / b
                        })
                    }
                } else $sliderParallaxEl.find(".slider-arrow-left,.slider-arrow-right,.vertical-middle:not(.no-fade),.slider-caption,.ei-title,.camera_prev,.camera_next").css({
                    opacity: 1
                })
            }
        },
        captionPosition: function() {
            $sliderElement.find(".slider-caption:not(.custom-caption-pos)").each(function() {
                var a = $(this).outerHeight(),
                    b = $sliderElement.outerHeight();
                $(this).parents("#slider").prev("#header").hasClass("transparent-header") && ($body.hasClass("device-xl") || $body.hasClass("device-lg")) ? $(this).parents("#slider").prev("#header").hasClass("floating-header") ? $(this).css({
                    top: (b + 160 - a) / 2 + "px"
                }) : $(this).css({
                    top: (b + 100 - a) / 2 + "px"
                }) : $(this).css({
                    top: (b - a) / 2 + "px"
                })
            })
        },
        swiperSliderMenu: function(a) {
            if (a = void 0 !== a && a, $body.hasClass("device-xl") || $body.hasClass("device-lg") || $header.hasClass("transparent-header-responsive") && !$body.hasClass("primary-menu-open")) {
                var b = $slider.find(".swiper-slide.swiper-slide-active");
                SEMICOLON.slider.headerSchemeChanger(b, a)
            }
        },
        revolutionSliderMenu: function(a) {
            if (a = void 0 !== a && a, $body.hasClass("device-xl") || $body.hasClass("device-lg") || $header.hasClass("transparent-header-responsive") && !$body.hasClass("primary-menu-open")) {
                var b = $slider.find(".active-revslide");
                SEMICOLON.slider.headerSchemeChanger(b, a)
            }
        },
        headerSchemeChanger: function(b, f) {
            if (b.length > 0) {
                var d = !1;
                if (b.hasClass("dark")) {
                    if (oldHeaderClasses) var c = oldHeaderClasses.split(/ +/);
                    else var c = "";
                    var e = c.length;
                    if (e > 0) {
                        var a = 0;
                        for (a = 0; a < e; a++)
                            if ("dark" == c[a] && !0 == f) {
                                d = !0;
                                break
                            }
                    }
                    $("#header.transparent-header:not(.sticky-header,.semi-transparent,.floating-header)").addClass("dark"), d || $("#header.transparent-header.sticky-header,#header.transparent-header.semi-transparent.sticky-header,#header.transparent-header.floating-header.sticky-header").removeClass("dark"), $headerWrap.removeClass("not-dark")
                } else $body.hasClass("dark") ? (b.addClass("not-dark"), $("#header.transparent-header:not(.semi-transparent,.floating-header)").removeClass("dark"), $("#header.transparent-header:not(.sticky-header,.semi-transparent,.floating-header)").find("#header-wrap").addClass("not-dark")) : ($("#header.transparent-header:not(.semi-transparent,.floating-header)").removeClass("dark"), $headerWrap.removeClass("not-dark"));
                $header.hasClass("sticky-header") && SEMICOLON.header.stickyMenuClass(), SEMICOLON.header.logo()
            }
        },
        owlCaptionInit: function() {
            $owlCarouselEl.length > 0 && $owlCarouselEl.each(function() {
                var a = $(this);
                a.find(".owl-dot").length > 0 && a.addClass("with-carousel-dots")
            })
        }
    }, SEMICOLON.portfolio = {
        init: function() {
            SEMICOLON.portfolio.ajaxload()
        },
        gridInit: function(a) {
            return $().isotope ? !!(a.length < 1 || a.hasClass("customjs")) || void a.each(function() {
                var a = $(this),
                    b = a.attr("data-transition"),
                    c = a.attr("data-layout"),
                    d = a.attr("data-stagger"),
                    e = !0;
                b || (b = "0.65s"), c || (c = "masonry"), d || (d = 0), $body.hasClass("rtl") && (e = !1), setTimeout(function() {
                    a.hasClass("portfolio") ? a.isotope({
                        layoutMode: c,
                        isOriginLeft: e,
                        transitionDuration: b,
                        stagger: Number(d),
                        masonry: {
                            columnWidth: a.find(".portfolio-item:not(.wide)")[0]
                        }
                    }) : a.isotope({
                        layoutMode: c,
                        isOriginLeft: e,
                        transitionDuration: b
                    })
                }, 300)
            }) : (console.log("gridInit: Isotope not Defined."), !0)
        },
        filterInit: function() {
            return $().isotope ? !!($portfolioFilter.length < 1 || $portfolioFilter.hasClass("customjs")) || void $portfolioFilter.each(function() {
                var a = $(this),
                    d = a.attr("data-container"),
                    b = a.attr("data-active-class"),
                    c = a.attr("data-default");
                b || (b = "activeFilter"), a.find("a").off("click").on("click", function() {
                    a.find("li").removeClass(b), $(this).parent("li").addClass(b);
                    var c = $(this).attr("data-filter");
                    return $(d).isotope({
                        filter: c
                    }), !1
                }), c && (a.find("li").removeClass(b), a.find('[data-filter="' + c + '"]').parent("li").addClass(b), $(d).isotope({
                    filter: c
                }))
            }) : (console.log("filterInit: Isotope not Defined."), !0)
        },
        shuffleInit: function() {
            return $().isotope ? $(".portfolio-shuffle").length < 1 || void $(".portfolio-shuffle").off("click").on("click", function() {
                var a = $(this).attr("data-container");
                $(a).isotope("shuffle")
            }) : (console.log("shuffleInit: Isotope not Defined."), !0)
        },
        portfolioDescMargin: function() {
            var a = $(".portfolio-overlay");
            a.length > 0 && a.each(function() {
                var a = $(this);
                if (a.find(".portfolio-desc").length > 0) {
                    var c = a.outerHeight(),
                        d = a.find(".portfolio-desc").outerHeight();
                    if (a.find("a.left-icon").length > 0 || a.find("a.right-icon").length > 0 || a.find("a.center-icon").length > 0) var b = 60;
                    else var b = 0;
                    var e = (c - d - b) / 2;
                    a.find(".portfolio-desc").css({
                        "margin-top": e
                    })
                }
            })
        },
        arrange: function() {
            $portfolio.length > 0 && $portfolio.each(function() {
                var a = $(this);
                SEMICOLON.initialize.setFullColumnWidth(a)
            })
        },
        ajaxload: function() {
            $(".portfolio-ajax .portfolio-item a.center-icon").off("click").on("click", function(a) {
                var b = $(this).parents(".portfolio-item").attr("id");
                $(this).parents(".portfolio-item").hasClass("portfolio-active") || SEMICOLON.portfolio.loadItem(b, prevPostPortId), a.preventDefault()
            })
        },
        newNextPrev: function(a) {
            var b = SEMICOLON.portfolio.getNextItem(a),
                c = SEMICOLON.portfolio.getPrevItem(a);
            $("#next-portfolio").attr("data-id", b), $("#prev-portfolio").attr("data-id", c)
        },
        loadItem: function(a, f, b) {
            b || (b = !1);
            var c = SEMICOLON.portfolio.getNextItem(a),
                d = SEMICOLON.portfolio.getPrevItem(a);
            if (!1 == b) {
                SEMICOLON.portfolio.closeItem(), $portfolioAjaxLoader.fadeIn();
                var e = $("#" + a).attr("data-loader");
                $portfolioDetailsContainer.load(e, {
                    portid: a,
                    portnext: c,
                    portprev: d
                }, function() {
                    SEMICOLON.portfolio.initializeAjax(a), SEMICOLON.portfolio.openItem(), $portfolioItems.removeClass("portfolio-active"), $("#" + a).addClass("portfolio-active")
                })
            }
        },
        closeItem: function() {
            $portfolioDetails && $portfolioDetails.height() > 32 && ($portfolioAjaxLoader.fadeIn(), $portfolioDetails.find("#portfolio-ajax-single").fadeOut("600", function() {
                $(this).remove()
            }), $portfolioDetails.removeClass("portfolio-ajax-opened"))
        },
        openItem: function() {
            var a = $portfolioDetails.find("img").length,
                b = 0;
            if (a > 0) $portfolioDetails.find("img").on("load", function() {
                b++;
                var c = SEMICOLON.initialize.topScrollOffset();
                a === b && ($portfolioDetailsContainer.css({
                    display: "block"
                }), $portfolioDetails.addClass("portfolio-ajax-opened"), $portfolioAjaxLoader.fadeOut(), setTimeout(function() {
                    SEMICOLON.widget.loadFlexSlider(), SEMICOLON.initialize.lightbox(), SEMICOLON.initialize.resizeVideos(), SEMICOLON.widget.masonryThumbs(), $("html,body").stop(!0).animate({
                        scrollTop: $portfolioDetails.offset().top - c
                    }, 900, "easeOutQuad")
                }, 500))
            });
            else {
                var c = SEMICOLON.initialize.topScrollOffset();
                $portfolioDetailsContainer.css({
                    display: "block"
                }), $portfolioDetails.addClass("portfolio-ajax-opened"), $portfolioAjaxLoader.fadeOut(), setTimeout(function() {
                    SEMICOLON.widget.loadFlexSlider(), SEMICOLON.initialize.lightbox(), SEMICOLON.initialize.resizeVideos(), SEMICOLON.widget.masonryThumbs(), $("html,body").stop(!0).animate({
                        scrollTop: $portfolioDetails.offset().top - c
                    }, 900, "easeOutQuad")
                }, 500)
            }
        },
        getNextItem: function(c) {
            var a = "",
                b = $("#" + c).next();
            return 0 != b.length && (a = b.attr("id")), a
        },
        getPrevItem: function(c) {
            var a = "",
                b = $("#" + c).prev();
            return 0 != b.length && (a = b.attr("id")), a
        },
        initializeAjax: function(a) {
            prevPostPortId = $("#" + a), $("#next-portfolio, #prev-portfolio").off("click").on("click", function() {
                var a = $(this).attr("data-id");
                return $portfolioItems.removeClass("portfolio-active"), $("#" + a).addClass("portfolio-active"), SEMICOLON.portfolio.loadItem(a, prevPostPortId), !1
            }), $("#close-portfolio").off("click").on("click", function() {
                return $portfolioDetailsContainer.fadeOut("600", function() {
                    $portfolioDetails.find("#portfolio-ajax-single").remove()
                }), $portfolioDetails.removeClass("portfolio-ajax-opened"), $portfolioItems.removeClass("portfolio-active"), !1
            })
        }
    }, SEMICOLON.widget = {
        init: function() {
            SEMICOLON.widget.youtubeBgVideo(), SEMICOLON.widget.tabs(), SEMICOLON.widget.tabsJustify(), SEMICOLON.widget.tabsResponsive(), SEMICOLON.widget.tabsResponsiveResize(), SEMICOLON.widget.toggles(), SEMICOLON.widget.accordions(), SEMICOLON.widget.flickrFeed(), SEMICOLON.widget.dribbbleShots("012d3d72d12f93e1d41a19195d7da2fc87e6b5afa48a184256e398eb793cfe56"), SEMICOLON.widget.navTree(), SEMICOLON.widget.textRotater(), SEMICOLON.widget.carousel(), SEMICOLON.widget.linkScroll(), SEMICOLON.widget.ajaxForm(), SEMICOLON.widget.subscription(), SEMICOLON.widget.stickySidebar(), SEMICOLON.widget.cookieNotify(), SEMICOLON.widget.cartQuantity(), SEMICOLON.widget.extras()
        },
        parallax: function() {
            if ("undefined" != typeof skrollr && $.isFunction(skrollr)) return console.log("parallax: skrollr not Defined."), !0;
            ($parallaxEl.length > 0 || $parallaxPageTitleEl.length > 0 || $parallaxPortfolioEl.length > 0) && (SEMICOLON.isMobile.any() ? ($parallaxEl.addClass("mobile-parallax"), $parallaxPageTitleEl.addClass("mobile-parallax"), $parallaxPortfolioEl.addClass("mobile-parallax")) : skrollr.init({
                forceHeight: !1
            }))
        },
        loadFlexSlider: function() {
            if (!$().flexslider) return console.log("loadFlexSlider: FlexSlider not Defined."), !0;
            var a = $(".fslider:not(.customjs)").find(".flexslider");
            a.length > 0 && a.each(function() {
                var a = $(this),
                    f = a.parent(".fslider").attr("data-animation"),
                    b = a.parent(".fslider").attr("data-easing"),
                    c = a.parent(".fslider").attr("data-direction"),
                    g = a.parent(".fslider").attr("data-reverse"),
                    h = a.parent(".fslider").attr("data-slideshow"),
                    i = a.parent(".fslider").attr("data-pause"),
                    j = a.parent(".fslider").attr("data-speed"),
                    k = a.parent(".fslider").attr("data-video"),
                    d = a.parent(".fslider").attr("data-pagi"),
                    l = a.parent(".fslider").attr("data-arrows"),
                    p = a.parent(".fslider").attr("data-thumbs"),
                    m = a.parent(".fslider").attr("data-hover"),
                    e = a.parent(".fslider").attr("data-smooth-height"),
                    n = a.parent(".fslider").attr("data-touch"),
                    o = !1;
                f || (f = "slide"), b && "swing" != b || (b = "swing", o = !0), c || (c = "horizontal"), g = "true" == g, h = !h, i || (i = 5e3), j || (j = 600), k || (k = !1), e = "false" != e, "vertical" == c && (e = !1), d = "false" != d, "true" == p && (d = "thumbnails"), l = "false" != l, m = "false" != m, n = "false" != n, a.flexslider({
                    selector: ".slider-wrap > .slide",
                    animation: f,
                    easing: b,
                    direction: c,
                    reverse: g,
                    slideshow: h,
                    slideshowSpeed: Number(i),
                    animationSpeed: Number(j),
                    pauseOnHover: m,
                    video: k,
                    controlNav: d,
                    directionNav: l,
                    smoothHeight: e,
                    useCSS: o,
                    touch: n,
                    start: function(a) {
                        SEMICOLON.initialize.verticalMiddle(), a.parent().removeClass("preloader2"), setTimeout(function() {
                            $(".grid-container").isotope("layout")
                        }, 1200), SEMICOLON.initialize.lightbox(), $(".flex-prev").html('<i class="icon-angle-left"></i>'), $(".flex-next").html('<i class="icon-angle-right"></i>'), SEMICOLON.portfolio.portfolioDescMargin()
                    },
                    after: function() {
                        $(".grid-container").hasClass("portfolio-full") && ($(".grid-container.portfolio-full").isotope("layout"), SEMICOLON.portfolio.portfolioDescMargin()), $(".post-grid").hasClass("post-masonry-full") && $(".post-grid.post-masonry-full").isotope("layout")
                    }
                })
            })
        },
        html5Video: function() {
            var a = $(".video-wrap:has(video)");
            a.length > 0 && a.each(function() {
                var a = $(this),
                    b = a.find("video"),
                    c = a.outerWidth(),
                    e = a.outerHeight(),
                    d = 16 * e / 9,
                    f = e;
                if (d < c && (d = c, f = 9 * c / 16), b.css({
                        width: d + "px",
                        height: f + "px"
                    }), f > e && b.css({
                        left: "",
                        top: -((f - e) / 2) + "px"
                    }), d > c && b.css({
                        top: "",
                        left: -((d - c) / 2) + "px"
                    }), SEMICOLON.isMobile.any() && !a.hasClass("no-placeholder")) {
                    var g = b.attr("poster");
                    "" != g && a.append('<div class="video-placeholder" style="background-image: url(' + g + ');"></div>'), b.hide()
                }
            })
        },
        youtubeBgVideo: function() {
            if (!$().YTPlayer) return console.log("youtubeBgVideo: YoutubeBG Plugin not Defined."), !0;
            var a = $(".yt-bg-player");
            if (a.hasClass("customjs")) return !0;
            a.length > 0 && a.each(function() {
                var a = $(this),
                    n = a.attr("data-video"),
                    b = a.attr("data-mute"),
                    c = a.attr("data-ratio"),
                    d = a.attr("data-quality"),
                    e = a.attr("data-opacity"),
                    f = a.attr("data-container"),
                    g = a.attr("data-optimize"),
                    h = a.attr("data-loop"),
                    i = a.attr("data-volume"),
                    j = a.attr("data-start"),
                    k = a.attr("data-stop"),
                    l = a.attr("data-autoplay"),
                    m = a.attr("data-fullscreen");
                b = "false" != b, c || (c = "16/9"), d || (d = "hd720"), e || (e = 1), f || (f = "self"), g = "false" != g, h = "false" != h, i || (i = 1), j || (j = 0), k || (k = 0), l = "false" != l, m = "true" == m, a.YTPlayer({
                    videoURL: n,
                    mute: b,
                    ratio: c,
                    quality: d,
                    opacity: Number(e),
                    containment: f,
                    optimizeDisplay: g,
                    loop: h,
                    vol: Number(i),
                    startAt: Number(j),
                    stopAt: Number(k),
                    autoPlay: l,
                    realfullscreen: m,
                    showYTLogo: !1,
                    showControls: !1
                })
            })
        },
        tabs: function() {
            if (!$().tabs) return console.log("tabs: Tabs not Defined."), !0;
            var a = $(".tabs:not(.customjs)");
            a.length > 0 && a.each(function() {
                var b = $(this),
                    c = b.attr("data-speed"),
                    a = b.attr("data-active");
                c || (c = 400), a ? a -= 1 : a = 0;
                var d = window.location.hash;
                if (jQuery(d).length > 0) {
                    var e = d.split("#"),
                        f = document.getElementById(e[1]);
                    a = jQuery(".tab-content").index(f)
                }
                b.tabs({
                    active: Number(a),
                    show: {
                        effect: "fade",
                        duration: Number(c)
                    }
                })
            })
        },
        tabsJustify: function() {
            if ($("body").hasClass("device-xs") || $("body").hasClass("device-sm")) $(".tabs.tabs-justify").find(".tab-nav > li").css({
                width: ""
            });
            else {
                var a = $(".tabs.tabs-justify");
                a.length > 0 && a.each(function() {
                    var a = $(this),
                        b = a.find(".tab-nav > li"),
                        c = b.length,
                        e = 0,
                        d = 0;
                    d = Math.floor((e = a.hasClass("tabs-bordered") || a.hasClass("tabs-bb") ? a.find(".tab-nav").outerWidth() : a.find("tab-nav").hasClass("tab-nav2") ? a.find(".tab-nav").outerWidth() - 10 * c : a.find(".tab-nav").outerWidth() - 30) / c), b.css({
                        width: d + "px"
                    })
                })
            }
        },
        tabsResponsive: function() {
            if (!$().tabs) return console.log("tabs: Tabs not Defined."), !0;
            var a = $(".tabs.tabs-responsive");
            if (a.length < 1) return !0;
            a.each(function() {
                var a = $(this),
                    b = a.find(".tab-nav"),
                    c = a.find(".tab-container");
                b.children("li").each(function() {
                    var a = $(this).children("a"),
                        b = a.attr("href"),
                        d = a.html();
                    c.find(b).before('<div class="acctitle d-none"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>' + d + "</div>")
                })
            })
        },
        tabsResponsiveResize: function() {
            if (!$().tabs) return console.log("tabs: Tabs not Defined."), !0;
            var a = $(".tabs.tabs-responsive");
            if (a.length < 1) return !0;
            a.each(function() {
                var a = $(this),
                    c = a.tabs("option", "active") + 1,
                    b = a.attr("data-accordion-style");
                $("body").hasClass("device-sm") || $("body").hasClass("device-xs") ? (a.find(".tab-nav").addClass("d-none"), a.find(".tab-container").addClass("accordion " + b + " clearfix").attr("data-active", c), a.find(".tab-content").addClass("acc_content"), a.find(".acctitle").removeClass("d-none"), SEMICOLON.widget.accordions()) : ($("body").hasClass("device-md") || $("body").hasClass("device-lg") || $("body").hasClass("device-xl")) && (a.find(".tab-nav").removeClass("d-none"), a.find(".tab-container").removeClass("accordion " + b + " clearfix").attr("data-active", ""), a.find(".tab-content").removeClass("acc_content"), a.find(".acctitle").addClass("d-none"), a.tabs("refresh"))
            })
        },
        toggles: function() {
            var a = $(".toggle");
            a.length > 0 && a.each(function() {
                var a = $(this);
                "open" != a.attr("data-state") ? a.children(".togglec").hide() : a.children(".togglet").addClass("toggleta"), a.children(".togglet").off("click").on("click", function() {
                    return $(this).toggleClass("toggleta").next(".togglec").slideToggle(300), !0
                })
            })
        },
        accordions: function() {
            var a = $(".accordion");
            a.length > 0 && a.each(function() {
                var a = $(this),
                    c = a.attr("data-state"),
                    b = a.attr("data-active");
                b ? b -= 1 : b = 0, a.find(".acc_content").hide(), "closed" != c && a.find(".acctitle:eq(" + Number(b) + ")").addClass("acctitlec").next().show(), a.find(".acctitle").off("click").on("click", function() {
                    if ($(this).next().is(":hidden")) {
                        a.find(".acctitle").removeClass("acctitlec").next().slideUp("normal");
                        var b = $(this);
                        $(this).toggleClass("acctitlec").next().stop().slideDown("normal", function() {
                            ($body.hasClass("device-sm") || $body.hasClass("device-xs")) && a.hasClass("scroll-on-open") && $("html,body").stop(!0).animate({
                                scrollTop: b.offset().top - (SEMICOLON.initialize.topScrollOffset() - 40)
                            }, 800, "easeOutQuad")
                        })
                    }
                    return !1
                })
            })
        },
        runCounter: function(a, b) {
            !0 == b ? a.find("span").countTo({
                formatter: function(a, b) {
                    return a = (a = a.toFixed(b.decimals)).replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                }
            }) : a.find("span").countTo()
        },
        runRoundedSkills: function(b, a) {
            b.easyPieChart({
                size: Number(a.roundSkillSize),
                animate: Number(a.roundSkillSpeed),
                scaleColor: !1,
                trackColor: a.roundSkillTrackColor,
                lineWidth: Number(a.roundSkillWidth),
                lineCap: "square",
                barColor: a.roundSkillColor
            })
        },
        flickrFeed: function() {
            if (!$().jflickrfeed) return console.log("flickrFeed: jflickrfeed not Defined."), !0;
            var a = $(".flickr-feed");
            a.length > 0 && a.each(function() {
                var a = $(this),
                    d = a.attr("data-id"),
                    b = a.attr("data-count"),
                    e = a.attr("data-type"),
                    c = "photos_public.gne";
                "group" == e && (c = "groups_pool.gne"), b || (b = 9), a.jflickrfeed({
                    feedapi: c,
                    limit: Number(b),
                    qstrings: {
                        id: d
                    },
                    itemTemplate: '<a href="{{image_b}}" title="{{title}}" data-lightbox="gallery-item"><img src="{{image_s}}" alt="{{title}}" /></a>'
                }, function(a) {
                    SEMICOLON.initialize.lightbox()
                })
            })
        },
        dribbbleShots: function(b) {
            if (!$.jribbble) return console.log("dribbbleShots: Jribbble not Defined."), !0;
            if (!$().imagesLoaded) return console.log("dribbbleShots: imagesLoaded not Defined."), !0;
            var a = $(".dribbble-shots");
            a.length > 0 && ($.jribbble.setToken(b), a.each(function() {
                var a = $(this),
                    d = a.attr("data-user"),
                    b = a.attr("data-count"),
                    e = a.attr("data-list"),
                    c = a.attr("data-type");
                a.addClass("customjs"), b || (b = 9), "user" == c ? $.jribbble.users(d).shots({
                    sort: "recent",
                    page: 1,
                    per_page: Number(b)
                }).then(function(b) {
                    var c = [];
                    b.forEach(function(a) {
                        c.push('<a href="' + a.html_url + '" target="_blank">'), c.push('<img src="' + a.images.teaser + '" '), c.push('alt="' + a.title + '"></a>')
                    }), a.html(c.join("")), a.imagesLoaded().done(function() {
                        a.removeClass("customjs"), SEMICOLON.widget.masonryThumbs()
                    })
                }) : "list" == c && $.jribbble.shots(e, {
                    sort: "recent",
                    page: 1,
                    per_page: Number(b)
                }).then(function(b) {
                    var c = [];
                    b.forEach(function(a) {
                        c.push('<a href="' + a.html_url + '" target="_blank">'), c.push('<img src="' + a.images.teaser + '" '), c.push('alt="' + a.title + '"></a>')
                    }), a.html(c.join("")), a.imagesLoaded().done(function() {
                        a.removeClass("customjs"), SEMICOLON.widget.masonryThumbs()
                    })
                })
            }))
        },
        navTree: function() {
            var a = $(".nav-tree");
            a.length > 0 && a.each(function() {
                var a = $(this),
                    b = a.attr("data-speed"),
                    c = a.attr("data-easing");
                b || (b = 250), c || (c = "swing"), a.find("ul li:has(ul)").addClass("sub-menu"), a.find("ul li:has(ul) > a").append(' <i class="icon-angle-down"></i>'), a.hasClass("on-hover") ? a.find("ul li:has(ul):not(.active)").hover(function(a) {
                    $(this).children("ul").stop(!0, !0).slideDown(Number(b), c)
                }, function() {
                    $(this).children("ul").delay(250).slideUp(Number(b), c)
                }) : a.find("ul li:has(ul) > a").off("click").on("click", function(e) {
                    var d = $(this);
                    a.find("ul li").not(d.parents()).removeClass("active"), d.parent().children("ul").slideToggle(Number(b), c, function() {
                        $(this).find("ul").hide(), $(this).find("li.active").removeClass("active")
                    }), a.find("ul li > ul").not(d.parent().children("ul")).not(d.parents("ul")).slideUp(Number(b), c), d.parent("li:has(ul)").toggleClass("active"), e.preventDefault()
                })
            })
        },
        carousel: function() {
            if (!$().owlCarousel) return console.log("carousel: Owl Carousel not Defined."), !0;
            var a = $(".carousel-widget:not(.customjs)");
            if (a.length < 1) return !0;
            a.each(function() {
                var a = $(this),
                    i = a.attr("data-items"),
                    d = a.attr("data-items-xl"),
                    e = a.attr("data-items-lg"),
                    f = a.attr("data-items-md"),
                    g = a.attr("data-items-sm"),
                    j = a.attr("data-items-xs"),
                    k = a.attr("data-loop"),
                    c = a.attr("data-autoplay"),
                    h = a.attr("data-speed"),
                    l = a.attr("data-animate-in"),
                    m = a.attr("data-animate-out"),
                    n = a.attr("data-nav"),
                    o = a.attr("data-pagi"),
                    p = a.attr("data-margin"),
                    q = a.attr("data-stage-padding"),
                    r = a.attr("data-merge"),
                    s = a.attr("data-start"),
                    t = a.attr("data-rewind"),
                    b = a.attr("data-slideby"),
                    u = a.attr("data-center"),
                    v = a.attr("data-lazyload"),
                    w = a.attr("data-video"),
                    x = a.attr("data-rtl"),
                    y = 5e3,
                    z = !0;
                i || (i = 4), d || (d = Number(i)), e || (e = Number(d)), f || (f = Number(e)), g || (g = Number(f)), j || (j = Number(g)), h || (h = 250), p || (p = 20), q || (q = 0), s || (s = 0), b || (b = 1), b = "page" == b ? "page" : Number(b), k = "true" == k, c ? (y = Number(c), c = !0) : (c = !1, z = !1), l || (l = !1), m || (m = !1), n = "false" != n, o = "false" != o, t = "true" == t, r = "true" == r, u = "true" == u, v = "true" == v, w = "true" == w, x = !!("true" == x || $body.hasClass("rtl")), a.owlCarousel({
                    margin: Number(p),
                    loop: k,
                    stagePadding: Number(q),
                    merge: r,
                    startPosition: Number(s),
                    rewind: t,
                    slideBy: b,
                    center: u,
                    lazyLoad: v,
                    nav: n,
                    navText: ['<i class="icon-angle-left"></i>', '<i class="icon-angle-right"></i>'],
                    autoplay: c,
                    autoplayTimeout: y,
                    autoplayHoverPause: z,
                    dots: o,
                    smartSpeed: Number(h),
                    fluidSpeed: Number(h),
                    video: w,
                    animateIn: l,
                    animateOut: m,
                    rtl: x,
                    responsive: {
                        0: {
                            items: Number(j)
                        },
                        576: {
                            items: Number(g)
                        },
                        768: {
                            items: Number(f)
                        },
                        992: {
                            items: Number(e)
                        },
                        1200: {
                            items: Number(d)
                        }
                    },
                    onInitialized: function() {
                        SEMICOLON.slider.owlCaptionInit(), SEMICOLON.slider.sliderParallaxDimensions(), SEMICOLON.initialize.lightbox()
                    }
                })
            })
        },
        masonryThumbs: function() {
            var a = $(".masonry-thumbs:not(.customjs)");
            a.length > 0 && a.each(function() {
                var a = $(this);
                SEMICOLON.widget.masonryThumbsArrange(a)
            })
        },
        masonryThumbsArrange: function(a) {
            if (!$().isotope) return console.log("masonryThumbsArrange: Isotope not Defined."), !0;
            SEMICOLON.initialize.setFullColumnWidth(a), a.isotope("layout")
        },
        notifications: function(g) {
            if ("undefined" == typeof toastr) return console.log("notifications: Toastr not Defined."), !0;
            toastr.remove();
            var a = $(g),
                c = a.attr("data-notify-position"),
                d = a.attr("data-notify-type"),
                b = a.attr("data-notify-msg"),
                e = a.attr("data-notify-timeout"),
                f = a.attr("data-notify-close");
            return c = c ? "toast-" + a.attr("data-notify-position") : "toast-top-right", b || (b = "Please set a message!"), e || (e = 5e3), f = "true" == f, toastr.options.positionClass = c, toastr.options.timeOut = Number(e), toastr.options.closeButton = f, toastr.options.closeHtml = '<button><i class="icon-remove"></i></button>', "warning" == d ? toastr.warning(b) : "error" == d ? toastr.error(b) : "success" == d ? toastr.success(b) : toastr.info(b), !1
        },
        textRotater: function() {
            if (!$().Morphext) return console.log("textRotater: Morphext not Defined."), !0;
            $textRotaterEl.length > 0 && $textRotaterEl.each(function() {
                $(this);
                var a = $(this).attr("data-rotate"),
                    b = $(this).attr("data-speed"),
                    c = $(this).attr("data-separator");
                a || (a = "fade"), b || (b = 1200), c || (c = ","), $(this).find(".t-rotate").Morphext({
                    animation: a,
                    separator: c,
                    speed: Number(b)
                })
            })
        },
        linkScroll: function() {
            $("a[data-scrollto]").off("click").on("click", function() {
                var a = $(this),
                    e = a.attr("data-scrollto"),
                    b = a.attr("data-speed"),
                    c = a.attr("data-offset"),
                    d = a.attr("data-easing"),
                    f = a.attr("data-highlight");
                return !!a.parents("#primary-menu").hasClass("on-click") || (b || (b = 750), c || (c = SEMICOLON.initialize.topScrollOffset()), d || (d = "easeOutQuad"), $("html,body").stop(!0).animate({
                    scrollTop: $(e).offset().top - Number(c)
                }, Number(b), d, function() {
                    f && ($(e).find(".highlight-me").length > 0 ? ($(e).find(".highlight-me").animate({
                        backgroundColor: f
                    }, 300), setTimeout(function() {
                        $(e).find(".highlight-me").animate({
                            backgroundColor: "transparent"
                        }, 300)
                    }, 500)) : ($(e).animate({
                        backgroundColor: f
                    }, 300), setTimeout(function() {
                        $(e).animate({
                            backgroundColor: "transparent"
                        }, 300)
                    }, 500)))
                }), !1)
            })
        },
        ajaxForm: function() {
            if (!$().validate) return console.log("ajaxForm: Form Validate not Defined."), !0;
            if (!$().ajaxSubmit) return console.log("ajaxForm: jQuery Form not Defined."), !0;
            var a = $(".form-widget:not(.customjs)");
            if (a.length < 1) return !0;
            a.each(function() {
                var a = $(this),
                    b = a.find("form").attr("id"),
                    c = a.attr("data-alert-type"),
                    d = a.attr("data-loader"),
                    e = a.find(".form-result"),
                    f = a.attr("data-redirect");
                c || (c = "notify"), b && $body.addClass(b + "-ready"), a.find("form").validate({
                    errorPlacement: function(b, a) {
                        a.parents(".form-group").length > 0 ? b.appendTo(a.parents(".form-group")) : b.insertAfter(a)
                    },
                    focusCleanup: !0,
                    submitHandler: function(a) {
                        if (e.hide(), "button" == d) {
                            var g = $(a).find("button"),
                                h = g.html();
                            g.html('<i class="icon-line-loader icon-spin nomargin"></i>')
                        } else $(a).find(".form-process").fadeIn();
                        b && $body.removeClass(b + "-ready " + b + "-complete " + b + "-success " + b + "-error").addClass(b + "-processing"), $(a).ajaxSubmit({
                            target: e,
                            dataType: "json",
                            success: function(i) {
                                if ("button" == d ? g.html(h) : $(a).find(".form-process").fadeOut(), "error" != i.alert && f) return window.location.replace(f), !0;
                                if ("inline" == c) {
                                    if ("error" == i.alert) var j = "alert-danger";
                                    else var j = "alert-success";
                                    e.removeClass("alert-danger alert-success").addClass("alert " + j).html(i.message).slideDown(400)
                                } else "notify" == c && (e.attr("data-notify-type", i.alert).attr("data-notify-msg", i.message).html(""), SEMICOLON.widget.notifications(e));
                                if ("error" != i.alert) {
                                    $(a).resetForm(), $(a).find(".btn-group > .btn").removeClass("active"), "undefined" != typeof tinyMCE && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden() && tinymce.activeEditor.setContent("");
                                    var k = $(a).find(".input-range-slider");
                                    k.length > 0 && k.each(function() {
                                        $(this).data("ionRangeSlider").reset()
                                    });
                                    var l = $(a).find(".input-rating");
                                    l.length > 0 && l.each(function() {
                                        $(this).rating("reset")
                                    });
                                    var m = $(a).find(".selectpicker");
                                    m.length > 0 && m.each(function() {
                                        $(this).selectpicker("val", ""), $(this).selectpicker("deselectAll")
                                    }), $(a).find(".input-select2,select[data-selectsplitter-firstselect-selector]").change(), $(a).trigger("formSubmitSuccess"), $body.removeClass(b + "-error").addClass(b + "-success")
                                } else $(a).trigger("formSubmitError"), $body.removeClass(b + "-success").addClass(b + "-error");
                                b && $body.removeClass(b + "-processing").addClass(b + "-complete"), $(a).find(".g-recaptcha").children("div").length > 0 && grecaptcha.reset()
                            }
                        })
                    }
                })
            })
        },
        subscription: function() {
            if (!$().validate) return console.log("subscription: Form Validate not Defined."), !0;
            if (!$().ajaxSubmit) return console.log("subscription: jQuery Form not Defined."), !0;
            var a = $(".subscribe-widget:not(.customjs)");
            if (a.length < 1) return !0;
            a.each(function() {
                var a = $(this),
                    b = a.attr("data-alert-type"),
                    c = a.attr("data-loader"),
                    d = a.find(".widget-subscribe-form-result"),
                    e = a.attr("data-redirect");
                a.find("form").validate({
                    submitHandler: function(a) {
                        if (d.hide(), "button" == c) {
                            var f = $(a).find("button"),
                                g = f.html();
                            f.html('<i class="icon-line-loader icon-spin nomargin"></i>')
                        } else $(a).find(".icon-email2").removeClass("icon-email2").addClass("icon-line-loader icon-spin");
                        $(a).ajaxSubmit({
                            target: d,
                            dataType: "json",
                            resetForm: !0,
                            success: function(h) {
                                if ("button" == c ? f.html(g) : $(a).find(".icon-line-loader").removeClass("icon-line-loader icon-spin").addClass("icon-email2"), "error" != h.alert && e) return window.location.replace(e), !0;
                                if ("inline" == b) {
                                    if ("error" == h.alert) var i = "alert-danger";
                                    else var i = "alert-success";
                                    d.addClass("alert " + i).html(h.message).slideDown(400)
                                } else d.attr("data-notify-type", h.alert).attr("data-notify-msg", h.message).html(""), SEMICOLON.widget.notifications(d)
                            }
                        })
                    }
                })
            })
        },
        stickySidebar: function() {
            if (!$().scwStickySidebar) return console.log("stickySidebar: Sticky Sidebar is not Defined."), !0;
            var a = jQuery(".sticky-sidebar-wrap");
            if (a.length < 1) return !0;
            a.each(function() {
                var a = $(this),
                    b = a.attr("data-offset-top"),
                    c = a.attr("data-offset-bottom");
                b || (b = 110), c || (c = 50), a.scwStickySidebar({
                    additionalMarginTop: Number(b),
                    additionalMarginBottom: Number(c)
                })
            })
        },
        cookieNotify: function() {
            if ("undefined" === Cookies) return console.log("cookieNotify: Cookie Function not defined."), !0;
            if ($cookieNotification.length > 0) {
                var a = $cookieNotification.outerHeight();
                $cookieNotification.css({
                    bottom: -a
                }), "yesConfirmed" != Cookies.get("websiteUsesCookies") && $cookieNotification.css({
                    bottom: 0,
                    opacity: 1
                }), $(".cookie-accept").off("click").on("click", function() {
                    return $cookieNotification.css({
                        bottom: -a,
                        opacity: 0
                    }), Cookies.set("websiteUsesCookies", "yesConfirmed", {
                        expires: 30
                    }), !1
                })
            }
        },
        cartQuantity: function() {
            $(".plus").off("click").on("click", function() {
                var b = $(this).parents(".quantity").find(".qty").val(),
                    a = $(this).parents(".quantity").find(".qty").attr("step");
                if (a || (a = 1), /^\d+$/.test(b)) {
                    var c = Number(b) + Number(a);
                    $(this).parents(".quantity").find(".qty").val(c)
                } else $(this).parents(".quantity").find(".qty").val(Number(a));
                return !1
            }), $(".minus").off("click").on("click", function() {
                var b = $(this).parents(".quantity").find(".qty").val(),
                    a = $(this).parents(".quantity").find(".qty").attr("step");
                if (a || (a = 1), /^\d+$/.test(b)) {
                    if (Number(b) > 1) {
                        var c = Number(b) - Number(a);
                        $(this).parents(".quantity").find(".qty").val(c)
                    }
                } else $(this).parents(".quantity").find(".qty").val(Number(a));
                return !1
            })
        },
        extras: function() {
            $().tooltip ? $('[data-toggle="tooltip"]').tooltip({
                container: "body"
            }) : console.log("extras: Bootstrap Tooltip not defined."), $().popover ? $("[data-toggle=popover]").popover() : console.log("extras: Bootstrap Popover not defined."), $(".style-msg").on("click", ".close", function(a) {
                $(this).parents(".style-msg").slideUp(), a.preventDefault()
            }), $("#primary-menu-trigger,#overlay-menu-close").off("click").on("click", function() {
                return $("#primary-menu").find("ul.mobile-primary-menu").length > 0 ? $("#primary-menu > ul.mobile-primary-menu, #primary-menu > div > ul.mobile-primary-menu").toggleClass("d-block") : $("#primary-menu > ul, #primary-menu > div > ul").toggleClass("d-block"), $body.toggleClass("primary-menu-open"), !1
            }), $("#page-submenu-trigger").off("click").on("click", function() {
                return $body.toggleClass("top-search-open", !1), $pagemenu.toggleClass("pagemenu-active"), !1
            }), $pagemenu.find("nav").off("click").on("click", function(a) {
                $body.toggleClass("top-search-open", !1), $topCart.toggleClass("top-cart-open", !1)
            }), SEMICOLON.isMobile.any() && $body.addClass("device-touch")
        }
    }, SEMICOLON.isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i)
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i)
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i)
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i)
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i)
        },
        any: function() {
            return SEMICOLON.isMobile.Android() || SEMICOLON.isMobile.BlackBerry() || SEMICOLON.isMobile.iOS() || SEMICOLON.isMobile.Opera() || SEMICOLON.isMobile.Windows()
        }
    }, SEMICOLON.documentOnResize = {
        init: function() {
            setTimeout(function() {
                SEMICOLON.header.topsocial(), SEMICOLON.header.fullWidthMenu(), SEMICOLON.header.overlayMenu(), SEMICOLON.initialize.fullScreen(), SEMICOLON.initialize.dataResponsiveHeights(), SEMICOLON.initialize.verticalMiddle(), SEMICOLON.initialize.testimonialsGrid(), SEMICOLON.initialize.stickFooterOnSmall(), SEMICOLON.initialize.stickyFooter(), SEMICOLON.slider.sliderParallaxDimensions(), SEMICOLON.slider.captionPosition(), SEMICOLON.portfolio.arrange(), SEMICOLON.portfolio.portfolioDescMargin(), SEMICOLON.widget.tabsResponsiveResize(), SEMICOLON.widget.tabsJustify(), SEMICOLON.widget.html5Video(), SEMICOLON.widget.masonryThumbs(), $gridContainer.length > 0 && ($gridContainer.hasClass(".customjs") || ($().isotope ? $gridContainer.isotope("layout") : console.log("documentOnResize > init: Isotope not defined."))), ($body.hasClass("device-xl") || $body.hasClass("device-lg")) && $("#primary-menu").find("ul.mobile-primary-menu").removeClass("d-block")
            }, 500), windowWidth = $window.width()
        }
    }, SEMICOLON.documentOnReady = {
        init: function() {
            SEMICOLON.initialize.init(), SEMICOLON.header.init(), ($slider.length > 0 || $sliderElement.length > 0) && SEMICOLON.slider.init(), $portfolio.length > 0 && SEMICOLON.portfolio.init(), SEMICOLON.widget.init(), SEMICOLON.documentOnReady.windowscroll()
        },
        windowscroll: function() {
            var b = 0,
                a = 0,
                d = 0;
            $header.length > 0 && (b = $header.offset().top), $header.length > 0 && (a = $headerWrap.offset().top), $pagemenu.length > 0 && (d = $header.length > 0 && !$header.hasClass("no-sticky") ? $header.hasClass("sticky-style-2") || $header.hasClass("sticky-style-3") ? $pagemenu.offset().top - $headerWrap.outerHeight() : $pagemenu.offset().top - $header.outerHeight() : $pagemenu.offset().top);
            var c = $header.attr("data-sticky-offset");
            if (void 0 !== c) {
                if ("full" == c) {
                    a = $window.height();
                    var e = $header.attr("data-sticky-offset-negative");
                    void 0 !== e && (a = a - e - 1)
                } else a = Number(c)
            } else $header.hasClass("sticky-style-2") || $header.hasClass("sticky-style-3") ? "undefined" === a && (a = b) : a = b;
            SEMICOLON.header.stickyMenu(a), SEMICOLON.header.stickyPageMenu(d), $window.on("scroll", function() {
                SEMICOLON.initialize.goToTopScroll(), $("body.open-header.close-header-on-scroll").removeClass("side-header-open"), SEMICOLON.header.stickyMenu(a), SEMICOLON.header.stickyPageMenu(d), SEMICOLON.header.logo()
            }), window.addEventListener("scroll", onScrollSliderParallax, !1), $onePageMenuEl.length > 0 && ($().scrolled ? $window.scrolled(function() {
                SEMICOLON.header.onepageScroller()
            }) : console.log("windowscroll: Scrolled Function not defined."))
        }
    }, SEMICOLON.documentOnLoad = {
        init: function() {
            SEMICOLON.slider.captionPosition(), SEMICOLON.slider.swiperSliderMenu(!0), SEMICOLON.slider.revolutionSliderMenu(!0), SEMICOLON.initialize.testimonialsGrid(), SEMICOLON.initialize.verticalMiddle(), SEMICOLON.initialize.stickFooterOnSmall(), SEMICOLON.initialize.stickyFooter(), SEMICOLON.portfolio.gridInit($gridContainer), SEMICOLON.portfolio.filterInit(), SEMICOLON.portfolio.shuffleInit(), SEMICOLON.portfolio.arrange(), SEMICOLON.portfolio.portfolioDescMargin(), SEMICOLON.widget.parallax(), SEMICOLON.widget.loadFlexSlider(), SEMICOLON.widget.html5Video(), SEMICOLON.widget.masonryThumbs(), SEMICOLON.header.topsocial(), SEMICOLON.header.responsiveMenuClass(), SEMICOLON.initialize.modal()
        }
    };
    var $window = $(window),
        $body = $("body"),
        $wrapper = $("#wrapper"),
        $header = $("#header"),
        $headerWrap = $("#header-wrap"),
        $content = $("#content"),
        $footer = $("#footer"),
        windowWidth = $window.width(),
        oldHeaderClasses = $header.attr("class"),
        oldHeaderWrapClasses = $headerWrap.attr("class"),
        stickyMenuClasses = $header.attr("data-sticky-class"),
        responsiveMenuClasses = $header.attr("data-responsive-class"),
        defaultLogo = $("#logo").find(".standard-logo"),
        defaultLogoWidth = defaultLogo.find("img").outerWidth(),
        retinaLogo = $("#logo").find(".retina-logo"),
        defaultLogoImg = defaultLogo.find("img").attr("src"),
        retinaLogoImg = retinaLogo.find("img").attr("src"),
        defaultDarkLogo = defaultLogo.attr("data-dark-logo"),
        retinaDarkLogo = retinaLogo.attr("data-dark-logo"),
        defaultStickyLogo = defaultLogo.attr("data-sticky-logo"),
        retinaStickyLogo = retinaLogo.attr("data-sticky-logo"),
        defaultMobileLogo = defaultLogo.attr("data-mobile-logo"),
        retinaMobileLogo = retinaLogo.attr("data-mobile-logo"),
        $pagemenu = $("#page-menu"),
        $onePageMenuEl = $(".one-page-menu"),
        onePageGlobalOffset = 0,
        $portfolio = $(".portfolio"),
        $shop = $(".shop"),
        $gridContainer = $(".grid-container"),
        $slider = $("#slider"),
        $sliderParallaxEl = $(".slider-parallax"),
        $sliderElement = $(".slider-element"),
        swiperSlider = "",
        $pageTitle = $("#page-title"),
        $portfolioItems = $(".portfolio-ajax").find(".portfolio-item"),
        $portfolioDetails = $("#portfolio-ajax-wrap"),
        $portfolioDetailsContainer = $("#portfolio-ajax-container"),
        $portfolioAjaxLoader = $("#portfolio-ajax-loader"),
        $portfolioFilter = $(".portfolio-filter,.custom-filter"),
        prevPostPortId = "",
        $topSearch = $("#top-search"),
        $topCart = $("#top-cart"),
        $verticalMiddleEl = $(".vertical-middle"),
        $topSocialEl = $("#top-social").find("li"),
        $siStickyEl = $(".si-sticky"),
        $dotsMenuEl = $(".dots-menu"),
        $goToTopEl = $("#gotoTop"),
        $fullScreenEl = $(".full-screen"),
        $testimonialsGridEl = $(".testimonials-grid"),
        $pageSectionEl = $(".page-section"),
        $owlCarouselEl = $(".owl-carousel"),
        $parallaxEl = $(".parallax"),
        $parallaxPageTitleEl = $(".page-title-parallax"),
        $parallaxPortfolioEl = $(".portfolio-parallax").find(".portfolio-image"),
        $textRotaterEl = $(".text-rotater"),
        $cookieNotification = $("#cookie-notification");
    $(document).ready(SEMICOLON.documentOnReady.init), $window.on("load", SEMICOLON.documentOnLoad.init), $window.on("resize", SEMICOLON.documentOnResize.init)
}(jQuery);
! function(e, a, t, n, c, o, s) {
    e.GoogleAnalyticsObject = c, e[c] = e[c] || function() {
        (e[c].q = e[c].q || []).push(arguments)
    }, e[c].l = 1 * new Date, o = a.createElement(t), s = a.getElementsByTagName(t)[0], o.async = 1, o.src = n, s.parentNode.insertBefore(o, s)
}(window, document, "script", "//www.google-analytics.com/analytics.js", "ga"), ga("create", "UA-23255544-12", "auto"), ga("send", "pageview");
jQuery(document).ready(function() {
    jQuery('.disable-pagetransition').on('click', function() {
        jQuery('body').addClass('no-transition');
        return false;
    });
});