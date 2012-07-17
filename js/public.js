
//�ù�ajax�Ķ�֪��������������Ǵ���XMLHttpReques�����ͨ�ú���������Ͳ������ˡ�
function createXMLHttpRequest(){
if(window.XMLHttpRequest){//��IE�����
			xmlHttp=new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

 }
//����myform,ÿһ����Ʒ��������һ��form����������ͺ����׻�ȡÿ����Ʒ����Ϣ�ˡ�

function add_to_cart(myform){
createXMLHttpRequest(); //����һ��XMLHttpReques����


var key=myform.key.value;
var shoename=myform.shoename.value;
var shoenum=myform.shoenum.value;
var shoeprice=myform.shoeprice.value;
//var key="shoe1";
//var shoename="��Ь";
//var shoesize=37;
//var shoenum=2;
//var shoeprice=200;
//�������ݵĲ�����������ѡ�������post��ʽ���͡�
var postStr="key="+key+"&name="+shoename+"&num="+shoenum+"&price="+shoeprice;
xmlHttp.open("post", "add_to_cart.php");  //���������ҳ�棬����Ϊadd_to_cart.php;
xmlHttp.setRequestHeader("cache-control","no-cache"); 
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlHttp.send(postStr);
xmlHttp.onreadystatechange=function()
{
if(xmlHttp.readyState==4 && xmlHttp.status==200)
{
	alert("添加成功");
}
}
}







<!--�����ȷ���һ��js����remove_to_car()����Ӧ����ôд����һ���϶��ǰѲ���key���ݸ�remove_to_cart.phpҳ�档�ڶ������ǰ��Ƴ����ﳵ����Ʒ��Ϣ��ҳ����ȥ������������Ǹ���ҳ����ܽ�-->

 /////////////////////////////
/* function del_to_cart(key)//��չ��ﳵ
 {
	 
	// var posdel="del="+key;
	createXMLHttpRequest();  
	xmlHttp.open("post", "del_to_cart.php"); 
xmlHttp.setRequestHeader("cache-control","no-cache"); 
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 
xmlHttp.send();
alert("defews");
xmlHttp.onreadystatechange=function(){
if(xmlHttp.readyState==4 & xmlHttp.status==200){
//myINput��ʾ��ť��������ĸ�Ԫ����td,td�ĸ�Ԫ����tr�����ǰ�tr��Ϊ���أ�Ҳ��ɾ������Ʒ��Ϣ�ˡ�
myInput.parentNode.parentNode.style.display="none";
//�����������Ƴ�����Ʒ���ܽ�xmlHttp.responseTextΪ���ص��ܽ�
document.getElementById("totalamount").innerHTML=0;
alert("defews");
}else  alert("���ʧ��");
}

 }*/
 /////////////////////////////////
 
function remove_to_cart(myInput,key){
createXMLHttpRequest(); //����һ��XMLHttpReques�������ջ�����е�js�������ͬһ���ļ������ԾͲ����ظ�дcreateXMLHttpRequest()��������ˡ�
var postStr="key="+key;
xmlHttp.open("post", "remove_to_cart.php");  //���������ҳ�棬����Ϊremove_to_cart.php;
xmlHttp.setRequestHeader("cache-control","no-cache"); 
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
xmlHttp.send(postStr);
xmlHttp.onreadystatechange=function(){
if(xmlHttp.readyState==4 && xmlHttp.status==200){
//myINput��ʾ��ť��������ĸ�Ԫ����td,td�ĸ�Ԫ����tr�����ǰ�tr��Ϊ���أ�Ҳ��ɾ������Ʒ��Ϣ�ˡ�
alert("删除成功");
myInput.parentNode.parentNode.style.display="none";

//�����������Ƴ�����Ʒ���ܽ�xmlHttp.responseTextΪ���ص��ܽ�
document.getElementById("totalamount2").innerHTML=xmlHttp.responseText;
document.getElementById("totalamount1").innerHTML=xmlHttp.responseText;
}
}
}


