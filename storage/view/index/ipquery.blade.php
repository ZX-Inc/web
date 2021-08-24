<!DOCTYPE html>
<html>
<head>
    <title>IPv6地址查询工具</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body, input, select, td, textarea {font-family: Tahoma, sans-serif; font-size: 9pt; font-weight: normal;}
        table, tr, th, td {border: 1px #ccc solid; border-collapse: collapse;}
        tr {height: 20px;}
        .fullwidth {width: 600px;}
        .centre {text-align: center;}
        .tdtitle {text-align: center; background-color: #eee;}
        .iptext {width: 300px; padding: 2px;}
        .submittext {width: 95%; padding: 2px;}
        .hidden {display: none;}
        .link {cursor: pointer;}
        #main {width: 600px; text-align: left; margin: 0 auto;}
    </style>
</head>
<body>
<div id="main">
    <h1 class="centre">IPv6地址查询工具</h1>
    <h3 class="centre">本页网址 <a href="//ip.zxinc.org/ipquery/">ip.zxinc.org/ipquery/</a></h3>
    <h3 class="centre">注意：本工具不能查询域名。查询域名请使用<a href="http://tool.chinaz.com/dns/">DNS工具</a>。</h3>
    <br/>
    <table class="fullwidth">
        <tr>
            <td colspan="3" class="tdtitle">你的IP鉴定<br/>
                <a href="."><span id="db6ver">IPv6数据库版本: 加载中 (记录数: 加载中)</span></a><br/>
                <a href="http://www.cz88.net/ip/"><span id="db4ver">IPv4镜像数据库版本: 加载中 (记录数: 加载中)</span></a>
            </td>
        </tr>
        <tr>
            <td class="tdtitle" style="width:18%;">你的IPv4地址</td>
            <td id="myipv4" class="centre" style="width:30%;">加载中</td>
            <td id="myaddrv4" class="centre" style="width:52%;">加载中</td>
        </tr>
        <tr>
            <td class="tdtitle" style="width:18%;">你的IPv6地址</td>
            <td id="myipv6" class="centre" style="width:30%;">加载中</td>
            <td id="myaddrv6" class="centre" style="width:52%;">加载中</td>
        </tr>
        <tr>
            <td class="tdtitle" style="width:18%;">User-Agent</td>
            <td id="ua" colspan="2" class="centre"></td>
        </tr>
    </table>
    <br/>

    <form action="" onsubmit="return handlequery()">
        <table class="fullwidth">
            <tr>
                <td colspan="2" class="tdtitle">IP地址查询</td>
            </tr>
            <tr>
                <td class="tdtitle" style="width:18%;">查询IP</td>
                <td class="centre">
                    <input id="ip" name="ip" type="text" class="iptext" value=""/>
                    <button type="submit" id="query">查 询</button>
                </td>
            </tr>
            <tr>
                <td class="tdtitle" style="width:18%;">IP范围</td>
                <td id="iprange" class="centre"></td>
            </tr>
            <tr>
                <td class="tdtitle" style="width:18%;">地理位置</td>
                <td id="addr" class="centre"></td>
            </tr>
        </table>
    </form>
    <br/>

    <div id="report" class="hidden">
        <form id="formsubmit" action="//ip.gae.zxinc.org/submit.php" method="POST" onsubmit="return handlesubmit()">
            <table class="fullwidth">
                <thead>
                <tr>
                    <td colspan="2" class="tdtitle">IPv6地址归属地纠错汇报（不接受IPv4地址）</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="tdtitle" style="width:18%;">IPv6地址</td>
                    <td class="centre">
                        <input id="pip" name="ip" type="text" class="submittext" />
                    </td>
                </tr>
                <tr>
                    <td class="tdtitle" style="width:18%;">地理位置</td>
                    <td class="centre">
                        <input id="paddr" name="addr" type="text" class="submittext" />
                    </td>
                </tr>
                <tr>
                    <td class="tdtitle" style="width:18%;">备注(选填)</td>
                    <td class="centre">
                        <input id="pmask" name="mask" type="text" class="submittext" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="tdtitle">
                        <button type="submit" id="submit">提 交</button>
                        <br><span id="submitstatus"></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <br/>
    </div>

    <div class="centre">
        若本页出现技术错误导致无法查询或显示异常，请直接找<b>ZX</b>(QQ:61857543)，谢谢！<br>
        有大量的IPv6数据需要纠错汇报的，可直接找<b>ZX</b>，谢谢！<br>
        有IPv4数据需要纠错汇报的，请上<a href="//update.cz88.net">纯真IP站</a>提交，谢谢！<br>
        本站支持自IE6以来的所有浏览器访问。<br>
        <br/>
        特别说明：本站收录IPv6地址的精度，境内到地市级，绝大多数可以到区县级，境外到国家级。<br>
        移动数据网络具有漫游性，手机IP为初次接入地IP，不管漫游到何地，24小时内一般不会变成当前所在地IP。<br>
        为了<b>打击网络犯罪</b>，查不到IP地址归属地的刑警请直接加上述QQ咨询，谢谢！<br>
        本站不能查户口和定位，请找对应运营商查询！<br>
    </div>
    <br/>

    <span id="togglereport" class="link">IPv6归属地纠错汇报</span><br/>
    <a href="../">返回首页</a><br/>
    友情链接：<br/>
    <a href="http://www.cz88.net/ip/" target="_blank">IPv4地址查询工具(纯真版)</a>

    <hr>
    <p class="centre">
        版权所有 &copy; 2009-2021 ZX Inc.<br/>
        <a href="https://cloud.lsy.cn/" target="_blank">LSY.CN 云计算</a>提供PY服务
    </p>
</div>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script type="text/javascript" src="/jquery-3.4.1.min.js"></script>-->
<script type="text/javascript" src="/cors.js"></script>
<script type="text/javascript">
    var ie=!!window.ActiveXObject;
    var ie6=ie&&!window.XMLHttpRequest;
    var ie8=ie&&!!document.documentMode;
    var ie7=ie&&!ie6&&!ie8;
    $("#ua").text(navigator.userAgent);
    $("#togglereport").click(handletogglereport);
    //$("#submit").click(handlesubmit);
    queryinfo(updatemyipv4, updatemyipv6);

    function handletogglereport() {
        $("#report").toggle();
    }
    function handlequery() {
        var ip = $("#ip").val();
        queryip(ip, updateip);
        return false;
    }

    function handlesubmit() {
        var ip = $("#pip").val();
        var mask = $("#pmask").val();
        var addr = $("#paddr").val();
        if (CORS) {
            submit(ip, mask, addr, updatesubmit);
            return false;
        } else {
            return true;
        }
    }

    function queryinfo(callback4, callback6) {
        if (ie6 || ie7) {
            var url4 = document.location.protocol + "//v4.ip.zxinc.org/info.php?type=jsonp";
            var url6 = document.location.protocol + "//v6.ip.zxinc.org/info.php?type=jsonp";
            var type = "jsonp";
        } else {
            var url4 = "//v4.ip.zxinc.org/info.php?type=json";
            var url6 = "//v6.ip.zxinc.org/info.php?type=json";
            var type = "json";
        }
        $.ajax({
            url: url4,
            dataType: type,
            success: function(data) {
                callback4({
                    myip: data.data.myip,
                    disp: data.data.location,
                    ver4: data.data.ver4,
                    ver6: data.data.ver6,
                    count4: data.data.count4,
                    count6: data.data.count6
                });
            },
            error: function(jqXHR, textstatus, errorthrown) {
                if (window.console) console.log({disp: jqXHR.status + ":" + jqXHR.responseText});
                callback4({error: 1});
            }
        });
        $.ajax({
            url: url6,
            dataType: type,
            success: function(data) {
                callback6({
                    myip: data.data.myip,
                    disp: data.data.location,
                    ver4: data.data.ver4,
                    ver6: data.data.ver6,
                    count4: data.data.count4,
                    count6: data.data.count6
                });
            },
            error: function(jqXHR, textstatus, errorthrown) {
                if (window.console) console.log({disp: jqXHR.status + ":" + jqXHR.responseText});
                callback6({error: 1});
            }
        });
    }

    function queryip(ip, callback) {
        $("#addr").text("查询中，请稍候");
        $.ajax({
            url: "/api.php?type=json&ip=" + ip,
            success: function(data) {
                callback({
                    myip: data.data.myip,
                    disp: data.data.location,
                    start: data.data.ip.start,
                    end: data.data.ip.end
                });
            },
            error: function(jqXHR, textstatus, errorthrown) {
                callback({disp: jqXHR.status + ":" + jqXHR.responseText});
            }
        });
    }

    function submit(ip, mask, addr, callback) {
        $("#submitstatus").text("提交中，请稍候");
        $.ajax({
            url: "//ip.gae.zxinc.org/submit.php",
            method: "POST",
            data: {
                type: "json",
                ip: ip,
                mask: mask,
                addr: addr
            },
            success: function(data) {
                callback({
                    code: data.code,
                    msg: data.msg
                });
            },
            error: function(jqXHR, textstatus, errorthrown) {
                callback({code: -1, msg: jqXHR.status + ":" + "服务器错误"});
            }
        });
    }

    function updatemyipv4(data) {
        if (data.error) {
            $("#myipv4").text("您的网络");
            $("#myaddrv4").text("不支持IPv4");
        } else {
            $("#myipv4").text(data.myip);
            $("#myaddrv4").text(data.disp);
            $("#db6ver").text("IPv6数据库版本: " + data.ver6 + " (记录数: " + data.count6 + ")");
            $("#db4ver").text("IPv4镜像数据库版本: " + data.ver4 + " (记录数: " + data.count4 + ")");
        }
    }
    function updatemyipv6(data) {
        if (data.error) {
            $("#myipv6").text("您的网络");
            $("#myaddrv6").text("不支持IPv6");
        } else {
            $("#myipv6").text(data.myip);
            $("#myaddrv6").text(data.disp);
            $("#db6ver").text("IPv6数据库版本: " + data.ver6 + " (记录数: " + data.count6 + ")");
            $("#db4ver").text("IPv4镜像数据库版本: " + data.ver4 + " (记录数: " + data.count4 + ")");
        }
    }
    function updateip(data) {
        if (data.start) {
            $("#iprange").text(data.start + " - " + data.end);
        }
        $("#addr").text(data.disp);
    }
    function updatesubmit(data) {
        if (data.code < 0) {
            $("#submitstatus").text(data.msg);
        } else {
            $("#submitstatus").text(data.msg);
            $("#pip").val();
            $("#pmask").val();
            $("#paddr").val();
        }
    }

</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-8016423-4"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-8016423-4');
</script>
</body>
</html>
