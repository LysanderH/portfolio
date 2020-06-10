/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./sources/js/bundle.js":
/*!******************************!*\
  !*** ./sources/js/bundle.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _line__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./line */ "./sources/js/line.js");

var app = {
  canvas: document.getElementById("canvas"),
  c: null,
  Line: _line__WEBPACK_IMPORTED_MODULE_0__["Line"],
  lines: [],
  scroll: 0,
  init: function init() {
    var _this = this;

    this.c = this.canvas.getContext('2d');
    this.canvas.height = window.innerHeight;
    this.canvas.width = window.innerWidth;
    window.addEventListener('resize', function () {
      _this.canvas.height = window.innerHeight;
      _this.canvas.width = window.innerWidth;
    });
    this.lines.push(new _line__WEBPACK_IMPORTED_MODULE_0__["Line"](app));
    this.lines.push(new _line__WEBPACK_IMPORTED_MODULE_0__["Line"](app));
    this.lines.push(new _line__WEBPACK_IMPORTED_MODULE_0__["Line"](app));
    this.lines.push(new _line__WEBPACK_IMPORTED_MODULE_0__["Line"](app));
    this.lines.push(new _line__WEBPACK_IMPORTED_MODULE_0__["Line"](app));
    this.lines.push(new _line__WEBPACK_IMPORTED_MODULE_0__["Line"](app));
    this.lines.push(new _line__WEBPACK_IMPORTED_MODULE_0__["Line"](app));
    this.lines.forEach(function (item) {
      item.init(_this);
    });
    this.animate();
  },
  animate: function animate() {
    var _this2 = this;

    this.c.clearRect(0, 0, this.canvas.width, this.canvas.height);
    this.lines.forEach(function (item) {
      item.moveLine();
      item.drawLine();
    });
    requestAnimationFrame(function () {
      _this2.animate();
    });
  }
};
app.init();

/***/ }),

/***/ "./sources/js/line.js":
/*!****************************!*\
  !*** ./sources/js/line.js ***!
  \****************************/
/*! exports provided: Line */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Line", function() { return Line; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Line = /*#__PURE__*/function () {
  function Line(app) {
    var posY = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
    var speed = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 10;
    var startPosY = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 0;
    var posX = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 0;
    var greenOrPurple = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 0;
    var color = arguments.length > 6 && arguments[6] !== undefined ? arguments[6] : '';

    _classCallCheck(this, Line);

    this.app = app;
    this.posY = 0;
    this.posX = this.app.canvas.width * Math.random();
    this.speed = 5 * Math.random() + 5;
    this.startPosY = 0;
    this.greenOrPurple = Math.random();
    this.color = "";

    if (this.greenOrPurple > 0.5) {
      this.color = "#C935AB";
    } else {
      this.color = "#52D3B4";
    }
  }

  _createClass(Line, [{
    key: "init",
    value: function init(app) {
      this.app = app;
      this.posX = this.app.canvas.width * Math.random();
      this.speed = 10 * Math.random() + 10;

      if (this.greenOrPurple > 0.5) {
        this.color = "#C935AB";
      } else {
        this.color = "#52D3B4";
      }
    }
  }, {
    key: "drawLine",
    value: function drawLine() {
      this.app.c.beginPath();
      this.app.c.strokeStyle = this.color;
      this.app.c.moveTo(this.posX, this.startPosY);
      this.app.c.lineTo(this.posX, this.posY);
      this.app.c.stroke();
    }
  }, {
    key: "moveLine",
    value: function moveLine() {
      var _this = this;

      this.posY += this.speed;

      if (this.posY > this.app.canvas.height) {
        this.posY += 0;
        this.startPosY += this.speed;
      }

      if (this.startPosY >= this.app.canvas.height) {
        this.posY = 0;
        this.startPosY = 0;
        this.app.lines = this.app.lines.filter(function (item) {
          return item !== _this;
        });
        this.app.lines.push(new Line(this.app));
      }
    }
  }]);

  return Line;
}();

/***/ }),

/***/ "./sources/sass/bundle.scss":
/*!**********************************!*\
  !*** ./sources/sass/bundle.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************!*\
  !*** multi ./sources/js/bundle.js ./sources/sass/bundle.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! E:\Dokumente\Projekte\portfolio\development\wp-content\themes\protfolio\sources\js\bundle.js */"./sources/js/bundle.js");
module.exports = __webpack_require__(/*! E:\Dokumente\Projekte\portfolio\development\wp-content\themes\protfolio\sources\sass\bundle.scss */"./sources/sass/bundle.scss");


/***/ })

/******/ });