<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => '主题设置',
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'xintheme',
  'menu_position'   => 59,
  'menu_icon' => CS_URI.'/assets/images/setting.png',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Return 主题设置<style>.cs-framework .cs-body {min-height: 700px;}</style>',
  //'framework_title' => '主题设置',
);
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

$options[] = array(
	'name'  => 'layout',
	'title' => '布局设置',
	'icon'  => 'fa fa-th-large',

  	'fields' => array(

    	array(
			'type'    => 'subheading',
			'content' => '选择头部样式',
		),
    	array(
			'id'    => 'head_region',
			'type'    => 'radio',
			'title' => '头部样式',
		    'options' => array(
				'normal'    => '正常显示',
				'centered'   => '头部居中',
				'ad'  => '头部+AD',
		    ),
		    'default'   => 'normal',
		    'desc'    => '选择头部样式',
			
			'attributes'   => array(
				'data-depend-id' => 'head_region',
			),
    	),
		array(
			'id'        => 'header_ad',
			'type'      => 'image',
			'title'     => '头部广告',
			'desc'      => '图片尺寸为：928*90（px）',
			'add_title' => '选择广告图',
			'dependency'=> array(
				'head_region',
				'any',
				'ad'
			)
		),
		array(
			'id'      => 'header_ad_url',
			'type'    => 'text',
			'title'   => '广告跳转链接',
			'attributes' => array(
            'style'    => 'width: 100%;'
			),
			'after'  => '<p class="cs-text-muted">输入广告跳转链接',
			'dependency'=> array(
				'head_region',
				'any',
				'ad'
			)
		),
		
		array(
			'id'      => 'index_banner',
			'type'    => 'switcher',
			'title'   => '幻灯片（置顶文章）',
			'desc'    => '是否显示幻灯片',
			'default' => true
		),
		
    	array(
			'type'    => 'subheading',
			'content' => '首页列表区域样式',
		),
    	array(
			'id'    => 'list_region',
			'type'    => 'radio',
			'title' => '首页列表区域',
		    'options' => array(
				'list1'    => '首页列表样式-1',
				'list2'   => '首页列表样式-2',
				'list3'  => '首页列表样式-3',
				'list4'  => '首页列表样式-4',
				'list5'  => '首页列表样式-5',
				'list6'  => '首页列表样式-6',
		    ),
		    'default'   => 'list1',
		    'desc'    => '选择首页列表区域样式',
    	),


	),
);

$options[] = array(
	'name'  => 'logo',
	'title' => '网站图标',
	'icon'  => 'fa fa-flag',

  	'fields' => array(

		array(
			'type'    => 'subheading',
			'content' => '网站标志',
		),
	
  		array(
			'id'        => 'logo',
			'type'      => 'image',
			'title'     => '网站 LOGO',
			'desc'      => '上传网站 LOGO (建议 120*40 px)',
			'add_title' => '上传 LOGO',
		),

        array(
          'id'      => 'logo_width',
          'type'    => 'number',
          'title'   => 'Logo 宽度',
          'after'   => ' <i class="cs-text-muted">(px)</i>',
        ),
        array(
          'id'      => 'logo_height',
          'type'    => 'number',
          'title'   => 'Logo 高度',
          'after'   => ' <i class="cs-text-muted">(px)</i>',
        ),
		
		array(
			'id'        => 'favicon',
			'type'      => 'image',
			'title'     => '网站 Favicon图标',
			'desc'      => '上传网站 Favicon图标',
			'add_title' => '上传 Favicon',
		),
		
		array(
			'type'    => 'subheading',
			'content' => '社交信息',
		),

		array(
			'id'      => 'footer_qq',
			'type'    => 'switcher',
			'title'   => 'QQ',
			'desc'    => '输入QQ即时通讯链接',
			'default' => false
		),
		array(
		  'id'      => 'footer_qq_url',
		  'type'    => 'text',
		  'title'   => 'QQ 客服链接',
          'attributes' => array(
            'style'    => 'width: 100%;'
          ),
		  'after'  => '<p class="cs-text-muted">填入在线客服链接，例如：http://wpa.qq.com/msgrd?v=3&uin=670088886&site=qq&menu=yes</p>',
		  'dependency'   => array( 'footer_qq', '==', true )
		),

		array(
			'id'      => 'footer_weixin',
			'type'    => 'switcher',
			'title'   => '微信',
			'desc'    => '上传微信二维码',
			'default' => false
		),
		array(
		  'id'      => 'footer_weixin_img',
		  'type'    => 'image',
		  'title'   => '微信',
		  'dependency'   => array( 'footer_weixin', '==', true )
		),
		
		array(
			'id'      => 'footer_mail',
			'type'    => 'switcher',
			'title'   => '邮箱',
			'desc'    => '输入邮箱账号',
			'default' => false
		),
		array(
		  'id'      => 'footer_mail_url',
		  'type'    => 'text',
		  'title'   => '邮箱账号',
          'attributes' => array(
            'style'    => 'width: 100%;'
          ),
		  'dependency'   => array( 'footer_mail', '==', true )
		),

		array(
			'id'      => 'footer_weibo',
			'type'    => 'switcher',
			'title'   => '微博',
			'desc'    => '输入微博链接',
			'default' => false
		),
		array(
		  'id'      => 'footer_weibo_url',
		  'type'    => 'text',
		  'title'   => '微博链接',
          'attributes' => array(
            'style'    => 'width: 100%;'
          ),
		  'dependency'   => array( 'footer_weibo', '==', true )
		),
		
		array(
			'id'      => 'footer_search',
			'type'    => 'switcher',
			'title'   => '搜索',
			'desc'    => '是否显示搜索按钮',
			'default' => false
		),


	),
);
// ------------------------------
// 评论                       -
// ------------------------------

