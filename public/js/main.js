// Custom Javascript
/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------
 *
 *  # Template JS core
 *
 *  Includes minimum required JS code for proper template functioning
 *
 * ---------------------------------------------------------------------------- */

// Setup module
// ------------------------------

var Custom = (function () {
    //
    // Setup module components
    //
    var confirmation = false;

    //  dynamic bootstrap 4 model
    var _dynamicModal = function () {
        $(document).on("click", ".dynamicModal", function (e) {
            // prevent the default functionality
            e.preventDefault();

            // Object instance
            $this = $(this);

            // initialize variable
            var url = $this.hasAttr("data-ajax-url")
                    ? $this.data("ajax-url")
                    : $this.attr("href"),
                responseShow = $this.hasAttr("data-ajax-response-show")
                    ? $this.data("ajax-response-show")
                    : "#dynamicModal",
                data = $this.hasAttr("data-ajax-data")
                    ? $this.data("ajax-data")
                    : null,
                type = $this.hasAttr("data-ajax-type")
                    ? $this.data("ajax-type")
                    : "GET",
                trigger = $this.hasAttr("data-ajax-trigger")
                    ? $this.data("ajax-trigger")
                    : "html";

            // set modal directions
            $this.hasAttr("data-modal-direction")
                ? $("#dynamicModal").addClass($this.data("modal-direction"))
                : $("#dynamicModal").addClass("right");

            if ($this.data("template")) {
                $("#dynamicModal")
                    .html(
                        "<div class='modal-dialog'>" +
                            "<div class='modal-content'>" +
                            "<div class='modal-header bg-light'>" +
                            "	<h5 class='modal-title'>" +
                            $this.data("modal-title") +
                            "</h5>" +
                            "	<a href='javascript:void(0)' class='close' data-dismiss='modal'>&times;</a>" +
                            "</div>" +
                            "<div class='modal-body'>" +
                            "	<p>" +
                            $this.data("modal-body") +
                            "	</p>" +
                            "</div>" +
                            "<div class='modal-footer bg-solitude'>" +
                            "	<button type='button' class='btn btn-danger px-5 text-xs' data-dismiss='modal'>Close</button>" +
                            "</div>" +
                            "</div>" +
                            "</div>"
                    )
                    .modal("show");
            } else {
                $.ajax({
                    type: type,
                    url: url,
                    data: data,
                    success: function (response) {
                        console.log(response);
                        // Append response
                        if (trigger == "append")
                            $(responseShow).append(response);
                        else if (trigger == "prepend")
                            $(responseShow).prepend(response);
                        else $(responseShow).html(response);

                        // show the modal
                        $("#dynamicModal").modal("show");

                        // initialize validation
                        Custom.initFvFormValidation();
                        Custom.initToolTip();
                    },
                });
            }
        });

        //  empty modal while modal close
        $("#dynamicModal").on("hidden.bs.modal", function (e) {
            // do something...
            $(this).html("");
        });
    };

    /**
     * Intialize ajax functionality
     */
    var _customizeAjax = function () {
        $(document).on("click", "[data-ajax=true]", function (e) {
            e.preventDefault();
            // current object instance
            $this = $(this);

            // initialize variable
            var url = $this.hasAttr("data-ajax-url")
                    ? $this.data("ajax-url")
                    : $this.attr("href"),
                responseShow = $this.hasAttr("data-ajax-response-show")
                    ? $this.data("ajax-response-show")
                    : "#response-container",
                data = $this.hasAttr("data-ajax-data")
                    ? $this.data("ajax-data")
                    : null,
                type = $this.hasAttr("data-ajax-type")
                    ? $this.data("ajax-type")
                    : "GET",
                trigger = $this.hasAttr("data-ajax-trigger")
                    ? $this.data("ajax-trigger")
                    : "html";

            if (
                typeof $this.attr("data-add-class") !== typeof undefined &&
                $this.attr("data-add-class") !== false
            ) {
                $($this.data("container")).removeClass($this.data("add-class"));
                $this.addClass($this.data("add-class"));
            }

            $.ajax({
                type: type,
                url: url,
                data: data,
                success: function (response) {
                    if (trigger == "append") $(responseShow).append(response);
                    else if (trigger == "prepend")
                        $(responseShow).prepend(response);
                    else $(responseShow).html(response);

                    // initialize validation
                    Custom.initFvFormValidation();
                },
            });
        });
    };

    var _ckEditor = function () {
        if ($(".ck_editor").length > 0) {
            $(".ck_editor").each(function (i, v) {
                ClassicEditor.create(v)
                    .then((editor) => {
                        console.log(editor);
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            });
        }
    };

    var _checkHasAttr = function () {
        // Custom function
        $.fn.hasAttr = function (name) {
            return this.attr(name) !== undefined;
        };
    };

    /**
     * Formvalidation.io  On demand validation
     */
    var _fv_form_validation = function () {
        $(".fv-form", document).formValidation({
            message: "This field is required and cannot be empty",
            excluded: ":disabled",
        });
    };

    var _dataTable = function () {
        $(".dataTable", document).dataTableAddOn();
    };

    /***
     *
     *  bootstrap 4 tooltip
     */
    var _tooltip = function () {
        // tooltip
        $('[data-toggle="tooltip"]', document).tooltip({
            container: "body",
        });
    };

    var _popover = function () {
        // tooltip
        $('[data-toggle="popover"]', document).popover({
            container: "body",
        });
    };

    /**
     * select2 component
     */
    var _select2_component = function () {
        // Allow clear selection
        //$('.select2', document).select2();
    };

    // confirmation popup
    var _confirmation = function () {
        $(".confirmation").bind("click submit", function (e) {
            _this = $(this);
            if (!confirmation) {
                e.preventDefault();
                bootbox.confirm({
                    message: "Please confirm before proceed.",
                    centerVertical: true,
                    buttons: {
                        confirm: {
                            label: "Confirm",
                            className: "btn-success btn-xs",
                        },
                        cancel: {
                            label: "Cancel",
                            className: "btn-danger btn-xs",
                        },
                    },
                    callback: function (result) {
                        if (result) {
                            confirmation = true;
                            if (_this[0].nodeName == "FORM") {
                                _this.submit();
                            } else {
                                _this.click();
                            }
                        }
                    },
                });
            }
        });
    };

    //
    // Return objects assigned to module
    //

    return {
        initDynamicModal: function () {
            _dynamicModal();
        },
        initCustomizeAjax: function () {
            _customizeAjax();
        },
        initCkEditor: function () {
            _ckEditor();
        },
        initHasAttr: function () {
            _checkHasAttr();
        },
        initFvFormValidation: function () {
            _fv_form_validation();
        },
        initToolTip: function () {
            _tooltip();
        },
        initPopOver: function () {
            _popover();
        },
        initSelect2Component: function () {
            _select2_component();
        },
        initDataTable: function () {
            _dataTable();
        },
        initConfirmation: function () {
            _confirmation();
        },
        // Initialize core
        initCore: function () {
            Custom.initDynamicModal();
            Custom.initCustomizeAjax();
            Custom.initHasAttr();
            Custom.initCkEditor();
            Custom.initFvFormValidation();
            Custom.initToolTip();
            Custom.initSelect2Component();
            Custom.initDataTable();
            Custom.initPopOver();
            Custom.initConfirmation();
        },
    };
})();

// Initialize module
// ------------------------------

// When content is loaded
document.addEventListener("DOMContentLoaded", function () {
    Custom.initCore();
});

// When page is fully loaded
window.addEventListener("load", function () {
    //App.initAfterLoad();
});
