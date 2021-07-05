/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/hoverIntent.js":
/*!********************************************!*\
  !*** ./resources/assets/js/hoverIntent.js ***!
  \********************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * hoverIntent is similar to jQuery's built-in "hover" method except that
 * instead of firing the handlerIn function immediately, hoverIntent checks
 * to see if the user's mouse has slowed down (beneath the sensitivity
 * threshold) before firing the event. The handlerOut function is only
 * called after a matching handlerIn.
 *
 * hoverIntent r7 // 2013.03.11 // jQuery 1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license. Basically that
 * means you are free to use hoverIntent as long as this header is left intact.
 * Copyright 2007, 2013 Brian Cherne
 *
 * // basic usage ... just like .hover()
 * .hoverIntent( handlerIn, handlerOut )
 * .hoverIntent( handlerInOut )
 *
 * // basic usage ... with event delegation!
 * .hoverIntent( handlerIn, handlerOut, selector )
 * .hoverIntent( handlerInOut, selector )
 *
 * // using a basic configuration object
 * .hoverIntent( config )
 *
 * @param  handlerIn   function OR configuration object
 * @param  handlerOut  function OR selector for delegation OR undefined
 * @param  selector    selector OR undefined
 * @author Brian Cherne <brian(at)cherne(dot)net>
 **/
(function ($) {
  $.fn.hoverIntent = function (handlerIn, handlerOut, selector) {
    // default configuration values
    var cfg = {
      interval: 100,
      sensitivity: 7,
      timeout: 0
    };

    if (_typeof(handlerIn) === "object") {
      cfg = $.extend(cfg, handlerIn);
    } else if ($.isFunction(handlerOut)) {
      cfg = $.extend(cfg, {
        over: handlerIn,
        out: handlerOut,
        selector: selector
      });
    } else {
      cfg = $.extend(cfg, {
        over: handlerIn,
        out: handlerIn,
        selector: handlerOut
      });
    } // instantiate variables
    // cX, cY = current X and Y position of mouse, updated by mousemove event
    // pX, pY = previous X and Y position of mouse, set by mouseover and polling interval


    var cX, cY, pX, pY; // A private function for getting mouse position

    var track = function track(ev) {
      cX = ev.pageX;
      cY = ev.pageY;
    }; // A private function for comparing current and previous mouse position


    var compare = function compare(ev, ob) {
      ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); // compare mouse positions to see if they've crossed the threshold

      if (Math.abs(pX - cX) + Math.abs(pY - cY) < cfg.sensitivity) {
        $(ob).off("mousemove.hoverIntent", track); // set hoverIntent state to true (so mouseOut can be called)

        ob.hoverIntent_s = 1;
        return cfg.over.apply(ob, [ev]);
      } else {
        // set previous coordinates for next time
        pX = cX;
        pY = cY; // use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)

        ob.hoverIntent_t = setTimeout(function () {
          compare(ev, ob);
        }, cfg.interval);
      }
    }; // A private function for delaying the mouseOut function


    var delay = function delay(ev, ob) {
      ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
      ob.hoverIntent_s = 0;
      return cfg.out.apply(ob, [ev]);
    }; // A private function for handling mouse 'hovering'


    var handleHover = function handleHover(e) {
      // copy objects to be passed into t (required for event object to be passed in IE)
      var ev = jQuery.extend({}, e);
      var ob = this; // cancel hoverIntent timer if it exists

      if (ob.hoverIntent_t) {
        ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
      } // if e.type == "mouseenter"


      if (e.type == "mouseenter") {
        // set "previous" X and Y position based on initial entry point
        pX = ev.pageX;
        pY = ev.pageY; // update "current" X and Y position based on mousemove

        $(ob).on("mousemove.hoverIntent", track); // start polling interval (self-calling timeout) to compare mouse coordinates over time

        if (ob.hoverIntent_s != 1) {
          ob.hoverIntent_t = setTimeout(function () {
            compare(ev, ob);
          }, cfg.interval);
        } // else e.type == "mouseleave"

      } else {
        // unbind expensive mousemove event
        $(ob).off("mousemove.hoverIntent", track); // if hoverIntent state is true, then call the mouseOut function after the specified delay

        if (ob.hoverIntent_s == 1) {
          ob.hoverIntent_t = setTimeout(function () {
            delay(ev, ob);
          }, cfg.timeout);
        }
      }
    }; // listen for mouseenter and mouseleave


    return this.on({
      'mouseenter.hoverIntent': handleHover,
      'mouseleave.hoverIntent': handleHover
    }, cfg.selector);
  };
})(jQuery);

/***/ }),

/***/ "./resources/assets/js/jquery.stellar.min.js":
/*!***************************************************!*\
  !*** ./resources/assets/js/jquery.stellar.min.js ***!
  \***************************************************/
