var wScreen = $(window).width(),
    isRunMenu = !1,
    HLY = {
        init: function() {
          HLY.global.OpenSubmenu(), HLY.global.OpenMenu(), HLY.global.bannerHome(), HLY.global.crsCate(), HLY.global.scrollPage(), HLY.global.subMenuPage(), setTimeout(function() {
            HLY.global.detectMaxHeight()
            }, 500), $(window).resize(function(e) {
            HLY.global.detectMaxHeight()
            }), $(".loading").fadeOut(function() {
                $(window).innerWidth() > 767 && HLY.global.animationScroll()
            }), $(".nano").nanoScroller()
        }
    };
HLY.global = {
    scrollPage: function() {
        $("body").on("click", ".js-scrollCt", function() {
            var e = $(this).attr("data");
            return $("body,html").animate({
                scrollTop: $(e).offset().top - 50
            }, 600), !1
        })
    },
    subMenuPage: function() {
        $("ul>li>a", "#submenuPage").click(function(e) {
            var a = $(this).next("ul");
            0 !== a.length && (e.preventDefault(), a.toggleClass("collapsed"))
        }), $("#irToggleMenu").click(function() {
            $("#submenuPage").toggleClass("active")
        })
    },
    bannerHome: function() {
        $(".slider").on("init", function(e, a) {
            $(".slider").animate({
                opacity: 1
            }), HLY.global.addVideo()
        });
        var e = $(".slider").slick({
            infinite: !0,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: !0,
            arrows: !1,
            autoplaySpeed: 5e3,
            adaptiveHeight: !0
        });
        e.on("beforeChange", function(e, a, t, i) {}), e.on("afterChange", function(e, a, t, i) {
            $(".hasVideo").html(""), HLY.global.addVideo()
        })
    },
    addVideo: function() {
        var e, a = $(".slick-current").attr("data");

        function t(a) {
            e.playVideo()
        }

        function i(e) {
            e.data
        }
        a && $(".slick-current").append('<div class="video-background"><div id="videoYt" class="video-foreground"><div id="player" ></div></div></div>').ready(function() {
            e = new YT.Player("player", {
                width: "100%",
                height: "100%",
                videoId: a,
                playerVars: {
                    rel: 0,
                    showinfo: 0,
                    autoplay: 0,
                    controls: 0
                },
                events: {
                    onReady: t,
                    onStateChange: i
                }
            })
        })
    },
    crsCate: function() {
        $(".listCateHome").on("init", function(e, a) {
            $(".listCateHome").animate({
                opacity: 1
            })
        });
        var e = $(".listCateHome").slick({
            infinite: !1,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: !1,
            arrows: !1,
            autoplaySpeed: 5e3,
            adaptiveHeight: !0
        });
        e.on("beforeChange", function(e, a, t, i) {}), e.on("afterChange", function(e, a, t, i) {
            var n = $(".listCateHome .slick-current ").attr("data-slick-index");
            $(window).innerWidth() > 767 && (0 == n ? $(".infoCate").fadeIn() : $(".infoCate").fadeOut())
        })
    },
    OpenMenu: function() {
        $(".hamburger-menu").on("click", function() {
            $(".ctMenu").hasClass("active") ? ($(".hdContainer,.ctMenu").removeClass("active"), $(".bar").removeClass("animate"), $(".ctMenu").fadeOut()) : ($(".bar").addClass("animate"), $(".hdContainer,.ctMenu").addClass("active"), TweenMax.set($("#nav > li,.subLink a"), {
                x: -50,
                autoAlpha: 0
            }), $(".ctMenu").fadeIn(function() {
                TweenMax.staggerTo($("#nav > li,.subLink a"), 1, {
                    x: 0,
                    autoAlpha: 1,
                    ease: Power4.easeOut
                }, .1)
            }))
        })
    },
    OpenSubmenu: function() {
        $("#nav > li").hover(function() {
            $(window).innerWidth() > 767 && ($(this).find(".submenu").show(), $(this).find(".submenu").addClass("active"), TweenMax.set($(this).find(".submenu"), {
                x: -50,
                autoAlpha: 0
            }), TweenMax.set($(this).find(".submenu a"), {
                x: -30,
                autoAlpha: 0
            }), TweenMax.to($(this), 1, {
                x: 25,
                ease: Power2.easeOut
            }), TweenMax.to($(this).find(".submenu"), 1, {
                x: 0,
                autoAlpha: 1,
                ease: Power2.easeOut
            }), TweenMax.staggerTo($(this).find(".submenu a"), 1, {
                x: 0,
                autoAlpha: 1,
                ease: Power4.easeOut
            }, .1))
        }, function() {
            $(window).innerWidth() > 767 && (TweenMax.staggerTo($(".submenu.active,.submenu.active a"), 1, {
                x: -50,
                autoAlpha: 0,
                ease: Power4.easeOut
            }, .1), $(this).find(".submenu.active").removeClass("active"), TweenMax.to($("#nav > li"), 1, {
                x: 0,
                ease: Power2.easeOut
            }))
        })
    },
    detectMaxHeight: function() {
        var e = 0,
            a = 0;
        $(".listCateHome .item h2,.itemPageWrap ul li div").css({
            height: "auto"
        }), $(".listCateHome .item h2").each(function() {
            e = e > $(this).height() ? e : $(this).height()
        }), $(".listCateHome .item h2").height(e), $(".itemPageWrap ul li div").each(function() {
            a = a > $(this).height() ? a : $(this).height()
        }), $(".itemPageWrap ul li div").height(a)
    },
    animationScroll: function() {
        var e = new TimelineLite,
            a = $(".stagger-up:visible"),
            t = $(".stagger-left:visible"),
            i = $(".stagger-right:visible"),
            n = $(".stagger-down:visible");
        e.set(a, {
            y: 200,
            autoAlpha: 0,
            visibility: "visible"
        }), e.set(t, {
            visibility: "visible"
        }), e.set(i, {
            visibility: "visible"
        }), e.set(n, {
            visibility: "visible"
        }), e.staggerTo(a, 1.5, {
            y: 0,
            autoAlpha: 1,
            ease: Power4.easeOut
        }, .2), e.staggerFrom(t, 1.5, {
            x: -200,
            autoAlpha: 0,
            ease: Power4.easeOut
        }, .2, "-=1.5"), e.staggerFrom(i, 1.5, {
            x: 200,
            autoAlpha: 0,
            ease: Power4.easeOut
        }, .2, "-=1"), e.staggerFrom(n, 1.5, {
            y: -200,
            autoAlpha: 0,
            ease: Power4.easeOut
        }, .2, "-=2");
        var o = new ScrollMagic.Controller;
        TweenMax.set($("#itemPageWrap ul li"), {
            y: 200,
            autoAlpha: 0
        });

        new ScrollMagic.Scene({
            triggerElement: "#itemPageWrap",
            triggerHook: .6
        }).on("enter", function(e) {
            TweenMax.staggerTo($("#itemPageWrap ul li"), 1.5, {
                y: 0,
                autoAlpha: 1,
                ease: Power4.easeOut
            }, .2)
        }).addTo(o);
        TweenMax.set($(".partnertPd ul li"), {
            y: 200,
            autoAlpha: 0
        });
        new ScrollMagic.Scene({
            triggerElement: ".partnertPd",
            triggerHook: .6
        }).on("enter", function(e) {
            TweenMax.staggerTo($(".partnertPd ul li"), 1.5, {
                y: 0,
                autoAlpha: 1,
                ease: Power4.easeOut
            }, .2)
        }).addTo(o).reverse(!0);
        $(".paralax").each(function(e, a) {
            var t = $(this),
                i = t.attr("data"),
                n = t.attr("section");
            TweenMax.set(t, {
                y: i,
                autoAlpha: .4
            });
            var l = new TimelineMax;
            l.to(t, 2, {
                y: 0,
                autoAlpha: 1
            }, .2);
            new ScrollMagic.Scene({
                triggerElement: n,
                triggerHook: 1,
                duration: "60%",
                reverse: !0
            }).setTween(l).addTo(o)
        }), $(".paralax-hor").each(function(e, a) {
            var t = $(this),
                i = t.attr("data"),
                n = t.attr("section");
            TweenMax.set(t, {
                x: i,
                autoAlpha: .4
            });
            var l = new TimelineMax;
            l.to(t, 2, {
                x: 0,
                autoAlpha: 1,
                ease: Power4.easeOut
            }, .2);
            new ScrollMagic.Scene({
                triggerElement: n,
                triggerHook: 1,
                duration: "100%",
                reverse: !0
            }).setTween(l).addTo(o)
        })
    }
}, HLY.init();
var stopAllYouTubeVideos = function() {
        var e = document.querySelectorAll("iframe");
        Array.prototype.forEach.call(e, function(e) {
            e.contentWindow.postMessage(JSON.stringify({
                event: "command",
                func: "pauseVideo"
            }), "*")
        })
    },
    $fwindow = $(window),
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
$fwindow.on("scroll resize", function() {
    if (scrollTop = window.pageYOffset || document.documentElement.scrollTop, $("#bannerHome").length) {
        var e = $("#bannerHome").offset().top + $("#bannerHome").innerHeight();
        scrollTop > e && stopAllYouTubeVideos()
    }
});
