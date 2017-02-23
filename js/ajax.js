/*
 * parma  object   传入的数据
 * type  str[get  post]    传入的方式
 * dataType   str[xml   document  text json]     数据类型
 * success   fn[callback]  成功输出
 * erro     fn[callback]    失败输出
 * data   parma.data   数据
 * */
function ajax(parma){
    //对象进行判断，如果没有，则返回，报错   ajax("dd")  判断其
    if(typeof (parma)!=="object"){
        console.error("请输入正确的数据");
        return false;
    }
    //参数的初始化
    var dataType=parma.dataType||"text";
    var async=parma.async==undefined?true:parma.async;
    var url=parma.url;
    if(url==undefined){
        console.error("请输入正确的地址");
        return false;
    }
    var data=parma.data||"";
    if(typeof (data)=="object"){
        var str="";
        for(var i in data){
            str+=i+"="+data[i]+"&";
        }
        data=str.slice(0,-1);
    }
    var xmlobj=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
    var type=parma.type||"get";
    if(type=="get"){
        xmlobj.open(type,url+"?"+data,async);
        if(dataType!="xml"){
            xmlobj.responseType=dataType;
        }
        xmlobj.send();
    }else if(type=="post"){
        xmlobj.open(type,url,async);
        if(dataType!="xml"){
            xmlobj.responseType=dataType;
        }
        xmlobj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlobj.send(data);
    }

    xmlobj.onreadystatechange=function () {
        if(xmlobj.readyState==4){
            if(xmlobj.status==200){
                if(dataType=="xml"){
                    var result=xmlobj.responseXML;
                }else{
                    var result=xmlobj.response;
                }
                parma.success(result);
            }else if(xmlobj.status==404){
                var info="页面找不到";
                parma.error(info);
            } else if(xmlobj.status==501){
                var info="服务器代码有误";
                parma.error(info);
            }
        }

    }
}