$options[]      = array(
  'name'        => 'comment',
  'title'       => '评论设置',
  'icon'        => 'fa fa-comments',
  'fields'      => array(
  
		// 启用滑动验证
		array(
          'id'    	  => 'ma_comment_unlock',
          'type'      => 'switcher',
          'default'   => true,
          'title'     => '启用滑动验证',
        ),	

	 // 评论头衔
            array(
                'id'        => 'comment_rank',
                'title'     => '访客头衔',
                'type'      => 'switcher',
                'label'     => '按评论数排行，评论越多，等级越高，可以修改为自己喜欢的头衔',
            ),

                array(
                    'id'         => 'comment_rank_1',
                    'type'       => 'text',
                    'default'    => 'VIP 1',
                    'title'      => '等级 1',
                    'dependency' => array( 'comment_rank', '==', 'true' ),
                ),

                array(
                    'id'         => 'comment_rank_2',
                    'type'       => 'text',
                    'default'    => 'VIP 2',
                    'title'      => '等级 2',
                    'dependency' => array( 'comment_rank', '==', 'true' ),
                ),

                array(
                    'id'         => 'comment_rank_3',
                    'type'       => 'text',
                    'default'    => 'VIP 3',
                    'title'      => '等级 3',
                    'dependency' => array( 'comment_rank', '==', 'true' ),
                ),

                array(
                    'id'         => 'comment_rank_4',
                    'type'       => 'text',
                    'default'    => 'VIP 4',
                    'title'      => '等级 4',
                    'dependency' => array( 'comment_rank', '==', 'true' ),
                ),

                array(
                    'id'         => 'comment_rank_5',
                    'type'       => 'text',
                    'default'    => 'VIP 5',
                    'title'      => '等级 5',
                    'dependency' => array( 'comment_rank', '==', 'true' ),
                ),

                array(
                    'id'         => 'comment_rank_6',
                    'type'       => 'text',
                    'default'    => 'VIP 6',
                    'title'      => '等级 6',
                    'dependency' => array( 'comment_rank', '==', 'true' ),
                ),
		
		
		
  ),
);

$options[] = array(
	'name'  => 'code',
	'title' => '添加代码',
	'icon'  => 'fa fa-code',

  	'fields' => array(
		array(
		  'id'      => 'head_code',
		  'type'    => 'textarea',
		  'title'   => '添加代码到头部',
		  'after'    => '<p class="cs-text-muted">出现在网站 head 中，主要用于验证网站...</p>',
		),
		array(
		  'id'      => 'foot_code',
		  'type'    => 'textarea',
		  'title'   => '添加代码到页脚',
		  'after'    => '<p class="cs-text-muted">出现在网站底部 body 前，主要用于站长统计代码...</p>',
		),
	),
);

