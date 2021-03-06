jQuery(document).ready(function ($) {
    // Show/hide the images caption option
    $('#gallery_lightbox').on('change', function () {
        if (this.checked) {
            $('#gallery_lightbox_caption_wrapper').removeClass('hidden-item');
        } else {
            $('#gallery_lightbox_caption_wrapper').addClass('hidden-item');
        }
    });

    if ($('#gallery_lightbox').is(':checked')) {
        $('#gallery_lightbox_caption_wrapper').removeClass('hidden-item');
    }

    // Show/hide blocks spacing option
    $('#enable_blocks_spacing').on('change', function () {
        if (this.checked) {
            $('#blocks_spacing_wrapper').removeClass('hidden-item');
        } else {
            $('#blocks_spacing_wrapper').addClass('hidden-item');
        }
    });

    if ($('#enable_blocks_spacing').is(':checked')) {
        $('#blocks_spacing_wrapper').removeClass('hidden-item');
    }

    $('#settings .ju-top-tabs .tab a').click(function () {
        var currentText = $(this).text().trim();
        $('#settings .advgb-settings-header').text(currentText);
    });

    $('.advgb_qtip').qtip({
        content: {
            attr: 'data-qtip'
        },
        position: {
            my: 'top left',
            at: 'bottom bottom'
        },
        style: {
            tip: {
                corner: true
            },
            classes: 'advgb_qtip'
        },
        show: 'hover',
        hide: {
            fixed: true,
            delay: 10
        }
    });

    $('.minicolors-input').minicolors('settings', {
        change: function() {
            jQuery(this).trigger('change');
        },
        hide: function () {
            saveCustomStyleChanges();
        }
    }).attr('maxlength', '7');

    // Function for Custom Style tab
    initCustomStyleMenu();

    function initCustomStyleMenu() {
        // Add new custom style
        (initCustomStyleNew = function () {
            $('#mybootstrap a.advgb-customstyles-new').unbind('click').click(function (e) {
                that = this;
                var nonce_val = $('#advgb_settings_nonce_field').val();

                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'advgb_custom_styles_ajax',
                        task: 'new',
                        nonce: nonce_val
                    },
                    success: function (res, stt) {
                        if (stt === 'success') {
                            $(that).parent().before('<li class="advgb-customstyles-items" data-id-customstyle="' + res.id + '"><a><i class="title-icon"></i> <span class="advgb-customstyles-items-title">' + res.title + '</span></a><a class="copy"><i class="mi mi-content-copy"></i></a><a class="trash"><i class="mi mi-delete"></i></a><a class="edit"><i class="mi mi-edit"></i></a><ul style="margin-left: 30px"><li class="advgb-customstyles-items-class">('+ res.name +')</li></ul></li>');
                            initCustomStyleMenu();
                        } else {
                            alert(stt);
                        }
                    },
                    error: function(jqxhr, textStatus, error) {
                        alert(textStatus + " : " + error + ' - ' + jqxhr.responseJSON);
                    }
                });
                return false;
            })
        })();

        // Delete custom style
        (initCustomStyleDelete = function () {
            $('#mybootstrap .advgb-customstyles-items a.trash').unbind('click').click(function (e) {
                that = this;
                var cf = confirm('Do you really want to delete "' + $(this).prev().prev().text().trim() + '"?');
                if (cf === true) {
                    var id = $(that).parent().data('id-customstyle');
                    var nonce_val = $('#advgb_settings_nonce_field').val();

                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'advgb_custom_styles_ajax',
                            id: id,
                            task: 'delete',
                            nonce: nonce_val
                        },
                        success: function (res, stt) {
                            if (stt === 'success') {
                                $(that).parent().remove();
                                if (res.id == myStyleId) {
                                    customStylePreview();
                                } else {
                                    customStylePreview(myStyleId);
                                }
                            } else {
                                alert(stt);
                            }
                        },
                        error: function(jqxhr, textStatus, error) {
                            alert(textStatus + " : " + error + ' - ' + jqxhr.responseJSON);
                        }
                    });
                    return false;
                }
            })
        })();

        // Copy custom style
        (initCustomStyleCopy = function () {
            $('#mybootstrap .advgb-customstyles-items a.copy').unbind('click').click(function (e) {
                that = this;
                var id = $(that).parent().data('id-customstyle');
                var nonce_val = $('#advgb_settings_nonce_field').val();

                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'advgb_custom_styles_ajax',
                        id: id,
                        task: 'copy',
                        nonce: nonce_val
                    },
                    success: function (res, stt) {
                        if (stt === 'success') {
                            $(that).parents('.advgb-customstyles-list').find('li').last().before('<li class="advgb-customstyles-items" data-id-customstyle="' + res.id + '"><a><i class="title-icon" style="background-color: '+res.identifyColor+'"></i> <span class="advgb-customstyles-items-title">' + res.title + '</span></a><a class="copy"><i class="mi mi-content-copy"></i></a><a class="trash"><i class="mi mi-delete"></i></a><a class="edit"><i class="mi mi-edit"></i></a><ul style="margin-left: 30px"><li class="advgb-customstyles-items-class">('+ res.name +')</li></ul></li>');
                            initCustomStyleMenu();
                        } else {
                            alert(stt);
                        }
                    },
                    error: function(jqxhr, textStatus, error) {
                        alert(textStatus + " : " + error + ' - ' + jqxhr.responseJSON);
                    }
                });
                return false;
            })
        })();

        (initCustomStyleEdit = function () {
            $('#mybootstrap .advgb-customstyles-items a.edit').unbind('click').click(function (e) {
                e.stopPropagation();
                $this = this;
                link = $(this).parent().find('a span.advgb-customstyles-items-title');
                oldTitle = link.text().trim();
                $(link).attr('contentEditable', true);
                $(link).addClass('editable');
                $(link).selectText();

                $('#mybootstrap a span.editable').bind('click.mm', hstop);  // Click on the editable objects
                $(link).bind('keypress.mm', hpress);                        // Press enter to validate name
                $('*').not($(link)).bind('click.mm', houtside);             // Click outside the editable objects
                $(link).keyup(function (e) {
                    // Press ESC key will cancel renaming action
                    if (e.which === 27) {
                        e.preventDefault();
                        unbindall();
                        $(link).text(oldTitle);
                        $(link).removeAttr('contentEditable');
                        $(link).removeClass('editable');
                    }
                });

                function unbindall() {
                    $('#mybootstrap a span.editable').unbind('click.mm', hstop);       // Click on the editable objects
                    $(link).unbind('keypress.mm', hpress);                    // Press enter to validate name
                    $('*').not($(link)).unbind('click.mm', houtside);         // Click outside the editable objects
                }

                // Click on the editable objects
                function hstop(e) {
                    e.stopPropagation();
                    return false;
                }

                // Press enter to validate name
                function hpress(e) {
                    if (e.which === 13) {
                        e.preventDefault();
                        unbindall();
                        updateName($(link).text());
                        $(link).removeAttr('contentEditable');
                        $(link).removeClass('editable');
                    }
                }

                // Click outside the editable objects
                function houtside(e) {
                    unbindall();
                    updateName($(link).text());
                    $(link).removeAttr('contentEditable');
                    $(link).removeClass('editable');
                }

                function updateName(title) {
                    var nonce_val = $('#advgb_settings_nonce_field').val();
                    var id = $(link).parents('li').data('id-customstyle');
                    title = title.trim();
                    if (title !== '') {
                        $.ajax({
                            url: ajaxurl,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                action: 'advgb_custom_styles_ajax',
                                nonce: nonce_val,
                                id: id,
                                task: 'edit',
                                title: title
                            },
                            success: function (res, stt) {
                                if (stt === 'success') {
                                    $(link).text(res.title);

                                    if (typeof autosaveNotification !== "undefined") {
                                        clearTimeout(autosaveNotification);
                                    }

                                    autosaveNotification = setTimeout(function() {
                                        $('#savedInfo').fadeIn(200).delay(2000).fadeOut(1000);
                                    }, 500);
                                } else {
                                    $(link).text(oldTitle);
                                    alert(stt);
                                }
                            },
                            error: function(jqxhr, textStatus, error) {
                                $(link).text(oldTitle);
                                alert(textStatus + " : " + error);
                            }
                        })
                    } else {
                        $(link).text(oldTitle);
                        return false;
                    }

                    $(link).parent().css('white-space', 'normal');
                    setTimeout(function() {
                        $(link).parent().css('white-space', '');
                    }, 200);
                }
            })
        })();

        // Choose custom style
        (initTableLinks = function () {
            $('#mybootstrap .advgb-customstyles-items').unbind('click').click(function (e) {
                id = $(this).data('id-customstyle');
                $('#mybootstrap .advgb-customstyles-list li').removeClass('active');
                $(this).addClass('active');
                customStylePreview(id);

                return false;
            })
        })();

        // Function to select text when clicking edit
        $.fn.selectText = function(){
            var doc = document        , element = this[0]        , range, selection    ;
            if (doc.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }
            element.focus();
        };
    }

    // Add Codemirror
    var myCssArea, myEditor, myCustomCss, myStyleId;
    myCssArea = document.getElementById('advgb-customstyles-css');
    myEditor = CodeMirror.fromTextArea(myCssArea, {
        mode: 'css',
        lineNumbers: true,
        extraKeys: {"Ctrl-Space": "autocomplete"}
    });

    $(myCssArea).on('change', function() {
        myEditor.setValue($(myCssArea).val());
    });

    myEditor.on("blur", function() {
        myEditor.save();
        $(myCssArea).trigger('propertychange');

    });

    // Fix Codemirror not displayed properly
    $('a[href="#custom-styles"]').one('click', function () {
        myEditor.refresh();
        customStylePreview();
    });

    customStylePreview();
    function customStylePreview(id_element) {
        if (typeof (id_element) === "undefined") {
            id_element = $('#mybootstrap ul.advgb-customstyles-list li:first-child').data('id-customstyle');
            $('#mybootstrap ul.advgb-customstyles-list li:first-child').addClass('active');
        }
        if (typeof (id_element) === "undefined" || id_element ==="") return;
        var nonce_val = $('#advgb_settings_nonce_field').val();
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'advgb_custom_styles_ajax',
                id: id_element,
                task: 'preview',
                nonce: nonce_val
            },
            success: function (res, stt) {
                if (stt === 'success') {
                    $('#advgb-customstyles-title').val(res.title);
                    $('#advgb-customstyles-classname').val(res.name);
                    $('#advgb-customstyles-identify-color').minicolors('value', res.identifyColor);

                    myStyleId = id_element;
                    myCustomCss = '{\n' + res.css + '\n}';

                    var previewTarget = $(".advgb-customstyles-target");
                    previewTarget.attr('style','');

                    if (typeof(myCustomCss) !== 'undefined' || myCustomCss !== '') {
                        $('#advgb-customstyles-css').val(myCustomCss);
                    } else {
                        $('#advgb-customstyles-css').val('');
                    }
                    myEditor.setValue(myCustomCss);
                    parseCustomStyleCss();
                } else {
                    alert(stt);
                }
            },
            error: function(jqxhr, textStatus, error) {
                alert(textStatus + " : " + error + ' - ' + jqxhr.responseJSON);
            }
        })
    }

    String.prototype.replaceAll = function(search, replace) {
        if (replace === undefined) {
            return this.toString();
        }
        return this.split(search).join(replace);
    };

    // Parse custom style text to css for preview
    function parseCustomStyleCss() {
        var previewTarget = $("#advgb-customstyles-preview .advgb-customstyles-target");
        var parser = new (less.Parser);
        var content = '#advgb-customstyles-preview .advgb-customstyles-target ' + myEditor.getValue();
        parser.parse(content, function(err, tree) {
            if (err) {
                // Show error to the user
                if (err.message == 'Unrecognised input') {
                    err.message = configData.message;
                }
                alert(err.message);
                return false;
            } else {
                cssString = tree.toCSS().replace("#advgb-customstyles-preview .advgb-customstyles-target {","");
                cssString = cssString.replace("}","").trim();
                cssString = cssString.replaceAll("  ", "");
                myCustomCss = cssString;

                previewTarget.removeAttr('style');

                var attributes = cssString.split(';');
                for(var i=0; i<attributes.length; i++) {
                    if( attributes[i].indexOf(":") > -1) {
                        var entry = attributes[i].split(/:(.+)/);
                        previewTarget.css( jQuery.trim(""+entry[0]+""), jQuery.trim(entry[1]) );
                    }
                }

                return true;
            }
        })
    }

    // Bind event to preview custom style after changed css text
    (initCustomCssObserver = function () {
        var cssChangeWait;
        $('#advgb-customstyles-css').bind('input propertychange', function() {
            clearTimeout(cssChangeWait);
            cssChangeWait = setTimeout(function() {
                parseCustomStyleCss();
                saveCustomStyleChanges();
            }, 500);
        });
    })();

    $('#advgb-customstyles-title, #advgb-customstyles-classname').on('keypress', function (e) {
        if (e.which === 13) {
            e.preventDefault();
            saveCustomStyleChanges();
        }
    });
    $('#advgb-customstyles-title, #advgb-customstyles-classname').on('change', function (e) {
        saveCustomStyleChanges();
    });

    // Save custome style
    function saveCustomStyleChanges() {
        var myClassname =  $('#advgb-customstyles-classname').val().trim();
        var myIdentifyColor =  $('#advgb-customstyles-identify-color').val().trim();
        var nonce_val = $('#advgb_settings_nonce_field').val();

        $('#save_custom_styles').prop('disabled', true).removeClass('waves-effect');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'advgb_custom_styles_ajax',
                id: myStyleId,
                name: myClassname,
                mycss: myCustomCss,
                mycolor: myIdentifyColor,
                task: 'style_save',
                nonce: nonce_val
            },
            success: function (res, stt) {
                if (stt === 'success') {
                    // Update list items
                    thisStyle = $('.advgb-customstyles-list').find('li[data-id-customstyle='+myStyleId+']');
                    thisStyle.find('.advgb-customstyles-items-class').text('('+myClassname+')');

                    autosaveNotification = setTimeout(function() {
                        $('#savedInfo').fadeIn(200).delay(2000).fadeOut(1000);
                    }, 500);
                } else {
                    alert(stt)
                }

                $('#save_custom_styles').prop('disabled', false).addClass('waves-effect');
            },
            error: function(jqxhr, textStatus, error) {
                alert(textStatus + " : " + error + ' - ' + jqxhr.responseJSON);
                $('#save_custom_styles').prop('disabled', false).addClass('waves-effect');
            }
        })
    }

    // Search block in blocks config tab
    $('.blocks-config-search').on('input', function () {
        var searchKey = $(this).val().trim().toLowerCase();

        $('.blocks-config-list .block-config-item .block-title').each(function () {
            var blockTitle = $(this).text().trim().toLowerCase();

            if (blockTitle.indexOf(searchKey) > -1) {
                $(this).closest('.block-config-item').show();
            } else {
                $(this).closest('.block-config-item').hide();
            }
        })
    });

    initBlockConfigButton();
});

function initBlockConfigButton() {
    var $ = jQuery;
    // Open the block config modal
    $('.blocks-config-list .block-config-item .block-config-button').unbind('click').click(function () {
        var blockName = $(this).data('block');
        blockName = blockName.replace('/', '-');
        var blockLabel = $(this).closest('.block-config-item').find('.block-title').text().trim();
        window.blockLabel = blockLabel;

        tb_show('Edit block ' + blockLabel + ' default config', 'admin.php?page=' + blockName + '&noheader=1&width=550&height=600&TB_iframe=1');
    })
}