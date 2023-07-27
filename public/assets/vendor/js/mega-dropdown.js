/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./js/mega-dropdown.js":
/*!*****************************!*\
  !*** ./js/mega-dropdown.js ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"MegaDropdown\": function() { return /* binding */ MegaDropdown; }\n/* harmony export */ });\nfunction _typeof(obj) { \"@babel/helpers - typeof\"; return _typeof = \"function\" == typeof Symbol && \"symbol\" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && \"function\" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? \"symbol\" : typeof obj; }, _typeof(obj); }\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\nfunction _toPropertyKey(arg) { var key = _toPrimitive(arg, \"string\"); return _typeof(key) === \"symbol\" ? key : String(key); }\nfunction _toPrimitive(input, hint) { if (_typeof(input) !== \"object\" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || \"default\"); if (_typeof(res) !== \"object\") return res; throw new TypeError(\"@@toPrimitive must return a primitive value.\"); } return (hint === \"string\" ? String : Number)(input); }\nvar TIMEOUT = 150;\nvar MegaDropdown = /*#__PURE__*/function () {\n  function MegaDropdown(element) {\n    var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};\n    _classCallCheck(this, MegaDropdown);\n    this._onHover = options.trigger === 'hover' || element.getAttribute('data-trigger') === 'hover';\n    this._container = MegaDropdown._findParent(element, 'mega-dropdown');\n    if (!this._container) return;\n    this._menu = this._container.querySelector('.dropdown-toggle ~ .dropdown-menu');\n    if (!this._menu) return;\n    element.setAttribute('aria-expanded', 'false');\n    this._el = element;\n    this._bindEvents();\n  }\n  _createClass(MegaDropdown, [{\n    key: \"open\",\n    value: function open() {\n      if (this._timeout) {\n        clearTimeout(this._timeout);\n        this._timeout = null;\n      }\n      if (this._focusTimeout) {\n        clearTimeout(this._focusTimeout);\n        this._focusTimeout = null;\n      }\n      if (this._el.getAttribute('aria-expanded') !== 'true') {\n        this._triggerEvent('show');\n        this._container.classList.add('show');\n        this._menu.classList.add('show');\n        this._el.setAttribute('aria-expanded', 'true');\n        this._el.focus();\n        this._triggerEvent('shown');\n      }\n    }\n  }, {\n    key: \"close\",\n    value: function close(force) {\n      var _this = this;\n      if (this._timeout) {\n        clearTimeout(this._timeout);\n        this._timeout = null;\n      }\n      if (this._focusTimeout) {\n        clearTimeout(this._focusTimeout);\n        this._focusTimeout = null;\n      }\n      if (this._onHover && !force) {\n        this._timeout = setTimeout(function () {\n          if (_this._timeout) {\n            clearTimeout(_this._timeout);\n            _this._timeout = null;\n          }\n          _this._close();\n        }, TIMEOUT);\n      } else {\n        this._close();\n      }\n    }\n  }, {\n    key: \"toggle\",\n    value: function toggle() {\n      // eslint-disable-next-line no-unused-expressions\n      this._el.getAttribute('aria-expanded') === 'true' ? this.close(true) : this.open();\n    }\n  }, {\n    key: \"destroy\",\n    value: function destroy() {\n      this._unbindEvents();\n      this._el = null;\n      if (this._timeout) {\n        clearTimeout(this._timeout);\n        this._timeout = null;\n      }\n      if (this._focusTimeout) {\n        clearTimeout(this._focusTimeout);\n        this._focusTimeout = null;\n      }\n    }\n  }, {\n    key: \"_close\",\n    value: function _close() {\n      if (this._el.getAttribute('aria-expanded') === 'true') {\n        this._triggerEvent('hide');\n        this._container.classList.remove('show');\n        this._menu.classList.remove('show');\n        this._el.setAttribute('aria-expanded', 'false');\n        this._triggerEvent('hidden');\n      }\n    }\n  }, {\n    key: \"_bindEvents\",\n    value: function _bindEvents() {\n      var _this2 = this;\n      this._elClickEvnt = function (e) {\n        e.preventDefault();\n        _this2.toggle();\n      };\n      this._el.addEventListener('click', this._elClickEvnt);\n      this._bodyClickEvnt = function (e) {\n        if (!_this2._container.contains(e.target) && _this2._container.classList.contains('show')) {\n          _this2.close(true);\n        }\n      };\n      document.body.addEventListener('click', this._bodyClickEvnt, true);\n      this._menuClickEvnt = function (e) {\n        if (e.target.classList.contains('mega-dropdown-link')) {\n          _this2.close(true);\n        }\n      };\n      this._menu.addEventListener('click', this._menuClickEvnt, true);\n      this._focusoutEvnt = function () {\n        if (_this2._focusTimeout) {\n          clearTimeout(_this2._focusTimeout);\n          _this2._focusTimeout = null;\n        }\n        if (_this2._el.getAttribute('aria-expanded') !== 'true') return;\n        _this2._focusTimeout = setTimeout(function () {\n          if (document.activeElement.tagName.toUpperCase() !== 'BODY' && MegaDropdown._findParent(document.activeElement, 'mega-dropdown') !== _this2._container) {\n            _this2.close(true);\n          }\n        }, 100);\n      };\n      this._container.addEventListener('focusout', this._focusoutEvnt, true);\n      if (this._onHover) {\n        this._enterEvnt = function () {\n          if (window.getComputedStyle(_this2._menu, null).getPropertyValue('position') === 'static') return;\n          _this2.open();\n        };\n        this._leaveEvnt = function () {\n          if (window.getComputedStyle(_this2._menu, null).getPropertyValue('position') === 'static') return;\n          _this2.close();\n        };\n        this._el.addEventListener('mouseenter', this._enterEvnt);\n        this._menu.addEventListener('mouseenter', this._enterEvnt);\n        this._el.addEventListener('mouseleave', this._leaveEvnt);\n        this._menu.addEventListener('mouseleave', this._leaveEvnt);\n      }\n    }\n  }, {\n    key: \"_unbindEvents\",\n    value: function _unbindEvents() {\n      if (this._elClickEvnt) {\n        this._el.removeEventListener('click', this._elClickEvnt);\n        this._elClickEvnt = null;\n      }\n      if (this._bodyClickEvnt) {\n        document.body.removeEventListener('click', this._bodyClickEvnt, true);\n        this._bodyClickEvnt = null;\n      }\n      if (this._menuClickEvnt) {\n        this._menu.removeEventListener('click', this._menuClickEvnt, true);\n        this._menuClickEvnt = null;\n      }\n      if (this._focusoutEvnt) {\n        this._container.removeEventListener('focusout', this._focusoutEvnt, true);\n        this._focusoutEvnt = null;\n      }\n      if (this._enterEvnt) {\n        this._el.removeEventListener('mouseenter', this._enterEvnt);\n        this._menu.removeEventListener('mouseenter', this._enterEvnt);\n        this._enterEvnt = null;\n      }\n      if (this._leaveEvnt) {\n        this._el.removeEventListener('mouseleave', this._leaveEvnt);\n        this._menu.removeEventListener('mouseleave', this._leaveEvnt);\n        this._leaveEvnt = null;\n      }\n    }\n  }, {\n    key: \"_triggerEvent\",\n    value: function _triggerEvent(event) {\n      if (document.createEvent) {\n        var customEvent;\n        if (typeof Event === 'function') {\n          customEvent = new Event(event);\n        } else {\n          customEvent = document.createEvent('Event');\n          customEvent.initEvent(event, false, true);\n        }\n        this._container.dispatchEvent(customEvent);\n      } else {\n        this._container.fireEvent(\"on\".concat(event), document.createEventObject());\n      }\n    }\n  }], [{\n    key: \"_findParent\",\n    value: function _findParent(el, cls) {\n      if (el.tagName.toUpperCase() === 'BODY') return null;\n      el = el.parentNode;\n      while (el.tagName.toUpperCase() !== 'BODY' && !el.classList.contains(cls)) {\n        el = el.parentNode;\n      }\n      return el.tagName.toUpperCase() !== 'BODY' ? el : null;\n    }\n  }]);\n  return MegaDropdown;\n}();\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,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RUFBRSxDQUFDaEIsT0FBTyxDQUFDQyxXQUFXLEVBQUUsS0FBSyxNQUFNLElBQUksQ0FBQ2UsRUFBRSxDQUFDdkMsU0FBUyxDQUFDZ0IsUUFBUSxDQUFDd0IsR0FBRyxDQUFDLEVBQUU7UUFDekVELEVBQUUsR0FBR0EsRUFBRSxDQUFDRSxVQUFVO01BQ3BCO01BQ0EsT0FBT0YsRUFBRSxDQUFDaEIsT0FBTyxDQUFDQyxXQUFXLEVBQUUsS0FBSyxNQUFNLEdBQUdlLEVBQUUsR0FBRyxJQUFJO0lBQ3hEO0VBQUM7RUFBQTtBQUFBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vVnVleHkvLi9qcy9tZWdhLWRyb3Bkb3duLmpzPzM5OTgiXSwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgVElNRU9VVCA9IDE1MFxyXG5cclxuY2xhc3MgTWVnYURyb3Bkb3duIHtcclxuICBjb25zdHJ1Y3RvcihlbGVtZW50LCBvcHRpb25zID0ge30pIHtcclxuICAgIHRoaXMuX29uSG92ZXIgPSBvcHRpb25zLnRyaWdnZXIgPT09ICdob3ZlcicgfHwgZWxlbWVudC5nZXRBdHRyaWJ1dGUoJ2RhdGEtdHJpZ2dlcicpID09PSAnaG92ZXInXHJcblxyXG4gICAgdGhpcy5fY29udGFpbmVyID0gTWVnYURyb3Bkb3duLl9maW5kUGFyZW50KGVsZW1lbnQsICdtZWdhLWRyb3Bkb3duJylcclxuICAgIGlmICghdGhpcy5fY29udGFpbmVyKSByZXR1cm5cclxuXHJcbiAgICB0aGlzLl9tZW51ID0gdGhpcy5fY29udGFpbmVyLnF1ZXJ5U2VsZWN0b3IoJy5kcm9wZG93bi10b2dnbGUgfiAuZHJvcGRvd24tbWVudScpXHJcbiAgICBpZiAoIXRoaXMuX21lbnUpIHJldHVyblxyXG5cclxuICAgIGVsZW1lbnQuc2V0QXR0cmlidXRlKCdhcmlhLWV4cGFuZGVkJywgJ2ZhbHNlJylcclxuXHJcbiAgICB0aGlzLl9lbCA9IGVsZW1lbnRcclxuICAgIHRoaXMuX2JpbmRFdmVudHMoKVxyXG4gIH1cclxuXHJcbiAgb3BlbigpIHtcclxuICAgIGlmICh0aGlzLl90aW1lb3V0KSB7XHJcbiAgICAgIGNsZWFyVGltZW91dCh0aGlzLl90aW1lb3V0KVxyXG4gICAgICB0aGlzLl90aW1lb3V0ID0gbnVsbFxyXG4gICAgfVxyXG4gICAgaWYgKHRoaXMuX2ZvY3VzVGltZW91dCkge1xyXG4gICAgICBjbGVhclRpbWVvdXQodGhpcy5fZm9jdXNUaW1lb3V0KVxyXG4gICAgICB0aGlzLl9mb2N1c1RpbWVvdXQgPSBudWxsXHJcbiAgICB9XHJcblxyXG4gICAgaWYgKHRoaXMuX2VsLmdldEF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcpICE9PSAndHJ1ZScpIHtcclxuICAgICAgdGhpcy5fdHJpZ2dlckV2ZW50KCdzaG93JylcclxuICAgICAgdGhpcy5fY29udGFpbmVyLmNsYXNzTGlzdC5hZGQoJ3Nob3cnKVxyXG4gICAgICB0aGlzLl9tZW51LmNsYXNzTGlzdC5hZGQoJ3Nob3cnKVxyXG4gICAgICB0aGlzLl9lbC5zZXRBdHRyaWJ1dGUoJ2FyaWEtZXhwYW5kZWQnLCAndHJ1ZScpXHJcbiAgICAgIHRoaXMuX2VsLmZvY3VzKClcclxuICAgICAgdGhpcy5fdHJpZ2dlckV2ZW50KCdzaG93bicpXHJcbiAgICB9XHJcbiAgfVxyXG5cclxuICBjbG9zZShmb3JjZSkge1xyXG4gICAgaWYgKHRoaXMuX3RpbWVvdXQpIHtcclxuICAgICAgY2xlYXJUaW1lb3V0KHRoaXMuX3RpbWVvdXQpXHJcbiAgICAgIHRoaXMuX3RpbWVvdXQgPSBudWxsXHJcbiAgICB9XHJcbiAgICBpZiAodGhpcy5fZm9jdXNUaW1lb3V0KSB7XHJcbiAgICAgIGNsZWFyVGltZW91dCh0aGlzLl9mb2N1c1RpbWVvdXQpXHJcbiAgICAgIHRoaXMuX2ZvY3VzVGltZW91dCA9IG51bGxcclxuICAgIH1cclxuXHJcbiAgICBpZiAodGhpcy5fb25Ib3ZlciAmJiAhZm9yY2UpIHtcclxuICAgICAgdGhpcy5fdGltZW91dCA9IHNldFRpbWVvdXQoKCkgPT4ge1xyXG4gICAgICAgIGlmICh0aGlzLl90aW1lb3V0KSB7XHJcbiAgICAgICAgICBjbGVhclRpbWVvdXQodGhpcy5fdGltZW91dClcclxuICAgICAgICAgIHRoaXMuX3RpbWVvdXQgPSBudWxsXHJcbiAgICAgICAgfVxyXG4gICAgICAgIHRoaXMuX2Nsb3NlKClcclxuICAgICAgfSwgVElNRU9VVClcclxuICAgIH0gZWxzZSB7XHJcbiAgICAgIHRoaXMuX2Nsb3NlKClcclxuICAgIH1cclxuICB9XHJcblxyXG4gIHRvZ2dsZSgpIHtcclxuICAgIC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBuby11bnVzZWQtZXhwcmVzc2lvbnNcclxuICAgIHRoaXMuX2VsLmdldEF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcpID09PSAndHJ1ZScgPyB0aGlzLmNsb3NlKHRydWUpIDogdGhpcy5vcGVuKClcclxuICB9XHJcblxyXG4gIGRlc3Ryb3koKSB7XHJcbiAgICB0aGlzLl91bmJpbmRFdmVudHMoKVxyXG4gICAgdGhpcy5fZWwgPSBudWxsXHJcblxyXG4gICAgaWYgKHRoaXMuX3RpbWVvdXQpIHtcclxuICAgICAgY2xlYXJUaW1lb3V0KHRoaXMuX3RpbWVvdXQpXHJcbiAgICAgIHRoaXMuX3RpbWVvdXQgPSBudWxsXHJcbiAgICB9XHJcblxyXG4gICAgaWYgKHRoaXMuX2ZvY3VzVGltZW91dCkge1xyXG4gICAgICBjbGVhclRpbWVvdXQodGhpcy5fZm9jdXNUaW1lb3V0KVxyXG4gICAgICB0aGlzLl9mb2N1c1RpbWVvdXQgPSBudWxsXHJcbiAgICB9XHJcbiAgfVxyXG5cclxuICBfY2xvc2UoKSB7XHJcbiAgICBpZiAodGhpcy5fZWwuZ2V0QXR0cmlidXRlKCdhcmlhLWV4cGFuZGVkJykgPT09ICd0cnVlJykge1xyXG4gICAgICB0aGlzLl90cmlnZ2VyRXZlbnQoJ2hpZGUnKVxyXG4gICAgICB0aGlzLl9jb250YWluZXIuY2xhc3NMaXN0LnJlbW92ZSgnc2hvdycpXHJcbiAgICAgIHRoaXMuX21lbnUuY2xhc3NMaXN0LnJlbW92ZSgnc2hvdycpXHJcbiAgICAgIHRoaXMuX2VsLnNldEF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcsICdmYWxzZScpXHJcbiAgICAgIHRoaXMuX3RyaWdnZXJFdmVudCgnaGlkZGVuJylcclxuICAgIH1cclxuICB9XHJcblxyXG4gIF9iaW5kRXZlbnRzKCkge1xyXG4gICAgdGhpcy5fZWxDbGlja0V2bnQgPSBlID0+IHtcclxuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpXHJcbiAgICAgIHRoaXMudG9nZ2xlKClcclxuICAgIH1cclxuICAgIHRoaXMuX2VsLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGhpcy5fZWxDbGlja0V2bnQpXHJcblxyXG4gICAgdGhpcy5fYm9keUNsaWNrRXZudCA9IGUgPT4ge1xyXG4gICAgICBpZiAoIXRoaXMuX2NvbnRhaW5lci5jb250YWlucyhlLnRhcmdldCkgJiYgdGhpcy5fY29udGFpbmVyLmNsYXNzTGlzdC5jb250YWlucygnc2hvdycpKSB7XHJcbiAgICAgICAgdGhpcy5jbG9zZSh0cnVlKVxyXG4gICAgICB9XHJcbiAgICB9XHJcbiAgICBkb2N1bWVudC5ib2R5LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGhpcy5fYm9keUNsaWNrRXZudCwgdHJ1ZSlcclxuXHJcbiAgICB0aGlzLl9tZW51Q2xpY2tFdm50ID0gZSA9PiB7XHJcbiAgICAgIGlmIChlLnRhcmdldC5jbGFzc0xpc3QuY29udGFpbnMoJ21lZ2EtZHJvcGRvd24tbGluaycpKSB7XHJcbiAgICAgICAgdGhpcy5jbG9zZSh0cnVlKVxyXG4gICAgICB9XHJcbiAgICB9XHJcbiAgICB0aGlzLl9tZW51LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGhpcy5fbWVudUNsaWNrRXZudCwgdHJ1ZSlcclxuXHJcbiAgICB0aGlzLl9mb2N1c291dEV2bnQgPSAoKSA9PiB7XHJcbiAgICAgIGlmICh0aGlzLl9mb2N1c1RpbWVvdXQpIHtcclxuICAgICAgICBjbGVhclRpbWVvdXQodGhpcy5fZm9jdXNUaW1lb3V0KVxyXG4gICAgICAgIHRoaXMuX2ZvY3VzVGltZW91dCA9IG51bGxcclxuICAgICAgfVxyXG5cclxuICAgICAgaWYgKHRoaXMuX2VsLmdldEF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcpICE9PSAndHJ1ZScpIHJldHVyblxyXG5cclxuICAgICAgdGhpcy5fZm9jdXNUaW1lb3V0ID0gc2V0VGltZW91dCgoKSA9PiB7XHJcbiAgICAgICAgaWYgKFxyXG4gICAgICAgICAgZG9jdW1lbnQuYWN0aXZlRWxlbWVudC50YWdOYW1lLnRvVXBwZXJDYXNlKCkgIT09ICdCT0RZJyAmJlxyXG4gICAgICAgICAgTWVnYURyb3Bkb3duLl9maW5kUGFyZW50KGRvY3VtZW50LmFjdGl2ZUVsZW1lbnQsICdtZWdhLWRyb3Bkb3duJykgIT09IHRoaXMuX2NvbnRhaW5lclxyXG4gICAgICAgICkge1xyXG4gICAgICAgICAgdGhpcy5jbG9zZSh0cnVlKVxyXG4gICAgICAgIH1cclxuICAgICAgfSwgMTAwKVxyXG4gICAgfVxyXG4gICAgdGhpcy5fY29udGFpbmVyLmFkZEV2ZW50TGlzdGVuZXIoJ2ZvY3Vzb3V0JywgdGhpcy5fZm9jdXNvdXRFdm50LCB0cnVlKVxyXG5cclxuICAgIGlmICh0aGlzLl9vbkhvdmVyKSB7XHJcbiAgICAgIHRoaXMuX2VudGVyRXZudCA9ICgpID0+IHtcclxuICAgICAgICBpZiAod2luZG93LmdldENvbXB1dGVkU3R5bGUodGhpcy5fbWVudSwgbnVsbCkuZ2V0UHJvcGVydHlWYWx1ZSgncG9zaXRpb24nKSA9PT0gJ3N0YXRpYycpIHJldHVyblxyXG4gICAgICAgIHRoaXMub3BlbigpXHJcbiAgICAgIH1cclxuICAgICAgdGhpcy5fbGVhdmVFdm50ID0gKCkgPT4ge1xyXG4gICAgICAgIGlmICh3aW5kb3cuZ2V0Q29tcHV0ZWRTdHlsZSh0aGlzLl9tZW51LCBudWxsKS5nZXRQcm9wZXJ0eVZhbHVlKCdwb3NpdGlvbicpID09PSAnc3RhdGljJykgcmV0dXJuXHJcbiAgICAgICAgdGhpcy5jbG9zZSgpXHJcbiAgICAgIH1cclxuXHJcbiAgICAgIHRoaXMuX2VsLmFkZEV2ZW50TGlzdGVuZXIoJ21vdXNlZW50ZXInLCB0aGlzLl9lbnRlckV2bnQpXHJcbiAgICAgIHRoaXMuX21lbnUuYWRkRXZlbnRMaXN0ZW5lcignbW91c2VlbnRlcicsIHRoaXMuX2VudGVyRXZudClcclxuICAgICAgdGhpcy5fZWwuYWRkRXZlbnRMaXN0ZW5lcignbW91c2VsZWF2ZScsIHRoaXMuX2xlYXZlRXZudClcclxuICAgICAgdGhpcy5fbWVudS5hZGRFdmVudExpc3RlbmVyKCdtb3VzZWxlYXZlJywgdGhpcy5fbGVhdmVFdm50KVxyXG4gICAgfVxyXG4gIH1cclxuXHJcbiAgX3VuYmluZEV2ZW50cygpIHtcclxuICAgIGlmICh0aGlzLl9lbENsaWNrRXZudCkge1xyXG4gICAgICB0aGlzLl9lbC5yZW1vdmVFdmVudExpc3RlbmVyKCdjbGljaycsIHRoaXMuX2VsQ2xpY2tFdm50KVxyXG4gICAgICB0aGlzLl9lbENsaWNrRXZudCA9IG51bGxcclxuICAgIH1cclxuICAgIGlmICh0aGlzLl9ib2R5Q2xpY2tFdm50KSB7XHJcbiAgICAgIGRvY3VtZW50LmJvZHkucmVtb3ZlRXZlbnRMaXN0ZW5lcignY2xpY2snLCB0aGlzLl9ib2R5Q2xpY2tFdm50LCB0cnVlKVxyXG4gICAgICB0aGlzLl9ib2R5Q2xpY2tFdm50ID0gbnVsbFxyXG4gICAgfVxyXG4gICAgaWYgKHRoaXMuX21lbnVDbGlja0V2bnQpIHtcclxuICAgICAgdGhpcy5fbWVudS5yZW1vdmVFdmVudExpc3RlbmVyKCdjbGljaycsIHRoaXMuX21lbnVDbGlja0V2bnQsIHRydWUpXHJcbiAgICAgIHRoaXMuX21lbnVDbGlja0V2bnQgPSBudWxsXHJcbiAgICB9XHJcbiAgICBpZiAodGhpcy5fZm9jdXNvdXRFdm50KSB7XHJcbiAgICAgIHRoaXMuX2NvbnRhaW5lci5yZW1vdmVFdmVudExpc3RlbmVyKCdmb2N1c291dCcsIHRoaXMuX2ZvY3Vzb3V0RXZudCwgdHJ1ZSlcclxuICAgICAgdGhpcy5fZm9jdXNvdXRFdm50ID0gbnVsbFxyXG4gICAgfVxyXG4gICAgaWYgKHRoaXMuX2VudGVyRXZudCkge1xyXG4gICAgICB0aGlzLl9lbC5yZW1vdmVFdmVudExpc3RlbmVyKCdtb3VzZWVudGVyJywgdGhpcy5fZW50ZXJFdm50KVxyXG4gICAgICB0aGlzLl9tZW51LnJlbW92ZUV2ZW50TGlzdGVuZXIoJ21vdXNlZW50ZXInLCB0aGlzLl9lbnRlckV2bnQpXHJcbiAgICAgIHRoaXMuX2VudGVyRXZudCA9IG51bGxcclxuICAgIH1cclxuICAgIGlmICh0aGlzLl9sZWF2ZUV2bnQpIHtcclxuICAgICAgdGhpcy5fZWwucmVtb3ZlRXZlbnRMaXN0ZW5lcignbW91c2VsZWF2ZScsIHRoaXMuX2xlYXZlRXZudClcclxuICAgICAgdGhpcy5fbWVudS5yZW1vdmVFdmVudExpc3RlbmVyKCdtb3VzZWxlYXZlJywgdGhpcy5fbGVhdmVFdm50KVxyXG4gICAgICB0aGlzLl9sZWF2ZUV2bnQgPSBudWxsXHJcbiAgICB9XHJcbiAgfVxyXG5cclxuICBzdGF0aWMgX2ZpbmRQYXJlbnQoZWwsIGNscykge1xyXG4gICAgaWYgKGVsLnRhZ05hbWUudG9VcHBlckNhc2UoKSA9PT0gJ0JPRFknKSByZXR1cm4gbnVsbFxyXG4gICAgZWwgPSBlbC5wYXJlbnROb2RlXHJcbiAgICB3aGlsZSAoZWwudGFnTmFtZS50b1VwcGVyQ2FzZSgpICE9PSAnQk9EWScgJiYgIWVsLmNsYXNzTGlzdC5jb250YWlucyhjbHMpKSB7XHJcbiAgICAgIGVsID0gZWwucGFyZW50Tm9kZVxyXG4gICAgfVxyXG4gICAgcmV0dXJuIGVsLnRhZ05hbWUudG9VcHBlckNhc2UoKSAhPT0gJ0JPRFknID8gZWwgOiBudWxsXHJcbiAgfVxyXG5cclxuICBfdHJpZ2dlckV2ZW50KGV2ZW50KSB7XHJcbiAgICBpZiAoZG9jdW1lbnQuY3JlYXRlRXZlbnQpIHtcclxuICAgICAgbGV0IGN1c3RvbUV2ZW50XHJcblxyXG4gICAgICBpZiAodHlwZW9mIEV2ZW50ID09PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgICAgY3VzdG9tRXZlbnQgPSBuZXcgRXZlbnQoZXZlbnQpXHJcbiAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgY3VzdG9tRXZlbnQgPSBkb2N1bWVudC5jcmVhdGVFdmVudCgnRXZlbnQnKVxyXG4gICAgICAgIGN1c3RvbUV2ZW50LmluaXRFdmVudChldmVudCwgZmFsc2UsIHRydWUpXHJcbiAgICAgIH1cclxuXHJcbiAgICAgIHRoaXMuX2NvbnRhaW5lci5kaXNwYXRjaEV2ZW50KGN1c3RvbUV2ZW50KVxyXG4gICAgfSBlbHNlIHtcclxuICAgICAgdGhpcy5fY29udGFpbmVyLmZpcmVFdmVudChgb24ke2V2ZW50fWAsIGRvY3VtZW50LmNyZWF0ZUV2ZW50T2JqZWN0KCkpXHJcbiAgICB9XHJcbiAgfVxyXG59XHJcblxyXG5leHBvcnQgeyBNZWdhRHJvcGRvd24gfVxyXG4iXSwibmFtZXMiOlsiVElNRU9VVCIsIk1lZ2FEcm9wZG93biIsImVsZW1lbnQiLCJvcHRpb25zIiwiX29uSG92ZXIiLCJ0cmlnZ2VyIiwiZ2V0QXR0cmlidXRlIiwiX2NvbnRhaW5lciIsIl9maW5kUGFyZW50IiwiX21lbnUiLCJxdWVyeVNlbGVjdG9yIiwic2V0QXR0cmlidXRlIiwiX2VsIiwiX2JpbmRFdmVudHMiLCJfdGltZW91dCIsImNsZWFyVGltZW91dCIsIl9mb2N1c1RpbWVvdXQiLCJfdHJpZ2dlckV2ZW50IiwiY2xhc3NMaXN0IiwiYWRkIiwiZm9jdXMiLCJmb3JjZSIsInNldFRpbWVvdXQiLCJfY2xvc2UiLCJjbG9zZSIsIm9wZW4iLCJfdW5iaW5kRXZlbnRzIiwicmVtb3ZlIiwiX2VsQ2xpY2tFdm50IiwiZSIsInByZXZlbnREZWZhdWx0IiwidG9nZ2xlIiwiYWRkRXZlbnRMaXN0ZW5lciIsIl9ib2R5Q2xpY2tFdm50IiwiY29udGFpbnMiLCJ0YXJnZXQiLCJkb2N1bWVudCIsImJvZHkiLCJfbWVudUNsaWNrRXZudCIsIl9mb2N1c291dEV2bnQiLCJhY3RpdmVFbGVtZW50IiwidGFnTmFtZSIsInRvVXBwZXJDYXNlIiwiX2VudGVyRXZudCIsIndpbmRvdyIsImdldENvbXB1dGVkU3R5bGUiLCJnZXRQcm9wZXJ0eVZhbHVlIiwiX2xlYXZlRXZudCIsInJlbW92ZUV2ZW50TGlzdGVuZXIiLCJldmVudCIsImNyZWF0ZUV2ZW50IiwiY3VzdG9tRXZlbnQiLCJFdmVudCIsImluaXRFdmVudCIsImRpc3BhdGNoRXZlbnQiLCJmaXJlRXZlbnQiLCJjcmVhdGVFdmVudE9iamVjdCIsImVsIiwiY2xzIiwicGFyZW50Tm9kZSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./js/mega-dropdown.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./js/mega-dropdown.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	var __webpack_export_target__ = window;
/******/ 	for(var i in __webpack_exports__) __webpack_export_target__[i] = __webpack_exports__[i];
/******/ 	if(__webpack_exports__.__esModule) Object.defineProperty(__webpack_export_target__, "__esModule", { value: true });
/******/ 	
/******/ })()
;