/***/ (function() {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*! Stellar.js v0.6.2 | Copyright 2014, Mark Dalgleish | http://markdalgleish.com/projects/stellar.js | http://markdalgleish.mit-license.org */
!function (a, b, c, d) {
  function e(b, c) {
    this.element = b, this.options = a.extend({}, g, c), this._defaults = g, this._name = f, this.init();
  }

  var f = "stellar",
      g = {
    scrollProperty: "scroll",
    positionProperty: "position",
    horizontalScrolling: !0,
    verticalScrolling: !0,
    horizontalOffset: 0,
    verticalOffset: 0,
    responsive: !1,
    parallaxBackgrounds: !0,
    parallaxElements: !0,
    hideDistantElements: !0,
    hideElement: function hideElement(a) {
      a.hide();
    },
    showElement: function showElement(a) {
      a.show();
    }
  },
      h = {
    scroll: {
      getLeft: function getLeft(a) {
        return a.scrollLeft();
      },
      setLeft: function setLeft(a, b) {
        a.scrollLeft(b);
      },
      getTop: function getTop(a) {
        return a.scrollTop();
      },
      setTop: function setTop(a, b) {
        a.scrollTop(b);
      }
    },
    position: {
      getLeft: function getLeft(a) {
        return -1 * parseInt(a.css("left"), 10);
      },
      getTop: function getTop(a) {
        return -1 * parseInt(a.css("top"), 10);
      }
    },
    margin: {
      getLeft: function getLeft(a) {
        return -1 * parseInt(a.css("margin-left"), 10);
      },
      getTop: function getTop(a) {
        return -1 * parseInt(a.css("margin-top"), 10);
      }
    },
    transform: {
      getLeft: function getLeft(a) {
        var b = getComputedStyle(a[0])[k];
        return "none" !== b ? -1 * parseInt(b.match(/(-?[0-9]+)/g)[4], 10) : 0;
      },
      getTop: function getTop(a) {
        var b = getComputedStyle(a[0])[k];
        return "none" !== b ? -1 * parseInt(b.match(/(-?[0-9]+)/g)[5], 10) : 0;
      }
    }
  },
      i = {
    position: {
      setLeft: function setLeft(a, b) {
        a.css("left", b);
      },
      setTop: function setTop(a, b) {
        a.css("top", b);
      }
    },
    transform: {
      setPosition: function setPosition(a, b, c, d, e) {
        a[0].style[k] = "translate3d(" + (b - c) + "px, " + (d - e) + "px, 0)";
      }
    }
  },
      j = function () {
    var b,
        c = /^(Moz|Webkit|Khtml|O|ms|Icab)(?=[A-Z])/,
        d = a("script")[0].style,
        e = "";

    for (b in d) {
      if (c.test(b)) {
        e = b.match(c)[0];
        break;
      }
    }

    return "WebkitOpacity" in d && (e = "Webkit"), "KhtmlOpacity" in d && (e = "Khtml"), function (a) {
      return e + (e.length > 0 ? a.charAt(0).toUpperCase() + a.slice(1) : a);
    };
  }(),
      k = j("transform"),
      l = a("<div />", {
    style: "background:#fff"
  }).css("background-position-x") !== d,
      m = l ? function (a, b, c) {
    a.css({
      "background-position-x": b,
      "background-position-y": c
    });
  } : function (a, b, c) {
    a.css("background-position", b + " " + c);
  },
      n = l ? function (a) {
    return [a.css("background-position-x"), a.css("background-position-y")];
  } : function (a) {
    return a.css("background-position").split(" ");
  },
      o = b.requestAnimationFrame || b.webkitRequestAnimationFrame || b.mozRequestAnimationFrame || b.oRequestAnimationFrame || b.msRequestAnimationFrame || function (a) {
    setTimeout(a, 1e3 / 60);
  };

  e.prototype = {
    init: function init() {
      this.options.name = f + "_" + Math.floor(1e9 * Math.random()), this._defineElements(), this._defineGetters(), this._defineSetters(), this._handleWindowLoadAndResize(), this._detectViewport(), this.refresh({
        firstLoad: !0
      }), "scroll" === this.options.scrollProperty ? this._handleScrollEvent() : this._startAnimationLoop();
    },
    _defineElements: function _defineElements() {
      this.element === c.body && (this.element = b), this.$scrollElement = a(this.element), this.$element = this.element === b ? a("body") : this.$scrollElement, this.$viewportElement = this.options.viewportElement !== d ? a(this.options.viewportElement) : this.$scrollElement[0] === b || "scroll" === this.options.scrollProperty ? this.$scrollElement : this.$scrollElement.parent();
    },
    _defineGetters: function _defineGetters() {
      var a = this,
          b = h[a.options.scrollProperty];
      this._getScrollLeft = function () {
        return b.getLeft(a.$scrollElement);
      }, this._getScrollTop = function () {
        return b.getTop(a.$scrollElement);
      };
    },
    _defineSetters: function _defineSetters() {
      var b = this,
          c = h[b.options.scrollProperty],
          d = i[b.options.positionProperty],
          e = c.setLeft,
          f = c.setTop;
      this._setScrollLeft = "function" == typeof e ? function (a) {
        e(b.$scrollElement, a);
      } : a.noop, this._setScrollTop = "function" == typeof f ? function (a) {
        f(b.$scrollElement, a);
      } : a.noop, this._setPosition = d.setPosition || function (a, c, e, f, g) {
        b.options.horizontalScrolling && d.setLeft(a, c, e), b.options.verticalScrolling && d.setTop(a, f, g);
      };
    },
    _handleWindowLoadAndResize: function _handleWindowLoadAndResize() {
      var c = this,
          d = a(b);
      c.options.responsive && d.bind("load." + this.name, function () {
        c.refresh();
      }), d.bind("resize." + this.name, function () {
        c._detectViewport(), c.options.responsive && c.refresh();
      });
    },
    refresh: function refresh(c) {
      var d = this,
          e = d._getScrollLeft(),
          f = d._getScrollTop();

      c && c.firstLoad || this._reset(), this._setScrollLeft(0), this._setScrollTop(0), this._setOffsets(), this._findParticles(), this._findBackgrounds(), c && c.firstLoad && /WebKit/.test(navigator.userAgent) && a(b).load(function () {
        var a = d._getScrollLeft(),
            b = d._getScrollTop();

        d._setScrollLeft(a + 1), d._setScrollTop(b + 1), d._setScrollLeft(a), d._setScrollTop(b);
      }), this._setScrollLeft(e), this._setScrollTop(f);
    },
    _detectViewport: function _detectViewport() {
      var a = this.$viewportElement.offset(),
          b = null !== a && a !== d;
      this.viewportWidth = this.$viewportElement.width(), this.viewportHeight = this.$viewportElement.height(), this.viewportOffsetTop = b ? a.top : 0, this.viewportOffsetLeft = b ? a.left : 0;
    },
    _findParticles: function _findParticles() {
      {
        var b = this;
        this._getScrollLeft(), this._getScrollTop();
      }
      if (this.particles !== d) for (var c = this.particles.length - 1; c >= 0; c--) {
        this.particles[c].$element.data("stellar-elementIsActive", d);
      }
      this.particles = [], this.options.parallaxElements && this.$element.find("[data-stellar-ratio]").each(function () {
        var c,
            e,
            f,
            g,
            h,
            i,
            j,
            k,
            l,
            m = a(this),
            n = 0,
            o = 0,
            p = 0,
            q = 0;

        if (m.data("stellar-elementIsActive")) {
          if (m.data("stellar-elementIsActive") !== this) return;
        } else m.data("stellar-elementIsActive", this);

        b.options.showElement(m), m.data("stellar-startingLeft") ? (m.css("left", m.data("stellar-startingLeft")), m.css("top", m.data("stellar-startingTop"))) : (m.data("stellar-startingLeft", m.css("left")), m.data("stellar-startingTop", m.css("top"))), f = m.position().left, g = m.position().top, h = "auto" === m.css("margin-left") ? 0 : parseInt(m.css("margin-left"), 10), i = "auto" === m.css("margin-top") ? 0 : parseInt(m.css("margin-top"), 10), k = m.offset().left - h, l = m.offset().top - i, m.parents().each(function () {
          var b = a(this);
          return b.data("stellar-offset-parent") === !0 ? (n = p, o = q, j = b, !1) : (p += b.position().left, void (q += b.position().top));
        }), c = m.data("stellar-horizontal-offset") !== d ? m.data("stellar-horizontal-offset") : j !== d && j.data("stellar-horizontal-offset") !== d ? j.data("stellar-horizontal-offset") : b.horizontalOffset, e = m.data("stellar-vertical-offset") !== d ? m.data("stellar-vertical-offset") : j !== d && j.data("stellar-vertical-offset") !== d ? j.data("stellar-vertical-offset") : b.verticalOffset, b.particles.push({
          $element: m,
          $offsetParent: j,
          isFixed: "fixed" === m.css("position"),
          horizontalOffset: c,
          verticalOffset: e,
          startingPositionLeft: f,
          startingPositionTop: g,
          startingOffsetLeft: k,
          startingOffsetTop: l,
          parentOffsetLeft: n,
          parentOffsetTop: o,
          stellarRatio: m.data("stellar-ratio") !== d ? m.data("stellar-ratio") : 1,
          width: m.outerWidth(!0),
          height: m.outerHeight(!0),
          isHidden: !1
        });
      });
    },
    _findBackgrounds: function _findBackgrounds() {
      var b,
          c = this,
          e = this._getScrollLeft(),
          f = this._getScrollTop();

      this.backgrounds = [], this.options.parallaxBackgrounds && (b = this.$element.find("[data-stellar-background-ratio]"), this.$element.data("stellar-background-ratio") && (b = b.add(this.$element)), b.each(function () {
        var b,
            g,
            h,
            i,
            j,
            k,
            l,
            o = a(this),
            p = n(o),
            q = 0,
            r = 0,
            s = 0,
            t = 0;

        if (o.data("stellar-backgroundIsActive")) {
          if (o.data("stellar-backgroundIsActive") !== this) return;
        } else o.data("stellar-backgroundIsActive", this);

        o.data("stellar-backgroundStartingLeft") ? m(o, o.data("stellar-backgroundStartingLeft"), o.data("stellar-backgroundStartingTop")) : (o.data("stellar-backgroundStartingLeft", p[0]), o.data("stellar-backgroundStartingTop", p[1])), h = "auto" === o.css("margin-left") ? 0 : parseInt(o.css("margin-left"), 10), i = "auto" === o.css("margin-top") ? 0 : parseInt(o.css("margin-top"), 10), j = o.offset().left - h - e, k = o.offset().top - i - f, o.parents().each(function () {
          var b = a(this);
          return b.data("stellar-offset-parent") === !0 ? (q = s, r = t, l = b, !1) : (s += b.position().left, void (t += b.position().top));
        }), b = o.data("stellar-horizontal-offset") !== d ? o.data("stellar-horizontal-offset") : l !== d && l.data("stellar-horizontal-offset") !== d ? l.data("stellar-horizontal-offset") : c.horizontalOffset, g = o.data("stellar-vertical-offset") !== d ? o.data("stellar-vertical-offset") : l !== d && l.data("stellar-vertical-offset") !== d ? l.data("stellar-vertical-offset") : c.verticalOffset, c.backgrounds.push({
          $element: o,
          $offsetParent: l,
          isFixed: "fixed" === o.css("background-attachment"),
          horizontalOffset: b,
          verticalOffset: g,
          startingValueLeft: p[0],
          startingValueTop: p[1],
          startingBackgroundPositionLeft: isNaN(parseInt(p[0], 10)) ? 0 : parseInt(p[0], 10),
          startingBackgroundPositionTop: isNaN(parseInt(p[1], 10)) ? 0 : parseInt(p[1], 10),
          startingPositionLeft: o.position().left,
          startingPositionTop: o.position().top,
          startingOffsetLeft: j,
          startingOffsetTop: k,
          parentOffsetLeft: q,
          parentOffsetTop: r,
          stellarRatio: o.data("stellar-background-ratio") === d ? 1 : o.data("stellar-background-ratio")
        });
      }));
    },
    _reset: function _reset() {
      var a, b, c, d, e;

      for (e = this.particles.length - 1; e >= 0; e--) {
        a = this.particles[e], b = a.$element.data("stellar-startingLeft"), c = a.$element.data("stellar-startingTop"), this._setPosition(a.$element, b, b, c, c), this.options.showElement(a.$element), a.$element.data("stellar-startingLeft", null).data("stellar-elementIsActive", null).data("stellar-backgroundIsActive", null);
      }

      for (e = this.backgrounds.length - 1; e >= 0; e--) {
        d = this.backgrounds[e], d.$element.data("stellar-backgroundStartingLeft", null).data("stellar-backgroundStartingTop", null), m(d.$element, d.startingValueLeft, d.startingValueTop);
      }
    },
    destroy: function destroy() {
      this._reset(), this.$scrollElement.unbind("resize." + this.name).unbind("scroll." + this.name), this._animationLoop = a.noop, a(b).unbind("load." + this.name).unbind("resize." + this.name);
    },
    _setOffsets: function _setOffsets() {
      var c = this,
          d = a(b);
      d.unbind("resize.horizontal-" + this.name).unbind("resize.vertical-" + this.name), "function" == typeof this.options.horizontalOffset ? (this.horizontalOffset = this.options.horizontalOffset(), d.bind("resize.horizontal-" + this.name, function () {
        c.horizontalOffset = c.options.horizontalOffset();
      })) : this.horizontalOffset = this.options.horizontalOffset, "function" == typeof this.options.verticalOffset ? (this.verticalOffset = this.options.verticalOffset(), d.bind("resize.vertical-" + this.name, function () {
        c.verticalOffset = c.options.verticalOffset();
      })) : this.verticalOffset = this.options.verticalOffset;
    },
    _repositionElements: function _repositionElements() {
      var a,
          b,
          c,
          d,
          e,
          f,
          g,
          h,
          i,
          j,
          k = this._getScrollLeft(),
          l = this._getScrollTop(),
          n = !0,
          o = !0;

      if (this.currentScrollLeft !== k || this.currentScrollTop !== l || this.currentWidth !== this.viewportWidth || this.currentHeight !== this.viewportHeight) {
        for (this.currentScrollLeft = k, this.currentScrollTop = l, this.currentWidth = this.viewportWidth, this.currentHeight = this.viewportHeight, j = this.particles.length - 1; j >= 0; j--) {
          a = this.particles[j], b = a.isFixed ? 1 : 0, this.options.horizontalScrolling ? (f = (k + a.horizontalOffset + this.viewportOffsetLeft + a.startingPositionLeft - a.startingOffsetLeft + a.parentOffsetLeft) * -(a.stellarRatio + b - 1) + a.startingPositionLeft, h = f - a.startingPositionLeft + a.startingOffsetLeft) : (f = a.startingPositionLeft, h = a.startingOffsetLeft), this.options.verticalScrolling ? (g = (l + a.verticalOffset + this.viewportOffsetTop + a.startingPositionTop - a.startingOffsetTop + a.parentOffsetTop) * -(a.stellarRatio + b - 1) + a.startingPositionTop, i = g - a.startingPositionTop + a.startingOffsetTop) : (g = a.startingPositionTop, i = a.startingOffsetTop), this.options.hideDistantElements && (o = !this.options.horizontalScrolling || h + a.width > (a.isFixed ? 0 : k) && h < (a.isFixed ? 0 : k) + this.viewportWidth + this.viewportOffsetLeft, n = !this.options.verticalScrolling || i + a.height > (a.isFixed ? 0 : l) && i < (a.isFixed ? 0 : l) + this.viewportHeight + this.viewportOffsetTop), o && n ? (a.isHidden && (this.options.showElement(a.$element), a.isHidden = !1), this._setPosition(a.$element, f, a.startingPositionLeft, g, a.startingPositionTop)) : a.isHidden || (this.options.hideElement(a.$element), a.isHidden = !0);
        }

        for (j = this.backgrounds.length - 1; j >= 0; j--) {
          c = this.backgrounds[j], b = c.isFixed ? 0 : 1, d = this.options.horizontalScrolling ? (k + c.horizontalOffset - this.viewportOffsetLeft - c.startingOffsetLeft + c.parentOffsetLeft - c.startingBackgroundPositionLeft) * (b - c.stellarRatio) + "px" : c.startingValueLeft, e = this.options.verticalScrolling ? (l + c.verticalOffset - this.viewportOffsetTop - c.startingOffsetTop + c.parentOffsetTop - c.startingBackgroundPositionTop) * (b - c.stellarRatio) + "px" : c.startingValueTop, m(c.$element, d, e);
        }
      }
    },
    _handleScrollEvent: function _handleScrollEvent() {
      var a = this,
          b = !1,
          c = function c() {
        a._repositionElements(), b = !1;
      },
          d = function d() {
        b || (o(c), b = !0);
      };

      this.$scrollElement.bind("scroll." + this.name, d), d();
    },
    _startAnimationLoop: function _startAnimationLoop() {
      var a = this;
      this._animationLoop = function () {
        o(a._animationLoop), a._repositionElements();
      }, this._animationLoop();
    }
  }, a.fn[f] = function (b) {
    var c = arguments;
    return b === d || "object" == _typeof(b) ? this.each(function () {
      a.data(this, "plugin_" + f) || a.data(this, "plugin_" + f, new e(this, b));
    }) : "string" == typeof b && "_" !== b[0] && "init" !== b ? this.each(function () {
      var d = a.data(this, "plugin_" + f);
      d instanceof e && "function" == typeof d[b] && d[b].apply(d, Array.prototype.slice.call(c, 1)), "destroy" === b && a.data(this, "plugin_" + f, null);
    }) : void 0;
  }, a[f] = function () {
    var c = a(b);
    return c.stellar.apply(c, Array.prototype.slice.call(arguments, 0));
  }, a[f].scrollProperty = h, a[f].positionProperty = i, b.Stellar = e;
}(jQuery, this, document);

/***/ }),

