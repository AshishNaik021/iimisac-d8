/**
 * @file
 * Provides JavaScript additions to the managed file field type.
 *
 * This file provides progress bar support (if available), popup windows for
 * file previews, and disabling of other file fields during Ajax uploads (which
 * prevents separate file fields from accidentally uploading files).
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Attach behaviors to the file fields passed in the settings.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches validation for file extensions.
   * @prop {Drupal~behaviorDetach} detach
   *   Detaches validation for file extensions.
   */
  Drupal.behaviors.fileValidateAutoAttach = {
    attach: function (context, settings) {
      var $context = $(context);
      var elements;

      function initFileValidation(selector) {
        $context.find(selector)
          .once('fileValidate')
          .on('change.fileValidate', {extensions: elements[selector]}, Drupal.file.validateExtension);
      }

      if (settings.file && settings.file.elements) {
        elements = settings.file.elements;
        Object.keys(elements).forEach(initFileValidation);
      }
    },
    detach: function (context, settings, trigger) {
      var $context = $(context);
      var elements;

      function removeFileValidation(selector) {
        $context.find(selector)
          .removeOnce('fileValidate')
          .off('change.fileValidate', Drupal.file.validateExtension);
      }

      if (trigger === 'unload' && settings.file && settings.file.elements) {
        elements = settings.file.elements;
        Object.keys(elements).forEach(removeFileValidation);
      }
    }
  };

  /**
   * Attach behaviors to file element auto upload.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches triggers for the upload button.
   * @prop {Drupal~behaviorDetach} detach
   *   Detaches auto file upload trigger.
   */
  Drupal.behaviors.fileAutoUpload = {
    attach: function (context) {
      $(context).find('input[type="file"]').once('auto-file-upload').on('change.autoFileUpload', Drupal.file.triggerUploadButton);
    },
    detach: function (context, setting, trigger) {
      if (trigger === 'unload') {
        $(context).find('input[type="file"]').removeOnce('auto-file-upload').off('.autoFileUpload');
      }
    }
  };

  /**
   * Attach behaviors to the file upload and remove buttons.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches form submit events.
   * @prop {Drupal~behaviorDetach} detach
   *   Detaches form submit events.
   */
  Drupal.behaviors.fileButtons = {
    attach: function (context) {
      var $context = $(context);
      $context.find('.js-form-submit').on('mousedown', Drupal.file.disableFields);
      $context.find('.js-form-managed-file .js-form-submit').on('mousedown', Drupal.file.progressBar);
    },
    detach: function (context) {
      var $context = $(context);
      $context.find('.js-form-submit').off('mousedown', Drupal.file.disableFields);
      $context.find('.js-form-managed-file .js-form-submit').off('mousedown', Drupal.file.progressBar);
    }
  };

  /**
   * Attach behaviors to links within managed file elements for preview windows.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches triggers.
   * @prop {Drupal~behaviorDetach} detach
   *   Detaches triggers.
   */
  Drupal.behaviors.filePreviewLinks = {
    attach: function (context) {
      $(context).find('div.js-form-managed-file .file a').on('click', Drupal.file.openInNewWindow);
    },
    detach: function (context) {
      $(context).find('div.js-form-managed-file .file a').off('click', Drupal.file.openInNewWindow);
    }
  };

  /**
   * File upload utility functions.
   *
   * @namespace
   */
  Drupal.file = Drupal.file || {

    /**
     * Client-side file input validation of file extensions.
     *
     * @name Drupal.file.validateExtension
     *
     * @param {jQuery.Event} event
     *   The event triggered. For example `change.fileValidate`.
     */
    validateExtension: function (event) {
      event.preventDefault();
      // Remove any previous errors.
      $('.file-upload-js-error').remove();

      // Add client side validation for the input[type=file].
      var extensionPattern = event.data.extensions.replace(/,\s*/g, '|');
      if (extensionPattern.length > 1 && this.value.length > 0) {
        var acceptableMatch = new RegExp('\\.(' + extensionPattern + ')$', 'gi');
        if (!acceptableMatch.test(this.value)) {
          var error = Drupal.t('The selected file %filename cannot be uploaded. Only files with the following extensions are allowed: %extensions.', {
            // According to the specifications of HTML5, a file upload control
            // should not reveal the real local path to the file that a user
            // has selected. Some web browsers implement this restriction by
            // replacing the local path with "C:\fakepath\", which can cause
            // confusion by leaving the user thinking perhaps Drupal could not
            // find the file because it messed up the file path. To avoid this
            // confusion, therefore, we strip out the bogus fakepath string.
            '%filename': this.value.replace('C:\\fakepath\\', ''),
            '%extensions': extensionPattern.replace(/\|/g, ', ')
          });
          $(this).closest('div.js-form-managed-file').prepend('<div class="messages messages--error file-upload-js-error" aria-live="polite">' + error + '</div>');
          this.value = '';
          // Cancel all other change event handlers.
          event.stopImmediatePropagation();
        }
      }
    },

    /**
     * Trigger the upload_button mouse event to auto-upload as a managed file.
     *
     * @name Drupal.file.triggerUploadButton
     *
     * @param {jQuery.Event} event
     *   The event triggered. For example `change.autoFileUpload`.
     */
    triggerUploadButton: function (event) {
      $(event.target).closest('.js-form-managed-file').find('.js-form-submit').trigger('mousedown');
    },

    /**
     * Prevent file uploads when using buttons not intended to upload.
     *
     * @name Drupal.file.disableFields
     *
     * @param {jQuery.Event} event
     *   The event triggered, most likely a `mousedown` event.
     */
    disableFields: function (event) {
      var $clickedButton = $(this).findOnce('ajax');

      // Only disable upload fields for Ajax buttons.
      if (!$clickedButton.length) {
        return;
      }

      // Check if we're working with an "Upload" button.
      var $enabledFields = [];
      if ($clickedButton.closest('div.js-form-managed-file').length > 0) {
        $enabledFields = $clickedButton.closest('div.js-form-managed-file').find('input.js-form-file');
      }

      // Temporarily disable upload fields other than the one we're currently
      // working with. Filter out fields that are already disabled so that they
      // do not get enabled when we re-enable these fields at the end of
      // behavior processing. Re-enable in a setTimeout set to a relatively
      // short amount of time (1 second). All the other mousedown handlers
      // (like Drupal's Ajax behaviors) are executed before any timeout
      // functions are called, so we don't have to worry about the fields being
      // re-enabled too soon. @todo If the previous sentence is true, why not
      // set the timeout to 0?
      var $fieldsToTemporarilyDisable = $('div.js-form-managed-file input.js-form-file').not($enabledFields).not(':disabled');
      $fieldsToTemporarilyDisable.prop('disabled', true);
      setTimeout(function () {
        $fieldsToTemporarilyDisable.prop('disabled', false);
      }, 1000);
    },

    /**
     * Add progress bar support if possible.
     *
     * @name Drupal.file.progressBar
     *
     * @param {jQuery.Event} event
     *   The event triggered, most likely a `mousedown` event.
     */
    progressBar: function (event) {
      var $clickedButton = $(this);
      var $progressId = $clickedButton.closest('div.js-form-managed-file').find('input.file-progress');
      if ($progressId.length) {
        var originalName = $progressId.attr('name');

        // Replace the name with the required identifier.
        $progressId.attr('name', originalName.match(/APC_UPLOAD_PROGRESS|UPLOAD_IDENTIFIER/)[0]);

        // Restore the original name after the upload begins.
        setTimeout(function () {
          $progressId.attr('name', originalName);
        }, 1000);
      }
      // Show the progress bar if the upload takes longer than half a second.
      setTimeout(function () {
        $clickedButton.closest('div.js-form-managed-file').find('div.ajax-progress-bar').slideDown();
      }, 500);
    },

    /**
     * Open links to files within forms in a new window.
     *
     * @name Drupal.file.openInNewWindow
     *
     * @param {jQuery.Event} event
     *   The event triggered, most likely a `click` event.
     */
    openInNewWindow: function (event) {
      event.preventDefault();
      $(this).attr('target', '_blank');
      window.open(this.href, 'filePreview', 'toolbar=0,scrollbars=1,location=1,statusbar=1,menubar=0,resizable=1,width=500,height=550');
    }
  };

})(jQuery, Drupal);
;
/**
 * @file
 * Responsive table functionality.
 */

