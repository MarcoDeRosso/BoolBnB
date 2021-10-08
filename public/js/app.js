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

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\resources\\js\\app.js: Support for the experimental syntax 'jsx' isn't currently enabled (93:1):\n\n\u001b[0m \u001b[90m 91 |\u001b[39m \u001b[90m//     //     }); \u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 92 |\u001b[39m \u001b[90m//     // }; \u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 93 |\u001b[39m \u001b[33m<\u001b[39m\u001b[33mscript\u001b[39m src\u001b[33m=\u001b[39m\u001b[32m\"https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js\"\u001b[39m\u001b[33m>\u001b[39m\u001b[33m<\u001b[39m\u001b[33m/\u001b[39m\u001b[33mscript\u001b[39m\u001b[33m>\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 94 |\u001b[39m         \u001b[36mconst\u001b[39m \u001b[33mAPI_KEY\u001b[39m \u001b[33m=\u001b[39m \u001b[32m'RagRFtF86mML8SeN6kqbSiihdZpGAE1d'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 95 |\u001b[39m         \u001b[36mconst\u001b[39m \u001b[33mAPPLICATION_NAME\u001b[39m \u001b[33m=\u001b[39m \u001b[32m'BoolBnb'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 96 |\u001b[39m         \u001b[36mconst\u001b[39m \u001b[33mAPPLICATION_VERSION\u001b[39m \u001b[33m=\u001b[39m \u001b[32m'1.0'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\nAdd @babel/preset-react (https://git.io/JfeDR) to the 'presets' section of your Babel config to enable transformation.\nIf you want to leave it as-is, add @babel/plugin-syntax-jsx (https://git.io/vb4yA) to the 'plugins' section to enable parsing.\n    at Parser._raise (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:510:17)\n    at Parser.raiseWithData (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:503:17)\n    at Parser.expectOnePlugin (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:3383:18)\n    at Parser.parseExprAtom (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:11642:20)\n    at Parser.parseExprSubscripts (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:11217:23)\n    at Parser.parseUpdate (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:11197:21)\n    at Parser.parseMaybeUnary (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:11172:23)\n    at Parser.parseMaybeUnaryOrPrivate (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:10986:59)\n    at Parser.parseExprOps (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:10993:23)\n    at Parser.parseMaybeConditional (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:10963:23)\n    at Parser.parseMaybeAssign (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:10926:21)\n    at Parser.parseExpressionBase (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:10866:23)\n    at C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:10860:39\n    at Parser.allowInAnd (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12714:16)\n    at Parser.parseExpression (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:10860:17)\n    at Parser.parseStatementContent (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:13064:23)\n    at Parser.parseStatement (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12931:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:13520:25)\n    at Parser.parseBlockBody (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:13511:10)\n    at Parser.parseProgram (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12853:10)\n    at Parser.parseTopLevel (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:12844:25)\n    at Parser.parse (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:14588:10)\n    at parse (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\parser\\lib\\index.js:14640:38)\n    at parser (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\core\\lib\\parser\\index.js:52:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:87:38)\n    at normalizeFile.next (<anonymous>)\n    at run (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\core\\lib\\transformation\\index.js:29:50)\n    at run.next (<anonymous>)\n    at Function.transform (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\@babel\\core\\lib\\transform.js:25:41)\n    at transform.next (<anonymous>)\n    at step (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\gensync\\index.js:261:32)\n    at C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\gensync\\index.js:273:13\n    at async.call.result.err.err (C:\\Users\\Marco\\Desktop\\BolBnB\\BoolBnB\\node_modules\\gensync\\index.js:223:11)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\Marco\Desktop\BolBnB\BoolBnB\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\Marco\Desktop\BolBnB\BoolBnB\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });