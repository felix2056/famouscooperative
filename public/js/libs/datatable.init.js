/******/ (() => { // webpackBootstrap
  var __webpack_exports__ = {};
  /*!**********************************************!*\
    !*** ./resources/js/pages/datatable.init.js ***!
    \**********************************************/
  // Datatable
  if ($('.datatable').length > 0) {
    $('.datatable').DataTable({
      "bFilter": false
    });
  }

  // Advanced Datatable
  if ($('.datatable-advanced').length > 0) {
   $('.datatable-advanced').DataTable({
      "dom": 'Bfrtip',
    });
  }
  /******/
})();