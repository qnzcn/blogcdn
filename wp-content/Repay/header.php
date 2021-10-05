<?php $head_type = xintheme('head_region');
if($head_type == 'normal' ) : include( 'template-parts/header-normal.php' );
elseif($head_type == 'centered') : include( 'template-parts/header-centered.php' );
elseif($head_type == 'ad') : include( 'template-parts/header-ad.php' );
else : include( 'template-parts/header-normal.php' );
endif;