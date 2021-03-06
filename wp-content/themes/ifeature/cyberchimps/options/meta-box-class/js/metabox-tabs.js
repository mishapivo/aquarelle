jQuery(document).ready(function(e) {
    var b = function(i) {
        var g = e("#" + i);

        function h(k) {
            var l = k.find("#values");
            var m = "";
            k.find(".right-list .list-items span").each(function() {
                m += '<input type="hidden" name="' + i + '[]" value="' + e(this).data("key") + '" />'
            });
            l.html(m);
            g.find(".right-list .action").show();
            g.find(".left-list .action").hide();
            var j = k.find("input[class='section-order-tracker']");
            var m = [];
            k.find(".right-list .list-items span").each(function() {
                m.push(e(this).data("key"))
            });
            j.val(m.join(",")).change();
            e(".right-list .action").show();
            e(".left-list .action").hide()
        }
        g.find(".left-list .list-items").delegate(".action", "click", function() {
            var j = e(this).closest(".list-item");
            e(this).closest(".section-order").children(".right-list").children(".list-items").append(j);
            h(e(this).closest(".section-order"))
        });
        g.find(".right-list .list-items").delegate(".action", "click", function() {
            var j = e(this).closest(".list-item");
            e(this).val("Add");
            e(this).closest(".section-order").children(".left-list").children(".list-items").append(j);
            e(this).hide();
            h(e(this).closest(".section-order"))
        });
        g.find(".right-list .list-items").sortable({
            update: function() {
                h(e(this).closest(".section-order"))
            },
            connectWith: "#" + i + " .left-list .list-items",
            placeholder: "sortable-placeholder"
        });
        g.find(".left-list .list-items").sortable({
            connectWith: "#" + i + " .right-list .list-items",
            placeholder: "sortable-placeholder"
        });
        h(g)
    };
    e(".section-order").each(function() {
        b(e(this).attr("id"))
    });
    jQuery("#publish").click(function() {
        return (a() && f() && d() && c())
    });
    jQuery("#cyberchimps_portfolio_link_url_one").blur(function() {
        return a()
    });
    jQuery("#cyberchimps_portfolio_link_url_two").blur(function() {
        return f()
    });
    jQuery("#cyberchimps_portfolio_link_url_three").blur(function() {
        return d()
    });
    jQuery("#cyberchimps_portfolio_link_url_four").blur(function() {
        return c()
    });

    function a() {
        if (jQuery("#checkbox-cyberchimps_portfolio_link_toggle_one").is(":checked")) {
            jQuery("tr.cyberchimps_portfolio_link_url_one td").append("<lable class='validation_error' id='url_validation_msg1'></lable>");
            var g = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
            var h = jQuery("#cyberchimps_portfolio_link_url_one").val();
            if ((h.search(g)) == -1 || h == "") {
                jQuery("#url_validation_msg1").html("Please enter a valid URL");
                alert("Please enter a valid URL for Portfolio Lite Options");
                return false
            } else {
                jQuery("#url_validation_msg1").html("")
            }
        }
        return true
    }

    function f() {
        if (jQuery("#checkbox-cyberchimps_portfolio_link_toggle_two").is(":checked")) {
            jQuery("tr.cyberchimps_portfolio_link_url_two td").append("<lable class='validation_error' id='url_validation_msg2'></lable>");
            var g = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
            var h = jQuery("#cyberchimps_portfolio_link_url_two").val();
            if ((h.search(g)) == -1 || h == "") {
                jQuery("#url_validation_msg2").html("Please enter a valid URL");
                alert("Please enter a valid URL for Portfolio Lite Options");
                return false
            } else {
                jQuery("#url_validation_msg2").html("")
            }
        }
        return true
    }

    function d() {
        if (jQuery("#checkbox-cyberchimps_portfolio_link_toggle_three").is(":checked")) {
            jQuery("tr.cyberchimps_portfolio_link_url_three td").append("<lable class='validation_error' id='url_validation_msg3'></lable>");
            var g = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
            var h = jQuery("#cyberchimps_portfolio_link_url_three").val();
            if ((h.search(g)) == -1 || h == "") {
                jQuery("#url_validation_msg3").html("Please enter a valid URL");
                alert("Please enter a valid URL for Portfolio Lite Options");
                return false
            } else {
                jQuery("#url_validation_msg3").html("")
            }
        }
        return true
    }

    function c() {
        if (jQuery("#checkbox-cyberchimps_portfolio_link_toggle_four").is(":checked")) {
            jQuery("tr.cyberchimps_portfolio_link_url_four td").append("<lable class='validation_error' id='url_validation_msg4'></lable>");
            var g = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
            var h = jQuery("#cyberchimps_portfolio_link_url_four").val();
            if ((h.search(g)) == -1 || h == "") {
                jQuery("#url_validation_msg4").html("Please enter a valid URL");
                alert("Please enter a valid URL for Portfolio Lite Options");
                return false
            } else {
                jQuery("#url_validation_msg4").html("")
            }
        }
        return true
    }
});
jQuery(document).ready(function(b) {
    var a = Array;
    b("#cyberchimps_page_section_order .list-item span").each(function(c) {
        a[c] = b(this).data("key")
    });
    b(".section-order-tracker").change(function() {
        var c = b(this).val().split(",");
        b.each(a, function(d, e) {
            if (b.inArray(e, c) != -1) {
				b("#" + e + "_options").removeClass("display_none")
                b("#" + e + "_options").insertAfter("#cyberchimps_page_options");
                b("#" + e + "_options").show(function() {
                    b(this).addClass("closed")
                })
            } else {
                b("#" + e + "_options").addClass("display_none")
            }
        })
    }).change();
    b(".image-select").each(function() {
        b(this).find("img").click(function() {
            if (b(this).hasClass("selected")) {
                return
            }
            b(this).siblings("img").removeClass("selected");
            b(this).addClass("selected");
            b(this).siblings("input").val(b(this).data("key"))
        });
        if (b(this).find("img.selected").length) {
            b(this).find("input").val(b(this).find("img.selected").data("key"))
        }
    });
    b(".checkbox, .checkbox-toggle").after(function() {
        if (b(this).is(":checked")) {
            return "<a href='#' class='toggle checked' ref='" + b(this).attr("id") + "'></a>"
        } else {
            return "<a href='#' class='toggle' ref='" + b(this).attr("id") + "'></a>"
        }
    });
    b(".toggle").click(function(d) {
        var f = b(this).attr("ref");
        var c = b("#" + f);
        if (c.is(":checked")) {
            c.removeAttr("checked").change()
        } else {
            c.attr("checked", "checked").change()
        }
        b(this).toggleClass("checked");
        d.preventDefault()
    })
});
(function(b) {
    var a = function(d) {
        var e = d.data.id;
        var c = b("#" + e).is(":checked");
        b("." + e + "-toggle-container").each(function() {
            if (b("#" + e).is(":checked")) {
                b("." + e + "-toggle-container").show()
            } else {
                b("." + e + "-toggle-container").hide()
            }
        })
    };
    b(".at-field .checkbox-toggle").each(function() {
        b(this).on("change", {
            id: b(this).attr("id")
        }, a)
    }).change()
})(jQuery);
(function(b) {
    var a = function(d, c) {
        b.each(d, function(e, f) {
            b("." + f + "-select-container").hide()
        });
        b("." + c + "-select-container").show()
    };
    b(".at-field .select-hide").each(function() {
        b(this).on("change", function() {
            var d = Array;
            var c = "";
            b(this).children("option").each(function(e) {
                if (b(this).is(":selected")) {
                    c += b(this).val()
                } else {
                    d[e] = b(this).val()
                }
            });
            a(d, c)
        }).change()
    })
})(jQuery);
