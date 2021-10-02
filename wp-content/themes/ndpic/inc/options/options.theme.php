<?php if (! defined('ABSPATH')) {
	die;
}
if (class_exists('CSF')) {
	$prefix = 'aye';
	CSF::createOptions($prefix, array(
		'menu_title' => '主题设置',
		'menu_slug' => 'aye-options',
	));

/*
 * ------------------------------------------------------------------------------
 * 基本设置
 * ------------------------------------------------------------------------------
 */

	CSF::createSection($prefix, array(
		'id' => 'aye_basic',
		'title' => '基本设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_basic',
		'title' => '顶部设置',
		'fields' => array(
			array(
				'id' => 'head_logo',
				'type' => 'upload',
				'title' => '顶部Logo图片',
				'placeholder' => 'http://',
				'button_title' => '上传',
				'remove_title' => '删除',
				'desc' => '上传网站Logo图片',
				'default' => 'http://www.nuandao.cn/images/ndnav/ndimg_logo.png'
			),
			array(
				'id' => 'favicon',
				'type' => 'upload',
				'title' => '网站favicon.ico图标',
				'placeholder' => 'http://',
				'button_title' => '上传',
				'remove_title' => '删除',
				'desc' => '上传网站favicon.ico图标',
				'default' => 'http://www.nuandao.cn/images/ndnav/ndimg_logo.png'
			),
            array(
              'id'       => 'head_js',
              'type'     => 'code_editor',
              'title'    => '顶部Javascript代码',
              'settings' => array(
                'theme'  => 'monokai',
                'mode'   => 'javascript',
              ),
              'default'  => '',
            ),
            array(
              'id'       => 'head_css',
              'type'     => 'code_editor',
              'title'    => '顶部Css代码',
              'settings' => array(
                'theme'  => 'mbo',
                'mode'   => 'css',
              ),
              'default'  => '',
            ),
		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_basic',
		'title' => '底部设置',
		'fields' => array(
			array(
				'id' => 'show_beian',
				'type' => 'switcher',
				'title' => '隐藏/显示网站备案号',
				'default' => true
			),
			array(
				'id' => 'beian',
				'type' => 'text',
				'dependency' => array('show_beian', '==', true),
				'title' => '网站备案号',
				'default' => '鄂ICP备18001037号'
			),
			array(
				'id' => 'cop_text',
				'type' => 'textarea',
				'title' => '网站底部版权文字',
				'desc'  => '可以使用html编辑',
				'default' => 'Copyright 2019-2020'
			),
			array(
				'id' => 'load_time',
				'type' => 'switcher',
				'title' => '隐藏/显示网站加载时间',
				'default' => true
			),
		)
	));

/*
 * ------------------------------------------------------------------------------
 * SEO设置
 * ------------------------------------------------------------------------------
 */

	CSF::createSection($prefix, array(
		'parent' => 'aye_basic',
		'title' => 'SEO设置',
		'fields' => array(
			array(
				'id' => 'website_title',
				'type' => 'text',
				'title' => '网站标题',
			),
			array(
				'id' => 'website_keywords',
				'type' => 'text',
				'title' => '网站关键词',
			),
			array(
				'id' => 'website_description',
				'type' => 'text',
				'title' => '网站描述',
			),
		)
	));
	
/*
 * ------------------------------------------------------------------------------
 * 返回顶部
 * ------------------------------------------------------------------------------
 */

	CSF::createSection($prefix, array(
		'parent' => 'aye_basic',
		'title' => '返回顶部',
		'fields' => array(
			array(
				'id' => 'gotop_qq',
				'type' => 'text',
				'title' => 'QQ号码',
				'desc' =>'返回顶部QQ号码',
				'default' => '1098816988'
			),
			 array(
				'id'           => 'gotop_wx',
				'type'         => 'upload',
				'title'        => '微信图片',
				'library'      => 'image',
				'placeholder'  => 'http://',
				'button_title' => '上传',
				'remove_title' => '删除',
			),
		)
	));
/*
 * ------------------------------------------------------------------------------
 * 其他设置
 * ------------------------------------------------------------------------------
 */
	CSF::createSection($prefix, array(
		'parent' => 'aye_basic',
		'title' => '其他设置',
		'fields' => array(
		    array(
				'id' => 'dark_show',
				'type' => 'switcher',
				'title' => '暗黑模式',
				'desc' =>'开启或关闭暗黑模式',
				'default' => true
			),
			array(
				'id' => 'link_show',
				'type' => 'switcher',
				'title' => '友情链接',
				'desc' =>'开启或关闭首页底部友情链接',
				'default' => true
			),
			array(
				'id' => 'comments_close',
				'type' => 'switcher',
				'title' => '整站评论',
				'desc' =>'开启或关闭首页底部友情链接',
				'default' => false
			),
			
			array(
              'id'     => 'user_group_name',
              'type'   => 'fieldset',
              'title'  => '用户组名称',
              'fields' => array(
                array(
                  'id'    => 'user_admin',
                  'type'  => 'text',
                  'title' => '管理员',
                  'desc'  => '管理员 用户组名称修改'
                ),
                array(
                  'id'    => 'user_edit',
                  'type'  => 'text',
                  'title' => '编辑',
                  'desc'  => '编辑 用户组名称修改'
                ),
                array(
                  'id'    => 'user_author',
                  'type'  => 'text',
                  'title' => '作者',
                  'desc'  => '作者 用户组名称修改'
                ),
                array(
                  'id'    => 'user_contributor',
                  'type'  => 'text',
                  'title' => '贡献者',
                  'desc'  => '贡献者 用户组名称修改'
                ),
                array(
                  'id'    => 'user_subscriber',
                  'type'  => 'text',
                  'title' => '订阅者',
                  'desc'  => '订阅者 用户组名称修改'
                ),
              ),
            ),
		)
	));
	

/*
 * ------------------------------------------------------------------------------
 * 首页设置
 * ------------------------------------------------------------------------------
 */
	CSF::createSection($prefix, array(
		'id' => 'aye_home',
		'title' => '首页设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_home',
		'title' => '文章展示',
		'fields' => array(
		    array(
              'id'         => 'home_show',
              'type'       => 'button_set',
              'title'      => '列表样式',
              'desc' => '首页文章列表展示样式',
              'options'    => array(
                '1' => '图集样式',
                '2' => '瀑布流样式',
              ),
              'default'    => '1'
            ),
			array(
				'id' => 'article_num',
				'type' => 'text',
				'title' => '文章数量',
				'default' => '20',
				'desc' => '首页显示文章数量'
			),
			array(
				'id'          => 'home_load',
				'type'        => 'select',
				'title'       => '分页加载方式',
				'placeholder' => '选择首页分页加载方式',
				'options'     => array(
					'1'  => '上一页下一页数字加载',
					'2'  => 'AJAX无刷新加载',
				),
				'default'     => '1'
			),
		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_home',
		'title' => '功能卡片',
		'fields' => array(
			array(
              'id'             => 'home_card',
              'type'           => 'sorter',
              'title'          => '功能卡片布局',
              'default'        => array(
                'enabled'      => array(
                  'slide'   => '幻灯卡片',
                  'news'   => '资讯卡片',
                  'weather'   => '天气卡片',
                  'user'   => '用户卡片',
                ),
                'disabled'     => array(
                  'tags'   => '标签卡片',
                ),
              ),
              'enabled_title'  => '显示',
              'disabled_title' => '隐藏',
            ),

			
		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_home',
		'title' => '轮播图',
		'fields' => array(
            array(
              'id'        => 'slide',
              'type'      => 'group',
              'title'     => 'Group',
              'fields'    => array(
                array(
                  'id'    => 'link',
                  'type'  => 'text',
                  'title' => '图片链接',
                ),
                array(
                  'id'           => 'img',
                  'type'         => 'upload',
                  'title'        => '上传图片',
                  'library'      => 'image',
                  'placeholder'  => 'http://',
                  'button_title' => '上传图片',
                  'remove_title' => '移出图片',
                ),
              ),
              'default'   => array(
                array(
                  'link'     => 'http://www.nuandao.cn',
                  'img'    => 'http://www.nuandao.cn/images/ndnav/screenshot.png',
                ),
              ),
            ),
			
		)
	));
	
/*
 * ------------------------------------------------------------------------------
 * 侧边栏设置
 * ------------------------------------------------------------------------------
 */
	CSF::createSection($prefix, array(
		'id' => 'aye_side',
		'title' => '侧边栏',
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_side',
		'title' => '功能卡片',
		'fields' => array(
	    	array(
              'id'             => 'side_card',
              'type'           => 'sorter',
              'title'          => '功能卡片布局',
              'default'        => array(
                'enabled'      => array(
                  'slide'   => '幻灯卡片',
                  'news'   => '资讯卡片',
                  'weather'   => '天气卡片',
                ),
                'disabled'     => array(
                  'tags'   => '标签卡片',
                  'ad'  => '广告模块',
                ),
              ),
              'enabled_title'  => '显示',
              'disabled_title' => '隐藏',
            ),
		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_side',
		'title' => '广告模块',
		'fields' => array(
			array(
              'id'     => 'side_ad',
              'type'   => 'repeater',
              'title'  => 'Repeater',
              'fields' => array(
                array(
                  'id'    => 'side_ad_link',
                  'type'  => 'text',
                  'title' => '链接地址'
                ),
                array(
    				'id'           => 'side_ad_img',
    				'type'         => 'upload',
    				'title'        => '上传图片',
    				'library'      => 'image',
    				'placeholder'  => 'http://',
    				'button_title' => '上传',
    				'remove_title' => '删除',
    			),
            
              ),
            ),
		)
	));
/*
 * ------------------------------------------------------------------------------
 * 分类页设置
 * ------------------------------------------------------------------------------
 */
	CSF::createSection($prefix, array(
		'id' => 'aye_cat',
		'title' => '分类设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_cat',
		'title' => '分类设置',
		'fields' => array(
		    array(
				'id'          => 'cat_load',
				'type'        => 'select',
				'title'       => '分页加载方式',
				'placeholder' => '选择分页加载方式',
				'options'     => array(
					'1'  => '上一页下一页数字加载',
					'2'  => 'AJAX无刷新加载',
				),
				'default'     => '1'
			),
			array(
				'id' => 'default_thum',
				'type' => 'upload',
				'title' => '设置文章默认缩略图',
				'placeholder' => 'http://',
				'button_title' => '上传',
				'remove_title' => '删除',
				'default' => 'http://www.wmtu.cn/wp-content/uploads/2020/09/2020092204011243.jpeg'
			),
		)
	));
/*
 * ------------------------------------------------------------------------------
 * 文章页设置
 * ------------------------------------------------------------------------------
 */
	CSF::createSection($prefix, array(
		'id' => 'aye_single',
		'title' => '内页设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_single',
		'title' => '内页设置',
		'fields' => array(
			array(
				'id' => 'single_cop_text',
				'dependency' => array('single_cop', '==', 'true'),
				'type' => 'textarea',
				'title' => '版权文字',
			),
			array(
				'id' => 'single_time',
				'type' => 'switcher',
				'title' => '隐藏/显示文章发布时间',
				'default' => true,
			),
			array(
				'id' => 'single_view',
				'type' => 'switcher',
				'title' => '隐藏/显示文章浏览数量',
				'default' => true,
			),
			array(
				'id' => 'single_tag',
				'type' => 'switcher',
				'title' => '隐藏/显示文章标签',
				'default' => true,
			),
			array(
				'id' => 'single_cop',
				'type' => 'switcher',
				'title' => '隐藏/显示底部版权',
				'default' => true,
			),
		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_single',
		'title' => '优化设置',
		'fields' => array(
			array(
				'id' => 'auto_add_tags',
				'type' => 'switcher',
				'title' => '自动添加已有关键词 ',
				'default' => false,
			),
			array(
				'id' => 'single_tag_link',
				'type' => 'switcher',
				'title' => 'Tag标签自动内链 ',
				'default' => false,
			),
			array(
				'id' => 'single_nofollow',
				'type' => 'switcher',
				'title' => '文章外链自动添加nofollow',
				'default' => true,
				'subtitle' => '防止导出权重',
			),
			array(
				'id' => 'single_img_alt',
				'type' => 'switcher',
				'title' => '图片自动添加alt',
				'default' => true,
			),
			array(
				'id' => 'single_upload_filter',
				'type' => 'switcher',
				'title' => '上传文件重命名',
				'default' => true,
			),
			array(
				'id' => 'single_delete_post_and_img',
				'type' => 'switcher',
				'title' => '删除文章时删除图片附件',
				'default' => true,
			),

		)
	));

	/*
 * ------------------------------------------------------------------------------
 * 站点优化设置
 * ------------------------------------------------------------------------------
 */
	CSF::createSection($prefix, array(
		'id' => 'aye_optimization',
		'title' => '优化设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_optimization',
		'title' => '优化加速',
		'fields' => array(
			array(
				'id' => 'gtb_editor',
				'type' => 'switcher',
				'title' => '禁用古腾堡编辑器',
				'default' => true,
				'subtitle' => '古腾堡用不习惯吗？那就关闭吧！(默认关闭)',
			),
			array(
				'id' => 'diable_revision',
				'type' => 'switcher',
				'title' => '屏蔽文章修订',
				'default' => true,
				'subtitle' => '屏蔽文章修订',
			),
			array(
				'id' => 'googleapis',
				'type' => 'switcher',
				'title' => '后台禁止加载谷歌字体',
				'default' => true,
				'subtitle' => '后台禁止加载谷歌字体，加快后台访问速度',
			),
			array(
				'id' => 'category',
				'type' => 'switcher',
				'title' => '去掉分类目录中的category',
				'default' => true,
				'subtitle' => '去掉分类目录中的category，精简URL，有利于SEO，推荐去掉',
			),
			array(
				'id' => 'emoji',
				'type' => 'switcher',
				'title' => '禁用emoji表情',
				'default' => true,
				'subtitle' => '禁用WordPress的Emoji功能和禁止head区域Emoji css加载',
			),
			array(
				'id' => 'article_revision',
				'type' => 'switcher',
				'title' => '屏蔽文章修订功能',
				'default' => true,
				'subtitle' => '文章多，修订次数的用户建议关闭此功能',
			),
		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'aye_optimization',
		'title' => '精简头部',
		'fields' => array(
			array(
				'id' => 'toolbar',
				'type' => 'switcher',
				'title' => '移除顶部工具条',
				'default' => true,
				'subtitle' => '这个大家应该都懂',
			),
			array(
				'id' => 'rest_api',
				'type' => 'switcher',
				'title' => '禁用REST API',
				'default' => false,
				'subtitle' => '不准备打通WordPress小程序的用户建议关闭',
			),
			array(
				'id' => 'wpjson',
				'type' => 'switcher',
				'title' => '移除wp-json链接代码',
				'default' => true,
				'subtitle' => '移除头部区域wp-json链接代码，精简头部区域代码',
			),
			array(
				'id' => 'emoji_script',
				'type' => 'switcher',
				'title' => '移除头部多余Emoji JavaScript代码',
				'default' => true,
				'subtitle' => '移除头部多余Emoji JavaScript代码，精简头部区域代码',
			),
			array(
				'id' => 'wp_generator',
				'type' => 'switcher',
				'title' => '移除头部WordPress版本',
				'default' => true,
				'subtitle' => '移除头部WordPress版本，精简头部区域代码',
			),
			array(
				'id' => 'rsd_link',
				'type' => 'switcher',
				'title' => '移除离线编辑器开放接口',
				'default' => true,
				'subtitle' => '移除WordPress自动添加两行离线编辑器的开放接口，精简头部区域代码',
			),
			array(
				'id' => 'index_rel_link',
				'type' => 'switcher',
				'title' => '清除前后文、第一篇文章、主页meta信息',
				'default' => true,
				'subtitle' => 'WordPress把前后文、第一篇文章和主页链接全放在meta中。我认为于SEO帮助不大，反使得头部信息巨大，建议移出。',
			),
			array(
				'id' => 'feed',
				'type' => 'switcher',
				'title' => '移除文章、分类和评论feed',
				'default' => true,
				'subtitle' => '移除文章、分类和评论feed，精简头部区域代码。',
			),
			array(
				'id' => 'dns_prefetch',
				'type' => 'switcher',
				'title' => '移除头部加载DNS预获取',
				'default' => true,
				'subtitle' => '移出head区域dns-prefetch代码，精简头部区域代码。',
			),

		)
	));

}