/***/ "./resources/assets/js/jquery.waypoints.min.js":
/*!*****************************************************!*\
  !*** ./resources/assets/js/jquery.waypoints.min.js ***!
  \*****************************************************/
/***/ (() => {

/*!
Waypoints - 4.0.0
Copyright Â© 2011-2015 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/waypoints/blog/master/licenses.txt
*/
!function () {
  "use strict";

  function t(o) {
    if (!o) throw new Error("No options passed to Waypoint constructor");
    if (!o.element) throw new Error("No element option passed to Waypoint constructor");
    if (!o.handler) throw new Error("No handler option passed to Waypoint constructor");
    this.key = "waypoint-" + e, this.options = t.Adapter.extend({}, t.defaults, o), this.element = this.options.element, this.adapter = new t.Adapter(this.element), this.callback = o.handler, this.axis = this.options.horizontal ? "horizontal" : "vertical", this.enabled = this.options.enabled, this.triggerPoint = null, this.group = t.Group.findOrCreate({
      name: this.options.group,
      axis: this.axis
    }), this.context = t.Context.findOrCreateByElement(this.options.context), t.offsetAliases[this.options.offset] && (this.options.offset = t.offsetAliases[this.options.offset]), this.group.add(this), this.context.add(this), i[this.key] = this, e += 1;
  }

  var e = 0,
      i = {};
  t.prototype.queueTrigger = function (t) {
    this.group.queueTrigger(this, t);
  }, t.prototype.trigger = function (t) {
    this.enabled && this.callback && this.callback.apply(this, t);
  }, t.prototype.destroy = function () {
    this.context.remove(this), this.group.remove(this), delete i[this.key];
  }, t.prototype.disable = function () {
    return this.enabled = !1, this;
  }, t.prototype.enable = function () {
    return this.context.refresh(), this.enabled = !0, this;
  }, t.prototype.next = function () {
    return this.group.next(this);
  }, t.prototype.previous = function () {
    return this.group.previous(this);
  }, t.invokeAll = function (t) {
    var e = [];

    for (var o in i) {
      e.push(i[o]);
    }

    for (var n = 0, r = e.length; r > n; n++) {
      e[n][t]();
    }
  }, t.destroyAll = function () {
    t.invokeAll("destroy");
  }, t.disableAll = function () {
    t.invokeAll("disable");
  }, t.enableAll = function () {
    t.invokeAll("enable");
  }, t.refreshAll = function () {
    t.Context.refreshAll();
  }, t.viewportHeight = function () {
    return window.innerHeight || document.documentElement.clientHeight;
  }, t.viewportWidth = function () {
    return document.documentElement.clientWidth;
  }, t.adapters = [], t.defaults = {
    context: window,
    continuous: !0,
    enabled: !0,
    group: "default",
    horizontal: !1,
    offset: 0
  }, t.offsetAliases = {
    "bottom-in-view": function bottomInView() {
      return this.context.innerHeight() - this.adapter.outerHeight();
    },
    "right-in-view": function rightInView() {
      return this.context.innerWidth() - this.adapter.outerWidth();
    }
  }, window.Waypoint = t;
}(), function () {
  "use strict";

  function t(t) {
    window.setTimeout(t, 1e3 / 60);
  }

  function e(t) {
    this.element = t, this.Adapter = n.Adapter, this.adapter = new this.Adapter(t), this.key = "waypoint-context-" + i, this.didScroll = !1, this.didResize = !1, this.oldScroll = {
      x: this.adapter.scrollLeft(),
      y: this.adapter.scrollTop()
    }, this.waypoints = {
      vertical: {},
      horizontal: {}
    }, t.waypointContextKey = this.key, o[t.waypointContextKey] = this, i += 1, this.createThrottledScrollHandler(), this.createThrottledResizeHandler();
  }

  var i = 0,
      o = {},
      n = window.Waypoint,
      r = window.onload;
  e.prototype.add = function (t) {
    var e = t.options.horizontal ? "horizontal" : "vertical";
    this.waypoints[e][t.key] = t, this.refresh();
  }, e.prototype.checkEmpty = function () {
    var t = this.Adapter.isEmptyObject(this.waypoints.horizontal),
        e = this.Adapter.isEmptyObject(this.waypoints.vertical);
    t && e && (this.adapter.off(".waypoints"), delete o[this.key]);
  }, e.prototype.createThrottledResizeHandler = function () {
    function t() {
      e.handleResize(), e.didResize = !1;
    }

    var e = this;
    this.adapter.on("resize.waypoints", function () {
      e.didResize || (e.didResize = !0, n.requestAnimationFrame(t));
    });
  }, e.prototype.createThrottledScrollHandler = function () {
    function t() {
      e.handleScroll(), e.didScroll = !1;
    }

    var e = this;
    this.adapter.on("scroll.waypoints", function () {
      (!e.didScroll || n.isTouch) && (e.didScroll = !0, n.requestAnimationFrame(t));
    });
  }, e.prototype.handleResize = function () {
    n.Context.refreshAll();
  }, e.prototype.handleScroll = function () {
    var t = {},
        e = {
      horizontal: {
        newScroll: this.adapter.scrollLeft(),
        oldScroll: this.oldScroll.x,
        forward: "right",
        backward: "left"
      },
      vertical: {
        newScroll: this.adapter.scrollTop(),
        oldScroll: this.oldScroll.y,
        forward: "down",
        backward: "up"
      }
    };

    for (var i in e) {
      var o = e[i],
          n = o.newScroll > o.oldScroll,
          r = n ? o.forward : o.backward;

      for (var s in this.waypoints[i]) {
        var a = this.waypoints[i][s],
            l = o.oldScroll < a.triggerPoint,
            h = o.newScroll >= a.triggerPoint,
            p = l && h,
            u = !l && !h;
        (p || u) && (a.queueTrigger(r), t[a.group.id] = a.group);
      }
    }

    for (var c in t) {
      t[c].flushTriggers();
    }

    this.oldScroll = {
      x: e.horizontal.newScroll,
      y: e.vertical.newScroll
    };
  }, e.prototype.innerHeight = function () {
    return this.element == this.element.window ? n.viewportHeight() : this.adapter.innerHeight();
  }, e.prototype.remove = function (t) {
    delete this.waypoints[t.axis][t.key], this.checkEmpty();
  }, e.prototype.innerWidth = function () {
    return this.element == this.element.window ? n.viewportWidth() : this.adapter.innerWidth();
  }, e.prototype.destroy = function () {
    var t = [];

    for (var e in this.waypoints) {
      for (var i in this.waypoints[e]) {
        t.push(this.waypoints[e][i]);
      }
    }

    for (var o = 0, n = t.length; n > o; o++) {
      t[o].destroy();
    }
  }, e.prototype.refresh = function () {
    var t,
        e = this.element == this.element.window,
        i = e ? void 0 : this.adapter.offset(),
        o = {};
    this.handleScroll(), t = {
      horizontal: {
        contextOffset: e ? 0 : i.left,
        contextScroll: e ? 0 : this.oldScroll.x,
        contextDimension: this.innerWidth(),
        oldScroll: this.oldScroll.x,
        forward: "right",
        backward: "left",
        offsetProp: "left"
      },
      vertical: {
        contextOffset: e ? 0 : i.top,
        contextScroll: e ? 0 : this.oldScroll.y,
        contextDimension: this.innerHeight(),
        oldScroll: this.oldScroll.y,
        forward: "down",
        backward: "up",
        offsetProp: "top"
      }
    };

    for (var r in t) {
      var s = t[r];

      for (var a in this.waypoints[r]) {
        var l,
            h,
            p,
            u,
            c,
            d = this.waypoints[r][a],
            f = d.options.offset,
            w = d.triggerPoint,
            y = 0,
            g = null == w;
        d.element !== d.element.window && (y = d.adapter.offset()[s.offsetProp]), "function" == typeof f ? f = f.apply(d) : "string" == typeof f && (f = parseFloat(f), d.options.offset.indexOf("%") > -1 && (f = Math.ceil(s.contextDimension * f / 100))), l = s.contextScroll - s.contextOffset, d.triggerPoint = y + l - f, h = w < s.oldScroll, p = d.triggerPoint >= s.oldScroll, u = h && p, c = !h && !p, !g && u ? (d.queueTrigger(s.backward), o[d.group.id] = d.group) : !g && c ? (d.queueTrigger(s.forward), o[d.group.id] = d.group) : g && s.oldScroll >= d.triggerPoint && (d.queueTrigger(s.forward), o[d.group.id] = d.group);
      }
    }

    return n.requestAnimationFrame(function () {
      for (var t in o) {
        o[t].flushTriggers();
      }
    }), this;
  }, e.findOrCreateByElement = function (t) {
    return e.findByElement(t) || new e(t);
  }, e.refreshAll = function () {
    for (var t in o) {
      o[t].refresh();
    }
  }, e.findByElement = function (t) {
    return o[t.waypointContextKey];
  }, window.onload = function () {
    r && r(), e.refreshAll();
  }, n.requestAnimationFrame = function (e) {
    var i = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || t;
    i.call(window, e);
  }, n.Context = e;
}(), function () {
  "use strict";

  function t(t, e) {
    return t.triggerPoint - e.triggerPoint;
  }

  function e(t, e) {
    return e.triggerPoint - t.triggerPoint;
  }

  function i(t) {
    this.name = t.name, this.axis = t.axis, this.id = this.name + "-" + this.axis, this.waypoints = [], this.clearTriggerQueues(), o[this.axis][this.name] = this;
  }

  var o = {
    vertical: {},
    horizontal: {}
  },
      n = window.Waypoint;
  i.prototype.add = function (t) {
    this.waypoints.push(t);
  }, i.prototype.clearTriggerQueues = function () {
    this.triggerQueues = {
      up: [],
      down: [],
      left: [],
      right: []
    };
  }, i.prototype.flushTriggers = function () {
    for (var i in this.triggerQueues) {
      var o = this.triggerQueues[i],
          n = "up" === i || "left" === i;
      o.sort(n ? e : t);

      for (var r = 0, s = o.length; s > r; r += 1) {
        var a = o[r];
        (a.options.continuous || r === o.length - 1) && a.trigger([i]);
      }
    }

    this.clearTriggerQueues();
  }, i.prototype.next = function (e) {
    this.waypoints.sort(t);
    var i = n.Adapter.inArray(e, this.waypoints),
        o = i === this.waypoints.length - 1;
    return o ? null : this.waypoints[i + 1];
  }, i.prototype.previous = function (e) {
    this.waypoints.sort(t);
    var i = n.Adapter.inArray(e, this.waypoints);
    return i ? this.waypoints[i - 1] : null;
  }, i.prototype.queueTrigger = function (t, e) {
    this.triggerQueues[e].push(t);
  }, i.prototype.remove = function (t) {
    var e = n.Adapter.inArray(t, this.waypoints);
    e > -1 && this.waypoints.splice(e, 1);
  }, i.prototype.first = function () {
    return this.waypoints[0];
  }, i.prototype.last = function () {
    return this.waypoints[this.waypoints.length - 1];
  }, i.findOrCreate = function (t) {
    return o[t.axis][t.name] || new i(t);
  }, n.Group = i;
}(), function () {
  "use strict";

  function t(t) {
    this.$element = e(t);
  }

  var e = window.jQuery,
      i = window.Waypoint;
  e.each(["innerHeight", "innerWidth", "off", "offset", "on", "outerHeight", "outerWidth", "scrollLeft", "scrollTop"], function (e, i) {
    t.prototype[i] = function () {
      var t = Array.prototype.slice.call(arguments);
      return this.$element[i].apply(this.$element, t);
    };
  }), e.each(["extend", "inArray", "isEmptyObject"], function (i, o) {
    t[o] = e[o];
  }), i.adapters.push({
    name: "jquery",
    Adapter: t
  }), i.Adapter = t;
}(), function () {
  "use strict";

  function t(t) {
    return function () {
      var i = [],
          o = arguments[0];
      return t.isFunction(arguments[0]) && (o = t.extend({}, arguments[1]), o.handler = arguments[0]), this.each(function () {
        var n = t.extend({}, o, {
          element: this
        });
        "string" == typeof n.context && (n.context = t(this).closest(n.context)[0]), i.push(new e(n));
      }), i;
    };
  }

  var e = window.Waypoint;
  window.jQuery && (window.jQuery.fn.waypoint = t(window.jQuery)), window.Zepto && (window.Zepto.fn.waypoint = t(window.Zepto));
}();

/***/ }),

