<?php

/*
Plugin Name: anyShare
Version:     1.0
Author:      nan
Author URI:  http://nan.im/
Plugin URI:  http://nan.im/blog/1302
Description: Easy sharing for China SNS.
*/


// for add to content ...
function anyShare($HTM){

	if(!is_single()): return $HTM; endif;

	global $post;
	wp_enqueue_style('anyShare', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/anyShare.css', NULL, '0.9');

	$TXT = rawurlencode($post->post_title);
	$URL = rawurlencode(get_permalink());
	$API = array(
		'L766QQ空间' => 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={URL}&title={TXT}&desc=&summary=&site=&pics=',
		'L398新浪微博' => 'http://service.weibo.com/share/share.php?url={URL}&title={TXT}&appkey=3581453612&pic=&sudaref={URL}',
		'L161腾讯微博' => 'http://share.v.t.qq.com/index.php?c=share&a=index&url={URL}&title={TXT}&appkey=2e295ab2ff8245229d96fa3768a9f779',
		'L301人人网' => 'http://widget.renren.com/dialog/share?resourceUrl={URL}&srcUrl=&title={TXT}&description=',
		'L280百度贴吧' => 'http://tieba.baidu.com/f/commit/share/openShareApi?url={URL}&title={TXT}&desc=&comment=',
		'L315开心网' => 'http://www.kaixin001.com/rest/records.php?url={URL}&style=11&content={TXT}&stime=&sig=',
		'L472百度空间' => 'http://hi.baidu.com/pub/show/share?url={URL}&title={TXT}&content=&linkid=',
		'L937豆瓣' => 'http://shuo.douban.com/!service/share?href={URL}&name={TXT}&image=',
		'L115搜狐微博' => 'http://t.sohu.com/third/post.jsp?url={URL}&title={TXT}&pic=',
		'L944FaceBook' => 'https://www.facebook.com/sharer/sharer.php?u={URL}&t=',
		'L050Twitter' => 'https://twitter.com/intent/tweet?source=webclient&text={TXT}%20{URL}',
		'L918GooglePlus' => 'https://plus.google.com/share?url={URL}',
	);

	$HTM .= '<div id="anyShare" class="clearfix">'."\n";
	$HTM .= '<b><i>anyShare</i>分享到：</b>'."\n";
	foreach($API as $KEY => $LNK){
        $TXT  = substr($KEY, 4);
		$LNK  = str_replace(array('{TXT}', '{URL}'), array($TXT, $URL), $LNK);
		$POP  = "javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=480,width=640');return false;";
		$HTM .= '<a target="_blank" rel="nofollow" id="'.substr($KEY, 0, 4).'" onclick="'.$POP.'" title="'.$TXT.'" href="'.$LNK.'">'.$TXT.'</a>'."\n";
	}
	$HTM .= '<br clear="all"></div><!-- #anyShare -->';

	return $HTM;
}

add_filter('the_content', 'anyShare');


