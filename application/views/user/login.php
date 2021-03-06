<body id="login_bg">
    <div class="login_wrapper">
        <div class="login_header">
            <a href=""><img src="style/images/logo_white.png" width="285" height="62" alt="招聘" /></a>
            <div id="cloud_s"><img src="style/images/cloud_s.png" width="81" height="52" alt="cloud" /></div>
            <div id="cloud_m"><img src="style/images/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
        </div>
        
        <input type="hidden" id="resubmitToken" value="" />
         <div class="login_box">
            <form id="loginForm" action="index.html">
                <input type="text" id="email" name="email" value="" tabindex="1" placeholder="请输入登录邮箱地址" />
                <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
                <span class="error" style="display:none;" id="beError"></span>
                <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
                <a href="reset.html" class="fr" target="_blank">忘记密码？</a>
                <input type="hidden" id="callback" name="callback" value="<?php echo $callback?>"/>
                <input type="submit" style="color:#fff;" id="submitLogin" value="登 &nbsp; &nbsp; 录" />
                <input type="hidden" id="authType" name="authType" value=""/>
                <input type="hidden" id="signature" name="signature" value=""/>
                <input type="hidden" id="timestamp" name="timestamp" value=""/>
            </form>
            <div class="login_right">
                <div>还没有帐号？</div>
                <a  href="register.html"  class="registor_now">立即注册</a>
                <div class="login_others">使用以下帐号直接登录:</div>
                <a  href="h/ologin/auth/sina.html"  target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a>
                <a  href="h/ologin/auth/qq.html"  class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a>
            </div>
        </div>
        <div class="login_box_btm"></div>
    </div>
    <script type="text/javascript">
    $(function(){
        //验证表单
         $("#loginForm").validate({
            /*onkeyup: true,
            focusCleanup:true,*/
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "请输入登录邮箱地址",
                    email: "请输入有效的邮箱地址，如：vivi@zhaopin.com"
                },
                password: {
                    required: "请输入密码"
                }
            },
            submitHandler: function(form){
                if($('#remember').prop("checked")){
                      $('#remember').val(1);
                }else{
                      $('#remember').val(null);
                }
                var email = $('#email').val();
                var password = $('#password').val();
                var remember = $('#remember').val();
                
                var callback = $('#callback').val();
                var authType = $('#authType').val();
                var signature = $('#signature').val();
                var timestamp = $('#timestamp').val();
                var logintourl = $('#logintourl').val();
                
                $(form).find(":submit").attr("disabled", true);
                $.ajax({
                    type:'POST',
                    data:{email:email,password:password,autoLogin:remember, callback:callback, authType:authType, signature:signature, timestamp:timestamp},
                    dataType:'json',
                    url:ctx+'user/ajaxlogin'
                }).done(function(result) {
                    if(result.success){
                        if(result.content.loginToUrl){
                            window.location.href=result.content.loginToUrl;
                        }else{
                            window.location.href=ctx;
                        }
                    }else{
                        $('#beError').text(result.msg).show();
                    }
                    $(form).find(":submit").attr("disabled", false);
                }); 
            }  
        });
    })
    </script>
</body>
</html>