// 依赖: jQuery >= 1.4
// 可跨域Ajax请求
(function(window){
    "use strict";

    var document = window.document,
        $ = window.jQuery,
        location = window.location,
        hostname = location.hostname,
        origin = location.origin || location.protocol + "//" + location.host,
        setted,
        CORS,
        isIE = navigator.userAgent.match(/MSIE (\d+(?:\.\d+)?)/),
        versionOfIE = isIE && +isIE[1],
        lessThanIE8 = (isIE = !!isIE) && (versionOfIE < 8 || "documentMode" in document && document.documentMode < 8);

    // 获取一个唯一key
    var getUniqueKey = (function(){
        var count = 0,
            start = (new Date()).getTime();
        return function(){
            return (++ count + start).toString(36);
        };
    })();

    // 创建一个元素
    function create(tagName) {
        return document.createElement(tagName);
    }

    // 是否支持 CORS [Cross-Origin-Resource-Sharing]
    try {
        var xhr = new XMLHttpRequest;
        CORS = "withCredentials" in xhr;
    } catch(e) {}

    // 可跨域Ajax
    function corsAjax(settings) {
        var method = settings.method || "GET",
            url = settings.url,
            cross = /(^https?:)|(^\/\/)/.test(url) && url.indexOf(origin) != 0;
        if (! cross) {
            return $.ajax(settings);
        } else if (CORS) {
            return $.ajax(settings);
        } else {
            if (method == "GET") {
                settings.dataType = "jsonp";
                return $.ajax(settings);
            } else {
                crossSubdomainPost(settings);
            }
        }
    }

    // 跨子域post请求
    function crossSubdomainPost(settings){
        var iframe,
            form = create("form"),
            unique = getUniqueKey(),
            uniqueName = "crossdomain_iframe_" + unique,
            uniqueCall = "crossdomain_callback_" + unique,
            url = settings.url,
            data = settings.data || {},
            timeout = settings.timeout || 0,
            handle;

        if (! setted) {
            // 设置domain域
            document.domain = hostname.split(".").slice(-2).join(".");
            setted = true;
        }

        // hack for IE6/7 "submitName" bug
        if (lessThanIE8) {
            iframe = create('<iframe name="' + uniqueName + '">');
        } else {
            iframe = create("iframe");
            iframe.name = uniqueName;
        }

        // 隐藏元素
        iframe.style.display = "none";
        form.style.display = "none";

        form.target = uniqueName;
        form.action = url + (url.indexOf("?") == -1 ? "?" : "&") + "crossdomain=" + uniqueCall;
        form.method = "post";

        // 表单项
        for (var name in data) {
            var input = create("input");
            input.type = "hidden";
            input.name = name;
            input.value = data[name];
            form.appendChild(input);
        }

        // 加入到 body 中
        document.body.appendChild(iframe);
        document.body.appendChild(form);

        // 请求完成时
        var complete = function(){
            settings.complete && settings.complete();
            setTimeout(function(){
                document.body.removeChild(iframe);
                document.body.removeChild(form);
            }, 1);
        };

        // 回调
        window[uniqueCall] = function(data){
            clearTimeout(handle);
            settings.success && settings.success(data);
            complete();
        };

        // 提交表单
        form.submit();

        // 超时
        if (timeout > 0) {
            handle = setTimeout(function(){
                window[uniqueCall] = function(){};
                settings.error && settings.error({}, "timeout");
                complete();
            }, timeout);
        }
    }

    // 赋予全局
    window.CORS = CORS;
    window.corsAjax = corsAjax;
})(window);