$options[] = array(
	'name'  => 'optimization',
	'title' => '优化加速',
	'icon'  => 'fa fa-wordpress',

  	'fields' => array(
		array(
			'id'      => 'xintheme_article',
			'type'    => 'switcher',
			'title'   => '登陆后台跳转到文章列表',
			'desc'    => 'WordPress登陆后一般是显示仪表盘页面，开启这个功能后登陆后台默认显示文章列表（默认开启）',
			'default' => true
		),
		array(
			'id'      => 'xintheme_wp_head',
			'type'    => 'switcher',
			'title'   => '移除顶部多余信息',
			'desc'    => '移除WordPress Head 中的多余信息，能够有效的提高网站自身安全（默认开启）',
			'default' => true
		),
		array(
			'id'      => 'xintheme_api',
			'type'    => 'switcher',
			'title'   => '禁用REST API',
			'desc'    => '禁用REST API、移除wp-json链接（默认关闭，如果你的网站没有做小程序或是APP，建议开启这个功能，禁用REST API）',
			'default' => false
		),
		array(
			'id'      => 'xintheme_pingback',
			'type'    => 'switcher',
			'title'   => 'XML-RPC',
			'desc'    => '此功能会关闭 XML-RPC 的 pingback 端口（默认开启，提高网站安全性）',
			'default' => true
		),
		array(
			'id'      => 'xintheme_feed',
			'type'    => 'switcher',
			'title'   => 'Feed',
			'desc'    => 'Feed易被利用采集，造成不必要的资源消耗（默认开启）',
			'default' => true
		),
		array(
			'id'      => 'xintheme_category',
			'type'    => 'switcher',
			'title'   => '去除分类标志',
			'desc'    => '去除链接中的分类category标志，有利于SEO优化，每次开启或关闭此功能，都需要重新保存一下固定链接！（默认关闭）',
			'default' => false
		),
		
	),
);
$options[] = array(
	'name'  => 'footer',
	'title' => '底部信息',
	'icon'  => 'fa fa-caret-square-o-down',

  	'fields' => array(

  		array(
			'type'    => 'subheading',
			'content' => '底部信息',
		),

		array(
			'id'      => 'footer_icp',
			'type'    => 'text',
			'title'   => '备案号',
			'attributes' => array(
            'style'    => 'width: 100%;'
			),
			'after'  => '<p class="cs-text-muted">输入网站备案号',
		),
		


	),
);
$options[] = array(
	'name'  => 'push',
	'title' => '更新推送',
	'icon'  => 'fa fa-bell',

  	'fields' => array(
		array(
			'id'      => 'xintheme_push',
			'type'    => 'switcher',
			'title'   => '主题更新推动',
			'desc'    => '开启后，主题每次更新用户都可在网站后台收到更新推送。（如果你用主题进行了二次开发，不需要进行官方更新，就可以关闭此功能！）',
			'default' => true
		),
	),
);

$options[] = array(
	'name'  => 'sponsor',
	'title' => '友情赞助',
	'icon'  => 'fa fa-qrcode',

  	'fields' => array(
	
  		array(
			'type'    => 'subheading',
			'content' => '嘿！你好，欢迎使用Repay主题。<br><br>新主题（XinTheme.com）致力于打造一个优秀的WordPress建站资源共享学习平台<br><br>目前这款主题为公开测试版，如使用过程中遇到什么问题，可添加QQ群寻求帮助：463190586<br><br>制作一款WordPress主题实属不易，欢迎各位老板伸出援手，友情赞助！（你们的支持就是我们最大的动力！）',
		),
	
		array(
			'id'      => 'xintheme_zanzhu',
			'type'    => 'image_select',
			'title'   => '友情赞助',
		    'options' => array(
				'wechat'   => get_stylesheet_directory_uri() . '/images/wechat.png',
				'alipay' => get_stylesheet_directory_uri() . '/images/alipay.png',
		    ),
		),
	),
);

CSFramework::instance( $settings, $options );