/***/ "./resources/assets/js/superfish.js":
/*!******************************************!*\
  !*** ./resources/assets/js/superfish.js ***!
  \******************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*
 * jQuery Superfish Menu Plugin
 * Copyright (c) 2013 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 *	http://www.opensource.org/licenses/mit-license.php
 *	http://www.gnu.org/licenses/gpl.html
 */
(function ($, w) {
  "use strict";

  var methods = function () {
    // private properties and methods go here
    var c = {
      bcClass: 'sf-breadcrumb',
      menuClass: 'sf-js-enabled',
      anchorClass: 'sf-with-ul',
      menuArrowClass: 'sf-arrows'
    },
        ios = function () {
      var ios = /iPhone|iPad|iPod/i.test(navigator.userAgent);

      if (ios) {
        // iOS clicks only bubble as far as body children
        $(w).load(function () {
          $('body').children().on('click', $.noop);
        });
      }

      return ios;
    }(),
        wp7 = function () {
      var style = document.documentElement.style;
      return 'behavior' in style && 'fill' in style && /iemobile/i.test(navigator.userAgent);
    }(),
        unprefixedPointerEvents = function () {
      return !!w.PointerEvent;
    }(),
        toggleMenuClasses = function toggleMenuClasses($menu, o) {
      var classes = c.menuClass;

      if (o.cssArrows) {
        classes += ' ' + c.menuArrowClass;
      }

      $menu.toggleClass(classes);
    },
        setPathToCurrent = function setPathToCurrent($menu, o) {
      return $menu.find('li.' + o.pathClass).slice(0, o.pathLevels).addClass(o.hoverClass + ' ' + c.bcClass).filter(function () {
        return $(this).children(o.popUpSelector).hide().show().length;
      }).removeClass(o.pathClass);
    },
        toggleAnchorClass = function toggleAnchorClass($li) {
      $li.children('a').toggleClass(c.anchorClass);
    },
        toggleTouchAction = function toggleTouchAction($menu) {
      var msTouchAction = $menu.css('ms-touch-action');
      var touchAction = $menu.css('touch-action');
      touchAction = touchAction || msTouchAction;
      touchAction = touchAction === 'pan-y' ? 'auto' : 'pan-y';
      $menu.css({
        'ms-touch-action': touchAction,
        'touch-action': touchAction
      });
    },
        applyHandlers = function applyHandlers($menu, o) {
      var targets = 'li:has(' + o.popUpSelector + ')';

      if ($.fn.hoverIntent && !o.disableHI) {
        $menu.hoverIntent(over, out, targets);
      } else {
        $menu.on('mouseenter.superfish', targets, over).on('mouseleave.superfish', targets, out);
      }

      var touchevent = 'MSPointerDown.superfish';

      if (unprefixedPointerEvents) {
        touchevent = 'pointerdown.superfish';
      }

      if (!ios) {
        touchevent += ' touchend.superfish';
      }

      if (wp7) {
        touchevent += ' mousedown.superfish';
      }

      $menu.on('focusin.superfish', 'li', over).on('focusout.superfish', 'li', out).on(touchevent, 'a', o, touchHandler);
    },
        touchHandler = function touchHandler(e) {
      var $this = $(this),
          $ul = $this.siblings(e.data.popUpSelector);

      if ($ul.length > 0 && $ul.is(':hidden')) {
        $this.one('click.superfish', false);

        if (e.type === 'MSPointerDown' || e.type === 'pointerdown') {
          $this.trigger('focus');
        } else {
          $.proxy(over, $this.parent('li'))();
        }
      }
    },
        over = function over() {
      var $this = $(this),
          o = getOptions($this);
      clearTimeout(o.sfTimer);
      $this.siblings().superfish('hide').end().superfish('show');
    },
        out = function out() {
      var $this = $(this),
          o = getOptions($this);

      if (ios) {
        $.proxy(close, $this, o)();
      } else {
        clearTimeout(o.sfTimer);
        o.sfTimer = setTimeout($.proxy(close, $this, o), o.delay);
      }
    },
        close = function close(o) {
      o.retainPath = $.inArray(this[0], o.$path) > -1;
      this.superfish('hide');

      if (!this.parents('.' + o.hoverClass).length) {
        o.onIdle.call(getMenu(this));

        if (o.$path.length) {
          $.proxy(over, o.$path)();
        }
      }
    },
        getMenu = function getMenu($el) {
      return $el.closest('.' + c.menuClass);
    },
        getOptions = function getOptions($el) {
      return getMenu($el).data('sf-options');
    };

    return {
      // public methods
      hide: function hide(instant) {
        if (this.length) {
          var $this = this,
              o = getOptions($this);

          if (!o) {
            return this;
          }

          var not = o.retainPath === true ? o.$path : '',
              $ul = $this.find('li.' + o.hoverClass).add(this).not(not).removeClass(o.hoverClass).children(o.popUpSelector),
              speed = o.speedOut;

          if (instant) {
            $ul.show();
            speed = 0;
          }

          o.retainPath = false;
          o.onBeforeHide.call($ul);
          $ul.stop(true, true).animate(o.animationOut, speed, function () {
            var $this = $(this);
            o.onHide.call($this);
          });
        }

        return this;
      },
      show: function show() {
        var o = getOptions(this);

        if (!o) {
          return this;
        }

        var $this = this.addClass(o.hoverClass),
            $ul = $this.children(o.popUpSelector);
        o.onBeforeShow.call($ul);
        $ul.stop(true, true).animate(o.animation, o.speed, function () {
          o.onShow.call($ul);
        });
        return this;
      },
      destroy: function destroy() {
        return this.each(function () {
          var $this = $(this),
              o = $this.data('sf-options'),
              $hasPopUp;

          if (!o) {
            return false;
          }

          $hasPopUp = $this.find(o.popUpSelector).parent('li');
          clearTimeout(o.sfTimer);
          toggleMenuClasses($this, o);
          toggleAnchorClass($hasPopUp);
          toggleTouchAction($this); // remove event handlers

          $this.off('.superfish').off('.hoverIntent'); // clear animation's inline display style

          $hasPopUp.children(o.popUpSelector).attr('style', function (i, style) {
            return style.replace(/display[^;]+;?/g, '');
          }); // reset 'current' path classes

          o.$path.removeClass(o.hoverClass + ' ' + c.bcClass).addClass(o.pathClass);
          $this.find('.' + o.hoverClass).removeClass(o.hoverClass);
          o.onDestroy.call($this);
          $this.removeData('sf-options');
        });
      },
      init: function init(op) {
        return this.each(function () {
          var $this = $(this);

          if ($this.data('sf-options')) {
            return false;
          }

          var o = $.extend({}, $.fn.superfish.defaults, op),
              $hasPopUp = $this.find(o.popUpSelector).parent('li');
          o.$path = setPathToCurrent($this, o);
          $this.data('sf-options', o);
          toggleMenuClasses($this, o);
          toggleAnchorClass($hasPopUp);
          toggleTouchAction($this);
          applyHandlers($this, o);
          $hasPopUp.not('.' + c.bcClass).superfish('hide', true);
          o.onInit.call(this);
        });
      }
    };
  }();

  $.fn.superfish = function (method, args) {
    if (methods[method]) {
      return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
    } else if (_typeof(method) === 'object' || !method) {
      return methods.init.apply(this, arguments);
    } else {
      return $.error('Method ' + method + ' does not exist on jQuery.fn.superfish');
    }
  };

  $.fn.superfish.defaults = {
    popUpSelector: 'ul,.sf-mega',
    // within menu context
    hoverClass: 'sfHover',
    pathClass: 'overrideThisToUse',
    pathLevels: 1,
    delay: 800,
    animation: {
      opacity: 'show'
    },
    animationOut: {
      opacity: 'hide'
    },
    speed: 'normal',
    speedOut: 'fast',
    cssArrows: true,
    disableHI: false,
    onInit: $.noop,
    onBeforeShow: $.noop,
    onShow: $.noop,
    onBeforeHide: $.noop,
    onHide: $.noop,
    onIdle: $.noop,
    onDestroy: $.noop
  };
})(jQuery, window);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	__webpack_modules__["./resources/assets/js/superfish.js"]();
/******/ 	__webpack_modules__["./resources/assets/js/hoverIntent.js"]();
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	__webpack_modules__["./resources/assets/js/jquery.stellar.min.js"]();
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/js/jquery.waypoints.min.js"]();
/******/ 	
/******/ })()
;