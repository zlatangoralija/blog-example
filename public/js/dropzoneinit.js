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

eval("Dropzone.autoDiscover = false;\n$(document).ready(function () {\n  console.log(\"ready!\");\n  $(\".dropzone\").dropzone({\n    url: \"/file-uploads\",\n    addRemoveLinks: true,\n    acceptedFiles: 'image/jpeg,application/pdf,image/gif,image/png,application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/msword,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,image/svg+xml,application/vnd.oasis.opendocument.spreadsheet,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',\n    init: function init() {\n      this.on(\"removedfile\", function (file) {\n        if (file.status == 'success') {\n          var fileUploded = file.previewElement.querySelector(\"[data-dz-name]\");\n          var filename = $(fileUploded).attr('data-path');\n          $.ajax({\n            url: '/file-uploads',\n            type: \"delete\",\n            data: {\n              'path': filename\n            },\n            success: function success(data) {\n              $('[value=\"' + filename + '\"]').remove();\n            }\n          });\n          var lang = $('#lang option:selected').val();\n          minFiles = false;\n        }\n      });\n    },\n    sending: function sending(file, xhr, formData) {\n      formData.append(\"_token\", $('meta[name=\"csrf-token\"]').attr('content'));\n    },\n    success: function success(file, response) {\n      var lang = $('#lang option:selected').val();\n      var inputElement = $(this.element).data('input-element');\n      console.log(inputElement);\n      $(inputElement).val(JSON.stringify(response));\n      minFiles = true;\n      var fileUploded = file.previewElement.querySelector(\"[data-dz-name]\");\n      $(fileUploded).attr('data-path', response.path);\n      file.previewElement.classList.add(\"dz-success\");\n      console.log(\"Successfully uploaded :\" + response.path);\n    },\n    error: function error(file, response) {\n      file.previewElement.classList.add(\"dz-error\");\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZHJvcHpvbmVpbml0LmpzPzkzODAiXSwibmFtZXMiOlsiRHJvcHpvbmUiLCJhdXRvRGlzY292ZXIiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsImNvbnNvbGUiLCJsb2ciLCJkcm9wem9uZSIsInVybCIsImFkZFJlbW92ZUxpbmtzIiwiYWNjZXB0ZWRGaWxlcyIsImluaXQiLCJvbiIsImZpbGUiLCJzdGF0dXMiLCJmaWxlVXBsb2RlZCIsInByZXZpZXdFbGVtZW50IiwicXVlcnlTZWxlY3RvciIsImZpbGVuYW1lIiwiYXR0ciIsImFqYXgiLCJ0eXBlIiwiZGF0YSIsInN1Y2Nlc3MiLCJyZW1vdmUiLCJsYW5nIiwidmFsIiwibWluRmlsZXMiLCJzZW5kaW5nIiwieGhyIiwiZm9ybURhdGEiLCJhcHBlbmQiLCJyZXNwb25zZSIsImlucHV0RWxlbWVudCIsImVsZW1lbnQiLCJKU09OIiwic3RyaW5naWZ5IiwicGF0aCIsImNsYXNzTGlzdCIsImFkZCIsImVycm9yIl0sIm1hcHBpbmdzIjoiQUFBQUEsUUFBUSxDQUFDQyxZQUFULEdBQXdCLEtBQXhCO0FBQ0FDLENBQUMsQ0FBRUMsUUFBRixDQUFELENBQWNDLEtBQWQsQ0FBb0IsWUFBVztBQUMzQkMsU0FBTyxDQUFDQyxHQUFSLENBQWEsUUFBYjtBQUNBSixHQUFDLENBQUMsV0FBRCxDQUFELENBQWVLLFFBQWYsQ0FBd0I7QUFDcEJDLE9BQUcsRUFBRSxlQURlO0FBRXBCQyxrQkFBYyxFQUFFLElBRkk7QUFHcEJDLGlCQUFhLEVBQUUsNFlBSEs7QUFJcEJDLFFBQUksRUFBRSxnQkFBVztBQUViLFdBQUtDLEVBQUwsQ0FBUSxhQUFSLEVBQXVCLFVBQVNDLElBQVQsRUFBZTtBQUNsQyxZQUFJQSxJQUFJLENBQUNDLE1BQUwsSUFBZSxTQUFuQixFQUE4QjtBQUMxQixjQUFJQyxXQUFXLEdBQUdGLElBQUksQ0FBQ0csY0FBTCxDQUFvQkMsYUFBcEIsQ0FBa0MsZ0JBQWxDLENBQWxCO0FBRUEsY0FBSUMsUUFBUSxHQUFHaEIsQ0FBQyxDQUFDYSxXQUFELENBQUQsQ0FBZUksSUFBZixDQUFvQixXQUFwQixDQUFmO0FBRUFqQixXQUFDLENBQUNrQixJQUFGLENBQU87QUFDSFosZUFBRyxFQUFFLGVBREY7QUFFSGEsZ0JBQUksRUFBRSxRQUZIO0FBR0hDLGdCQUFJLEVBQUU7QUFBRSxzQkFBUUo7QUFBVixhQUhIO0FBSUhLLG1CQUFPLEVBQUUsaUJBQVNELElBQVQsRUFBZTtBQUNwQnBCLGVBQUMsQ0FBQyxhQUFXZ0IsUUFBWCxHQUFvQixJQUFyQixDQUFELENBQTRCTSxNQUE1QjtBQUNIO0FBTkUsV0FBUDtBQVFBLGNBQUlDLElBQUksR0FBR3ZCLENBQUMsQ0FBQyx1QkFBRCxDQUFELENBQTJCd0IsR0FBM0IsRUFBWDtBQUNBQyxrQkFBUSxHQUFHLEtBQVg7QUFDSDtBQUNKLE9BakJEO0FBa0JILEtBeEJtQjtBQXlCcEJDLFdBQU8sRUFBRSxpQkFBU2YsSUFBVCxFQUFlZ0IsR0FBZixFQUFvQkMsUUFBcEIsRUFBOEI7QUFDbkNBLGNBQVEsQ0FBQ0MsTUFBVCxDQUFnQixRQUFoQixFQUEwQjdCLENBQUMsQ0FBQyx5QkFBRCxDQUFELENBQTZCaUIsSUFBN0IsQ0FBa0MsU0FBbEMsQ0FBMUI7QUFDSCxLQTNCbUI7QUE0QnBCSSxXQUFPLEVBQUUsaUJBQVVWLElBQVYsRUFBZ0JtQixRQUFoQixFQUEwQjtBQUUvQixVQUFJUCxJQUFJLEdBQUd2QixDQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQndCLEdBQTNCLEVBQVg7QUFDQSxVQUFJTyxZQUFZLEdBQUcvQixDQUFDLENBQUMsS0FBS2dDLE9BQU4sQ0FBRCxDQUFnQlosSUFBaEIsQ0FBcUIsZUFBckIsQ0FBbkI7QUFDQWpCLGFBQU8sQ0FBQ0MsR0FBUixDQUFZMkIsWUFBWjtBQUNBL0IsT0FBQyxDQUFDK0IsWUFBRCxDQUFELENBQWdCUCxHQUFoQixDQUFvQlMsSUFBSSxDQUFDQyxTQUFMLENBQWVKLFFBQWYsQ0FBcEI7QUFFQUwsY0FBUSxHQUFHLElBQVg7QUFFQSxVQUFJWixXQUFXLEdBQUdGLElBQUksQ0FBQ0csY0FBTCxDQUFvQkMsYUFBcEIsQ0FBa0MsZ0JBQWxDLENBQWxCO0FBQ0FmLE9BQUMsQ0FBQ2EsV0FBRCxDQUFELENBQWVJLElBQWYsQ0FBb0IsV0FBcEIsRUFBaUNhLFFBQVEsQ0FBQ0ssSUFBMUM7QUFFQXhCLFVBQUksQ0FBQ0csY0FBTCxDQUFvQnNCLFNBQXBCLENBQThCQyxHQUE5QixDQUFrQyxZQUFsQztBQUNBbEMsYUFBTyxDQUFDQyxHQUFSLENBQVksNEJBQTRCMEIsUUFBUSxDQUFDSyxJQUFqRDtBQUNILEtBMUNtQjtBQTJDcEJHLFNBQUssRUFBRSxlQUFVM0IsSUFBVixFQUFnQm1CLFFBQWhCLEVBQTBCO0FBQzdCbkIsVUFBSSxDQUFDRyxjQUFMLENBQW9Cc0IsU0FBcEIsQ0FBOEJDLEdBQTlCLENBQWtDLFVBQWxDO0FBQ0g7QUE3Q21CLEdBQXhCO0FBK0NILENBakREIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2Ryb3B6b25laW5pdC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIkRyb3B6b25lLmF1dG9EaXNjb3ZlciA9IGZhbHNlO1xuJCggZG9jdW1lbnQgKS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICBjb25zb2xlLmxvZyggXCJyZWFkeSFcIiApO1xuICAgICQoXCIuZHJvcHpvbmVcIikuZHJvcHpvbmUoe1xuICAgICAgICB1cmw6IFwiL2ZpbGUtdXBsb2Fkc1wiLFxuICAgICAgICBhZGRSZW1vdmVMaW5rczogdHJ1ZSxcbiAgICAgICAgYWNjZXB0ZWRGaWxlczogJ2ltYWdlL2pwZWcsYXBwbGljYXRpb24vcGRmLGltYWdlL2dpZixpbWFnZS9wbmcsYXBwbGljYXRpb24vdm5kLm9wZW54bWxmb3JtYXRzLW9mZmljZWRvY3VtZW50LndvcmRwcm9jZXNzaW5nbWwuZG9jdW1lbnQsIGFwcGxpY2F0aW9uL21zd29yZCxhcHBsaWNhdGlvbi92bmQubXMtcG93ZXJwb2ludCxhcHBsaWNhdGlvbi92bmQub3BlbnhtbGZvcm1hdHMtb2ZmaWNlZG9jdW1lbnQucHJlc2VudGF0aW9ubWwucHJlc2VudGF0aW9uLGltYWdlL3N2Zyt4bWwsYXBwbGljYXRpb24vdm5kLm9hc2lzLm9wZW5kb2N1bWVudC5zcHJlYWRzaGVldCxhcHBsaWNhdGlvbi92bmQubXMtZXhjZWwsYXBwbGljYXRpb24vdm5kLm9wZW54bWxmb3JtYXRzLW9mZmljZWRvY3VtZW50LnNwcmVhZHNoZWV0bWwuc2hlZXQnLFxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcblxuICAgICAgICAgICAgdGhpcy5vbihcInJlbW92ZWRmaWxlXCIsIGZ1bmN0aW9uKGZpbGUpIHtcbiAgICAgICAgICAgICAgICBpZiAoZmlsZS5zdGF0dXMgPT0gJ3N1Y2Nlc3MnKSB7XG4gICAgICAgICAgICAgICAgICAgIHZhciBmaWxlVXBsb2RlZCA9IGZpbGUucHJldmlld0VsZW1lbnQucXVlcnlTZWxlY3RvcihcIltkYXRhLWR6LW5hbWVdXCIpO1xuXG4gICAgICAgICAgICAgICAgICAgIHZhciBmaWxlbmFtZSA9ICQoZmlsZVVwbG9kZWQpLmF0dHIoJ2RhdGEtcGF0aCcpO1xuXG4gICAgICAgICAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgICAgICAgICB1cmw6ICcvZmlsZS11cGxvYWRzJyxcbiAgICAgICAgICAgICAgICAgICAgICAgIHR5cGU6IFwiZGVsZXRlXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICBkYXRhOiB7ICdwYXRoJzogZmlsZW5hbWV9LFxuICAgICAgICAgICAgICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJ1t2YWx1ZT1cIicrZmlsZW5hbWUrJ1wiXScpLnJlbW92ZSgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgdmFyIGxhbmcgPSAkKCcjbGFuZyBvcHRpb246c2VsZWN0ZWQnKS52YWwoKTtcbiAgICAgICAgICAgICAgICAgICAgbWluRmlsZXMgPSBmYWxzZTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSxcbiAgICAgICAgc2VuZGluZzogZnVuY3Rpb24oZmlsZSwgeGhyLCBmb3JtRGF0YSkge1xuICAgICAgICAgICAgZm9ybURhdGEuYXBwZW5kKFwiX3Rva2VuXCIsICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JykpO1xuICAgICAgICB9LFxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZmlsZSwgcmVzcG9uc2UpIHtcblxuICAgICAgICAgICAgdmFyIGxhbmcgPSAkKCcjbGFuZyBvcHRpb246c2VsZWN0ZWQnKS52YWwoKTtcbiAgICAgICAgICAgIHZhciBpbnB1dEVsZW1lbnQgPSAkKHRoaXMuZWxlbWVudCkuZGF0YSgnaW5wdXQtZWxlbWVudCcpXG4gICAgICAgICAgICBjb25zb2xlLmxvZyhpbnB1dEVsZW1lbnQpO1xuICAgICAgICAgICAgJChpbnB1dEVsZW1lbnQpLnZhbChKU09OLnN0cmluZ2lmeShyZXNwb25zZSkpO1xuXG4gICAgICAgICAgICBtaW5GaWxlcyA9IHRydWU7XG5cbiAgICAgICAgICAgIHZhciBmaWxlVXBsb2RlZCA9IGZpbGUucHJldmlld0VsZW1lbnQucXVlcnlTZWxlY3RvcihcIltkYXRhLWR6LW5hbWVdXCIpO1xuICAgICAgICAgICAgJChmaWxlVXBsb2RlZCkuYXR0cignZGF0YS1wYXRoJywgcmVzcG9uc2UucGF0aCk7XG5cbiAgICAgICAgICAgIGZpbGUucHJldmlld0VsZW1lbnQuY2xhc3NMaXN0LmFkZChcImR6LXN1Y2Nlc3NcIik7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhcIlN1Y2Nlc3NmdWxseSB1cGxvYWRlZCA6XCIgKyByZXNwb25zZS5wYXRoKTtcbiAgICAgICAgfSxcbiAgICAgICAgZXJyb3I6IGZ1bmN0aW9uIChmaWxlLCByZXNwb25zZSkge1xuICAgICAgICAgICAgZmlsZS5wcmV2aWV3RWxlbWVudC5jbGFzc0xpc3QuYWRkKFwiZHotZXJyb3JcIik7XG4gICAgICAgIH1cbiAgICB9KTtcbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/dropzoneinit.js\n");

/***/ }),

/***/ 1:
/*!********************************************!*\
  !*** multi ./resources/js/dropzoneinit.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /media/zlatan/DATA/Projects/blog-example/resources/js/dropzoneinit.js */"./resources/js/dropzoneinit.js");


/***/ })

/******/ });