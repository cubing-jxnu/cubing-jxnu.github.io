<?php
define('URL_LOGIN', 'http://jwc.jxnu.edu.cn/Portal/LoginAccount.aspx?t=account');

/**
 * @param $id string 待查询学生的学号
 * @param $cookies array 模拟登录后的 cookie
 */
/**
 * @param $id string 待查询学生的学号
 * @param $cookies array 模拟登录后的 cookie
 * @return mixed|null|string|string[] 查询结果
 */
function search($id, $cookies) {
	$data = curl_request(url_search($id), '', '', cookie_to_string($cookies), 0);
	$data = preg_replace('/(\.\.)/U', 'http://jwc.jxnu.edu.cn', $data);
	return $data;
}

/**
 * @return array 返回模拟登录后的 cookie
 */
function login() {
	$data = first_login();
	$posts = $data['post'];
	$cookies = $data['cookie'];
	$contents = curl_request(URL_LOGIN, URL_LOGIN, $posts, cookie_to_string($cookies), 1);
	$cookies['JwOAUserSettingNew'] = get_preg_value('JwOAUserSettingNew', $contents);
	return $cookies;
}

/**
 * @return array 返回一个数组 包含：
 * 1.模拟登录的 post 数组
 * 2.模拟登陆的 cookie 数组
 */
function first_login() {
	$posts = [
		'__EVENTTARGET' => '',
		'__EVENTARGUMENT' => '',
		'__LASTFOCUS' => '',
		'__VIEWSTATE' => '',
		'__EVENTVALIDATION' => '',
		'_ctl0:cphContent:ddlUserType' => 'Student',
		'_ctl0:cphContent:txtUserNum' => '',
		'_ctl0:cphContent:txtPassword' => '',
		'_ctl0:cphContent:btnLogin' => '登录',
	];
	$contents = curl_request(URL_LOGIN, '', '', '', 1);
	$cookies['ASP.NET_SessionId'] = get_preg_value('ASP.NET_SessionId', $contents);
	$posts['__VIEWSTATE'] = get_preg_value('__VIEWSTATE', $contents);
	$posts['__EVENTVALIDATION'] = get_preg_value('__EVENTVALIDATION', $contents);
	return ['post' => $posts, 'cookie' => $cookies];
}

/**
 * @param $id string 待查询学生的id
 * @return string 查询的url
 */
function url_search($id) {
	return 'http://jwc.jxnu.edu.cn/MyControl/All_Display.aspx?UserControl=All_TeacherInfor.ascx&UserType=Teacher&UserNum=' . $id;
}

/**
 * @param $type string 匹配类型
 * @param $subject string 待匹配文本
 * @return string 匹配结果
 */
function get_preg_value($type, $subject) {
	$_patterns = [
		//-----------  以下用于 Cookie 匹配  -----------//
		'ASP.NET_SessionId' => '/Set-Cookie: ASP.NET_SessionId=(.*); path/',
		'JwOAUserSettingNew' => '/Set-Cookie: JwOAUserSettingNew=(.*); expires/',
		//-----------  以下用于获取表单隐藏值匹配  -----------//
		'__VIEWSTATE' => '/id="__VIEWSTATE" value="(.+?)" \/>/',
		'__EVENTVALIDATION' => '/id="__EVENTVALIDATION" value="(.+?)" \/>/',
	];
	$pattern = $_patterns[$type];
	preg_match($pattern, $subject, $matches);
	if (count($matches) <= 0) {
		return "ERROR: 无匹配项";
	}
	return $matches[1];
}

/**
 * @param $cookies array cookie数组
 * @return string cookie字符串
 */
function cookie_to_string($cookies) {
	$cookie = '';
	foreach ($cookies as $key => $value) {
		$cookie .= $key . '=' . $value . '; ';
	}
	return $cookie;
}

/**
 * @param $url String        模拟访问的链接
 * @param $refererUrl String        伪造请求来源
 * @param string $post Array        POST 访问时的数据
 * @param string $cookie String        发送 Cookie 时的 Cookie 字符串
 * @param int $returnCookie Boolean        是否返回Cookie（false只返回页面内容，true则返回一个包含cookie的数组：Array['cookie','body']）
 * @return mixed string html源码
 */
function curl_request($url, $refererUrl, $post = '', $cookie = '', $returnCookie = 0) {

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36');
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); //重定向URL，抓取跳转后的页面
	curl_setopt($curl, CURLOPT_MAXREDIRS, 1); //最大重定向数
	curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
	curl_setopt($curl, CURLOPT_REFERER, $refererUrl);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	//如果 $post 不为空，则采用 POST 模式传输，转换并传输内容
	if ($post) {
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
	}
	//如果 Cookie 不为空则发送 Cookie
	if ($cookie) {
		curl_setopt($curl, CURLOPT_COOKIE, $cookie);
	}
	curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
	curl_setopt($curl, CURLOPT_TIMEOUT, 200);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($curl);
	curl_close($curl);
	return $data;
}

?>
<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查询教师信息</title>
    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <form action="" method="post">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <input class="form-control" type="text" name="id" placeholder="请输入要查询的工号">
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit">查询</button>
            </div>
        </div>
    </form>
</body>
</html>
<?php
if (isset($_POST['id'])) {
	$cookies = login();
	echo search($_POST['id'], $cookies);
}
?>