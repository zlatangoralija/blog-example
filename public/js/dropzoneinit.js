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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dropzoneinit.js":
/*!**************************************!*\
  !*** ./resources/js/dropzoneinit.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

Dropzone.autoDiscover = false;
$(document).ready(function () {
  console.log("ready!");
  $(".dropzone").dropzone({
    url: "/file-uploads",
    addRemoveLinks: true,
    acceptedFiles: 'image/jpeg,application/pdf,image/gif,image/png,application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/msword,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,image/svg+xml,application/vnd.oasis.opendocument.spreadsheet,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    init: function init() {
      this.on("removedfile", function (file) {
        if (file.status == 'success') {
          var fileUploded = file.previewElement.querySelector("[data-dz-name]");
          var filename = $(fileUploded).attr('data-path');
          $.ajax({
            url: '/file-uploads',
            type: "delete",
            data: {
              'path': filename
            },
            success: function success(data) {
              $('[value="' + filename + '"]').remove();
            }
          });
          var lang = $('#lang option:selected').val();
          minFiles = false;
        }
      });
    },
    sending: function sending(file, xhr, formData) {
      formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
    },
    success: function success(file, response) {
      var lang = $('#lang option:selected').val();
      var inputElement = $(this.element).data('input-element');
      console.log(inputElement);
      $(inputElement).val(JSON.stringify(response));
      minFiles = true;
      var fileUploded = file.previewElement.querySelector("[data-dz-name]");
      $(fileUploded).attr('data-path', response.path);
      file.previewElement.classList.add("dz-success");
      console.log("Successfully uploaded :" + response.path);
    },
    error: function error(file, response) {
      file.previewElement.classList.add("dz-error");
    }
  });
});

/***/ }),

/***/ 1:
/*!********************************************!*\
  !*** multi ./resources/js/dropzoneinit.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/zlatan/Projects/blog-example/resources/js/dropzoneinit.js */"./resources/js/dropzoneinit.js");


/***/ })

/******/ });