(function ($, Drupal, window) {

  'use strict';

  /**
   * Attach the tableResponsive function to {@link Drupal.behaviors}.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.tableResponsive = {
    attach: function (context, settings) {
      var $tables = $(context).find('table.responsive-enabled').once('tableresponsive');
      if ($tables.length) {
        var il = $tables.length;
        for (var i = 0; i < il; i++) {
          TableResponsive.tables.push(new TableResponsive($tables[i]));
        }
      }
    }
  };

  /**
   * The TableResponsive object optimizes table presentation for screen size.
   *
   * A responsive table hides columns at small screen sizes, leaving the most
   * important columns visible to the end user. Users should not be prevented
   * from accessing all columns, however. This class adds a toggle to a table
   * with hidden columns that exposes the columns. Exposing the columns will
   * likely break layouts, but it provides the user with a means to access
   * data, which is a guiding principle of responsive design.
   *
   * @constructor Drupal.TableResponsive
   *
   * @param {HTMLElement} table
   */
  function TableResponsive(table) {
    this.table = table;
    this.$table = $(table);
    this.showText = Drupal.t('Show all columns');
    this.hideText = Drupal.t('Hide lower priority columns');
    // Store a reference to the header elements of the table so that the DOM is
    // traversed only once to find them.
    this.$headers = this.$table.find('th');
    // Add a link before the table for users to show or hide weight columns.
    this.$link = $('<button type="button" class="link tableresponsive-toggle"></button>')
      .attr('title', Drupal.t('Show table cells that were hidden to make the table fit within a small screen.'))
      .on('click', $.proxy(this, 'eventhandlerToggleColumns'));

    this.$table.before($('<div class="tableresponsive-toggle-columns"></div>').append(this.$link));

    // Attach a resize handler to the window.
    $(window)
      .on('resize.tableresponsive', $.proxy(this, 'eventhandlerEvaluateColumnVisibility'))
      .trigger('resize.tableresponsive');
  }

  /**
   * Extend the TableResponsive function with a list of managed tables.
   */
  $.extend(TableResponsive, /** @lends Drupal.TableResponsive */{

    /**
     * Store all created instances.
     *
     * @type {Array.<Drupal.TableResponsive>}
     */
    tables: []
  });

  /**
   * Associates an action link with the table that will show hidden columns.
   *
   * Columns are assumed to be hidden if their header has the class priority-low
   * or priority-medium.
   */
  $.extend(TableResponsive.prototype, /** @lends Drupal.TableResponsive# */{

    /**
     * @param {jQuery.Event} e
     */
    eventhandlerEvaluateColumnVisibility: function (e) {
      var pegged = parseInt(this.$link.data('pegged'), 10);
      var hiddenLength = this.$headers.filter('.priority-medium:hidden, .priority-low:hidden').length;
      // If the table has hidden columns, associate an action link with the
      // table to show the columns.
      if (hiddenLength > 0) {
        this.$link.show().text(this.showText);
      }
      // When the toggle is pegged, its presence is maintained because the user
      // has interacted with it. This is necessary to keep the link visible if
      // the user adjusts screen size and changes the visibility of columns.
      if (!pegged && hiddenLength === 0) {
        this.$link.hide().text(this.hideText);
      }
    },

    /**
     * Toggle the visibility of columns based on their priority.
     *
     * Columns are classed with either 'priority-low' or 'priority-medium'.
     *
     * @param {jQuery.Event} e
     */
    eventhandlerToggleColumns: function (e) {
      e.preventDefault();
      var self = this;
      var $hiddenHeaders = this.$headers.filter('.priority-medium:hidden, .priority-low:hidden');
      this.$revealedCells = this.$revealedCells || $();
      // Reveal hidden columns.
      if ($hiddenHeaders.length > 0) {
        $hiddenHeaders.each(function (index, element) {
          var $header = $(this);
          var position = $header.prevAll('th').length;
          self.$table.find('tbody tr').each(function () {
            var $cells = $(this).find('td').eq(position);
            $cells.show();
            // Keep track of the revealed cells, so they can be hidden later.
            self.$revealedCells = $().add(self.$revealedCells).add($cells);
          });
          $header.show();
          // Keep track of the revealed headers, so they can be hidden later.
          self.$revealedCells = $().add(self.$revealedCells).add($header);
        });
        this.$link.text(this.hideText).data('pegged', 1);
      }
      // Hide revealed columns.
      else {
        this.$revealedCells.hide();
        // Strip the 'display:none' declaration from the style attributes of
        // the table cells that .hide() added.
        this.$revealedCells.each(function (index, element) {
          var $cell = $(this);
          var properties = $cell.attr('style').split(';');
          var newProps = [];
          // The hide method adds display none to the element. The element
          // should be returned to the same state it was in before the columns
          // were revealed, so it is necessary to remove the display none value
          // from the style attribute.
          var match = /^display\s*\:\s*none$/;
          for (var i = 0; i < properties.length; i++) {
            var prop = properties[i];
            prop.trim();
            // Find the display:none property and remove it.
            var isDisplayNone = match.exec(prop);
            if (isDisplayNone) {
              continue;
            }
            newProps.push(prop);
          }
          // Return the rest of the style attribute values to the element.
          $cell.attr('style', newProps.join(';'));
        });
        this.$link.text(this.showText).data('pegged', 0);
        // Refresh the toggle link.
        $(window).trigger('resize.tableresponsive');
      }
    }
  });

  // Make the TableResponsive object available in the Drupal namespace.
  Drupal.TableResponsive = TableResponsive;

})(jQuery, Drupal, window);
;
