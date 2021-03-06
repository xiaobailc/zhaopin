/**
 * 验证js
 */
function cloud_animate(e, t) {
    $("#" + e).animate({
        marginLeft: parseInt($("#" + e).css("marginLeft")) + 30 * t
    },
    cloud_time,
    function() {
        cloud_animate(e, -t)
    })
}
function placeholderFn() {
    if (!placeholderSupport()) $("[placeholder]").focus(function() {
        var e = $(this);
        if (e.val() == e.attr("placeholder")) e.val(""),
        e.removeClass("placeholder")
    }).blur(function() {
        var e = $(this);
        if ("" == e.val() || e.val() == e.attr("placeholder")) e.addClass("placeholder"),
        e.val(e.attr("placeholder"))
    }).blur();
    if ("" === $("[placeholder]").value) $("[placeholder]").value = $("[placeholder]").attr("placeholder")
}
function placeholderSupport() {
    return "placeholder" in document.createElement("input")
}
var cloud_time = 2e3,
jsoncallback = function(e) {
    alert("调用"),
    alert(e),
    console.log(e)
};
$(function() {
    function e() {
        function e() {
            $("#beError").text("").hide()
        }
        var t = document.getElementById("password");
        if (!1) t.onpropertychange = e;
        else if (!$.support.leadingWhitespace) t.attachEvent("input", e, !1);
        else t.addEventListener("input", e, !1)
    }
    $("#email,#password").focus(function() {
        $("#beError").text("").hide()
    }),
    e(),
    $("#loginForm").validate({
        rules: {
            email: {
                required: !0,
                email: !0,
                maxlength: 100
            },
            password: {
                required: !0,
                rangelength: [6, 16]
            }
        },
        messages: {
            email: {
                required: "请输入登录邮箱地址",
                email: "请输入有效的邮箱地址，如：vivi@lagou.com",
                maxlength: "请输入100字以内的邮箱地址"
            },
            password: {
                required: "请输入密码",
                rangelength: "请输入6-16位密码，字母区分大小写"
            }
        },
        submitHandler: function(e) {
            if ($("#remember").prop("checked")) $("#remember").val(1);
            else $("#remember").val(null);
            var t = $("#email").val(),
            n = $("#password").val(),
            i = $("#remember").val(),
            r = void 0 == i || null == i ? !1 : 1 == i ? !0 : !1;
            $(e).find(":submit").attr("disabled", !0),
            $.ajax({
                type: "POST",
                data: {
                    username: t,
                    password: n,
                    rememberMe: r
                },
                url: ctx + "/login/login.json",
                dataType: "json"
            }).done(function(t) {
                if (1 == t.state) {
                    var n = "/grantServiceTicket/grant.html";
                    window.location.href = n
                } else if (240 == t.state) $("#beError").text("请输入常用邮箱地址").show();
                else if (210 == t.state) $("#beError").text("请输入100字以内的邮箱地址").show();
                else if (220 == t.state) $("#beError").text("请输入有效的邮箱地址，如：vivi@lagou.com").show();
                else if (241 == t.state) $("#beError").text("请输入密码").show();
                else if (211 == t.state) $("#beError").text("请输入6-16位密码，字母区分大小写").show();
                else if (400 == t.state) $("#beError").text("该帐号不存在或密码错误，请重新输入").show();
                else if (401 == t.state) $("#beError").text("登录失败，该帐号已被禁用").show();
                else if (500 == t.state) $("#beError").text("登录失败,系统内部异常").show();
                else if (299 == t.state) $("#beError").text("你的操作太过频繁，请稍后再试").show();
                else $("#beError").text("网络异常，请刷新重试").show();
                $(e).find(":submit").attr("disabled", !1)
            })
        }
    })
}),
$(document).ready(function() {
    $(".register_radio li input").click(function() {
        $(this).parent("li").addClass("current").append("<em></em>").siblings().removeClass("current").find("em").remove()
    }),
    $("#email").focus(function() {
        $("#beError").hide()
    }),
    $("#registerForm").validate({
        rules: {
            type: {
                required: !0
            },
            email: {
                required: !0,
                email: !0,
                maxlength: 100
            },
            password: {
                required: !0,
                rangelength: [6, 16]
            },
            checkbox: {
                required: !0
            }
        },
        messages: {
            type: {
                required: "请选择使用拉勾的目的"
            },
            email: {
                required: "请输入常用邮箱地址",
                email: "请输入有效的邮箱地址，如：vivi@lagou.com",
                maxlength: "请输入100字以内的邮箱地址"
            },
            password: {
                required: "请输入密码",
                rangelength: "请输入6-16位密码，字母区分大小写"
            },
            checkbox: {
                required: "请接受拉勾用户协议"
            }
        },
        errorPlacement: function(e, t) {
            if ("radio" == t.attr("type")) e.insertAfter($(t).parents("ul")).css("marginTop", "-20px");
            else if ("checkbox" == t.attr("type")) e.insertAfter($(t).parent()).css("clear", "left");
            else e.insertAfter(t)
        },
        submitHandler: function(e) {
            var t = $('input[type="radio"]:checked', e).val(),
            n = $.trim($("#email").val()),
            i = $("#password").val();
            $(e).find(":submit").attr("disabled", !0),
            $.ajax({
                type: "POST",
                data: {
                    email: n,
                    password: i,
                    type: t
                },
                url: ctx + "/register/register.json",
                dataType: "json"
            }).done(function(t) {
                if (console.log(t), 1 == t.state) {
                    var n = "/grantServiceTicket/grant.html";
                    return window.location.href = n,
                    !1
                } else if (240 == t.state) $("#beError").text("请输入常用邮箱地址").show();
                else if (210 == t.state) $("#beError").text("请输入100字以内的邮箱地址").show();
                else if (220 == t.state) $("#beError").text("请输入有效的邮箱地址，如：vivi@lagou.com").show();
                else if (241 == t.state) $("#beError").text("请输入密码").show();
                else if (211 == t.state) $("#beError").text("请输入6-16位密码，字母区分大小写").show();
                else if (243 == t.state) $("#beError").text("请选择使用拉勾的目的").show();
                else if (400 == t.state) $("#beError").text("该邮箱已被注册，请重新输入或直接登录").show();
                else if (500 == t.state || 501 == t.state || 502 == t.state) $("#beError").text("注册失败,系统内部异常").show();
                else if (299 == t.state) $("#beError").text("你的操作太过频繁，请稍后再试").show();
                else $("#beError").text("网络异常，请刷新重试").show();
                $(e).find(":submit").attr("disabled", !1)
            })
        }
    })
});