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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/readnotification.js":
/*!******************************************!*\
  !*** ./resources/js/readnotification.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  $('#update-notification').on('click', function (e) {\n    e.preventDefault();\n    var redirectTo = $(this).attr('href');\n    console.log('clicked', $(this).data('id'));\n    $.ajax({\n      url: '/api/notification/update/' + $(this).data('id'),\n      method: 'POST'\n    }).then(function () {\n      console.log('success');\n      window.location = redirectTo;\n    })[\"catch\"](function (error) {\n      console.log(error);\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcmVhZG5vdGlmaWNhdGlvbi5qcz83MjE0Il0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5Iiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCJyZWRpcmVjdFRvIiwiYXR0ciIsImNvbnNvbGUiLCJsb2ciLCJkYXRhIiwiYWpheCIsInVybCIsIm1ldGhvZCIsInRoZW4iLCJ3aW5kb3ciLCJsb2NhdGlvbiIsImVycm9yIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFVO0FBQ3hCRixHQUFDLENBQUMsc0JBQUQsQ0FBRCxDQUEwQkcsRUFBMUIsQ0FBNkIsT0FBN0IsRUFBc0MsVUFBU0MsQ0FBVCxFQUFXO0FBQzdDQSxLQUFDLENBQUNDLGNBQUY7QUFDQSxRQUFNQyxVQUFVLEdBQUdOLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU8sSUFBUixDQUFhLE1BQWIsQ0FBbkI7QUFDQUMsV0FBTyxDQUFDQyxHQUFSLENBQVksU0FBWixFQUF1QlQsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRVSxJQUFSLENBQWEsSUFBYixDQUF2QjtBQUNBVixLQUFDLENBQUNXLElBQUYsQ0FBTztBQUNIQyxTQUFHLEVBQUUsOEJBQTRCWixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFVLElBQVIsQ0FBYSxJQUFiLENBRDlCO0FBRUhHLFlBQU0sRUFBRTtBQUZMLEtBQVAsRUFHR0MsSUFISCxDQUdRLFlBQVU7QUFDZE4sYUFBTyxDQUFDQyxHQUFSLENBQVksU0FBWjtBQUNBTSxZQUFNLENBQUNDLFFBQVAsR0FBa0JWLFVBQWxCO0FBQ0gsS0FORCxXQU1TLFVBQVVXLEtBQVYsRUFBZ0I7QUFDckJULGFBQU8sQ0FBQ0MsR0FBUixDQUFZUSxLQUFaO0FBQ0gsS0FSRDtBQVNILEdBYkQ7QUFjSCxDQWZEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3JlYWRub3RpZmljYXRpb24uanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xuICAgICQoJyN1cGRhdGUtbm90aWZpY2F0aW9uJykub24oJ2NsaWNrJywgZnVuY3Rpb24oZSl7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgY29uc3QgcmVkaXJlY3RUbyA9ICQodGhpcykuYXR0cignaHJlZicpO1xuICAgICAgICBjb25zb2xlLmxvZygnY2xpY2tlZCcsICQodGhpcykuZGF0YSgnaWQnKSk7XG4gICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICB1cmw6ICcvYXBpL25vdGlmaWNhdGlvbi91cGRhdGUvJyskKHRoaXMpLmRhdGEoJ2lkJyksXG4gICAgICAgICAgICBtZXRob2Q6ICdQT1NUJ1xuICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygnc3VjY2VzcycpO1xuICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uID0gcmVkaXJlY3RUbztcbiAgICAgICAgfSkuY2F0Y2goZnVuY3Rpb24gKGVycm9yKXtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGVycm9yKVxuICAgICAgICB9KTtcbiAgICB9KTtcbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/readnotification.js\n");

/***/ }),

/***/ 2:
/*!************************************************!*\
  !*** multi ./resources/js/readnotification.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/zlatan/Projects/blog-example/resources/js/readnotification.js */"./resources/js/readnotification.js");


/***/ })

/******/ });