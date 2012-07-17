var next1="false";
function createXMLHttpRequest(){
if(window.XMLHttpRequest){//非IE浏览器
			xmlHttp=new XMLHttpRequest();
			if(!xmlHttp)
			{
				alert("创建对象失败");
			}
		}
		else if(window.ActiveXObject){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			if(!xmlHttp)
			{
				alert("创建对象失败");
			}
		}
 }
 
function Ajax(data){
createXMLHttpRequest();
var  va=document.getElementById("tablenum").value
var postStr="tablenum="+va;
xmlHttp.open("post", "tablechk.php");
xmlHttp.setRequestHeader("cache-control","no-cache"); 
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlHttp.send(postStr);
xmlHttp.onreadystatechange=function()
{
if (4==xmlHttp.readyState){
                if (200==xmlHttp.status)
				{
					if(xmlHttp.responseText=="false")
					{
						document.getElementById("tip2").innerHTML="";
						document.getElementById("tip1").innerHTML="";
						document.getElementById("tip1").innerHTML="抱歉！该桌位号已添加！！";
						next1="false";		
					}
					else
					{
						document.getElementById("tip1").innerHTML="";
						document.getElementById("tip2").innerHTML="";
						document.getElementById("tip2").innerHTML="恭喜！该座位号可添加！！";
						next1="true";				
					}
                }

               else{
                       alert("发生错误!");
                   }
            }
}
}
	
            
    function chkTableNUm(obj){
        if(obj.value.length<1){
            obj.style.backgroundColor="#efefef";
            //alert("请输入用户名!");
			document.getElementById("tip1").innerHTML="请输入座位号！";
            obj.focus();
        }else{
			document.getElementById("tip1").innerHTML="";
            //调用Ajax函数,向服务器端发送查询
            Ajax(obj.value);
        }           
    }
	/*function chkStatus(obj){
		var  va=document.getElementById("sta").value;
		if(va==0||va==1)
		{
			document.getElementById("sta1").innerHTML="";
			document.getElementById("sta2").innerHTML="正确！";
			next2="true"
		}
		else
		{
			document.getElementById("sta2").innerHTML="";
			document.getElementById("sta1").innerHTML="信息输入不正确，只能输入1或0！";
				next2="false";
		}
		
	}
	*/
	function submitto()
	{
		if(next1=="true")
		{
			document.getElementById("al").innerHTML="";
			//此处添加对用户添加的操作
			return true;
		}
		else
		{
			document.getElementById("al").innerHTML="";
			document.getElementById("al").innerHTML="您输入的信息不正确，请检查或重新输入！！";
			return false;
		}
	}